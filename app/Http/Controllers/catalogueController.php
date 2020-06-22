<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addProductRequest;
use App\Models\Product;
use App\Models\ProductType;

class catalogueController extends Controller{
    public function showAllProducts(){
        return view('home', ['products' => Product::orderBy('updated_at', 'desc')->get()]);
    }

    public function showOneProduct($id){
        return view('product', ['product' => Product::find($id)]);
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

        if(isset($req->newType)){
            $productType = new ProductType();
            $productType->title = $req->input('type');
            $productType->save();

            $product->product_type_id = $productType->id;
        }
        else{
            $product->product_type_id = $req->input('type');
        };

        $product->weight = $req->input('weight');
        $product->cost = $req->input('cost');
        $product->description = $req->input('description');

        if($req->has('pic')){
            $product->imagePath = $req->pic->store('productImages', 'public');
        }
        else{
            $product->imagePath = 'productImages/placeholder.jpg';
        }


        $product->save();
        return redirect()->route('catalogue_addProduct')->with('success', 'Продукт успешно добавлен!');
    }
}
