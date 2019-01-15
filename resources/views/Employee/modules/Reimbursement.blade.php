
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
                        <strong>Reimbursement Details
                        <button type="button" class="btn btn-ess text-white btn-sm">Reimburse</button>
                        </strong>
                </div>
                <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>OR No</th>
                                        <th>Date</th>
                                        <th>Department</th>
                                        <th>Cash Received</th>
                                        <th>Expenses</th>
                                        <th>Particulars</th>
                                        <th>Cash Returned</th>
                                        <th>Total Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>19001</td>
                                        <td>2018-11-21</td>
                                        <td>IT/Digital Media</td>
                                        <td>5000</td>
                                        <td>5000</td>
                                        <td>ddf</td>
                                        <td>5000</td>
                                        <td>5000</td>
                                        </tr>
                                    </tbody>
                                </table>
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