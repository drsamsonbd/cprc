<?php

Route::group(['prefix' => 'admin','middleware' => ['assign.guard:admins','jwt.auth']],function ()
{
	Route::post('login', 'AuthController@login');	
});



Route::group([

'middleware' => 'api',
'prefix' => 'auth'

], function ($router) {

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::post('logout', 'AuthController@logout');
Route::post('refresh', 'AuthController@refresh');
Route::post('me', 'AuthController@me');

});

Route::apiResource('/category', 'Api\CategoryController');
Route::apiResource('/user', 'Api\UserController');
Route::apiResource('/department', 'Api\DepartmentController');
Route::apiResource('/finance_category', 'Api\FinanceCategoryController');
Route::apiResource('/items', 'Api\ItemsController');
Route::apiResource('/pku', 'Api\PkuController');
Route::apiResource('/sku', 'Api\SkuController');

Route::post('/password/update/{id}', 'Api\UserController@edit');
Route::post('/password/selfupdate/{id}', 'Api\UserController@selfupdate');