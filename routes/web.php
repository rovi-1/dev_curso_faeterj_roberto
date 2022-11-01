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

Route::get('/aulas', function () {
    return view('aulas');
});
Route::get('/contato', function () {
    return view('contato');
});

Route::get('/cursoscadastro', function () {
    return view('cadastrar_cursos');
});
Route::get('/', 'CursoController@index');

Route::post('/pesquisar-curso', 'CursoController@pesquisar_curso')->name('pesquisar-curso');

Route::get('/cursos', 'CursoController@index');

Route::get('/curso/{id}', 'CursoController@show_cursos');

//Cadastros
Route::get('/cadastro/cursos', 'CursoController@cadastro');
Route::post('/cadastro/cursos/salvar', 'CursoController@salvar_curso')->name('salvar_curso');

Route::post('/comentar', 'AulaController@comentar')->name('comentar');

Route::get('/login', 'UserController@login');
Route::post('/auth', 'UserController@auth')->name('auth');

Route::get('/cadastro/user', 'UserController@cadastro_user');
Route::post('/cadastro/user/salvar', 'UserController@salvar_user')->name('salvar_user');

//Cadastro modulos
Route::get('/cadastro/modulos', 'CursoController@cadastro_modulos');
Route::post('/cadastro/modulos/salvar', 'CursoController@salvar_modulo')->name('salvar_modulo');

//Cadastro aulas
Route::get('/cadastro/aulas', 'CursoController@cadastro_aulas');
Route::post('/cadastro/aulas/salvar', 'CursoController@salvar_aula')->name('salvar_aula');

Route::get('GetModule', 'CursoController@preencherSub')->name('GetModule');

Route::get('/logout',function(){
    Auth::logout();
    return view('login');
});
