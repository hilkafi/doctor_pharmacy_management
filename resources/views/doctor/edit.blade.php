@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-2">
      

        
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#007ACC;color:white;">Edit Doctor</div>

                <div class="card-body">
                <form method="post" action="{{url('/doctor')}}/{{$data->id}}">
                      @csrf
                      {{method_field('PUT')}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="doc_name" value="{{$data->name}}" autocomplete="" autofocus>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Designation') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="designation" value="{{$data->designation}}"  autocomplete="" autofocus>

                
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Expertise') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="expertise" value="{{$data->expertise}}"  autocomplete="" autofocus>

                     
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Degree') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="{{$data->degree}}" required >
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Department') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{$data->department}}" autocomplete="" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Institute') }}</label>

                            <div class="col-md-6">
                                <input type="text" value="{{$data->institute}}" name="institute" class="form-control" id="institute">
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control @error('name') is-invalid @enderror" name="contact" value="{{$data->contact}}"  autocomplete="" autofocus>

                     
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Mail') }}</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control @error('name') is-invalid @enderror" name="mail" value="{{$data->mail}}"  autocomplete="" autofocus>

                     
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Mailing Address') }}</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="{{$data->address}}"  autocomplete="" autofocus>

                     
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Qualified ') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" value="{{$data->is_qualified}}" name="is_qualified" id="is_qualified">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Multiple Chamber') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" value="{{$data->mul_chamber}}" name="mul_chamber" id="mul_chamber">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>
                   

                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Is Covered') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" value="{{$data->is_covered}}" name="is_covered" id="is_covered">
                                    <option value="Covered">Covered</option>
                                    <option value="Not Covered">No</option>
                                </select>
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