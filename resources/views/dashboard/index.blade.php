@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Dashboard',
    'activePage' => 'dashboard',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="bg-light p-5 rounded">
                <h1>Hi {{ auth()->user()->name }}</h1>
                <label class="badge badge-info">{{ date('Y-m-d H:i:s') }}</label><br>
                @foreach ($user as $userdata)
                <label class="badge badge-danger">{{ $userdata->title }}</label>
                @endforeach
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
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="text-white fw-bold"><i class="fa fa-fw fa-th-list  text-white"></i>To Do List</h3>
                    <a href="javascript:void(0)" class="btn btn-info float-right" id="btn-add">
                        <i class="fa fa-fw fa-plus"></i>Add Todo
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="alert alert-warning">
                            <i class="fa fa-fw fa-info"></i>Todos feature is under development
                        </div>
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
        </div> --}}
    </div>
    
</div>

@endsection
