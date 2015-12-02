<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['uses' => 'MainController@index']);
Route::get('/about-us', ['uses' => 'MainController@about']);
Route::get('/projects', ['uses' => 'MainController@allProjects']);
Route::get('/projects/{project}', ['uses' => 'MainController@project']);
Route::get('/contact-us', ['uses' => 'MainController@contact']);
Route::post('/contact-us', ['uses' => 'MainController@sendEmail', 'as' => 'sendEmail']);
Route::get('/careers',['uses'=>'MainController@careers']);
Route::get('/careers/{position}',['uses'=>'MainController@career']);
Route::get('/careers/{position}/apply',['uses' => 'MainController@apply']);
Route::post('/careers/{position}/apply',['uses' => 'MainController@storeApplication', 'as' => 'storeApplication']);

//projects
Route::get('/admin/projects', ['uses'=>'ProjectController@index']);
Route::get('/admin/projects/add', ['uses'=>'ProjectController@add']);
Route::post('/admin/projects/add', ['uses'=>'ProjectController@store', 'as' => 'storeProject']);
Route::get('/admin/projects/{id}/edit', ['uses'=>'ProjectController@edit']);
Route::post('/admin/projects/{id}/edit', ['uses'=>'ProjectController@update', 'as' => 'updateProject']);
Route::get('/admin/projects/{id}/delete', ['uses'=>'ProjectController@destroy']);

//Team
Route::get('/admin/team', ['uses'=>'TeamController@index']);
Route::get('/admin/team/add', ['uses'=>'TeamController@create']);
Route::post('/admin/team/add', ['uses'=>'TeamController@store', 'as' => 'storeMember']);
Route::get('/admin/team/{id}/edit', ['uses'=>'TeamController@edit']);
Route::post('/admin/team/{id}/edit', ['uses'=>'TeamController@update', 'as' => 'updateMember']);
Route::get('/admin/team/{id}/delete', ['uses'=>'TeamController@destroy']);

//careers
Route::get('/admin/careers', ['uses'=>'CareerController@index']);
Route::get('/admin/careers/add', ['uses'=>'CareerController@create']);
Route::post('/admin/careers/add', ['uses'=>'CareerController@store', 'as' => 'storeCareer']);

//locations
Route::get('/admin/locations', ['uses'=>'LocationController@index']);
Route::get('/admin/locations/add', ['uses'=>'LocationController@create']);
Route::post('/admin/locations/add', ['uses'=>'LocationController@store','as' => 'storeLocation']);

//photos
Route::get('/admin/photos', ['uses'=>'PhotoController@index']);
Route::get('/admin/photos/add', ['uses'=>'PhotoController@create']);
Route::post('/admin/photos/add', ['uses'=>'PhotoController@store','as' => 'storePhoto']);

//duties
Route::get('/admin/duties', ['uses'=>'DutyController@index']);
Route::get('/admin/duties/add', ['uses'=>'DutyController@create']);
Route::post('/admin/duties/add', ['uses'=>'DutyController@store', 'as' => 'storeDuty']);

//requirements
Route::get('/admin/requirements', ['uses'=>'RequirementController@index']);
Route::get('/admin/requirements/add', ['uses'=>'RequirementController@create']);
Route::post('/admin/requirements/add', ['uses'=>'RequirementController@store', 'as' => 'storeRequirement']);

//skills
Route::get('/admin/skills', ['uses'=>'SkillController@index']);
Route::get('/admin/skills/add', ['uses'=>'SkillController@create']);
Route::post('/admin/skills/add', ['uses'=>'SkillController@store', 'as' => 'storeSkill']);
//Route::get('/email',['uses'=>'MainController@showemail']);

// Authentication routes...
Route::get('admin/login', 'Auth\AuthController@getLogin');
Route::post('admin/login', 'Auth\AuthController@postLogin');
Route::get('admin/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('admin/register', ['uses' => 'Auth\AuthController@getRegister']);
Route::post('admin/register', ['uses' => 'Auth\AuthController@postRegister']);
