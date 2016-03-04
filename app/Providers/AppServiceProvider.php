<?php

namespace App\Providers;

use App\User;
use File;
use Storage;
use App\Ficha;
use Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        User::saving(function ($user) {
            
            if ( $user->password != '' && $user->remember_token == '') {
                $user->password = bcrypt($user->password);
            }
            //return $user;
        });

        Ficha::saving(function($ficha){
            if (Request::hasFile('archivo')) {
                $arch = Request::file('archivo');
                Storage::put('fichas/'.$ficha->id.'.pdf',File::get($arch));
            } 
            if(Request::hasFile('imagen')){
                $arch = Request::file('imagen');
                Storage::put('fichas/'.$ficha->id.'.'.$arch->getClientOriginalExtension(),File::get($arch));
                $data = File::get($arch);
                
            } 
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
