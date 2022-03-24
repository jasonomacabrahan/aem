<?php

namespace App\Http\Controllers;

use App\Models\TaskAssignment;
use App\Models\TaskResolution;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
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
        $id = auth()->user()->id;
        $tasks = TaskAssignment::join('task_resolutions', 'task_resolutions.taskAssignmentID', '=', 'task_assignments.id')
        ->join('users','users.id','=','task_resolutions.userID')
        ->join('programs','programs.id','=','task_assignments.papID')
        ->where('task_assignments.taskBy','=',$id)
        ->get(['users.*', 'task_assignments.*','task_assignments.id AS taskID','task_resolutions.*','task_resolutions.id as resoid','task_resolutions.created_at as resodate','programs.*']);
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
    public function sendmail($useremail,$name,$task) {
        $data = array('name'=>$name,'email'=>$useremail,'task'=>$task);
        Mail::send('mail', $data, function($message) use ($data){
           $message->to($data['email'], 'Your Task')->subject
              ('A new task is added to your account');
           $message->from('customerservice@imc3.linkage.pw','iMC3 Portal');
        });
    }

    public function getuseremail($id,$t)
    {
        $userlist = DB::table('users')
            ->where('id',$id)
            ->get();
            foreach($userlist as $list)
            {   
                $this->sendmail($list->email,$list->name,$t);
            }
        
    }

    public function create(Request $req)
    {
        // dd($req);
        $tasks = new TaskAssignment;
        $tasks->papID       =$req->papID;
        $tasks->taskBy      = $req->taskBy;
        $tasks->taskedTo    = '';
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
                $assignee->resolutionDetails = NULL;
                $assignee->userID = $req->$packstr;
                $assignee->save();
                $this->getuseremail($assignee->userID = $req->$packstr,$tasks->taskDetail  = $req->taskDetail);
            
            }
            $a++;
        }
        
        return redirect()->route('taskform')
                 ->with('success', 'event');
    }
}
