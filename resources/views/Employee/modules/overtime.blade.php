
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
                        <button type="button" class="btn btn-ess text-white btn-sm" data-toggle="modal" data-target="#myModal">Request Overtime</button>
                        </strong>
                </div>
                <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Overtime Hours</th>
                                        <th colspan="4">Reason</th>
                                        <th colspan="4">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($Overtime as $key => $O)
                                                <tr>
                                                        <td>{{ $O->date}}</td>
                                                        <td>{{ $O->overtime_hours}}</td>
                                                        <td colspan="4">{{ $O->reson}}</td>
                                                        <td colspan="4">{{ $O->status}}</td>
                                                </tr>
                                        @endforeach
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
                        <h4 class="modal-title">Request Overtime</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                        <form action="/Employee/modules/overtime" method="POST">
                        @csrf
                                <div class="form-group">
                                <label>Overtime Hours</label>
                                <input type="number" class="form-control" placeholder="Example: 2" name="overtime_hours">
                                </div>
                                <div class="form-group">
                                <label>Reason</label>
                                <input type="text" class="form-control" placeholder="Example: Finish Work" name="reason">
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
@endsection