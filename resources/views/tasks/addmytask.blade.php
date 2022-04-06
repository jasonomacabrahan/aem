@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Add Task',
    'activePage' => 'tasks.add',
    'backgroundImage' => asset('assets') . "/img/logo.png",
])

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@php
    $programs = DB::table('programs')->get();
    $users = DB::table('users')->get();
@endphp
@section('content')
<div class="panel-header panel-header-sm">

</div>
<div class="content">

    <div class="container">

    <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header bg-info text-white fw-bolder">
                <h5><i class="fa-solid fa-list-check"></i>{{__(" Create My Task ")}}</h5>
              </div>
            <div class="card-body">
              @if ($message = Session::get('success'))
                        <script>
                            swal("Success","Task Added","success");
                        </script>
              @endif
            <form action="{{ route('createmytask') }}" method="POST" class="mt-1 py-3">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group" id="program-select">
                        <strong for="" class="fw-bolder text-dark">Program & Projects</strong>
                        <select name='papID'  class="form-control rounded-0 border-info" id='program-select'>
                            @php
                            foreach($programs as $program){
                                echo '<option value="' . $program->id.'" > '. strtoupper($program->shortName) .' ( ' .$program->id . '  ) [ '. $program->programDescription .' ]  </option>';
                            }
                            @endphp
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <strong for="taskDetail" class="fw-bolder text-dark">{{__(" Task Detail")}}</strong>
                        <textarea name="taskDetail" class="form-control border border-info form-bordered" id="taskDetail" cols="50" rows="10" required></textarea>
                        @include('alerts.feedback', ['field' => 'taskDetail'])
                      </div>
                    </div>
                    
                </div>                

                
                <button type="submit" class="btn btn-block btn-info"> <i class="fa-solid fa-fw fa-floppy-disk"></i> Save </button>
                
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
@endpush







