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
        $tasks = TaskAssignment::join('programs','programs.id','=','task_assignments.papID')
        ->join('users','users.id','=','task_assignments.taskedTo')
        ->leftjoin('task_resolutions','task_resolutions.taskAssignmentID','=','task_assignments.id')
        ->where('task_assignments.taskBy','=',$id)
        ->groupBy('taskDetail','taskedTo')
        ->get(['users.*','task_assignments.*','task_assignments.id AS taskID','task_assignments.created_at as assignmentdate','programs.*','task_resolutions.*']);
        // dd($tasks);
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
        $data = $req->validate([
            'papID' => 'required',
            'users' => 'required',
            'taskDetail' => 'required',
        ]);
        foreach($req->users as $d)
        {
            $assignment = TaskAssignment::create([
                                    'papID'=>$req->papID,
                                    'taskBy'=>auth()->user()->id,
                                    'taskedTo'=>$d,
                                    'taskDetail'=>$req->taskDetail,
                                    'taskResolved'=>0,
                                ]);
        }
        return redirect()->back()->with('success', 'event');
        
    }

    public function destroy($id)
    {

        TaskAssignment::where('id',$id)->delete();
        return redirect()->back()->with(['status-success' => "Task Deleted"]);
    }
}
