@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row justify-content-center">

        <div class="col-md-10">
        @if(session()->has('message'))
        <div class="alert alert-success">
        {{ session()->get('message') }}
        </div>
        @endif 
            <div class="card">
                <div class="card-header" style="background-color:#ddd;color:black;"><b>Doctor Details</b></div>

                <div class="card-body">

                      <table class="table table-bordered">
                          <tr><th>Doctor Name:</th><td>{{$data->name}}</td></tr>
                          <tr><th>Designation:</th><td>{{$data->designation}}</td></tr>
                          <tr><th>Speciality:</th><td>{{$data->expertise}}</td></tr>
                          <tr><th>Degree:</th><td>{{$data->degree}}</td></tr>
                          <tr><th>Department:</th><td>{{$data->department}}</td></tr>
                          <tr><th>Institute:</th><td>{{ $data->institute }}</td></tr>
                          <tr><th>Contact:</th><td>{{ $data->contact }}</td></tr>
                          <tr><th>Mail:</th><td>{{ $data->mail }}</td></tr>
                          <tr><th>Mailing Address:</th><td>{{ $data->address }}</td></tr>
                          <tr><th>Qualified:</th><td>{{$data->expertise}}</td></tr>
                          <tr><th>Is Covered:</th><td>{{$data->is_covered}}</td></tr>
                      </table>
                      
                </div>
            <div class="card">
                <div class="card-header" style="background-color:#ddd;color:black; text-align: center;"><b>Chambers</b></div>
                <div class="card-body">
                    <table class="table table-bordered tbl_thin">
                        <tr>
                            <th>Region</th>
                            <th>Area</th>
                            <th>teritory</th>
                            <th>MPO</th>
                            <th>Market</th>
                            <th>C Center</th>
                            <th>Hospital</th>
                            <th>Contact</th>
                            <th>visiting Hour</th>
                            <th>Fee</th>
                            <th>Action</th>
                        </tr>
                        @foreach($chambers as $chamber)
                        <tr>
                            <td>{{ $data->region_name($chamber->region_id) }}</td>
                            <td>{{ $data->district_name($chamber->area_id) }}</td>
                            <td>{{ $data->area_name($chamber->teritory_id) }}</td>
                         
                             <td>{{$user->employee_name($chamber->teritory_id)}}</td>
                            <td>{{ $data->market_name($chamber->market_id) }}</td>
                            <td>{{ $data->consalting_center_name($chamber->consulting_center_id) }}</td>
                            <td>{{ $data->hospital_name($chamber->hospital_id) }}</td>
                              <td>{{ $chamber->contact }}</td>
                            <td>{{ $chamber->visiting_hour }}</td>
                            <td>{{ $chamber->fee }}</td>
                            <td><a href="#" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a href="#" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                        @endforeach
                    </table>
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