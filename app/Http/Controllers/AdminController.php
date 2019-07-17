<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(){
		$this->middleware('admin');
		$this->middleware('preventBackHistory');
	}

    public function index(){
    	// return \Auth::guard('admin');
    	// return "hello";
    	return view('admin.home');
    }


}
