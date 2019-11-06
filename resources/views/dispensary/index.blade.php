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
                <div  class=""></div><a href='{{url("dispensary/create")}}' class = "btn btn-success">Add</a><br><br>
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
                                <div class="is-covered">
                    <div class="input-group">
                        <label class="radio-inline" style="margin-right: 15px">
                          <input type="radio" name="is_covered" value="Covered" style="margin-right: 5px">Covered
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="is_covered" value ="Not Covered" style="margin-right: 5px">Not Covered
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
                <th>Region</th>
                <th>District</th>
                <th>Area</th>
                <th>Market</th>
                <th>action</th>
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
                <td><table><tr><td> <a href='dispensary/{{$data->_key}}/edit' class="btn btn-warning">E</a><br><br></td>
                
               <td> <form action="{{ route('dispensary.destroy', $data->id) }}" method="POST">
                    @method('DELETE')
                     @csrf
                    <button class="btn btn-danger">D</button>
                    </form></td>
                 <td><a href="dispensary/{{$data->_key}}/visit"><button class="btn btn-success">V</button></a></td>    

                </tr></table></td>
                </tr>
                @endforeach
                    <tr>
                    <td  colspan = '4' style="text-align: right; font-weight: bold">Total Pharamcy</td>
                    <td style="font-weight: bold">{{ $i }}</td>
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