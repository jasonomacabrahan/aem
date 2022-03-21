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
  
</head>

<body class="{{ $class ?? '' }}">
  <div class="wrapper">
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
  @stack('js')

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
    $(document).ready(function() {
var table = $('#list').DataTable( {
    lengthChange: true,
    buttons: [
                {
                  extend: "copy",
                  className: "btn-sm btn-info"
                },
                {
                  extend: "csv",
                  className: "btn-sm btn-success"
                },
                {
                  extend: "excel",
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
                  
              ]

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

</body>

</html>
