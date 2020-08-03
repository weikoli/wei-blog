<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
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


Route::group(['middleware' => ['web']], function(){
    
    //Authentication Routes
    Route::get('auth/login','Auth\LoginController@attemptLogin');
    // Route::post('auth/login','Auth\LoginController@postLogin');
    Route::get('auth/logout','HomeController@getLogout');
    Route::post('auth/logout','HomeController@postLogout');

    //Registration Routes
    Route::get('auth/register','Auth\RegisterController@attemptRegister');
    // Route::post('auth/register','Auth\RegisterController@postRegister');

    //Categories
    Route::resource('categories','CategoryController',['except' => ['create']]);
    //except 只有這些不要
    //only   只有這些要
    
    //Comments
    Route::post('comments/{post_id}', ['uses' => 'CommentController@store','as' => 'comments.store'] );
    Route::get('comments/{id}/edit',['uses' => 'CommentController@edit','as' => 'comments.edit']);
    Route::put('comments/{id}',['uses' => 'CommentController@update','as' => 'comments.update']);
    Route::delete('comments/{id}',['uses' => 'CommentController@destroy','as' => 'comments.destroy']);
    Route::get('comments/{id}/delete',['uses' => 'CommentController@delete','as' => 'comments.delete']);

    // domain.com/slug-goes-here
    Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
    Route::get('blog',['uses' => 'BlogController@getIndex','as'=>'blog.index']);
    Route::get('contact', 'PagesController@getContact');
    Route::get('about', 'PagesController@getAbout');
    Route::get('/', 'PagesController@getIndex');
    Route::resource('posts','PostController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'PagesController@getIndex')->name('homepage');
