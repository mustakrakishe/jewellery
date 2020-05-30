<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addProductRequest;

class catalogueController extends Controller{
    public function showAll(){
        
    }

    public function submit(addProductRequest $data){
        return dd($data);
    }
}
