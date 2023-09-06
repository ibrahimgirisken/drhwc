<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function test(){
        $data= Post::where('id','1')->first();
        return view('frontend.pages.test.test')->with('data',$data);
    }   
}
