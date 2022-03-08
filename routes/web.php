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

/*Route::get('/', function (){
    return 'Bem vindo ao Procolo Digital CBMSC!!!';
});*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/login', function() { return 'Login'; })->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/cargos', 'CargosController@cargos')->name('app.cargos');
    Route::get('/autoridades', 'AutoridadesController@autoridades')->name('app.autoridades');
});