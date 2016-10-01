<?php
use Illuminate\Support\Facades\Request;
//use Validator;
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
Route::get('auth/login', function(){
    return view('login');
});
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/login-as-guest', 'InvitadoController@loginAsGuest');
Route::get('auth/logout-as-guest','InvitadoController@logoutAsGuest');
    


Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return redirect()->to('/');
});

Route::group(['middleware' => 'invitado'], function () {    
//para acceder a los hilados hay que estar logeado o invitado
    Route::get('/hilados', 'HiladosController@index');
    Route::get('/hilados/{codigo}', 'HiladosController@show');
    Route::get('/color/{codigo}/imagen/{tamanio}', 'HiladosController@imagen');
    Route::get('/accesorios', 'HiladosController@accesorios');
    //Route::get('/trajes-de-banio','MallasController@index');
    Route::get('/trajes-de-banio','MallasController@catalogo');

});

Route::group(['middleware' => 'auth'], function () {
    //carrito
    Route::get('carrito/add','CarritoController@add');
    Route::get('carrito/add/all/{codigo}','CarritoController@addAll');
    Route::get('carrito/remove/{id}','CarritoController@remove');
    Route::get('carrito/update/{rowId}/{cant}','CarritoController@update');
    Route::get('carrito/header-cart','CarritoController@HeaderCart');
    //pedido
    Route::get('revisar-pedido', function(){
        $viewname = (\Cart::count() == 0)?'revisar-pedido-vacio':'revisar-pedido';
        return view($viewname);
    });

    Route::get('confirmar-pedido', 'CarritoController@ConfirmarPedido');
    
});

Route::get('/acerca-de-nube', function () {
    return view('acerca-de-nube');
});
Route::get('/locales', function () {
    return view('locales');
});
Route::get('/representantes', function () {
    return view('representantes');
});

Route::post('/lista-email',function(){
    $validator = Validator::make(Request::all(), [
        'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $e = App\Listaemail::create(['email'=>Request::get('email')]);
        if($e===false){
            Request::session()->flash('alert-danger', 'Ocurrió un error. Por favor intente nuevamente.');
        } else {
            Request::session()->flash('alert-success', 'Su dirección de correo electrónico fue agregada. ¡Muchas gracias!');
        }
        return back();
});


Route::match(['get', 'post'],'/contacto', function () {
    if(Request::isMethod('post')){
        $validator = Validator::make(Request::all(), [
        'nombre' => 'required|string',
        'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('contacto')
                        ->withErrors($validator)
                        ->withInput();
        }
        $envio = Mail::send('email-contacto', ['request' => Request::all()], function ($m) {
           // $m->from(Request::get('email'), Request::get('nombre'));
             $m->from('medesconecto@gmail.com', 'Nube');

            $m->to('valeria@nubehilados.com', 'Valeria')->cc('jonathan@nubehilados.com','Jonathan')->subject('Contacto web nube');
        });

        if($envio){
            Request::session()->flash('alert-success', 'Su mensaje fue enviado. ¡Muchas gracias!');
        } else {
            Request::session()->flash('alert-danger', 'Ocurrió un error. Por favor intente nuevamente.');
        }

    }
    
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
