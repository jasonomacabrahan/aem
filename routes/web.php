<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityAttendanceController;
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

Route::get('send-mail/{email}', 'App\Http\Controllers\UserController@sendconfirmationcode')->name('send-mail');
Route::get('/challenge', 'App\Http\Controllers\UserController@challenge')->name('challenge');
	

Route::get('register', ['as' => 'auth.register', 'uses' => 'App\Http\Controllers\UserController@regnew']);
Route::get('register', ['as' => 'auth.register', 'uses' => 'App\Http\Controllers\UserController@regnew']);
Route::post('/regnew', [UserController::class, 'regnew'])->name('regnew');
Route::post('sendEmailReminder', 'App\Http\Controllers\UserController@sendEmailReminder')->name('sendEmailReminder');
Auth::routes();
Route::get('/welcome', 'App\Http\Controllers\HomeController@welcome')->name('welcome');
Route::group(['middleware'=>['focal']],function(){
	Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
	//Route::view('userchallenge');
});

Route::group(['middleware' => 'auth'], function () {
	
	
	Route::group(['middleware'=>['registrant']],function(){
		
	});
	Route::group(['middleware'=>['admin']],function(){
	
	});

	Route::get('programs.index', ['as' => 'programs.index', 'uses' => 'App\Http\Controllers\ProgramController@index']);
	Route::view('programs.add','programs.add');
	Route::post('programs.add', ['as' => 'programs.add', 'uses' => 'App\Http\Controllers\ProgramController@create']);
	Route::get('activity.index', ['as' => 'activity.index', 'uses' => 'App\Http\Controllers\ActivityController@index']);
	Route::view('activity.add','activity.add');
	Route::post('activity.add', ['as' => 'activity.add', 'uses' => 'App\Http\Controllers\ActivityController@create']);
	Route::get('activity/{id}', 'App\Http\Controllers\ActivityAttendanceController@attendance')->name('activity');
	Route::get('expenses', ['as' => 'activity.expenses', 'uses' => 'App\Http\Controllers\ActivityExpenseController@index']);
	Route::view('activity.addexpense','activity.addexpense')->name('activity.addexpense');
	Route::post('/addexpense', 'App\Http\Controllers\ActivityExpenseController@create')->name('addexpense');
	Route::get('/usertrainings', 'App\Http\Controllers\ActivityAttendanceController@usertrainings')->name('usertrainings');
	Route::get('/getuser/{id}', 'App\Http\Controllers\UserController@getuser')->name('getuser');//just for getting user id
	Route::post('/saveuserupdate', 'App\Http\Controllers\UserController@saveuserupdate')->name('saveuserupdate');//just for updating user account and level
	Route::get('/updateexpenses/{id}', 'App\Http\Controllers\ActivityExpenseController@updateexpense');
	Route::post('/saveexpensesupdate', 'App\Http\Controllers\ActivityExpenseController@saveexpenseupdate')->name('saveexpensesupdate');
	Route::get('tasks.index', ['as' => 'tasks.index', 'uses' => 'App\Http\Controllers\TaskAssignmentController@index']);
	Route::get('taskindex', 'App\Http\Controllers\TaskAssignmentController@index')->name('taskindex');
	Route::get('/taskform', 'App\Http\Controllers\TaskAssignmentController@taskform')->name('taskform');
	Route::post('/addtask', 'App\Http\Controllers\TaskAssignmentController@create')->name('addtask');
	Route::get('mystasks', 'App\Http\Controllers\TaskResolutionController@mytasks')->name('mytasks');//showing the task of logged in user
	// Route::get('tasks.resolutions/{id}', ['as' => 'tasks.resolutions/{id}', 'uses' => 'App\Http\Controllers\TaskResolutionController@responses'])->name('tasks.resolutions');
	Route::get('/tasksresolutions/{id}', 'App\Http\Controllers\TaskResolutionController@responses')->name('tasksresolutions');
	Route::view('tasks.resolutions','tasks.resolutions');
	Route::get('/respond/{id}', 'App\Http\Controllers\TaskResolutionController@respond')->name('respond');	
	Route::get('/markasresolved/{id}', 'App\Http\Controllers\TaskResolutionController@markasresolved')->name('markasresolved');	
	Route::post('/resolved', 'App\Http\Controllers\TaskResolutionController@resolved')->name('resolved');
	Route::post('/saverespond', 'App\Http\Controllers\TaskResolutionController@saverespond')->name('saverespond');
	Route::post('/verifyotp', 'App\Http\Controllers\UserController@verifyotp')->name('verifyotp');


	Route::view('activity.reg','activity.reg');
	Route::post('activity.reg', ['as' => 'activity.reg', 'uses' => 'App\Http\Controllers\ActivityAttendanceController@create']);

	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

