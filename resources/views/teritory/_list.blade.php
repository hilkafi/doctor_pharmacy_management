<div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active bg-info">
                <th>Sl.</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Region</th>
                <th style="text-align: center;">Area</th>
                <th style="text-align: center;">Total Doctor</th>
                <th style="text-align: center;">Doctor Covered</th>
                <th style="text-align: center;">Total Pharmacy</th>
                <th style="text-align: center;">Pharmacy Covered</th>
                <th style="width: 20%; text-align: center;">Actions</th>
                </tr>
                <?php $i = 0;
                ?>


                @foreach($dataset as $data) 
                <?php $i++;?>

                <tr>
                <td>{{$i}}</td>
                <td style="text-align: center;">{{$data->name}}</td>
                <td style="text-align: center;">{{$region->region_name($data->region_id)}}</td>
                <td style="text-align: center;">{{$region->district_name($data->district_id)}}</td>
                 <?php
                    $fdata = $data->doctor_percentage($data->id);
                    $pdata = $data->pharmacy_covered($data->id);

                ?>
                <td style="text-align: center;">{{ $fdata[0]}}</td>
                <td style="text-align: center;">{{ $fdata[2]}}</td>
                <td style="text-align: center;">{{ $pdata[0]}}</td>
                <td style="text-align: center;">{{ $pdata[2]}}</td>
                <td style="width: 20%; text-align: center;"> <a href='teritory/{{$data->_key}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                     <a title="doctor" href='teritory/{{$data->_key}}/details' class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>
                     <a href="{{url('/teritory/delete')}}/{{$data->id}}" onclick="return confirm('Data will be deleted permanently.Are you sure about delete?')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> 
                </td>
                </tr>
                @endforeach
              
                <table>
                <?php echo $dataset->render(); ?>
                </div>