@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Dashboard',
    'activePage' => 'activities',
    'activeNav' => '',
    'backgroundImage' => asset('now') . "/img/logo.png",
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-light p-5 rounded">
                <h1>Hi {{ auth()->user()->name }}</h1>
                {{ date('Y-m-d H:i:s'); }}
                
            </div>
        </div>
    </div>
</div>

@endsection
