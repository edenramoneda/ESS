
@extends('layouts.test')

@section('stylesheets')
            
        <link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
        <style>
            .welcome-container{
                margin:0 auto;
            }
            .welcome-text{
                    font-size: 50px;
                }
            .img-welcome{
                opacity:0.5;
            }
        </style>
        @endsection

@section('content')
        <div class="container">
            <div class="welcome-container mt-5">
                <center><img src="{{ asset('image/aerolink.png') }}" class="img-welcome">
                    <h5 class="welcome-text mt-4 text-secondary">Welcome to AeroLink</h5>
                    <h6 style="font-size:40px;" class="text-secondary">Employee Self-Service</h6>
                </center>
            </div>
            
        </div>
@endsection
@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/synapse.js') }}"></script>
       
@endsection
