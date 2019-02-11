
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
        @endsection

@section('content')
    <div class="container-fluid">
        <h2 class="mt-2">List of Employees</h2><hr>

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#ListEmployees">List of All Employees</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#UnderEmployees">Your Under Employees</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="ListEmployees" class="container-fluid tab-pane active"><br>
                <div class="card schedule-card">
                        <div class="card-header">
                                <strong>All Employees</strong>
                                <select class="form-control-sm dtr-filter" name="dtr-filter">
                                    <option selected>Filter by Department</option>
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
                                        <tbody>
                                            @if($AllEmployees->isNotEmpty())
                                                @foreach($AllEmployees as $key => $AllE)
                                                    <tr>    
                                                        <td colspan="4">{{$AllE->dept_name}}</td>
                                                        <td colspan="4">{{$AllE->employee_code}}</td>
                                                        <td colspan="5">{{$AllE->fullname}}</td>
                                                        <th colspan="4">{{$AllE->title}}</th>
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
                    <div class="card-header"><strong>Your Under Employees</strong>
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
                                                    <a href="" class="btn btn-success btn-sm" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                </td>
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
        </div>
    </div>
@endsection
@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.bundle.js') }}"></script>
@endsection
