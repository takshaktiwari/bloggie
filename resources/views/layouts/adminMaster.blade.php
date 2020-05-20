<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin | BandFactory</title>
    
    <!-- vendor css -->
    <link href="{{ url('assets/admin') }}/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ url('assets/admin') }}/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
    <link href="{{ url('assets/admin') }}/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <link href="{{ url('assets/admin') }}/lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ url('assets/admin') }}/css/bracket.css">
    <link rel="stylesheet" href="{{ url('assets/admin') }}/css/bootstrap-utilities.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet" SameSite=Secure>
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    
    @section('styles')
    @show

  </head>

  <body>

    @include('admin/includes/sidebar')
    @include('admin/includes/header')
    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
    @section('content')
    @show


    <footer class="br-footer">
        <div class="footer-left">
            <div class="mg-b-2">Copyright &copy; {{ date('Y') }}. {{ config('app.name', 'Laravel') }}. All Rights Reserved.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
        </div>
    </footer>
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

@section('scripts')
    <script src="{{ url('/assets/admin/') }}/lib/jquery/jquery.js"></script>
    <script src="{{ url('/assets/admin/') }}/lib/popper.js/popper.js"></script>
    <script src="{{ url('/assets/admin/') }}/lib/bootstrap/bootstrap.js"></script>
    <script src="{{ url('/assets/admin/') }}/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{ url('/assets/admin/') }}/lib/moment/moment.js"></script>
    <script src="{{ url('/assets/admin/') }}/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{ url('/assets/admin/') }}/lib/jquery-switchbutton/jquery.switchButton.js"></script>
    <script src="{{ url('/assets/admin/') }}/lib/peity/jquery.peity.js"></script>
    <script src="{{ url('/assets/admin/') }}/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{ url('/assets/admin/') }}/lib/d3/d3.js"></script>
    <script src="{{ url('/assets/admin/') }}/lib/rickshaw/rickshaw.min.js"></script>


    <script src="{{ url('/assets/admin/') }}/lib/select2/js/select2.min.js"></script>


    <script src="{{ url('/assets/admin/') }}/js/bracket.js"></script>
    <script src="{{ url('/assets/admin/') }}/js/ResizeSensor.js"></script>
    <script src="{{ url('/assets/admin/') }}/js/dashboard.js"></script>
@show


    <script>
        $(function(){
            'use strict'

            // FOR DEMO ONLY
            // menu collapsed by default during first page load or refresh with screen
            // having a size between 992px and 1299px. This is intended on this page only
            // for better viewing of widgets demo.
            $(window).resize(function(){
                minimizeMenu();
            });

            minimizeMenu();

            function minimizeMenu() {
                if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                    // show only the icons and hide left menu label by default
                    $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                    $('body').addClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideUp();
                } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                    $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                    $('body').removeClass('collapsed-menu');
                    $('.show-sub + .br-menu-sub').slideDown();
                }
            }
        });
    </script>



</body>
</html>