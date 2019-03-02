
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui.theme.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
@endsection

@section('content')

    <div class="container-fluid mt-2">
        <h3>Leave</h3>
        <hr>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#leave_req">Leave Requests</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#leave_history">History</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="leave_req" class="container-fluid tab-pane active"><br>
                 <div class="card mt-2 request-leave">
                        <div class="card-header">
                                <button type="button" class="btn btn-ess btn-sm text-white" data-toggle="modal" data-target="#myModal">Request Leave</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-sm">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Date Requested</th>
                                        <th>Type of Leave</th>
                                        <th colspan="4">Reason</th>
                                        <th>Days of Leave</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($LeaveRequestNew->isNotEmpty())
                                        @foreach($LeaveRequestNew as $key => $leave)
                                            <tr>
                                            <td>{{ $leave->date }}</td>
                                            <td>{{ $leave->leave_name }}</td>
                                            <td colspan="4">{{ $leave->reason }}</td>
                                            <td>{{ $leave->range_leave }}</td>
                                            <td>{{ $leave->date_start }}</td>
                                            <td>{{ $leave->date_end }}</td>
                                            <td>{{ $leave->status }}</td>
                                        <!--   <td>
                                                <button type="button" class="btn bg-success btn-sm text-white">Cancel Request</button>
                                            </td>-->
                                            </tr>
                                        @endforeach
                                    @else
                                            <tr>
                                                <td colspan="12">No Results Found</td>
                                            </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
            <div id="leave_history" class="container-fluid tab-pane fade"><br>
                <div class="card request-leave">
                        <div class="card-header">
                                <strong>LEAVE HISTORY</strong>
                                <div class="filter">
                                    <select class="form-control" id="leave-filter">
                                        <option selected value="x">Filter by Month</option>
                                        <option value="1">January</option>
                                        <option value="2">February</option>
                                        <option value="3">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-sm">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Date Requested</th>
                                        <th>Type of Leave</th>
                                        <th colspan="4">Reason</th>
                                        <th>Days of Leave</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody id="LeaveHistoryTable">
                                    @if($LeaveRequestHistory->isNotEmpty())
                                        @foreach($LeaveRequestHistory as $key => $leave)
                                            <tr>
                                            <td>{{ $leave->date }}</td>
                                            <td>{{ $leave->leave_name }}</td>
                                            <td colspan="4">{{ $leave->reason }}</td>
                                            <td>{{ $leave->range_leave }}</td>
                                            <td>{{ $leave->date_start }}</td>
                                            <td>{{ $leave->date_end }}</td>
                                            <td>{{ $leave->status }}</td>
                                        <!--   <td>
                                                <button type="button" class="btn bg-success btn-sm text-white">Cancel Request</button>
                                            </td>-->
                                            </tr>
                                        @endforeach
                                    @else
                                            <tr>
                                                <td colspan="12">No Results Found</td>
                                            </tr>
                                    @endif
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
                <div class="modal-header">
                    <h4 class="modal-title">  Leave Request Form</h4>
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
                    <form method="POST" id="leave-form">
                         @csrf
                        <div class="alert alert-danger form-leave-err alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            All fields are required!
                        </div>
                        <div class="alert alert-success form-leave-success alert-dismissible">Leave Request successfully Submitted!</div>
                        <div class="form-group">
                            <label>Select Leave</label>
                            <select name="type_leaves" id="type_leaves" class="custom-select">
                            @foreach($TypeOfLeaves as $key => $leave)
                                <option>{{ $leave-> leave_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Reason</label>
                            <input type="text" class="form-control" name="reason" id="reason">
                        </div>
                        <div class="form-group">
                            <label>Days of Leave</label>
                            <input type="number" class="form-control" name="leave_days" id="leave_days" min="1" max="15">
                            <i class="text-success leave-days-error">Maximum Sick Leave: 15</i>
                        </div>
                        <div class="form-group">
                            <label>Start Date</label>
                            <input id="start_date" name="start_date" data-provide="datepicker" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input class="form-control" name="end_date" id="end_date">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/synapse.js') }}"></script>
@endsection