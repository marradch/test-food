<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ingridients', 'IngridientController@index')
            ->name('ingridient.index')->middleware('auth');
Route::get('/ingridients/create', 'IngridientController@create')
            ->name('ingridient.create')->middleware('auth');			
Route::post('/ingridients/store', 'IngridientController@store')
            ->name('ingridient.store')->middleware('auth');	
Route::get('ingridients/update/{id}', 'IngridientController@update')
            ->name('ingridient.update')->middleware('auth');
Route::post('ingridients/update/{id}', 'IngridientController@updatePost')
			->name('ingridient.updatePost')->middleware('auth');
Route::get('ingridient/delete/{id}', 'IngridientController@delete')
            ->name('ingridient.delete')->middleware('auth');	

Route::get('/foods', 'FoodController@index')
            ->name('food.index')->middleware('auth');
Route::get('/foods/create', 'FoodController@create')
            ->name('food.create')->middleware('auth');			
Route::post('/foods/store', 'FoodController@store')
            ->name('food.store')->middleware('auth');	
Route::get('foods/update/{id}', 'FoodController@update')
            ->name('food.update')->middleware('auth');
Route::post('foods/update/{id}', 'FoodController@updatePost')
			->name('food.updatePost')->middleware('auth');
Route::get('food/delete/{id}', 'FoodController@delete')
            ->name('food.delete')->middleware('auth');	
Route::get('food/show/{id}', 'FoodController@show')
            ->name('food.show')->middleware('auth');		
Route::post('food/update-count/', 'FoodController@updateCount')->middleware('auth');				