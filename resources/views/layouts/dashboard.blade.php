<!DOCTYPE html>
<html>
    <title>Employee | NHB</title>
    @extends('header')

    <body>

        <nav class="navbar navbar-expand-md ess-navigation">
            <a class="navbar-brand" href="#">Navbar</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Back to Home</a>
                    </li>
                </ul>
            </div>  
</nav>

    </body>
</html>