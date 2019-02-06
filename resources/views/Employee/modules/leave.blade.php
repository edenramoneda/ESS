
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')

    <div class="container-fluid mt-2">
        <h3>Leave</h3>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card mt-2 request-leave">
                        <div class="card-header">
                                <strong>LEAVE DETAILS</strong>
                                <button type="button" class="btn btn-ess text-white" data-toggle="modal" data-target="#myModal">Request Leave</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
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
                                    @foreach($LeaveRequest as $key => $leave)
                                        <tr>
                                        <td>{{ $leave->date_requested }}</td>
                                        <td>{{ $leave->type_of_leave }}</td>
                                        <td colspan="4">{{ $leave->reason }}</td>
                                        <td>{{ $leave->day_of_leave }}</td>
                                        <td>{{ $leave->start_date }}</td>
                                        <td>{{ $leave->end_date }}</td>
                                        <td>{{ $leave->status }}</td>
                                     <!--   <td>
                                            <button type="button" class="btn bg-success btn-sm text-white">Cancel Request</button>
                                        </td>-->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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

            <form action="/Employee/modules/leave" method="POST">
            @csrf
                <div class="form-group">
                    <label>Select Leave</label>
                    <select name="type_leaves" class="custom-select">
                    @foreach($TypeOfLeaves as $key => $leave)
                        <option name="type_leave">{{ $leave-> leave_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Reason</label>
                    <input type="text" class="form-control" name="reason">
                </div>
                <div class="form-group">
                    <label>Days of Leave</label>
                    <input type="number" class="form-control" name="leave_days">
                </div>
                <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control" name="start_date">
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control" name="end_date">
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
    @endsection

@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
@endsection