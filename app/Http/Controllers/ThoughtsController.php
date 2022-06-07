<?php

namespace App\Http\Controllers;

use App\Models\Thoughts;
use Illuminate\Http\Request;

class ThoughtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function thoughts($activityid)
    {
        return view('thoughts.thought',['activityid'=>$activityid]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'activityid' => 'required',
            'thoughts' => 'required|string|max:255',
        ]);
        $t = new Thoughts;
        $t->activity_id= $request->activityid;
        $t->thoughts= $request->thoughts;
        $t->created_at= NOW();
        $t->updated_at= NOW();
        $t->save();
        return redirect()->route('rating', ['activityid' => $request->input('activityid')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thoughts  $thoughts
     * @return \Illuminate\Http\Response
     */
    public function show(Thoughts $thoughts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thoughts  $thoughts
     * @return \Illuminate\Http\Response
     */
    public function edit(Thoughts $thoughts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thoughts  $thoughts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thoughts $thoughts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thoughts  $thoughts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thoughts $thoughts)
    {
        //
    }
}
