
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
        <h2 class="mt-2">Inbox</h2><hr>

         <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#profile_changes">Profile Changes</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#archive_pc">Archive</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div id="profile_changes" class="container-fluid tab-pane active"><br>
                <div class="card">
                    <div class="card-header"><strong>Requests</strong>
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
                                                    <button class="btn btn-success btn-sm" title="Edit" data-pdsid="{{$PDSR->pds_id}}" data-empcode="{{$PDSR->employee_code}}"
                                                    data-fullname="{{$PDSR->fullname}}" data-fc="{{$PDSR->fc}}" data-content="{{$PDSR->content}}"
                                                    data-reason="{{$PDSR->reason}}" data-request="{{$PDSR->req_status}}"
                                                    data-toggle="modal" data-target="#InboxModal">
                                                    <i class="fa fa-pencil-alt"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-info btn-sm" data-empcode="{{$PDSR->employee_code}}" data-fullname="{{$PDSR->fullname}}"
                                                    data-toggle="modal" data-target="#MessageModal" title="Message">
                                                    <i class="fa fa-envelope"></i>
                                                    </button>
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
                    <div class="card-header"><strong>Archive Requests</strong>
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
                                                    <a href="" class="btn btn-info btn-sm " title="Message">
                                                    <i class="fa fa-envelope"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                                <td colspan="34">No Results Found</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="InboxModal">
                <div class="modal-dialog">
                        <div class="modal-content">
                             <!-- Modal Header -->
                                <div class="modal-header">
                                <h4 class="modal-title">Profile Changes Request</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>    
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="POST" id="ReqInboxForm">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="pds_id" id="pds_id">
                                            <input type="hidden" class="form-control" name="empcode" id="empcode">
                                        </div>
                                        <div class="form-group">
                                            <label>Fullname</label>
                                            <input type="text" class="form-control" name="fullname" id="fullname" disabled="disabled">
                                        </div>
                                        <div class="form-group">
                                            <label>Field want to change</label>
                                            <input type="text" class="form-control" name="fc" id="fc" disabled="disabled">
                                        </div>
                                        <div class="form-group">
                                            <label>Data want to change to</label>
                                            <input type="text" class="form-control" name="content" id="content" disabled="disabled">
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">Reason</label>
                                            <textarea class="form-control" rows="5" name="reason" id="reason" disabled="disabled"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="req_status" id="req_status">
                                                @foreach($ReqStatus as $key => $RS)
                                                <option>{{$RS->req_status}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        </form>
                                </div>
                        </div>  
                </div>
        </div>
        <div class="modal fade" id="MessageModal">
                <div class="modal-dialog">
                        <div class="modal-content">
                             <!-- Modal Header -->
                                <div class="modal-header">
                                <h4 class="modal-title">Send Message</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>    
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form method="POST" id="MessageFormModal">
                                    @csrf
                                        <div class="alert alert-danger form-message-err alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            Message Field required!
                                        </div>
                                        <div class="alert alert-success form-message-success alert-dismissible">Message Sent!</div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="inbox_empcode" id="inbox_empcode" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label>Fullname</label>
                                            <input type="text" class="form-control" name="fullname" id="fullname" disabled="disabled">
                                        </div>
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control" rows="5" name="message" id="message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success">Send</button>
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
        <script type="text/javascript" src="{{ url('js/Chart.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/synapse.js') }}"></script>
@endsection
