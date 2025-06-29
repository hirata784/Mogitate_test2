<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductsRequest;

class ProductsController extends Controller
{
    // 商品詳細 初期画面
    public function productId($id)
    {
        // データを取得
        $product = Product::find($id);
        $seasons = Product::find($id)->seasons;
        // 季節変数にnullを代入する
        $spring = null;
        $summer = null;
        $autumn = null;
        $winter = null;
        // 季節が選択されている場合、季節変数に値を代入
        foreach ($seasons as $season) {
            if ($season['name'] == "春") {
                $spring = 1;
            } elseif ($season['name'] == "夏") {
                $summer = 1;
            } elseif ($season['name'] == "秋") {
                $autumn = 1;
            } elseif ($season['name'] == "冬") {
                $winter = 1;
            }
        }
        return view('/products/productId', compact('id', 'product', 'spring', 'summer', 'autumn', 'winter'));
    }

    public function update($id, ProductsRequest $request)
    {
        // データを取得
        $update_product = $request->only(['name', 'price', 'description']);
        // 画像データ更新
        if (request('image')) {
            $filename = request()->file('image')->getClientOriginalName();
            $inputs['image'] = request('image')->storeAs('public/fruits-img', $filename);
            Product::find($id)->update($inputs);
        }
        // 変更前の商品データを取得
        $product = Product::find($id);
        // 変更前の季節データを取得
        $seasons = Product::find($id)->seasons;
        foreach ($seasons as $season) {
            // 変更前の季節データidを取得
            $season_id = $season['id'];
            // 変更前の季節データを削除
            $product->seasons()->detach($season_id);
        }
        // 変更後の季節データを取得
        $update_seasons = $request->only(['season']);
        foreach ($update_seasons as $update_season) {
            // 変更後の季節データを追加
            $product->seasons()->attach($update_season);
        }
        // データ更新
        Product::find($id)->update($update_product);
        return redirect('/products');
    }

    public function delete($id)
    {
        // データを取得
        $product = Product::find($id);
        $seasons = Product::find($id)->seasons;
        foreach ($seasons as $season) {
            // 季節データidを取得
            $season_id = $season['id'];
            // 季節データを削除
            $product->seasons()->detach($season_id);
        }
        // データ削除
        Product::find($id)->delete();
        return redirect('/products');
    }
}
