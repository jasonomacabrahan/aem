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

Route::get('hello', function () {
    return "hello";
});


Route::get('routes', function () {
    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<td width='10%'><h4>HTTP Method</h4></td>";
    echo "<td width='10%'><h4>Route</h4></td>";
    echo "<td width='10%'><h4>Name</h4></td>";
    echo "<td width='70%'><h4>Corresponding Action</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";
        echo "<td>" . $value->methods()[0] . "</td>";
        echo "<td>" . $value->uri() . "</td>";
        echo "<td>" . $value->getName() . "</td>";
        echo "<td>" . $value->getActionName() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
});




Route::get('register', ['as' => 'auth.register', 'uses' => 'App\Http\Controllers\UserController@regnew']);
Route::get('register', ['as' => 'auth.register', 'uses' => 'App\Http\Controllers\UserController@regnew']);
Route::post('/regnew', [UserController::class, 'regnew'])->name('regnew');
            
            



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('qr-code', function () {
	return QrCode::size(500)->generate('Welcome to sparkouttech.com!');
});

Route::get('/welcome', 'App\Http\Controllers\HomeController@welcome')->name('welcome');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
	Route::get('programs.index', ['as' => 'programs.index', 'uses' => 'App\Http\Controllers\ProgramController@index']);
	Route::view('programs.add','programs.add');
	Route::post('programs.add', ['as' => 'programs.add', 'uses' => 'App\Http\Controllers\ProgramController@create']);	
	Route::get('activity.index', ['as' => 'activity.index', 'uses' => 'App\Http\Controllers\ActivityController@index']);
	Route::view('activity.add','activity.add');
	Route::post('activity.add', ['as' => 'activity.add', 'uses' => 'App\Http\Controllers\ActivityController@create']);
	Route::get('activity.attendance/{id}', ['as' => 'activity.attendance/{id}', 'uses' => 'App\Http\Controllers\ActivityAttendanceController@attendance']);
	//Route::get('/usertrainings', ['as' => 'activity.userattendance', 'uses' => 'App\Http\Controllers\ActivityAttendanceController@usertrainings']);
	Route::get('expenses', ['as' => 'activity.expenses', 'uses' => 'App\Http\Controllers\ActivityExpenseController@index']);
	Route::view('activity.addexpense','activity.addexpense');
	Route::post('activity.addexpense', ['as' => 'activity.addexpense', 'uses' => 'App\Http\Controllers\ActivityExpenseController@create']);
	Route::get('/usertrainings', 'App\Http\Controllers\ActivityAttendanceController@usertrainings')->name('usertrainings');	
	Route::get('/updateexpenses/{id}', 'App\Http\Controllers\ActivityExpenseController@updateexpense');
	Route::post('/saveexpensesupdate', 'App\Http\Controllers\ActivityExpenseController@saveexpenseupdate');
	
	Route::view('activity.reg','activity.reg');
	Route::post('activity.reg', ['as' => 'activity.reg', 'uses' => 'App\Http\Controllers\ActivityAttendanceController@create']);
	
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
	
	//Route::get('/trainings', 'App\Http\Controllers\ActivityAttendanceController@trainings');
	//Route::get('usertrainings', 'ActivityAttendanceController@usertrainings')->name('usertrainings');
	//Route::get('/usertrainings', [ActivityAttendanceController::class, 'usertrainings'])->name('usertrainings'); //
	// Route::get('trainings', ['as' => 'activity.userattendance', 'uses' => 'App\Http\Controllers\ActivityAttendanceController@trainings']);
	
            
});

