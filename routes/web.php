<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Catagory;
use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
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

Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('session', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

// Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
// Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
// Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');

// Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('admin');
// Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
// Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');


Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('admin');
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/posts/edit/{post:id}', [AdminPostController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/update/{post:id}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/delete/{post:id}', [AdminPostController::class, 'destroy'])->middleware('admin');

// Route::prefix('admin')->middleware('admin')->group(function() {
//     Route::post('posts', [AdminPostController::class, 'store']);
//     Route::get('posts/create', [AdminPostController::class, 'create']);
//     Route::get('posts', [AdminPostController::class, 'index']);
//     Route::get('posts/{post}/edit', [AdminPostController::class, 'edit']);
//     Route::patch('posts/{post}', [AdminPostController::class, 'update']);
//     Route::delete('posts/{post}', [AdminPostController::class, 'destroy']);
// });





// Route::get('catagories/{catagory:slug}', function (Catagory $catagory) {
//     // $catagory = Catagory::all();
//     return view('posts', [
//         'posts' => $catagory->posts->load(['catagory', 'author']),
//         'currentCatagory' => $catagory,
//         'catagories' => Catagory::all()
//     ]);
// })->name('catagory');
