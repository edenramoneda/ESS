<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ESS</title>
            @extends('layouts.header');      
    </head>
    <style>
    body
    {
            background: #11998e; /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #11998e, #38ef7d); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #11998e, #38ef7d); 
    }
    </style>
    <body>
        <div class="container login-form">
            <div class="card">
                <div class="card-header bg-info text-white"><h2>Login Form</h2></div>
                <div class="card-body">
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
                            <button type="Submit" class="btn btn-primary full-width">Login</button><br><br>
                            <a href="">Forgot Password?</a>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>