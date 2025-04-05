@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="head-inner">
    <h1>商品一覧</h1>
    <form action="" class="index-form">
        @csrf
        <button class="add-btn">+商品を追加</button>
    </form>
</div>

<div class="body-inner">
    <div class="search">
        <form action="">
            @csrf
            <input type="text" class="search-txt" placeholder="商品名で検索">
            <button class="search-btn">検索</button>
            <p>価格順で表示</p>
            <select class="search-slt" name="" id="">
                <option value="">高い順</option>
                <option value="">安い順</option>
            </select>
        </form>
    </div>
    <div class="items">
        <p>商品リスト</p>
    </div>
</div>
@endsection