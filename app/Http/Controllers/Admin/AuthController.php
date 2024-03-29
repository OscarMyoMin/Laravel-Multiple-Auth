<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function loginForm(){
        return view('admin.auth.login');
    }

    public function login(Request $request){
        $this->validate($request,[
    		'email'=>'required|email',
    		'password'=>'required|min:6'
    	]);
    	//Attempt to log the user in
    	if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
    		// if successful, then redirect to their intended Location
    		return redirect()->route('admin.dashboard');
    	}
    	//if unsuccessful, then redirect back to the login with the form data
    	return redirect()->back()->withInput($request->only('email','remember'));
	}
	
	public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }

}
