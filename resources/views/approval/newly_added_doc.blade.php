@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card" style="margin-bottom: 15px;">
      <div class="card-body" style="padding: 10px; text-align: center;"><h4>Newly Added Doctor List<h4></div>
    </div>

        <div class="col-md-12">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
  


            <div  class="col-md-2">
                <a href='{{url("doctor/create")}}' class = "btn btn-outline-dark">Add</a>
            </div>
        </div>
        <div id ="ajax_content">

            <div class="table-responsive">
                <table class ="table table-bordered table-sm">
                    <tr class ="table-active bg-warning">
                        <th style="text-align: center">Sl.</th>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Designation</th>
                        <th style="text-align: center">Expertise</th>
                        <th style="text-align: center">Is Covered</th>
                        <th style="width: 5%; text-align: center;">Chember</th>
                        <th style="width: 15%; text-align: center;">action</th>
                    </tr>
                    <?php $i = 0;
                    ?>

                    @foreach($dataset as $data) 
                    <?php $i++;?>

                    <tr>
                        <td style="text-align: center">{{$i}}</td>
                        <td style="">{{$data->name}}</td>
                        <td style="">{{$data->designation}}</td>
                        <td style="">{{$data->expertise}}</td>
                        <td style="text-align: center; width: 15%;">
                        <?php  
                        if($data->is_covered == "Not Covered"){ ?>
                            Not Covered
                            <a href="{{url('doctor/cover')}}/{{$data->id}}" onclick="return confirm('Are you sure!')" class="btn btn-outline-primary">Cover</a>

                        <?php  }elseif($data->is_covered == "Covered"){ ?>
                            Covered
                            <a href="{{url('doctor/uncover')}}/{{$data->id}}" onclick="return confirm('Are you sure!')" class="btn btn-outline-primary">UnCover</a>
                        <?php }else{ ?>
                            N/A
                            <a href="{{url('doctor/cover')}}/{{$data->id}}" onclick="return confirm('Are you sure!')" class="btn btn-outline-primary">Cover</a>
                        <?php } ?>
                        </td>
                        <td style="width: 5%; text-align: center;"><a href="{{url('doctor/chamber')}}/{{$data->id}}" class="btn btn-outline-primary"><i class="fa fa-plus" aria-hidden="true" title="Add Chamber"></i></a></td>

                        <td style="width: 15%; text-align: center;"><a href='{{url('doctor')}}/{{$data->id}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a href="{{url('doctor')}}/{{$data->id}}" class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="{{url('/doctor/delete')}}/{{$data->id}}" onclick="return confirm('Are you Sure? Data will be deleted permanently')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td  colspan = '4' style="text-align: right; font-weight: bold">Total Doctors</td>
                        <td style="font-weight: bold">{{ $i }}</td>
                        <td></td>
                        <td></td>
                    </tr>
              
                <table>
                </div>

                </div>
    </div>
</div>
<script>
$(document).ready(function(){



});
</script>
@endsection