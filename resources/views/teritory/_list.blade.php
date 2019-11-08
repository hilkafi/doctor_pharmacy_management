                <div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active">
                <th>Sl.</th>
                <th>Name</th>
                <th>Region</th>
                <th>Area</th>
                <th>Total Doctor</th>
                <th>Covered Doctor</th>
                <th>Doctor Covered</th>
               
                <th>Total Pharmacy</th>
                <th>Covered Pharmacy</th>
                <th>Pharmacy Covered</th>
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
                <td>{{$region->district_name($data->district_id)}}</td>
                 <?php
                    $fdata = $data->doctor_percentage($data->id);
                    $pdata = $data->pharmacy_covered($data->id);

                ?>
                @foreach($fdata as $key => $d)

                <td>{{ $d}}</td>
                @endforeach
                @foreach($pdata as $key => $d)

                <td>{{ $d}}</td>
                @endforeach

                <td><table><tr><td> <a href='teritory/{{$data->_key}}/edit' class="btn btn-warning">E</a><br><br></td>
                
               <td> <form action="{{ route('teritory.destroy', $data->id) }}" method="POST">
                    @method('DELETE')
                     @csrf
                    <button class="btn btn-danger">D</button>
                    </form></td>

                   <td> <a href='teritory/{{$data->_key}}/details' class="btn btn-warning">V</a><br><br></td>
                    <td><a href='teritory/{{$data->_key}}/view_pharmacy' class="btn btn-warning">Vph</a><br><br></td>
                </tr></table></td>
                </tr>
                @endforeach
              
                <table>
                <?php echo $dataset->render(); ?>
                </div>