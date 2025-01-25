<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // 商品登録 初期画面
    public function index()
    {
        return view('/products/register');
    }
}
