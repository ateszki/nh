<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*login*/
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return redirect()->to('/');
});

Route::get('/hilados', 'HiladosController@index');
Route::get('/hilados/{codigo}', 'HiladosController@show');
Route::get('/color/{codigo}/imagen/{tamanio}', 'HiladosController@imagen');

Route::get('/acerca-de-nube', function () {
    return view('acerca-de-nube');
});
Route::get('/locales', function () {
    return view('locales');
});
Route::get('/representantes', function () {
    return view('representantes');
});
Route::get('/contacto', function () {
    return view('contacto');
});
Route::get('/como-comprar', function () {
    return view('como-comprar');
});
Route::get('/preguntas-frecuentes', function () {
    return view('preguntas-frecuentes');
});
Route::get('/politica-de-privacidad', function () {
    return view('politica-de-privacidad');
});
Route::get('/terminos-y-condiciones', function () {
    return view('terminos-y-condiciones');
});
/*
revista nube
*/
Route::get('/revista-nube','RevistaController@revistas');
Route::get('/revista-nube/{numero}/pdf','RevistaController@getPdf');
Route::get('/revista-nube/{numero}/tapa','RevistaController@getTapa');
Route::get('/revista-nube/{numero}/sumario','RevistaController@getSumario');
/*fichas de tejido*/
Route::get('fichas-de-tejido/{id}/imagen','FichaController@getImagen');
Route::get('fichas-de-tejido/{id}/pdf','FichaController@getPdf');
Route::resource('fichas-de-tejido', 'FichaController',
                ['only' => ['index', 'show']]);
