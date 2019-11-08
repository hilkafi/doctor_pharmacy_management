@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">

    <div class="row ">
        <div class="col-md-2">
     

        
        </div>
        <div class="col-md-8">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}

    </div>
        @endif   

                <div class="table-responsive">
                <h1>Region Name: <i>{{$d->name}}</i></h1> 
                <table class="table-bordered">
                 <tr class="table-active">
                 <th>Total Doctor</th>
                 <th>Covered Doctor</th> 
                 <th>Covered Parcentage</th> 
                 </tr>   

                
               <?php
                    $fdata = $functionality->doctor_percentage($d->id);
                 

                ?>
                <tr>
                @foreach($fdata as $key => $d)

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
                <th>Designation</th>
                <th>Expertise</th>
                <th>Is Covered?</th>

                </tr>
                <?php $i = 0;
                ?>


                @foreach($final_data as $data) 
                <?php $i++;?>

                <tr>
                <td>{{$i}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->designation}}</td>
                <td>{{$data->expertise}}</td>
                <td>{{$data->is_covered}}</td>


  
                </tr>
                @endforeach
                <tr>
                    <td  colspan = '4' style="text-align: right; font-weight: bold">Total Doctors</td>
                    <td style="font-weight: bold">{{ $i }}</td>
                    <td></td>
                </tr>
              
                </table>
                <?php echo $final_data->render(); ?>
                </div>

    </div>
</div>
<script type="text/javascript">
    
</script>

@endsection