<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Response;
use App\Models\Todo;
class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::all();
        return view('dashboard.index')->with(compact('todo'));
    }
    /**
     * Store a newly created resource in storage.
     *
     */
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