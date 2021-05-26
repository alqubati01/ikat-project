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

use App\Project;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
//    return view('table.index');
return redirect('/projects');
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

//////////////////
Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('/show_projects', 'ProjectController@show_pro')->name('show_projects');
Route::post('/projects', 'ProjectController@create')->name('p_create');
Route::get('/project/{id}', 'ProjectController@show')->name('p_show');
Route::get('/project_belong/{id}', 'ProjectController@show_belong')->name('p_belong_show');
Route::get('/project/edit/{id}','ProjectController@edit')->name('p_edit');
Route::post('/project/edit/{id}','ProjectController@edit')->name('p_editP');
Route::get('/project/delete/{id}','ProjectController@destroy')->name('p_destroy');
Route::get('/project_task/{id}','ProjectController@project_task')->name('project_task');


////////////////////
Route::get('/team', 'TeamController@index')->name('team');
Route::post('/team/add', 'TeamController@store')->name('team_add');
Route::get('/team/delete/{id}', 'TeamController@destroy')->name('team_delete');



////////////////////
Route::post('/project_team/add/{id}', 'ProjectTeamController@store')->name('project_team_add');
Route::get('/project_team/edit/{id}', 'ProjectTeamController@update')->name('project_team_update');
Route::get('/project_team/delete/{id}', 'ProjectTeamController@destroy')->name('project_team_destroy');


////////////////////////
Route::get('/task/{id}', 'TaskController@show')->name('task_show');
Route::get('/task/delete/{id}', 'TaskController@destroy')->name('task_delete');
Route::get('/task/edit/{id}', 'TaskController@edit')->name('task_edit');
Route::post('/task/create/{id}', 'TaskController@store')->name('task_create');



////////////////////////
Route::post('/taskcom/{id}', 'TaskCommentController@store')->name('taskcom_create');

////////////////////////
Route::get('/Posts', 'PostController@index')->name('posts');
Route::post('/post/add', 'PostController@create')->name('post_add');


////////////////////////
Route::post('/post/comment/{id}', 'PostCommentController@create')->name('post_add');

////////////////////////
Route::post('/show_notic', 'NotificationController@show')->name('post_add');
Route::post('/post_notic', 'NotificationController@post_notic')->name('post_notic     ');




////////////////////////
Route::get('/profile/{id}', 'HomeController@edit_profile')->name('edit_profile');
Route::post('/profile/{id}', 'HomeController@edit_profile')->name('edit_profile');
Route::get('/calendar/{id}', 'HomeController@calendar')->name('calendar');




//////////////////
//Route::get('/calendar', function () {
//    $project=Project::all()->pluck('created_at');
////    return $project;
//    $arr =array('data2'=>$project);
//
//    return view('include.calendar',$arr);
//});



//////////Ajax
Route::post('/change_state', 'AjaxController@change_state')->name('Ajax_change_state');
Route::post('/select_project', 'AjaxController@select_project')->name('Ajax_select_project');
