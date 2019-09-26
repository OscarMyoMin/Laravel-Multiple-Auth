<?php

namespace App\Http\Controllers\Editor;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:editor');
    }


    public function index(){
    	return view('editor.dashboard');
    }
}
