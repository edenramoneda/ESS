
@extends('layouts.test')

@section('stylesheets')
            
        <link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui.theme.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
        @endsection

@section('content')
    <div class="container-fluid">
        <h2 class="mt-2">Employees</h2><hr>

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#ListEmployees">List of All Employees</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#UnderEmployees">Your Subordinates</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="ListEmployees" class="container-fluid tab-pane active"><br>
                <div class="card schedule-card">
                        <div class="card-header">
                                <strong>All Employees: </strong>
                                    @foreach($CountEP as $key => $te)
                                        {{$te->total_employees}}
                                    @endforeach
                                <select class="form-control filter" id="emp-filter">
                                    <option selected value="x">Filter by Department</option>
                                    @foreach($FilterEmployee as $key=> $FE)
                                        <option selected value="x">{{$FE->dept_name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="height:80vh;">
                                <table class="table table-sm table-bordered table-hover" style=" white-space: nowrap;">
                                        <thead>
                                            <tr>    
                                                <th colspan="4">Department</th>
                                                <th colspan="4">Employee Code</th>
                                                <th colspan="5">Full Name</th>
                                                <th colspan="4">Job Position</th>
                                                <th colspan="4">Employee Type</th>
                                                <th colspan="4">Date Hired</th>
                                                <th colspan="4">Designation</th>
                                            </tr>
                                        </thead>
                                        <tbody id="AllEmployeeData">
                                            @if($AllEmployees->isNotEmpty())
                                                @foreach($AllEmployees as $key => $AllE)
                                                    <tr>    
                                                        <td colspan="4">{{$AllE->dept_name}}</td>
                                                        <td colspan="4">{{$AllE->employee_code}}</td>
                                                        <td colspan="5">{{$AllE->fullname}}</td>
                                                        <td colspan="4">{{$AllE->title}}</td>
                                                        <td colspan="4">{{$AllE->type_name}}</td>
                                                        <td colspan="4">{{$AllE->datehired}}</td>
                                                        <td colspan="4">{{$AllE->designation}}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <td colspan="12">No Employees</td>
                                            @endif
                                        </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
            <div id="UnderEmployees" class="container-fluid tab-pane fade"><br>
                <div class="card">
                    <div class="card-header"><strong>Your Subordinates</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="height:80vh;">
                            <table class="table table-sm table-bordered table-hover" style=" white-space: nowrap;">
                                <thead>
                                    <tr>    
                                        <th colspan="4">Department</th>
                                            <th colspan="4">Employee Code</th>
                                                <th colspan="5">Full Name</th>
                                                <th colspan="4">Job Position</th>
                                                <th colspan="4">Employee Type</th>
                                                <th colspan="4">Date Hired</th>
                                                <th colspan="4">Designation</th>
                                                <th colspan="4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($CountRankAndFile->isNotEmpty())
                                        @foreach($CountRankAndFile as $key => $CRA)
                                            <tr>    
                                                <td colspan="4">{{$CRA->dept_name}}</td>
                                                <td colspan="4">{{$CRA->employee_code}}</td>
                                                <td colspan="5">{{$CRA->fullname}}</td>
                                                <td colspan="4">{{$CRA->title}}</td>
                                                <td colspan="4">{{$CRA->type_name}}</td>
                                                <td colspan="4">{{$CRA->datehired}}</td>
                                                <td colspan="4">{{$CRA->designation}}</td>
                                                <td colspan="4">
                                                    <button type="button" class="btn btn-success btn-sm" data-empcode="{{$CRA->employee_code}}" 
                                                    data-firstname="{{$CRA->firstname}}" data-middlename="{{$CRA->middlename}}" data-lastname="{{$CRA->lastname}}"
                                                    data-height="{{$CRA->height}}" data-weight="{{$CRA->weight}}" data-cs="{{$CRA->csName}}" data-email="{{$CRA->email}}" 
                                                    data-address="{{$CRA->address}}" data-cn="{{$CRA->epCN}}" data-ename="{{$CRA->complete_name}}" data-ecn="{{$CRA->EmergCN}}"
                                                    data-toggle="modal" data-target="#editEmp" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                                <td colspan="30">No Employees</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editEmp">
                <div class="modal-dialog">
                        <div class="modal-content">
                             <!-- Modal Header -->
                                <div class="modal-header">
                                <h4 class="modal-title">Edit Employee Data</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                
                                <!-- Modal body -->
                                <div class="modal-body">
                                <form id="UnderEmployeeForm" method="POST">
                                @csrf
                                        <div class="alert alert-danger form-ot-err alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                All fields are required
                                        </div>
                                        <div class="alert alert-success form-ot-success alert-dismissible">Request successfully Submitted!</div>
                                        <div class="form-group">
                                        <input type="hidden" class="form-control" name="employee_code" id="employee_code">
                                        </div>
                                        <div class="form-group">
                                        <label>Firstname</label>
                                        <input type="text" class="form-control" name="firstname" id="firstname">
                                        </div>
                                        <div class="form-group">
                                        <label>Middlename</label>
                                        <input type="text" class="form-control" name="middlename" id="middlename">
                                        </div>
                                        <div class="form-group">
                                        <label>Lastname</label>
                                        <input type="text" class="form-control" name="lastname" id="lastname">
                                        </div>
                                        <div class="form-group">
                                        <label>Height</label>
                                        <input type="text" class="form-control" name="height" id="height">
                                        </div>
                                        <div class="form-group">
                                        <label>Weight</label>
                                        <input type="text" class="form-control" name="weight" id="weight">
                                        </div>
                                        <div class="form-group">
                                        <label>Civil Status</label>
                                        <select name="cs" class="form-control" id="cs">
                                            @foreach($CivilStatus as $key => $CS)
                                                <option>{{$CS->csName}}</option>
                                            @endforeach
                                        </select>
                                        <!--<input type="text" class="form-control" name="cs" id="cs">-->
                                        </div>
                                        <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                        <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address" id="address">
                                        </div>
                                        <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control" name="cn" id="cn">
                                        </div>
                                        <div class="form-group">
                                        <label>In Case of Emergency : Name</label>
                                        <input type="text" class="form-control" name="eName" id="eName">
                                        </div>
                                        <div class="form-group">
                                        <label>In Case of Emergency : Contact Number</label>
                                        <input type="text" class="form-control" name="EmergCN" id="EmergCN">
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
        <script type="text/javascript" src="{{ url('js/synapse.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.bundle.js') }}"></script>
@endsection
