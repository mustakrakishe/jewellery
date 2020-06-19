@extends('layouts.app')

@section('page_title')
    Главная
@endsection

@section('content')
<h1 class="text-center text-dark mb-3">Главная</h1>
    <div class="row">
        @foreach($products as $product) 
        <div class="col-md-3 col-6 mb-4">
            
                <a href="{{ route('catalogue_showOneProduct', $product->id) }}">   
                <div class="row m-0 p-0">
                    <div class="col text-center mx-auto px-5 bg-white product-content-cell shadow">
                        <div class="row my-3 image" style="height:200px"><img src="{{ asset('storage/'.$product->imagePath) }}" height="100%" class="mx-auto"></div>
                        <div class="row text-center mb-2 title"><p class="mx-auto">{{ $product->title }}</p></div>
                        <div class="row text-center cost"><p class="mx-auto">{{ number_format($product->cost, 0, ',', ' ') }} грн.</p></div>
                        
                    </div>
                </div>
                </a>
        </div>
            
        @endforeach
    </div>
@endsection