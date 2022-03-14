<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use App\Models\Todo;
use App\Models\User;
use App\Models\Role;
class DashboardController extends Controller
{
    public function index() 
    {
        $id = auth()->user()->id;
        $todo = Todo::all();
        $user = User::join('roles','roles.id','=','users.role_id')
                ->where('users.id',$id)
                ->get();
        return view('dashboard.index')->with(compact('todo','user'));
        //return view('dashboard.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
        $todo = Todo::create($data);
        return Response::json($todo);
    }

    


}
