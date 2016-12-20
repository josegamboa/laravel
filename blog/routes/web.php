<?php
/**
 * @description General Router
 * @author: Jose Gamboa
 * Date: 18/12/2016
 * Time: 2:23 PM
 */
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/**
 * Frontend Router
 * Create the router to display the admin console
 */
Route::get('/', function () {
    $homeController = new  BlogController ();
    return view('welcome',['posts'=>$homeController->getAllPosts()]);
});
/**
 * Admin Router
 * Create the router to display the admin console
 */
Auth::routes();
Route::get('/admin', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'HomeController@logOut');
Route::get('/openblogform/{id?}', 'HomeController@openBlogForm',function(Request $request){

});
Route::get('/deletepost/{id?}', 'HomeController@deletePost',function(Request $request){

});
Route::post('/addpost', 'HomeController@addPost', function (Request $request) {
    //
});


