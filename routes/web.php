<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailController;

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
    return view('welcome');
});

// Routes required for user authentication
Auth::routes();

Route::get('/index', 'PagesController@index');
Route::get('/services', 'PagesController@services');
Route::get('/about', 'PagesController@about');

Route::resource('posts', 'PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/charts', 'PostsController@chart');

Route::get('send_email', 'SendEmailController@index');
Route::post('/send_email/send', 'SendEmailController@send');

// Comment
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

// Admin routes
Route::get('/admin', 'AdminController@admin')
    ->middleware('is_admin')
    ->name('admin');
