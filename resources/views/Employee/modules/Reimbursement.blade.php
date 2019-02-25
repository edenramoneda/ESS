
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/jquery-ui.theme.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')
  <div class="container-fluid" id="reimbursement">
        <h3 class="mt-3">Reimbursement</h3>

        <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#r">Reimbursement</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#rh">Reimbursement History</a>
                </li>
        </ul>

                <!-- Tab panes -->
        <div class="tab-content">
                <div id="r" class="container-fluid tab-pane active"><br>
                        <div class="card">
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
                                                        <th>Expenses</th>
                                                        <th>Particulars</th>
                                                        <th>Attachment</th>
                                                        <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                        @if($Reimbursement->isNotEmpty())
                                                                @foreach($Reimbursement as $key => $r)
                                                                <tr>
                                                                <td> {{$r->date }}</td>
                                                                <td> {{$r->expenses }}</td>
                                                                <td>{{$r->particulars }}</td>
                                                                <td>{{$r->attachment }}</td>
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
                </div>
                <div id="rh" class="container-fluid tab-pane fade"><br>
                <div class="card">
                        <div class="card-header">
                                <strong>Reimbursement History</strong>
                                <div class="filter">
                                           <select class="form-control" id="reimburse-filter">
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
                                <div class="table-responsive table-sm">
                                        <table class="table table-hover table-bordered">
                                        <thead class="thead-light">
                                        <tr>
                                                <th>Date Requested</th>
                                                <th>Expenses</th>
                                                <th>Particulars</th>
                                                <th>Attachment</th>
                                                <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody id="reimburseHTable">
                                                @if($ReimbursementHistory->isNotEmpty())
                                                        @foreach($ReimbursementHistory as $key => $r)
                                                        <tr>
                                                        <td> {{$r->date }}</td>
                                                        <td>{{$r->expenses }}</td>
                                                        <td>{{$r->particulars }}</td>
                                                        <td>{{$r->attachment }}</td>
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
                                        <label>Expenses</label>
                                        <input type="text" class="form-control" name="expenses" id="expenses">
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