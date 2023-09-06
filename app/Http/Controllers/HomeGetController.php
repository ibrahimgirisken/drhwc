<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeGetController extends Controller
{
    public function index(){
        return view("backend.index");
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
    
    public function getSite(){
        return view('frontend.index');
    }
}
