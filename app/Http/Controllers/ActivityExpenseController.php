<?php

namespace App\Http\Controllers;

use App\Models\ActivityExpense;
use Illuminate\Http\Request;

class ActivityExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activityexpenses = ActivityExpense::join('activities', 'activities.id', '=', 'activity_expenses.activityID')
        ->join('programs', 'programs.id', '=', 'activities.papID')
        ->get(['activities.*', 'activity_expenses.*', 'programs.*'])->all();
    //    dd($activityexpenses);
        return view('activity.expenses',['activityexpenses'=>$activityexpenses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $validated = $req->validate([
            'fuelLubricants' => 'integer',
            'travelPerDiem' => 'integer',
            'foodAccommodation' => 'integer',
            'miscExpense' => 'integer',
            'activityNotes' =>'string|max:255',
        ]);

        $activity = new ActivityExpense;
        $activity->activityID        =  $req->activityID;
        $activity->fuelLubricants    =  $req->fuelLubricants;
        $activity->travelPerDiem     =  $req->travelPerDiem;
        $activity->foodAccommodation =  $req->foodAccommodation;
        $activity->miscExpense       =  $req->miscExpense;
        $activity->activityNotes     =  $req->activityNotes;
        $activity->created_at = now();
        $activity->updated_at = now();
        $activity->save();
        return redirect('../home');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActivityExpense  $activityExpense
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityExpense $activityExpense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActivityExpense  $activityExpense
     * @return \Illuminate\Http\Response
     */
    public function edit(ActivityExpense $activityExpense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActivityExpense  $activityExpense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActivityExpense $activityExpense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActivityExpense  $activityExpense
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActivityExpense $activityExpense)
    {
        //
    }
}
