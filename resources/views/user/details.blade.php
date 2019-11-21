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
    <div class="card" style="margin-bottom: 15px;">
      <div class="card-body" style="padding: 10px; text-align: center;"><h4>{{$user->name}} Details<h4></div>
    </div>

                 <div class="table-responsive">  

            
               <table class="table table-bordered">
                <tr>
                    <th>Name</th><td>{{$user->name}} </td>
                 </tr>
                <tr>
                <tr>
                    <th>Email</th><td>{{$user->email}} </td>
                 </tr>
              
              
               </table>
           </div>
  
            

    </div>
</div>
</div>
<script type="text/javascript">
    
</script>

@endsection