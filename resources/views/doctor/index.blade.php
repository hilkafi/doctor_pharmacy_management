@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">

    <div class="row ">
        <div class="col-md-2">
     

        
        </div>
        <div class="col-md-10">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
  
            <div class="">
                <div class="row" style="margin-bottom: 30px" >
                    <div  class="col-md-10"><a href='{{url("doctor/create")}}' class = "btn btn-success float-right">Add</a></div>
                </div>
                <form method="post" class="form-class" id="my_frm">
                @csrf
                <p class="btn btn-primary" id="mapping">Mapping</p>
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
                                <option value="">Select District</option>
                            </select>
                        </div>
                        <div class="input-group col-md-3">
                            <select class="form-control" id="area" name="area_id">
                                <option value="">Select Area</option>
                            </select>
                        </div>
                        <div class="input-group col-md-3">
                            <select class="form-control" id="market" name="market_id">
                                <option value="">Select Market</option>
                            </select>
                        </div>
                    </div>
                </div>
                <p class="btn btn-primary" id="ch">CH</p>
                <div class="display-ch" style="display: none;  margin-bottom: 10px">
                    <div class="input-group">
                        <div class="input-group col-md-4">
                                <select class="form-control" id="hospital" name="hospital_id">
                                    <option value="">Select Medical</option>
                                </select>
                        </div>
                        <div class="input-group col-md-4">
                                <select class="form-control" id="cc" name="cc_id">
                                    <option value="">Select CC</option>
                                </select>
                        </div>
                    </div>
                </div>
                <p class="btn btn-primary" id="qualification">Qualification</p>
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
                <p class="btn btn-primary" id="info">Personal Info</p>
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
                <div class="is-covered">
                    <div class="input-group">
                        <label class="radio-inline" style="margin-right: 15px">
                          <input type="radio" name="is_covered" value="Covered" style="margin-right: 5px">Covered
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="is_covered" value="Not Covered" style="margin-right: 5px">Not Covered
                        </label>
                    </div>
                </div>
                <div class="input-group" style="cursor: pointer">
                    <span class="input-group-text red lighten-3" id="srch">Search</span>
                </div>
                </form>
                <div id ="ajax_content">

                <div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active">
                <th>Sl.</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Expertise</th>
                <th>Add Chember</th>

                <th>action</th>
                </tr>
                <?php $i = 0;
                ?>


                @foreach($dataset as $data) 
                <?php $i++;?>

                <tr>
                <td>{{$i}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->designation}}</td>
                <td>{{$data->expertise}}</td>
                <td><table><tr>
                    <td><a href="{{url('doctor/chamber')}}/{{$data->id}}" class="btn btn-success">Add Chamber</a></td>
                </tr></table></td>

                <td><table><tr><td> <a href='doctor/{{$data->id}}/edit' class="btn btn-warning">E</a><br><br></td>
                
               <td> <form action="{{ route('doctor.destroy', $data->id) }}" method="POST">
                    @method('DELETE')
                     @csrf
                    <button class="btn btn-danger">D</button>
                    </form></td>
                    <td><a href="doctor/{{$data->id}}"><button class="btn btn-success">V</button></a></td>
                </tr></table></td>
                </tr>
                @endforeach
                <tr>
                    <td  colspan = '4' style="text-align: right; font-weight: bold">Total Doctors</td>
                    <td style="font-weight: bold">{{ $i }}</td>
                    <td></td>
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
    $('#mapping').click(function(){
        $('.display-mapping').toggle(
            function(){$("display-mapping").css({"display": "block"});});
    });
    $('#ch').click(function(){
        $('.display-ch').toggle(
            function(){$("display-ch").css({"display": "block"});});
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