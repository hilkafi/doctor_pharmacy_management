@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}

    </div>
        @endif   
            <div class="card">
            <div class="card-header" style="text-align: center;">
                <h3>{{$d->name}} Region Details</h3>
            </div> 
            <div class="card-body"> 

                <div class="table-responsive">
                <table class="table table-bordered">
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

               <div class="card" style=" margin-bottom: 20px; margin-top: 20px;">
                   <div class="card-body" style="padding: 10px; text-align: center;">
                       <h4>Doctor List</h4>
                   </div>
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
                </tr>
              
                </table>
                <?php echo $final_data->render(); ?>
                </div>

    </div>
</div>
</div>
<script type="text/javascript">
    
</script>

@endsection