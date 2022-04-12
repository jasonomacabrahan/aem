@extends('layouts.app', [
    'namePage' => 'Permission',
    'class' => 'sidebar-mini',
    'activePage' => 'permission',

])

@section('content')
<div class="panel-header panel-header-sm">

</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Permissions List') }}</div>
      
            <div class="card-body">
                @can('permission_create')
                    <a href="{{ route('admin.permissions.create') }}" class="btn btn-info">Add New Permission</a>
                @endcan
      
                <br /><br />
      
      
      
                    <table id="list" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td style="font-size: 10pt; font-weight: strong;">ID</td>
                                <td style="font-size: 10pt; font-weight: strong;">Name</td>
                                <td style="font-size: 10pt; font-weight: strong;">
                                    Date Created
                                </td>
                                <td style="font-size: 10pt; font-weight: strong;">
                                    Date Updated
                                </td>
                                <td style="font-size: 10pt; font-weight: strong;">
                                    Option(s)
                                </td>
                            </tr>
                        </thead>        
                        <tbody>
                        @forelse ($permissions as $permission)

                            <tr>
                                <td class="text-center">{{$permission->id}}</td>
                                <td>{{$permission->name}}</td>
                                <td>{{$permission->created_at}}</td>
                                <td>{{$permission->updated_at}}</td>
                                <td>
                                    @can('permission_edit')
                                            <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @endcan
                                        @can('permission_delete')
                                    <form action="{{ route('admin.permissions.destroy', $permission->id) }}" class="d-inline-block" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            
                            @empty
                            <tr>
                                <td colspan="100%" class="text-center text-muted py-3">No Permissions Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr class="bg-info text-light">
                                <td style="font-size: 10pt; font-weight: strong;">ID</td>
                                <td style="font-size: 10pt; font-weight: strong;">Name</td>
                                <td style="font-size: 10pt; font-weight: strong;">
                                    Date Created
                                </td>
                                <td style="font-size: 10pt; font-weight: strong;">
                                    Date Updated
                                </td>
                                <td style="font-size: 10pt; font-weight: strong;">
                                    Option(s)
                                </td>
                            </tr>
                        </tfoot>
                    </table>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection
