<?php

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

Auth::routes(['register' => false]);

// Backyard

Route::group(['middleware' => ['web','auth','acl'], 'prefix' => 'backyard', 'as' => 'backyard.'], function() {
    Route::get('/', ['uses' => 'Backyard\HomeController@index', 'as' => 'home']);
    Route::resource('users', 'Backyard\UserController', ['names' => 'user']);
    Route::resource('roles', 'Backyard\RoleController', ['names' => 'role']);
    Route::resource('events','Backyard\EventController', ['names' => 'event']);
    Route::resource('news','Backyard\NewsController', ['names' => 'news']);
});