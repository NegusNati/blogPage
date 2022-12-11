<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


use Illuminate\Http\Request;


class PostCommentController extends Controller
{
    public function store(Post $post){

        
        request()->validate([
            'body'=> ['required']
        ]);

        $post->comment()->create([
            'user_id'=>Auth()->id(),
            'body' => request('body')
        ]);

        return back();
    }
}
