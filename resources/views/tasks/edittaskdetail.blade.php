@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Edit Task',
    'activePage' => 'tasks.add',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])
@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="container">
    <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-info text-white fw-bolder">
                <h5><i class="fa-solid fa-list-check"></i>{{__(" Task Assigment ")}}</h5>
              </div>
            <div class="card-body">
              @if ($message = Session::get('success'))
                        <script>
                            swal("Success","Task Updated","success");
                        </script>
              @endif
            <form action="{{ route('savetaskchanges') }}" method="POST" class="mt-1 py-3">
                @csrf
                @foreach($mytasks as $mytask)
                            <div class="form-group">
                                <label for="taskDetail" class="fw-bolder text-dark"><i class="fa fa-fw fa-info"></i>{{__(" Task Detail")}}</label>
                                <textarea name="taskDetail" id="taskDetail" class="form-control border form-bordered" cols="60" rows="10" required>{{ $mytask->taskDetail }}</textarea>
                                <input type="hidden" name="id" value="{{ Crypt::encryptString($mytask->taskid) }}">
                                @include('alerts.feedback', ['field' => 'taskDetail'])
                            </div>
                            
                @endforeach
                <button type="submit" class="btn btn-info"> <i class="fa-solid fa-fw fa-floppy-disk"></i> Save Changes</button>

            </form>
            </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection

@push('js')
    <script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
    </script>
@endpush

