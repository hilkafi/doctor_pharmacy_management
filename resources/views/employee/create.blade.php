@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-2">
      

        
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#007ACC;color:white;">Add Employee</div>

                <div class="card-body">
                <form method="post" action="{{url('/employee')}}">
                      @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="emp_name" value="" required autocomplete="" autofocus>


                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Designation') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="designation" value="" required autocomplete="" autofocus>

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
                                <input id="name" type="email" class="form-control @error('name') is-invalid @enderror" name="email" value="" required autocomplete="" autofocus>
                            </div>

                            </div>
                            <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contact No.') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="" required autocomplete="" autofocus>

                            </div>
                        </div>


                       


                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id ="region" name ="region_id" required>
                            <option value="">Select Region</option>
                            @foreach($dataset as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                           @endforeach
                            </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="district" name ="district_id" >
                            <option value="">Select District</option>
                            </select>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="area" name ="area_id" >
                            <option value="">Select Area</option>
                            </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Address') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="" required autocomplete="" autofocus>

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
                                    {{ __('Add') }}
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