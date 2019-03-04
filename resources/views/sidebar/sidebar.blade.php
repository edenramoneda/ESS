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
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/pds/') }}" class="text-white">
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
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/overtime') }}">
                        <i class="fa fa-tty" aria-hidden="true"></i>   Overtime</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/reimbursement') }}">
                        <i class="fa fa-handshake" aria-hidden="true"></i> Reimbursement</a>
                        </li>
                    </ul>
                    @elseif(ACL::userACL()->class_name == 'Managerial')
                    <ul class="li-navs list-unstyled">
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/admin-dashboard') }}">
                            <i class="fa fa-tachometer-alt" aria-hidden="true"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/pds/') }}" class="text-white">
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
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/overtime') }}">
                        <i class="fa fa-tty" aria-hidden="true"></i>   Overtime</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/reimbursement') }}">
                        <i class="fa fa-handshake" aria-hidden="true"></i> Reimbursement</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/employees') }}">
                        <i class="fa fa-users" aria-hidden="true"></i> Total Employees</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/inbox') }}">
                        <i class="fa fa-inbox" aria-hidden="true"></i> Inbox</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/Employee/modules/company') }}">
                        <i class="fa fa-inbox" aria-hidden="true"></i> Company</a>
                        </li>
                    </ul>
                    @endif

        </div>

        <div class="toggle-btn" onclick="openNav()">
                <span></span>
                <span></span>
                <span></span>
        </div>
        
        <nav class="navbar justify-content-end ess-navigation">
            <li class="nav-item text-white dropdown" title="Notifications">
                <i class="fa fa-bell" data-toggle="dropdown" id="notifDrop" aria-haspopup="true" aria-expanded="false"></i><sup> <span class="badge badge-danger" id="number_notifs">0</span></sup>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifDrop" style="width: 600px">
                    <div class="card dropdown-item">
                        <div class="card-header">
                            <b>Notifications</b>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group" id="notifications-group" style="overflow-y:auto;height:50vh;">
                                
                            </div>                    
                        </div>
                    </div>
                </div>
            </li>&ensp;&ensp;

            <li class="nav-item text-white dropdown" title="Requests">
                <i class="fa fa-recycle" data-toggle="dropdown" id="notifDrop" aria-haspopup="true" aria-expanded="false"></i><sup> <span class="badge badge-danger" id="number_requests">0</span></sup>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifDrop" style="width: 600px">
                    <div class="card dropdown-item">
                        <div class="card-header">
                            <b>Request Notifications</b>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group" id="request-group" style="overflow-y:auto;height:50vh;">
                                <p class="mt-2 text-center">No Requests</p>
                            </div>                    
                        </div>
                    </div>
                </div>
            </li>&ensp;&ensp;


            <li class="nav-item text-white dropdown" title="Messages">
                <div data-toggle="dropdown">
                    <i class="fa fa-envelope"></i>
                    <sup><span class="badge badge-danger">
                        @foreach($CountMessage as $key => $CM)
                            {{$CM->Message}}
                        @endforeach
                    </span></sup>
                </div>
                 <div class="dropdown-menu dropdown-menu-right" style="width:400px;overflow-y:auto;height:50vh;">
                        <div class="card">
                            <div class="card-header">
                                <b>Messages</b>
                                <span>
                                    <i class="fa fa-pencil-alt" title="compose message" style="float:right" data-toggle="modal" data-target="#ComposeMessageModal"></i>
                                </span>
                            </div>
                            <div class="card-body p-0">
                                <ul class="list-group">
                                    @if($EmpMessage->isNotEmpty())
                                        @foreach($EmpMessage as $key => $EM)
                                            <li class="list-group-item">    
                                                <b>{{$EM->sender}}</b>&ensp;<i style="font-size:13px;">{{ $EM->title}}<br> {{$EM->date_sent}}</i><br>
                                                <p>{{ $EM->message}}</p>
                                                <i class="f-right fa fa-reply text-success" data-replysendername="{{$EM->sender}}" data-replysender="{{ $EM->employee_code }}" data-replysendermessage="{{ $EM->message}}" style="float:right" title="Reply" data-toggle="modal" data-target="#ReplyModalForm"></i>
                                            </li>
                                        @endforeach
                                    @else
                                            <li class="list-group-item">
                                                <p>No Messages</p>
                                            </li>
                                    @endif
                                </ul>                    
                            </div>
                        </div>
                </div>
            </li>&ensp;&ensp;

            <li class="nav-item text-white mr-3">
                <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('image/m.jpg') }}" height="20" width="20" class="rounded-circle"> 
                        @if(isset(Auth::user()->username))
                            {{ Auth::user()-> username }}
                        @endif
                </div>
                <div class="dropdown-menu dropdown-menu-right">
                    <button class="dropdown-item" type="button"><a href="{{ url('/Employee/AccountSettings') }}">Account Settings</a></button>
                    <button class="dropdown-item" type="button"><a href="{{ url('/logout') }}">Logout</a></button>
                </div>
            </li>
        </nav>

        <div id="overlay" style="width: 100%; opacity: 0.9;"></div>

        <div class="modal fade" id="ComposeMessageModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Compose Message</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="composeMessageForm">
                            @csrf
                            <div class="alert alert-danger form-cmMessage-err alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                All fields are required!
                            </div>
                            <div class="alert alert-success form-cmMessage-success alert-dismissible">Message Sent!</div>
                            <div class="form-group">
                                <label>Send to</label>
                                <select name="send_to" id="send_to" class="custom-select">
                                @foreach($ComposeMessage as $key => $cm)
                                    <option>{{ $cm->employee}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" name="send_message" id="send_message" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Send">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="ReplyModalForm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <label><strong>Reply To:</strong></label>
                        <input type="text" class="form-control ml-2" id="sendername" name="sendername">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="ReplyForm">
                            @csrf
                            <div class="alert alert-danger form-cmMessageReply-err alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                All fields are required!
                            </div>
                            <div class="alert alert-success form-cmMessageReply-success alert-dismissible">Message Sent!</div>
                            <div class="form-group">
                                <input type="text" id="replyempcode" name="replyempcode" hidden>
                            </div>
                            <div class="form-group">
                                <label>In Reply to:</label>
                                <textarea id="sender_message" name="sender_message" class="form-control" rows="5" readonly>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Reply</label>
                                <textarea class="form-control" name="reply_message" id="reply_message" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Send">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>