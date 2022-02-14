<?php
$namespace_v1 = 'API\V1\\';

/*******************************************/
/***** API Version: V1 Routes - Starts *****/
/*******************************************/

Route::post('/v1/usercreate/', $namespace_v1 . 'UserController@usercreate');
Route::post('/v1/login/', $namespace_v1 . 'UserController@login');
Route::post('/v1/userupdate/', $namespace_v1 . 'UserController@userupdate');
Route::get('/v1/fetchuser/{username?}', $namespace_v1 .'UserController@fetchuser');
Route::get('/v1/userDelete/{username?}', $namespace_v1 .'UserController@userDelete');
Route::get('/v1/logout/', $namespace_v1 .'UserController@logout');


 Route::post('/v1/upload_pets_image/', $namespace_v1 . 'PetsController@upload_pets_image');
 Route::get('/v1/fetchpet/{id?}', $namespace_v1 .'PetsController@fetchpet');
 Route::post('/v1/update_pets/', $namespace_v1 . 'PetsController@update_pets');
 Route::get('/v1/petsDelete/{id?}', $namespace_v1 .'PetsController@petsDelete');


Route::post('/v1/ordercreate/', $namespace_v1 . 'OrderController@ordercreate');
Route::get('/v1/fetchorder/{orderId?}', $namespace_v1 .'OrderController@fetchorder');
Route::get('/v1/orderDelete/{id?}', $namespace_v1 .'OrderController@orderDelete');

Route::group(['middleware' => ['jwt.auth']], function () use ($namespace_v1) {

});
