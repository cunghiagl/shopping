<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function loginAdmin(){
        return view('login');
    }
    public function postloginAdmin(Request $req){
        $remember = $req->has('remember-me') ? true : false;
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password],$remember)){
            return redirect()->to('home');
        }else{
            return view('login');
        }
    }
}
