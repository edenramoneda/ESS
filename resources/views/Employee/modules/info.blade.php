
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')

    <div class="container">
            <div class="card employee-info mt-5">
                <div class="card-header text-white">
                    Employee Information
                </div>
                <div class="card-body">
                    @foreach($Employee_Profiles as $key => $employee)
                     @endforeach</h5>
                    <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Employee No:</label>
                                        <input type="text" class="form-control" name="employee_no" disabled="disabled" value="{{ $employee->employee_code }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Department:</label>
                                        <input type="text" class="form-control" name="department" disabled="disabled" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Job Position:</label>
                                        <input type="text" class="form-control" name="job_position" disabled="disabled" value="{{ $employee->title}}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Designation:</label>
                                        <input type="text" class="form-control" name="section" disabled="disabled" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Date Hired:</label>
                                        <input type="text" class="form-control" name="date_hired" disabled="disabled" value="{{ $employee->datehired }}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Employee Type:</label>
                                        <input type="text" class="form-control" name="employee_type" disabled="disabled" value="">
                                    </div>
                                </div>
                            </div>                                   
                </div>
                <div class="card-header text-white">
                    Contact Information
                </div>

                 <div class="card-body">
                        <div class="row" style="padding:15px;">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input type="text" class="form-control" name="address" disabled="disabled" value="Dela Costa Quezon City">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Zip Code:</label>
                                        <input type="text" class="form-control" name="zip_code" disabled="disabled" value="1800">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" name="email" disabled="disabled" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control" name="contact_no" disabled="disabled" value="">
                                    </div>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    @endsection

@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.min.js') }}"></script>
@endsection