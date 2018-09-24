<!DOCTYPE html>
<html>
    <head>
        <title>My ESS</title>
        @extends('/layouts.header')
    </head>
    <body>
      
        <div class="wrapper">
            <div class="col-lg-8 col-md-6 col-sm-6" style="padding:0">

                <nav id="sidebar">
                    <div class="banner text-center text-white p-2">
                        <img src="{{ asset('image/aerolink.png') }}"><br><h5>Aerolink</h5>           
                    </div><br>
                    <div class="sidebar-head text-center hidden-md hidden-sm text-white">
                        <img src="{{ asset('image/m.jpg') }}"><br>
                        <h5>Marc Carlos De Leon</h5>
                    </div><br><br><br>
                    
                    <div class="links">
                        <ul class="list-unstyled">
                            <li class="active-link"><a href="#myProfile" data-toggle="collapse" aria-expanded="false" class=" text-white dropdown-toggle">My Profile</a>
                                  <ul class="collapse list-unstyled" id="myProfile">
                                        <li><a href="{{ url('/Employee/modules/pds') }}" class="text-white">Personal Data Sheet</a></li>
                                        <li><a href="{{ url('/Employee/modules/info') }}" class="text-white">Employment</a></li>
                                  </ul>
                            </li>
                            <li>
                                <a href="{{ url('/Employee/modules/payslip') }}" class="text-white sidenav-dropdown">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    Payslip</a>
                            </li>
                             <li>
                                <a href="{{ url('/Employee/modules/payslip') }}" class="text-white sidenav-dropdown">
                                    <i class="fa fa-money" aria-hidden="true"></i>
                                    My Schedule</a>
                            </li>
                            <li>
                                <a href="#" class="text-white sidenav-dropdown">Daily Time Record</a>
                            </li>
                            <li>
                                <a href="#" class="text-white sidenav-dropdown">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    Request</a>
                            </li>
                            <li><a href="#" class="text-white">About</a></li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>

            <div id="container-fluid"> 

                <nav class="navbar ess-navigation">
                    <ul>
                        <a href="#" style="color:white">
                           <i class="fa fa-bars" id="CollapseSidebar"></i>
                         </a>
                    </ul>
                    <ul class="nav">
                            <li>
                                <button type="button" class="btn btn-custom-c"> 
                                    <i class="fa fa-bell"></i>
                                        Notifications <span class="badge badge-light">4</span>
                                </button>  
                            </li>&ensp;&ensp;
                            <li>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-custom-c dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <img src="{{ asset('image/m.jpg') }}" height="20" width="20" class="rounded-circle">&ensp; Ma. Eden
                                    </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Change Password</button>
                                            <button class="dropdown-item" type="button">Logout</button>
                                        </div>
                                </div>
                            </li>            
                    </ul>  
                </nav>           
            </div>          
    </body>
</html>