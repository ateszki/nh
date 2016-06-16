<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InvitadoController extends Controller
{

    public function loginAsGuest(Request $request)
    {
        $request->session()->put('invitado', true);
        return redirect('/hilados');
    }


    public function logoutAsGuest(Request $request)
    {
        $request->session()->forget('invitado');
        return redirect('/');
    }

}
