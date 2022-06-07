@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Questionnaire | ',
    'activePage' => 'settings',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Step 1/2: Create Question</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('questionnaire.store') }}" method="post">
                        @csrf
                        <div class="form-group form-horizontal">
                            <label><i class="fa fa-fw fa-info"></i>Question:</label><br>
                            <textarea name="questionnaire" class="form-control border border-info form-bordered" id="questionnaire" cols="100" rows="10" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-info rounded-0"><i class="fa fa-fw fa-circle-check"></i>Next <i class="fa fa-fw fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h5><i class="fa fa-fw fa-th-list"></i>Created Question</h5>
                </div>
                <div class="card-body">
                    <ol>
                        <div class="row">
                            <div class="col-md-12">
                                <ol>
                                    @foreach ($question as $item)
                                        <li>
                                                
                                                <div class="dropdown">
                                                    <a class="btn btn-sm bg-info text-white dropdown-toggle rounded-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-fw fa-th-list"></i>{{ $item->question}} 
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a href="{{ route('editquestion', ['qid' => $item->qid])  }}" class="dropdown-item"><i class="fa fa-fw fa-solid fa-square-pen"></i>Edit</a>
                                                        {{-- <a href="{{ route('newsubquestion', ['qid' => $item->qid,'question'=>$item->question])  }}" class="dropdown-item"><i class="fa fa-fw fa-solid fa-circle-plus"></i>Add</a> --}}
                                                        <a href="{{ route('deletequestion', ['qid' => $item->qid])  }}" class="dropdown-item"><i class="fa fa-fw fa-solid fa-trash"></i>Delete</a>
                                                        
                                                    </div>
                                                </div> 
                                        </li>
                                        @php
                                            $data = App\Models\QuestionnaireSub::Select('question_sub')->where('qid',$item->qid)->get();
                                        @endphp
                                        <ul style="list-style-type: lower-alpha;">
                                            @foreach ($data as $key) 
                                                <li>{{ $key->question_sub}}</li>
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
