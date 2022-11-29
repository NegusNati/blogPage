<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use League\CommonMark\Extension\FrontMatter\FrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // $files =  File::files(resource_path("posts/"));

    $posts = Post::all();

    // $posts =array_map(function ($file){
    //     $document =  YamlFrontMatter::parseFile($file);
    //     return new Post($document->title, $document->excerpt, $document->date, $document->body(), $document->slug);
    // },$files);


    // dd($posts);


    return view('posts', ['posts' => $posts]);
});

Route::get('posts/{post}', function ($id) {
    $post = Post::findOrFail($id);
    return view('post', ['post' => $post]);
});

// ->where('post', '[A-z_\-]+');
