@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">

    <div class="row ">
        <div class="col-md-2">
     

        
        </div>
        <div class="col-md-10">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}

    </div>
@endif          <h1>Region Name: <i>{{$d->name}}</i></h1> <a href="region/{{$d->_key}}/details">see doctor</a>
                <div class="table-responsive">  

                
               <?php

                $pdata= $functionality->pharmacy_covered($d->id);

                ?>
               <table class="table-bordered">
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

               
  
                <div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active">
                <th>Sl.</th>
                <th>Name</th>
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
<script type="text/javascript">
    
</script>

@endsection