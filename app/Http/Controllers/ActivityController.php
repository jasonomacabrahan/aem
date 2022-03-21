<?php

namespace App\Http\Controllers;

use App\Models\Activity;
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
        $programs = Program::all();
        $activitys = Activity::paginate(15);
        return view('activity.index',['activitys'=>$activitys, 'programs'=>$programs]); //
    }

    public function accomplishment()
    {
        return view('reports.index');
    }

    public function generate(Request $request)
    {
        $datefrom = $request->input('datefrom');
        $dateto = $request->input('dateto');
        $accomplishments = TaskAssignment::whereBetween('created_at', [$datefrom, $dateto])
         ->get(['task_assignments.*']);
        return view('reports.generate', [
                                            'accomplishments'=>$accomplishments,
                                            'datefrom'=>$datefrom,
                                            'dateto'=>$dateto
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
        $activity->save();
        return redirect('activity.index');
    }
}
