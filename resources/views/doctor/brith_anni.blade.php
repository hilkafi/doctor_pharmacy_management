@extends('layouts.app')

@section('content')
<?php
    $date = date('Y-m-d');
    $day = date('l');

?>
<div class="container-fluid">
    <div class="card" style="margin-bottom: 15px;">
      <div class="card-body" style="padding: 10px; text-align: center;"><h4>Brithday and Marriage Anniversary List<h4>
       <i>Today : {{$date}},({{$day}})</i> 

      </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
  
            <div class="">

                <div id ="ajax_content">
                <h3 class="bg-info text-center" style="padding: 5px; margin-bottom: 20px;">Birthday</h3>
                <div class="table-responsive">
                <table class ="table table-bordered table-sm">
                <tr class ="table-active">
                <th style="text-align: center">Sl.</th>
                <th style="text-align: center">Name</th>
                <th style="text-align: center">Designation</th>
                <th style="text-align: center">Expertise</th>
                <th style="text-align: center">Contact</th>
                <th style="text-align: center">Address</th>
                <th style="text-align: center">Is Covered</th>
               
                <th style="width: 15%; text-align: center;">action</th>
                </tr>
                <?php $i = 0;
                ?>


                @foreach($number_birthday as $data) 
                <?php $i++;?>

                <tr>
                <td style="text-align: center">{{$i}}</td>
                <td style="">{{$data->name}}</td>
                <td style="">{{$data->designation}}</td>
                <td style="">{{$data->expertise}}</td>
                 <td style="">{{$data->contact}}</td>
                  <td style="">{{$data->address}}</td>
                <td style="text-align: center; width: 15%;">{{$data->is_covered}} </td>
             

                <td style="width: 15%; text-align: center;">
                    <a href="{{url('doctor')}}/{{$data->id}}" class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                
                </td>
                @endforeach
                <tr>
                    <td  colspan = '5' style="text-align: right; font-weight: bold">Total Doctors</td>
                    <td style="font-weight: bold">{{ $i }}</td>
                    <td></td>
                    <td></td>
                </tr>
              
                <table>
                </div>


                <h3 class="bg-info text-center" style="padding: 5px; margin-bottom: 20px;">Anniversary</h3>
                <div class="table-responsive">
                <table class ="table table-bordered table-sm">
                <tr class ="table-active">
                <th style="text-align: center">Sl.</th>
                <th style="text-align: center">Name</th>
                <th style="text-align: center">Designation</th>
                <th style="text-align: center">Expertise</th>
                <th style="text-align: center">Contact</th>
                <th style="text-align: center">Address</th>
                <th style="text-align: center">Is Covered</th>
               
                <th style="width: 15%; text-align: center;">action</th>
                </tr>
                <?php $i = 0;
                ?>


                @foreach($number_anniversary as $data) 
                <?php $i++;?>

                <tr>
                <td style="text-align: center">{{$i}}</td>
                <td style="">{{$data->name}}</td>
                <td style="">{{$data->designation}}</td>
                <td style="">{{$data->expertise}}</td>
                 <td style="">{{$data->contact}}</td>
                  <td style="">{{$data->address}}</td>
                <td style="text-align: center; width: 15%;">{{$data->is_covered}} </td>
             

                <td style="width: 15%; text-align: center;">
                    <a href="{{url('doctor')}}/{{$data->id}}" class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                
                </td>
                @endforeach
                <tr>
                    <td  colspan = '5' style="text-align: right; font-weight: bold">Total Doctors</td>
                    <td style="font-weight: bold">{{ $i }}</td>
                    <td></td>
                    <td></td>
                </tr>
              
                <table>
                </div>

                </div>
        </div>
    </div>
</div>
<script>

</script>
@endsection