@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}

    </div>
@endif          <div class="card">
            <div class="card-header" style="text-align: center;">
                <h3>{{$d->name}} Region Details</h3>
            </div> 
            <div class="card-body"> 
                <div class="table-responsive">  
               <?php

                $pdata= $functionality->pharmacy_covered($d->id);

                ?>
               <table class="table table-bordered">
                <tr class="table-active">
                    <th>Total Pharmacy</th>
                    <th>Covered Pharmacy</th>
                    <th>Pharmacy percentage</th>
                 </tr>   
                 <tr>

                @foreach($pdata as $key => $d)

                <td>{{ $d}}</td>
                @endforeach
            </tr>
               </table>
           </div>
               <div class="card" style=" margin-bottom: 20px; margin-top: 20px;">
                   <div class="card-body" style="padding: 10px; text-align: center;">
                       <h4>Pharmacy List</h4>
                   </div>
               </div>
               
  
                <div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active">
                <th>Sl.</th>
                <th>Name</th>
                <th>Area</th>
                <th>Teritory</th>
                <th>Market</th>


                <th>Is Covered?</th>

                </tr>
                <?php $i = 0;
                ?>


                @foreach($dataset as $data) 
                <?php $i++;?>

                <tr>
                <td>{{$i}}</td>
                <td>{{$data->name}}</td>
                <td>{{$dis->district_name($data->district_id)}}</td>
                <td>{{$dis->area_name($data->area_id)}}</td>
                <td>{{$dis->market_name($data->market_id)}}</td>

 
                <td>{{$data->is_covered}}</td>


  
                </tr>
                @endforeach
                <tr>
                    <td  colspan = '4' style="text-align: right; font-weight: bold">Total Doctors</td>
                    <td style="font-weight: bold">{{ $i }}</td>
                    <td></td>
                </tr>
              
                </table>
                <?php echo $dataset->render(); ?>
                </div>
            </div>
    </div>
</div>
<script type="text/javascript">
    
</script>

@endsection