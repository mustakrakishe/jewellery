@extends('layouts.app')


@section('page_title')
    Каталог
@endsection

@section('content')
<link rel="stylesheet" href="/css/inc/productList.css">
<script src="/js/catalogue/productList.js"></script>

<h1 class="text-center text-dark mb-3">Каталог</h1>
    <div class="row">
        <div class="control-panel col-3 bg-white shadow-sm py-4">
            <h5 class="text-center text-dark">Фильтры</h5>
            <form action="/catalogue/setFilters" method="post">
                @csrf
                <div class="form-group">
                    <h6>Тип</h6>
                    <ul type="none" class="pl-0">
                        @foreach($types as $type)
                            <li>
                                <input
                                    type="checkbox"
                                    class="type"
                                    name="type{{ $type->id }}"
                                    id="type{{ $type->id }}"
                                    value="{{ $type->id }}"
                                    <?php
                                        $name = 'type' . $type->id;
                                        if(isset($_POST[$name])){
                                            echo 'checked';
                                        }
                                    ?>
                                >
                                <label for="type{{ $type->id }}"> {{ $type->title }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <input type="submit" value="Применить">
            </form>
        </div>

        <div class="product-list col">
            <div class="row">
                @foreach($products as $product) 
                    <div class="product_cell col-md-4 col-6 mb-4">
                        <a href="{{ route('catalogue_showOneProduct', $product->id) }}">   
                            <div class="row m-0 p-0">
                                <div class="col text-center mx-auto px-5 bg-white product-content-cell shadow-sm">
                                    <div class="row my-3 image" style="height:200px"><img src="{{ asset('storage/'.$product->imagePath) }}" height="100%" class="mx-auto"></div>
                                    <div class="row text-center mb-2 title"><p class="mx-auto title">{{ $product->title }}</p></div>
                                    <div class="row text-center cost"><p class="mx-auto">{{ number_format($product->cost, 0, ',', ' ') }} грн.</p></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection