@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<form action="/products/register/create" class="registration-form" method="post" enctype="multipart/form-data">
    @csrf
    <div class="registration-inner">
        <h1>商品登録</h1>
        <div>
            <p>商品名<span class="Required">必須</span></p>
            <input type="text" class="txt" name="name" placeholder="商品名を入力">
            <div class="form-error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <p>値段<span class="Required">必須</span></p>
            <input type="text" class="txt" name="price" placeholder="値段を入力">
            <div class="form-error">
                @error('price')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <p>商品画像<span class="Required">必須</span></p>
            <div class="img">
                <input class="icon-btn" type="file" name="image" onchange="preview(this)">
                <div class="preview-area"></div>
            </div>
            <div class="form-error">
                @error('image')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="season">
            <p>季節<span class="Required">必須</span><span class="multiple">複数選択可</span></p>
            <input type="checkbox" name="season[]" id="spring" value="1">
            <label for="spring">春</label>
            <input type="checkbox" name="season[]" id="summer" value="2">
            <label for="summer">夏</label>
            <input type="checkbox" name="season[]" id="autumn" value="3">
            <label for="autumn">秋</label>
            <input type="checkbox" name="season[]" id="winter" value="4">
            <label for="winter">冬</label>
            <div class="form-error">
                @error('season')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div>
            <p>商品説明<span class="Required">必須</span></p>
            <textarea class="explanation" name="description" id="" cols="150" rows="10" placeholder="商品の説明を入力"></textarea>
            <div class="form-error">
                @error('description')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="buttons">
            <button class="back-btn" type="button" onClick="history.back()">戻る</button>
            <button class=" registration-btn">登録</button>
        </div>
    </div>
</form>

<script>
    function preview(elem) {
        const file = elem.files[0]
        const isOK = file?.type?.startsWith('image/')
        const image = (file && isOK) ? `<img class="preview-img" src=${URL.createObjectURL(file)}>` : ''
        elem.nextElementSibling.innerHTML = image
        // 画像選択時、デフォルトの画像を非表示にする
        hidden.style.display = "none";
    }
</script>
@endsection