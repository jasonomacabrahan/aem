<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\QuestionnaireSub;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
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
        // $q = Questionnaire::join('questionnaire_subs','questionnaire_subs.qid','=','questionnaires.qid')
        //                     ->get(['questionnaire_subs.*','questionnaire_subs.qid as subqid','questionnaires.*']);

        return view('questionnaires.index',[
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
        $q->id;
        return redirect()->route('addsubquestion', ['qid' => $q->id,'question'=>$request->questionnaire]);
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
        \DB::table('questionnaire_subs')->where('qid',$request->input('qid'))->delete();
        \DB::table('questionnaires')->where('qid',$request->input('qid'))->delete();
        return redirect()->route('questionnaire.index');
    }
}
