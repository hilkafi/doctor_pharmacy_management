<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSRF Token -->

    <title>Pharma Market Info</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/responsive.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/favicon.ico') }}" rel="icon" type="image/x-icon">
</head>
<body>  
  <div id="app">
    <nav class="navbar navbar-inverse navbar-expand-md navbar-light" style = "background-color:#090257;" >
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/home') }}">
        <h2 style="color:white;"><b>PMI</b></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon " style=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @guest

            @else
          <ul class="navbar-nav mr-auto">
            @if(count($regions) > 0)
              <li class="dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" style="color: white;">
                      Zone<span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu multi-level">
                      <li><a href="{{url('region')}}" class="nav-link">Region</a></li>
                      <?php foreach ($regions as $region): ?>
                          <li class="dropdown-submenu">
                              <a href="" class="nav-link dropdown-toggle region" data-toggle="dropdown" role="button" data-info = "{{ $region->id }}">
                                  {{ $region->name }} <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" id = "second-level" style="left: 100%;top: 0;">
                                <li><a href="{{url('region/')}}/{{$region->_key}}/details" class="nav-link">{{ $region->name.' Doctor ' }}</a></li>
                                <li><a href="{{url('region/')}}/{{$region->_key}}/view_pharmacy" class="nav-link">{{ $region->name.' Pharmacy' }}</a></li>
                                <li><a href="{{url('area')}}" class="nav-link">Area</a></li>
                                <?php foreach($region->areas as $area):?>
                                <li class="dropdown-submenu">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $area->name }}</a>
                                    <ul class="dropdown-menu">
                                      <li><a href="{{url('area/')}}/{{$area->_key}}/details" class="nav-link">{{ $area->name.' Doctor ' }}</a></li>
                                      <li><a href="{{url('area/')}}/{{$area->_key}}/view_pharmacy" class="nav-link">{{ $area->name.' Pharmacy' }}</a></li>
                                      <li><a href="{{url('teritory')}}" class="nav-link">Teritory</a></li>
                                        <?php foreach($area->teritories as $teritory):?>
                                        <li class="dropdown-submenu">
                                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ $teritory->name }}</a>
                                            <ul class="dropdown-menu">
                                              <li><a href="{{url('teritory/')}}/{{$teritory->_key}}/details" class="nav-link">{{ $teritory->name.' Doctor ' }}</a></li>
                                              <li><a href="{{url('teritory/')}}/{{$teritory->_key}}/view_pharmacy" class="nav-link">{{ $teritory->name.' Pharmacy' }}</a></li>
                                              <li><a href="{{url('market')}}" class="nav-link">Market</a></li>
                                              <?php foreach($teritory->markets as $market):?>
                                                <li>
                                                  <a href="{{url('market/')}}/{{$market->_key}}/details" class="nav-link">{{ $market->name.' Doctor ' }}</a>
                                                </li>
                                                <li>
                                                  <a href="{{url('market/')}}/{{$market->_key}}/view_pharmacy" class="nav-link">{{ $market->name.' Pharmacy ' }}</a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <?php endforeach; ?>
                              </ul>
                          </li>
                      <?php endforeach; ?>
                  </ul>
              </li>
              @endif
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Sections<span class="caret"></span></a>
                  <div id = "" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('/region')}}">Region</a>
                      <a class="dropdown-item" href="{{url('/area')}}">Area</a>
                      <a class="dropdown-item" href="{{url('/teritory')}}">Teritory</a>
                      <a class="dropdown-item" href="{{url('/market')}}">Market</a>
                  </div>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Institutes<span class="caret"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{url('/hospital')}}" style="color: black;">Institues</a>
                  <a class="dropdown-item" href="{{url('/hospitals')}}">Hospital</a>
                  <a class="dropdown-item" href="{{url('/clinics')}}">Clinic</a>
                  <a class="dropdown-item" href="{{url('/others')}}">Others</a>
                </div>
              </li>
              <li class="nav-item">
                <a  class="nav-link" href="{{url('/consulting_center')}}" style="color: white;">C. Center</a>
              </li>

            @if(Auth::user()->user_role == 0 || Auth::user()->user_role == 1 )
              <li class="nav-item">
                <a class="nav-link" href="{{url('/doctor')}}" style="color: white;">Doctors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/dispensary')}}" style="color: white;">Pharmacy</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/employee/')}}" style="color: white;">Employee</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/approval')}}" style="color: white;">Approval</a>
              </li>
              @if(Auth::user()->user_role == 0 || Auth::user()->user_role == 1)
              <li class="nav-item">
                <a class="nav-link" href="{{url('/user')}}" style="color: white;">User List</a>
              </li>
              @endif
            @endif

            @if(Auth::user()->user_role == 2)
              <li class="nav-item">
                <a class="nav-link" href="{{url('/approval/newly_added_doctor')}}" style="color: white;">New Doc</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/approval/newly_added_pharmacy')}}" style="color: white;">New Pharma</a>
              </li>
            @endif
          </ul>
          @endguest
            <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
            @guest
            <li class="nav-item">
              <a style="color:white;" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @else
            @if(!empty($number))
            <li class="nav-item" style="margin-right: 10px">
              <a href="{{url('personal-info/notification')}}">
              <div class="icon-wrapper" >
                 <i class="fa fa-bell"></i>
                 <span class="badge" id="notification_count"></span>
                </div>
              </a>
            </li>
            @endif
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span></a>
              <div id="right-menu" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{url('/home')}}">Dashboard</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
              </div>
            </li>
                @endguest
          </ul>
        </div>
      </div>
    </nav>