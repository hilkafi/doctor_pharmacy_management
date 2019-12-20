                <div class="table-responsive">
                <table class ="table table-bordered table-sm" style="font-size: 15px;">
                <tr class ="table-active bg-info">
                <th>Sl.</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Region</th>
                <th style="text-align: center;">District</th>
                <th style="text-align: center;">Area</th>
                <th style="text-align: center;">Market</th>
                <th style="text-align: center;">Covered</th>
                <th style="width: 15%; text-align: center;">Actions</th>
                </tr>
                <?php $i = 0;
                ?>


                @foreach($dataset as $data) 
                <?php $i++;?>

                <tr>
                <td>{{$i}}</td>
                <td>{{$data->name}}</td>
                <td>{{$region->region_name($data->region_id)}}</td>
                <td>{{$region->district_name($data->district_id)}}</td>
                <td>{{$region->area_name($data->area_id)}}</td>
                <td>{{$region->market_name($data->market_id)}}</td>
                <td>{{ $data->is_covered }}</td>
                <td style="width: 15%; text-align: center;">
                 <a href='dispensary/{{$data->_key}}/edit' class="btn btn-outline-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                 <a href="dispensary/{{$data->_key}}/visit"><button class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                <a href="{{url('/dispensary/delete')}}/{{$data->id}}" onclick="return confirm('Data will be deleted permanently.Are you sure about delete?')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> 

                </td>
                </tr>
                @endforeach
                    <tr>
                    <td  colspan = '4' style="text-align: right; font-weight: bold">Total Pharamcy</td>
                    <td style="font-weight: bold">{{ $i }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
              
                </table>
                <?php echo $dataset->render(); ?>
                </div>