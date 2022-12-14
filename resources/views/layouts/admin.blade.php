<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="apple-touch-icon" href="{{asset('frontend/img/favi.ico')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/img/favi.ico')}}">
    
    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.admin-includes.sidenav')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.admin-includes.nav')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('admin-contents')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.admin-includes.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('admin/js/demo/chart-pie-demo.js')}}"></script>
    <script>
        // Script For Close alert
 
       var alert_del = document.querySelectorAll('.close');
       alert_del.forEach((x) =>
         x.addEventListener('click', function () {
           x.parentElement.classList.add('hidden');
         })
       );
     </script>
     <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
     </script>


<script type="text/javascript">
    $('#from_country').on('change', function () {
        get_port_by_from();
    });

    function get_port_by_from() {
        var from_country = $('#from_country').val();
        $.post('{{ route('getCntryPorts') }}', {
                _token: '{{ csrf_token() }}',
                country_id: from_country
            },
            function (data) {
                $('#from_port').html(null);
                $('#from_port').append($('<option value="">Select A Port</option>', {}));
                for (var i = 0; i < data.length; i++) {
                    $('#from_port').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            });
    }
  </script>

  <script type="text/javascript">
    $('#destination_country').on('change', function () {
        get_port_by_destination();
    });

    function get_port_by_destination() {
        var destination_country = $('#destination_country').val();
        $.post('{{ route('getCntryPorts') }}', {
                _token: '{{ csrf_token() }}',
                country_id: destination_country
            },
            function (data) {
                $('#destination_port').html(null);
                $('#destination_port').append($('<option value="">Select A Port</option>', {}));
                for (var i = 0; i < data.length; i++) {
                    $('#destination_port').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            });
    }
  </script>


<script type="text/javascript">
    $('#current_country').on('change', function () {
        get_port_by_destination();
    });

    function get_port_by_destination() {
        var current_country = $('#current_country').val();
        $.post('{{ route('getCountryPorts') }}', {
                _token: '{{ csrf_token() }}',
                country_id: current_country
            },
            function (data) {
                $('#current_port').html(null);
                $('#current_port').append($('<option value="">Select A Port</option>', {}));
                for (var i = 0; i < data.length; i++) {
                    $('#current_port').append($('<option>', {
                        value: data[i].id,
                        text: data[i].name
                    }));
                }
            });
    }
</script>
</body>

</html>