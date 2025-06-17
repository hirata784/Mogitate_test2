<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductsRequest;

class RegisterController extends Controller
{
    // 商品登録 初期画面
    public function index()
    {
        return view('/products/register');
    }

    public function create(ProductsRequest $request)
    {
        $create_product = $request->only(['name', 'price', 'description']);
        // imageデータを仮入れする
        $create_product['image'] = "仮データ";
        // 現在の商品データ数
        $row = Product::count();
        // データ更新
        Product::create($create_product);

        // 画像データ更新
        if (request('image')) {
            $filename = request()->file('image')->getClientOriginalName();
            $inputs['image'] = request('image')->storeAs('public/fruits-img', $filename);
            Product::find($row + 1)->update($inputs);
        }

        // 季節データを取得
        $seasons = $request->only(['season']);
        foreach ($seasons as $season) {
            // 変更後の季節データを追加
            Product::find($row + 1)->seasons()->attach($season);
        }

        // 商品一覧表示用
        $products = Product::paginate(6);
        // 検索ワードに空白を設定
        $data = "";
        // タイトルを設定
        $title = "商品一覧";
        return view('/products/index', compact('products', 'data', 'title'));
    }
}
