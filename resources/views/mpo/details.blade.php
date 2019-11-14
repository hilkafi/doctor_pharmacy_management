@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}

    </div>
@endif         
    <div class="card" style="margin-bottom: 15px;">
      <div class="card-body" style="padding: 10px; text-align: center;"><h4>{{$data->name}} Details<h4></div>
    </div>

                 <div class="table-responsive">  

            
               <table class="table table-bordered">
                <tr>
                    <th>Name</th><td>{{$data->name}} </td>
                 </tr>
                <tr>
                    <?php

                        if($data->designation ==1) $designation = "RSM";
                        elseif($data->designation ==2) $designation = "AM";
                        elseif($data->designation ==3) $designation = "MPO";
                        else $designation = null;


                    ?>
                    <th>Designation</th><td>{{$designation}} </td>
                 </tr>
                <tr>
                    <th>Contact</th><td>{{$data->phone}} </td>
                 </tr>

                <tr>
                    <th>Email</th><td>{{$data->mail}} </td>
                 </tr>
                 <tr>
                    <th>Address</th><td>{{$data->address}} </td>
                 </tr>
              
                <tr>
                    <th>Teritory</th><td>{{$district->area_name($data->area_id)}}</td>
                 </tr>
                <tr>
                    <th>Area</th><td>{{$district->district_name($data->district_id)}}</td>
                 </tr>
                <tr>
                    <th>Region</th><td>{{$district->region_name($data->region_id)}}</td>
                 </tr>  
               </table>
           </div>
  
            

    </div>
</div>
</div>
<script type="text/javascript">
    
</script>

@endsection