<?php

use Illuminate\Support\Facades\Route;
$url_prefix = Config::get('app.app_route_prefix');
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
/*Route::get('/', function () {
    return view('welcome');
});*/
/* General page routes */
Route::get('/', function () {
    return view('frontend.home.welcome');
});
Route::get('/construction', function () {
    return view('backend.errors.under_construction');
});
Route::get('/maintenance', function () {
    return view('backend.errors.under_maintenance');
});
Route::get($url_prefix . '/not_authorized', function () {
    return view('backend.auth.access_denied');
});

//Route::get('/home', 'HomeController@index')->name('home');
/* CRM authenticated multi-admin routes */
Route::group(['prefix' => $url_prefix, 'namespace' => 'AdminModule', 'middleware' => ['authenticate', 'authorize']], function () { 
 });