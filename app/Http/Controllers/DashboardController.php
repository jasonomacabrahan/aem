<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use App\Models\Todo;
use App\Models\User;
use App\Models\Role;
use App\Models\TaskAssignment;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class DashboardController extends Controller
{
    public function index(Request $request) 
    {
        $id = auth()->user()->id;
        $todo = Todo::all();
        $tasks = TaskAssignment::join('task_resolutions','task_resolutions.taskAssignmentID','=','task_assignments.id')
                                ->where('task_resolutions.userID',auth()->user()->id)
                                ->where('task_resolutions.verifiedBy',0)
                                ->paginate(5)->appends($request->query());

        $taskdone = TaskAssignment::join('task_resolutions','task_resolutions.taskAssignmentID','=','task_assignments.id')
                                ->where('task_resolutions.userID',auth()->user()->id)
                                ->where('task_resolutions.verifiedBy',1)
                                ->paginate(5)->appends($request->query());

        $taskprogress = TaskAssignment::join('task_resolutions','task_resolutions.taskAssignmentID','=','task_assignments.id')
                                ->where('task_resolutions.userID',auth()->user()->id)
                                ->where('task_resolutions.verifiedBy',2)
                                ->paginate(5)->appends($request->query());

        $user = User::join('roles','roles.id','=','users.role_id')
                ->where('users.id',$id)
                ->get();

        $userprofile = User::join('images', 'images.user_id', '=', 'users.id')
                ->where('users.id','=',$id)
                ->get(['users.*','images.path AS location']);

        return view('dashboard.index')->with(compact('todo','user','tasks','userprofile','taskdone','taskprogress'));
        //return view('dashboard.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
        $todo = Todo::create($data);
        return Response::json($todo);
    }

    


}
