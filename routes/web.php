<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

//LOGIN
Route::get('/', "AuthController@index");

Route::get('/admin', function () {
    return view('admin-site.Admin-BO');
})->name('admin');


//RUTAS PARA ADMINSTRAR USUARIOS DE CLARO NETWORKS Y BACKOFFICE
Route::group(['prefix' => 'user'], function () {
    Route::post('backoffice', "AdminUserController@getUsersBackoffice");
    Route::post('front', "AdminUserController@getUsersFront");
});

//RUTAS PARA AUTENTICACIÓN
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', "AuthController@signIn")->name("login");
    Route::post('logout', "AuthController@signOut")->name("logout");
});

//RUTA PARA CARGAR CONTENIDO HTML
Route::post('/view', "ViewsController@index");
