@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/productId.css') }}">
@endsection


@section('content')
<form action="/products/{{$product['id']}}/update" method="post" class="changes-form">
    @csrf
    <div class="content">
        <div class="img">
            <img class="product-img" src="{{ Storage::url($product['image']) }}">
            <input id="image" type="file" name="image">
        </div>
        <div class="textbox">
            <div>
                <p>商品名</p>
                <input type="text" class="txt" name="name" placeholder="商品名を入力" value="{{$product['name']}}">
                <div class="form-error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <div>
                <p>値段</p>
                <input type="text" class="txt" name="price" placeholder="値段を入力" value="{{$product['price']}}">
                <div class="form-error">
                    @error('price')
                    {{ $message }}
                    @enderror
                </div>
            </div>

            <!-- Seasonテーブルに代入されている旬の季節にチェックマークをつける -->
            <div class="season">
                <p>季節</p>
                <input type="checkbox" name="season[]" id="spring" value="1" @if($spring) checked @endif>
                <label for="spring">春</label>
                <input type="checkbox" name="season[]" id="summer" value="2" @if($summer) checked @endif>
                <label for="summer">夏</label>
                <input type="checkbox" name="season[]" id="autumn" value="3" @if($autumn) checked @endif>
                <label for="autumn">秋</label>
                <input type="checkbox" name="season[]" id="winter" value="4" @if($winter) checked @endif>
                <label for="winter">冬</label>
            </div>
            <div class="form-error">
                @error('season')
                {{ $message }}
                @enderror
            </div>
        </div>
    </div>

    <div>
        <p>商品説明</p>
        <textarea class="explanation" name="description" id="" cols="150" rows="10" placeholder="商品の説明を入力">{{$product['description']}}</textarea>
        <div class="form-error">
            @error('description')
            {{ $message }}
            @enderror
        </div>
    </div>

    <div class="buttons">
        <button class="back-btn" type="button" onClick="history.back()">戻る</button>
        <button class="registration-btn">登録</button>
    </div>
</form>
@endsection