
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
        @endsection

@section('content')
<div id="overlay" style="width: 100%; opacity: 0.9;"></div>
 <div class="container-fluid dashboard">
        <h2 class="mt-2">Dashboard</h2><hr>
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <b class="text-center">Performance Grading</b>
                        <canvas id="canvas" height="300" width="300"></canvas>
                        @foreach($EmpPerformance as $key => $EP)
                        <p>Rating: {{$EP->average}}%</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card mt-2">
                    <div class="card-header text-white">
                        Leave Balances
                        <a href="{{url('/Employee/modules/leave')}}" class="btn btn-ess btn-sm">View all Leaves</a>
                    </div>
                     <div class="card-body">
                        <div class="container-fluid">
                            <strong>15</strong> <span>Vacation Leave</span><br>
                            <strong>15</strong> <span>Sick Leave</span><br>
                         </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header text-white">
                        Payslips
                        <a href="{{url('/Employee/modules/payslip')}}" class="btn btn-ess btn-sm">View all Payslips</a>
                    </div>
                     <div class="card-body">
                        <div class="container-fluid">
                            There are no payslip available
                         </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-header text-white">
                        Leave Requests
                        <a href="{{url('/Employee/modules/payslip')}}" class="btn btn-ess btn-sm">View leave requests</a>
                    </div>
                     <div class="card-body">
                        <div class="container-fluid">
                            There are no leave requests
                         </div>
                    </div>
                </div>
            </div>
            <!--
            <div class="col-sm-4 col-md-3 col-lg-3">
                <div class="card mt-2">
                    <div class="card-header text-white">
                        Leave Requests Status
                    </div>
                     <div class="card-body">
                     <strong>1</strong> <span>Approved</span><br>
                     <strong>1</strong> <span>Denied</span><br>
                    </div>
                </div>
            </div>  
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card mt-2">
                    <div class="card-header text-white">
                        Leave Requisitions
                    </div>
                     <div class="card-body">
                     <strong>3 Days</strong> <span>Vacation Leave</span><br>
                     <strong>2 Days</strong> <span>Sick Leave</span><br>
                    </div>
                </div>
            </div>-->
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card mt-2 announcement">
                    <div class="card-header text-white">
                    <i class="fa fa-bullhorn" aria-hidden="true"></i>
                        <strong> ANOUNCEMENT </strong>
                    </div>
                    @foreach($Announcement as $key => $announcement)
                     <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                            <b>{{ $announcement->announcement_title }}</b><br><i style="font-size:11px;">{{ $announcement->date }}</i><br><br>
                            {{ $announcement->announcement_content}}</li>
                        </ul>                    
                    </div>
                    @endforeach
                </div>
            </div>                   
        </div>   
    </div>

@endsection
@foreach($EmpPerformance as $key => $EP)
@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.bundle.js') }}"></script>
        <script>
            var ctx = document.getElementById("canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ["productivity", "qualityofwork", "Initiative", "teamwork", "problemsolving", "attendance"],
                    datasets: [{
                      //  label: '# of Votes',
                        data: [{{$EP->productivity}}, {{$EP->qualityofwork}}, {{$EP->Initiative}}, {{$EP->teamwork}}, {{$EP->problemsolving}}, {{$EP->attendance}}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                }
            });
        </script>
@endsection
@endforeach
