@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header panel-header-sm">
    <canvas id="bigDashboardChart"></canvas>
</div>
<div class="content">
    <div class="card">
        <div class="card-header">
            <h5>Welcome {{ Auth::user()->name;}}</h5>
            <label class="badge badge-info text-white">You logged in as Administrator...</label>
        </div>
        <div class="card-body">
            
            <h6>Few Things you could do</h6>
            <ol>
                <li>Create Roles</li>
                <li>Create Permissions</li>
                <li>Create Users</li>
            </ol>
        </div>
    </div>    

</div>
  



@endsection
