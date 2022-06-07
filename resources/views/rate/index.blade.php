@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Rate | ',
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
                    <h5>Step 3/3: Rating</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('rate.store') }}" method="post">
                        @csrf
                        <p>Your feedback matters, Please rate our Secretariat...</p>
                        <div class="form-group form-horizontal">
                            
                            <input type="hidden" name="activityid" value="{{ $activityid }}">
                            <label for="vs" style="font-weight: bolder; color: black;">Excellent</label>
                            <input type="radio" id="vs" name="rate" value="4"/>
                            <label for="s" style="font-weight: bolder; color: black;">Good</label>
                            <input type="radio" id="s" name="rate" value="3"/>
                            <label for="d" style="font-weight: bolder; color: black;">Average</label>
                            <input type="radio" id="d" name="rate" value="2"/>
                            <label for="vd" style="font-weight: bolder; color: black;">Poor</label>
                            <input type="radio" id="vd" name="rate" value="1"/>
                        </div>
                        <button type="submit" class="btn btn-info rounded-0"><i class="fa fa-fw fa-circle-check"></i>Submit <i class="fa fa-fw fa-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
