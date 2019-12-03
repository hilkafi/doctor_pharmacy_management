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
        <div class="card">
            <div class="card-header" style="text-align: center;">
                <h3>{{$d->name}} Area Details</h3>
            </div> 
            <div class="card-body"> 
                <div class="table-responsive">
                    <a href="{{url('area')}}/{{$d->_key}}/view_pharmacy" class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i>PH</a>
                    <br><br> 
                <table class="table  table-bordered">
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
                       <h4>Doctors List</h4>
                   </div>
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
                <td>
                    <?php  
                        if($data->is_covered == "Not Covered"){ ?>
                            Not Covered
                            <a href="{{url('doctor/cover')}}/{{$data->id}}" onclick="return confirm('Are you sure!')" class="btn btn-outline-primary">Cover</a>

                      <?php  }elseif($data->is_covered == "Covered"){ ?>
                            Covered
                            <a href="{{url('doctor/uncover')}}/{{$data->id}}" onclick="return confirm('Are you sure!')" class="btn btn-outline-primary">UnCover</a>
                      <?php }else{ ?>
                            N/A
                            <a href="{{url('doctor/cover')}}/{{$data->id}}" onclick="return confirm('Are you sure!')" class="btn btn-outline-primary">Cover</a>
                      <?php } ?>

                </td>
                <td> <a href="{{url('doctor')}}/{{$data->id}}" class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>


  
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