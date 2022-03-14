<?php

namespace App\Http\Controllers;

use App\Models\TaskAssignment;
use App\Models\TaskResolution;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;

class TaskAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index()
    {       
        abort_if(Gate::denies('master_tables'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $tasks = TaskAssignment::join('task_resolutions', 'task_resolutions.taskAssignmentID', '=', 'task_assignments.id')
        ->join('users','users.id','=','task_resolutions.userID')
        ->join('programs','programs.id','=','task_assignments.papID')
        ->get(['users.*', 'task_assignments.*','task_assignments.id AS taskID','task_resolutions.*','programs.*']);
        return view('tasks.index', ['tasks'=>$tasks]);
    }
    
    public function taskform()
    {
        abort_if(Gate::denies('master_tables'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $programs = Program::all();
        $users = User::all();
        //dd($programs, $users);
        return view('tasks.add', ['programs'=>$programs, 'users'=>$users]);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        // dd($req);
        $tasks = new TaskAssignment;
        $tasks->papID       =$req->papID;
        $tasks->taskBy      = $req->taskBy;
        $tasks->taskedTo    = ' ';
        $tasks->taskDetail  = $req->taskDetail;
        $tasks->taskResolved= 0 ;
        $tasks->created_at = now();
        $tasks->updated_at = now();
        $tasks->save();
        $taskid = $tasks->id;
        $a = 1;
        while ($a <= $req->rowCount) {
            $packstr = 'user'.$a ;
            if (isset($req->$packstr)) {

                $assignee = new TaskResolution;
                $assignee->taskAssignmentID = $taskid;
                $assignee->resolutionDetails = ' ';
                $assignee->userID = $req->$packstr;
                $assignee->save();
            }
            $a++;
        }
        return redirect()->route('taskform')
                ->with('success', 'event');
    }
}
