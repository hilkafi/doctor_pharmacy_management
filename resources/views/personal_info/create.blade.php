@extends('layouts.app')

@section('content')
<div class="container-fluid">
 <div class="row justify-content-center">

        <div class="col-md-8">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                    {{ session()->get('message') }}
                    </div>
                    @endif
            <div class="card">
                <div class="card-header" style="background-color:#5bcfa2;color:white;">Add Personal Info of {{$data->name}}</div>

                <div class="card-body">
                <form method="post" action="{{url('/personalinfo/add')}}">
                      @csrf

                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nick Name') }}</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control @error('name') is-invalid @enderror" name="nick_name" value=""  autocomplete="" autofocus>
                            </div>
                            </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Home Town') }}</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control @error('name') is-invalid @enderror" name="hometown" value=""  autocomplete="" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Current City') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('degree') is-invalid @enderror" name="current_city" value="" autocomplete="" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Date of Birth') }}</label>

                            <div class="col-md-6">
                            <input  type="date" class="form-control @error('name') is-invalid @enderror" name="date_of_birth" value=""  autocomplete="" autofocus>
                            </div>
                        </div><center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <p class="btn btn-outline-primary" id="family">Family Info</p>
                         <p class="btn btn-outline-primary" id="academic">Academic</p>
                          <p class="btn btn-outline-primary" id="favourites">Hobby & Favourites</p>
                          </center>
                       <div id ='display-family' style="display: none;">   
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Marrital Status') }}</label>

                            <div class="col-md-6">
                                <select class="form-control @error('name') is-invalid @enderror" id ='marrital_status' name="is_married"   autocomplete="" autofocus>
                                    <option value="">Select an option</option>
                                    <option value="yes">Married</option>
                                    <option value="no">Unmarried</option>
                                </select>    
                            </div>
                        </div>
                        <div id="display-marrital_status" style="display: none;">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Spouse Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="better_half" class="form-control" id="" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Number of child') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('department') is-invalid @enderror" name="childrens" value="" autocomplete="" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Marriage Anniversary') }}</label>

                            <div class="col-md-6">
                                <input type="date" name="marriage_anniversary" class="form-control" value="" >
                            </div>
                        </div>
                        </div>
                       </div>
                            <div id="display-academic" style="display: none;"> 
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('High School') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="high_school" class="form-control" value="">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Passing Year') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="ssc_year" class="form-control" value="">
                            </div>
                            </div>    
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('College') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="college" class="form-control" value="">
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Passing Year') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="hsc_year" class="form-control" value="">
                            </div>
                            </div>    
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Grad. School') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="grad_school" class="form-control" value="">
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Passing Year') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="passing_year" class="form-control" value="">
                            </div>
                        </div>
                        </div>
                        <div id = 'display-favourites' style="display: none;">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Hobby') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="hobby" value="" > 
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Favourite Writer') }}</label>

                            <div class="col-md-6">
                               <input class="form-control" type="text" name="fav_writer" value=""> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Favourite Musician') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="fav_musician" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Favourite Brand') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="fav_brand" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Favourite Color') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="fav_color" value="">
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Favourite Meal') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="fav_dish" value="">
                            </div>
                        </div>
                    </div>
                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <input class="form-control" type="hidden" name="doc_id" value="{{$data->id}}">
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

    $('#family').click(function(){
    $('#display-family').toggle(
        function(){$("display-family").css({"display": "block"});});
    });

    $('#academic').click(function(){
    $('#display-academic').toggle(
        function(){$("display-academic").css({"display": "block"});});
    });

    $('#favourites').click(function(){
    $('#display-favourites').toggle(
        function(){$("display-favourites").css({"display": "block"});});
    });



    $("#marrital_status").change(function(){
        if($(this).val() != 'yes'){
            $("#display-marrital_status").hide();
        }   
        else{
            $("#display-marrital_status").show();
        }

});



});
</script>

@endsection