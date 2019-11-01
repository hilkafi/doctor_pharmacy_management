@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-2">
      

        
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#007ACC;color:white;">Add Doctor</div>

                <div class="card-body">
                <form method="post" action="{{url('/doctor')}}">
                      @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="doc_name" value="" required autocomplete="" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Designation') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('name') is-invalid @enderror" name="designation" value="" required autocomplete="" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Expertise') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('name') is-invalid @enderror" name="expertise" value="" required autocomplete="" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Degree') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" value="" required autocomplete="" autofocus>
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

    



});
</script>

@endsection