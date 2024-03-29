@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#ddd;color:black;"><b>Edit Chamber of DR. {{$data->name}}</b></div>

                <div class="card-body">
                <form method="post" action="{{url('/chamber/chamedit')}}/{{$chamber->id}}">
                      @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' ') }}</label>

                            <div class="col-md-6">
                                <input id="" type="hidden" class="form-control @error('name') is-invalid @enderror" name="doctor_id" value="{{$data->id}}" required autocomplete="" autofocus>

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
                            <select class="form-control" id="region" name ="region_id" required>
                            <option value="{{$chamber->region_id}}">{{$district->region_name($chamber->region_id)}}</option>
                            @foreach($dataset as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                           @endforeach
                            </select>

                            </div>
                            </div>

                            <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="district" name ="area_id" required>
                            <option value="{{$chamber->area_id}}">{{$district->district_name($chamber->area_id)}}</option>
                           
                            </select>

                            </div>
                            </div>
                      
                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Teritory') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="area" name ="teritory_id" required>
                            <option value="{{$chamber->teritory_id}}">{{$district->area_name($chamber->teritory_id)}}</option>
                           
                            </select>

                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Market') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="market" name ="market_id" required>
                            <option value="{{$chamber->market_id}}">{{$district->market_name($chamber->market_id)}}</option>
                           
                            </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Consulting_Center') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="consulting_center" name ="consulting_center_id" >
                            <option value="{{$chamber->consulting_center_id}}">{{$district->cc_name($chamber->consulting_center_id)}}</option>
                           
                            </select>

                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Hospital') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="hospital" name ="hospital_id" >
                            <option value="{{$chamber->hospital_id}}">{{$district->hospital_name($chamber->hospital_id)}}</option>
                           
                            </select>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Address') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="{{$chamber->address}}" required autocomplete="" autofocus>

                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="contact" value="{{$chamber->contact}}" required autocomplete="" autofocus>

                            </div>
                        </div>


                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Visiting Hour') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="visiting_hour" value="{{$chamber->visiting_hour}}" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fee') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="fee" value="{{$chamber->fee}}" >

                            </div>
                        </div>


                  

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
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