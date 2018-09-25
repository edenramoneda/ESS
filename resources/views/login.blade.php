<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Aerolink | ESS Login</title>
        <link rel="icon" href="{{ asset('image/aerolink.png') }}">   
        @extends('layouts.header')         
    </head>
    <style>
    body
    {
                background-image:url("{{ asset('image/Human-Resources.jpg') }}");
                background-position:center;
                background-size:cover;
                width:100%;
                height:100vh;
                overflow:hidden !important;
    }
    .overlay
        {
                width: 100%;
                height: 100vh;
                z-index:5;
                background: #11998e; /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #11998e, #38ef7d); /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #11998e, #38ef7d); 
                position: absolute;
                opacity: .8;
        }
    </style>
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
                                 <h5>Welcome to our ESS!</h5>
                                <p>Kindly Please enter your provided username and password and press login button.
                                    If you need assistance with logging in. Please contact your Human Resources
                                    Department. Thank You!
                                </p>
                                <form action="">
                                    <div class="form-group">
                                        <label for="Username">Username</label>
                                        <input type="text" class="form-control">
                                    </div>  

                                    <div class="form-group">
                                        <label for="Password">Password</label>
                                        <input type="password" class="form-control">
                                    </div> <br>

                                    <div class="form-group text-center">
                                        <button type="Submit" class="btn btn-success full-width">Login</button><br><br>
                                        <a href="">Forgot Password?</a>
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