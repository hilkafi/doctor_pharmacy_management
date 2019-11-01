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
                <div class="card-header" style="background-color:#007ACC;color:white;">Doctor Details</div>

                <div class="card-body">

                      <table class="table table-bordered tbl_thin">
                          <tr><th>Doctor Name:</th><td>{{$data->name}}</td></tr>
                          <tr><th>Designation:</th><td>{{$data->designation}}</td></tr>
                          <tr><th>Speciality:</th><td>{{$data->expertise}}</td></tr>
                          <tr><th>Degree:</th><td>{{$data->degree}}</td></tr>
                          <tr><th>Department:</th><td>{{$data->department}}</td></tr>
                          <tr><th>Qualified:</th><td>{{$data->expertise}}</td></tr>
                          <tr><th>Is Covered:</th><td>{{$data->is_covered}}</td></tr>
                      </table>
                      
                </div>
                <div class="card-body">
                    <h4>Chamber</h4>
                    <table class="table table-bordered tbl_thin">
                        <tr>
                            <th>Region</th>
                            <th>Area</th>
                            <th>teritory</th>
                            <th>Market</th>
                            <th>visiting Hour</th>
                            <th>Fee</th>
                        </tr>
                        @foreach($chambers as $chamber)
                        <tr>
                            <td>{{ $data->region_name($chamber->region_id) }}</td>
                            <td>{{ $data->district_name($chamber->area_id) }}</td>
                            <td>{{ $data->area_name($chamber->teritory_id) }}</td>
                            <td>{{ $data->market_name($chamber->market_id) }}</td>
                            <td>{{ $chamber->visiting_hour }}</td>
                            <td>{{ $chamber->fee }}</td>
                        </tr>
                        @endforeach
                    </table>
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