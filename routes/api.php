<?php
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

