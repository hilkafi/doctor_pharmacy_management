<div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active bg-info">
                <th>Sl.</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Region</th>
                <th style="text-align: center;">Total Doctor</th>
                <th style="text-align: center;">Covered Doctor</th>
                <th style="text-align: center;">Doctor Covered</th>
               
                <th style="text-align: center;">Total Pharmacy</th>
                <th style="text-align: center;">Covered Pharmacy</th>
                <th style="text-align: center;">Pharmacy Covered</th>
                <th style="text-align: center;">action</th>
                </tr>
                <?php $i = 0;
                ?>


                @foreach($dataset as $data) 
                <?php $i++;?>

                <tr>
                <td>{{$i}}</td>
                <td style="text-align: center;">{{$data->name}}</td>
                <td style="text-align: center;">{{$region->region_name($data->region_id)}}</td>
                <?php
                    $fdata = $data->doctor_percentage($data->id);
                    $pdata = $data->pharmacy_covered($data->id);

                ?>
                @foreach($fdata as $key => $d)

                <td style="text-align: center;">{{ $d}}</td>
                @endforeach
                @foreach($pdata as $key => $d)

                <td style="text-align: center;">{{ $d}}</td>
                @endforeach
                <td style="width: 20%; text-align: center;"> <a href='area/{{$data->_key}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     <a title="doctor" href='area/{{$data->_key}}/details' class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>

                    <a href="{{url('/area/delete')}}/{{$data->id}}" onclick="return confirm('Data will be deleted permanently.Are you sure about delete?')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> 
                </td>

                </tr>
                @endforeach
              
                </table>
                <?php echo $dataset->render(); ?>

                </div>