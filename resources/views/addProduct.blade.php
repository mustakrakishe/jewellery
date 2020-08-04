@extends('layouts.app')

@section('page_title')
    Добавить продукт
@endsection

@section('content')
    <script src="/js/catalogue/addProduct.js"></script>
    
    <h1 class="text-center text-dark mb-3">Добавить продукт</h1>

    <form action="{{ route('addProduct_confirm') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row justify-content-center">
            <div class="col col-md-6">
                <div class="form-group">
                    <label for="code">Артикул</label>
                    <input
                        type="text"
                        name="code"
                        id="code"
                        class="form-control @error('code') is-invalid @enderror"
                        placeholder="Артикул"
                        value="{{ old('code') }}"
                        required
                        autofocus
                    >
                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Название</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control @error('title') is-invalid @enderror"
                        placeholder="Название"
                        value="{{ old('title') }}"
                        required
                    >
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type">Тип</label>

                    <div class="form-row">
                        <div class="col-5 col-lg-3">
                            @if(!old('newType'))
                                <select class="custom-select" name="type" id="type">
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}"
                                            <?php
                                                if(old('type') == $type->id){
                                                    echo 'selected';
                                                }
                                            ?>
                                        >{{ $type->title }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input
                                    type="text"
                                    name="type"
                                    id="type"
                                    class="form-control @error('type') is-invalid @enderror"
                                    placeholder="Тип"
                                    value="{{ old('type') }}"
                                    required
                                >
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @endif
                        </div>
                        <div class="col-5 col-lg-4">
                            <input
                                type="checkbox" name="newType" id="newType"
                                <?php
                                    if(old('newType')){
                                        echo 'checked';
                                    }
                                ?>
                            >
                            <label for="newType">Новый</label>
                        </div>
                    </div>

                    
                </div>

                <div class="form-group">
                    <label for="weight">Вес</label>
                    <div class="form-row">
                        <div class="col-5 col-lg-3">
                            <input
                                type="number"
                                name="weight"
                                id="weight"
                                class="form-control @error('weight') is-invalid @enderror"
                                step="0.01"
                                placeholder="Вес"
                                value="{{ old('weight') }}"
                                required
                            >
                            @error('weight')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col"> г</div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cost">Цена</label>
                    <div class="form-row">
                        <div class="col-5 col-lg-3">
                                <input
                                    type="number"
                                    name="cost"
                                    id="cost"
                                    class="form-control  @error('cost') is-invalid @enderror"
                                    placeholder="Цена"
                                    value="{{ old('cost') }}"
                                    required
                                >
                                @error('cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="col"> грн.</div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea
                        name="description"
                        id="description"
                        class="form-control  @error('description') is-invalid @enderror"
                        cols="30"
                        rows="10"
                        placeholder="Описание"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="pic">Изображение</label>
                    <input
                        type="file"
                        name="pic"
                        id="pic"
                        class="form-control-file @error('pic') is-invalid @enderror"
                    >
                    @error('pic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </div> 
    </form>
@endsection