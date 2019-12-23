<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pharmasia</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/favicon.ico') }}" rel="icon" type="image/x-icon">
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


/*Multilevel Dropdown*/
.dropdown-submenu {
    position: relative;
}
.dropdown-submenu:hover>.dropdown-menu {
    display: block;
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
            @if(Auth::user()->user_role == 0)
            @if(count($regions) > 0)
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                      Zone<span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu multi-level">
                      <?php foreach ($regions as $region): ?>
                          <li class="dropdown-submenu">
                              <a href="#" class="dropdown-toggle region" data-toggle="dropdown" role="button" data-info = "{{ $region->id }}">
                                  {{ $region->name }} <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" id = "second-level" style="left: 100%;top: 0;">

                              </ul>
                          </li>
                      <?php endforeach; ?>
                  </ul>
              </li>
              @endif
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
                @if(Auth::user()->user_role == 0 || Auth::user()->user_role == 1)
                  <a class="dropdown-item" href="{{url('/user')}}">User List</a>
                @endif
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

     $(document).on('mouseover', '.region', function(e){
      var region_id = $(this).attr('data-info');
     console.log(region_id);
      var _url = "{{URL::to('region/list_submenu_area')}}";
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

     $(document).on('mouseover','.area',  function(){
      var area_id = $(this).attr('data-info');
      //alert(area_id);
      var _url = "{{URL::to('region/list_sub_teritory')}}";
      $.ajax({

        url:_url,
        method : "POST",
        data:{area_id:area_id,_token:"{{ csrf_token() }}"},
        success: function(result)
        {
          $('#third-level').html(result);
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

/*      $(document).on('mouseover', '.region', function(){
        var region_id = $(this).attr('data-info');
         // console.log(region_id);
      });*/


       });







 
  </script>
</html>
