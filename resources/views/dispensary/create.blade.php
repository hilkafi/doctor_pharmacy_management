@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background-color:#333;color:white;">Add Dispensary</div>

                <div class="card-body">
                <form enctype="multipart/form-data" method="post" action="{{url('/dispensary')}}">
                      @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="owner" class="col-md-4 col-form-label text-md-right">{{ __(' Owner') }}</label>

                            <div class="col-md-6">
                                <input id="owner" type="text" class="form-control @error('owner') is-invalid @enderror" name="owner" value="" required autocomplete="" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="owner" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input id="owner" type="text" class="form-control @error('owner') is-invalid @enderror" name="contact" value="" required autocomplete="" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="owner" class="col-md-4 col-form-label text-md-right">{{ __('Mail') }}</label>

                            <div class="col-md-6">
                                <input id="owner" type="text" class="form-control @error('owner') is-invalid @enderror" name="mail" value="" autocomplete="" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                            <select class="form-control" id="district" name ="district_id" required>
                            <option value="">Select District</option>
                 
                            </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id ="area" name ="area_id" required>
                            <option value="">Select District</option>
                     
                            </select>

                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Market') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="market" name ="market_id" required>
                            <option value="">Select Market</option>
                            @foreach($dataset_four as $data_four)
                            
                            <option value="{{$data_four->id}}">{{$data_four->name}}</option>
                           
                           @endforeach
                            </select>

                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Consulting_Center') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="consulting_center" name ="consulting_center_id" >
                            <option value="">Select Consulting Center</option>
                           
                            </select>

                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Hospital') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="hospital" name ="hospital_id" >
                            <option value="">Select Hospital</option>
                           
                            </select>

                            </div>
                        </div>













                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Address') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="" required autocomplete="" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Is Covered') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="is_covered" id="is_covered">
                                    <option value="Covered">Covered</option>
                                    <option value="Not Covered">No</option>
                                </select>
                            </div>
                        </div>

                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Cover Image') }}</label>

                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control">

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
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
    var _url = "{{URL::to('teritory/list_consulting_center')}}";
    $.ajax({
        url: _url,
        method:"POST",
        data:{ market : market_id, _token : "{{ csrf_token() }}" },
        success: function(result)
        {
        $('#consulting_center').html(result);
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