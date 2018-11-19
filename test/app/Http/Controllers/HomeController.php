<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\User;
use DB;
use App\Quotation;
use App\Category;

class HomeController extends Controller
{
    public function home(){
        return view('pages.home');
    }
    public function index(){
        return view('pages.index');
    }
    public function login(){
        return view('pages.login');
    }
    public function postLogin(Request $request){
        //return 'welcome';
       
        echo $email = $request->email;
       echo $password=$request->password;

        $obj = User::where('email','=', $email)
                        ->where('password','=',$password)
                        ->first();
        //dd($obj);                 
        if($obj){
            //echo 'Successfully Logged in';
            Session::put('userid',$obj->id);
            return redirect('/index');
        }
        else{
            return redirect()->back();
            //return redirect()->back()->with('checkbox',"your input is wrong");
            
        }
    }
//_____________________REGISTER_____________________________
    public function register(){
        return view('pages.register');
    }

    public function store(Request $request){
    	$obj = new User();  //app/User.php file e extends korate hobe
    	$obj->name = $request->name;
    	$obj->email = $request->email;
    	$obj->password = $request->password;
    	if($obj->save()){
    	    return redirect('login');
    		//echo 'Successfully Inserted';
    	}
    }

    

       
}
/*
public function logout(Request $request)
   	{
   		$request->session()->flush();
   		return redirect()->route('login');
       }
       public function register(){
           return view('pages.register');
       }
       public function posRegister(Request $request){
        //echo 'welcome';
       
        $name = $request->name;//firstname =username
        $email = $request->email;
        $password=$request->password;

        DB::table('users')->insert([
            ['name' => $name],
            ['password' => $password],
            ['email' => $email]
        ]);
        
      
         echo 'Successfully saved';
      
    }
*/
/*

public function posRegister(Request $request){
        //echo 'welcome';
        $ob=new Category();
        $ob->name=$request->name;
        $ob->email=$request->email;
        $ob->name=$password->password;

        $ob->postRegister();

        //return redirect('');
      
         echo 'Successfully saved';
      
    }
*/