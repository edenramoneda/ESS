
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')

<div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 col-md-6 col-lg-4">
                      <div class="form-group">
                        <select class="form-control" id="sel1" name="sellist1">
                            <option>January 2018</option>
                            <option>February 2018</option>
                            <option>March 2018</option>
                            <option>April 2018</option>
                            <option>May 2018</option>
                            <option>June 2018</option>
                            <option>July 2018</option>
                            <option>August 2018</option>
                            <option>September 2018</option>
                            <option>October 2018</option>
                            <option>November 2018</option>
                            <option>December 2018</option>
                        </select>
                    </div>
            </div>
        </div>

        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12">
              
            </div>
        </div>    
    </div>
    @endsection

@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
@endsection