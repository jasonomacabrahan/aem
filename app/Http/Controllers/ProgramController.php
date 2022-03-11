<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
class ProgramController extends Controller
{
    public function __construct()
	{
        $this->middleware('auth')->except('index');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('master_tables'), Response::HTTP_FORBIDDEN, 'Forbidden');
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
        abort_if(Gate::denies('master_tables'), Response::HTTP_FORBIDDEN, 'Forbidden');
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
    
}
