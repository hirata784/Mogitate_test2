@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="head-inner">
    <h1>{{$title}}</h1>
    <form action="/products/register" class="index-form" method="get">
        @csrf
        <button class="add-btn">+商品を追加</button>
    </form>
</div>

<div class="body-inner">
    <div class="search">
        <form action="/products/search" method="get">
            @csrf
            <input type="text" class="search-txt" name="keyword" placeholder="商品名で検索" value="{{$data}}">
            <button class="search-btn">検索</button>
            <p>価格順で表示</p>
            <select class="search-slt" name="" id="">
                <option value="">高い順</option>
                <option value="">安い順</option>
            </select>
        </form>
    </div>
    <div class="products">
        <div class="product-list">
            @foreach($products as $product)
            <div class="product-card">
                <a href="/products/{{$product['id']}}"><img class="product-img" src="{{  Storage::url($product['image']) }}"></a>
                <div class="product-str">
                    <span>{{$product['name']}}</span>
                    <span>¥{{$product['price']}}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection