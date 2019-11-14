@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin-bottom: 15px;">
      <div class="card-body" style="padding: 10px; text-align: center;"><h4>Employee List<h4></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
  
            <div class="row" style="margin-bottom: 20px">
                <div class="col-md-10">

                <form method="post" class="form-class" id="my_frm">
                @csrf
                <div class="input-group">
                <div class="input-group col-md-3">
                    <select class="form-control" id="region" name="region_id">
                        <option value="">Select Region</option>
                        @foreach($regions as $r)
                        <option value="{{ $r->id }}">{{$r->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="input-group col-md-2">
                    <select class="form-control" id="district" name="district_id">
                        <option value="">Select District</option>
                    </select>
                </div>
                <div class="input-group col-md-2">
                    <select class="form-control" id="area" name="area_id">
                        <option value="">Select Area</option>
                    </select>
                </div>
                <div class="input-group col-md-2">
                    <select class="form-control" id="market" name="market_id">
                        <option value="">Select Market</option>
                    </select>
                </div>
               
                    <div class="input-group md-form form-sm form-2 pl-0 col-md-3">
                        <input class="form-control my-0 py-1 red-border" name="search" type="text" placeholder="Search" aria-label="Search">
                        <div class="input-group-append" style="cursor: pointer">
                            <span class="input-group-text red lighten-3" id="srch">Search</span>
                        </div>
                    </div>
                </div>
                </form>
            </div>

                <div class="">
                    <a href='{{url("employee/create")}}' class = "btn btn-outline-success">Add</a>
                </div>
            </div>
                <div id ="ajax_content">

                <div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active">
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Region</th>
                    <th>District</th>
                    <th>Area</th>
                    <th>action</th>
                </tr>
                <?php $i = 0;
                ?>


                @foreach($dataset as $data) 
                <?php $i++;
                    if($data->designation ==1) $designation = "RSM";
                    else if($data->designation ==2) $designation = "AM";
                    else if($data->designation ==3) $designation = "MPO";

                    else{
                        $designation = null;
                    }


                ?>

                <tr>
                <td>{{$i}}</td>
                <td>{{$data->name}}</td>
                <td>{{$designation}}</td>
                <td>{{$district->region_name($data->region_id)}}</td>
                <td>{{$district->district_name($data->district_id)}}</td>
                <td>{{$district->area_name($data->area_id)}}</td>
                 <td style="width: 20%; text-align: center;"> <a href='employee/{{$data->_key}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     <a href='employee/{{$data->_key}}' class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                </td>
                </tr>
                @endforeach
                    
                </tr>
                <table>
                <?php echo $dataset->render(); ?>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

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
var _url = "{{URL::to('employee/search')}}";
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