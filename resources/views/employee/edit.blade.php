@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-2">
      

        
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#007ACC;color:white;">Update Employee</div>

                <div class="card-body">
                <form method="post" action="{{url('/employee')}}/{{$data->id}}">
                      @csrf
                      {{method_field('PUT')}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="emp_name" value="{{$data->name}}" required autocomplete="" autofocus>


                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Designation') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="designation" value="{{$employee->designation}}" required autocomplete="" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                      

                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{$data->email}}" required autocomplete="" autofocus>
                            </div>

                            </div>
  
                        

 


                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contact No.') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{$data->phone}}" required autocomplete="" autofocus>

                            </div>
                        </div>


                       


                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id ="region" name ="region_id" required>
                            <option value="">Select Region</option>
                            @foreach($dataset as $data_one)
                            <option value="{{$data_one->id}}"<?php if($data_one->id == $data->region_id){echo "selected";} ?>>{{$data_one->name}}</option>
                           @endforeach
                            </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="district" name ="district_id" required>
                            <option value="">Select District</option>
                            @foreach($dataset_two as $data_two)
                            <option value="{{$data_two->id}}"<?php if($data_two->id == $data->district_id){echo "selected";} ?>>{{$data_two->name}}</option>
                           @endforeach
                            </select>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Teritory') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="area" name ="area_id" required>
                            <option value="">Select Area</option>
                            @foreach($dataset_three as $data_three)
                            <option value="{{$data_three->id}}"<?php if($data_three->id == $data->area_id){echo "selected";} ?>>{{$data_three->name}}</option>
                           @endforeach
                            </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Address') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="{{$data->address}}" required autocomplete="" autofocus>

                            </div>
                        </div>

                            <div class="form-group row">
                           

                            <div class="col-md-6">
                                <input id="latitude" type="hidden" class="form-control @error('name') is-invalid @enderror"  name="latitude" value="" required autocomplete="" autofocus>
                                 <input id="longitude" type="hidden" class="form-control @error('name') is-invalid @enderror"  name="longitude" value="" required autocomplete="" autofocus>



                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                   
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

    $('#name').click(function(){




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