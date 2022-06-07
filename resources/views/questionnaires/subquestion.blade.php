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
                    <h5>Step 2/2: Create Sub-Question</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('questionnairesub.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Question:</label><br>
                            <strong>{{ $question }}</strong>
                        </div>
                        <div class="form-group form-horizontal">
                            <label>Sub Question:</label><br>
                            <input type="hidden" name="qid" value="{{ $id }}">
                            <textarea name="question_sub" class="form-control border border-info form-bordered" id="questionnaire" cols="100" rows="10" required></textarea>
                        </div>
                        <a href="{{ route('questionnaire.index') }}" class="btn btn-primary rounded-0"><i class="fa fa-fw fa-circle-check"></i>Finish</a>
                        <button type="submit" class="btn btn-info rounded-0"><i class="fa fa-fw fa-save"></i>Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <ol>
                        @forelse ($q as $item)
                            <li>{{ $item->question_sub }}</li>
                        @empty
                            <div class="alert alert-info">
                                No sub question yet...
                            </div>
                        @endforelse
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
