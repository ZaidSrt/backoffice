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
Route::get('/', "LoginController@index");

Route::get('/admin', function () {
    return view('admin-site.Admin-BO');
});


//RUTA PARA CARGAR CONTENIDO HTML
Route::post('/view', "ViewsController@index");
