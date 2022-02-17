<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
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
        $programs = Program::paginate(15);
        return view('programs',['programs'=>$programs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $Program = new Program;
        $Program->description   =  $req->description;
        $Program->ProgramType   =  $req->ProgramType;
        $Program->srPrice       =  $req->srPrice;
        $Program->stockAvail    =  0;
        $Program->created_at = now();
        $Program->updated_at = now();
        $Program->save();
        return redirect('prodlist');
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
     * @param  \App\Models\ProgramsEntry  $programsEntry
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramsEntry $programsEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramsEntry  $programsEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramsEntry $programsEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgramsEntry  $programsEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramsEntry $programsEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramsEntry  $programsEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramsEntry $programsEntry)
    {
        //
    }
}
