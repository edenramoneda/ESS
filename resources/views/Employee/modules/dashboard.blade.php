
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')
<div id="overlay" style="width: 100%; opacity: 0.9;"></div>
 <div class="container-fluid dashboard">
        <h2 class="mt-2">Dashboard</h2><hr>
        <div class="row">
             <div class="col-sm-4 col-md-3 col-lg-3">
                <div class="card mt-2">
                    <div class="card-header text-white">
                        Remaining Leaves
                    </div>
                     <div class="card-body">
                         <strong>15</strong> <span>Vacation Leave</span><br>
                         <strong>15</strong> <span>Sick Leave</span><br>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3 col-lg-3">
                <div class="card mt-2">
                    <div class="card-header text-white">
                        Leave Requests Status
                    </div>
                     <div class="card-body">
                     <strong>1</strong> <span>Approved</span><br>
                     <strong>1</strong> <span>Denied</span><br>
                    </div>
                </div>
            </div>  
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card mt-2">
                    <div class="card-header text-white">
                        Leave Requisitions
                    </div>
                     <div class="card-body">
                     <strong>3 Days</strong> <span>Vacation Leave</span><br>
                     <strong>2 Days</strong> <span>Sick Leave</span><br>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="card mt-2 announcement">
                    <div class="card-header text-white">
                    <i class="fa fa-bullhorn" aria-hidden="true"></i>
                        <strong> ANOUNCEMENT </strong>
                    </div>
                    @foreach($Announcement as $key => $announcement)
                     <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                            <b>{{ $announcement->announcement_title }}</b><br><i style="font-size:11px;">{{ $announcement->date }}</i><br><br>
                            {{ $announcement->announcement_content}}</li>
                        </ul>                    
                    </div>
                    @endforeach
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
