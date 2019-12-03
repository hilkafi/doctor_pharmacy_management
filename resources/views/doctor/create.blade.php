@extends('layouts.app')

@section('content')
<div class="container-fluid">
 <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#333;color:white;">Add Doctor</div>

                <div class="card-body">
                <form enctype="multipart/form-data" method="post" action="{{url('/doctor')}}">
                      @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="doc_name" value="" required autocomplete="" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Degree') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="" required autocomplete="" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Designation') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('name') is-invalid @enderror" name="designation" value="" required autocomplete="" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Especiality') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('name') is-invalid @enderror" name="expertise" value="" required autocomplete="" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Mailing Address') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="address" class="form-control" id="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Department') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="" required autocomplete="" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Institute') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="institute" class="form-control" id="institute">
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="Contact" class="form-control" id="">
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Mail') }}</label>

                            <div class="col-md-6">
                                <input type="email" name="mail" class="form-control" id="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Qualified ') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="is_qualified" id="is_qualified">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Multiple Chamber') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="mul_chamber" id="mul_chamber">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Profile Picture') }}</label>

                            <div class="col-md-6">
                               <input type="file" name="pro_pic" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Visiting Card') }}</label>

                            <div class="col-md-6">
                               <input type="file" name="visiting_card" class="form-control">
                            </div>
                        </div>

                        <h3 class="bg-info text-center" style="padding: 5px; margin-top: 10px; margin-bottom: 10px;">Chamber Information</h3>
                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="region" name ="region_id" required>
                            <option value="">Select Region</option>
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
                            <option value="">Select Area</option>
                           
                            </select>

                            </div>
                            </div>
                      
                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Teritory') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="area" name ="teritory_id" required>
                            <option value="">Select Teritory</option>
                           
                            </select>

                            </div>
                        </div>


                        
                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Market') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" id="market" name ="market_id" required>
                            <option value="">Select Market</option>
                           
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

                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="contact" value="" required autocomplete="" autofocus>

                            </div>
                        </div>


                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Visiting Hour') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="visiting_hour" value="" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Fee') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="fee" value="" >

                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
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

    



});
</script>

@endsection