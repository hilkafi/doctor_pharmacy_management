<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
    <style>
    body {
  overflow-x: hidden;
  font-family: 'Roboto', sans-serif;
  font-size: 16px;
}

/* Toggle Styles */

#viewport {
  padding-left: 250px;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#content {
  width: 100%;
  position: relative;
  margin-right: 0;
}

/* Sidebar Styles */

#sidebar {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 250px;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
  background: #37474F;
  -webkit-transition: all 0.5s ease;
  -moz-transition: all 0.5s ease;
  -o-transition: all 0.5s ease;
  transition: all 0.5s ease;
}

#sidebar header {
  background-color: #263238;
  font-size: 20px;
  line-height: 52px;
  text-align: center;
}

#sidebar header a {
  color: #fff;
  display: block;
  text-decoration: none;
}

#sidebar header a:hover {
  color: #fff;
}

#sidebar .nav{
  
}

#sidebar .nav a{
  background: none;
  border-bottom: 1px solid #455A64;
  color: #CFD8DC;
  font-size: 14px;
  padding: 16px 24px;
  color:white;
}

#sidebar .nav a:hover{
  background: none;
  color: #ECEFF1;
}

#sidebar .nav a i{
  margin-right: 16px;
}

.sidenav {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top:81px;
  left: 0;
 
  background-color:#007ACC;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 22px;
  color:White;
  display:block;
}

.test{
  width:250px;
 
      padding: 10px;
}

 .test:hover {
  color: #f1f1f1;
  -moz-box-shadow: 0 0 10px #ccc;
      -webkit-box-shadow: 0 0 10px #ccc;
      box-shadow: 0 0 10px #ccc;
}

.dropdown-menu a {
  border-bottom: 1px solid #ccc;
}
.dropdown-menu a:last-child {
  border-bottom: none;
}
a#navbarDropdown{
  color: white;
}
.tbl-thin{

}
.table tr {
  padding: 5px;
}
th, td{
  padding: 2px;
}

.icon-wrapper{
    position:relative;
    float:left;
    margin-top: 5px;
}

*.icon-blue {color: #0088cc}
*.icon-grey {color: grey}
.icon-wrapper i {   
    width:10px;
    height: 10px;
    text-align:center;
    vertical-align:middle;
    color: white;
}
.badge{
    background: red;
    border-radius: 5px;
    width: auto;
    height: auto;
    margin: 0;
    position:absolute;
    top:-6px;
    right:0px;
    font-size: 12px;
    padding:5px;
    color: #fff;
}

.drpdwn {

  position: relative;
  display: inline-block;
}

.drpdwn-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.drpdwn-content li {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

ul.mul-dropdown li {
  padding: 5px;
}

.dropdown-submenu {
  position: relative;
}

.dropdown-submenu a{
  color: black;
}

.dropdown-submenu a:hover{
  color: black;
}



.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}



    
    </style>
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-inverse navbar-expand-md navbar-light fixed-top" style = "background-color:#090257;" >
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/home') }}">
        <h2 style="color:white;"><b>Pharmasia</b></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon " style=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @guest

            @else
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
                <span class="caret"></span></button>
                <ul class="dropdown-menu mul-dropdown">
                    @foreach($regions as $r)
                    <li class="dropdown-submenu regn">
                      <a class="test" tabindex="-1" href="#" data-info="{{ $r->id }}">{{ $r->name }}</a>
                      <ul class="dropdown-menu" id="second-level">
                        <li class="dropdown-submenu">
                          <a class="test" data-info="" href="#">Level<span class="caret"></span></a>
                          <ul class="dropdown-menu" id="third-level">

                            <li class="dropdown-submenu">
                              <a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
                              <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                                <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                              </ul>
                            </li>
                            
                          </ul>
                        </li>
                      </ul>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Zone<span class="caret"></span></a>

                  <div id = "" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('/region')}}">Region</a>
                    <ul class="navbar-nav mr-auto">
                      @foreach($regions as $r)
                      <li class="dropdown-item "  id ="clk-region" value="{{$r->id}}">{{$r->name}}
                      <div>
                        <ul id ="clk-area" class=""> 
                        </ul>
                        <ul id ="clk-teritory">
                        </ul>
                        <ul id ="clk-market">
                        </ul>
                      </div>
                      </li>
                     @endforeach
                   </ul>
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
            <li class="nav-item" style="margin-right: 10px">
              <a href="{{url('personal-info/notification')}}">
              <div class="icon-wrapper" >
                 <i class="fa fa-bell"></i>
                 <span class="badge" id="notification_count"></span>
                </div>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span></a>
              <div id="right-menu" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{url('/home')}}">Dashboard</a>
                <a class="dropdown-item" href="{{url('/user')}}/{{Auth::user()->_key}}">Profile</a>
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

    <div class="drpdwn">
      <ul id ="clk-area" class="drpdwn-content">                   
     </ul>                 
    </div>

    <main class="py-5 my-5">
      @yield('content')
    </main>

  </div>
</body>
  <script>
    $( document ).ready(function() {
      $( window ).on( "load", function() {
          var _url = "{{URL::to('/personalinfo/count_notification')}}";
          $.ajax({
            url: _url,
            method:"GET",
            success: function(result)
            {
            $('#notification_count').html(result);
            },
            error: function(xhr, error){
                alert('There is something wrong. Try again');
            }
      });

        $(document).on('click', '#notification_count', function(){
          $('#notification_count').css('display', 'none');
        });
      });

     $(document).on('click', '.regn', function(e){
      console.log('hmm its changing');
      var region_id = $(this).attr('data-info');
      var _url = "{{URL::to('region/list_sub_area')}}";
      $.ajax({
          url: _url,
          method:"POST",
          data:{region_id:region_id, _token: "{{ csrf_token() }}" },
          success: function(result)
          {
          $('#second-level').html(result);
          }

      });
    });

     $(document).on('click','.clk-area',  function(){
      var area_id = $(this).attr('data-info');
      //alert(area_id);
      var _url = "{{URL::to('region/list_sub_teritory')}}";
      $.ajax({

        url:_url,
        method : "POST",
        data:{area_id:area_id,_token:"{{ csrf_token() }}"},
        success: function(result)
        {
          $('#clk-teritory').html(result);
        }


      });

     });

      $(document).on('click','.clk-teritory',  function(){
      var teritory_id = $(this).attr('data-info');
      //alert(area_id);
      var _url = "{{URL::to('region/list_sub_market')}}";
      $.ajax({

        url:_url,
        method : "POST",
        data:{teritory_id:teritory_id,_token:"{{ csrf_token() }}"},
        success: function(result)
        {
          $('#clk-market').html(result);
        }


      });

     });

  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });


       });







 
  </script>
</html>
