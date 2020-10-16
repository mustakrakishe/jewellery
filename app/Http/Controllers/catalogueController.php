<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\addProductRequest;
use App\Models\Product;
use App\Models\ProductType;

use Predis\Connection\ConnectionException;

class catalogueController extends Controller{
    private $productImagePlaceholderPath = 'productImages/placeholder.jpg';

    public function showAllProducts(){
        $products = '';
        try{
            if(!Redis::EXISTS('products')){
                Redis::SET('products', Product::orderBy('updated_at', 'desc')->get());
            }
            $products = json_decode(Redis::GET('products'));
        }catch(ConnectionException $e){
            $products = Product::orderBy('updated_at', 'desc')->get();
        }

        return view('home', ['products' => $products]);
    }

    public function showCatalogue(){
        return view('catalogue', [
            'products' => Product::orderBy('updated_at', 'desc')->get(),
            'types' => ProductType::all()
        ]);
    }

    public function getProguctSelection(request $presentRules){
        $order = $presentRules->orderControl;
        $order_rule = explode(',', $order);        
        $products = Product::orderBy($order_rule[0], $order_rule[1])->get();

        $types = collect($presentRules)->filter(function ($value, $key) {
            return preg_match('|^(type)|', $key);
        });
        
        if(sizeof($types->values())){
            $products = $products->whereIn('product_type_id', $types->values());
        }

        $cost_min = $presentRules['cost-min'];

        if($cost_min != null){
            $products = $products->where('cost', '>=', $cost_min);
        }

         $cost_max = $presentRules['cost-max'];

        if($cost_max != null){
            $products = $products->where('cost', '<=', $cost_max);
        }

        return $products;
}


    public function showOneProduct($id){
        return view('product', ['product' => Product::find($id)]);
    }

    public function getProductTypes(){
        return ProductType::all();
    }
    
    public function showAddProductForm(){
        return view('addProduct', ['types' => ProductType::all()]);
    }

    public function addProduct(addProductRequest $req){
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
            $product->imagePath = $productImagePlaceholderPath;
        }


        $product->save();
        return redirect()->route('catalogue_addProduct')->with('success', 'Продукт успешно добавлен!');
    }

    public function editProduct($productId){
        return view('editProduct', ['types' => ProductType::all(), 'product' => Product::find($productId)]);
    }

    public function deleteProduct($productId){
        // $product = Product::find($id);
        // if($imagePath = $product->imagePath != $productImagePlaceholderPath){
        //     Storage::delete($imagePath);
        // }
        // Product::forget($id);
        // return redirect()->route('catalogue')->with('success', 'Продукт успешно удалён!');
    }

    // public function store(StoreBlogPost $request)
    // {
    //     // The incoming request is valid...

    //     // Retrieve the validated input data...
    //     $validated = $request->validated();
    // }
}
