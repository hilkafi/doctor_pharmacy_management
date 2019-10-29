@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="container">

    <div class="row ">
        <div class="col-md-2">
     

        
        </div>
        <div class="col-md-10">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
  
            <div class="">
                <div  class=""></div><a href='{{url("area/create")}}' class = "btn btn-success">Add</a><br><br>
                <form method="post" class="form-class" id="my_frm">
                @csrf
                <div class="input-group">
                <div class="input-group col-md-4">
                    <select class="form-control" name="region_id">
                        <option value="">Select Region</option>
                        @foreach($regions as $r)
                        <option value="{{$r->id}}">{{$r->name}}</option>
                        @endforeach
                    </select>
                </div>
                    <div class="input-group md-form form-sm form-2 pl-0 col-md-4">
                        <input class="form-control my-0 py-1 red-border" name="search" type="text" placeholder="Search" aria-label="Search">
                        <div class="input-group-append" style="cursor: pointer">
                            <span class="input-group-text red lighten-3" id="srch">Search</span>
                        </div>
                    </div>
                </div>
                </form>
                <div id="ajax_content">
                <div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active">
                <th>Sl.</th>
                <th>Name</th>
                <th>Region</th>
                <th>action</th>
                </tr>
                <?php $i = 0;
                ?>


                @foreach($dataset as $data) 
                <?php $i++;?>

                <tr>
                <td>{{$i}}</td>
                <td>{{$data->name}}</td>
                <td>{{$region->region_name($data->region_id)}}</td>
                <td><table><tr><td> <a href='district/{{$data->_key}}/edit' class="btn btn-warning">E</a><br><br></td>
                
               <td> <form action="{{ route('area.destroy', $data->id) }}" method="POST">
                    @method('DELETE')
                     @csrf
                    <button class="btn btn-danger">D</button>
                    </form></td></tr></table></td>
                </tr>
                @endforeach
              
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

$('#srch').click(function(){

var _form = $('#my_frm');
var _url = "{{URL::to('district/search')}}";
$.ajax({
    url: _url,
    method:"POST",
    data: _form.serialize(),
    success: function(result)
    {
    $('#ajax_content').html(result);
    },
    error: function(xhr, error){
        alert('There is something wrong. Try again');
    }
    

});
});
});
</script>
@endsection