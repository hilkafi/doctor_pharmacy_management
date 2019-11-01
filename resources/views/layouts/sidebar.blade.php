<?php

 $user_role = Auth::user()->user_role;

?>






  <!-- Sidebar -->
  <div class ="sidenav">

    <ul class="nav">

    <div class ="test">
      <li>
        <a href="{{url('/home')}}">
          <i class="zmdi zmdi-view-dashboard"></i> Home
        </a>
      </li>
      </div>

  @if($user_role==0 || $user_role==1 || $user_role==2 || $user_role==3 )
   <div class ="test">
      <li>
        <a href="{{url('/user')}}">
          <i class="zmdi zmdi-view-dashboard"></i> Employee
        </a>
      </li>
      </div>
      @endif
      @if($user_role==0  || $user_role==1 )
      <div class ="test">
      <li>
        <a href="{{url('/region')}}">
          <i class="zmdi zmdi-link"></i> Region
        </a>
      </li>
      </div>
      @endif
      @if($user_role==0 ||$user_role==1 ||$user_role==2)
      <div class ="test">
      <li>
        <a href="{{url('/area')}}">
          <i class="zmdi zmdi-calendar"></i> Area
        </a>
      </li>
      </div>
      @endif

      @if($user_role==0 || $user_role==1 || $user_role==2 || $user_role==3 )
      <div class ="test">
      <li>
        <a href="{{url('teritory')}}">
          <i class="zmdi zmdi-info-outline"></i> Teritory
        </a>
      </li>
     </div>
     @endif

     <div class ="test">
      <li>
        <a href="{{url('market')}}">
          <i class="zmdi zmdi-info-outline"></i> Market
        </a>
      </li>
     </div>
   
      <div class ="test">
      <li>
        <a href="{{url('/doctor')}}">
          <i class="zmdi zmdi-info-outline"></i> Doctors
        </a>
      </li>
      </div>
      <div class ="test">
      <li>
        <a href="{{url('/dispensary')}}">
          <i class="zmdi zmdi-info-outline"></i> Dispensary
        </a>
      </li>
      </div>
      <div class ="test">
      <li>
        <a href="{{url('/clinic')}}">
          <i class="zmdi zmdi-info-outline"></i>Clinic
        </a>
      </li>
      </div>
      <div class ="test">
      <li>
        <a href="{{url('/employee-profile')}}">
          <i class="zmdi zmdi-info-outline"></i>Employee Profile
        </a>
      </li>
      </div>

 
      

    </ul>
  </div>
  <!-- Content -->

