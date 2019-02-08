
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')
        <div class="container" id="pds">
            <h4 class="mt-2">Profile
           <!-- <a href="{{ url('/Employee/modules/pds/generate_pds') }}" class="btn btn-ess text-white">
            Print PDS</a>-->
            </h4>

            <hr>
            @foreach($temp_PDS as $key => $employee)
             <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                        <i class="fa fa-suitcase"></i> 
                        <strong>Employment Information</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-4 d-flex justify-content-start">
                                    <img src="{{ asset('image/m.jpg') }}" height="140" width="120">
                                    <div class="pl-3">
                                        <h4>{{ $employee->employee_code }}</h4>
                                            <h2 style="margin-top: -4%;"> 
                                                {{$employee->firstname }}
                                                {{$employee->middlename }}
                                                {{$employee->lastname }}
                                            </h2>
                                        <h6> <i class="text-grey">{{ $employee->jobTitle }} </i> </h6>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 col-2 d-flex justify-content-start">
                                    <div>
                                        <h6>Date Hired</h6>
                                        <p>{{$employee->datehired }}</p>
                                    </div>    
                                </div>
                                <div class="col-sm-12 col-md-2 col-2 d-flex justify-content-start">
                                    <div>
                                        <h6>Department</h6>
                                        <p>{{$employee->dept_name }}</p>
                                    </div>      
                                </div>
                                <div class="col-sm-12 col-md-2 col-2 d-flex justify-content-start">
                                    <div>
                                        <h6>Designation</h6>
                                        <p>{{$employee->designation }}</p>
                                    </div>    
                                </div>
                                <div class="col-sm-12 col-md-2 col-2 d-flex justify-content-start">
                                    <div>
                                        <h6>Employee Type</h6>
                                        <p>{{$employee->type_name }}</p>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             <div class="row gen-info ">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="card mt-5">
                        <div class="card-header">
                        <i class="fa fa-user"></i> 
                        General Information
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-12">
                                    <div>
                                        <strong>Last Name:</strong>
                                        <span>{{ $employee->lastname }}</span><br>
                                        <strong>First Name:</strong>
                                        <span>{{ $employee->firstname }}</span><br>
                                        <strong>Middle Name:</strong>
                                        <span>{{ $employee->middlename }}</span><br>
                                        <strong>Suffix:</strong>
                                        <span>{{ $employee->suffix_name }}</span><br>
                                        <strong>Civil Status:</strong>
                                        <span>{{ $employee->civil_status }}</span><br>
                                        <strong>Date of Birth:</strong>
                                        <span>{{ $employee->date_of_birth }}</span><br>
                                        <strong>Birthplace:</strong>
                                        <span>{{ $employee->place_of_birth }}</span><br>
                                        <strong>Height:</strong>
                                        <span>{{ $employee->height }}</span><br>
                                        <strong>Weight:</strong>
                                        <span>{{ $employee->weight }}</span><br>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="card mt-5">
                        <div class="card-header">
                        <i class="fa fa-phone"></i> 
                        Contact Information
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-12">
                                    <div>
                                        <strong>Contact Number:</strong>
                                        <span>{{ $employee->epCN }}</span><br>
                                        <strong>Email:</strong>
                                        <span>{{ $employee->epE }}</span><br>    
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                        <i class="fa fa-phone"></i> 
                        In Case of Emergency
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-12">
                                    <div>
                                        <strong>Name:</strong>
                                        <span>{{ $employee->fbcomname }}</span><br>
                                        <strong>Contact:</strong>
                                        <span>{{ $employee->fbcn }}</span><br>    
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="card mt-5">
                        <div class="card-header">
                        <i class="fa fa-users"></i> 
                        <strong>Family Background</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-12">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Contact Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($FamilyBackground as $key => $FB)
                                            <tr>
                                                 <td>{{ $FB->complete_name }}</td>
                                                 <td>{{ $FB->contact_number }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             <div class="row gen-info">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i> <strong>Educational Attainment</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-12">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Level</th>
                                                    <th>School</th>
                                                    <th>Course</th>
                                                    <th>Duration</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($EducationalAttainment as $key => $EA)
                                                <tr>
                                                    <td>{{ $EA->educ_level }}</td>
                                                    <td>{{ $EA->school }}</td>
                                                    <td>{{ $EA->course }}</td>
                                                    <td>{{ $EA->duration }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             <div class="row gen-info">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <i class="fa fa-suitcase" aria-hidden="true"></i> <strong>Training and Seminars Attended</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-12">
                                    <div class="container-fluid">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Training Title</th>
                                                    <th>Duration</th>
                                                    <th>Type of Training</th>
                                                    <th>Conducted</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($EmployeeTraining as $key => $ET)
                                                <tr>
                                                    <td>{{ $ET->title }}</td>
                                                    <td>{{ $ET->duration }}</td>
                                                    <td>{{ $ET->type }}</td>
                                                    <td>{{ $ET->conducted_by }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             <div class="row gen-info">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <strong>Work Experience</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-12">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Duration</th>
                                                    <th>Position</th>
                                                    <th>Company</th>
                                                    <th>Employment Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($EmployeeWorkExp as $key => $EWE)
                                                <tr>
                                                    <td>{{ $EWE->duration }}</td>
                                                    <td>{{ $EWE->position }}</td>
                                                    <td>{{ $EWE->company }}</td>
                                                    <td>{{ $EWE->employment_status }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             <div class="row gen-info">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="card mt-3">
                        <div class="card-header">
                            <i class="fa fa-trophy" aria-hidden="true"></i> <strong>Academic Awards</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-6">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Date Awarded</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($AcademicAwards as $key => $EAA)
                                                <tr>
                                                    <td>{{ $EAA->title }}</td>
                                                    <td>{{ $EAA->date_awarded }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="card mt-3">
                        <div class="card-header">
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                            <strong>Government IDs</strong>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-6">
                                        @foreach($GovIDs as $key => $GIDs)
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-12">
                                                    <div>
                                                        <strong>SSS:</strong>
                                                        <span>{{ $GIDs->SSS_num }}</span><br>
                                                        <strong>TIN:</strong>
                                                        <span>{{ $GIDs->TIN_num }}</span><br>
                                                        <strong>PAGIBIG:</strong>
                                                        <span>{{ $GIDs->Pagibig_num }}</span><br>
                                                        <strong>PhilHealth:</strong>
                                                        <span>{{ $GIDs->Philhealth_num }}</span><br>
                                                    </div>    
                                                </div>
                                            </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div> 
             @endforeach
        </div>
    @endsection

@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.min.js') }}"></script>
@endsection
