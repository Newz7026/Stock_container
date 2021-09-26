<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    // *************************Page Agent**************************
	Route::get('/agent', 'App\Http\Controllers\AgentsController@agent')->name('agent');
	Route::post('/agent/insert-agent', 'App\Http\Controllers\AgentsController@insert_agent');
	Route::post('/agent/delete-agent', 'App\Http\Controllers\AgentsController@delete_agent');
    Route::post('/agent/update-agent', 'App\Http\Controllers\AgentsController@update_agent');


    // *************************Page container**************************
    Route::get('/container-manage', 'App\Http\Controllers\ManagementINController@container_manage')->name('container-manage');
    Route::post('/container-manage/update-container', 'App\Http\Controllers\ManagementINController@update_container');
    Route::post('/container-manage/insert-container', 'App\Http\Controllers\ManagementINController@insert_container');
    Route::post('/container-manage/delete-container', 'App\Http\Controllers\ManagementINController@delete_container');
    Route::post('/container-manage/expose-container', 'App\Http\Controllers\ManagementINController@expose_container');

    // *************************Page Gate In**************************
    Route::get('/gate-in', 'App\Http\Controllers\ManagementINController@gate_in')->name('gate-in');

    // *************************Page Record**************************
    Route::get('/record-manage', 'App\Http\Controllers\ContainerController@record_manage')->name('record-manage');
    Route::post('/record-manage/insert-container', 'App\Http\Controllers\ManagementOUTController@insert_container');
    Route::post('/record-manage/update-container', 'App\Http\Controllers\ManagementOUTController@update_container');


    // *************************Page Gate Out**************************
	Route::get('/gate-out', 'App\Http\Controllers\ManagementOUTController@gate_out')->name('gate-out');

    // *************************Page Export**************************
    Route::get('/export', 'App\Http\Controllers\HomeController@export')->name('export');
    Route::get('/export/pdf', 'App\Http\Controllers\PDFController@export_agent')->name('export-pdf');



    // *************************Page Receipt**************************
	Route::get('/receipt-manage', 'App\Http\Controllers\ContainerController@receipt_manage')->name('receipt-manage');
    Route::get('pdf/{id}', 'App\Http\Controllers\PDFController@pdf')->name('pdf');

	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

