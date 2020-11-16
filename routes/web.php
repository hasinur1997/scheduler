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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'team', 'middleware' => 'auth'], function () {
    
    // Team operations
    Route::get('/create', 'TeamController@create');
    Route::post('/store', 'TeamController@store');
    Route::get('/edit', 'TeamController@edit');
    Route::put('/update/{team}', 'TeamController@update');

    // Switch team
    Route::get('/switch/{team}', 'TeamController@switch');

    // Invite users for team
    Route::post('/invite/{team}', 'InviteController@invite');
    Route::get('/invite', 'InviteController@create');

    // Team Users
    Route::get('/{team}/users', 'TeamController@users');
    Route::get('/{team}/members', 'TeamController@getMembers');
    Route::get('/{team}/users/{user}/profile', 'ProfileController@index');
    Route::put('/{team}/users/{user}/update', 'ProfileController@update');

    // Projects
    Route::get('/{team}/projects/{project}/users', 'ProjectController@getUsers');
    Route::post('/{team}/projects/{project}/users', 'ProjectController@assignedUser');
    Route::resource('/{team}/projects', 'ProjectController');

    // Tasks
    Route::resource('/{team}/projects/{project}/tasks', 'TaskController');

    // Subtask
    Route::resource('/{task}/subtasks', 'SubTaskController');

    // Notices
    Route::resource('/{team}/projects/{project}/notices', 'NoticeController');

    // Milestones
    Route::resource('/{team}/projects/{project}/milestones', 'MilestoneController');

    // Project overview

});

Route::get('/team/{team}/invite/{token}/{email}', 'InviteController@accept');
Route::get('/team/decliend', 'InviteController@decliend');

Route::group(['middleware' => 'auth'], function () {
    // Abilites
    Route::get('/abilities/list', 'AbilityController@getAbilityList');
    Route::resource('/abilities', 'AbilityController');

    // Roles
    Route::resource('/roles', 'RoleController');
});
