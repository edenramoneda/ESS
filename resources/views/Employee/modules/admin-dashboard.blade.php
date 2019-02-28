
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui.theme.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
        @endsection

@section('content')
<div id="overlay" style="width: 100%; opacity: 0.9;"></div>
 <div class="container-fluid dashboard">
        <h2 class="mt-2">Dashboard</h2><hr>
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="card mt-2 text-center">
                     <div class="card-body">
                        <div class="container-fluid">
                            <h3>
                                @foreach($Department as $key => $dept)
                                {{$dept->department}}
                                @endforeach
                            </h3>
                            Departments
                         </div>
                    </div>
                    <div class="card-header bg-success">
                        <a href="{{ url('/Employee/modules/company') }}" class="text-white">View Departments</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="card mt-2 text-center">
                     <div class="card-body">
                        <div class="container-fluid">
                            <h3>
                                @foreach($Employees as $key => $Emp)
                                    {{$Emp->employees}}
                                @endforeach
                            </h3>
                            Total Employees
                         </div>
                    </div>
                    <div class="card-header bg-success">
                        <a href="/Employee/modules/employees" class="text-white">View Employees</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="card mt-2 text-center">
                     <div class="card-body">
                        <div class="container-fluid">
                            <h3>
                                @foreach($CountRankAndFile as $key=> $CRF)
                                        {{$CRF->rank_and_files}}
                                @endforeach
                            </h3>
                            Subordinates
                         </div>
                    </div>
                    <div class="card-header bg-success">
                        <a href="/Employee/modules/employees" class="text-white">View your Subordinates</a>
                    </div>
                </div>
            </div>       
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="card announcement mr-3" style="float:right;position:absolute;">
                    <div class="card-header text-white">
                        <i class="fa fa-bullhorn" aria-hidden="true"></i>
                        <strong> ANOUNCEMENT </strong>
                            <i class="fa fa-pencil-alt" style="float:right;cursor:pointer" data-toggle="modal" data-target="#announcement_modal"></i>
                    </div>
                    <div class="card-body" style="overflow-y:auto;height:65vh">
                        <ul class="list-group">
                            @if($Announcement->isNotEmpty())
                                @foreach($Announcement as $key => $announcement)
                                    <li class="list-group-item">
                                <b>{{ $announcement->announcement_title }} 
                                <i class="fa fa-trash" style="float:right;cursor:pointer" data-aid="{{ $announcement->announcement_id }}" data-toggle="modal" data-target="#confirm_drop_announcement"></i></b><br><i style="font-size:11px;">{{ $announcement->date }}</i><br><br>
                                {{ $announcement->announcement_content}}
                                @endforeach
                            @else
                                No Announcements
                            @endif
                            </li>
                        </ul>                    
                    </div>
                </div>
            </div>                      
        </div>
        <div class="row mt-4">
                <div class="col-sm-12 col-md-3 col-lg-3">
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
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="card">
                        <div class="card-header text-white">
                            Leave Balances
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <strong>15</strong> <span>Vacation Leave</span><br>
                                <strong>15</strong> <span>Sick Leave</span><br>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
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
                    <div class="card mt-3">
                        <div class="card-header text-white">
                            Leave Requests
                        </div>
                        <div class="card-body">
                                @if($CountLeaveRequests->isNotEmpty())
                                    @foreach($CountLeaveRequests as $key => $col)
                                        {{$col->count_leave}}
                                    @endforeach
                                @else
                                    There are no leave requests
                                @endif
                                <a href="{{url('/Employee/modules/leave')}}" class="btn btn-ess btn-sm">View leave requests</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="card">
                        <div class="card-header" style="line-height:20px">Number of Employees per Departments</div>
                        <div class="card-body">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th>Department</th>
                                    <th>Employees</th>
                                </tr>  
                                @foreach($CountEmployees as $key => $CE)
                                    <tr>
                                        <td>{{$CE->dept_name}}</td>
                                        <td>{{$CE->no_of_employees}}</td>    
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
        </div>  

        <div class="modal fade" id="announcement_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Post Announcement</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                    {{-- displays validation --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif
                    <form method="POST" id="announcement_form">
                    @csrf
                        <div class="alert alert-danger form-announcement-err alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            All fields are required!
                        </div>
                        <div class="alert alert-success form-announcement-success alert-dismissible">Announcement Posted!</div>
                        <div class="form-group">
                            <label>Announcement Title</label>
                            <input type="text" class="form-control" name="announcement_title" id="announcement_title">
                        </div>
                        <div class="form-group">
                            <label>Announcement Content</label>
                            <textarea class="form-control" name="announcement_content" id="announcement_content"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

        <div class="modal fade" id="confirm_drop_announcement">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"> Drop This Announcement</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="DropAnnouncementForm">
                        @csrf
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="a_ID" name="a_ID">
                            </div>
                            <div class="form-group">
                                <label>Are you sure you want to drop this announcement?</label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success btn-sm" value="Yes">
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>&ensp;
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
@foreach($EmpPerformance as $key => $EP)
@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/synapse.js') }}"></script>
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
                            'rgba(255, 0, 102, 0.2)',
                            'rgba(153, 0, 204, 0.2)',
                            'rgb(255, 255, 0, 0.2)',
                            'rgba(0, 51, 204, 0.2)',
                            'rgba(0, 128, 64, 0.2)',
                            'rgba(255, 51, 0, 0.2)'
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
