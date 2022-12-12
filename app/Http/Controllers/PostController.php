<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Catagory;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){

    return view('posts.index', [
        'posts' =>  Post::latest()->filter(request()->only('search','catagory','author'))->paginate(6)->withQueryString()

    ]);
    }
    public function show (Post $post){
        return view('posts.show', ['post' => $post]);
    }

    public function create(){

        // if(auth()->guest()){
        //     abort(Response::HTTP_FORBIDDEN);
        // }

       
        return view('posts.create');
    }

}
