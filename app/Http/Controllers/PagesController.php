<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
class PagesController extends Controller
{
    public function getPages(){
        return view('backend.pages.pages');
    }
    public function pageAdd(){
        return view('backend.pages.page-add');
    }
    public function pageEdit(){
        return view('backend.pages.page-edit');
    }
}
