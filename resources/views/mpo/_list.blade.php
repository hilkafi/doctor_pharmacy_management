<div class="table-responsive">
    <table class ="table table-bordered">
    <tr class ="table-active">
        <th>Sl.</th>
        <th>Name</th>
        <th>Designation</th>
        <th>Region</th>
        <th>District</th>
        <th>Area</th>
        <th>action</th>
    </tr>
    <?php $i = 0;
    ?>


    @foreach($dataset as $data) 
    <?php $i++;
        if($data->designation ==1) $designation = "RSM";
        else if($data->designation ==2) $designation = "AM";
        else if($data->designation ==3) $designation = "MPO";

        else{
            $designation = null;
        }


    ?>

    <tr>
    <td>{{$i}}</td>
    <td>{{$data->name}}</td>
    <td>{{$designation}}</td>
    <td>{{$district->region_name($data->region_id)}}</td>
    <td>{{$district->district_name($data->district_id)}}</td>
    <td>{{$district->area_name($data->area_id)}}</td>
     <td style="width: 20%; text-align: center;"> <a href='employee/{{$data->_key}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
         <a href='employee/{{$data->_key}}' class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
    </td>
    </tr>
    @endforeach
        
    </tr>
    <table>
    <?php echo $dataset->render(); ?>
</div>