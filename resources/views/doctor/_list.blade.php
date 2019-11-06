                <div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active">
                <th>Sl.</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Expertise</th>
                <th>Add Chember</th>

                <th>action</th>
                </tr>
                <?php $i = 0;
                ?>


                @foreach($dataset as $data) 
                <?php $i++;?>

                <tr>
                <td>{{$i}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->designation}}</td>
                <td>{{$data->expertise}}</td>
                <td><table><tr>
                    <td><a href="{{url('doctor/chamber')}}/{{$data->doctor_id}}" class="btn btn-success">Add Chamber</a></td>
                </tr></table></td>

                <td><table><tr><td> <a href='doctor/{{$data->doctor_id}}/edit' class="btn btn-warning">E</a><br><br></td>
                
               <td> <form action="{{ route('doctor.destroy', $data->doctor_id) }}" method="POST">
                    @method('DELETE')
                     @csrf
                    <button class="btn btn-danger">D</button>
                    </form></td>
                    <td><a href="doctor/{{$data->doctor_id}}"><button class="btn btn-success">V</button></a></td>
                </tr></table></td>
                </tr>
                @endforeach
                <tr>
                    <td  colspan = '4' style="text-align: right; font-weight: bold">Total Doctors</td>
                    <td style="font-weight: bold">{{ $i }}</td>
                    <td></td>
                </tr>
                <table>
                <?php echo $dataset->render(); ?>
                </div>