<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Aerolink | ESS Login</title>
        <link rel="icon" href="{{ asset('image/aerolink.png') }}">   
         @extends('layouts.page')       
    </head>
    <body>
        <div class="overlay"></div>
        
        <div class="login-form">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{ asset('image/aerolink.png') }}">
                                <h2> Aerolink <br><span>Employee Self Service</span></h2>
                                
                            </div>
                            <div class="card-body">
                                 <center><h5>Welcome to our ESS!</h5></center>
                                <p>Kindly Please enter your provided username and password and press login button.
                                    If you need assistance with logging in. Please contact your Human Resources
                                    Department. Thank You!
                                </p>

                                @if(isset(Auth::user()->username))
                                    <script>window.location = "/successlogin"</script>
                                @endif


                                @if($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                               {{-- displays validation --}}
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </div>
                                @endif


                                <form action="{{ url('/checklogin')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="username" class="form-control" name="username">
                                    </div>  

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password">
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="Submit" class="btn btn-success full-width">Login</button><br>
                                        <a href="{{ url('/forgot-password')}}">Forgot Password?</a>
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>