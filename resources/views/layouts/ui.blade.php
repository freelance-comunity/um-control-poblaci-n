<!DOCTYPE html>
<html>

<head>
  <title>CICAP | UM</title>

  <meta charset="UTF-8">
  <meta name="description" content="Clean and responsive administration panel">
  <meta name="keywords" content="Admin,Panel,HTML,CSS,XML,JavaScript">
  <meta name="author" content="Juan Carlos Montejo">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="{{asset('ui/css/uikit.min.css')}}" />
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('ui/css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('ui/css/notyf.min.css')}}" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  <script src="{{asset('ui/js/uikit.min.js')}}"></script>
  <script src="{{asset('ui/js/uikit-icons.min.js')}}"></script>
  {{-- Sweet alert --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
  {!! Charts::styles() !!}
  {{-- Datatables --}}
  {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> --}}
  <link rel="stylesheet" href="{{asset('datatablesv2/jquery.dataTables.min.css')}}">
</head>

<body>
  <div uk-sticky class="uk-navbar-container tm-navbar-container uk-active">
    <div class="uk-container uk-container-expand">
      <nav uk-navbar>
        <div class="uk-navbar-left">
          <a id="sidebar_toggle" class="uk-navbar-toggle" uk-navbar-toggle-icon></a>
          <a href="{{url('/home')}}" class="uk-navbar-item uk-logo">
                            CICAP | UM
                        </a>
        </div>
        <div class="uk-navbar-right uk-light">
          <ul class="uk-navbar-nav">
            <li class="uk-active">
              <a href="#">{{Auth::user()->name}} &nbsp;<span class="ion-ios-arrow-down"></span></a>
              <div uk-dropdown="pos: bottom-right; mode: click; offset: -17;">
                <ul class="uk-nav uk-navbar-dropdown-nav">
                  <li class="uk-nav-header">Opciones</li>
                  <li><a href="{{url('profile')}}">Editar Perfil</a></li>
                  <li class="uk-nav-header">Acciones</li>
                  <li><a href="#">Bloquear</a></li>
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">Salir</a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                               {{ csrf_field() }}
                           </form>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <div id="sidebar" class="tm-sidebar-left uk-background-default">
    <center>
      <div class="user">
        <img id="avatar" width="100" class="uk-border-circle" src="{{asset('uploads/avatars')}}/{{Auth::user()->avatar}}" />
        <div class="uk-margin-top"></div>
        <div id="name" class="uk-text-truncate">{{Auth::user()->name}}</div>
        <div id="email" class="uk-text-truncate">{{Auth::user()->email}}</div>
        <span id="status" data-enabled="true" data-online-text="En linea" data-away-text="Sin actividad" data-interval="10000" class="uk-margin-top uk-label uk-label-success"></span>
      </div>
      <br />
    </center>
    <ul class="uk-nav uk-nav-default">
      @include('partials.sidebar-ui')
    </ul>
  </div>
  <div class="content-padder content-background">
    <div class="uk-section-small uk-section-default header">
      <div class="uk-container uk-container-large">
        <h1><span class="ion-speedometer"></span> @yield('title-section')</h1>
          @yield('welcome')
        <ul class="uk-breadcrumb">
          <li><a href="{{url('/home')}}">Inicio</a></li>
          <li><span href="">@yield('title')</span></li>
        </ul>
      </div>
    </div>
    <div class="uk-section-small">
      @yield('content')
    </div>
  </div>
  <!-- Load More Javascript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js" integrity="sha256-GcknncGKzlKm69d+sp+k3A2NyQE+jnu43aBl6rrDN2I=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.12/jquery.transit.min.js" integrity="sha256-rqEXy4JTnKZom8mLVQpvni3QHbynfjPmPxQVsPZgmJY=" crossorigin="anonymous"></script>
  <script src="{{asset('ui/js/notyf.min.js')}}"></script>
  <!-- Required Overall Script -->
  <script src="{{asset('ui/js/script.js')}}"></script>
  <!-- Status Updater -->
  {{-- <script src="{{'ui/js/status.js'}}"></script> --}}
  <!-- Sample Charts -->
  <script src="{{asset('ui/js/charts.js')}}"></script>
  <!-- Sample Notifications -->
  {{-- <script src="{{asset('ui/js/notification.js')}}"></script> --}}
  {{-- Sweet alert --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  @include('sweet::alert')
  {{-- <script src="//code.jquery.com/jquery-1.12.4.js"></script> --}}
  {{-- <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> --}}
  <script src="{{asset('datatablesv2/jquery.dataTables.min.js')}}"></script>
  @yield('scripts')
</body>
</html>
