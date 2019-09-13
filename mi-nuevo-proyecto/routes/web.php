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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Pacientes

Route::get('/pacientes','PacientesController@index')->name('pacientes');

Route::post('/paciente' , 'PacientesController@store')->name('paciente');

Route::get('/paciente/editar/{id}' , 'PacientesController@edit')->name('editarpaciente');

Route::put('/paciente/update/{id}' , 'PacientesController@update')->name('updatepaciente');

Route::delete('/paciente/eliminar/{id}' , 'PacientesController@destroy')->name('eliminarpaciente');


//Especialidades

Route::get('/especialidades','EspecialidadesController@index')->name('especialidades');

Route::post('/especialidad' , 'EspecialidadesController@store')->name('especialidad');

Route::get('/especialidad/editar/{id}' , 'EspecialidadesController@edit')->name('editarespecialidad');

Route::put('/especialidad/update/{id}' , 'EspecialidadesController@update')->name('updateespecialidad');

Route::delete('/especialidad/eliminar/{id}' , 'EspecialidadesController@destroy')->name('eliminarespecialidad');

Route::get('/especialidad/doctores/{id}')->name('doctoresasignados');


//Medicos

Route::get('/medicos','MedicosController@index')->name('medicos');

Route::post('/medico' , 'MedicosController@store')->name('medico');

Route::get('/medico/editar/{id}' , 'MedicosController@edit')->name('editarmedico');

Route::put('/medico/update/{id}' , 'MedicosController@update')->name('updatemedico');

Route::delete('/medico/eliminar/{id}' , 'MedicosController@destroy')->name('eliminarmedico');



//Atencion

Route::get('/atenciones','AtencionController@index')->name('atenciones');

Route::post('/atencion' , 'AtencionController@store')->name('atencion');

Route::get('/atencion/ver/{id}' , 'AtencionController@edit')->name('veratencion');

Route::put('/atencion/update/{id}' , 'AtencionController@update')->name('updateatencion');

Route::delete('/atencion/eliminar/{id}' , 'AtencionController@destroy')->name('eliminaratencion');



//Atencion

Route::get('/masignados','MedicosAsignadosController@index')->name('masignados');

Route::post('/masignado' , 'MedicosAsignadosController@store')->name('masignado');


Route::delete('/masignado/eliminar/{id}' , 'AtencionController@destroy')->name('eliminaratencion');


