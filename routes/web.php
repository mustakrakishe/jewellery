<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('home');
})->name('home');

Route::post(
    'catalogue/addProduct/submit',
    'catalogueController@showAll'
)->name('addProduct_form');

Route::get('/catalogue/addProduct', function(){
    return view('addProduct');
})->name('catalogue_addProduct');

Route::post(
    'catalogue/addProduct/submit',
    'catalogueController@submit'
)->name('addProduct_form');

Route::get('/bag', function(){
})->name('bag');

Route::get('/signin', function(){
})->name('signin');

Route::get('/login', function(){
})->name('login');