<?php
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\report_store;
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

Route::get('/', 'Site\HomeController@index');

Route::prefix('painel')->group(function(){
    Route::get('/', 'Admin\HomeController@index')->name('admin');

    Route::get('login', 'Admin\Auth\LoginController@index')->name('login');
    Route::post('login', 'Admin\Auth\LoginController@authenticate')->name('authenticate');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

    Route::get('users', 'Admin\UserController@index')->name('users');
    Route::resource('users', 'Admin\UserController');
    
    Route::get('register', 'Admin\Auth\RegisterController@index')->name('register');
    Route::post('register', 'Admin\Auth\RegisterController@register');

    Route::get('profile', 'Admin\ProfileController@index')->name('profile');
    Route::put('profilesave', 'Admin\ProfileController@save')->name('profile.save');

    Route::get('add-conta', 'Admin\AddContaController@index')->name('addconta');
    Route::post('add-conta-post', 'Admin\AddcontaController@create')->name('add-conta-post');

    Route::get('pagar-conta/{id}', 'Admin\AddContaController@pay')->name('pagarconta');
    Route::post('pagar-conta-post/{id}', 'Admin\AddcontaController@paypost')->name('pagar-conta-post');

    Route::get('todas-contas', 'Admin\VerContasController@index')->name('ver-contas');
    Route::get('contas-em-aberto', 'Admin\VerContasController@open')->name('contas-em-aberto');

    Route::get('contas-resultado-filtro', 'Admin\VerContasController@filteresult')->name('contas-filtro');
    Route::post('contas-resultado-filtro', 'Admin\VerContasController@filterpost')->name('post-filtro');
});
