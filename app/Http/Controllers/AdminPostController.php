<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {

        // if(auth()->guest()){
        //     abort(Response::HTTP_FORBIDDEN);
        // }


        return view('admin.posts.create');
    }
    public function store()
    {

        $attributes = request()->validate([
            'title' => ['required'],
            'thumbnail' => ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => ['required'],
            'body' => ['required'],
            'catagory_id' => ['required', Rule::exists('catagories', 'id')]
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }
    public function edit(Post $post)
    {

        return view('admin.posts.edit', ['post' => $post]);

    }


    public function update(Post $post)
    {

        $attributes = request()->validate([
            'title' => ['required'],
            'thumbnail' => ['image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt' => ['required'],
            'body' => ['required'],
            'catagory_id' => ['required', Rule::exists('catagories', 'id')]
        ]);


        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', "Post Updated");
    }

    // public function update(Post $post, Request $request)
    // {
    //     $attributes = $this->validatePost($post);

    //     if (isset($attributes['thumbnail'])) {
    //         $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails');
    //     }

    //     $post->update($attributes);

    //     return back()->with('success', 'posts updated'); // 404 page when update post slug
    // }


    public function destroy(Post $post)
    {

        if (Storage::exists($post->thumbnail)) {
            Storage::delete($post->thumbnail);
        }
        $post->delete();

        return back()->with('success', "Post Deleted ");
    }
}
