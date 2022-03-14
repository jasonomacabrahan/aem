<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activity;
use App\Models\ActivityAttendance;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

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
        $activityattendances = ActivityAttendance::join('activities', 'activities.id', '=', 'activity_attendances.ActivityID')
        ->join('programs', 'programs.id', '=', 'activities.papID')
        ->join('users', 'users.id', '=', 'activity_attendances.RegisteredID')
        ->where('activities.id','=', $id)
        ->get(['activities.*', 'activity_attendances.*', 'programs.*', 'users.*'])->all();

        return view('activity.attendance',['activityattendances'=>$activityattendances]); 
    }

    public function usertrainings()
    {
        $userID = auth()->user()->id;
        $activityattendances = ActivityAttendance::join('activities', 'activities.id', '=', 'activity_attendances.ActivityID')
        ->join('programs', 'programs.id', '=', 'activities.papID')
        ->where('activity_attendances.RegisteredID','=', $userID)
        ->get(['activities.*', 'activity_attendances.*', 'programs.*']);

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //for viewing form only
    public function activityregistration()
    {
        abort_if(Gate::denies('activity_registration'), Response::HTTP_FORBIDDEN, 'Forbidden');
        return view('activity.reg');
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
