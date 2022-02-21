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
<div class="panel-header panel-header-lg">
    <canvas id="bigDashboardChart"></canvas>
  </div>
<div class="content">

    <div class="container">

    <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
                <h5>{{__(" Buy Package / Activation Codes")}}</h5>
              </div>
            <div class="card-body">
            <form action="{{ route('tasks.add') }}" method="POST" class="mt-1 py-3">
                @csrf

                <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label for="papID">{{__(" Program ")}}</label>
                        <select name='papID'  class="form-control" id='papID'>
                            @php
                            foreach($programs as $program){
                                echo '<option value="' . $program->id.'" > '. strtoupper($program->shortName) .' ( ' .$program->id . '  ) [ '. $program->programDescription .' ]  </option>';
                            }
                            @endphp
                        </select>
                      </div>
                    </div>
                </div>
<!--
                <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label for="buySourceName">{{__(" Source Name")}}</label>
                        <input type="text" name="buySourceName" class="form-control" placeholder="Enter Source Name" value="{{ old('buySourceName') }}" required>
                        @include('alerts.feedback', ['field' => 'buySourceName'])
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label for="buyContactNumber">{{__(" Source Contact Number")}}</label>
                        <input type="text" name="buyContactNumber" class="form-control" placeholder="Enter Source Contact Number" value="{{ old('buyContactNumber') }}" required>
                        @include('alerts.feedback', ['field' => 'buyContactNumber'])
                      </div>
                    </div>
                </div>
            -->
                <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label for="buyAmount">{{__(" Amount Sent ")}}</label>
                        <input type="text" name="buyAmount" class="form-control" placeholder="Enter Amount Sent " value="{{ old('buyAmount') }}">
                        @include('alerts.feedback', ['field' => 'buyAmount'])
                      </div>
                      <button type="button" id="addMore" class="btn btn-success btn-sm btn-round"> Add Package </button>
                      <input type="hidden" name="rowCount" id="rowCount" class="form-control" value="0">

                    </div>
                </div>

                @foreach($packages as $package)
                @endforeach
                <div class="form-group">

                <table class="table table-sm table-responsive" style="display: none;">
                    <thead>
                        <tr  class=" text-center">
                            <td>Package Name</td>
                            <td>Quantity</td>
                            <td>Action</td>
                        </tr>
                    </thead>

                    <tbody id="addRow" class="addRow">

                    </tbody>
                </table>

                </div>
                <button type="submit" class="btn btn-primary btn-round"> Buy </button>
                @if (isset($success))
                        <script>
                            swal("Thank you","Buy request was Successful","success");
                        </script>
                        {{ $success }}
                @endif


                @if (isset($error))
                    {{ $error }}
                          <script>
                            Swal.fire({
                              title: 'Press CTRL + P to Print !!!',
                              showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                              },
                              hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                              }
                            })
                          </script>
                @endif
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
            <select name='user@{{ newcount }}'  class="form-control" id='user@{{ newcount }}'>
                @php
                foreach($users as $user){
                    echo '<option value="' . $user->id . '" > '. strtoupper($user->name) . ' [ '. $user->packageDescription .' ]  </option>';
                }
                @endphp
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
/*
    function total_ammount_price() {
      var sum = 0;
      $('.unitQty').each(function(){
        var value = $(this).val();
        if(value.length != 0)
        {
          sum += parseFloat(value);
        }
      });
      $('#estimated_ammount').val(sum);
    }
*/
  </script>


