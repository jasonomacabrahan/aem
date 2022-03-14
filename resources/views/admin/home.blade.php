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
        </div>
        <div class="card-body">
            <div class="modal fade" id="formModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="formModalLabel">Create Todo</h4>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" name="myForm" class="form-horizontal" novalidate="">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control rounded-0" id="title" name="title"
                                            placeholder="Enter title" value="">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                        <input type="text" class="form-control rounded-0" id="description" name="description"
                                            placeholder="Enter Description" value="">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info rounded-0" id="btn-save" value="add">Save changes
                            </button>
                            <input type="hidden" id="todo_id" name="todo_id" value="0">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">

                    <table class="table table-sm table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody id="todos-list" name="todos-list">
                        @foreach ($todo as $data)
                        <tr id="todo{{$data->id}}">
                            <td>{{$data->id}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->description}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>

            
        </div>
    </div>    

</div>
  



@endsection
