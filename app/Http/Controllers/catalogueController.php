<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addProductRequest;
use App\Models\Product;
use App\Models\ProductType;

class catalogueController extends Controller{
    public function showAll(){

    }
    
    public function showTemplate(){
        return view('addProduct', ['types' => ProductType::all()]);
    }

    public function submit(addProductRequest $req){
        $product = new Product;
        $product->code = $req->input('code');
        $product->title = $req->input('title');
        $product->weight = $req->input('weight');
        $product->cost = $req->input('cost');
        $product->description = $req->input('description');
        $product->imagePath = 'imageLink';

        $product->save();
        return redirect()->route('catalogue_addProduct')->with('success', 'Продукт успешно добавлен!');
    }
}
