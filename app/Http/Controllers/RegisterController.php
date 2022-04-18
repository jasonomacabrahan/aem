<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserOveride;
use App\Models\ActivityAttendance;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        $user = User::create($request->validated());

        event(new Registered($user));

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
    public function registerasaguest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'agency' => 'required',
            'division' => 'required',
            'designation' => 'required',
            'contactNumber' => 'required',
            'sex' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            
        ]);
        $user = UserOveride::create([
                                'name'=>$request->name,
                                'agency'=>$request->agency,
                                'division'=>$request->division,
                                'designation'=>$request->designation,
                                'contactNumber'=>$request->contactNumber,
                                'sex'=>$request->sex,
                                'role_id'=>6,
                                'email'=>$request->email,
                                'email_verified_at'=>NULL,
                                'password'=>Hash::make('88888888'),
                            ]);
        $userid = $user->id;
        $attendance = ActivityAttendance::create([
                                'RegisteredID'=>$userid,
                                'ActivityID'=>$request->input('activityID'),
                                'registrationDate'=>NOW(),
                                'created_at'=>NOW(),
                                'updated_at'=>NOW(),
        ]);


        return redirect()->route('attended')
                    ->with('attendance', 'Some Event');

        
                        
    }

    public function guestlanding()
    {
        return view();
    }
}
