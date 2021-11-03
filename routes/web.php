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

    Route::get('agendamento/{id}', 'Admin\AgendaController@index')->name('agendamento');
    Route::post('agendamento-post', 'Admin\AgendaController@agendamento_post')->name('agendamento-post');

    Route::get('users', 'Admin\UserController@index')->name('users');
    Route::resource('users', 'Admin\UserController');
    
    Route::get('register', 'Admin\Auth\RegisterController@index')->name('register');
    Route::post('register', 'Admin\Auth\RegisterController@register');

    Route::get('profile', 'Admin\ProfileController@index')->name('profile');
    Route::put('profilesave', 'Admin\ProfileController@save')->name('profile.save');

    Route::get('novo-exame', 'Admin\ExamesController@index')->name('novo-exame');

    Route::get('cadastro-de-paciente', 'Admin\PacientesController@cadastro')->name('cadastro-de-paciente');
    Route::post('cadastro-de-paciente-post', 'Admin\PacientesController@cadastro_post')->name('cadastro-de-paciente-post');

    Route::get('prontuario/nova-consulta/{id}', 'Admin\ConsultasController@index')->name('nova-consulta');

    Route::get('pacientes', 'Admin\PacientesController@index')->name('pacientes');
    Route::post('pacientes-edit/{id}', 'Admin\ProntuariosController@edit')->name('pacientes-edit');

    Route::get('pacientes-filtro', 'Admin\PacientesController@index_filtro')->name('pacientes-filtro');

    Route::get('prontuario/{id}', 'Admin\ProntuariosController@index')->name('prontuario')->middleware('auth');
});
