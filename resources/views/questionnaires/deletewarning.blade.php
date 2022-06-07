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
                                @if ($message = Session::get('deleted'))
                                <script>
                                    swal("Deleted","Successfuly moved to trash","success");
                                </script>
                                @endif
                                <form action="{{ route('destroyna') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="qid" value="{{ $qid }}"/>
                                    <div class="alert alert-danger">
                                        <h5>Are you sure you want to delete this Question?</h5>
                                        <em>Note: Sub question will be deleted to.</em>
                                    </div>
                                    <button class="btn btn-danger rounded-0" type="submit"><i class="fa fa-fw fa-trash"></i>Delete</button>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
