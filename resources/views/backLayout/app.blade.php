<!doctype html>
<html lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Propeller Admin Dashboard">
  <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard | UM</title>
  <meta name="description" content="Admin is a material design and bootstrap based responsive dashboard template created mainly for admin and backend applications." />

  <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo_2.png')}}">

  <!-- Google icon -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Bootstrap css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

  <!-- Propeller css -->
  <!-- build:[href] assets/css/ -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/propeller.min.css')}}">
  <!-- /build -->

  <!-- Propeller date time picker css-->
  <link rel="stylesheet" type="text/css" href="{{asset('components/datetimepicker/css/bootstrap-datetimepicker.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('components/datetimepicker/css/pmd-datetimepicker.css')}}" />

  <!-- Propeller theme css-->
  <link rel="stylesheet" type="text/css" href="{{asset('themes/css/propeller-theme.css')}}" />

  <!-- Propeller admin theme css-->
  <link rel="stylesheet" type="text/css" href="{{asset('themes/css/propeller-admin.css')}}">

  {{-- chartjs --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.js"></script>


  <!-- DataTables css-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">

  <!-- Propeller dataTables css-->
  <link rel="stylesheet" type="text/css" href="{{asset('components/data-table/css/pmd-datatable.css')}}">

  {{-- Sweet alert --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

</head>

<body>
  <!-- Header Starts -->
  <!--Start Nav bar -->
  <nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth">

    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <a href="javascript:void(0);" class="btn btn-sm pmd-btn-fab pmd-btn-flat pmd-ripple-effect pull-left margin-r8 pmd-sidebar-toggle"><i class="material-icons">menu</i></a>
        <a href="{{url('home')}}" class="navbar-brand">
        UNIVERSIDAD MAYA
		  </a>
      </div>
    </div>

  </nav>
  <!--End Nav bar -->
  <!-- Header Ends -->

  <!-- Sidebar Starts -->
  <div class="pmd-sidebar-overlay"></div>

  <!-- Left sidebar -->
  <aside class="pmd-sidebar sidebar-default pmd-sidebar-slide-push pmd-sidebar-left pmd-sidebar-open bg-fill-darkblue sidebar-with-icons" role="navigation">
    <ul class="nav pmd-sidebar-nav">

      <!-- User info -->
      <li class="dropdown pmd-dropdown pmd-user-info visible-xs visible-md visible-sm visible-lg">
        <a aria-expanded="false" data-toggle="dropdown" class="btn-user dropdown-toggle media" data-sidebar="true" aria-expandedhref="javascript:void(0);">
          <div class="media-left">
            <img src="{{asset('images/logo_um_blanco.png')}}" style="width:70px;" alt="New User">
          </div>
          <div class="media-body media-middle">Dashboard UM</div>
          <div class="media-right media-middle"><i class="dic-more-vert dic"></i></div>
        </a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">Salir</a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       {{ csrf_field() }}
                   </form>
          </li>
        </ul>
      </li>
      <!-- End user info -->
      @include('partials.sidebar')
    </ul>
  </aside>
  <!-- End Left sidebar -->
  <!-- Sidebar Ends -->

  <!--content area start-->
  <div id="content" class="pmd-content content-area dashboard">

    <div class="container-fluid">
      <div class="row" id="card-masonry">
        {{-- Content --}}
          @yield('content')
        {{-- End content --}}
      </div>
    </div>

  </div>
  <!--end content area-->

  <!-- Footer Starts -->
  <!--footer start-->
  <footer class="admin-footer">
    <div class="container-fluid">
      <ul class="list-unstyled list-inline">
        <li>
          <span class="pmd-card-subtitle-text">Universidad Maya &copy; <span class="auto-update-year"></span>. Todos los derechos reservados.</span>
          <h3 class="pmd-card-subtitle-text">Licensed under <a href="https://opensource.org/licenses/MIT" target="_blank">MIT license.</a></h3>
        </li>
        <li class="pull-right for-support">
          <a href="jncrlsmontejo@gmail.com">
            <div>
              <svg x="0px" y="0px" width="38px" height="38px" viewBox="0 0 38 38" enable-background="new 0 0 38 38">
<g><path fill="#A5A4A4" d="M25.621,21.085c-0.642-0.682-1.483-0.682-2.165,0c-0.521,0.521-1.003,1.002-1.524,1.523
		c-0.16,0.16-0.24,0.16-0.44,0.08c-0.321-0.2-0.683-0.32-1.003-0.521c-1.483-0.922-2.726-2.125-3.809-3.488
		c-0.521-0.681-1.002-1.402-1.363-2.205c-0.04-0.16-0.04-0.24,0.08-0.4c0.521-0.481,1.002-1.003,1.524-1.483
		c0.721-0.722,0.721-1.524,0-2.246c-0.441-0.44-0.842-0.842-1.203-1.202c-0.441-0.441-0.842-0.842-1.243-1.243
		c-0.642-0.642-1.483-0.642-2.165,0c-0.521,0.521-1.002,1.002-1.524,1.523c-0.481,0.481-0.722,1.043-0.802,1.685
		c-0.08,1.042,0.16,2.085,0.521,3.047c0.762,2.085,1.925,3.849,3.328,5.532c1.884,2.286,4.17,4.05,6.815,5.333
		c1.203,0.562,2.406,1.002,3.729,1.123c0.922,0.04,1.724-0.201,2.365-0.923c0.441-0.521,0.923-0.922,1.403-1.403
		c0.682-0.722,0.682-1.563,0-2.245C27.265,22.729,26.423,21.927,25.621,21.085z"/>
	<path fill="#A5A4A4" d="M32.437,5.568C28.869,2,24.098-0.005,19.005-0.005S9.182,2,5.573,5.568C2.005,9.177,0,13.908,0,19
		s1.965,9.823,5.573,13.432c3.568,3.568,8.34,5.573,13.432,5.573s9.823-1.965,13.431-5.573
		C39.854,25.014,39.854,12.985,32.437,5.568z M30.299,30.294c-3.003,3.045-7.021,4.695-11.293,4.695
		c-4.272,0-8.291-1.65-11.294-4.695C4.666,27.29,3.016,23.271,3.016,19c0-4.272,1.649-8.291,4.695-11.294
		c3.003-3.003,7.022-4.695,11.294-4.695c4.272,0,8.291,1.649,11.293,4.695C36.56,13.924,36.56,24.075,30.299,30.294z"/>
</g></svg>
            </div>
            <div>
              <span class="pmd-card-subtitle-text">Soporte</span>
              <h4 class="pmd-card-title-text">soporte@universidadmaya.edu.mx</h4>
            </div>
          </a>
        </li>
      </ul>
    </div>
  </footer>
  <!--footer end-->
  <!-- Footer Ends -->

  <!-- Scripts Starts -->
  <script src="{{asset('assets/js/jquery-1.12.2.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

  <!-- Datatable js -->
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

  <!-- Datatable Bootstrap -->
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

  <!-- Datatable responsive js-->
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js"></script>

  <!-- Datatable select js-->
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>

  <script src="{{asset('assets/js/propeller.min.js')}}"></script>
  <!--circle chart-->
  <script src="{{asset('themes/js/circles.min.js')}}"></script>

  <!--staked column chart for payment-->
  <script src="{{asset('themes/js/highcharts.js')}}"></script>
  <script src="{{asset('themes/js/highcharts-more.js')}}"></script>

  <!-- Javascript for Datepicker -->
  <script type="text/javascript" language="javascript" src="{{asset('components/datetimepicker/js/moment-with-locales.js')}}"></script>
  <script type="text/javascript" language="javascript" src="{{asset('components/datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
  <script>
    // Linked date and time picker
    // start date date and time picker
    $('#datepicker-default').datetimepicker();
    $(".auto-update-year").html(new Date().getFullYear());
  </script>
  {{-- Sweet alert --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  @include('sweet::alert')
  @yield('scripts')
</body>
</html>
