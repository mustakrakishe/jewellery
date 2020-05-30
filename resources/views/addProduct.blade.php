@extends('layouts.app')

@section('page_title')
    Добавить продукт
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('addProduct_form') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row justify-content-center">
            <div class="col-6">
                <div class="form-group">
                    <label for="code">Артикул</label>
                    <input type="text" name="code" id="code" placeholder="Артикул" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Название</label>
                    <input type="text" name="title" id="title" placeholder="Название" class="form-control">
                </div>

                <div class="form-group">
                    <label for="weight">Вес</label>
                    <div class="form-row">
                        <div class="col-5 col-lg-3">
                            <input type="number" name="weight" id="weight" step="0.1" placeholder="Вес" class="form-control">
                        </div>
                        <div class="col"> г</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cost">Цена</label>
                    <div class="form-row">
                        <div class="col-5 col-lg-3">
                                <input type="number" name="cost" id="cost" placeholder="Цена" class="form-control">
                        </div>
                        <div class="col"> грн.</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Описание"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="pic">Изображение</label>
                    <input type="file" name="pic" id="image" class="form-control-file">
                </div>

                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </div> 
    </form>
@endsection