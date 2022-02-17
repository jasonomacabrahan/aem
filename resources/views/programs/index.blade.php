@extends('layouts.app', [
    'namePage' => 'PROGRAM AND PROJECTS',
    'class' => 'sidebar-mini',
    'activePage' => 'programs',

])


@section('content')
  <div class="panel-header panel-header-sm">

  </div>
<div class="container-fluid">
    <div class="row">

      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h2><i class="fa fa-fw fa-th-list"></i>Program & Projects</h2>
                <a href="programs.add" id="programs" class="btn btn-success"><i class="fas fa-plus-circle"></i> New Program </a>
<!---                <a href="{{ '#' }}" class="btn btn-warning"><i class="fas fa-hand-holding"></i>Withdraw</a>
                <a href="{{ '#' }}" class="btn btn-primary pull-right  "><i class="fas fa-swatchbook"></i>Category</a>
                <a href="{{ '#' }}" class="btn btn-primary pull-right"><i class="fas fa-ruler"></i>Unit</a>
                <a href="{{ '#' }}" class="btn btn-primary pull-right"><i class="fas fa-people-carry"></i>Recipient</a> -->
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
                            <th>Short Name</th>
                            <th>Description</th>
                            <th>Focal Person</th>
                            <th>Created@</th>
                            <th><i class="fa fa-fw fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td><a href="#" title="Update program"></i>{{ $program->shortName }}</a></td>
                                <td>{{ $program->programDescription }}</a></td>
                                <td>{{ $program->focalPerson }}</td>
                                <td>{{ $program->created_at }}</td>
                                <td>
                                    <a href=""><i class="fa fa-fw fa-th-list"></i></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot style='font-size: 8pt;'>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Focal Person</th>
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
