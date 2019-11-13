@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card" style="margin-bottom: 15px;">
      <div class="card-body" style="padding: 10px; text-align: center;"><h4>Pharmacy List<h4></div>
    </div>
    <div class="row">
        <div class="col-md-12">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
  
            <div class="row">
                <div  class="col-md-10">
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
                <div class="is-covered col-md-4" style="border: 1px solid #ddd; padding: 5px; margin-bottom: 10px;">
                    <div class="input-group">
                        <label class="radio-inline" style="margin-right: 15px">
                          <input type="radio" name="is_covered" value="Covered" style="margin-right: 5px">Covered
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="is_covered" value ="Not Covered" style="margin-right: 5px">Not Covered
                        </label>
                    </div>
                </div>
                <div class="input-group" style="cursor: pointer; margin-bottom: 10px;">
                    <span class="btn btn-outline-success" id="srch">Search</span>
                </div>
                </form>
            </div>
            <div class="col-md-2">
                <a href='{{url("dispensary/create")}}' class = "btn btn-outline-success">Add</a><br><br>
            </div>
        </div>
                <div id ="ajax_content">


                <div class="table-responsive">
                <table class ="table table-bordered table-sm" style="font-size: 15px;">
                <tr class ="table-active">
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


                @foreach($dataset as $data) 
                <?php $i++;?>

                <tr>
                <td>{{$i}}</td>
                <td>{{$data->name}}</td>
                <td>{{$region->region_name($data->region_id)}}</td>
                <td>{{$region->district_name($data->district_id)}}</td>
                <td>{{$region->area_name($data->area_id)}}</td>
                <td>{{$region->market_name($data->market_id)}}</td>
                <td>{{ $data->is_covered }}</td>
                <td style="width: 15%; text-align: center;">
                 <a href='dispensary/{{$data->_key}}/edit' class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                 <a href="dispensary/{{$data->_key}}/visit"><button class="btn outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                <a href="doctor/{{$data->id}}" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> 

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
var _url = "{{URL::to('dispensary/search')}}";
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