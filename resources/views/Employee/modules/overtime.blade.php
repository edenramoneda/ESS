
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')
  <div class="container-fluid" id="overtime">
        <div class="card mt-5">
                <div class="card-header">
                        <strong>Overtime Requests
                        <button type="button" class="btn btn-ess text-white btn-sm">Request Overtime</button>
                        </strong>
                </div>
                <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Overtime Hours</th>
                                        <th>Date</th>
                                        <th colspan="4">Reason</th>
                                        <th colspan="4">Approved by</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>02:00</td>
                                        <td>2019-11-19</td>
                                        <td colspan="4">More Paper Works</td>
                                        <td colspan="4">Waiting....</td>
                                        <td>
                                            <button type="button" class="btn bg-success btn-sm text-white">Cancel Request</button>
                                        </td>
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