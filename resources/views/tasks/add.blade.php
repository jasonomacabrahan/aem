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
                            swal("Success","Task Added","success");
                        </script>
              @endif
            <form action="{{ route('addtask') }}" method="POST" enctype="multipart/form-data" class="mt-1 py-3">
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
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="hidden" name="taskBy" class="form-control" placeholder="Enter Source Name" value="{{ auth()->user()->id }}">
                        @include('alerts.feedback', ['field' => 'taskBy'])
                      </div>
                    </div>
                    <div class="col-md-12" id="users-select">
                        <strong>Select Recipient</strong>
                       
                        <select name="users[]" id="users-select" class="form-control border-info rounded-0"  multiple required>
                            @foreach ($users as $user)
                                  @if ($user->name == auth()->user()->name)
                                      <option value="{{ $user->id }}"><?php if($user->name==auth()->user()->name){ echo strtoupper($user->name).'(me)'; }else{ echo strtoupper($user->name).'('.$user->designation.')'; }?></option>
                                  @else
                                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                                  @endif  
                                
                                
                            @endforeach
                        </select>
                        
                        @error('permissions')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
  
                    </div>
                    

                </div>           
                <div class="row">
                  <div class="col-md-11 pr-1">
                    @error('name')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    <div class="btn-file input-group hdtuto control-group lst increment rounded-0" >
                      <input type="file" name="name[]" class="myfrm form-control">
                      <div class="input-group-btn  rounded-0"> 
                        <button class="btn btn-success" type="button"><i class="fldemo fa fa-fw fa-plus"></i></button>
                      </div>
                    </div>

                    <div class="clone hide">
                      <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                        <input type="file" name="name[]" class="myfrm form-control">
                        <div class="input-group-btn"> 
                          <button class="btn btn-danger" type="button"><i class="fldemo fa fa-fw fa-x"></i></button>
                        </div>
                      </div>
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


<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

<script type="text/javascript">
    $(document).on('click','#remove',function(){
        $(this).closest('tr').remove();
    })
</script>


<script id="document-template" type="text/x-handlebars-template">
    <tr class="delete_add_more_item" id="delete_add_more_item">

        <td>
            <select name='user@{{ newcount }}'  class="form-control rounded-0" id='user@{{ newcount }}'>
                <?php
                foreach($users as $user){
                  if($user->name==auth()->user()->name)
                  {
                    ?>
                    <option hidden value="<?php echo $user->id; ?>"><?php if($user->name==auth()->user()->name){ echo strtoupper($user->name).'(me)'; }else{ echo strtoupper($user->name).'('.$user->designation.')'; }?></option>

                    <?php
                  }else{
                    ?>
                    <option value="<?php echo $user->id; ?>"><?php if($user->name==auth()->user()->name){ echo strtoupper($user->name).'(me)'; }else{ echo strtoupper($user->name).'('.$user->designation.')'; }?></option>
                    <?php
                  }
                }
                ?>
            </select>
        </td>
        <td>
         <button type="button" id="remove" class="btn btn-danger btn-round btn-sm removeaddmore">X</button>
        </td>
    </tr>
   </script>

  <script type="text/javascript">

   $(document).on('click','#addMore',function(){

       $('.table').show();
       var newcount = parseInt($('#rowCount').val()) + 1;
       var package_name = $("#package_name").val();
       var unitQty = $("#unitQty").val();
       var source = $("#document-template").html();
       var template = Handlebars.compile(source);

       var data = {
          package_name: package_name,
          unitQty: unitQty,
          newcount: newcount
       }

       var html = template(data);
       $("#addRow").append(html)
       $('#rowCount').val(newcount);
 //      total_ammount_price();
   });

    $(document).on('click','.removeaddmore',function(event){
      $(this).closest('.delete_add_more_item').remove();
 //     total_ammount_price();
    });

  </script>


