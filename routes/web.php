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
Route::group(['namespace' => 'App\Http\Controllers\Auth'], function(){
        Route::get('/forget-password','ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
        Route::post('/forget-password', 'ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post'); 
        Route::get('/reset-password/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
        Route::post('/reset-password', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');
});

Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
    
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
    
        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    
    });
    
    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        
        /**
         * Verification Routes
         */
        Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
        Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
    });
    
    
    Route::group(['middleware' => ['auth','verified']], function() {    
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

        Route::view('programs.add','programs.add')->name('programs.add');
        Route::view('activity.add','activity.add')->name('acitivity.add');
        Route::view('activity.addexpense','activity.addexpense')->name('activity.addexpense');
        Route::view('tasks.resolutions','tasks.resolutions');
        Route::view('activity.reg','activity.reg');
        
        Route::controller(ActivityController::class)->group(function () {
            Route::get('/activity.index', 'index')->name('activity.index');
            Route::get('/activity.add', 'create')->name('activity.add');
        });
        
        Route::controller(ActivityAttendanceController::class)->group(function () {
            Route::get('/activity/{id}', 'attendance')->name('activity');
            Route::get('/activity.add', 'create')->name('activity.add');
            Route::get('/usertrainings', 'usertrainings')->name('usertrainings');
            Route::post('/activity.reg','create')->name('activity.reg');
        });

        Route::controller(ActivityExpenseController::class)->group(function () {
            Route::get('/expenses', 'index')->name('activity.expenses');
            Route::get('/addexpense', 'create')->name('addexpense');
            Route::get('/updateexpenses/{id}', 'updateexpense')->name('updateexpenses');
            Route::post('/saveexpensesupdate', 'saveexpenseupdate')->name('saveexpensesupdate');
        });

        Route::controller(ProgramController::class)->group(function () {
            Route::get('program.index', 'index')->name('program.index');
            Route::get('/program.add', 'create')->name('program.add');
        });

        Route::controller(TaskResolutionController::class)->group(function () {
            Route::get('/mystasks', 'mytasks')->name('mytasks');
            Route::get('/program.add', 'create')->name('program.add');
            Route::get('/tasksresolutions/{id}', 'responses')->name('tasksresolutions');
            Route::get('/respond/{id}', 'respond')->name('respond');
            Route::get('/markasresolved/{id}', 'markasresolved')->name('markasresolved');
            Route::get('/resolved', 'resolved')->name('resolved');
            Route::get('/saverespond', 'saverespond')->name('saverespond');
        });
        
        Route::controller(TaskAssignmentController::class)->group(function(){
            Route::get('/tasks.index','index')->name('tasks.index');
            Route::get('/taskindex', 'index')->name('taskindex');
            Route::get('/taskform', 'taskform')->name('taskform');
            Route::post('/addtask', 'create')->name('addtask');
        });

        Route::controller(UserController::class)->group(function(){
            Route::get('/getuser/{id}', 'getuser')->name('getuser');
            Route::post('/saveuserupdate', 'saveuserupdate')->name('saveuserupdate');
        });

    
        Route::group(['prefix'=>"admin",'as' => 'admin.','namespace' => 'Admin','middleware' => ['auth','AdminPanelAccess']], function () {
            Route::get('/', 'HomeController@index')->name('home');
            Route::resource('/users', 'UserController');
            Route::resource('/roles', 'RoleController');
            Route::resource('/permissions', 'PermissionController')->except(['show']);
        
        });
    });
});


