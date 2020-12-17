<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
       
            $finduser = User::where('google_id', $user->id)->first();
       
            if($finduser){
       
                //Auth::login($finduser);
      
                return redirect('/user-dashboard');
       
            }else{
                /*$newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('contrasenyaAleatoria')
                ]);
      
                Auth::login($newUser);*/
      
                return redirect('/user-dashboard');
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
