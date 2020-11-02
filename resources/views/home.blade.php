@extends('layouts.app')


@section('page_title')
    Главная
@endsection

@section('content')
<link rel="stylesheet" href="css/inc/productList.css">
<script src="/js/catalogue/productList.js"></script>

<h1 class="text-center text-dark mb-3">Главная</h1>
    <div class="row">
        @foreach($products as $product) 
            <div class="product-cell col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                @include('inc.productList.productCell_content')
            </div>
        @endforeach
    </div>
@endsection