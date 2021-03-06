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
    Route::get('/home', 'HomeController@home')->name('home');
    Route::get('attended', 'HomeController@successattendance')->name('attended');
    Route::get('/guest/{activityid}/{realid}','HomeController@guest')->name('guest');
    Route::group(['middleware' => ['guest']], function() {
        
        Route::get('checknull','TaskResolutionController@checknull');
        Route::get('overrideelete/{id}','TaskResolutionController@overrideelete')->name('delete');
        Route::get('/down', function()
        {
            exec('php artisan down');
            echo 'success';
        });
        Route::get('/up', function()
        {
            exec('php artisan up');
            echo 'success';
        });

        Route::get('/clear',function(){
            Artisan::call('config:cache');
        });

        Route::get('/step_one',function(){
            Artisan::call('livewire:publish --config');
        });
        Route::get('/step_two',function(){
            Artisan::call('livewire:publish --assets');
        });
        Route::get('/step_two',function(){
            Artisan::call('livewire:publish --assets');
        });


        //for sending sms
        Route::get('sendSMS','NexmoSMSController@index');
        //--end of sending sms--
        //for basic sending email...
        Route::get('sendbasicemail','MailController@basic_email');
        Route::get('sendhtmlemail','MailController@html_email');
        //end of sending experimental mail...    

        Route::get('storage/{filename}', function ($filename)
        {
            $path = storage_path('public/' . $filename);

            if (!File::exists($path)) {
                abort(404);
            }

            $file = File::get($path);
            $type = File::mimeType($path);

            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);

            return $response;
        });

        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        Route::post('/registerguest', 'RegisterController@registerasaguest')->name('register.guest');
        Route::get('/guestlanding', 'RegisterController@guestlanding')->name('guestroom');
        
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
        Route::get('add-to-log', 'HomeController@myTestAddToLog');
        Route::get('logActivity', 'HomeController@logActivity')->name('userlogs');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
        Route::resource('todo', DashboardController::class);
        Route::view('programs.add','programs.add')->name('programs.add');
        Route::view('activity.addexpense','activity.addexpense')->name('activity.addexpense');
        Route::view('tasks.resolutions','tasks.resolutions');
        Route::get('upload-image', 'UploadImageController@index')->name('upload-image');
        Route::post('save', 'UploadImageController@save')->name('save');

        Route::get('/updateapp', function()
        {
            exec('composer dump-autoload');
            echo 'composer dump-autoload complete';
        });

        Route::get('/config', function()
        {
            exec('php artisan vendor:publish --tag=livewire:config');
            echo 'composer dump-autoload complete';
        });

        Route::get('/clear',function(){
             Artisan::call('config:cache');
        });

        Route::get('/dump',function(){
            Artisan::call('composer dump-autoload');
        });

        Route::get('/step_one',function(){
            Artisan::call('livewire:publish --config');
        });
        Route::get('/step_two',function(){
            Artisan::call('livewire:publish --assets');
        });
        Route::get('/step_two',function(){
            Artisan::call('livewire:publish --assets');
        });
        Route::get('/step_three',function(){
            Artisan::call('vendor:publish --tag=livewire:config');
        });



        Route::controller(ActivityController::class)->group(function () {
            
            Route::get('/attendance/{activityid}/{realid}','activityattendance')->name('attendance');
            Route::get('addexpense_new/{id}/{eventname}/{shortsname}','addexpense_new')->name('addexpense_new');
            Route::get('activityid/{id}/{name}/{acid}/{shortsname}','expenses')->name('activityid');
            Route::get('activitymanagement','activitymanagement')->name('activitymanagement');
            Route::get('accomplishment','accomplishment')->name('report');
            Route::post('generate','generate')->name('generate');
            Route::get('activity.editactivity/{id}','editactivity')->name('editactivity');
            Route::post('saveactivitychanges','saveactivitychanges')->name('saveactivitychanges');
            Route::get('newactivity','newactivity')->name('newactivity');
            Route::get('/activity.index', 'index')->name('activity.index');
            Route::post('/activity.add', 'create')->name('activity.add');
            Route::post('/addactivity', 'addactivity')->name('addactivity');
        });
        
        Route::controller(ActivityAttendanceController::class)->group(function () {
            Route::get('/attendancesuccess','attendancesuccess')->name('attendancesuccess');
            Route::get('activityregistration','activityregistration')->name('activityregistration');//for view: get activity registration form
            Route::get('/activity/{id}', 'attendance')->name('activity');
            Route::get('/newattendance/{ativityid}/{realid}', 'newattendance')->name('newattendance');
            Route::get('/activity.add', 'create')->name('activity.add');
            Route::get('/usertrainings', 'usertrainings')->name('usertrainings');
            Route::post('/saveactivity','create')->name('saveactivity');
        });

        Route::controller(ActivityExpenseController::class)->group(function () {
            Route::get('/expenses', 'index')->name('activity.expenses');
            Route::post('/addexpense', 'create')->name('addexpense');
            Route::post('/createexpense_new', 'createexpense_new')->name('createexpense_new');
            Route::get('/updateexpenses/{id}', 'updateexpense')->name('updateexpenses');
            Route::get('/updateexpenses_new/{id}', 'updateexpense_new')->name('updateexpenses_new');
            Route::post('/saveexpensesupdate_new', 'saveexpenseupdate_new')->name('saveexpensesupdate_new');
            Route::post('/saveexpensesupdate', 'saveexpenseupdate')->name('saveexpensesupdate');
        });

        Route::controller(ProgramController::class)->group(function () {
            
            Route::get('/createprogram', 'createprogram')->name('createprogram');
            Route::post('/savecreatedprogram', 'savecreatedprogram')->name('savecreatedprogram');
            Route::post('/saveselectedfocal', 'saveselectedfocal')->name('saveselectedfocal');
            Route::post('/saveselecteddescription', 'saveselecteddescription')->name('saveselecteddescription');

            Route::get('/addprogram', 'addprogram')->name('addprogram');
            Route::post('/saveprogram', 'saveprogram')->name('saveprogram');
            Route::get('/program.edit/{id}', 'updateprogram')->name('updateprogram');//editing program and projects that belongs to yourself as a user or focal role
            Route::get('/edit/{id}', 'updatesomeoneeleseprogram')->name('edit');//editing program and projects that belongs to somenone else, if you are a user role
            Route::post('/savesomeoneelseprogramupdate', 'savesomeoneelseprogramupdate')->name('savesomeoneelseprogramupdate');
            Route::post('/saveprogramupdate', 'saveprogramupdate')->name('saveprogramupdate');
            Route::get('/program.index', 'index')->name('program.index');
            Route::post('/program.add', 'create')->name('program.add');
        });

        Route::controller(TaskResolutionController::class)->group(function () {

            Route::get('/taskperproject/{projectid}','taskperproject')->name('taskperproject');
            Route::get('/usertask/{taskid}/{userid}','usertask')->name('usertask');
            Route::get('/createdtask/{taskid}','createdtask')->name('createdtask');
            Route::get('/taskmonitoring','taskmonitoring')->name('taskmonitoring');
            Route::get('/responsethread/{id}/{taskby}','responsethread')->name('responsethread');
            Route::get('/deletemymessage/{id}','deletemymessage')->name('deletemymessage');
            Route::get('/task.edittaskdetail/{id}','editmytask')->name('editmytask');
            Route::post('/savetaskchanges','savetaskchanges')->name('savetaskchanges');
            Route::get('/task.editreponse/{id}','editmyresponse')->name('editmyresponse');
            Route::post('/saveresponse','saveresponse')->name('saveresponse');
            Route::get('/mystasks', 'mytasks')->name('mytasks');
            Route::get('/program.add', 'create')->name('program.add');
            Route::get('/tasksresolutions/{assignmentid}/{taskto}', 'responses')->name('tasksresolutions');
            Route::get('/respond/{id}', 'respond')->name('respond');
            Route::get('/markasresolved/{id}', 'markasresolved')->name('markasresolved');
            Route::post('/resolved', 'resolved')->name('resolved');
            Route::post('/saverespond', 'saverespond')->name('saverespond');
            Route::post('/savethreadrespond', 'savethreadrespond')->name('savethreadrespond');
        });
        
        Route::controller(TaskAssignmentController::class)->group(function(){
            Route::get('/tasks.index','index')->name('tasks.index');
            Route::get('/getfocalmail','getfocalmail')->name('getfocal');
            Route::get('/destroy/{id}','destroy')->name('destroy');
            Route::get('/taskindex', 'index')->name('taskindex');
            Route::get('/taskform', 'taskform')->name('taskform');
            Route::get('/addmytask', 'addmytask')->name('addmytask');
            Route::post('/createmytask', 'createmytask')->name('createmytask');
            Route::post('/addtask', 'create')->name('addtask');
        });

        Route::group(['namespace' => 'Admin'], function () {
            Route::controller(UserController::class)->group(function(){
                Route::get('/getuser/{id}', 'getuser')->name('getuser');
                Route::get('/userdashboard', 'userdashboard')->name('userdashboard');
                Route::post('/saveuserupdate', 'saveuserupdate')->name('saveuserupdate');
            });
        });
        
        Route::controller(QuestionnaireController::class)->group(function(){
            Route::get('/evaluation/{activityid}', 'evaluation_report')->name('evaluation');
            Route::get('/satisfaction_report', 'satisfaction_report')->name('satisfaction_report');
            Route::get('/editquestion/{qid}', 'edit')->name('editquestion');
            Route::get('/deletequestion/{qid}', 'deletewarning')->name('deletequestion');
            Route::post('/saveupdatequestion', 'update')->name('saveupdatequestion');
            Route::post('/destroyna', 'destroy')->name('destroyna');
        });
        
        Route::controller(QuestionnaireSubController::class)->group(function(){
            Route::post('/updatesubquestion', 'update')->name('updatesubquestion');
            Route::get('/newsubquestion/{qid}/{question}', 'newsubquestion')->name('newsubquestion');
            Route::get('/addsubquestion/{qid}/{question}', 'addsubquestion')->name('addsubquestion');
            Route::post('/savesubquestion', 'savesubquestion')->name('savesubquestion');
        });

        Route::resource('/questionnaire', 'QuestionnaireController');//im not fully using this controller
        Route::resource('/questionnairesub', 'QuestionnaireSubController');//im not fully using this controller
        Route::resource('/rate', 'RateController');
        Route::resource('/feedback', 'FeedbackController');
        Route::resource('/thoughts', 'ThoughtsController');
        Route::get('/yourthought/{activityid}', 'ThoughtsController@thoughts')->name('yourthought');
        Route::get('/rating/{activityid}', 'RateController@rate')->name('rating');
        Route::get('/consent', 'FeedbackController@consent')->name('consent');


    
        Route::group(['prefix'=>"admin",'as' => 'admin.','namespace' => 'Admin','middleware' => ['auth','AdminPanelAccess']], function () {
            Route::get('/', 'HomeController@index')->name('home');
            Route::resource('/users', 'UserController');
            Route::resource('/roles', 'RoleController');
            Route::resource('/permissions', 'PermissionController')->except(['show']);
        
        });

        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	    Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);

    });
});


