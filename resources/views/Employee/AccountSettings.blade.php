
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')
<div id="overlay" style="width: 100%; opacity: 0.9;"></div>
 <div class="container">
    <div class="card mt-5">
        <div class="card-header"><strong>Manage your Account</strong></div>
        @foreach($AccountSettings as $key => $AS)
        <div class="card-body">
            <div class="container">
                <form action="/action_page.php" method="POST">
                    <img src="{{ asset('image/m.jpg') }}" height="140" width="120" class="float-left mr-4">
                    <div class="form-group">
                        <h6 class="pt-3">Change Profile Picture</h6>
                        <input type="file" name="profile">
                    </div><br><br><br>
                    <div class="form-group">
                        <h6>Change Username</h6>
                        <input type="text" class="form-control" placeholder="Enter Username" name="username" value="{{ $AS->username }}">
                    </div>
                    <div class="form-group">
                        <h6>Change Password</h6>
                        <input type="password" class="form-control" placeholder="Enter password" name="pswd" value="{{ $AS->password }}">
                    </div>
                    <button type="submit" class="btn btn-ess text-white">Submit</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
       
</div>

@endsection

@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
@endsection
