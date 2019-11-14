@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background-color:#5bcfa2;color:white;">Update Employee</div>

                <div class="card-body">
                <form method="post" action="{{url('/employee/')}}">
                      @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}" required autocomplete="" autofocus>


                            </div>
                            </div>


                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Designation') }}</label>

                            <div class="col-md-6">
                                <?php
                                    if($data->designation==1) $designation = "RSM";
                                    elseif($data->designation==2) $designation = "AM";
                                    elseif($data->designation== 3) $designation = "MPO";
                                    else $designation = null;


                                ?>
                                <select class="form-control" id="user_role" name="designation">
                                    <option value="{{$data->designation}}">{{$designation}}</option>
                                    <option value="1">RSM</option>
                                    <option value="2">AM</option>
                                    <option value="3">MPO</option>
                                </select>
                            </div>
                        </div>


                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{$data->mail}}" required autocomplete="" autofocus>
                            </div>

                            </div>




                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contact No.') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{$data->phone}}" required autocomplete="" autofocus>

                            </div>
                        </div>


                       


                        <div class="form-group row" id = "rgn" style="display: none;">
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

                        <div class="form-group row" id ="dstrct" style="display: none;">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="district" name ="district_id" >
                            <option value="">Select District</option>
                            </select>

                            </div>
                        </div>


                        <div class="form-group row" id = 'teri' style="display: none;">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Teritory') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="area" name ="area_id" >
                            <option value="">Select Area</option>
                            </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Address') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value=""  autocomplete="" autofocus>

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
                                <button type="submit" class="btn btn-outline-dark">
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

        $("#user_role").change(function(){
        if($(this).val() ==1 ){
            $("#rgn").show();
            $("#dstrct").hide();
            $("#teri").hide();
        }   
        else if($(this).val() == 2){
            $("#rgn").show();
            $("#dstrct").show();
            $("#teri").hide();
        }
        else if($(this).val() == 3){
            $("#rgn").show();
            $("#dstrct").show();
            $("#teri").show();
        }



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






});
</script>

@endsection