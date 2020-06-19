<?php

use Illuminate\Support\Facades\Route;

Route::get('/',
    'catalogueController@showAllProducts'
)->name('home');

Route::get('/catalogue/product_{id}',
    'catalogueController@showOneProduct'
)->name('catalogue_showOneProduct');

Route::get('/catalogue/addProduct',
    'catalogueController@showTemplate'
)->name('catalogue_addProduct');

Route::get(
    'catalogue/addProduct/getProductTypes',
    'catalogueController@getProductTypes'
)->name('catalogue_addProduct_getProductTypes');

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