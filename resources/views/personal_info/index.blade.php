@extends('layouts.app')

@section('content')
<div class="container">

  <div class="row justify-content-center">

        <div class="col-md-10">
        @if(session()->has('message'))
        <div class="alert alert-success">
        {{ session()->get('message') }}
        </div>
        @endif 
        <?php
        //$key = $data->id;
       

            if($personal->is_married=='yes'){
                $marrital_status = "Married";
                $better_half = $personal->wife_name;
                $child = $personal->child;
                $marriage_anniversary = $personal->marriage_anniversary;
            }
            else{
                $marrital_status = "Unmarried";
                $better_half = "N/A";
                $child = 'N/A';
                $marriage_anniversary = 'N/A';   

            }
        

        ?>
            <div class="card">
                <div class="card-header" style="background-color:#ddd;color:black;"><b>Personal Details of {{$data->name}}</b>
                   <div  style="text-align: right;"> <a href="{{url('/doctorpersonalinfo')}}/{{$data->id}}/edit" ><i>Edit personal info</i></a> </div>  
                </div>

                <div class="card-body">

                      <table class="table table-bordered">
                        <tr class ="card-header"><h1>Personal Info:</h1></tr>
                          <tr><th>Doctor Name:</th><td>{{$data->name}}</td></tr>
                          <tr><th>Current City:</th><td>{{$personal->current_city}}</td></tr>
                          <tr><th>Home Town:</th><td>{{$personal->home_town}}</td></tr>
                          <tr><th>Date of Birth:</th><td>{{$personal->date_of_birth}}</td></tr>
                      </table>
                     <table class="table table-bordered">
                        <tr class ="card-header"><h1>Familly Info:</h1></tr>
                          <tr><th>Marrital Status:</th><td>{{$marrital_status}}</td></tr>
                          <tr><th>Better Half:</th><td>{{$better_half}}</td></tr>
                          <tr><th>Number of Child:</th><td>{{$child}}</td></tr>
                          <tr><th>Marriage Anniversary:</th><td>{{$marriage_anniversary}}</td></tr>
                    </table>

                    <table class="table table-bordered">
                        <tr class ="card-header"><h1>Academic Info:</h1></tr>
                          <tr><th>Grad. School:</th><td>{{$personal->grad_school}}</td></tr>
                          <tr><th>Class of:</th><td>{{$personal->passing_year}}</td></tr>

                    </table>

                    <table class="table table-bordered">
                        <tr class ="card-header"><h1>Hobbies and Favourites:</h1></tr>
                          <tr><th>Favourite Writer:</th><td>{{$personal->fav_writer}}</td></tr>
                          <tr><th>Favourite Musician:</th><td>{{$personal->fav_musician}}</td></tr>
                          <tr><th>Favourite Brand:</th><td>{{$personal->fav_brand}}</td></tr>
                          <tr><th>Favourite Color:</th><td>{{$personal->fav_color}}</td></tr>
                         <tr><th>Favourite Meal :</th><td>{{$personal->fav_dish}}</td></tr>

                    </table>


                </div>

        </div>
        </div>
    </div>
</div>

<script>

</script>
@endsection