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
                    @if(ACL::userACL()->class_name == 'Rank and File')
                    <ul class="li-navs list-unstyled">
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/dashboard') }}">
                            <i class="fa fa-tachometer-alt" aria-hidden="true"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/pds') }}" class="text-white">
                         <i class="fa fa-briefcase" aria-hidden="true"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/payslip') }}">
                        <i class="fa fa-money-bill-alt"></i> Payroll</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/schedule') }}">
                        <i class="fa fa-calendar"></i> Schedule</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/leave') }}">
                        <i class="fa fa-calendar-times" aria-hidden="true"></i> Leave</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/OverUnderTime') }}">
                        <i class="fa fa-tty" aria-hidden="true"></i>   Overtime</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/Reimbursement') }}">
                        <i class="fa fa-handshake" aria-hidden="true"></i> Reimbursement</a>
                        </li>
                    </ul>
                    @elseif(ACL::userACL()->class_name == 'Managerial')
                    <ul class="li-navs list-unstyled">
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/dashboard') }}">Mga Modules ni manager dito</a>
                        </li>
                    @endif
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
                    <i class="fa fa-bell"></i> <span class="badge badge-light">4</span>
                </button>  
            </li>&ensp;&ensp;
            <li class="nav-item">
                <button type="button" class="btn btn-custom-c"> 
                    <i class="fa fa-envelope"></i> <span class="badge badge-light">1</span>
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