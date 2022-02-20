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
        return view('programs.index',['programs'=>$programs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $validated = $req->validate([
            'shortName' => 'string|max:50',
            'focalPerson' => 'string|max:255',
            'programDescription' =>'string|max:255',
        ]);
        
        $Program = new Program;
        $Program->shortName             =  $req->shortName;
        $Program->programDescription    =  $req->programDescription;
        $Program->focalPerson           =  $req->focalPerson;
        $Program->created_at = now();
        $Program->updated_at = now();

        $program = Program::where('shortName',$Program->shortName )->where('focalPerson', $Program->focalPerson)->first();
        if ($program) {
            return redirect()->route('programs.add')
                    ->with('error', 'Event');
        }else{
            $Program->save();
            return redirect()->route('programs.add')
                    ->with('success', 'Event');
          
        }

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
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        //
    }
}
