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
      <div class="card-body" style="padding: 10px; text-align: center;"><h4>{{$d->name}} Details<h4></div>
    </div>

                <div class="table-responsive"> 
                <?php
                $doc = $functionality->doctor_percentage($d->id);

                ?> 

            
               <table class="table table-bordered">
                <tr>
                    <th>Total Doctor</th><td>{{$doc[0]}}</td>
                 </tr>
                <tr>
                    <th>Covered Doctor</th><td>{{$doc[1]}}</td>
                 </tr>
                <tr>
                    <th>Doctor Coverage Pecentage</th><td> {{ $doc[2] }}</td>
                 </tr>   
               </table>
           </div>
  
                <div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active">
                <th style="text-align: center">Sl.</th>
                <th style="text-align: center">Name</th>
                <th style="text-align: center">Degree</th>
                <th style="text-align: center">Designation</th>
                <th style="text-align: center">Especiality</th>
                <th style="text-align: center">Mailing Address</th>
                <th style="text-align: center">Multiple Chamber</th>
                <th style="text-align: center">Is Covered?</th>
                <th style="text-align: center">Action</th>

                </tr>
                <?php $i = 0;
                ?>


                @foreach($final_data as $data) 
                <?php $i++;?>

                <tr>
                <td>{{$i}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->degree}}</td>
                <td>{{$data->designation}}</td>
                <td>{{$data->expertise}}</td>
                <td>{{$data->address}}</td>
                <td>{{$data->mul_chamber}}</td>
                <td>{{$data->is_covered}}</td>
                <td><a href="{{url('doctor')}}/{{$data->id}}" class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>


  
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
<script type="text/javascript">
    
</script>

@endsection