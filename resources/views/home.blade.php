@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(session()->has('message'))
        <div class="alert alert-success">
        {{ session()->get('message') }}
        </div>
        @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($user_role == 0 || $user_role == 1)
                    <div class="row justify-content-center">                        
                        <div class="col-md-4">
                            <div class="card" style="border-radius: 25px; padding: 0px; margin: 0px; background: #5757f7; color: #fff">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                    <a href="{{url('/doctor')}}" style="color: white;">
                                    <p style="font-size: 150px; text-align: center;"><i class="fa fa-user-md" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        <h3>Total Doctor: <i>{{$doctor}}</i></h3></a>
                                        <h4>Covered: {{$cov_doc}}</h4>
                                        <h4>Percentage: {{$doc_per}}</h4>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                        </div>
                        <div class="col-md-4">
                            <div class="card" style=" border-radius: 25px; padding: 0px; margin: 0px; background: #e85beb; color: #fff">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                    <a href="{{url('/dispensary')}}" style="color: white;">
                                    <p style="font-size: 150px; text-align: center;"><i class="fa fa-medkit" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        
                                        <h3>Total Pharmacy: <i>{{$pharmacy}}</i></h3></a>
                                        <h4>Covered: {{$cov_phar}}</h4>
                                        <h4>Percentage:{{$percentage}}</h4>
                                    </div>
                                    
                                </div>
                            </div>
                            &nbsp;
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="border-radius: 25px; padding: 0px; margin: 0px; background: #339933; color: #fff">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                    <a href="{{url('/hospital')}}" style="color: white;">
                                    <p style="font-size: 150px; text-align: center;"><i class="fa fa-medkit" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        <h3><a href = "{{url('/hospital')}}" style="color: white;" >Total Institute: <i>{{$hospital}}</i></a></h3>
                                        <h3><a href = "{{url('/consulting_center')}}" style="color: white;" >Total Consulting Center: <i>{{$con_cen}}</i></h3><br>

                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card" style="border-radius: 25px; padding: 0px; margin: 0px; background: #f23f3f; color: #fff"><a href="{{url('/region')}}">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                   <a  href="{{url('/region')}}" style="color:white;"> <p style="font-size: 150px; text-align: center;"><i class="fa fa-briefcase" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        <h3>Total Region: <i>{{$region}}</i></h3>
                                          <h3>Total RSM: <i>{{$region}}</i></h3><br>
                                      
                                    </a>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                        </div>
                    
                        <div class="col-md-4">
                            <div class="card" style="border-radius: 25px; padding: 0px; margin: 0px; background: #00ccff; color: #fff">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                    <p style="font-size: 150px; text-align: center;"><a  href="{{url('/area')}}" style="color:white;"><i class="fa fa-briefcase" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        
                                        <h3>Total Area: <i>{{$area}}</i></h3>
                                          <h3>Total AM: <i>{{$area}}</i></h3><br>

                                    </a></div>
                                </div>
                            </div>
                            &nbsp;
                        </div>
                       
                  
                        <div class="col-md-4">
                            <div class="card" style="border-radius: 25px; padding: 0px; margin: 0px; background: #eba834; color: #fff">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                    <p style="font-size: 150px; text-align: center;"><a  href="{{url('/teritory')}}" style="color:white;"><i class="fa fa-briefcase" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        <h3>Total Teritory: <i>{{$teritory}}</i></h3>
                                        <h3>Total MP0: <i>{{$teritory}}</i></h3><br>


                                    </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                        <div class="row ">
                        <div class="col-md-4">
                            <div class="card" style="border-radius: 25px; padding: 0px; margin: 0px; background: #34eb92; color: #fff">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                    <a href="{{url('/market')}}" style="color: white;">
                                    <p style="font-size: 150px; text-align: center;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        <h3>Total Market: <i>{{$market}}</i></h3></a><br><br>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
             
                    @if($user_role == 2)
                    <br><br>

                        <div class="row">
                            <h3>Welcome To Pharmasia <span style="color: blue;">{{ $user_name }}</span></h3>
                        </div>
                    @endif
               
               
                  
                </div>
            </div>





<script type="text/javascript">
    //pie

    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
    type: 'pie',
    data: {
    labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
    datasets: [{
    data: [300, 50, 100, 40, 120],
    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
    }]
    },
    options: {
    responsive: true
    }
    });
</script>
@endsection
