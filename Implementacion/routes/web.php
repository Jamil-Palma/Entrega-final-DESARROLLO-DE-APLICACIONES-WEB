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

Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home'); 

// Todas las rutas para gestionar usuarios
Route::get('/usuarios', 'UserController@show')->name('show.users'); 
Route::delete('/usuarios/delete', 'UserController@delete_user')->name('delete.user'); 
Route::get('/cuenta', 'UserController@show_info')->name('show.info'); 
Route::patch('/cuenta/modify', 'UserController@modify_user')->name('modify.user');  

// Todas las rutas para gestionar materias
Route::get('/materia', 'MateriaController@show')->name('show.materia'); 
Route::post('/materia/adicionar', 'MateriaController@add')->name('add.materia'); 
Route::delete('/materia/eliminar', 'MateriaController@delete')->name('eliminar.materia'); 
Route::patch('/materia/modificar', 'MateriaController@modify')->name('modificar.materia'); 

// Todas las rutas para gestionar informes
Route::get('/historial', 'InformeController@show')->name('show.historial');
Route::post('/historial/plan', 'InformeController@addPlan')->name('add.plan'); 
Route::post('/historial/informe', 'InformeController@addInforme')->name('add.informe'); 
Route::get('/historial/{id}', 'InformeController@download')->name('descargar.informe'); 

// Todas las rutas para gestionar la informacion extra
Route::get('/extra', 'InformeController@showExtra')->name('show.extra'); 
Route::post('/extra/modificar', 'InformeController@updateExtra')->name('add.extra'); 

// Todas las rutas para gestionar mensajes
Route::get('/mensaje', 'MensajeController@showAll')->name('show.all'); 
Route::get('/mensaje/nuevo/{id}', 'MensajeController@newMessage')->name('new.message');
Route::post('/mensaje/enviar', 'MensajeController@sendMessage')->name('send.message');
Route::get('/mensaje/buscar','MensajeController@searchMessage')->name('search.message');

// Todas las rutas para gestionar horarios 
Route::get('/horario','HorarioController@show')->name('show.horario');
Route::post('/horario/add', 'HorarioController@add')->name('add.horario');

// Todas las rutas para gestionar aulas
Route::get('/aula','AulaController@show')->name('show.aula');
Route::post('/aula/add', 'AulaController@add')->name('add.aula');
Route::get('/aula/eliminar', 'AulaController@delete')->name('eliminar.aula');

