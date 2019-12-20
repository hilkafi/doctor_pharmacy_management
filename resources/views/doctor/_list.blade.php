                <div class="table-responsive">
                <table class ="table table-bordered table-sm">
                <tr class ="table-active bg-info">
                <th style="text-align: center">Sl.</th>
                <th style="text-align: center">Name</th>
                <th style="text-align: center">Designation</th>
                <th style="text-align: center">Expertise</th>
                <th style="text-align: center">Is Covered</th>
                <th style="width: 5%; text-align: center;">Chember</th>
                <th style="width: 15%; text-align: center;">Actions</th>
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
                <td style="">{{$data->is_covered}}</td>
                <td style="width: 5%; text-align: center;"><a href="{{url('doctor/chamber')}}/{{$data->id}}" class="btn btn-outline-primary"><i class="fa fa-plus" aria-hidden="true" title="Add Chamber"></i></a></td>

                <td style="width: 15%; text-align: center;"><a href='doctor/{{$data->doctor_id}}/edit' class="btn btn-outline-dark"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="doctor/{{$data->doctor_id}}" class="btn btn-outline-secondary"><i class="fa fa-eye" aria-hidden="true"></i></a>

                    <a href="{{url('/doctor/delete')}}/{{$data->id}}" onclick="return confirm('Data will be deleted permanently.Are you sure about delete?')" class="btn btn-outline-danger"><i class="fa fa-trash" aria-hidden="true"></i></a> 
              
                </td>
                @endforeach
                <tr>
                    <td  colspan = '4' style="text-align: right; font-weight: bold">Total Doctors</td>
                    <td style="font-weight: bold">{{ $i }}</td>
                    <td></td>
                    <td></td>
                </tr>
              
                <table>
                <?php echo $dataset->render(); ?>
                </div>