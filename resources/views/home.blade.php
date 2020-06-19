@extends('layouts.app')

@section('page_title')
    Главная
@endsection

@section('content')
    <div class="row">
        @foreach($products as $product)
            <div class="col-3">
                <div class="row"><img src="{{ asset('storage/'.$product->imagePath) }}" width="200"></div>
                <div class="row"><p>{{ $product->title }}</p></div>
                <div class="row"><p>{{ $product->cost }} грн.</p></div>
            </div>
        @endforeach
    </div>
@endsection