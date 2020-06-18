<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addProductRequest;
use App\Models\Product;
use App\Models\ProductType;

class catalogueController extends Controller{
    public function showAll(){

    }

    public function getProductTypes(){
        return ProductType::all();
    }
    
    public function showTemplate(){
        return view('addProduct', ['types' => ProductType::all()]);
    }

    public function submit(addProductRequest $req){
        $product = new Product;

        $product->code = $req->input('code');
        $product->title = $req->input('title');

        if(isset($_POST['newType'])){
            $productType = new ProductType();
            $productType->title = $req->input('type');
            $productType->save();

            $productType = ProductType::where('title', $productType->title)->get();
            $product->product_type_id = $productType[0]->id;
        }
        else{
            $product->product_type_id = $req->input('type');
        };

        $product->weight = $req->input('weight');
        $product->cost = $req->input('cost');
        $product->description = $req->input('description');
        $product->imagePath = 'imageLink';

        $product->save();
        return redirect()->route('catalogue_addProduct')->with('success', 'Продукт успешно добавлен!');
    }
}
