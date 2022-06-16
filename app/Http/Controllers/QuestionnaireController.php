<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\QuestionnaireSub;
use App\Models\Feedback;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use \Crypt;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subquestion =  QuestionnaireSub::where('deleted_at',NULL)->get();
        $question = Questionnaire::where('deleted_at',NULL)->get();
        return view('questionnaires.index',[
                                            'question'=>$question,
                                            'subquestion'=>$subquestion
                                        ]);
    }

    public function satisfaction_report(){
        $activity = Activity::join('feedback','feedback.activity_id','=','activities.id')
                                ->groupBy('feedback.activity_id')
                                ->get(['feedback.*','activities.*',\DB::raw('round(AVG(feedback_answer),0) as average')]);

        return view('reports.activity',['activity'=>$activity]);
    }

    //here i embedded query for graph
    public function evaluation_report($activityid)
    {
        $activity_id = Crypt::decryptString($activityid);
        $activity = Activity::join('feedback','feedback.activity_id','=','activities.id')
                                ->where('feedback.activity_id',$activity_id)
                                ->groupBy('feedback.activity_id')
                                ->get(['feedback.*','activities.*']);

        $gendercount = User::join('feedback','feedback.user_id','=','users.id')
                            ->where('feedback.activity_id',$activity_id)
                            ->groupBy('sex')
                            ->get(['users.*','feedback.*',\DB::raw('count(DISTINCT sex) as gender_C')]);

        $subquestion =  QuestionnaireSub::where('deleted_at',NULL)->get();
        $question = Questionnaire::where('deleted_at',NULL)->get();
        
        
        return view('reports.evaluation',[
                                            'activity'=>$activity,
                                            'id'=>$activity_id,
                                            'gendercount'=>$gendercount,
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'questionnaire' => 'required|string|max:255',
        ]);
        $q = new Questionnaire;
        $q->question= $request->questionnaire;
        $q->created_at= NOW();
        $q->updated_at= NOW();
        $q->save();
        return redirect()->route('addsubquestion', ['qid' => $q->id,'question'=>Crypt::encryptString($request->questionnaire)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit($qid)
    {
        $questionnaire = Questionnaire::where('qid',$qid)
                            ->get();
        $subquestion = QuestionnaireSub::where('qid',$qid)
                            ->get();
        return view('questionnaires.edit',[
                        'questionnaire'=>$questionnaire,
                        'subquestion'=>$subquestion
                    ]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $qid = $request->input('qid');
        $question = $request->input('question');
        Questionnaire::where('qid', $qid)
                        ->update([
                                    'question' => $question,
                                    'created_at' => NOW(),
                                    'updated_at' => NOW()
                                ]);
        
        return redirect()->back()->with('updated', 'Some Event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function deletewarning($qid)
    {
        return view('questionnaires.deletewarning',['qid'=>$qid]);
    }
    public function destroy(Request $request)
    {
        Questionnaire::where('qid', $request->input('qid'))
                    ->update([
                        'deleted_at' => NOW()
                    ]);
        QuestionnaireSub::where('qid', $request->input('qid'))
                    ->update([
                        'deleted_at' => NOW()
                    ]);
        return redirect()->route('questionnaire.index');
    }
}
