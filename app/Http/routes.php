<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return view('welcome');
});


Route::get('form', function () {
	return view('form.layout');
});

Route::get('test', function () {
	return view('admin.cate.add');
});

Route::group(['prefix' => 'admin'], function () {
	Route::group(['prefix' => 'cate'], function () {
		Route::get('add', ['as' => 'admin.cat.add', 'uses' => 'CateController@getAdd']);
		Route::post('add', ['as' => 'admin.cat.post', 'uses' => 'CateController@postAdd']);
		Route::get('list', ['as' => 'admin.cat.list', 'uses' => 'CateController@getList']);
		Route::get('delete/{id}', ['as' => 'admin.cat.getDelete', 'uses' => 'CateController@getDelete']);
		Route::get('edit/{id}', ['as' => 'admin.cat.getEdit', 'uses' => 'CateController@getEdit']);
		Route::put('edit/{id}', ['as' => 'admin.cat.postEdit', 'uses' => 'CateController@postEdit']);

	});

	Route::group(['prefix' => 'product'], function () {
		Route::get('list', ['as' => 'admin.product.getList', 'uses' => 'ProductController@getList']);
		Route::get('add', ['as' => 'admin.product.getAdd', 'uses' => 'ProductController@getAdd']);
		Route::post('add', ['as' => 'admin.product.postAdd', 'uses' => 'ProductController@postAdd']);
		Route::get('delete/{id}', ['as' => 'admin.product.getDelete', 'uses' => 'ProductController@getDelete']);
		Route::get('edit/{id}', ['as' => 'admin.product.getEdit', 'uses' => 'ProductController@getEdit']);
		Route::post('edit/{id}', ['as' => 'admin.product.postEdit', 'uses' => 'ProductController@postEdit']);

	});

	Route::group(['prefix' => 'order'], function () {
		Route::get('list', ['as' => 'admin.order.getList', 'uses' => 'OrderController@getList']);
		Route::get('add', ['as' => 'admin.order.getAdd', 'uses' => 'OrderController@getAdd']);
		Route::post('add', ['as' => 'admin.order.postAdd', 'uses' => 'OrderController@postAdd']);
		Route::get('status/{id}', ['as' => 'admin.order.getStatus', 'uses' => 'OrderController@getStatus']);
		Route::get('edit/{id}', ['as' => 'admin.order.getEdit', 'uses' => 'OrderController@getEdit']);
		Route::post('edit/{id}', ['as' => 'admin.order.postEdit', 'uses' => 'OrderController@postEdit']);

	});


});


Route::resource('Cate', 'CateController');



