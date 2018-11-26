<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Aerolink | Forgot Password</title>
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
                                 <center><h5>Forgot Password!</h5></center>
                                <p>Please enter your Email Address below and wait for the Message regarding to your 
                                    forgot password.<br><br>
                                    <b>Note: </b> Please enter the Email Address you used when you applied
                                    on the company. If that Email Address was lost. Kindly please contact your Human Resource 
                                    Department. Thank You!
                                </p>
                                <form action="" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="Username">Email</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="form-group text-center">
                                        <input type="Submit" class="btn btn-success full-width" value="Submit"><br>
                                        <a href="{{ url('/') }}">Back to Login Page</a>
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