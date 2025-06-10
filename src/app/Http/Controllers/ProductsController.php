<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // 商品詳細 初期画面
    public function productId($id)
    {
        $product = Product::find($id);

        return view('/products/productId', compact('product'));
    }
}
