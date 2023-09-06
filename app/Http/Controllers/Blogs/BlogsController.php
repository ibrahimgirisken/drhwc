<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function getBlogs(){
        return view('backend.blog.blogs');
    }
    public function blogAdd(){
        return view('backend.blog.blog-add');
    }
    public function blogEdit(){
        return view('backend.blog.blog-category-add');
    }
    public function blogCategory(){
        return view('backend.blog.blog-category');
    }
    public function blogCategoryAdd(){
        return view('backend.blog.blog-category-add');
    }
    public function blogCategoryEdit(){
        return view('backend.blog.blog-category-add');
    }
    public function getBlogPage(){
        return view('frontend.pages.blog');
    }
}
