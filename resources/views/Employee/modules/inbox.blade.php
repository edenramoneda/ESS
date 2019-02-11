
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
        @endsection

@section('content')
    <div class="container-fluid">
        <h2 class="mt-2">Inbox</h2><hr>

         <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#profile_changes">Profile Changes</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#archive_pc">Archive Profile Changes</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="profile_changes" class="container-fluid tab-pane active"><br>
                <div class="card">
                    <div class="card-header"><strong>Your Under Employees</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="height:80vh;">
                            <table class="table table-sm table-bordered table-hover" style=" white-space: nowrap;">
                                <thead>
                                    <tr>    
                                        <th colspan="5">Fullname</th>
                                            <th colspan="5">Field want to change</th>
                                                <th colspan="5">Data want to change to</th>
                                                <th colspan="5">Reason</th>
                                                <th colspan="5">Status</th>
                                                <th colspan="5">Date Requested</th>
                                                <th colspan="5">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($PDSReq->isNotEmpty())
                                        @foreach($PDSReq as $key => $PDSR)
                                            <tr>    
                                                <td colspan="5">{{$PDSR->fullname}}</td>
                                                <td colspan="5">{{$PDSR->fc}}</td>
                                                <td colspan="5">{{$PDSR->content}}</td>
                                                <td colspan="5">{{$PDSR->reason}}</td>
                                                <td colspan="5">{{$PDSR->req_status}}</td>
                                                <td colspan="5">{{$PDSR->date_req}}</td>
                                                <td colspan="5">
                                                    <a href="" class="btn btn-success btn-sm" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="" class="btn btn-info btn-sm " title="Message">
                                                    <i class="fa fa-envelope"></i>
                                                    </a>
                                                </td>
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
            <div id="archive_pc" class="container-fluid tab-pane fade"><br>
                <div class="card">
                    <div class="card-header"><strong>Your Under Employees</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" style="height:80vh;">
                            <table class="table table-sm table-bordered table-hover" style=" white-space: nowrap;">
                                <thead>
                                    <tr>    
                                        <th colspan="5">Fullname</th>
                                            <th colspan="5">Field want to change</th>
                                                <th colspan="5">Data want to change to</th>
                                                <th colspan="5">Reason</th>
                                                <th colspan="5">Status</th>
                                                <th colspan="5">Date Requested</th>
                                                <th colspan="5">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($PDSReqArchive->isNotEmpty())
                                        @foreach($PDSReqArchive as $key => $PDSRA)
                                            <tr>    
                                                <td colspan="5">{{$PDSRA->fullname}}</td>
                                                <td colspan="5">{{$PDSRA->fc}}</td>
                                                <td colspan="5">{{$PDSRA->content}}</td>
                                                <td colspan="5">{{$PDSRA->reason}}</td>
                                                <td colspan="5">{{$PDSRA->req_status}}</td>
                                                <td colspan="5">{{$PDSRA->date_req}}</td>
                                                <td colspan="5">
                                                    <a href="" class="btn btn-success btn-sm" title="Edit">
                                                    <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="" class="btn btn-info btn-sm " title="Message">
                                                    <i class="fa fa-envelope"></i>
                                                    </a>
                                                </td>
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
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.bundle.js') }}"></script>
@endsection
