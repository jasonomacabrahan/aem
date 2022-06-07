<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use App\Models\QuestionnaireSub;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subquestion =  QuestionnaireSub::all();
        $question = Questionnaire::all();
        return view('feedback.index',[
                                            'question'=>$question,
                                            'subquestion'=>$subquestion
                                        ]);
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

    public function consent()
    {
        return view('feedback.consent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qcount = QuestionnaireSub::all();
        $count = count($qcount);
        $answer = array();
        for($i=1;$i<=$count;$i++)
        {
                $answer[]=$request->input($i);
        }
        foreach(array_combine($request->input('q_sub_id'),$answer) as $sid=>$ans)
        {    
            Feedback::create([
                            'user_id'=>auth()->user()->id,
                            'qid'=>$sid,
                            'activity_id'=>$request->input('ActivityID'),
                            'feedback_answer'=>$ans,
                            'created_at'=>NOW(),
                            'updated_at'=>NOW(),
            ]);
        }
        return redirect()->route('yourthought', ['activityid' => $request->input('ActivityID')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
