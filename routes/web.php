<?php

use App\Http\Controllers\PostController;
use App\Models\Catagory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post}', [PostController::class, 'show']);


Route::get('catagories/{catagory:slug}', function (Catagory $catagory) {
    // $catagory = Catagory::all();
    return view('posts', [
        'posts' => $catagory->posts->load(['catagory', 'author']),
        'currentCatagory' => $catagory,
        'catagories' => Catagory::all()
    ]);
})->name('catagory');

Route::get('authors/{author:userName}', function (User $author) {

    return view('posts', ['posts' => $author->posts->load(['catagory', 'author']), 'catagories' => Catagory::all()]);
});
// ->where('post', '[A-z_\-]+');
