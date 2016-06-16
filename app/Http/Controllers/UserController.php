<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use Illuminate\Support\Facades\Auth;

//use App\Http\Requests;

class UserController extends Controller
{
    public function postSignUp(Request $request){
    	$this->validate($request,[
    		'email' => 'required|email|unique:users',
    		'first_name' => 'required|min:3|max:120',
    		'password' => 'required|min:3'
    	]);
    	$email=$request["email"];
    	$first_name=$request["first_name"];
    	$password=bcrypt($request["password"]);
    	$user = new User;
    	$user->email=$email;
    	$user->first_name=$first_name;
    	$user->password=$password;
    	$user->save();
    	Auth::login($user);
    	return redirect()->route('dashboard');	
    	//return redirect()->back();	
    }
    public function postSignIn(Request $request){
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required'
    	]);
    	$email = $request['email'];
    	//$password = bcrypt($request['password']);
    	$password = $request['password'];
    	if(Auth::attempt(['email' => $email , 'password' => $password ])){
    		return redirect()->route('dashboard');
    	}
    	//echo 'email : '.$request['email'].'<br/>password : '.$password;
    	return redirect()->back();
    }
    public function getDashBoard(){
    	return view('dashboard');
    }
}
