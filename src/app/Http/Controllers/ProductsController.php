<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // 商品一覧 初期画面
    public function index()
    {
        return view('/products/index');
    }

    // 商品詳細 初期画面
    public function productld()
    {
        return view('/products/productld');
    }

}
