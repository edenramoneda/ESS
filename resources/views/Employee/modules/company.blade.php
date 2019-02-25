
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
        <h2 class="mt-2">Company</h2><hr>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#dept">Departments</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#jc">Jobs and Classifications</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="dept" class="container-fluid tab-pane active"><br>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" style="height:80vh;">
                            <table class="table table-sm table-bordered table-hover" style=" white-space: nowrap;">
                                <thead>
                                    <tr>    
                                        <th colspan="5">Department</th>
                                        <th colspan="5">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($Department->isNotEmpty())
                                        @foreach($Department as $key => $D)
                                            <tr>    
                                                <td colspan="5">{{$D->dept_name}}</td>
                                                <td colspan="5">{{$D->dept_desc}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                                <td colspan="12">No Results Found</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="jc" class="container-fluid tab-pane fade"><br>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" style="height:80vh;">
                            <table class="table table-sm table-bordered table-hover" style=" white-space: nowrap;">
                                <thead>
                                    <tr>    
                                        <th colspan="5">Jobs</th>
                                        <th colspan="5">Classification</th>
                                        <th colspan="5">Designation</th>
                                        <th colspan="5">Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($Jobs->isNotEmpty())
                                        @foreach($Jobs as $key => $J)
                                            <tr>    
                                                <td colspan="5">{{$J->title}}</td>
                                                <td colspan="5">{{$J->class_name}}</td>
                                                <td colspan="5">{{$J->designation}}</td>
                                                <td colspan="5">{{$J->dept_name}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                                <td colspan="12">No Results Found</td>
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
        <script type="text/javascript" src="{{ url('js/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.bundle.js') }}"></script>
@endsection
