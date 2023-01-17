<?php

use App\Study;

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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('welcome');

Auth::routes();

Route::get('dashboard', 'HomeController@index')->name('home');
Route::get('pricing', 'PageController@pricing')->name('page.pricing');
Route::get('lock', 'PageController@lock')->name('page.lock');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('category', 'CategoryController', ['except' => ['show']]);
    Route::resource('tag', 'TagController', ['except' => ['show']]);
    Route::resource('item', 'ItemController', ['except' => ['show']]);
    Route::resource('role', 'RoleController', ['except' => ['show', 'destroy']]);
    Route::resource('user', 'UserController', ['except' => ['show']]);

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);

    //Sortition Specific:

    //Studies:
    Route::get('/studies/index', [\App\Http\Controllers\StudyController::class, 'index']);
    Route::get('/studies/create', [\App\Http\Controllers\StudyController::class, 'create']);
    Route::post('/studies', [\App\Http\Controllers\StudyController::class, 'store']);
    Route::get('/studies/{study}/edit', [\App\Http\Controllers\StudyController::class, 'edit']);
    Route::get('/studies/{study}', [\App\Http\Controllers\StudyController::class, 'show']);

    //For testing
    Route::get('/testing/create', function(){
        return view('testing.create',[
            'studies'=> Study::all()
        ]);
    });

});


