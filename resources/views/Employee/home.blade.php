<DOCTYPE html>
<html>
    <head>
        <title>My ESS</title>
        @extends('/layouts.header')
    </head>
    <body>
      
        <div class="wrapper">
            <div class="col-lg-8 col-md-6 col-sm-6" style="padding:0">

                <nav id="sidebar">
                    <div class="sidebar-head text-center hidden-md hidden-sm text-white">
                        <img src="{{ asset('image/cat.jpg') }}"><br><br>
                        <strong>Name</strong>
                    </div><br><br>
                    
                    <div class="links">
                        <ul class="list-unstyled">
                            <li class="active-link"><a href="#" class=" text-white">My Dashboard</a></li>
                            <li><a href="{{ url('/Employee/modules') }}" class="text-white">Settings</a></li>
                            <li><a href="#" class="text-white">About</a></li>
                            <li><a href="#" class="text-white">Logout</a></li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>

            <div id="container-fluid"> 

                <nav class="navbar ess-navigation">
                    <ul class="nav">
                            <a href="#" style="color:white">
                                <span class="fa fa-bars" id="CollapseSidebar"></span>
                            </a>
                    </ul>  
                </nav>
            
            </div>

            <div class="container">
                    <div class="row mt-5">
                          <div class="col-md-4 text-center">   
                            <div class="card">
                                <div class="card-body">
                                    <a href=""><p>New Hire on Board</p>
                                        <img src="{{ asset('image/new_hire_on_board.png') }}" class="img-h-w"> 
                                    </a>
                                </div>
                            </div>
                        </div>

                          <div class="col-md-4 text-center">   
                            <div class="card">
                                <div class="card-body">
                                    <a href=""><p>Timesheet</p>
                                        <img src="{{ asset('image/Timesheet_300px.png') }}" class="img-h-w"> 
                                    </a>
                                </div>
                            </div>
                        </div>

                          <div class="col-md-4 text-center">   
                            <div class="card">
                                <div class="card-body">
                                    <a href=""><p>Payroll</p></a>
                                    <img src="{{ asset('image/Payroll_300px.png') }}" class="img-h-w">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row mt-5">
                          <div class="col-md-4 text-center">   
                            <div class="card">
                                <div class="card-body">
                                  <a href=""><p>Perfomance Management</p></a>   
                                   <img src="{{ asset('image/performance.png') }}" class="img-h-w">   
                                </div>
                            </div>
                        </div>

                          <div class="col-md-4 text-center">   
                            <div class="card">
                                <div class="card-body">
                                    <a href=""><p>Scheduling</p></a>
                                      <img src="{{ asset('image/Schedule_300px.png') }}" class="img-h-w">  
                                </div>
                            </div>
                        </div>

                          <div class="col-md-4 text-center">   
                            <div class="card">
                                <div class="card-body">
                                    <a href=""><p>Leave Management</p></a>
                                     <img src="{{ asset('image/Leave_300px.png') }}" class="img-h-w">  
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
    </body>
</html>