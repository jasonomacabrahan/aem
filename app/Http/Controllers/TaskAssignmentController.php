<?php

namespace App\Http\Controllers;

use App\Models\TaskAssignment;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

class TaskAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = TaskAssignment::all();
        $programs = Program::all();
        $users = User::all();
        return view('tasks.index', ['tasks'=>$tasks, 'programs'=>$programs, 'users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $tasks = new TaskAssignment;
        $tasks->papID       =$req->papID  ;
        $tasks->taskBy      = $req->taskBy  ;
        $tasks->taskedTo    = $req->taskedTo  ;
        $tasks->taskDetail  = $req->taskDetail  ;
        $tasks->taskResolved= $req->taskResolved  ;
        $tasks->timestamps();
        $tasks->save();
        return redirect('tasks.index');
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
     * @param  \App\Models\TaskAssignment  $taskAssignment
     * @return \Illuminate\Http\Response
     */
    public function show(TaskAssignment $taskAssignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskAssignment  $taskAssignment
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskAssignment $taskAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TaskAssignment  $taskAssignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskAssignment $taskAssignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskAssignment  $taskAssignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskAssignment $taskAssignment)
    {
        //
    }
}
