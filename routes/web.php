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

Route::redirect('login', 'login/github');

Route::get('login/github', 'Auth\LoginController@redirectToProvider')->name('login');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');

Route::get('talks/create', 'TalksController@create')->middleware('auth')->name('talks.create');
Route::post('talks', 'TalksController@store')->middleware('auth')->name('talks.store');
Route::get('talks/{talk}', 'TalksController@show')->middleware('auth')->name('talks.show');

Route::post('talks/{talk}/like', 'TalkLikesController@store')->middleware('auth')->name('talk.like');
Route::delete('talks/{talk}/like', 'TalkLikesController@destroy')->middleware('auth')->name('talk.unlike');

Route::post('talks/{talk}/contact-speaker', 'ContactSpeakerForTalk')->middleware('auth')->name('contact-speaker-for-talk');
