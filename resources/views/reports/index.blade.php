@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Accomplishment | ',
    'activePage' => 'dashboard',
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
                    <h5>Generate Accomplishment Report</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('generate') }}" method="post">
                        @csrf
                        <div class="form-group form-inline">
                            <input type="text" placeholder="Date from" onfocus="(this.type='date')" class="form-control rounded-0 border-info" name="datefrom" id="" required>
                            <input type="text" placeholder="Date to" onfocus="(this.type='date')" class="form-control rounded-0 border-info" name="dateto" id="" required>
                            <button type="submit" class="btn btn-info rounded-0">Generate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection
