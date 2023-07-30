<!DOCTYPE html>
<html lang="en">
  <head>
    @vite('resources/css/app.css')

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('titulo')</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->

    <link rel="stylesheet" href="{{asset('css/nucleo-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/nucleo-svg.css')}}">
    <link rel="stylesheet" href="{{asset('css/argon-dashboard-tailwind.css')}}">
    <!-- Main Styling -->
  </head>

  <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    @yield('contenido')
    @include('sweetalert::alert')

  </body>
  <!-- plugin for scrollbar  -->
  <script src="{{asset('js/argon-dashboard-tailwind.js')}}"></script>
  <script src="{{asset('js/argon-dashboard-tailwind.min.js')}}"></script>
  <script src="{{asset('js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('js/plugins/chartjs.min.js')}}"></script>

  <!-- main script file  -->
</html>