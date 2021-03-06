<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets') }}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('assets') }}/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Extra details for Live View on GitHub Pages -->
  <title>
    {{ $namePage }}DICT XI Activity Monitoring System
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
  <!-- CSS Files -->
  <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{ asset('assets') }}/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.bootstrap4.min.css"/>
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets') }}/demo/demo.css" rel="stylesheet" />
  <script type="text/javascript" src="{{ asset('sweet') }}/sweetalert-dev.js"></script>
  <link rel="stylesheet" type="text/css" href="{{ asset('sweet') }}/sweetalert.css"/>
  <script src="https://kit.fontawesome.com/c9033f3c51.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{ asset('assets') }}/chart/js/fusioncharts.js"></script>
	<script type="text/javascript" src="{{ asset('assets') }}/chart/js/themes/fusioncharts.theme.fint.js"></script>
  
  @stack('header')

<livewire:styles />
<style>
  #show_image_popup{
  position: absolute; /*  so that not take place   */
  top: 50%;
  left: 50%;
  z-index: 1000; /*  adobe all elements   */
  transform: translate(-50%, -50%); /*  make center   */

  display: none; /*  to hide first time   */
}
#show_image_popup img{
  max-width: 90%;
  height: auto;
}
</style>
</head>

<body class="{{ $class ?? '' }}">
  <div class="">
    @auth
      @include('layouts.page_template.auth')
    @endauth
    @guest
      @include('layouts.page_template.guest')
    @endguest
  </div>
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   --}}
  <!--   Core JS Files   -->
  {{-- <script src="{{ asset('assets') }}/js/core/jquery.min.js"></script> --}}
  {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
  <livewire:scripts />
  <script src="{{ asset('admin_assets/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets') }}/js/core/popper.min.js"></script>
  <script src="{{ asset('assets') }}/js/core/bootstrap.min.js"></script>
  <script src="{{ asset('assets/js/todo.js') }}" defer></script>
  <script src="{{ asset('assets') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets') }}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets') }}/js/now-ui-dashboard.min.js?v=1.3.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets') }}/demo/demo.js"></script>
  
  
  <!--for datatables-->
  <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.css" rel="stylesheet">
  <!--end of datatable-->
  
  
  <script type="text/javascript">
    $(window).on('load', function() {
        $('#focalModal').modal('show');
    });
    $("#selectsupervisor").click(function(){
        var officer = $('#approvingofficer').val()
        var designation = $('#designation').val()
        $("#officer").text(officer);
        $("#newdesignation").text(designation);
        $('#focalModal').modal('hide');
    });
    

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
    
    $('#guestform').hide();
    $('#registeredguestform').hide();
    $('#dictemployeeform').hide();
    $('#guest').click(function(){
        $('#guestform').show();
        $('#dictemployeeform').hide();
        $('#registeredguestform').hide();
        $('#guest').attr("disabled", true);
        $('#registeredguest').attr("disabled", false);
        $('#employee').attr("disabled", false);
        window.history.pushState({}, document.title, "/guest/" + "<?php if(empty($ativityid)){ echo 0 ;}else{ echo $ativityid; } ?>/<?php if(empty($id)){ echo 0; }else{ echo $id; } ?>");
      });
  
      $('#registeredguest').click(function(){
        $('#guestform').hide();
        $('#dictemployeeform').hide();
        $('#registeredguestform').show();
        $('#guest').attr("disabled", false);
        $('#registeredguest').attr("disabled", true);
        $('#employee').attr("disabled", false);
        window.history.pushState({}, document.title, "/newattendance/" + "<?php if(empty($ativityid)){ echo 0 ;}else{ echo $ativityid; } ?>/<?php if(empty($id)){ echo 0; }else{ echo $id; } ?>");
      });
      
      $('#employee').click(function(){
        $('#guestform').hide();
        $('#dictemployeeform').show();
        $('#registeredguestform').hide();
        $('#guest').attr("disabled", false);
        $('#registeredguest').attr("disabled", false);
        $('#employee').attr("disabled", true);
        window.history.pushState({}, document.title, "/newattendance/" + "<?php if(empty($ativityid)){ echo 0 ;}else{ echo $ativityid; } ?>/<?php if(empty($id)){ echo 0; }else{ echo $id; } ?>");
      });
    
    
    $('#dictemployee').hide();
    function copy(element_id){
      var aux = document.createElement("div");
      aux.setAttribute("contentEditable", true);
      aux.innerHTML = document.getElementById(element_id).innerHTML;
      aux.setAttribute("onfocus", "document.execCommand('selectAll',false,null)"); 
      document.body.appendChild(aux);
      aux.focus();
      document.execCommand("copy");
      document.body.removeChild(aux);
    }
    $('#cboard').click(function(){
        $('#cboard').text('COPIED TO CLIPBOARD');
        $('#cboard').removeClass("btn btn-info").addClass("btn btn-success");
        // swal('Copied to clipboard','','info');
    });

    $('#myTab a').click(function(e) {
      e.preventDefault();
      $(this).tab('show');
    });

    // store the currently selected tab in the hash value
    $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
      var id = $(e.target).attr("href").substr(1);
      window.location.hash = id;
    });

    // on load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('#myTab a[href="' + hash + '"]').tab('show');

      Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0,10);
    });
    document.getElementById('registrationDate').value = new Date().toDateInputValue();
   
    

    
  </script>

