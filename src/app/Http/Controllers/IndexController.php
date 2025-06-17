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
        // タイトルを設定
        $title = "商品一覧";
        return view('/products/index', compact('products', 'data', 'title'));
    }

    // 商品一覧 検索機能
    public function indexSearch(Request $request)
    {
        // 検索結果
        $products = Product::where('name', 'like', '%' . $request['keyword'] . '%')->paginate(6);
        // 検索ワードをセッションで保持
        $request->session()->put('keyword', $request['keyword']);
        $data = $request->session()->get('keyword');
        // タイトルを設定
        if (isset($data)) {
            $title = "“" . $data . "”の商品一覧";
        } else {
            $title = "商品一覧";
        }
        return view('/products/index', compact('products', 'data', 'title'));
    }
}
