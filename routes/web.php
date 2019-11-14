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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('teams', 'teamController');
Route::resource('players', 'playerController');
Route::Resource('matches','MatchController');
Route::get('/matches/{match}/add-scores', 'MatchController@addScores')->name('matches.add_scores');
Route::post('/matches/{match}/update-scores', 'MatchController@updateScores')->name('matches.update_scores');
// Route::group(['prefix'=>'matches'], function(){
//     Route::Resource('/{match}/add-score','GoalController');
// });
// Route::resource('goals','GoalController');


