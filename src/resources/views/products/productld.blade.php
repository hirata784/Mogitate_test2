@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/productld.css') }}">
@endsection

@section('content')
<form action="">
    <div class="content">
        <div class="img">
            <img src="{{asset('storage/{banana.png}')}}" alt="NotImage" width="240" height="80">
            <button>ファイルを選択</button>
        </div>
        <div class="textbox">
            <div>
                <p>商品名</p>
                <input type="text" class="txt" placeholder="商品名を入力">
            </div>

            <div>
                <p>値段</p>
                <input type="text" class="txt" placeholder="値段を入力">
            </div>

            <div class="season">
                <p>季節</p>
                <input type="radio" name="season" id="spring" value="春">
                <label for="spring">春</label>
                <input type="radio" name="season" id="summer" value="夏">
                <label for="summer">夏</label>
                <input type="radio" name="season" id="autumn" value="秋">
                <label for="autumn">秋</label>
                <input type="radio" name="season" id="winter" value="冬">
                <label for="winter">冬</label>
            </div>


        </div>
    </div>
</form>
@endsection