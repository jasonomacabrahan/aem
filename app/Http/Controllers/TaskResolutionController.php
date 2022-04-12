<?php

namespace App\Http\Controllers;

use App\Models\TaskResolution;
use App\Models\TaskAssignment;
use App\Models\User;
use App\Models\Evidences;
use App\Models\Program;
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

    public function usertask($taskid,$userid)
    {
        
        $numuserid = (int)$userid;
        $usertasks = TaskAssignment::join('users', 'users.id', '=', 'task_assignments.taskBy')
        ->leftjoin('programs','programs.id','=','task_assignments.papID')
        ->where('task_assignments.taskedTo','=',$numuserid)
        ->orderBy('task_assignments.created_at', 'asc')
        ->get(['programs.*','users.name AS thesource','task_assignments.id as taskid','task_assignments.taskResolved as isresolved','task_assignments.created_at AS datecreated','task_assignments.*','users.*']);
        // dd($usertasks);
        return view('tasks.usertasks',['usertasks'=>$usertasks]);
        
    }

    public function createdtask($taskid)
    {
        $id = auth()->user()->id;
        $createdtasks = TaskAssignment::join('users', 'users.id', '=', 'task_assignments.taskBy')
        ->leftjoin('task_resolutions','task_resolutions.taskAssignmentID','=','task_assignments.id')
        ->leftjoin('programs','programs.id','=','task_assignments.papID')
        ->where('task_assignments.id','=',$taskid)
        ->where('task_assignments.taskBy','=',$id)
        ->groupBy('task_assignments.id')
        ->orderBy('task_assignments.created_at', 'asc')
        ->get(['programs.*','task_resolutions.*','users.name AS thesource','task_assignments.id as taskid','task_assignments.taskResolved as isresolved','task_assignments.created_at AS datecreated','task_assignments.*','users.*']);
       
        return view('tasks.createdtask',['createdtasks'=>$createdtasks]);
        
    }
    public function checknull()
    {
        $responses = TaskResolution::where('resolutionDetails', '=', '')
                                    ->orWhereNull('resolutionDetails')
                                    ->get();
        
        return view('tasks.checknull',[
                                        'responses'=>$responses
                                    ]);
    }


    public function taskmonitoring()
    {
        $users = TaskAssignment::join('users','users.id','=','task_assignments.taskedTo')
                    ->groupBy('users.id')
                    ->get(['task_assignments.created_at as assignmentdate','task_assignments.*','task_assignments.id as taskid','users.*',TaskAssignment::raw('count(task_assignments.taskedTo) as numcount')]);
        $project = TaskAssignment::join('programs','programs.id','=','task_assignments.papID')
                                    ->groupBy('programs.id')
                                    ->get(['programs.*','task_assignments.*']);
        $programs = User::join('programs','programs.focalPerson','=','users.id')
                                    ->leftjoin('task_assignments','task_assignments.papID','=','programs.id')
                                    ->where('programs.focalPerson',auth()->user()->id)
                                    ->get(['programs.*','programs.created_at as programcreated','task_assignments.id as taskid','programs.updated_at as programupdated','programs.id AS programid','users.*','task_assignments.*']);

        // dd($programs);
        return view('tasks.taskmonitoring',[
                                            'users'=>$users,
                                            'project'=>$project,
                                            'programs'=>$programs
                                        ]);
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
        ->groupBy('resolutionDetails')
        ->get(['evidences.*','programs.*', 'task_assignments.*','task_assignments.created_at as assignmentdate','task_assignments.id AS taskID','task_resolutions.*','task_resolutions.id as resoid','users.*','task_resolutions.created_at as resodate','users.name as fullname']);
        
        $verifiedby = "";
        $resoid = array();
        $taskresolved = "";
        $evidence = array();
        $assignmentdatecreated = "";
        $assignmentdetails = "";
        
        foreach($responses as $key)
        {
            $resoid[] = $key->resoid;
            $assignmentid = $key->taskAssignmentID;
            $assignmentdetails = $key->taskDetail;
            $assignmentdatecreated = $key->assignmentdate;
            $taskresolved = $key->taskResolved;
        }
        // $evidence = Evidences::where('task_id',$resoid)
        //             ->get();
        foreach($resoid as $reso_id)
        {
            
            $evidence[] = Evidences::where('task_id',$reso_id)
                        ->get();

        }
        // dd($taskresolved);
        return view('tasks.resolutions', [
                                            'responses'=>$responses,
                                            'assignmentid'=>$assignmentid,
                                            'verifiedby'=>$verifiedby,
                                            'evidence'=>$evidence,
                                            'taskresolved'=>$taskresolved,
                                            'assignmentdetails'=>$assignmentdetails,
                                            'assignmentdatecreated'=>$assignmentdatecreated
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

    public function getimage($id)
    {
        $e = Evidence::where('taskAssignmentID',$id)
            ->get();
        return $e;
    }

    public function responsethread($id,$taskby)
    {
        $responses_v1 = TaskResolution::join('evidences','evidences.task_id','=','task_resolutions.id')
        ->where('task_resolutions.taskAssignmentID','=',$id)
        ->get();
        
        $responses = TaskResolution::join('task_assignments','task_assignments.id','=','task_resolutions.taskAssignmentID')
        ->leftjoin('evidences','evidences.task_id','=','task_resolutions.id')
        ->where('task_assignments.taskBy','=',$taskby)
        ->where('task_resolutions.taskAssignmentID','=',$id)
        ->orderBy('task_resolutions.id', 'desc')
        ->groupBy('resolutionDetails')
        ->get(['task_assignments.id as taskid','task_resolutions.id as resoid','task_assignments.*','task_resolutions.*','evidences.*','task_resolutions.created_at as resodate']);
        
        $resolution = TaskResolution::where('taskAssignmentID',$id)
                        ->where('userID',$taskby)
                        ->get();
                        
        $resoid = array();
        $re_id = array();
        $assignmentid = "";
        $isresolved = "";
        $evidence = array();
        $itemevidences = array();
        foreach($responses as $key)
        {
            $resoid[] = $key->resoid;
            $assignmentid = $key->taskAssignmentID;
            $isresolved = $key->taskResolved;
        }
        
        $count = (count($resoid));
        for($i = 1;$i<=$count;$i++)
        {
            // echo $i;
        }
        foreach($resoid as $reso_id)
        {
            
            $evidence[] = Evidences::where('task_id',$reso_id)
                        ->get();

        }

        foreach($evidence as $itemevidence)
        {
            $itemevidences = $itemevidence;
        }

        foreach($responses as $rid)
        {
            $re_id['0'] = $rid;
        }
        return view('tasks.responsethread', [
                                                'responses'=>$responses,
                                                'assignmentid'=>$assignmentid,
                                                'resoid'=>$resoid,
                                                'isresolved'=>$isresolved,
                                                'evidence'=>$evidence,
                                                'itemevidences'=>$itemevidences,
                                                're_id'=>$re_id,
                                                'responses_v1'=>$responses_v1,
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
                    return redirect()->back()
                    ->with('resolved', 'Some Event');
    }

    public function deletemymessage($id)
    {
        TaskResolution::where('id',$id)->delete();
        return redirect()->back()
                    ->with('delete', 'Some Event');
    }

    public function overrideelete($id)
    {
        TaskResolution::where('id',$id)->delete();
        return redirect()->back();
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
        ->orderBy('task_assignments.created_at', 'asc')
        ->get(['programs.*','task_resolutions.*','users.name AS thesource','task_assignments.id as taskid','task_assignments.taskResolved as isresolved','task_assignments.created_at AS datecreated','task_assignments.*','users.*']);
         //dd($mytasks);
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
