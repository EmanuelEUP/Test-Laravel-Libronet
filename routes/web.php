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

Route::get('/','Controllerinicio@index');
Route::get('home','Controllerhome@index');
Route::get('clientes','Controllerclient@index');

Route::get('usuarios','Controlleruser@index');
Route::get('usuarioslist','Controlleruser@fnclistar');
Route::post('usuariosadd','Controlleruser@fncingreso');
Route::post('usuariosupd','Controlleruser@fncupdate');
Route::post('usuariosdel','Controlleruser@fncdelete');



Route::get('informes','Controllerinfo@index');

Route::get('servicios','Controllerservices@index');




