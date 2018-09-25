<!DOCTYPE html>
<html>
    <head>
        <title>Aerolink | ESS </title>
        <link rel="icon" href="{{ asset('image/aerolink.png') }}">
        @extends('/layouts.header')
    </head>
    <style>
        body
        {
           background-color: #f5f5f0!important;
        }

    </style>
    <body>
      
        <div class="wrapper">
            <div class="col-lg-8 col-md-6 col-sm-6" style="padding:0">

                <nav id="sidebar">
                    <div class="banner text-center text-white p-2">
                        <img src="{{ asset('image/aerolink.png') }}"><br><h5>Aerolink</h5>           
                    </div><br>
                    <div class="sidebar-head text-center hidden-md hidden-sm text-white">
                        <img src="{{ asset('image/ariel.jpg') }}"><br>
                        <h5>Ariel Calio Lecias</h5>
                    </div><br><br><br>
                    
                    <div class="links">
                        <ul class="list-unstyled">
                            <li class="active-link"><a href="#myProfile" data-toggle="collapse" aria-expanded="false" class=" text-white dropdown-toggle">
                            <i class="fa fa-user"></i>&ensp; My Profile</a>
                                  <ul class="collapse list-unstyled" id="myProfile">
                                        <li><a href="{{ url('/Employee/modules/pds') }}" class="text-white">
                                            <i class="fas fa-address-card"></i>&ensp;
                                            Personal Data Sheet</a>
                                        </li>
                                        <li><a href="{{ url('/Employee/modules/info') }}" class="text-white">
                                            <i class="fas fa-briefcase"></i>&ensp;
                                            Employment</a>
                                        </li>
                                  </ul>
                            </li>
                            <li>
                                <a href="{{ url('/Employee/modules/payslip') }}" class="text-white sidenav-dropdown">
                                    <i class="fas fa-money-bill"></i>&ensp;
                                    Payslip</a>
                            </li>
                             <li>
                                <a href="{{ url('/Employee/modules/payslip') }}" class="text-white sidenav-dropdown">
                                    <i class="fas fa-business-time"></i>&ensp;
                                    My Schedule</a>
                            </li>
                            <li>
                                <a href="#" class="text-white sidenav-dropdown">
                                <i class="fas fa-user-clock"></i>&ensp;
                                Daily Time Record</a>
                            </li>
                            <li>
                                <a href="#myRequest" class="text-white sidenav-dropdown dropdown-toggle" data-toggle="collapse" aria-expanded="false">
                                    <i class="fa fa-envelope"></i>&ensp;
                                    Request</a>

                                    <ul class="collapse list-unstyled" id="myRequest">
                                        <li><a href="{{ url('/Employee/modules/pds') }}" class="text-white">
                                            <i class="fas fa-chalkboard-teacher"></i>&ensp;
                                            Leave</a>
                                        </li>
                                        <li><a href="{{ url('/Employee/modules/info') }}" class="text-white">
                                            <i class="fas fa-share-square"></i>&ensp;
                                            Schedule/Shift</a>
                                        </li>
                                         <li><a href="{{ url('/Employee/modules/info') }}" class="text-white">
                                            <i class="fas fa-clock"></i>&ensp;
                                            Overtime/Undertime</a>
                                        </li>
                                          <li><a href="{{ url('/Employee/modules/info') }}" class="text-white">
                                            <i class="fas fa-money-check-alt"></i>&ensp;
                                            Reimbursing</a>
                                        </li>
                                  </ul>
                            </li>
                            <li><a href="#" class="text-white">
                                <i class="fas fa-info-circle"></i>&ensp;
                                About</a></li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>

            <div id="container-fluid"> 

                <nav class="navbar ess-navigation">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="#" style="color:white">
                                <i class="fa fa-bars" id="CollapseSidebar"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                               <button type="button" class="btn btn-custom-c"> 
                                    <i class="fa fa-bell"></i>
                                        Notifications <span class="badge badge-light">4</span>
                                </button>  
                        </li>&ensp;&ensp;
                        <li class="nav-item">
                             <div class="btn-group">
                                    <button type="button" class="btn btn-custom-c dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <img src="{{ asset('image/ariel.jpg') }}" height="20" width="20" class="rounded-circle"> Ma. Eden
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