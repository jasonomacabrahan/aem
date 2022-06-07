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
                <div class="card-header">
                    <h5>Consent</h5>
                </div>
                <div class="card-body">
                    <p>
                        I hereby agree and consent to the collection and processing of my personal data, 
                        Specifically name and contact details for the purpose of processing customer feedback 
                        and improving service. I assure the notification of should there be any amendment in my personal
                        information. This consent shall be valid, unless I otherwise revoke or withdraw the same in writing
                        but subject to the existing laws, rules, and regulations of (bureau/office).
                    </p>
                    <strong>{{ auth()->user()->name }}</strong> | <label>{{ date("M-d-Y"); }}</label>
                </div>
                <div class="card-footer">
                    <a href="{{ route('feedback.index') }}" class="btn btn-info rounded-0"><i class="fa fa-fw fa-circle-check"></i>I agree</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
