@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#007ACC;color:white;">Update Hospital</div>

                <div class="card-body">
                <form enctype="multipart/form-data" method="post" action="{{url('/hospital')}}/{{$data->id}}">
                      @csrf
                {{method_field('PUT')}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}" required autocomplete="" autofocus>

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
                            @foreach($dataset as $data_one)
                            <option value="{{$data_one->id}}"<?php if($data_one->id == $data->region_id){echo "selected";} ?>>{{$data_one->name}}</option>
                           @endforeach
                            </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="district" name ="area_id" required>
                            <option value="{{$data->area_id}}">{{$region->district_name($data->area_id)}}</option>
                 
                            </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Teritory') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id ="area" name ="teritory_id" required>
                            <option value="{{$data->teritory_id}}">{{$region->area_name($data->teritory_id)}}</option>
                            </select>

                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Market') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="market" name ="market_id" required>
                            <option value="{{$data->market_id}}">{{$region->market_name($data->market_id)}}</option>

                            </select>

                            </div>
                        </div>











                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="type" name ="type">
   
                                        <option value="{{$data->type}}">{{$data->type}}</option>
                                        <option value="hospital">Hospital</option>
                                        <option value="clinic">Clinic</option>
                                        <option value="others">Others</option>

                                    </select>

                                </div>
                             </div>

                                <div id="subtype" class="form-group row" style="">
                                <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Subtype') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="" name ="subtype">
                                        <option value="{{$data->sub_type}}">{{$data->sub_type}}</option>
                                        <option value="public">Public</option>
                                        <option value="private">Private</option>


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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Cover Image') }}</label>

                            <div class="col-md-6">
                                <input id="" type="file" class="form-control @error('name') is-invalid @enderror" name="image" value="{{$data->img_loc}}"  autocomplete="" autofocus>

                               
                            </div>
                        </div



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