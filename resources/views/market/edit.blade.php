@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-2">
       

        
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#007ACC;color:white;">Update Area</div>

                <div class="card-body">
                <form method="post" action="{{url('market')}}/{{$data->id}}">
                      @csrf
                      {{method_field('PUT')}}

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Market Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="market" value="{{$data->name}}" required autocomplete="" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="area_id" class="col-md-4 col-form-label text-md-right">{{ __('Area') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" name ="area_id" required>
                            <option value="">Select Area</option>
                            @foreach($dataset_three as $d_three)
                            <option value="{{$d_three->id}}" <?php if($d_three->id == $data->id){echo "selected"; } ?>>{{$d_three ->name}}</option>
                           @endforeach
                            </select>

                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" name ="district_id" required>
                            <option value="">Select District</option>
                            @foreach($dataset_two as $d_two)
                            <option value="{{$d_two->id}}" <?php if($d_two->id == $data->id){echo "selected"; } ?>>{{$d_two->name}}</option>
                           @endforeach
                            </select>

                            </div>
                        </div>







                        <div class="form-group row">
                            <label for="region_id" class="col-md-4 col-form-label text-md-right">{{ __('Region') }}</label>

                            <div class="col-md-6">
                            <select class="form-control" name ="region_id" required>
                            <option value="">Select Region</option>
                            @foreach($dataset as $d)
                            <option value="{{$d->id}}" <?php if($d->id == $data->id){echo "selected"; } ?>>{{$d->name}}</option>
                           @endforeach
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
@endsection