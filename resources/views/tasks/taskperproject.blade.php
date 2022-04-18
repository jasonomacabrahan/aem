@extends('layouts.app', [
    'namePage' => auth()->user()->name. ' - Tasks (*)',
    'class' => 'sidebar-mini',
    'activePage' => 'mytasks',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])

@section('content')
  <div class="panel-header panel-header-sm">

  </div>
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2><i class="fa fa-fw fa-th-list"></i>Assigned Task(s)</h2>
                <a href="{{ route('taskmonitoring') }}" class="btn btn-info"><i class="fa fa-fw fa-arrow-left"></i>Go Back</a>
                
                </div>
                <div class="card-body">
                    <h1>Coming Soon...</h1>
               
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

