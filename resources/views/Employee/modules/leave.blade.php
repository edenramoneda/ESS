
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')

    <div class="container mt-5 request-leave">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header text-center">
                            Leave Request Form
                    </div>
                    <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>Department</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="IT Department" disabled="disabled">
                                    </div>
                                </div>

                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>Name</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="Ariel Calio Lecias" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Date of Filling</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Position</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="IT Manager" disabled="disabled">
                                    </div>
                                </div>
                                 <div class="col-sm-12 col-md-4 col-lg-4">
                                    <label>Employee Type</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="Regular" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                    </div>
                     <div class="card-header text-center">
                            *Detail of Request*
                    </div>
                       <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>Type of Leave</label>
                                    <div class="form-group">
                                          <select name="cars" class="custom-select mb-3">
                                            <option selected>Vacation Leave</option>
                                            <option value="volvo">Sick Leave</option>
                                            <option value="fiat">Paternity</option>
                                            <option value="audi">Maternity</option>
                                            <option value="audi">Others</option>
                                           </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <label>*(if others is selected)*</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>        
                        </div>
                    <div class="card-header text-center">
                            *Where leave will be spent*
                    </div>
                     <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-12">
                                    <label>*In Case of Vacation Leave</label><br><br>
                            </div>

                            <div class="col-sm-12 col-md-2 col-12">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                    <label class="custom-control-label" for="customCheck">Local</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-10 col-12">
                                <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Specify....">
                                </div>
                            </div>
                               <div class="col-sm-12 col-md-2 col-12">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                    <label class="custom-control-label" for="customCheck">Abroad</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-10 col-12">
                                <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Specify....">
                                </div>
                            </div>

                                <div class="col-sm-12 col-md-12 col-12">
                                    <label>*In Case of Sick Leave</label><br><br>
                            </div>

                            <div class="col-sm-12 col-md-2 col-12">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                    <label class="custom-control-label" for="customCheck">In Hospital</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-10 col-12">
                                <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Specify....">
                                </div>
                            </div>
                               <div class="col-sm-12 col-md-2 col-12">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                    <label class="custom-control-label" for="customCheck">Out Patient</label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-10 col-12">
                                <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Specify....">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center">
                        *Number of Working Days*
                    </div>
                     <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 col-4">  
                                    <div class="form-group">
                                        <label>Request for: (days)</label>
                                        <input type="number" class="form-control" >
                                    </div>
                            </div>
                              <div class="col-sm-12 col-md-4 col-4"> 
                                      <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" class="form-control" >
                                    </div>
                            </div>
                             <div class="col-sm-12 col-md-4 col-4"> 
                                    <div class="form-group">
                                        <label>To:</label>
                                        <input type="date" class="form-control" >
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center">
                        *In case of Maternity Leave:*
                    </div>
                     <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-12">
                                    <label>*You required to attached documents*</label>  
                                     <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div><br>
                            </div>
                        </div>
                        <div class="row mt-5">
                                  <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <button class="form-control btn-success"><a href="" class="text-white">Send</a></button>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('scripts')
        <script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
@endsection