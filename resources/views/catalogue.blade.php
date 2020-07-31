@extends('layouts.app')


@section('page_title')
    Каталог
@endsection

@section('content')
<link rel="stylesheet" href="/css/inc/productList.css">
<script src="/js/catalogue/catalogue.js"></script>
<script src="/js/catalogue/productList.js"></script>

<h1 class="text-center text-dark mb-3">Каталог</h1>
    <div class="row">
        <div class="control-panel col-3 bg-white shadow-sm py-4">
            <h5 class="text-center text-dark">Фильтры</h5>
            <form id="presentRulesForm" action="#" method="post">
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
                                        if(isset($_POST["type$type->id"])){
                                            echo 'checked';
                                        }
                                    ?>
                                >
                                <label for="type{{ $type->id }}"> {{ $type->title }}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="form-group">
                    <p style="margin-bottom: 8px">Цена</p>

                    <div class="row">
                        <div class="col-5 justify-content-center">
                            <input
                                type="number"
                                name="cost-min"
                                id="cost-min"
                                style="width:100%;"
                                placeholder="От"
                                <?php
                                    if(isset($_POST['cost-min'])){
                                        $cost_min = $_POST['cost-min'];
                                        if($cost_min != null){
                                            echo "value=\"$cost_min\"";
                                        }
                                    }
                                ?>
                            >
                        </div>
                        <div class="col justify-content-center"><p class="text-center">-</p></div>
                        <div class="col-5 justify-content-center">
                            <input
                                type="number"
                                name="cost-max"
                                id="cost-max"
                                style="width:100%;"
                                placeholder="До"
                                <?php
                                    if(isset($_POST['cost-max'])){
                                        $cost_max = $_POST['cost-max'];
                                        if($cost_max != null){
                                            echo "value=\"$cost_max\"";
                                        }
                                    }
                                ?>
                            >
                        </div>
                    </div>
                </div>
                <input id="filtersFormSubmit" type="submit" value="Применить">
            </form>
        </div>

        <div class="product-list col">
            <div class="row">
                <div class="col-4 form-group">
                    <label for="order-control">Сортировать:</label>
                    <select form="presentRulesForm" class="custom-select" name="orderControl" id="orderControl">
                        <option value="updated_at,desc">От новых к старым</option>
                        <option value="updated_at,asc">От старых к новым</option>
                        <option value="cost,asc">От дешёвых к дорогим</option>
                        <option value="cost,desc">От дорогих к дешёвым</option>
                    </select>
                </div>
            </div>
            <div class="product_container row">
                @foreach($products as $product) 
                    <div class="product_cell col-md-4 col-6 mb-4">
                        <a href="{{ route('catalogue_showOneProduct', $product->id) }}">   
                            <div class="row m-0 p-0">
                                <div class="col text-center mx-auto px-5 bg-white product-content-cell shadow-sm">
                                    <div class="row my-3 image" style="height:200px"><img src="{{ asset('storage/'.$product->imagePath) }}" height="100%" class="mx-auto"></div>
                                    <div class="row text-center mb-2 title"><p class="mx-auto title">{{ $product->title }}</p></div>
                                    <div class="row text-center cost"><p class="cost mx-auto">{{ number_format($product->cost, 0, ',', ' ') }} грн.</p></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        var cataloguePath = "{{ route('catalogue') }}";
    </script>

@endsection