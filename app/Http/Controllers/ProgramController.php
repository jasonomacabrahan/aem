<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

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
        $id = auth()->user()->id;
        $programs = User::join('programs','programs.focalPerson','=','users.id')
                    ->where('programs.focalPerson',$id)
                    ->get(['programs.*','programs.id AS programid','users.*']);

        // dd($programs);
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
        $Program->focalPerson           =  auth()->user()->id;
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

    public function updateprogram($id)
    {
        $programid = $id;
        $programs = User::join('programs','programs.focalPerson','=','users.id')
        ->where('programs.id',$programid)
        ->get(['programs.*','programs.id AS programid','users.*']);
        return view('programs.edit', ['programs'=>$programs]);
    }

    public function saveprogramupdate(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'shortName' => 'required',
            'programDescription' => 'required'
        ]);
        $decryptedid= Crypt::decryptString($request->input('id'));
        $updating = DB::table('programs')
                    ->where('id',$decryptedid)
                    ->update([
                                'shortName'=>$request->input('shortName'),
                                'programDescription'=>$request->input('programDescription'),
                                'updated_at'=> NOW()

                    ]);
                    return redirect()->route('program.index')
                    ->with('success', 'Some Event');
    }
    
}
