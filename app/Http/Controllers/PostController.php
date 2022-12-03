<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Catagory;

class PostController extends Controller
{
    public function index(){

    return view('posts', [
        'posts' =>  Post::latest()->filter(request()->only('search'))->get(),
        'catagories' => Catagory::all()
    ]);
    }
    public function show (Post $post){
        return view('post', ['post' => $post]);
    }


}
