
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')
        <div class="container-fluid">
        <h4 class="mt-2">Profile</h4><hr>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="card custom-card employee-info mt-2" style="height:auto; overflow-y:hidden">
                    <div class="card-header text-white"><i class="fa fa-suitcase"></i> Employment Information</div>
                        <div class="card-body">
                            <div class="form-group mb-4">
                                        <center><img src="{{ asset('image/m.jpg') }}" height="140" width="120"><br>
                                @foreach($Employee_Profiles as $key => $employee)
                                <h6 class="mt-4">{{ $employee->employee_code }}</h6>
                                    <h5> 
                                        {{$employee->firstname }}
                                        {{$employee->middlename }}
                                        {{$employee->lastname }}
                                    </h5>
                                    <h6> {{ $employee->jobTitle }}</h6>
                                    </center>
                            </div>
                            <div class="form-group">
                                <h6>Date Hired</h6>
                                <input type="email" class="form-control cfg" id="email" value=" {{$employee->datehired }}">
                            </div>
                            <div class="form-group">
                                <h6>Department</h6>
                                <input type="email" class="form-control cfg" id="email" value="{{$employee->dept_name }}">
                            </div>
                            <div class="form-group">
                                <h6>Designation</h6>
                                <input type="email" class="form-control cfg" id="email" value="{{$employee->designation }}">
                            </div>
                            <div class="form-group">
                                <h6>Employee Type</h6>
                                <input type="email" class="form-control cfg" id="email" value=" {{$employee->type_name }}">
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9 pds">
                    <div class="card employee-info mt-2">
                        <form action="" method="POST">
                            <div class="card-header text-white"><i class="fa fa-user"></i>General Information</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label><b>Last Name</b> </label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->lastname }}">
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label><b>First Name </b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->firstname }}">
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label><b>Middle Name </b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->middlename }}">
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <label><b>Suffix</b></label>
                                            <input type="text" class="form-control cfg bg-light" name="middlename" value="{{ $employee->suffix_name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <label><b>Civil Status:</b></label>
                                            <input type="text" class="form-control cfg bg-light" name="date_of_birth" value="{{ $employee->civil_status }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <label><b>Date of Birth:</b></label>
                                            <input type="text" class="form-control cfg bg-light" name="date_of_birth" value="{{ $employee->date_of_birth }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2">
                                        <div class="form-group">
                                            <label><b>Birthplace:</b></label>
                                            <input type="text" class="form-control cfg bg-light" name="birthplace" value="{{ $employee->place_of_birth }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label><b>Height:</b></label>
                                                <input type="text" class="form-control cfg bg-light" name="height" value="{{ $employee->height}}">
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 col-lg-2">
                                            <div class="form-group">
                                                <label><b>Weight:</b></label>
                                                <input type="text" class="form-control cfg bg-light" name="weight" value="{{ $employee->weight}}">
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-white"><i class="fa fa-phone" aria-hidden="true"></i> Contact Information</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group">
                                                    <label><b>Contact Number:</b></label>
                                                    <input type="text" class="form-control cfg bg-light" name="weight" value="{{ $employee->epCN}}">
                                                </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label><b>Email </b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->epE }}">
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-white"><i class="fa fa-address-card" aria-hidden="true"></i> In Case of Emergency, Contact</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group">
                                                    <label><b>Complete Name</b></label>
                                                    <input type="text" class="form-control cfg bg-light" name="weight" value="{{ $employee->cn}}">
                                                </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label><b>Email </b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->fbr }}">
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label><b>Contact Number </b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->fbcn }}">
                                            </div>
                                    </div>
                                        </form>
                                </div>
                            </div>
                            <div class="card-header text-white"><i class="fa fa-users" aria-hidden="true"></i> Family Background</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                                <div class="form-group">
                                                    <label><b>Complete Name</b></label>
                                                    <input type="text" class="form-control cfg bg-light" name="weight" value="{{ $employee->cn}}">
                                                </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                            <div class="form-group">
                                                <label><b>Email</b> </label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->fbr }}">
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label><b>Contact Number</b> </label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->fbcn }}">
                                            </div>
                                    </div>
                                        </form>
                                </div>
                            </div>
                            <div class="card-header text-white"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Educational Attainment</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group">
                                                    <label><b>Level</b></label>
                                                    <input type="text" class="form-control cfg bg-light" name="weight" value="{{ $employee->el}}">
                                                </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label><b>School </b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->s }}">
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label><b>Course </b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->c }}">
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label><b>Duration</b> </label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->ead }}">
                                            </div>
                                    </div>
                                        </form>
                                </div>
                            </div>
                            <div class="card-header text-white"><i class="fa fa-suitcase" aria-hidden="true"></i> Training and Seminars Attended</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group">
                                                    <label><b>Title</b></label>
                                                    <input type="text" class="form-control cfg bg-light" name="weight" value="{{ $employee->tsTitle}}">
                                                </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label><b>Duration</b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->tsD }}">
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label><b>Type of Training</b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->tsT }}">
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label><b>Conducted by </b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->tsCB }}">
                                            </div>
                                    </div>
                                        </form>
                                </div>
                            </div>
                            <div class="card-header text-white"><i class="fa fa-briefcase" aria-hidden="true"></i>
                                Work Experience</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                <div class="form-group">
                                                    <label><b>Duration</b></label>
                                                    <input type="text" class="form-control cfg bg-light" name="weight" value="{{ $employee->ewD}}">
                                                </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label><b>Position</b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->ewP }}">
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label><b>Company</b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->ewC }}">
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                            <div class="form-group">
                                                <label><b>Employment Status</b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->ewES }}">
                                            </div>
                                    </div>
                                        </form>
                                </div>
                            </div>
                            <div class="card-header text-white"><i class="fa fa-trophy" aria-hidden="true"></i> Academic Awards</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label><b>Title of Academic Awards</b></label>
                                                    <input type="text" class="form-control cfg bg-light" name="weight" value="{{ $employee->aaT }}">
                                                </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label><b>Date Awarded</b></label>
                                                <input type="text" class="form-control cfg bg-light" name="lastname" value="{{ $employee->aaDA }}">
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <span class="pds-button">
                                <button type="button" class="btn btn-edit">
                                <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                Edit</button>
                                &ensp;
                                <input type="submit" class="fa fa-paper-plane btn btn-submit">
                            </span>  
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endsection

@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
@endsection
