@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card" style="margin-bottom: 15px;">
      <div class="card-body" style="padding: 10px; text-align: center;"><h4>Area List<h4></div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                <div class="input-group col-md-4">
                    <select class="form-control" name="region_id">
                        <option value="">Select Region</option>
                        @foreach($regions as $r)
                        <option value="{{$r->id}}">{{$r->name}}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="input-group md-form form-sm form-2 pl-0 col-md-4">
                        <input class="form-control my-0 py-1 red-border" name="search" type="text" placeholder="Search" aria-label="Search">
                        <div class="input-group-append" style="cursor: pointer">
                            <span class="input-group-text red lighten-3" id="srch">Search</span>
                        </div>
                    </div>
                </div>
                </form>
            </div>
                <div  class="col-md-2">
                    <a href='{{url("area/create")}}' class = "btn btn-outline-success">Add</a>
                </div>
            </div>
                <div id="ajax_content">
                <div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active bg-info">
                <th>Sl.</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Region</th>
                <th style="text-align: center;">Total Doctor</th>
                <th style="text-align: center;">Covered Doctor</th>
                <th style="text-align: center;">Doctor Covered</th>
               
                <th style="text-align: center;">Total Pharmacy</th>
                <th style="text-align: center;">Covered Pharmacy</th>
                <th style="text-align: center;">Pharmacy Covered</th>
                <th style="text-align: center; width: 25%;">Actions</th>
                </tr>
                <?php $i = 0;
                ?>


                @foreach($dataset as $data) 
                <?php $i++;?>

                <tr>
                <td>{{$i}}</td>
                <td style="text-align: center;">{{$data->name}}</td>
                <td style="text-align: center;">{{$region->region_name($data->region_id)}}</td>
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
                <td style="width: 25%; text-align: center;"> <a href='area/{{$data->_key}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     <a title="doctor" href='area/{{$data->_key}}/details' class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>


                    <a href="{{url('/area/delete')}}/{{$data->id}}" onclick="return confirm('Data will be deleted permanently.Are you sure about delete?')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> 
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

$('#srch').click(function(){

var _form = $('#my_frm');
var _url = "{{URL::to('area/search')}}";
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