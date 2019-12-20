@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin-bottom: 15px;">
      <div class="card-body" style="padding: 10px; text-align: center;"><h4>User List<h4></div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
  
            <div class="row" style="margin-bottom: 20px">
                <div class="col-md-10">



                <div class="">
                    <a href='{{url("user/create")}}' class = "btn btn-outline-success">Add</a>
                </div>
            </div>
                <div class="col-md-12" id ="ajax_content">

                <div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active bg-info">
                    <th>Sl.</th>
                    <th>User Name</th>
                    <th class="text-center" >Email</th>
                    <th>Contact</th>
                    <th>User Role</th>
                    <th class="text-center">Actions</th>
                </tr>
                <?php $i = 0;
                ?>


                @foreach($dataset as $data) 
                <?php $i++;?>

                <tr>
                <td>{{$i}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->contact}}</td>
                <td>
                    <?php 
                        if($data->user_role == 1){
                            echo 'Super Admin';
                        }else {
                            echo 'Editor';
                        }

                    ?>
                </td>
                 <td style="width: 20%; text-align: center;"> <a href='user/{{$data->_key}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     <a href='user/{{$data->_key}}' class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                </td>
                </tr>
                @endforeach
                    
                </tr>
                <table>
                <?php echo $dataset->render(); ?>
                </div>

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