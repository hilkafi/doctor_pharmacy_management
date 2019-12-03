@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card" style="margin-bottom: 15px;">
      <div class="card-body" style="padding: 10px; text-align: center;"><h4>Doctor List<h4></div>
    </div>

    <div class="row">
        <div class="col-md-12">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
  
            <div class="">
                <div class="row" style="margin-bottom: 0px" >
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
                <p class="btn btn-outline-primary" id="ch">Institue</p>
                <div class="display-ch" style="display: none;  margin-bottom: 10px">
                    <div class="input-group">
                        <div class="input-group col-md-4">
                                <select class="form-control" id="hospital" name="hospital_id">
                                    <option value="">Select Institute</option>
                                </select>
                        </div>

                    </div>
                </div>
                <p class="btn btn-outline-primary" id="consulting">Consultation Center</p>
                <div class="display-consulting" style="display: none;  margin-bottom: 10px">
                    <div class="input-group">
                        <div class="input-group col-md-4">
                                <select class="form-control" id="cc" name="cc_id">
                                    <option value="">Select Consultation Center</option>
                                </select>
                        </div>
  
  
                    </div>
                </div>
                <p class="btn btn-outline-primary" id="qualification">Qualification</p>
                <div class="display-qualification" style="display: none;  margin-bottom: 10px">
                    <div class="input-group">
                        <label class="radio-inline" style="margin-right: 15px">
                          <input type="radio" name="qualification" style="margin-right: 5px" value="yes">Qualified
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="qualification" style="margin-right: 5px" value="no">Not Qualified
                        </label>
                    </div>
                </div>
                <p class="btn btn-outline-primary" id="info">Personal Info</p>
                <div class="display-info" style="display: none; margin-bottom: 10px">
                    <div class="input-group">
                        <div class="input-group col-md-2">
                            <input type="text" class="form-control" name="speciality" placeholder="speciality">
                        </div>
                        <div class="input-group col-md-2">
                            <input type="text" class="form-control" name="designation" placeholder="designation">
                        </div>
                        <div class="input-group col-md-2">
                            <input type="text" class="form-control" name="department" placeholder="department">
                        </div>
                        <div class="input-group col-md-2">
                            <input type="text" class="form-control" name="degree" placeholder="degree">
                        </div>
                        <div class="input-group col-md-2">
                            <input type="text" class="form-control" name="name" placeholder="name">
                        </div>
                    </div>
                </div>
                <div class="is-covered col-md-4" style="border: 1px solid #ddd; padding: 10px;">
                    <div class="input-group">
                        <label class="radio-inline" style="margin-right: 15px">
                          <input type="radio" name="is_covered" value="Covered" style="margin-right: 5px">Covered
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="is_covered" value="Not Covered" style="margin-right: 5px">Not Covered
                        </label>
                    </div>
                </div>
                <div class="input-group" style="cursor: pointer; padding: 10px;">
                    <span class="btn btn-outline-success" id="srch">Search</span>
                </div>
                </form>
            </div>

            <div  class="col-md-2">
                <a href='{{url("doctor/create")}}' class = "btn btn-outline-dark">Add</a>
            </div>
            </div>
                <div id ="ajax_content">

                <div class="table-responsive">
                <table class ="table table-bordered table-sm">
                <tr class ="table-active">
                <th style="text-align: center">Sl.</th>
                <th style="text-align: center">Name</th>
                <th style="text-align: center">Designation</th>
                <th style="text-align: center">Expertise</th>
                <th style="text-align: center">Is Covered</th>
                <th style="width: 5%; text-align: center;">Chember</th>
                <th style="width: 15%; text-align: center;">action</th>
                </tr>
                <?php $i = 0;
                ?>


                @foreach($dataset as $data) 
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
                            <a href="{{url('doctor/cover')}}/{{$data->id}}" onclick="return confirm('Are you sure!')" class="btn btn-outline-primary">Cover</a>

                      <?php  }elseif($data->is_covered == "Covered"){ ?>
                            Covered
                            <a href="{{url('doctor/uncover')}}/{{$data->id}}" onclick="return confirm('Are you sure!')" class="btn btn-outline-primary">UnCover</a>
                      <?php }else{ ?>
                            N/A
                            <a href="{{url('doctor/cover')}}/{{$data->id}}" onclick="return confirm('Are you sure!')" class="btn btn-outline-primary">Cover</a>
                      <?php } ?>
                </td>
                <td style="width: 5%; text-align: center;"><a href="{{url('doctor/chamber')}}/{{$data->id}}" class="btn btn-outline-primary"><i class="fa fa-plus" aria-hidden="true" title="Add Chamber"></i></a></td>

                <td style="width: 15%; text-align: center;"><a href='doctor/{{$data->id}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="doctor/{{$data->id}}" class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                   <a href="{{url('/doctor/delete')}}/{{$data->id}}" onclick="return confirm('Are you Sure? Data will be deleted permanently')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
                @endforeach
                <tr>
                    <td  colspan = '4' style="text-align: right; font-weight: bold">Total Doctors</td>
                    <td style="font-weight: bold">{{ $i }}</td>
                    <td></td>
                    <td></td>
                </tr>
              
                <table>
                <?php echo $dataset->render(); ?>
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
    $('#ch').click(function(){
        $('.display-ch').toggle(
            function(){$("display-ch").css({"display": "block"});});
    });
     $('#consulting').click(function(){
        $('.display-consulting').toggle(
            function(){$("display-cc").css({"display": "block"});});
    });

    $('#qualification').click(function(){
        $('.display-qualification').toggle(
            function(){$("display-qualification").css({"display": "block"});});
    });
    $('#info').click(function(){
        $('.display-info').toggle(
            function(){$("display-info").css({"display": "block"});});
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

    $('#market').change(function(){

    var market_id = $(this).val();
    var _url = "{{URL::to('teritory/list_hospital')}}";
    $.ajax({
        url: _url,
        method:"POST",
        data:{ market : market_id, _token : "{{ csrf_token() }}" },
        success: function(result)
        {
        $('#hospital').html(result);
        }

        });
    });
    $('#market').change(function(){

    var market_id = $(this).val();
    var _url = "{{URL::to('teritory/list_consulting_center')}}";
    $.ajax({
        url: _url,
        method:"POST",
        data:{ market : market_id, _token : "{{ csrf_token() }}" },
        success: function(result)
        {
        $('#cc').html(result);
        }

    });
});

$('#srch').click(function(){

var _form = $('#my_frm');
var _url = "{{URL::to('doctor/search')}}";
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