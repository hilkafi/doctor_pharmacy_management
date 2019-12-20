@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
                <div class="card" style="margin-bottom: 15px;">
                    <div class="card-body" style="padding: 5px; text-align: center;">
                        <h4>Doctor Approval List<h4>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class ="table table-bordered table-sm">
                        <tr class ="table-active bg-warning">
                            <th style="text-align: center">Sl.</th>
                            <th style="text-align: center">Name</th>
                            <th style="text-align: center">Designation</th>
                            <th style="text-align: center">Expertise</th>
                            <th style="text-align: center">Is Covered</th>
                            <th style="width: 15%; text-align: center;">action</th>
                        </tr>
                        <?php $i = 0; ?>

                        @foreach($doctors as $data) 
                        <?php $i++;?>

                        <tr>
                            <td style="text-align: center">{{$i}}</td>
                            <td style="">{{$data->name}}</td>
                            <td style="">{{$data->designation}}</td>
                            <td style="">{{$data->expertise}}</td>
                            <td style="text-align: center; width: 15%;">
                            <?php  
                            if($data->is_covered == "Not Covered"){ ?>
                                Not Covered
                            <?php  }elseif($data->is_covered == "Covered"){ ?>
                                Covered
                            <?php }else{ ?>
                                N/A
                            <?php } ?>
                            </td>
                            <td style="width: 25%; text-align: center;"><a href='doctor/{{$data->id}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="doctor/{{$data->id}}" class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            <a href="{{url('/doctor/delete')}}/{{$data->id}}" onclick="return confirm('Are you Sure? Data will be deleted permanently')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <a href="{{url('approval')}}/{{$data->id}}/doctor" class="btn btn-outline-info">
                                approve
                            </a>
                            </td>
                        </tr>
                            @endforeach
                        <tr>
                            <td  colspan = '3' style="text-align: right; font-weight: bold">Total Doctors</td>
                            <td style="font-weight: bold">{{ $i }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
        </div>
        <div class="col-md-6">
                    <div class="card" style="margin-bottom: 15px;">
                        <div class="card-body" style="padding: 5px; text-align: center;">
                            <h4>Pharmacy Approval List<h4>
                        </div>
                    </div>
                <div class="table-responsive">
                    <table class ="table table-bordered table-sm" style="font-size: 15px;">
                        <tr class ="table-active bg-warning">
                            <th>Sl.</th>
                            <th style="text-align: center;">Name</th>
                            <th style="text-align: center;">Region</th>
                            <th style="text-align: center;">District</th>
                            <th style="text-align: center;">Area</th>
                            <th style="text-align: center;">Market</th>
                            <th style="text-align: center;">Covered</th>
                            <th style="width: 15%; text-align: center;">action</th>
                        </tr>
                        <?php $i = 0;
                        ?>
                        @foreach($pharmacys as $data) 
                        <?php $i++;?>

                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$region->region_name($data->region_id)}}</td>
                            <td>{{$region->district_name($data->district_id)}}</td>
                            <td>{{$region->area_name($data->area_id)}}</td>
                            <td>{{$region->market_name($data->market_id)}}</td>
                            <td>
                            <?php  
                            if($data->is_covered == "Not Covered"){ ?>
                            Not Covered

                            <?php  }elseif($data->is_covered == "Covered"){ ?>
                            Covered
                            <?php }else{ ?>
                            N/A
                            <?php } ?>
                            </td>
                            <td style="width: 25%; text-align: center;">
                            <a href='dispensary/{{$data->_key}}/edit' class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="dispensary/{{$data->_key}}/visit"><button class="btn outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                            <a href="{{url('/dispensary/delete')}}/{{$data->id}}" onclick="return confirm('Data will be delete permanently.Are you sure about delete?')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> 
                            <a href="{{url('approval')}}/{{$data->id}}/pharmacy" class="btn btn-outline-info">
                                approve
                            </a>

                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td  colspan = '4' style="text-align: right; font-weight: bold">Total Pharamcy</td>
                            <td style="font-weight: bold">{{ $i }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
          
                    </table>
                </div> 
        </div>
    </div>

</div>
<script>
$(document).ready(function(){
    

});
</script>
@endsection