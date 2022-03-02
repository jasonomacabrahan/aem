<?php

namespace App\Http\Controllers;

use App\Models\TaskResolution;
use App\Models\User;
use Illuminate\Http\Request;

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
        ->where('task_resolutions.taskAssignmentID','=',$taskID)
        ->get(['programs.*', 'task_assignments.*', 'task_resolutions.*']);
        $users = User::all();
    //   dd($responses);
        return view('tasks.resolutions', ['responses'=>$responses, 'users'=>$users]);
    }

    public function respond($taskID)
    {
        $responses = TaskResolution::join('task_assignments', 'task_assignments.id', '=', 'task_resolutions.taskAssignmentID')
        ->join('programs', 'programs.id', '=', 'task_assignments.papID')
        ->where('task_resolutions.id','=',$taskID)
        ->get(['programs.*', 'task_assignments.*', 'task_resolutions.*'])->first();
        $users = User::all();
       // dd($responses, $taskID);
        return view('tasks.respond', ['responses'=>$responses, 'users'=>$users]);
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mytasks()
    {
        $id = auth()->user()->id;
        $mytasks = TaskResolution::join('task_assignments', 'task_assignments.id', '=', 'task_resolutions.taskAssignmentID')
        ->join('programs', 'programs.id', '=', 'task_assignments.papID')
        ->where('task_resolutions.userID','=',$id)
        ->get(['programs.*', 'task_assignments.*', 'task_resolutions.*']);
        $users = User::all();
        return view('tasks.mytasks', ['mytasks'=>$mytasks, 'users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\TaskResolution  $taskResolution
     * @return \Illuminate\Http\Response
     */
    public function show(TaskResolution $taskResolution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskResolution  $taskResolution
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskResolution $taskResolution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskResolution  $taskResolution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskResolution $taskResolution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskResolution  $taskResolution
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskResolution $taskResolution)
    {
        //
    }
}
