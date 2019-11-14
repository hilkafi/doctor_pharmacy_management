@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background-color:#5bcfa2;color:white;">Update Employee</div>

                <div class="card-body">
                <form method="post" action="{{url('employee')}}/{{$datas->_key}}">
                      @csrf
                       {{method_field('PUT')}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$datas->name}}" required autocomplete="" autofocus>


                            </div>
                            </div>


                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Designation') }}</label>

                            <div class="col-md-6">
                                <?php
                                    if($datas->designation==1) $designation = "RSM";
                                    elseif($datas->designation==2) $designation = "AM";
                                    elseif($datas->designation== 3) $designation = "MPO";
                                    else $designation = null;


                                ?>
                                <select class="form-control" id="user_role" name="designation">
                                    <option value="{{$datas->designation}}">{{$designation}}</option>
                                    <option value="1">RSM</option>
                                    <option value="2">AM</option>
                                    <option value="3">MPO</option>
                                </select>
                            </div>
                        </div>


                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{$datas->mail}}" required autocomplete="" autofocus>
                            </div>

                            </div>




                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contact No.') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{$datas->phone}}" required autocomplete="" autofocus>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Address') }}</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="{{$datas->address}}"  autocomplete="" autofocus>

                            </div>
                        </div>


                       


                        <div class="form-group row" id = "rgn" style="">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id ="region" name ="region_id" required>
                            <option value="{{$datas->region_id}}">{{$region->region_name($datas->region_id)}}</option>
                            @foreach($dataset as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                           @endforeach
                            </select>

                            </div>
                        </div>

                        <div class="form-group row" id ="dstrct" style="">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="district" name ="district_id" >
                            <option value="{{$datas->district_id}}">{{$region->district_name($datas->district_id)}}</option>
                            </select>

                            </div>
                        </div>


                        <div class="form-group row" id = 'teri' style="">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Teritory') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="area" name ="area_id" >
                            <option value="{{$datas->area_id}}">{{$region->area_name($datas->area_id)}}</option>
                            </select>

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