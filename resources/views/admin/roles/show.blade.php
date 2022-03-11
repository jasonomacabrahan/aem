@extends('layouts.app', [
    'namePage' => 'ROLES',
    'class' => 'sidebar-mini',
    'activePage' => 'roles',

])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('View Role') }}</div>
      
            <div class="card-body">
      
                <a href="{{ route('admin.roles.index') }}" class="btn btn-light">Back to List</a>
      
                <br /><br />
      
      
      
                    <table class="table table-borderless">
      
                        <tr>
                            <th width="25%">ID</th>
                            <td>{{ $role->id }}</td>
                        </tr>
                        <tr>
                            <th width="25%">Title</th>
                            <td>{{ $role->title }}</td>
                        </tr>
                        <tr>
                            <th width="25%">Short Code</th>
                            <td>{{ $role->short_code ?? "--" }}</td>
                        </tr>
                        <tr>
                            <th width="25%">Permissions</th>
                            <td>
                                @forelse ($role->permissions as $permission)
                                    <div class="badge badge-info">{{ $permission->name }}</div>
                                    @empty
                                    No Permissions
                                @endforelse
                           </td>
                        </tr>
      
                    </table>
      
      
      
      
            </div>
        </div>
    </div>
  </div>
</div>

@endsection
