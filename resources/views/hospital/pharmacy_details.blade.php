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
                <div class="card-header" style="background-color:#007ACC;color:white;">{{$data->name}} Details</div>

                <div class="card-body">
             
                    
                      <table class="table table-bordered tbl_thin">
                        <tr>
                            <?php
                                if($data->img_loc!=null) $img_loc = $data->img_loc;
                                else $img_loc = " not available";

                            ?>
                            <center>
                            <img alt="Cover Image" src = "{{url($img_loc)}}" width="300" height="200">
                            </center>

                        </tr>
                          <tr><th>Dispensary Name:</th><td>{{$data->name}}</td></tr>
                          <?php
                            if($employee== null){
                                $employee_name = "N/A";
                            }

                            else{
                                if($data->is_covered == 'Covered') $employee_name = $employee->name;
                                else $employee_name = null;
                            }





                          ?>
                          <tr><th>MPO Name:</th><td>{{$employee_name}}</td></tr>
                          <tr><th>Market:</th><td>{{$region->market_name($data->market_id)}}</td></tr>
                          <tr><th>Teritory:</th><td>{{$region->area_name($data->area_id)}}</td></tr>
                          <tr><th>Area:</th><td>{{$region->district_name($data->district_id)}}</td></tr>
                          <tr><th>Region:</th><td>{{$region->region_name($data->region_id)}}</td></tr>
                         <tr><th>Contact:</th><td>{{$data->contact}}</td></tr>
                         <tr><th>Mail:</th><td>{{$data->mail}}</td></tr>
                         <tr><th>Address:</th><td>{{$data->address}}</td></tr>
                          <tr><th>Covered:</th><td>{{$data->is_covered}}</td></tr>
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