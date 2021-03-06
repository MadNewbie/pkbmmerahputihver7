<?php

use App\Models\News;
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

// Homepage
Route::get('/', ['uses' => 'Forecourt\HomeController@homepage', 'as' => 'homepage']);
Route::get('/information', ['uses' => 'Forecourt\HomeController@information', 'as' => 'information']);
Route::get('/program', ['uses' => 'Forecourt\HomeController@program', 'as' => 'program']);
Route::get('/team', ['uses' => 'Forecourt\HomeController@team', 'as' => 'team']);

// Language
Route::get('/language/{lang}', ['uses' => 'Forecourt\LanguageController@changeLanguage', 'as' => 'language.change']);

// News
Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
    Route::post('/indexData', ['uses' => 'Forecourt\NewsController@indexData', 'as' => 'index.data']);
    Route::get('/', ['uses' => 'Forecourt\NewsController@index', 'as' => 'index']);
    Route::get('/show/{id}', ['uses' => 'Forecourt\NewsController@show', 'as' => 'show']);
});

// Event
Route::group(['prefix' => 'event', 'as' => 'event.'], function() {
    Route::post('/indexData', ['uses' => 'Forecourt\EventController@indexData', 'as' => 'index.data']);
    Route::get('/', ['uses' => 'Forecourt\EventController@index', 'as' => 'index']);
    Route::get('/show/{id}', ['uses' => 'Forecourt\EventController@show', 'as' => 'show']);
});

// Auth
Auth::routes(['register' => false]);
Route::get('/logout', ['uses' => 'Auth\LoginController@logout', 'as' => 'logout']);

// Backyard

Route::group(['middleware' => ['web','auth','acl'], 'prefix' => 'backyard', 'as' => 'backyard.'], function() {
    Route::get('/', ['uses' => 'Backyard\HomeController@index', 'as' => 'home']);
    // Role
    Route::get('roles/indexData', ['uses' => 'Backyard\RoleController@indexData', 'as' => 'role.index.data']);
    Route::resource('roles', 'Backyard\RoleController', ['names' => 'role']);
    // User
    Route::get('users/indexData', ['uses' => 'Backyard\UserController@indexData', 'as' => 'user.index.data']);
    Route::resource('users', 'Backyard\UserController', ['names' => 'user']);
    // News
    Route::get('news/indexData', ['uses' => 'Backyard\NewsController@indexData', 'as' => 'news.index.data']);
    Route::get('news/makePublicYes/{id}', ['uses' => 'Backyard\NewsController@makeIsPublicYes', 'as' => 'news.public.yes']);
    Route::get('news/makePublicNo/{id}', ['uses' => 'Backyard\NewsController@makeIsPublicNo', 'as' => 'news.public.no']);
    Route::resource('news','Backyard\NewsController', ['names' => 'news']);
    // Event
    Route::get('events/indexData', ['uses' => 'Backyard\EventController@indexData', 'as' => 'event.index.data']);
    Route::get('events/makePublicYes/{id}', ['uses' => 'Backyard\EventController@makeIsPublicYes', 'as' => 'event.public.yes']);
    Route::get('events/makePublicNo/{id}', ['uses' => 'Backyard\EventController@makeIsPublicNo', 'as' => 'event.public.no']);
    Route::resource('events','Backyard\EventController', ['names' => 'event']);
    // Program
    Route::get('programs/indexData', ['uses' => 'Backyard\ProgramController@indexData', 'as' => 'program.index.data']);
    Route::get('programs/makePublicYes/{id}', ['uses' => 'Backyard\ProgramController@makeIsPublicYes', 'as' => 'program.public.yes']);
    Route::get('programs/makePublicNo/{id}', ['uses' => 'Backyard\ProgramController@makeIsPublicNo', 'as' => 'program.public.no']);
    Route::resource('programs','Backyard\ProgramController', ['names' => 'program']);
});