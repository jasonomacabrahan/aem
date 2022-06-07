@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Sub Question | ',
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
                                <h5>Add Sub Question:</h5>
                                @if ($message = Session::get('saved'))
                                <script>
                                    swal("Success","Sub Question Added","success");
                                </script>
                                @endif
                                <form action="{{ route('savesubquestion') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="qid" value="{{ $qid }}"/>
                                        <input type="text" class="form-control form-bordered rounded-0" name="subquestion" id="question" required/>
                                        &nbsp;
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
