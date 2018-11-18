<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\User;

class HomeController extends Controller
{
    public function home(){
        return view('pages.home');
    }
    public function login(){
        return view('pages.login');
    }
    public function postLogin(Request $request){;
        //return 'welcome';
       
        echo $email = $request->email;
        $password=$request->password;

        $obj = User::where('email','=', $email)
                        ->where('password','=',$password)
                        ->first(); 
        if($obj){
            echo 'Successfully Logged in';
            Session::put('userid',$obj->id);
        }
        
    }

    public function logout(Request $request)
   	{
   		$request->session()->flush();
   		return redirect()->route('login');
       }
       public function register(){
           return view('pages.register');
       }
}
