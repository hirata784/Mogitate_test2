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
        <form class="search-form" action="/products/search" method="get">
            @csrf
            <input type="text" class="search-txt" name="keyword" placeholder="商品名で検索" value="{{$data}}">
            <button class="search-btn">検索</button>
            <p>価格順で表示</p>
            <select class="search-slt" name="sort" id="">
                <option value="" disabled selected style="display:none;">価格で並べ替え</option>
                <option value="high" @if($sort=="high" ) selected @endif>高い順に表示</option>
                <option value="cheap" @if($sort=="cheap" ) selected @endif>安い順に表示</option>
            </select>
            <!-- 価格ソート削除 -->
            @if($sort == "high")
            <div class="sort-btn">
                <span class="sorting">高い順に表示</span>
                <button class="chancel" name="chancel" value="">×</button>
            </div>
            <!-- sortの値が残ったまま処理するため、sortの値削除 -->
            <input type="hidden" name="sort" value="">
            @elseif($sort == "cheap")
            <div class="sort-btn">
                <span class="sorting">安い順に表示</span>
                <button class="chancel" name="chancel" value="">×</button>
            </div>
            <!-- sortの値が残ったまま処理するため、sortの値削除 -->
            <input type="hidden" name="sort" value="">
            @endif
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
        {{ $products->appends(request()->input())->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection