<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Catagory;
use App\Models\Post;
use App\Models\User;
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

Route::post('newsletter', function () {

    request()->validate([
        'email' => ['required', 'email']
    ]);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us21'
    ]);


   try{
    $response =$mailchimp->lists->addListMember(config('services.mailchimp.user_key'), [
        "email_address" => request('email'),
        "status" => "subscribed",
    ]);
   }catch(\Exception $e){
    throw ValidationException::withMessages([
        'email' => "This email could not be added to our newsletter, try another one"
    ]);
   }


   return redirect('/')->with('success', "You have signed up for the awesome  Newsletter!");
});


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post}', [PostController::class, 'show']);
Route::post('posts/{post}/comments', [PostCommentController::class, 'store']);


Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('session', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');




// Route::get('catagories/{catagory:slug}', function (Catagory $catagory) {
//     // $catagory = Catagory::all();
//     return view('posts', [
//         'posts' => $catagory->posts->load(['catagory', 'author']),
//         'currentCatagory' => $catagory,
//         'catagories' => Catagory::all()
//     ]);
// })->name('catagory');
