<?php

namespace App\Http\Controllers;

use App\Models\TaskResolution;
use App\Models\TaskAssignment;
use App\Models\User;
use App\Models\Evidences;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
    public function responses($assignmentid,$taskto)
    {
        $responses = TaskAssignment::join('task_resolutions', 'task_resolutions.taskAssignmentID', '=', 'task_assignments.id')
        ->leftjoin('programs', 'programs.id', '=', 'task_assignments.papID')
        ->leftjoin('evidences','evidences.task_id','=','task_resolutions.id')
        ->join('users', 'users.id', '=', 'task_resolutions.userID')
        ->where('task_resolutions.taskAssignmentID',$assignmentid)
        ->orderBy('task_resolutions.id', 'desc')
        ->get(['evidences.*','programs.*', 'task_assignments.*','task_assignments.id AS taskID','task_resolutions.*','task_resolutions.id as resoid','users.*','task_resolutions.created_at as resodate','users.name as fullname']);
        $verifiedby = "";
        $resoid = "";
        foreach($responses as $r)
        {
            $resoid = $r->resoid;
            $verifiedby = $r->verifiedBy;
        }
        $evidence = Evidences::where('task_id',$resoid)
                    ->get();
        // dd($evidence);
        return view('tasks.resolutions', [
                                            'responses'=>$responses,
                                            'assignmentid'=>$assignmentid,
                                            'verifiedby'=>$verifiedby,
                                            'evidence'=>$evidence,
                                        ]);
        
    }

    public function respond($taskID)
    {
        $responses = TaskAssignment::leftjoin('task_resolutions', 'task_resolutions.taskAssignmentID', '=', 'task_assignments.id')
        ->leftjoin('programs', 'programs.id', '=', 'task_assignments.papID')
        ->where('task_assignments.id','=',$taskID)
        ->get(['programs.*','task_assignments.*','task_assignments.created_at as assignmentdate','task_assignments.id AS taskid', 'task_resolutions.*','task_resolutions.id as resoid'])->first();
        $users = User::all();
        return view('tasks.respond', ['responses'=>$responses, 'users'=>$users]);
    }

    public function responsethread($id,$taskby)
    {
        $responses = TaskResolution::join('task_assignments','task_assignments.id','=','task_resolutions.taskAssignmentID')
        ->leftjoin('evidences','evidences.task_id','=','task_resolutions.id')
        ->where('task_assignments.taskBy','=',$taskby)
        ->where('task_resolutions.taskAssignmentID','=',$id)
        ->orderBy('task_resolutions.id', 'desc')
        ->get(['task_assignments.id as taskid','task_resolutions.id as resoid','task_assignments.*','task_resolutions.*','evidences.*']);
        $resolution = TaskResolution::where('taskAssignmentID',$id)
                        ->where('userID',$taskby)
                        ->get();
                        
                        
        $resoid = "";
        $assignmentid = "";
        $isresolved = "";
        foreach($responses as $key)
        {
            $resoid = $key->resoid;
            $assignmentid = $key->taskAssignmentID;
            $isresolved = $key->taskResolved;
        }
        $evidence = Evidences::where('task_id',$resoid)
                    ->get();
    
        return view('tasks.responsethread', [
                                                'responses'=>$responses,
                                                'assignmentid'=>$assignmentid,
                                                'resoid'=>$resoid,
                                                'isresolved'=>$isresolved,
                                                'evidence'=>$evidence
                                            ]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function markasresolved($resoid)
    {
        $responses = TaskResolution::join('task_assignments', 'task_assignments.id', '=', 'task_resolutions.taskAssignmentID')
        ->leftjoin('programs', 'programs.id', '=', 'task_assignments.papID')
        ->join('users', 'users.id', '=', 'task_assignments.taskBy')
        ->where('task_resolutions.id','=',$resoid)
        ->get(['task_assignments.*','task_assignments.id AS taskid','task_resolutions.*','task_resolutions.id as resoid','task_resolutions.created_at as resodate','programs.*'])->first();
        return view('tasks.resolve', ['responses'=>$responses]);
    }

    public function resolved(Request $request)
    {
        
        $updating = DB::table('task_assignments')
                    ->where('id',$request->input('id'))
                    ->update([
                                'taskResolved'=>$request->input('verifiedBy'),
                    ]);
                    return redirect()->route('taskindex')
                    ->with('success', 'Some Event');
    }


    
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mytasks()
    {
        abort_if(Gate::denies('my_task'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $id = auth()->user()->id;
        $mytasks = TaskAssignment::join('users', 'users.id', '=', 'task_assignments.taskBy')
        ->leftjoin('task_resolutions','task_resolutions.taskAssignmentID','=','task_assignments.id')
        ->leftjoin('programs','programs.id','=','task_assignments.papID')
        ->where('task_assignments.taskedTo','=',$id)
        ->groupBy('task_assignments.id')
        ->orderBy('task_assignments.id', 'desc')
        ->get(['programs.*','task_resolutions.*','users.name AS thesource','task_assignments.id as taskid','task_assignments.taskResolved as isresolved','task_assignments.created_at AS datecreated','task_assignments.*','users.*']);
        // dd($mytasks);
        return view('tasks.mytasks', ['mytasks'=>$mytasks]);
    }

    public function editmytask($id)
    {
        abort_if(Gate::denies('my_task'), Response::HTTP_FORBIDDEN, 'Forbidden');
        $mytasks = TaskAssignment::where('task_assignments.id','=',$id)
        ->get(['task_assignments.id as taskid','task_assignments.taskDetail']);
        return view('tasks.edittaskdetail', ['mytasks'=>$mytasks]);
    }

    public function savetaskchanges(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'taskDetail' => 'required'
        ]);
        $decryptedid= Crypt::decryptString($request->input('id'));
        $updating = DB::table('task_assignments')
                    ->where('id',$decryptedid)
                    ->update([
                                'taskDetail'=>$request->input('taskDetail'),
                    ]);
                    return redirect()->route('mytasks')
                    ->with('ok', 'Some Event');
    }


    public function editmyresponse($taskID)
    {
        $responses = TaskResolution::join('task_assignments', 'task_assignments.id', '=', 'task_resolutions.taskAssignmentID')
        ->leftjoin('programs', 'programs.id', '=', 'task_assignments.papID')
        ->where('task_resolutions.taskAssignmentID','=',$taskID)
        ->get(['programs.*', 'task_assignments.*','task_assignments.id AS taskid', 'task_resolutions.*', 'task_resolutions.resolutionDetails','task_resolutions.id AS resolutionId'])->first();
        //dd($responses);
        $users = User::all();
        return view('tasks.editresponse', ['responses'=>$responses, 'users'=>$users]);
    }


    public function saveresponse(Request $request)
    {

        $request->validate([
            'resolutionDetails' => 'required'
        ]);
        $updating = DB::table('task_resolutions')
                    ->where('id',$request->input('id'))
                    ->update([
                                'resolutionDetails'=>$request->input('resolutionDetails'),
                    ]);
                    return redirect()->route('mytasks')
                    ->with('success', 'Some Event');
    }

    public function saverespond(Request $request)
    {

      
        $request->validate([
            'id' => 'required',
            'resolutionDetails' => 'required',
            'name.*'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $files = [];
        if($request->hasfile('name'))
        {
            foreach($request->file('name') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('images'), $name);  
                $files[] = $name;  
            }
            $taskreso = new TaskResolution;
            $taskreso->taskAssignmentID = $request->id;
            $taskreso->resolutionDetails = $request->resolutionDetails;
            $taskreso->userID = auth()->user()->id;
            $taskreso->verifiedBy = 0;
            $taskreso->save();
            $resoid = $taskreso->id;

            foreach($files as $imago) 
            {
                $data = array('task_id'=>$resoid,'name' => $imago, 'path' => $imago,'created_at'=>NOW());
                Evidences::insert($data);    
            }
            
            
            return redirect()->route('mytasks')
            ->with('success', 'Some Event');
            
        }else{
            // if($request->hasfile('name'))
            // {
            //         foreach($request->file('name') as $file)
            //         {  
            //             $name = time().rand(1,100).'.'.$file->extension();
            //             $file->move(public_path('images'), $name);  
            //             $files[] = $name;  
            //         }
            //         foreach($files as $imago) 
            //         {
            //             $data = array('task_id'=>$request->input('id'),'name' => $imago, 'path' => $imago,'created_at'=>NOW());
            //             Evidences::insert($data);    
            //         }
                
            // }
            $resolution = array(
                'taskAssignmentID'=>$request->input('id'),
                'resolutionDetails' => $request->input('resolutionDetails'), 
                'userID' => auth()->user()->id,
                'verifiedBy'=>0,
                'created_at'=>NOW(),
                'updated_at'=>NOW()
            );
            TaskResolution::insert($resolution);
            return redirect()->route('mytasks')
            ->with('success', 'Some Event');
        }
        
    }
    
    public function savethreadrespond(Request $request)
    {
        $request->validate([
            'resolutionDetails' => 'required',
            'taskAssignmentID' => 'required',
            'name.*'=>'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $files = [];
        if($request->hasfile('name'))
        {
            foreach($request->file('name') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('images'), $name);  
                $files[] = $name;  
            }
            $taskreso = new TaskResolution;
            $taskreso->taskAssignmentID = $request->taskAssignmentID;
            $taskreso->resolutionDetails = $request->resolutionDetails;
            $taskreso->userID = auth()->user()->id;
            $taskreso->verifiedBy = 0;
            $taskreso->save();
            $resoid = $taskreso->id;

            foreach($files as $imago) 
            {
                //task_id is referring to reso id
                $data = array('task_id'=>$resoid,'name' => $imago, 'path' => $imago,'created_at'=>NOW());
                Evidences::insert($data);    
            }
            return redirect()->back()
            ->with('success', 'Some Event');
            
        }else{
                    $taskreso = new TaskResolution;
                    $taskreso->taskAssignmentID = $request->taskAssignmentID;
                    $taskreso->resolutionDetails = $request->resolutionDetails;
                    $taskreso->userID = auth()->user()->id;
                    $taskreso->verifiedBy = 0;
                    $taskreso->save();
                    return redirect()->back()
                    ->with('success', 'Some Event');
                
            
        }

        
    }

}
