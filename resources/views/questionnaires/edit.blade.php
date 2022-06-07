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
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <a href="{{ route('questionnaire.index') }}" class="btn btn-info rounded-0"><i class="fa fa-fw fa-arrow-left"></i></a>
                </div>  
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <h5>Question:</h5>
                                @if ($message = Session::get('updated'))
                                <script>
                                    swal("Success","Updated","success");
                                </script>
                                @endif

                                <form action="{{ route('saveupdatequestion') }}" method="post">
                                    @csrf
                                    @foreach ($questionnaire as $item)
                                        <input type="hidden" name="qid" value="{{ $item->qid}}"/>
                                        <textarea class="form-control border border-info form-bordered pl-1" name="question" id="question" cols="30" rows="10" required>{{ $item->question}}</textarea>
                                    @endforeach
                                    <button class="btn btn-info rounded-0" type="submit"><i class="fa fa-fw fa-save"></i>Save Changes</button>
                                </form>

                                <h5>Sub Question:</h5>
                                <form action="{{ route('updatesubquestion') }}" method="post">
                                    @csrf
                                    @foreach ($subquestion as $sub)
                                        <input type="hidden" name="qid[]" value="{{ $sub->q_sub_id }}"/>
                                        <input type="text" class="form-control form-bordered rounded-0" name="subquestion[]" id="question" value="{{ $sub->question_sub}}" required/>
                                        &nbsp;
                                    @endforeach
                                    <button class="btn btn-info rounded-0" type="submit"><i class="fa fa-fw fa-save"></i>Save Changes</button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
