@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#333;color:white;">Update Employee</div>

                <div class="card-body">
                <form method="post" action="{{url('/user')}}/{{$data->id}}">
                      @csrf
                      {{method_field('PUT')}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$data->name}}" required autocomplete="" autofocus>


                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{$data->email}}" required autocomplete="" autofocus>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __(' User Role') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="user_role" name="user_role">
                                    <option value="">Select User Role</option>
                                    <option <?php if($data->user_role == 1){ echo 'selected'; } ?> value="1">Super Admin</option>
                                    <option <?php if($data->user_role == 2){ echo 'selected'; } ?> value="2">Editor</option>
                                </select>
                            </div>
                        </div>
                        

 


                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Contact No.') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="contact" value="{{$data->contact}}" required autocomplete="" autofocus>

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




});
</script>

@endsection