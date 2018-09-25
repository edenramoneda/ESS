    
    @include('Employee.home')

    <div class="container">
            <div class="card employee-info mt-5">
                <div class="card-header text-white">
                    Employee Information
                </div>
                <div class="card-body">
                    <form action="">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Employee No:</label>
                                        <input type="number" class="form-control" name="employee_no" disabled="disabled">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Department:</label>
                                        <input type="text" class="form-control" name="department">
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
                </div>
                <div class="card-header text-white">
                    Contact Information
                </div
                 <div class="card-body">
                        <div class="row" style="padding:15px;">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Address:</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Zip Code:</label>
                                        <input type="text" class="form-control" name="zip_code">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control" name="contact_no">
                                    </div>
                                </div>
                        </div>
                    </form>
                </div
            </div>
    </div>