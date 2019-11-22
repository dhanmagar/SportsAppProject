<?php
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

use App\Http\Controllers\GuzzleControler;

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', function () {
    return view('admin.matches.indexa');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('teams', 'teamController');
    Route::resource('players', 'playerController');
    Route::Resource('matches', 'MatchController');
    Route::get('/matches/{match}/add-scores', 'MatchController@addScores')->name('matches.add_scores');
    Route::post('/matches/{match}/update-scores', 'MatchController@updateScores')->name('matches.update_scores');
    Route::get('/pl', 'GuzzleController@getRemotedata')->name('pl');
});
