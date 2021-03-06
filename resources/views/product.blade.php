@extends('layouts.app')

@section('page_title')
    {{ $product->title }}
@endsection

@section('content')
    <h1 class="text-center text-dark mb-3">{{ $product->title }}</h1>
    <div class="row">
        <div class="col-md-6 col"><img src="{{ asset('storage/'.$product->imagePath) }}" height="400" class="mx-auto"></div>
        <div class="col col-md-6">
            <p>Артикул: {{ $product->code }}</p>
            <p>Вес: {{ $product->weight }}</p>
            <p>{{ $product->description }}</p>
            <p>Цена: {{ number_format($product->cost, 0, ',', ' ') }} грн.</p>
        </div>
    </div>
@endsection