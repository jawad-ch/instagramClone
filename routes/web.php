<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/testUpdtae', [ProfileController::class, 'update'])->name("testUpdate");
Route::get('/login', function () {
    return view('auth.login');
})->name("login");
// Route::resource('/{user:username}', ProfileController::class);
Route::get('/{user:username}', [ProfileController::class, 'index'])->name('profile');
Route::get('/{user:username}/edit', [ProfileController::class, 'edit'])->name('editProfile');
Route::PATCH('/{user:username}/update', [ProfileController::class, 'update'])->name('updateProfile');
Route::resource('/p', PostController::class);


Route::post('/follow', [FollowesController::class, 'follow'])->name('follow');
Route::post('/unfollow', [FollowesController::class, 'unfollow'])->name('unfollow');
Route::get('/followers', [FollowesController::class, 'followers'])->name('getFollowers');
Route::get('/followings', [FollowesController::class, 'followings'])->name('getFollowings');
Route::post('/like', [LikeController::class, 'like'])->name('like');
Route::post('/comment', [CommentController::class, 'store'])->name('addComment');

Route::get('/{username}/createPost', function () {
    return view('profile.create');
})->name("addpost");
// Route::get('/{username}/edit', function () {
//     return view('profile.editProfile');
// })->name("editProfile");
Route::get('/p/{id}/', function () {
    return view('home.singlePost');
})->name("singlePost");
