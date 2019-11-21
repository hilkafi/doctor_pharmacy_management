<div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active">
                <th>Sl.</th>
                <th>Name</th>
                <th>Region</th>
                <th>Area</th>
                <th>Teritory</th>


                <th>Market</th>
                <th>Doctor Covered</th>
                <th>C. Pharmacy</th>
                <th style="width: 15%; text-align: center;">action</th>
                </tr>
                <?php $i = 0;
                ?>




                @foreach($dataset as $data) 
                <?php $i++;?>
                <?php
                $fdata= $data->doctor_percentage($data->id);


                ?>

                <tr>
                <td>{{$i}}</td>
                <td>{{$data->name}}</td>
                <td>{{$region->region_name($data->region_id)}}</td>
                <td>{{$region->district_name($data->area_id)}}</td>
                <td>{{$region->area_name($data->teritory_id)}}</td>

                <td>{{$region->market_name($data->market_id)}}</td>
                <td>{{ $fdata[2] }}</td>
                <td>{{$data->pharmacy_covered($data->id)}}</td>
                 <td style="width: 15%; text-align: center;"> <a href='hospital/{{$data->_key}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     <a href='hospital/{{$data->_key}}/details' class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>

                     <a href="{{url('/hospital/view_pharmacy')}}/{{$data->id}}" class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true">PH</i></a>
                     
                    <a href="{{url('/institute/delete')}}/{{$data->id}}" onclick="return confirm('Data will be deleted permanently.Are you sure about delete?')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>   
                </td>
                </tr>
                @endforeach
              
                </table>
                <?php echo $dataset->render(); ?>
                </div>