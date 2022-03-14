<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Response;
use App\Models\Todo;
class HomeController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
    
    public function index() 
    {
        \LogActivity::addToLog('Accessed administrator panel');
        $todo = Todo::all();
        return view('admin.home')->with(compact('todo'));
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
