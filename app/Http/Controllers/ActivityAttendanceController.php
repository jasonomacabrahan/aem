<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use App\Models\ActivityAttendance;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;

class ActivityAttendanceController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth')->except('index');;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        $activityattendances = ActivityAttendance::paginate(15);
        return view('activity.attendance',['activityattendances'=>$activityattendances, 'activities'=>$activities]); //
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function attendance($id)
    {
        abort_if(Gate::denies('master_tables'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $participants =  ActivityAttendance::join('users', 'users.id', '=', 'activity_attendances.RegisteredID')
        ->where('activity_attendances.ActivityID','=',$id)
        ->count();

        $male =  ActivityAttendance::join('users', 'users.id', '=', 'activity_attendances.RegisteredID')
        ->where('activity_attendances.ActivityID','=',$id)
        ->where('users.sex','=',0)
        ->count();

        $female =  ActivityAttendance::join('users', 'users.id', '=', 'activity_attendances.RegisteredID')
        ->where('activity_attendances.ActivityID','=',$id)
        ->where('users.sex','=',1)
        ->count();

        $rathernotsay =  ActivityAttendance::join('users', 'users.id', '=', 'activity_attendances.RegisteredID')
        ->where('activity_attendances.ActivityID','=',$id)
        ->where('users.sex','=',2)
        ->count();

        $custom =  ActivityAttendance::join('users', 'users.id', '=', 'activity_attendances.RegisteredID')
        ->where('activity_attendances.ActivityID','=',$id)
        ->where('users.sex','=',3)
        ->count();

        $activityattendances = ActivityAttendance::join('activities', 'activities.id', '=', 'activity_attendances.ActivityID')
        ->join('programs', 'programs.id', '=', 'activities.papID')
        ->join('users', 'users.id', '=', 'activity_attendances.RegisteredID')
        ->where('activity_attendances.ActivityID','=',$id)
        ->get(['activities.*', 'activity_attendances.*', 'programs.*', 'users.*','activity_attendances.created_at AS attendancedate'])->all();
        
        $user = User::join('roles','roles.id','=','users.role_id')
                ->where('users.id',auth()->user()->id)
                ->get();
        $activity = Activity::where('id',$id)
                    ->get();


        return view('activity.attendance',[
                                            'activityattendances'=>$activityattendances,
                                            'male'=>$male,
                                            'female'=>$female,
                                            'rathernotsay'=>$rathernotsay,
                                            'custom'=>$custom,
                                            'participants'=>$participants,
                                            'user'=>$user,
                                            'activity'=>$activity
                                        ]); 
    }

    public function usertrainings()
    {
        $userID = auth()->user()->id;
        $activityattendances = ActivityAttendance::join('activities', 'activities.id', '=', 'activity_attendances.ActivityID')
        ->join('programs', 'programs.id', '=', 'activities.papID')
        ->join('users', 'users.id', '=', 'programs.focalPerson')
        ->where('activity_attendances.RegisteredID','=', $userID)
        ->groupBy('activity_attendances.ActivityID')
        ->get(['activities.*', 'activity_attendances.*', 'programs.*','users.name']);

        return view('activity.userattendance',['activityattendances'=>$activityattendances]); 
        
    }

    // public function trainings()
    // {
    //     return "hi";
    //     // $userID = auth()->user()->id;
    //     // dd($userID);
    //     // $activityattendances = ActivityAttendance::join('activities', 'activities.id', '=', 'activity_attendances.ActivityID')
    //     // ->join('programs', 'programs.id', '=', 'activities.papID')
    //     // ->where('activity_attendances.RegisteredID','=', $userID)
    //     // ->get(['activities.*', 'activity_attendances.*', 'programs.*']);

    //     // return view('activity.userattendance',['activityattendances'=>$activityattendances]); 
    // }

    /**
     * Show the form for
     * 
     *  creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //for viewing form only
    public function activityregistration()
    {
        abort_if(Gate::denies('activity_registration'), Response::HTTP_FORBIDDEN, 'Forbidden');
        return view('activity.reg');
    }

    public function activityattendance($ativityid)
    {
        Crypt::encryptString('Hello DevDojo');
        $decrypted = Crypt::decryptString('Hello DevDojo');
    }
    public function create(Request $req)
    {
        $activityattendance = new ActivityAttendance;
        $activityattendance->RegisteredID  =  auth()->user()->id;
        $activityattendance->ActivityID    =  $req->ActivityID;
        $activityattendance->registrationDate =  $req->registrationDate;
        $activityattendance->created_at = now();
        $activityattendance->updated_at = now();
        $activity = ActivityAttendance::where('RegisteredID',$activityattendance->RegisteredID)->where('registrationDate', $activityattendance->registrationDate)->first();
        if ($activity) {
            return redirect()->route('activityregistration')
            ->with('error', 'Event');
        }else{
            $activityattendance->save();
            return redirect()->route('activityregistration')
                    ->with('success', 'Event');
          
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function newattendance($ativityid,$realid)
    {
        $userid = auth()->user()->id ?? '';
        $id = Crypt::decryptString($ativityid);
        $nowdate = date('Y-m-d');
        $activity = ActivityAttendance::where('RegisteredID',$userid)->where('ActivityID',$realid)->where('registrationDate', $nowdate)->first();
        
        if ($activity) {
            return redirect()->route('activityregistration')
            ->with('error', 'Event');
        }else{
            $attendance = ActivityAttendance::create([
                'RegisteredID'=>$userid,
                'ActivityID'=>$realid,
                'registrationDate'=>NOW(),
                'created_at'=>NOW(),
                'updated_at'=>NOW(),
            ]);
            return redirect()->route('attendancesuccess')
                    ->with('attendanceok', 'Event');
          
        }
    }

    public function attendancesuccess()
    {
        return view('activity.newattendance');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityAttendance  $activityAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityAttendance $activityAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivityAttendance  $activityAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityAttendance $activityAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActivityAttendance  $activityAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivityAttendance $activityAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityAttendance  $activityAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityAttendance $activityAttendance)
    {
        //
    }
}
