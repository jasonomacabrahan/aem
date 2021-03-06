<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\ActivityExpense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        ->get(['activities.*', 'activity_expenses.*', 'programs.*','activity_expenses.id'])->all();
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
            'fuelLubricants' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'travelPerDiem' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'foodAccommodation' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'miscExpense' => 'required|regex:/^\d*(\.\d{1,2})?$/',
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
        //return redirect('../home');
        return redirect()->route('activity.index')
                    ->with('successexpenses', 'Event');

    }

    public function createexpense_new(Request $req)
    {
        $validated = $req->validate([
            'fuelLubricants' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'travelPerDiem' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'foodAccommodation' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'miscExpense' => 'required|regex:/^\d*(\.\d{1,2})?$/',
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
       
        return redirect()->back()
                    ->with('success', 'Event');

    }

    public function updateexpense($id)
     {
        $expenses = DB::table('activity_expenses')
            ->where('id',$id)
            ->get();

        return view('pages.updateexpense',[
                                         "expenses"=>$expenses,
                                         ]);

     }
     public function updateexpense_new($id)
     {
        $expenses = DB::table('activity_expenses')
            ->where('id',$id)
            ->get();

        return view('pages.updateexpense_new',[
                                         "expenses"=>$expenses,
                                         ]);

     }

    public function saveexpenseupdate(Request $request)
     {
        $request->validate([
            'fuelLubricants' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'travelPerDiem' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'foodAccommodation' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'miscExpense' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'activityNotes' => 'required|string|max:255)'
        ]);
        $updating = DB::table('activity_expenses')
                    ->where('id',$request->input('id'))
                    ->update([
                                'fuelLubricants'=>$request->input('fuelLubricants'),
                                'travelPerDiem'=>$request->input('travelPerDiem'),
                                'foodAccommodation'=>$request->input('foodAccommodation'),
                                'miscExpense'=>$request->input('miscExpense'),
                                'activityNotes'=>$request->input('activityNotes'),
                    ]);
                    return redirect()->back()
                        ->with('successupdate', 'Changes Saved');
     }

     public function saveexpenseupdate_new(Request $request)
     {
        $request->validate([
            'fuelLubricants' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'travelPerDiem' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'foodAccommodation' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'miscExpense' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'activityNotes' => 'required|string|max:255)'
        ]);
        $updating = DB::table('activity_expenses')
                    ->where('id',$request->input('id'))
                    ->update([
                                'fuelLubricants'=>$request->input('fuelLubricants'),
                                'travelPerDiem'=>$request->input('travelPerDiem'),
                                'foodAccommodation'=>$request->input('foodAccommodation'),
                                'miscExpense'=>$request->input('miscExpense'),
                                'activityNotes'=>$request->input('activityNotes'),
                    ]);
                    return redirect()->back()
                        ->with('successupdate', 'Changes Saved');
     }


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
