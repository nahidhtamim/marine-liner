<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="apple-touch-icon" href="{{asset('frontend/assets/images/logo.ico')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/images/logo.ico')}}">

    <title>Shipping Company | Marine Liner</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css"
    />
    @vite('resources/css/app.css')
    <link href="{{asset('frontend/assets/styles/output.css')}}" rel="stylesheet" />
  </head>
<body>

    @include('layouts.front-includes.navbar')

    <main class="pt-16">
        @yield('content')

        @include('layouts.front-includes.footer')
    </main>



    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('frontend/assets/js/jquery.easing.min.js')}}"></script>

    <!-- Iconic Plugin JavaScript-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <script>
       // Script For Close alert

      var alert_del = document.querySelectorAll('.alert-del');
      alert_del.forEach((x) =>
        x.addEventListener('click', function () {
          x.parentElement.classList.add('hidden');
        })
      );
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


<script>
  $(".btn-refresh").click(function(){
    $.ajax({
      type: 'GET',
      url: '/refresh_captcha',
      success: function(data){
        $(".captcha span").html(data.captcha);
      }
    })
  })
</script>

</body>
</html>
