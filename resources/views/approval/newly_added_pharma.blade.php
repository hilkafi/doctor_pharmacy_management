@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card" style="margin-bottom: 15px;">
        <div class="card-body" style="padding: 10px; text-align: center;">
            <h4>Pharmacy List<h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif



        <div class="col-md-2">
            <a href='{{url("dispensary/create")}}' class = "btn btn-outline-success">Add</a><br><br>
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
                    <th style="text-align: center;">Contact</th>

                    <th style="text-align: center;">Covered</th>
                    <th style="width: 15%; text-align: center;">action</th>
                </tr>
                <?php $i = 0;
                ?>
                @foreach($dataset as $data) 
                <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$region->region_name($data->region_id)}}</td>
                    <td>{{$region->district_name($data->district_id)}}</td>
                    <td>{{$region->area_name($data->area_id)}}</td>
                    <td>{{$region->market_name($data->market_id)}}</td>
                    <td>{{ $data->contact }}</td>
                    <td>
                    <?php  
                        if($data->is_covered == "Not Covered"){ ?>
                            Not Covered
                            <a href="{{url('dispensary/cover')}}/{{$data->id}}" onclick="return confirm('Are you sure!')" class="btn btn-outline-primary">Cover</a>

                      <?php  }elseif($data->is_covered == "Covered"){ ?>
                            Covered
                            <a href="{{url('dispensary/uncover')}}/{{$data->id}}" onclick="return confirm('Are you sure!')" class="btn btn-outline-primary">UnCover</a>
                      <?php }else{ ?>
                            N/A
                            <a href="{{url('dispensary/cover')}}/{{$data->id}}" onclick="return confirm('Are you sure!')" class="btn btn-outline-primary">Cover</a>
                      <?php } ?>
                    </td>
                    <td style="width: 15%; text-align: center;">
                        <a href='{{url('dispensary')}}/{{$data->_key}}/edit' class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="{{url('dispensary')}}/{{$data->_key}}/visit"><button class="btn outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                        <a href="{{url('/dispensary/delete')}}/{{$data->id}}" onclick="return confirm('Data will be delete permanently.Are you sure about delete?')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> 

                    </td>
                </tr>
                @endforeach
                <tr>
                    <td  colspan = '4' style="text-align: right; font-weight: bold">Total Pharamcy</td>
                    <td style="font-weight: bold">{{ $i }}</td>
                    <td></td>
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