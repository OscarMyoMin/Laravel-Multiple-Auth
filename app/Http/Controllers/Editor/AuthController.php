<?php

namespace App\Http\Controllers\Editor;

use Hash;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Editor;

class AuthController extends Controller
{
    public function loginForm(){
        return view('editor.auth.login');
    }

    public function login(Request $request){
        $this->validate($request,[
    		'email'=>'required|email',
    		'password'=>'required|min:6'
    	]);
    	//Attempt to log the user in
    	if(Auth::guard('editor')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
    		// if successful, then redirect to their intended Location
    		return redirect()->route('editor.dashboard');
    	}
    	//if unsuccessful, then redirect back to the login with the form data
    	return redirect()->back()->withInput($request->only('email','remember'));
	}

    public function registerForm(){
        return view('editor.auth.register');
    }

    public function register(Request $request){
        $data = Editor::where('email',$request->email)->get();
        if(count($data)>0){
            return redirect()->route('editor.registerForm')->withStauts(__("Editor already exit"));
        }
        else{
            $editor = new Editor;
            $editor->name = $request->name;
            $editor->slug = str_slug($request->name);
            $editor->email = $request->email;
            $editor->password = Hash::make($request->password);
            $editor->save();
            return redirect()->route('editor.registerForm')->withStatus(__('Successfully Register'));
        }

    }
	
	public function logout(){
        Auth::guard('editor')->logout();
        return redirect('/');
    }
}
