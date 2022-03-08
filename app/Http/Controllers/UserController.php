<?php

namespace App\Http\Controllers;
use Mail;
use App\Models\User;
use App\Models\OneTimePassword;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Session;
use \Crypt;

class UserController extends Controller
{
    
    public function __construct()
	{
	    //$this->middleware('focal');
	    //$this->middleware('auth')->except('sendEmailReminder');;
        //$email = auth()->user()->email;
        //dd($email);
        //return "Hello";
        // $checkotp = OneTimePassword::join('one_time_passwords', 'one_time_passwords.email', '=', 'users.email')
        // ->where('one_time_passwords.email','=',$email)
        // ->get();
        // dd($checkotp);
        //return view('tasks.mytasks', ['mytasks'=>$mytasks]);
	}

    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     *   return view('users.index', ['users' => $model->paginate(15)]);
     */

    public function index(User $model)
    {
        $users = User::all();
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    

    

    public function getuser($id)
    {
         $users = DB::table('users')
            ->where('id',$id)
            ->get();
         return view('pages.updatuser',[
                                        "users"=>$users
                                        ]);
    }

    public function saveuserupdate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|max:255',
            'contactNumber' => 'required|string|max:255',
            'agency' => 'required',
            'division' => 'required',
            'designation' => 'required',
            'usertype' => 'required',
        ]);

        
        $updating = DB::table('users')
                    ->where('id',$request->input('id'))
                    ->update([
                                'name'=>$request->input('name'),
                                'agency'=>$request->input('agency'),
                                'division'=>$request->input('division'),
                                'designation'=>$request->input('designation'),
                                'contactNumber'=>$request->input('contactNumber'),
                                'usertype'=>$request->input('usertype'),
                                'email'=>$request->input('email'),
                    ]);
                    return back()->with('success', 'Changes Saved');
    }


    

    public function regnew(Request $req)
    {
        $errorstr = '';
        $successstr = '';   
        $aerrors = array();
        $validated = $req->validate([
            'email' => 'required|string|max:255|unique:users,email',
            'contactNumber' =>'string|max:15|unique:users',
            'password' =>'min:8',
            'password_confirmation' =>'min:8',
        ]);

        // checking for password match
        $errorstr .= ($req->password<>$req->password_confirmation) ? " Password mismatch! " : '';

        if (!$errorstr){
            //recording registration data here;
            $user = new User;
            $user->name         = $req->name;
            $user->agency       = $req->agency;
            $user->division     = $req->division;
            $user->designation  = $req->designation;
            $user->email        = $req->email;
            $user->sex          = $req->sex;
            $user->contactNumber = $req->contactNumber;
            $user->usertype     = 'registrant';
            $user->password     = Hash::make($req->password);
            $user->save();
            $email  = $user->email;
             
        }

        return view('challenge')->with('email',$email);

    }

    public function challenge()
    {
        return view('challenge');
    }

    public function userchallenge()
    {
        return view('userchallenge');
    }

    public function sendconfirmationcode($email)
    {
        $email = Crypt::decrypt($email);
        $details = [
            'title' => 'AEM Account Confirmation',
            'body' => 'Below is your Confirmation Code.'
        ];
        
       
        \Mail::to($email)->send(new \App\Mail\MyMail($details,$email));
       
        return redirect()->route('login')
                    ->with('codeok', 'some event');
    }

    public function verifyotp(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'otp' => 'required'
        ]);

        $checkotp = DB::table('one_time_passwords')
                    ->where('email',$request->input('email'))
                    ->where('otp',$request->input('otp'))
                    ->update([
                                'status'=>'1',
                    ]);
        if($checkotp==1)
        {
            return redirect()->route('home')
            ->with('success', 'Some Event');

        }else{
            return redirect()->route('userchallenge')
            ->with('error', 'Some Event');
        }
    }

    public function trap()
    {

    }
}


