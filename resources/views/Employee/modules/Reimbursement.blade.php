
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')
  <div class="container-fluid" id="reimbursement">
        <div class="card mt-5">
                <div class="card-header">
                        <strong>Reimbursement Requests
                        <button type="button" class="btn btn-ess text-white btn-sm" data-toggle="modal" data-target="#myModal">Request Reimbursement</button>
                        </strong>
                </div>
                <div class="card-body">
                        <div class="table-responsive table-sm">
                                <table class="table table-hover table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Date Requested</th>
                                        <th>OR No</th>
                                        <th>Received</th>
                                        <th>Particulars</th>
                                        <th>Attachment</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if($Reimbursement->isNotEmpty())
                                                @foreach($Reimbursement as $key => $r)
                                                <tr>
                                                <td> {{$r->date }}</td>
                                                <td> {{$r->or_no }}</td>
                                                <td>{{$r->recieved }}</td>
                                                <td>{{$r->particulars }}</td>
                                                <td>{{$r->attachment }}</td>
                                                <td>{{$r->total_amount }}</td>
                                                <td>{{$r->status }}</td>
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

         <div class="card mt-5">
                <div class="card-header">
                        <strong>Reimbursement History</strong>
                </div>
                <div class="card-body">
                        <div class="table-responsive table-sm">
                                <table class="table table-hover table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Date Requested</th>
                                        <th>OR No</th>
                                        <th>Received</th>
                                        <th>Particulars</th>
                                        <th>Attachment</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if($ReimbursementHistory->isNotEmpty())
                                                @foreach($ReimbursementHistory as $key => $r)
                                                <tr>
                                                <td> {{$r->date }}</td>
                                                <td> {{$r->or_no }}</td>
                                                <td>{{$r->recieved }}</td>
                                                <td>{{$r->particulars }}</td>
                                                <td>{{$r->attachment }}</td>
                                                <td>{{$r->total_amount }}</td>
                                                <td>{{$r->status }}</td>
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

        <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                <div class="modal-content">
                
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Request Reimbursement</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                        <form method="POST" id="reimbursement-form">
                        @csrf
                                <div class="alert alert-danger form-reimburse-err alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                All fields are required
                                </div>
                                <div class="alert alert-success form-reimburse-success alert-dismissible">Request successfully Submitted!</div>
                                <div class="form-group">
                                <label>OR No.</label>
                                <input type="text" class="form-control" name="or_no" id="or_no">
                                </div>
                                <div class="form-group">
                                <label>Cash Received</label>
                                <input type="text" class="form-control" name="cash_received" id="cash_received">
                                </div>
                                <div class="form-group">
                                <label>Particulars</label>
                                <input type="text" class="form-control" name="particulars" id="particulars">
                                </div>
                                <div class="form-group">
                                <label>Attachment</label>
                                <input type="file" class="form-control" name="attachment" id="attachment">
                                </div>
                                <div class="form-group">
                                <label>Total Amount</label>
                                <input type="text" class="form-control" name="total_amount" id="total_amount">
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
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Synapse.js') }}"></script>
@endsection