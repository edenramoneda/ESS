
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
  <div class="container-fluid" id="overtime">
        <h3 class="mt-3">Overtime</h3>
                <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Overtime Requests</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Overtime History</a>
                        </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                        <div id="home" class="container-fluid tab-pane active"><br>
                                <div class="card">
                                        <div class="card-header">
                                                <strong>Overtime Requests
                                                <button type="button" class="btn btn-ess text-white btn-sm" data-toggle="modal" data-target="#myModal">Request Overtime</button>
                                                </strong>
                                        </div>
                                        <div class="card-body">
                                                <div class="table-responsive">
                                                        <table class="table table-hover table-bordered table-sm">
                                                        <thead class="thead-light">
                                                        <tr>
                                                                <th>Date</th>
                                                                <th>Overtime Hours</th>
                                                                <th colspan="4">Reason</th>
                                                                <th colspan="4">Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                                @if($Overtime->isNotEmpty())
                                                                        @foreach($Overtime as $key => $O)
                                                                                <tr>
                                                                                        <td>{{ $O->date}}</td>
                                                                                        <td>{{ $O->overtime_hours}}</td>
                                                                                        <td colspan="4">{{ $O->reason}}</td>
                                                                                        <td colspan="4">{{ $O->status}}</td>
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
                        <div id="menu1" class="container-fluid tab-pane fade"><br>
                                <div class="card">
                                        <div class="card-header">
                                                <strong>Overtime History
                                                </strong>
                                                <div class="filter">
                                                        <select class="form-control" id="overtime-filter">
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
                                                                <th>Date</th>
                                                                <th>Overtime Hours</th>
                                                                <th colspan="4">Reason</th>
                                                                <th colspan="4">Status</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="overtimeTable">
                                                                @if($OvertimeHistory->isNotEmpty())
                                                                        @foreach($OvertimeHistory as $key => $O)
                                                                                <tr>
                                                                                        <td>{{ $O->date}}</td>
                                                                                        <td>{{ $O->overtime_hours}}</td>
                                                                                        <td colspan="4">{{ $O->reason}}</td>
                                                                                        <td colspan="4">{{ $O->status}}</td>
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
                             <!-- Modal Header -->
                                <div class="modal-header">
                                <h4 class="modal-title">Request Overtime</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                <form method="POST" id="overtime-req-form">
                                @csrf
                                        <div class="alert alert-danger form-ot-err alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                All fields are required
                                        </div>
                                        <div class="alert alert-success form-ot-success alert-dismissible">Request successfully Submitted!</div>
                                        <div class="form-group">
                                        <label>Overtime Hours</label>
                                        <input type="number" class="form-control" placeholder="Example: 2" name="overtime_hours" id="overtime_hours" min="1" max="5">
                                        <i class="text-success overtime-hours-error">Maximum Overtime Hours: 5</i>
                                        </div>
                                        <div class="form-group">
                                        <label>Reason</label>
                                        <input type="text" class="form-control" placeholder="Example: Unfinished Work" name="overtime_reason" id="overtime_reason">
                                        </div>
                                        <div class="form-group">
                                        <input type="submit" value="Submit" class="btn btn-success">
                                        </div>
                                </form>
                                </div>
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
        <script type="text/javascript" src="{{ url('js/Synapse.js') }}"></script>
@endsection