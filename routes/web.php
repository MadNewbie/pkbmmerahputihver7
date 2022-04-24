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
    // Event
    Route::resource('events','Backyard\EventController', ['names' => 'event']);
    // News
    Route::resource('news','Backyard\NewsController', ['names' => 'news']);
});