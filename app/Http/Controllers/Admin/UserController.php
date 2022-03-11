<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Response;
use App\Http\Requests\UpdateUserPhotoRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class UserController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('users_access'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $users = User::with('role')->paginate(5)->appends($request->query());
        return view('admin.users.index',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $roles = Role::pluck('title','id');
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('admin.users.index')->with(['status-success' => "New User Created"]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $roles = Role::pluck('title','id');
        return view('admin.users.edit',compact('user','roles'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update(array_filter($request->validated()));
        return redirect()->route('admin.users.index')->with(['status-success' => "User Updated"]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $user->delete();
        return redirect()->back()->with(['status-success' => "User Deleted"]);
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
}
