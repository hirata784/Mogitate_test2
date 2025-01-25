@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<form action="" class="registration-form">
    @csrf
    <h1>商品登録</h1>
    <div>
        <p>商品名<span class="Required">必須</span></p>
        <input type="text" class="txt" placeholder="商品名を入力">
    </div>

    <div>
        <p>値段<span class="Required">必須</span></p>
        <input type="text" class="txt" placeholder="値段を入力">
    </div>

    <div>
        <p>商品画像<span class="Required">必須</span></p>
        <button>ファイルを選択</button>
    </div>

    <div class="season">
        <p>季節<span class="Required">必須</span><span class="multiple">複数選択可</span></p>
        <input type="radio" name="season" id="spring" value="春">
        <label for="spring">春</label>
        <input type="radio" name="season" id="summer" value="夏">
        <label for="summer">夏</label>
        <input type="radio" name="season" id="autumn" value="秋">
        <label for="autumn">秋</label>
        <input type="radio" name="season" id="winter" value="冬">
        <label for="winter">冬</label>
    </div>

    <div>
        <p>商品説明<span class="Required">必須</span></p>
        <textarea class="explanation" name="" id="" cols="100" rows="10" placeholder="商品の説明を入力"></textarea>
    </div>

    <div class="buttons">
        <button class="back-btn">戻る</button>
        <button class="registration-btn">登録</button>
    </div>
</form>
@endsection