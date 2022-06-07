@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Thoughts | ',
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
                    <h5>Step 2/3:</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('thoughts.store') }}" method="post">
                        @csrf
                        <div class="form-group form-horizontal">
                            <p><i class="fa fa-fw fa-info"></i>We would like to know more of your thoughts/insight! Please share them with us using the space provided below.:</p><br>
                            <input type="hidden" name="activityid" value="{{ $activityid }}">
                            <textarea name="thoughts" class="form-control border border-info form-bordered" id="questionnaire" cols="100" rows="10" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-info rounded-0"><i class="fa fa-fw fa-circle-check"></i>Next <i class="fa fa-fw fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
