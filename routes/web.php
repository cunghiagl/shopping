<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Frontend
Route::get('/admin','AdminController@loginAdmin');
Route::post('/admin','AdminController@postloginAdmin');
Route::get('/home',function(){
    return view('home');
});
Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/',[
            'as' => 'categories.index',
            'uses' => 'CategoryController@index'
        ]);
        Route::get('/create',[
            'as' => 'categories.create',
            'uses' => 'CategoryController@create'
        ]);
        Route::post('/store',[
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete'
        ]);
        Route::post('/update/{id}',[
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);
    });
    Route::prefix('menus')->group(function () {
        Route::get('/',[
            'as' => 'menus.index',
            'uses' => 'MenusController@index'
        ]);
        Route::get('/create',[
            'as' => 'menus.create',
            'uses' => 'MenusController@create'
        ]);
        Route::post('/store',[
            'as' => 'menus.store',
            'uses' => 'MenusController@store'
        ]);
        Route::get('/edit/{id}',[
            'as' => 'menus.edit',
            'uses' => 'MenusController@edit'
        ]);
        Route::get('/delete/{id}',[
            'as' => 'menus.delete',
            'uses' => 'MenusController@delete'
        ]);
        Route::post('/update/{id}',[
            'as' => 'menus.update',
            'uses' => 'MenusController@update'
        ]);
    });
});
