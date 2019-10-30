                <div class="table-responsive">
                <table class ="table table-bordered">
                <tr class ="table-active">
                <th>Sl.</th>
                <th>Name</th>
                <th>Region</th>
                <th>Area</th>
                <th>Teritory</th>
                <th>Market</th>
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
                <td>{{$region->district_name($data->area_id)}}</td>
                <td>{{$region->area_name($data->teritory_id)}}</td>
                <td>{{$region->market_name($data->market_id)}}</td>
                <td><table><tr><td> <a href='hospital/{{$data->_key}}/edit' class="btn btn-warning">E</a><br><br></td>
                
               <td> <form action="{{ route('hospital.destroy', $data->id) }}" method="POST">
                    @method('DELETE')
                     @csrf
                    <button class="btn btn-danger">D</button>
                    </form></td>
  

                </tr></table></td>
                </tr>
                @endforeach
              
                </table>
                <?php echo $dataset->render(); ?>
                </div>