@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card" style="margin-bottom: 15px;">
      <div class="card-body" style="padding: 10px; text-align: center;"><h4>Hospital List<h4></div>
    </div>
    <div class="row"></div>
        <div class="col-md-12">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
        @endif
  
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-10">
<form method="post" class="form-class" id="my_frm">
                @csrf
                <p class="btn btn-outline-primary" id="mapping">Zone</p>
                <div class="display-mapping" style="display: none; margin-bottom: 10px">
                    <div class="input-group">
                        <div class="input-group col-md-3">
                            <select class="form-control" id="region" name="region_id">
                                <option value="">Select Region</option>
                                @foreach($regions as $r)
                                <option value="{{$r->id}}">{{$r->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group col-md-3">
                            <select class="form-control" id="district" name="district_id">
                                <option value="">Select Area</option>
                            </select>
                        </div>
                        <div class="input-group col-md-3">
                            <select class="form-control" id="area" name="area_id">
                                <option value="">Select Teritory</option>
                            </select>
                        </div>
                        <div class="input-group col-md-3">
                            <select class="form-control" id="market" name="market_id">
                                <option value="">Select Market</option>
                            </select>
                        </div>
                    </div>
                </div>


                <p class="btn btn-outline-primary" id="hostype">Hospital Type</p>
                <div class="display-hostype" style="display: none;  margin-bottom: 10px">
                    <div class="input-group">
                        <label class="radio-inline" style="margin-right: 15px">
                          <input type="radio" name="hospital_type" style="margin-right: 5px" value="public">Public
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="hospital_type" style="margin-right: 5px" value="private">Private
                        </label>
                    </div>
                </div>

                <div class="input-group" style="cursor: pointer; padding: 10px;">
                    <span class="btn btn-outline-success" id="srch">Search</span>
                </div>
                </form>
            </div>
                <div  class="col-md-2">
                    <a href='{{url("hospital/create")}}' class = "btn btn-success">Add</a>
                </div>
                </div>
                <div id ="ajax_content">


                <div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active bg-info">
                <th>Sl.</th>
                <th>Name</th>
                <th>Region</th>
                <th>Area</th>
                <th>Teritory</th>


                <th>Market</th>
                <th>Doctor Covered</th>
                <th>Pharmacy</th>
                <th style="width: 15%; text-align: center;">Actions</th>
                </tr>
                <?php $i = 0;
                ?>




                @foreach($dataset as $data) 
                <?php $i++;?>
                <?php
                $fdata= $data->doctor_percentage($data->id);


                ?>

                <tr>
                <td>{{$i}}</td>
                <td>{{$data->name}}</td>
                <td>{{$region->region_name($data->region_id)}}</td>
                <td>{{$region->district_name($data->area_id)}}</td>
                <td>{{$region->area_name($data->teritory_id)}}</td>

                <td>{{$region->market_name($data->market_id)}}</td>
                <td>{{ $fdata[2] }}</td>
                <td>{{$data->pharmacy_covered($data->id)}}</td>
                 <td style="width: 15%; text-align: center;"> <a href='hospital/{{$data->_key}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     <a href='hospital/{{$data->_key}}/details' class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a href="{{url('/institute/delete')}}/{{$data->id}}" onclick="return confirm('Data will be deleted permanently.Are you sure about delete?')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> 
                </td>
                </tr>
                @endforeach
              
                </table>
                <?php echo $dataset->render(); ?>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    $('#mapping').click(function(){
        $('.display-mapping').toggle(
            function(){$("display-mapping").css({"display": "block"});});
    });
    $('#hostype').click(function(){
    $('.display-hostype').toggle(
         function(){$("display-qualification").css({"display": "block"});});
    });

    $('#region').change(function(){

    var region_id = $(this).val();
    var _url = "{{URL::to('teritory/list_district')}}";
    $.ajax({
        url: _url,
        method:"POST",
        data:{region:region_id, _token: "{{ csrf_token() }}" },
        success: function(result)
        {
        $('#district').html(result);
        }

    });
    });
    $('#district').change(function(){

    var district_id = $(this).val();
    var _url = "{{URL::to('teritory/list_area')}}";
    $.ajax({
        url: _url,
        method:"POST",
        data:{ district : district_id, _token : "{{ csrf_token() }}" },
        success: function(result)
        {
        $('#area').html(result);
        }

    });
    });
    $('#area').change(function(){

    var area_id = $(this).val();
    var _url = "{{URL::to('teritory/list_market')}}";
    $.ajax({
        url: _url,
        method:"POST",
        data:{ area : area_id, _token : "{{ csrf_token() }}" },
        success: function(result)
        {
        $('#market').html(result);
        }

    });
});

$('#srch').click(function(){

var _form = $('#my_frm');
var _url = "{{URL::to('hospitals/search')}}";
$.ajax({
    url: _url,
    method:"POST",
    data: _form.serialize(),
    success: function(result)
    {
    $('#ajax_content').html(result);
    },
    error: function(xhr, error){
        alert('There is something wrong. Try again');
    }


});
});


});
</script>
@endsection