<?php

use App\Http\Controllers\VotesController;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('contents.index');
}); // this is the route for reaching the app index



/*Route::get('/voteView', function () {
    return view('contents.voteView');
}); // creates route to candidate selection view after login*/

 Route::get('/deniedVote', function () { return view('contents.alreadyVote');})->middleware('auth'); 

//Auth::routes();
Auth::routes(['register' => false]);

//Auth::routes(['register' => false]); // this call creates all routes for auth methods except regsiter methods(not necessary in this app)

Route::get('/home', 'HomeController@index')->name('home'); // idk this call at the momement (search about it)

Route::group(['middleware' => ['auth', 'voteState']], function() {
    Route::resource('votes', 'VotesController')->middleware('voteState', 'auth'); // routes every method in VotesController
    Route::get('/results','VotesController@show')->withoutMiddleware(['auth', 'voteState']);
  });

