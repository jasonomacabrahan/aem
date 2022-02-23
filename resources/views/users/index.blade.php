@extends('layouts.app', [
    'namePage' => 'USERS LIST',
    'class' => 'sidebar-mini',
    'activePage' => 'users',

])
@section('content')
  <div class="panel-header panel-header-sm">

  </div>
<div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h2><i class="fa fa-fw fa-th-list"></i>Users</h2>
                <a href="{{ '#' }}" id="test" class="btn btn-info"><i class="fas fa-plus-circle"></i>New User</a>
              </div>
            <div class="card-body">
                <style>
                    table,th,td,tr,thead{
                        font-size: 10pt;!important;
                    }
                </style>
                 @if ($message = Session::get('success'))
                 <script>
                     swal("Success","Changes Saved","success");
                 </script>
                @endif


                @if ($message = Session::get('error'))
                 <script>
                     swal("Oops","Something is wrong I cant Identify","error");
                 </script>
                @endif

                <table id="list" class="table table-striped table-hover table-bordered" style="width:100%">
                    <thead >
                        <tr style='font-size: 8pt;'>
                            <th>Name</th>
                            <th>Agency</th>
                            <th>Division</th>
                            <th>Designation</th>
                            <th>Contact Number</th>
                            <th>Sex</th>
                            <th>User Type</th>
                            <th>eMail</th>
                            <th>Created@</th>
                            <th><i class="fa fa-fw fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><a href="{{ route('getuser', ['id' => $user->id])  }}" title="Update User"></i>{{ $user->name }}<i class="fa-solid fa-fw fa-pen-to-square"></i></a></td>
                                <td>{{ $user->agency }}</a></td>
                                <td>{{ $user->division }}</td>
                                <td>{{ $user->designation }}</td>
                                <td>{{ $user->contactNumber }}</td>
                                <td>{{ (($user->sex==0)?'Male':'Female') }}</td>
                                <td><a href="">{{ $user->usertype }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href=""><i class="fa fa-fw fa-th-list"></i></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr>
                            <th>Name</th>
                            <th>Agency</th>
                            <th>Division</th>
                            <th>Designation</th>
                            <th>Contact Number</th>
                            <th>Sex</th>
                            <th>User Type</th>
                            <th>eMail</th>
                            <th>Created@</th>
                            <th><i class="fa fa-fw fa-cog"></i></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div><!--end of card-->
      </div>
    </div>
</div>
@endsection
