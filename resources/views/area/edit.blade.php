@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#007ACC;color:white;">Update Area</div>

                <div class="card-body">
                <form method="post" action="{{url('area')}}/{{$data->id}}">
                      @csrf
                      {{method_field('PUT')}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('District Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="district" value="{{$data->name}}" required autocomplete="" autofocus>

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
                            <select class="form-control" name ="region_id" required>
                            <option value="{{$data->region_id}}">{{$region->region_name($data->region_id)}}</option>
                            @foreach($dataset as $d)
                            <option value="{{$d->id}}" <?php if($d->id == $data->id){echo "selected"; } ?>>{{$d->name}}</option>
                           @endforeach
                            </select>

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
@endsection