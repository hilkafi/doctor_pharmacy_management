@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card" style="margin-bottom: 15px;">
      <div class="card-body" style="padding: 10px; text-align: center;"><h4>Market List<h4></div>
    </div>
    <div class="row justify-content-center">
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
                    <div class="input-group md-form form-sm form-2 pl-0 col-md-3">
                        <input class="form-control my-0 py-1 red-border" name="search" type="text" placeholder="Search" aria-label="Search">
                        <div class="input-group-append" style="cursor: pointer">
                            <span class="input-group-text red lighten-3" id="srch">Search</span>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <div  class="col-md-2">
                <a href='{{url("market/create")}}' class = "btn btn-success">Add</a>
            </div>
        </div>
                <div id="ajax_content">
                <div class="table-responsive">
                <table class ="table table-bordered table-striped">
                <tr class="bg-info">
                <th>Sl.</th>
                <th>Name</th>
                <th>Region</th>
                <th>Area</th>
                <th>Teritory</th>
                <th style="text-align: center;">Total Doctor</th>
                <th style="text-align: center;">Covered Doctor</th>
                <th style="text-align: center;">Doctor Covered</th>
               
                <th style="text-align: center;">Total Pharmacy</th>
                <th style="text-align: center;">Covered Pharmacy</th>
                <th style="text-align: center;">Pharmacy Covered</th>
                <th style="width: 20%; text-align: center;">Actions</th>
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
                <?php
                    $fdata = $data->doctor_percentage($data->id);
                    $pdata = $data->pharmacy_covered($data->id);

                ?>
                @foreach($fdata as $key => $d)

                <td style="text-align: center;">{{ $d}}</td>
                @endforeach
                @foreach($pdata as $key => $d)

                <td style="text-align: center;">{{ $d}}</td>
                @endforeach
                <td style="width: 20%; text-align: center;"> <a href='market/{{$data->_key}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     <a title="doctor" href='market/{{$data->_key}}/details' class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      <a title="pharmacy" href='market/{{$data->_key}}/view_pharmacy' class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true" ></i></a>

                     <a href="{{url('/market/delete')}}/{{$data->id}}" onclick="return confirm('Data will be deleted permanently.Are you sure about delete?')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
                </tr>
                @endforeach
              
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

    $('#srch').click(function(){

    var _form = $('#my_frm');
    var _url = "{{URL::to('market/search')}}";
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