<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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

Route::get('registration', 'CustomAuthController@registration')->name('registration');
Route::post('/custom-registration', 'CustomAuthController@customRegistration')->name('custom.registration');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');

Route::post('/custom-login', 'CustomAuthController@customLogin')->name('custom.login');
Route::post('/logout', 'CustomAuthController@logout')->name('logout');

Route::get('/post/user/{user_id}', 'PostController@getUserPosts')->name('posts-per-user');
Route::resource('/post', 'PostController');
Route::post('/like/{post_id}', 'LikeController@like')->name('like');
Route::post('/comment/{post_id}', 'CommentController@comment')->name('comment');
