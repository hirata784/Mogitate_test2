<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // 商品一覧 初期画面
    public function index()
    {
        $products = Product::paginate(6);
        // 検索ワードに空白を設定
        $data = "";
        // ソート条件に空白を設定
        $sort = "";
        // タイトルを設定
        $title = "商品一覧";
        return view('/products/index', compact('products', 'data', 'sort', 'title'));
    }

    // 商品一覧 検索機能
    public function indexSearch(Request $request)
    {
        // 価格順で並べ替え
        if ($request['sort'] == "high") {
            $products = Product::orderBy('created_at', 'DESC')
                ->orderBy('price', 'DESC')
                ->where('name', 'like', '%' . $request['keyword'] . '%')
                ->paginate(6);
        } elseif ($request['sort'] == "cheap") {
            $products = Product::orderBy('created_at', 'DESC')
                ->orderBy('price', 'ASC')
                ->where('name', 'like', '%' . $request['keyword'] . '%')
                ->paginate(6);
        } else {
            // 価格順設定なし
            $products = Product::where('name', 'like', '%' . $request['keyword'] . '%')->paginate(6);
        }
        // 価格ソートを解除する場合
        if ($request->has('chancel')) {
            // 価格順設定なし
            $products = Product::where('name', 'like', '%' . $request['keyword'] . '%')->paginate(6);
        }

        // 検索ワードをセッションで保持
        $request->session()->put('keyword', $request['keyword']);
        $data = $request->session()->get('keyword');
        // ソート条件をセッションで保持
        $request->session()->put('sort', $request['sort']);
        $sort = $request->session()->get('sort');
        // タイトルを設定
        if (isset($data)) {
            $title = "“" . $data . "”の商品一覧";
        } else {
            $title = "商品一覧";
        }

        return view('/products/index', compact('products', 'data', 'sort', 'title'));
    }
}
