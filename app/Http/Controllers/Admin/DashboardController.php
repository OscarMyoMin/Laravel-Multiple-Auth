<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index(){
    	//return "Hello Admin - ".Auth::user()->name;
    	return view('admin.dashboard');
    }
}
