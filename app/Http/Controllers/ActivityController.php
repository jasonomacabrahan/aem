<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityExpense;
use App\Models\User;
use App\Models\ActivityAttendance;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\TaskAssignment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
class ActivityController extends Controller
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
        

        $programs = Program::join('activities','activities.papID','=','programs.id')
                    ->orderBy('activities.created_at','desc')
                    ->get(['activities.*','activities.id as activityid','programs.*','activities.created_at as activitydatecreated']);
        $activityexpenses = ActivityExpense::join('activities', 'activities.id', '=', 'activity_expenses.activityID')
                    ->join('programs', 'programs.id', '=', 'activities.papID')
                    ->get(['activities.*', 'activity_expenses.*', 'programs.*','activity_expenses.id']);
        return view('activity.index',[
                                        'programs'=>$programs,
                                        'activityexpenses'=>$activityexpenses
                                    ]); 
    }

    public function accomplishment()
    {
        return view('reports.index');
    }

    public function activitymanagement()
    {
        $id = auth()->user()->id;
        $activities = Activity::join('programs','programs.id','=','activities.papID')
                        // ->leftjoin('activity_expenses','activity_expenses.activityID','=','activities.id')
                        ->leftjoin('activity_attendances','activity_attendances.ActivityID','=','activities.id')
                        ->where('programs.focalPerson',$id)
                        ->groupBy('activities.id')
                        ->get(['activities.id AS activityid','activities.*','programs.*','activities.created_at as activitydate',ActivityAttendance::raw('count(activity_attendances.RegisteredID) as participantcount')]);
       
        return view('activity.activitymanagement',[
                                                    'activities'=>$activities
                                                ]); 
    }

    public function expenses($activityid,$activityname,$acid,$shortsname)
    {
        $name = $activityname;
        $act_id = $acid;
        
       
        $expenses = ActivityExpense::join('activities', 'activities.id', '=', 'activity_expenses.activityID')
        ->join('programs', 'programs.id', '=', 'activities.papID')
        ->where('activities.id',$activityid)
        ->get(['activities.*', 'activity_expenses.*', 'programs.*','activity_expenses.id'])->all();
        return view('activity.activity_expenses',[
                                                    'expenses'=>$expenses,
                                                    'name'=>$name,
                                                    'act_id'=>$act_id,
                                                    'shortsname'=>$shortsname
        ]); 
    }

    public function addexpense_new($activityid,$eventname,$shortsname)
    {
        return view('activity.wizard_add_expense',[
            'activityid'=>$activityid,
            'eventname'=>$eventname,
            'shortsname'=>$shortsname
        ]); 
    }

    public function generate(Request $request)
    {
        $datefrom = $request->input('datefrom');
        $dateto = $request->input('dateto');
        $users = User::all();
        $accomplishments = TaskAssignment::join('task_resolutions','task_resolutions.taskAssignmentID','=','task_assignments.id')
         ->whereBetween('task_assignments.created_at', [$datefrom, $dateto])
         ->where('task_resolutions.userID',auth()->user()->id)
         ->where('task_assignments.taskResolved',1)
         ->groupBy('task_resolutions.taskAssignmentID')
         ->get(['task_assignments.*']);
        return view('reports.generate', [
                                            'accomplishments'=>$accomplishments,
                                            'datefrom'=>$datefrom,
                                            'dateto'=>$dateto,
                                            'users'=>$users,
                                        ]);
    }

    public function newactivity()
    {
        return view('activity.add'); //
    }

   
    public function editactivity($id)
    {
        //abort_if(Gate::denies('my_task'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $activities = Activity::where('activities.id','=',$id)
        ->get(['activities.*']);
        return view('activity.editactivity', ['activities'=>$activities]);
    }

    public function saveactivitychanges(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'activityDescription' => 'required',
            'location' => 'required',
            'activityDateStart' =>'required',
            'activityDateEnd' =>'required',
            'papID' =>'required'
        ]);

        $decryptedid= Crypt::decryptString($request->input('id'));
        $updating = DB::table('activities')
                    ->where('id',$decryptedid)
                    ->update([
                                'activityDescription'=>$request->input('activityDescription'),
                                'location'=>$request->input('location'),
                                'activityDateStart'=>$request->input('activityDateStart'),
                                'activityDateEnd'=>$request->input('activityDateEnd'),
                                'papID'=>$request->input('papID'),
                    ]);
                    return redirect()->route('activity.index')
                    ->with('success', 'Some Event');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $activity = new Activity;
        $activity->activityDescription  =  $req->activityDescription;
        $activity->location             =  $req->location;
        $activity->activityDateStart    =  $req->activityDateStart;
        $activity->activityDateEnd      =  $req->activityDateEnd;
        $activity->papID                =  $req->papID;
        $activity->created_at = now();
        $activity->updated_at = now();

        if (strtotime($req->activityDateStart)>strtotime($req->activityDateEnd)) {
            return redirect()->back()->with('error','ddddd');
        } else {
            $activity->save();
            $activityid = $activity->id;
            $encid = Crypt::encrypt($activityid);
            return redirect()->route('attendance',['activityid'=>$encid,'realid'=>$activityid]);
        }
        
        
    }

    public function addactivity(Request $req)
    {
        $activity = new Activity;
        $activity->activityDescription  =  $req->activityDescription;
        $activity->location             =  $req->location;
        $activity->activityDateStart    =  $req->activityDateStart;
        $activity->activityDateEnd      =  $req->activityDateEnd;
        $activity->papID                =  $req->papID;
        $activity->created_at = now();
        $activity->updated_at = now();
        $activity->save();
        return redirect()->back()->with('success', 'hahahaha');
        
    }

    public function activityattendance($ativityid,$realid)
    {
        $encrypted = Crypt::encryptString($ativityid);
        $decrypted = Crypt::decryptString($ativityid);
        // dd($encrypted,$ativityid);
        return view('activity.activitylink',[
                                                'decrypted'=>$decrypted,
                                                'ativityid'=>$ativityid,
                                                'realid'=>$realid
                                            ]);
    }

    public function guest($ativityid)
    {
        $id = Crypt::decryptString($ativityid);
        // dd($encrypted,$ativityid);
        return view('activity.guestattendance',[
                                                'id'=>$id
                                            ]);
    }
}
