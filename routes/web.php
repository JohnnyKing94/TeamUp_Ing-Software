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

/**  Route::get('/', function () {
    return view('home');
}); */
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/profile', 'Profile\ProfileController@show')->name('profile.show')->middleware('auth');
Route::match(['get', 'post'],'user/profile/edit', ['as' => 'profile.edit', 'uses' => 'Profile\ProfileController@edit'])->middleware('auth');
Route::get('project', 'Project\ProjectController@index')->name('project.index')->middleware('auth');
Route::get('project/search', 'Project\ProjectController@search')->name('project.search')->middleware('auth');
Route::get('project/my', 'Project\ProjectController@my')->name('project.my')->middleware('auth');
Route::match(['get', 'post'],'project/create', ['as' => 'project.create', 'uses' => 'Project\ProjectController@create'])->middleware('auth');
Route::get('project/{slug}', 'Project\ProjectController@show')->name('project.show')->middleware('auth');
Route::match(['get', 'post'],'project/{slug}/edit', ['as' => 'project.edit', 'uses' => 'Project\ProjectController@edit'])->middleware('auth');
Route::get('project/{slug}/delete', ['as' => 'project.delete', 'uses' => 'Project\ProjectController@delete'])->middleware('auth');
Route::match(['get', 'post'],'project/{slug}/sponsor', ['as' => 'project.sponsor', 'uses' => 'Project\ProjectController@sponsor'])->middleware('auth');
Route::match(['get', 'post'],'project/{slug}/join/send', 'Project\ProjectController@sendJoin')->name('project.join.send')->middleware('auth');
Route::get('project/{slug}/join/cancel', 'Project\ProjectController@cancelJoin')->name('project.join.cancel')->middleware('auth');
Route::match(['get', 'post'],'project/{slug}/requests', 'Project\ProjectController@manageRequests')->name('project.manageRequests')->middleware('auth');
Route::get('project/{slug}/leave', 'Project\ProjectController@leave')->name('project.leave')->middleware('auth');
Route::match(['get', 'post'],'project/{slug}/teammate/remove', 'Project\ProjectController@removeTeammate')->name('project.removeTeammate')->middleware('auth');
Route::get('project/{slug}/chat', 'Project\ProjectController@chat')->name('project.chat')->middleware('auth');
Route::match(['get', 'post'],'project/{slug}/chat/messages', 'Project\ProjectController@message')->name('project.chat.message')->middleware('auth');
Route::get('admin/users', 'AdminController@indexUsers')->name('admin.user.index')->middleware('auth');
Route::match(['get', 'post'],'admin/{slug}/edit', ['as' => 'admin.user.edit', 'uses' => 'AdminController@editUser'])->middleware('auth');
Route::get('admin/{slug}/delete', ['as' => 'admin.user.delete', 'uses' => 'AdminController@deleteUser'])->middleware('auth');