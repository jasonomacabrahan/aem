<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /*  
    public function __construct()
	{
	    $this->middleware('auth')->except('regnew');;
	}
    */

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

    

    public function regnew(Request $req)
    {
        $errorstr = '';
        $successstr = '';   
        //dd($req);
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
            $newRegistrant = $user->id;

            $successstr .= ' Registrant  '.$user->name.' ( '.$newRegistrant.' ) registration successful! ';    
        }

        //preturn view('welcome');
        return redirect()->route('login')
                ->with('success', 'New User added');
    }
}


