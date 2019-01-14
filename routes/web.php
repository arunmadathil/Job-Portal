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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'/vendor', 'middleware'=>['auth']],function () {
	Route::get('job-post/skills/{id}','Vendor\JobPostsController@skills')->name('job-post.skills');
	Route::Resource('/job-post','Vendor\JobPostsController');
	Route::post('/job-post/add-skills/{id}','Vendor\JobPostsController@addSkills')->name('job-post.add-skills');
	Route::post('/job-post/add-candidate/{id}','Vendor\JobPostsController@addCandidate')->name('job-post.add-candidate');

	Route::get('candidate-info/skills/{id}','Vendor\CandidateController@skills')->name('candidate-info.skills');
	Route::Resource('/candidate-info','Vendor\CandidateController');
	Route::post('/candidate-info/add-skills/{id}','Vendor\CandidateController@addSkills')->name('candidate-info.add-skills');
});
