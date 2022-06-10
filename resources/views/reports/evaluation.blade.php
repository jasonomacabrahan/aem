@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Evaluation | ',
    'activePage' => 'dashboard',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h5><a href="{{ route('satisfaction_report') }}" class="btn btn-info btn-sm text-white"><i class="fa fa-fw fa-arrow-left"></i></a>Activity Responses <a href="" class="float-right text-white"><i class="fa fa-fw fa-cog"></i></a></h5>
                    
                </div>
                <div class="card-body">
                     <div id="gender-count"></div>
                    <script>
                        FusionCharts.ready(function () {
                            // chart instance
                            var chart = new FusionCharts({
                                type: "bar2d",
                                renderAt: "gender-count", // container where chart will render
                                width: "500",
                                height: "400",
                                dataFormat: "json",
                                dataSource: {
                                    // chart configuration
                                    chart: {
                                        caption: "Gender",
                                        subcaption: "....",
                                        "theme": "fint"
                                    },
                                    // chart data
                                    data: [
                                      <?php
                                          foreach($gendercount as $graphdata){
                                            ?>
                                              { label: "<?php if($graphdata->sex=='0'){ echo 'Male';}else{ echo 'Female';} ?>", value: "<?php echo $graphdata->gender_C; ?>" },
                                            <?php
                                          }

                                      ?> 
                                    ]
                                }
                            }).render();
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-info">
                        <h5 class="text-white"><i class="fa fa-fw fa-users"></i>Who has responded</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @forelse ($gendercount as $item)
                                <li class="list-group-item">{{ $item->name }} <span class="float-right">{{ $item->contactNumber }}</span></li>
                            @empty
                                                
                            @endforelse
                        </ul>
                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5><i class="fa-solid fa-at"></i>Email</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @forelse ($gendercount as $item)
                                <li class="list-group-item">{{ $item->email}}</li>
                            @empty
                                                
                            @endforelse
                        </ul>
                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <h5><i class="fa-solid fa-house-laptop"></i>Agency or Office</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @forelse ($gendercount as $item)
                                <li class="list-group-item">{{ $item->agency}}</li>
                            @empty
                                                
                            @endforelse
                        </ul>
                    </div>
                </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h5><i class="fa fa-fw fa-th-list"></i>Questionnaire</h5>
                </div>
                <div class="card-body">
                    <ol>
                        <div class="row">
                            <div class="col-md-12">
                                <ol>
                                    @foreach ($question as $item)
                                        <li>{{ $item->question}}</li>
                                        @php
                                            $data = App\Models\QuestionnaireSub::Select('question_sub','feedback_answer',\DB::raw('AVG(feedback_answer) as answer'))->join('feedback','feedback.qid','=','questionnaire_subs.q_sub_id')->groupBy('questionnaire_subs.q_sub_id')->where('questionnaire_subs.qid',$item->qid)->get(['questionnaire_subs.*','feedback.*']);
                                        @endphp
                                        <ul style="list-style-type: lower-alpha;">
                                            @foreach ($data as $key) 
                                                <li>{{ $key->question_sub}}:<span class="badge badge-info">{{ $key->answer}}</span></li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </ol>
                                </div>
                            </div>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
