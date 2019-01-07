
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')

<div class="container-fluid mt-3" id="Schedule">
        <h3>Schedule</h3><hr>
        <div class="row">
           <div class="col-sm-12 col-md-9 col-lg-9">
                <div class="card mt-2 schedule-card">
                        <div class="card-header">
                                <strong>DAILY TIME RECORD</strong>
                                <button type="button" class="btn btn-ess text-white" data-toggle="modal" data-target="#myModal">Shift Record/History</button>
                                <button type="button" class="btn btn-ess text-white mr-3" data-toggle="modal" data-target="#myModal">Request Schedule</button>
                        </div>
                        <div class="card-body">
                        <table class="table">
                                <thead>
                                <tr>
                                        <th colspan="4">Date</th>
                                        <th colspan="4">AM</th>
                                        <th colspan="4">PM</th>
                                        <th colspan="4">Totals</th>
                                </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                        <th colspan="4"></th>
                                        <th colspan="2">In</th>
                                        <th colspan="2">Out</th>
                                        <th colspan="2">In</th>
                                        <th colspan="2">Out</th>
                                        <th colspan="2">Total</th>
                                        <th colspan="2">Remarks</th>
                                        </tr>
                                        <tr>
                                        <td colspan="4">2018-09-03</td>
                                        <td colspan="2">08:00</td>
                                        <td colspan="2">12:00</td>
                                        <td colspan="2">01:00</td>
                                        <td colspan="2">05:00</td>
                                        <td colspan="2">8 hours</td>
                                        <td colspan="2">On-Time</td>
                                        </tr>
                                        <tr>
                                        <td colspan="4">2018-09-04</td>
                                        <td colspan="2">08:00</td>
                                        <td colspan="2">12:00</td>
                                        <td colspan="2">01:00</td>
                                        <td colspan="2">05:00</td>
                                        <td colspan="2">8 hours</td>
                                        <td colspan="2">On-Time</td>
                                        </tr>
                                        <tr>
                                        <td colspan="4">2018-09-05</td>
                                        <td colspan="2">08:00</td>
                                        <td colspan="2">12:00</td>
                                        <td colspan="2">01:00</td>
                                        <td colspan="2">05:00</td>
                                        <td colspan="2">8 hours</td>
                                        <td colspan="2">On-Time</td>
                                        </tr>
                                        <tr>
                                        <td colspan="4">2018-09-06</td>
                                        <td colspan="2">08:00</td>
                                        <td colspan="2">12:00</td>
                                        <td colspan="2">01:00</td>
                                        <td colspan="2">05:00</td>
                                        <td colspan="2">8 hours</td>
                                        <td colspan="2">On-Time</td>
                                        </tr>
                                        <tr>
                                        <td colspan="4">2018-09-07</td>
                                        <td colspan="2">08:00</td>
                                        <td colspan="2">12:00</td>
                                        <td colspan="2">01:00</td>
                                        <td colspan="2">05:00</td>
                                        <td colspan="2">8 hours</td>
                                        <td colspan="2">On-Time</td>
                                        </tr>
                                </tbody>
                                </table>
                        </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="card mt-2 schedule-card">
                    <div class="card-header">
                        <strong>SCHEDULE</strong>
                    </div>
                     <div class="card-body">
                        <ul class="list-group">
                        @foreach($Employee_Profiles as $key => $s)
                            <li class="list-group-item">
                                <span class="day">Monday</span><span class="sched">{{ $s->Mon }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="day">Tuesday</span><span class="sched">{{ $s->Tue }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="day">Wednesday</span><span class="sched">{{ $s->Wed }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="day">Thursday</span><span class="sched">{{ $s->Thurs }}</span>
                            </li>
                            <li class="list-group-item">
                                <span class="day">Friday</span><span class="sched">{{ $s->Fri }}</span>
                            </li>
                        @endforeach
                        </ul>                    
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