<!DOCTYPE html>
<html>
    <head>
        <title>Aerolink | ESS</title>
        <link rel="icon" href="{{ asset('image/aerolink.png') }}">
        @extends('/layouts.header')
    </head>
    <body>
        <div id="sidebar">

        <a href="javascript:void(0)" class="closebtn text-white" onclick="closeNav()"><b>&times;</b></a>
                <div class="banner text-white">
                    <div class="logo">
                        <img src="{{ asset('image/aerolink.png') }}">  
                    </div>
                    <div class="logo-name">
                        <h3>Aerolink</h3>  
                    </div>        
                </div>
                <div class="Profile text-center p-3">
                    <div class="image">
                        <img src="{{ asset('image/m.jpg') }}" height="75" width="75" class="rounded-circle">
                    </div>
                    <div class="p-info">
                        <a href="" class="nav-link text-white mt-2">
                        <!--the $Employee_Profiles is from SuccessLogin Method-->
                        @foreach($Employee_Profiles as $key => $employee)
                                    <?php echo $employee->firstname ?>
                                    <?php echo $employee->middlename ?>
                                    <?php echo $employee->lastname ?>
                                @endforeach
                        </a>
                    </div>
                </div>
                <ul class="li-navs list-unstyled">
                    <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/Employee/modules/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#myProfile" data-toggle="collapse" aria-expanded="false" class="text-white dropdown-toggle">
                            Profile <span class="custom-caret">&#9662;</span></a>
                                  <ul class="collapse list-unstyled" id="myProfile">
                                        <li class="nav-item sub-nav"><a class="nav-link text-white" href="{{ url('/Employee/modules/pds') }}" class="text-white">
                                            Personal Data Sheet</a>
                                        </li>
                                        <li class="nav-item sub-nav"><a class="nav-link text-white" href="{{ url('/Employee/modules/info') }}" class="text-white">
                                            Employment</a>
                                        </li>
                                  </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/Employee/modules/payslip') }}">Payslip</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/Employee/modules/schedule') }}">Schedule</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/Employee/modules/dtr') }}">Daily Time Record</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-white" href="#myRequest" data-toggle="collapse" aria-expanded="false" class="text-white dropdown-toggle">
                            Request <span class="custom-caret">&#9662;</span></a>
                                  <ul class="collapse list-unstyled" id="myRequest">
                                    <li class="nav-item sub-nav"><a class="nav-link text-white" href="{{ url('/Employee/modules/leave') }}" class="text-white">
                                        Leave</a>
                                    </li>
                                    <li class="nav-item sub-nav"><a class="nav-link text-white" href="{{ url('/Employee/modules/shift') }}" class="text-white">
                                        Schedule/Shift</a>
                                    </li>
                                    <li class="nav-item sub-nav"><a class="nav-link text-white" href="{{ url('/Employee/modules/OverUnderTime') }}" class="text-white">
                                        Overtime/Undertime</a>
                                    </li>
                                    <li class="nav-item sub-nav"><a class="nav-link text-white" href="{{ url('/Employee/modules/Reimbursement') }}" class="text-white">
                                        Reimbursement</a>
                                    </li>
                                  </ul>
                    </li>
                </ul>
        </div>

        <div class="toggle-btn" onclick="openNav()">
                <span></span>
                <span></span>
                <span></span>
        </div>
        
        <nav class="navbar justify-content-end ess-navigation">
            <li class="nav-item">
                <button type="button" class="btn btn-custom-c"> 
                    <i class="fa fa-bell"></i>
                    Notifications <span class="badge badge-light">4</span>
                </button>  
            </li>&ensp;&ensp;
            <li class="nav-item">
                <div class="btn-group">
                    <button type="button" class="btn btn-custom-c dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('image/m.jpg') }}" height="20" width="20" class="rounded-circle"> 
                            @if(isset(Auth::user()->username))
                                            {{ Auth::user()-> username }}
                            @endif
                            </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">Change Password</button>
                            <button class="dropdown-item" type="button"><a href="{{ url('/logout') }}">Logout</a></button>
                        </div>
                </div>
            </li>
        </nav>

        <div id="overlay" style="width: 100%; opacity: 0.9;"></div>
        
    </body>
</html>