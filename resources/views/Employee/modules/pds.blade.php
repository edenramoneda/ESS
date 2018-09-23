    
        
    @include('Employee.home')

    <div class="container">
            <div class="card employee-info mt-5">
                <div class="card-header text-white">
                    Personal Data Sheet
                </div>
                <div class="card-body">
                    <form action="">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                       <center><img src="{{ asset('image/m.jpg') }}" height="120" width="120"></center>
                                        <center>
                                            <h5>Marc Carlos De Leon</h5>
                                            <h6>I.T. Manager</h6>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="custom-file mb-3">
                                                    <input type="file" class="custom-file-input" id="customFile" name="filename">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Job Position:</label>
                                        <input type="text" class="form-control" name="job_position">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Section:</label>
                                        <input type="text" class="form-control" name="section">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Date Hired:</label>
                                        <input type="date" class="form-control" name="date_hired">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Division:</label>
                                        <input type="text" class="form-control" name="division">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Employee Type:</label>
                                        <input type="text" class="form-control" name="employee_type">
                                    </div>
                                </div>
                            </div> 
                    </form>                                  
                </div>
    
    </div>