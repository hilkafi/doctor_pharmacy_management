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
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card" style="padding: 0px; margin: 0px; background: #000080; color: #fff">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                    <a href="url('/doctor')" style="color: white;">
                                    <p style="font-size: 150px; text-align: center;"><i class="fa fa-user-md" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        <h3>Total Doctor: <i>{{$doctor}}</i></h3></a>
                                        <h4>Covered: {{$cov_doc}}</h4>
                                        <h4>Percentage: {{$doc_per}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="padding: 0px; margin: 0px; background: #00ccff; color: #fff">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                    <a href="url('/dispensary')" style="color: white;">
                                    <p style="font-size: 150px; text-align: center;"><i class="fa fa-medkit" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        
                                        <h3>Total Pharmacy: <i>{{$pharmacy}}</i></h3></a>
                                        <h4>Covered: {{$cov_phar}}</h4>
                                        <h4>Percentage:{{$percentage}}</h4>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="padding: 0px; margin: 0px; background: #339933; color: #fff">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                    <a href="{{url('/region')}}" style="color: white;">
                                    <p style="font-size: 150px; text-align: center;"><i class="fa fa-briefcase" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        <h1>Total Region: <i>{{$region}}</i></h3><br><br>

                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card" style="padding: 0px; margin: 0px; background: #000080; color: #fff"><a href="{{url('/area')}}">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                   <a  href="{{url('/area')}}" style="color:white;"> <p style="font-size: 150px; text-align: center;"><i class="fa fa-briefcase" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        <h3>Total Area: <i>{{$area}}</i></h3>
                                      
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="padding: 0px; margin: 0px; background: #00ccff; color: #fff">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                    <p style="font-size: 150px; text-align: center;"><a  href="{{url('/teritory')}}" style="color:white;"><i class="fa fa-briefcase" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        
                                        <h3>Total Teritory: <i>{{$teritory}}</i></h3>

                                    </a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card" style="padding: 0px; margin: 0px; background: #339933; color: #fff">
                                <div class="card-body" style="padding: 0px; margin: 0px; text-align: center;">
                                    <p style="font-size: 150px; text-align: center;"><a  href="{{url('/market')}}" style="color:white;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></p>
                                    <div class="b-body" style="margin-top: -50px;">
                                        <h3>Total Market: <i>{{$market}}</i></h3>

                                    </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
               
               
                  
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
