<?php

namespace App\Http\Controllers;

use App\Models\TaskResolution;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
class TaskResolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $responses = TaskResolution::all();
        /*        $responses = TaskResolution::join('task_assignments', 'task_assignments.id', '=', 'task_resolutions.taskAssignmentID')
                ->join('programs', 'programs.id', '=', 'task_assignments.papID')
                ->where('task_resolutions.taskAssignmentID','=','task_assignments.id')
                ->get(['programs.*', 'task_assignments.*', 'task_resolutions.*']); */
            //   dd($responses);
                return view('tasks.resolution', ['responses'=>$responses]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function responses($taskID)
    {
        $responses = TaskResolution::join('task_assignments', 'task_assignments.id', '=', 'task_resolutions.taskAssignmentID')
        ->join('programs', 'programs.id', '=', 'task_assignments.papID')
        ->join('users', 'users.id', '=', 'task_resolutions.userID')
        ->where('task_resolutions.taskAssignmentID','=',$taskID)
        ->get(['programs.*', 'task_assignments.*','task_assignments.id AS taskID','task_resolutions.*','users.*', 'users.name as fullname']);
        return view('tasks.resolutions', ['responses'=>$responses]);
    }

    public function respond($taskID)
    {
        $responses = TaskResolution::join('task_assignments', 'task_assignments.id', '=', 'task_resolutions.taskAssignmentID')
        ->join('programs', 'programs.id', '=', 'task_assignments.papID')
        ->where('task_resolutions.taskAssignmentID','=',$taskID)
        ->get(['programs.*', 'task_assignments.*','task_assignments.id AS taskid', 'task_resolutions.*'])->first();
        $users = User::all();
       // dd($responses, $taskID);
        return view('tasks.respond', ['responses'=>$responses, 'users'=>$users]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function markasresolved($taskID)
    {
        $responses = TaskResolution::join('task_assignments', 'task_assignments.id', '=', 'task_resolutions.taskAssignmentID')
        ->join('programs', 'programs.id', '=', 'task_assignments.papID')
        ->join('users', 'users.id', '=', 'task_assignments.taskBy')
        ->where('task_resolutions.taskAssignmentID','=',$taskID)
        ->get(['programs.*', 'task_assignments.*','task_assignments.id AS taskid','task_resolutions.*','users.*'])->first();
        // //dd($responses);
        // //return view('tasks.resolve')->with(compact('responses'));
        // //return view('tasks.resolve', ['responses'=>$responses]);
        // dd($responses);
        return view('tasks.resolve', ['responses'=>$responses]);
    }

    public function resolved(Request $request)
    {
        $request->validate([
            'taskResolved' => 'required'
        ]);
        $updating = DB::table('task_assignments')
                    ->where('id',$request->input('id'))
                    ->update([
                                'taskResolved'=>$request->input('taskResolved'),
                    ]);
                    return redirect()->route('taskindex')
                    ->with('success', 'Some Event');
    }


    
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mytasks()
    {
        abort_if(Gate::denies('my_task'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $id = auth()->user()->id;
        $mytasks = TaskResolution::join('task_assignments', 'task_assignments.id', '=', 'task_resolutions.taskAssignmentID')
        ->join('programs', 'programs.id', '=', 'task_assignments.papID')
        ->join('users', 'users.id', '=', 'task_assignments.taskBy')
        ->where('task_resolutions.userID','=',$id)
        ->get(['programs.*','users.name AS thesource','task_assignments.id as taskid','task_assignments.created_at AS datecreated','task_assignments.*', 'task_resolutions.*','users.*']);
        return view('tasks.mytasks', ['mytasks'=>$mytasks]);
        
    }


    public function saverespond(Request $request)
    {

        //dd($request);
        $request->validate([
            'resolutionDetails' => 'required'
        ]);
        $updating = DB::table('task_resolutions')
                    ->where('taskAssignmentID',$request->input('id'))
                    ->update([
                                'resolutionDetails'=>$request->input('resolutionDetails'),
                    ]);
                    return redirect()->route('mytasks')
                    ->with('success', 'Some Event');
    }
    
    
}