<script>
  var events_select = new SlimSelect({
      select: '#events-select select',
      //showSearch: false,
      placeholder: 'Select Event',
      deselectLabel: '<span>&times;</span>',
      hideSelectedOption: true,
  })

  $('#events-select #events-select-all').click(function(){
      var options = [];
      $('#events-select select option').each(function(){
          options.push($(this).attr('value'));
      });

      user_select.set(options);
  })

  $('#events-select #events-deselect-all').click(function(){
    events_select.set([]);
  })
</script>


<script>

    var permission_select = new SlimSelect({
        select: '#permissions-select select',
        //showSearch: false,
        placeholder: 'Select Permissions',
        deselectLabel: '<span>&times;</span>',
        hideSelectedOption: true,
    })

    $('#permissions-select #permission-select-all').click(function(){
        var options = [];
        $('#permissions-select select option').each(function(){
            options.push($(this).attr('value'));
        });

        permission_select.set(options);
    })

    $('#permissions-select #permission-deselect-all').click(function(){
        permission_select.set([]);
    })

    new SlimSelect({
      select: '#focalPerson'
    })

</script>

<script>

  var user_select = new SlimSelect({
      select: '#users-select select',
      //showSearch: false,
      placeholder: 'Select Recipient',
      deselectLabel: '<span>&times;</span>',
      hideSelectedOption: true,
  })

  $('#users-select #users-select-all').click(function(){
      var options = [];
      $('#users-select select option').each(function(){
          options.push($(this).attr('value'));
      });

      user_select.set(options);
  })

  $('#users-select #users-deselect-all').click(function(){
    user_select.set([]);
  })

 

</script>

<script>

  var program_select = new SlimSelect({
      select: '#program-select select',
      //showSearch: false,
      placeholder: 'Select Program',
      deselectLabel: '<span>&times;</span>',
      hideSelectedOption: true,
  })

  $('#program-select #program-select-all').click(function(){
      var options = [];
      $('#program-select select option').each(function(){
          options.push($(this).attr('value'));
      });

      user_select.set(options);
  })

  $('#program-select #program-deselect-all').click(function(){
    user_select.set([]);
  })

 

</script>


<script>
  $(document).ready(function() {
  
  var table = $('#list1').DataTable( {
    
  lengthChange: true,
  buttons: [
              {
                extend: "copy",
                className: "btn-sm btn-info"
              },
              {
                extend: "pdfHtml5",
                className: "btn-sm btn-danger",
                orientation: 'landscape'
              },
              {
                extend: "print",
                className: "btn-sm btn-info"
              },
                
            ],
    "order": [[ 4, "desc" ]]

} );

table.buttons().container()
  .appendTo( '#list_wrapper .col-md-6:eq(0)' );

  $('#receiptTable').DataTable( {
  dom: 'Bfrtip',
  buttons: [
      'print'
  ]
} );
} );
</script>
<script>
  $(document).ready(function() {
  
  var table = $('#list2').DataTable( {
    
  lengthChange: true,
  buttons: [
              {
                extend: "copy",
                className: "btn-sm btn-info"
              },
              {
                extend: "pdfHtml5",
                className: "btn-sm btn-danger",
                orientation: 'landscape'
              },
              {
                extend: "print",
                className: "btn-sm btn-info"
              },
                
            ],
    "order": [[ 4, "desc" ]]

} );

table.buttons().container()
  .appendTo( '#list_wrapper .col-md-6:eq(0)' );

  $('#receiptTable').DataTable( {
  dom: 'Bfrtip',
  buttons: [
      'print'
  ]
} );
} );
</script>

  <script>
    $(document).ready(function() {
    
    var table = $('#list').DataTable( {
      
    lengthChange: true,
    buttons: [
                {
                  extend: "copy",
                  className: "btn-sm btn-info"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm btn-danger",
                  orientation: 'landscape'
                },
                {
                  extend: "print",
                  className: "btn-sm btn-info"
                },
                  
              ],
      "order": [[ 4, "desc" ]]

} );

table.buttons().container()
    .appendTo( '#list_wrapper .col-md-6:eq(0)' );

    $('#receiptTable').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'print'
    ]
} );
} );
</script>

<script>
  $(document).ready(function() {
  var table = $('.listexpenses, .listactivities').DataTable( {
      lengthChange: true,
      buttons: [
                  {
                    extend: "copy",
                    className: "btn-sm btn-info"
                  },
                  {
                    extend: "pdfHtml5",
                    className: "btn-sm btn-danger",
                    orientation: 'landscape'
                  },
                  {
                    extend: "print",
                    className: "btn-sm btn-info"
                  },
                    
                ],
        "order": [[ 4, "desc" ]]
  });

table.buttons().container()
  .appendTo( '#list_wrapper .col-md-6:eq(0)' );

  $('#receiptTable').DataTable( {
  dom: 'Bfrtip',
  buttons: [
      'print'
  ]
} );
} );
</script>


<script language="javascript">
    function printdiv(printpage) {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr + newstr + footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(".btn-success").click(function(){ 
        var lsthmtl = $(".clone").html();
        $(".increment").after(lsthmtl);
    });
    $("body").on("click",".btn-danger",function(){ 
        $(this).parents(".hdtuto").remove();
    });
  });
</script>

</body>

</html>
