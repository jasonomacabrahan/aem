<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\QuestionnaireSub;
use Illuminate\Http\Request;

class QuestionnaireSubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('questionnaires.subquestion');
    }

    public function addsubquestion($id,$question)
    {
        $q = Questionnaire::join('questionnaire_subs','questionnaire_subs.qid','=','questionnaires.qid')
                            ->where('questionnaire_subs.qid',$id)
                            ->get(['questionnaire_subs.*','questionnaires.*']);
        return view('questionnaires.subquestion',[
                                                    'id'=>$id,
                                                    'question'=>$question,
                                                    'q'=>$q
                                                ]);
    }
    public function newsubquestion($qid,$question)
    {
        $q = Questionnaire::join('questionnaire_subs','questionnaire_subs.qid','=','questionnaires.qid')
                            ->where('questionnaire_subs.qid',$id)
                            ->get(['questionnaire_subs.*','questionnaires.*']);
        return view('questionnaires.add',[
                                                    'qid'=>$qid,
                                                    'question'=>$question,
                                                    'q'=>$q
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
            'question_sub' => 'required|string|max:255',
            'qid'=>'required'
        ]);
        $q = new QuestionnaireSub;
        $q->qid= $request->qid;
        $q->question_sub= $request->question_sub;
        $q->created_at= NOW();
        $q->updated_at= NOW();
        $q->save();
        return redirect()->back();
    }
    public function savesubquestion(Request $request)
    {
        $validated = $request->validate([
            'subquestion' => 'required|string|max:255',
            'qid'=>'required'
        ]);
        $q = new QuestionnaireSub;
        $q->qid= $request->qid;
        $q->question_sub= $request->subquestion;
        $q->created_at= NOW();
        $q->updated_at= NOW();
        $q->save();
        return redirect()->back()->with('saved', 'Some Event');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionnaireSub  $questionnaireSub
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionnaireSub $questionnaireSub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionnaireSub  $questionnaireSub
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionnaireSub $questionnaireSub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionnaireSub  $questionnaireSub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $qsubid = $request->input('qid');
        $subquestion = $request->input('subquestion');
        $count_items = count($subquestion);
        for($i = 0; $i<$count_items; $i++)
        {
            $q = QuestionnaireSub::where('q_sub_id', $qsubid[$i])->first();
            $q->update([
            'question_sub' => $subquestion[$i],
            'created_at'=>NOW(),
            'updated_at'=>NOW(),
            ]);
        }
        return redirect()->back()->with('updated', 'Some Event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionnaireSub  $questionnaireSub
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionnaireSub $questionnaireSub)
    {
        //
    }
}
