<?php

use Illuminate\Support\Facades\Route;

Route::get('/',
    'catalogueController@showAllProducts'
)->name('home');

Route::any('/catalogue',
    'catalogueController@showCatalogue'
)->name('catalogue');

    Route::get('/catalogue/addProduct',
        'catalogueController@showAddProductForm'
    )->middleware('role:admin')->name('catalogue_addProduct');

        Route::get(
            '/catalogue/addProduct/getProductTypes',
            'catalogueController@getProductTypes'
        )->name('catalogue_addProduct_getProductTypes');

        Route::post(
            '/catalogue/addProduct/confirm',
            'catalogueController@addProduct'
        )->name('catalogue_addProduct_confirm');

    Route::post('/catalogue/getProguctSelection',
        'catalogueController@getProguctSelection'
    )->name('catalogue_getProguctSelection');

    Route::get('/catalogue/product_{id}',
        'catalogueController@showOneProduct'
    )->name('catalogue_showOneProduct');

    Route::get('/catalogue/product_{id}/edit',
        'catalogueController@showEditProductForm'
    )->name('catalogue_showEditProductForm');

    Route::post('/catalogue/product_{id}/edit/confirm',
        'catalogueController@editProduct'
    )->name('catalogue_editProduct');

    Route::get('/catalogue/product_{id}/delete',
        'catalogueController@deleteProduct'
    )->middleware('role:admin')->name('catalogue_deleteProduct');

Route::get('/bag', function(){
})->name('bag');

Route::get(
    '/logout',
    function(){
        Auth::logout();
        return redirect('/');
    });

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
