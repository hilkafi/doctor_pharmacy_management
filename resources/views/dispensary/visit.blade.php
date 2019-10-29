@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-2">
      

        
        </div>
        <div class="col-md-8">
        @if(session()->has('message'))
        <div class="alert alert-success">
        {{ session()->get('message') }}
        </div>
        @endif 
            <div class="card">
                <div class="card-header" style="background-color:#007ACC;color:white;">Edit Doctor</div>

                <div class="card-body">
                <form method="post" action="{{url('/dispensary/visit')}}/{{$data->id}}">
                      @csrf
                      <table class="table table-bordered tbl_thin">
                          <tr><th>Dispensary Name:</th><td>{{$data->name}}</td></tr>
                          <tr><th>Market:</th><td>{{$region->market_name($data->market_id)}}</td></tr>
                          <input type="hidden" name="dispensary_id" value="{{ $data->id }}">
                          <input type="hidden" name="latitude" id="latitude">
                          <input type="hidden" name="longitude" id="longitude">
                          <tr><td></td><td style="column-span: 2"><button id="visit" type="submit" class="btn btn-primary">Visited</button></td></tr>
                      </table>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

    $('#region').change(function(){

    var region_id = $(this).val();
    var _url = "{{URL::to('area/list_district')}}";
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
    var _url = "{{URL::to('area/list_area')}}";
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
    var _url = "{{URL::to('area/list_market')}}";
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
     $('#visit').hover(function(){




        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
            y.innerHTML = "Geolocation is not supported by this browser.";
        }
        


    });

    function showPosition(position) {
        var lat,long;
        lat =  position.coords.latitude.toString();  
        long =  position.coords.longitude.toString();

        var latitude = lat.slice(0,6);
        var longitude = long.slice(0,6);

        

        $('#latitude').val(latitude);
         $('#longitude').val(longitude);

    }



});
</script>
@endsection