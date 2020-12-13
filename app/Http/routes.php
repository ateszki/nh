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

Route::get('/tester','TesterController@testerForm');
Route::post('/tester','TesterController@tester');


//habiltar esto para compra con usuarios invitados
//Route::group(['middleware' => 'invitado'], function () {    
    //para acceder a los hilados hay que estar logeado o invitado
    Route::get('/catalogo/pdf/{temporada}/{formato}/{presentacion?}', 'HiladosController@catalogoPdf');
//antes hilados angosto
    /*
    Route::get('/hilados', 'HiladosController@index');
    Route::get('/hilados/wide', 'HiladosController@indexWide');
    Route::get('/hilados/wide/{codigo}/{pdf?}', 'HiladosController@showWide');
    Route::get('/hilados/{codigo}', 'HiladosController@show');
    */
//ahora 25/03/2019 hilados wide
    Route::get('/hilados', 'HiladosController@indexWide');
    Route::get('/hilados/{codigo}/{pdf?}', 'HiladosController@showWide');
//fin hilados wide 25/03/2019
// mayorista 17/05/2020
    Route::get('/mayorista', 'HiladosController@indexWideCatalogo')->name('mayorista');
    Route::get('/mayorista/{codigo}/{pdf?}', 'HiladosController@showWideCatalogo')->name('mayorista-hilados');
// fin mayorista 
// catalogo 28/07/2020
    Route::get('/catalogo', 'HiladosController@indexWideCatalogo')->name('catalogo');
    Route::get('/catalogo/{codigo}/{pdf?}', 'HiladosController@showWideCatalogo')->name('catalogo-hilados');

// fin catalogo   
    Route::get('/color/{codigo}/imagen/{tamanio}', 'HiladosController@imagen');
    Route::get('/accesorios', 'HiladosController@accesorios');
    Route::get('/trajes-de-banio','MallasController@catalogo');
//});
//cierra el comment de compra con usuarios invitados

//habiltar esto para compra con usuarios
//Route::group(['middleware' => 'auth'], function () {
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
    })->name('revisar-pedido');
    Route::post('confirmar-pedido', 'CarritoController@ConfirmarPedido');
//});
//cierra el comment de compra con usuarios

Route::get('/acerca-de-nube', function () {
    return view('acerca-de-nube');
});
Route::get('/locales', function () {
    return Redirect::to('/donde-encontrarnos', 301); 
});
Route::get('/donde-encontrarnos', function () {
    return view('dondeencontrarnos');
});
Route::get('/representantes', function () {
    return Redirect::to('/ser-representante', 301); 
});
Route::get('/ser-representante', function () {
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
            Request::session()->flash('alert-newsletter-danger', 'Ocurrió un error. Por favor intente nuevamente.');
        } else {
            Request::session()->flash('alert-newsletter-success', 'Su dirección de correo electrónico fue agregada. ¡Muchas gracias!');
        }
        return back();
});


Route::match(['get', 'post'],'/contacto', function () {
    if(Request::isMethod('post')){
        $validator = Validator::make(Request::all(), [
        'nombre' => 'required|string',
        'email' => 'required|email',
        'provincia' => 'required|string',
        'localidad' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('contacto')
                        ->withErrors($validator)
                        ->withInput();
        }
        $first_name = Request::get('first_name');

        if(!empty($first_name)){
            abort(404);
        }
        $envio = Mail::send('email-contacto', ['request' => Request::all()], function ($m) {
           // $m->from(Request::get('email'), Request::get('nombre'));
             //$m->from('medesconecto@gmail.com', 'Nube');
             $m->from('info@nubehilados.com', 'Nube');
             $m->replyTo(Request::get('email'), Request::get('nombre'));

            $m->to('valeria@nubehilados.com', 'Valeria')->cc('jonathan@nubehilados.com','Jonathan')->subject('Contacto web nube');
        });

        //if($envio){
            Request::session()->flash('alert-success', 'Su mensaje fue enviado. ¡Muchas gracias!');
        //} else {
        //    Request::session()->flash('alert-danger', 'Ocurrió un error. Por favor intente nuevamente.');
        //}

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
