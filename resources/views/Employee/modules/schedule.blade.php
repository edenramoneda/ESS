
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
@endsection

@section('content')

<div class="container-fluid mt-3" id="Schedule">
        <h3>Schedule</h3><hr>
        <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="card mt-2 schedule-card">
                    <div class="card-header">
                        <strong>SCHEDULE</strong>
                        <button type="button" class="btn btn-sm btn-ess text-white" data-toggle="modal" data-target="#myModal">Request Schedule</button>
                    </div>
                     <div class="card-body">
                        <ul class="list-group">
                            @foreach($Schedule as $key => $s)
                            <li class="list-group-item">
                                <span class="day">Monday</span><span class="sched">{{ $s->mon }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="day">Tuesday</span><span class="sched">{{ $s->tues }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="day">Wednesday</span><span class="sched">{{ $s->wed }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="day">Thursday</span><span class="sched">{{ $s->thurs }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="day">Friday</span><span class="sched">{{ $s->fri }}</span>
                            </li>
                        @endforeach
                        </ul>                    
                    </div>
                </div>
                <div class="card mt-2 schedule-card">
                    <div class="card-header">
                        <strong>Schedule Requests</strong>
                    </div>
                     <div class="card-body">
                        <ul class="list-group">
                            @if($ScheduleRequests->isNotEmpty())
                                @foreach($ScheduleRequests as $key => $sr)
                                <li class="list-group-item">
                                    <span class="day">{{$sr->date}}</span><span class="sched">
                                    <button type="button" class="btn btn-sm btn-ess text-white" data-schedule="{{$sr->schedule}}"
                                    data-reason="{{$sr->reason}}" data-status="{{$sr->status}}" data-toggle="modal" data-target="#SchedReqModal">View</button>
                                    </span>
                                </li>
                                @endforeach
                            @else
                                <li class="list-group-item">
                                    No Results Found
                                </li>
                            @endif
                        </ul>                    
                    </div>
                </div>
              </div>
           <div class="col-sm-12 col-md-9 col-lg-9">
                <div class="card mt-2 schedule-card">
                        <div class="card-header">
                                <strong>DAILY TIME RECORD</strong>
                                <select class="form-control-sm dtr-filter" name="dtr-filter">
                                    <option selected>Filter by Month</option>
                                    @foreach($TimeSheetCB as $key=> $EmpTS)
                                        <option selected>{{$EmpTS->date}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="height:80vh;">
                                <table class="table table-sm">
                                        <thead>
                                        <tr>
                                                <th colspan="4">Date</th>
                                                <th colspan="4">Time In</th>
                                                <th colspan="4">Time Out</th>
                                                <th colspan="4">Total Hours</th>
                                                <th colspan="4">Undertime</th>
                                                <th colspan="4">Overtime</th>
                                                <th colspan="4">Late</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($TimeSheet as $key => $ts)
                                                <tr>
                                                <td colspan="4">{{ $ts-> date}}</td>
                                                <td colspan="4">{{ $ts-> time_in}}</td>
                                                <td colspan="4">{{ $ts-> time_out}}</td>
                                                <td colspan="4">{{ $ts-> total_hours}}</td>
                                                <td colspan="4">{{ $ts-> undertime}}</td>
                                                <td colspan="4">{{ $ts-> overtime}}</td>
                                                <td colspan="4">{{ $ts-> late}}</td>
                                                </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>  
        <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                <div class="modal-content">
                
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Request Schedule</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>  
                        <!-- Modal body -->
                        <div class="modal-body">
                        <form id="resched-form" method="POST">
                            @csrf
                                <div class="alert alert-danger form-feedback-err alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        All fields are required
                                </div>
                                <div class="alert alert-success form-feedback-success alert-dismissible">Request successfully Submitted!</div>
                                <div class="form-group">
                                    <label>Schedule</label>
                                    <select class="form-control" name="sched_name" id="sched_name">
                                        <option selected>8:00 AM - 5:00 PM</option>
                                        <option>9:00 AM - 6:00 PM</option>
                                        <option>10:00 AM - 7:00 PM</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label>Reason</label>
                                    <input type="text" class="form-control" name="sched_reason" id="sched_reason">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Submit">
                                </div>
                        <form>
                        </div>
                </div>  
                </div>
        </div>
        <div class="modal fade" id="SchedReqModal">
                <div class="modal-dialog">
                <div class="modal-content">
                
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Schedule Requests</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>  
                        <!-- Modal body -->
                        <div class="modal-body">
                        <form id="resched-form" method="POST">
                            @csrf
                                <div class="form-group">
                                    <label>Schedule</label>
                                    <input type="text" class="form-control" name="sched_name" id="sched_name" disabled>
                                </div>
                                <div class="form-group">
                                <label>Reason</label>
                                    <input type="text" class="form-control" name="sched_reason" id="sched_reason" disabled>
                                </div>
                                <div class="form-group">
                                <label>Status</label>
                                    <input type="text" class="form-control" name="sched_status" id="sched_status" disabled>
                                </div>
                        <form>
                        </div>
                </div>  
                </div>
        </div>
    
    </div>
    @endsection

@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/synapse.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.min.js') }}"></script>
@endsection