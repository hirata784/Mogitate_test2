@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/productId.css') }}">
@endsection

@section('content')
<form action="" class="changes-form">
    <div class="content">
        <div class="img">
            <img class="product-img" src="{{ Storage::url($product['image']) }}">
            <input id="image" type="file" name="image">
        </div>
        <div class=" textbox">
            <div>
                <p>商品名</p>
                <input type="text" class="txt" placeholder="商品名を入力" value="{{$product['name']}}">
            </div>

            <div>
                <p>値段</p>
                <input type="text" class="txt" placeholder="値段を入力" value="{{$product['price']}}">
            </div>

            <div class="season">
                <p>季節</p>
                <input type="checkbox" name="season" id="spring" value="spring">
                <label for="spring">春</label>
                <input type="checkbox" name="season" id="summer" value="summer">
                <label for="summer">夏</label>
                <input type="checkbox" name="season" id="autumn" value="autumn">
                <label for="autumn">秋</label>
                <input type="checkbox" name="season" id="winter" value="winter">
                <label for="winter">冬</label>
            </div>
        </div>
    </div>

    <div>
        <p>商品説明</p>
        <textarea class="explanation" name="" id="" cols="150" rows="10" placeholder="商品の説明を入力">{{$product['description']}}</textarea>
    </div>

    <div class="buttons">
        <button class="back-btn" type="button" onClick="history.back()">戻る</button>
        <button class="registration-btn">登録</button>
    </div>
</form>
@endsection