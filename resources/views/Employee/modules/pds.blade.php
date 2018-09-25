    
        
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
                                       <center><img src="{{ asset('image/ariel.jpg') }}" height="120" width="120"></center>
                                        <center>
                                            <h5>Ariel Calio Lecias</h5>
                                            <h6>I.T. Manager</h6>
                                        </center>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <div class="custom-file mb-3">
                                                    <input type="file" class="custom-file-input" id="customFile" name="browse_photo">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Last Name:</label>
                                        <input type="text" class="form-control" name="lastname">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>First Name:</label>
                                        <input type="text" class="form-control" name="firstname">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Middle Name:</label>
                                        <input type="text" class="form-control" name="middlename">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Date of Birth:</label>
                                        <input type="date" class="form-control" name="date_of_birth">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Birthplace:</label>
                                        <input type="text" class="form-control" name="birthplace">
                                    </div>
                                </div>
                                   <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select name="gender" class="custom-select">
                                                <option value="Male" selected>Male</option>
                                                <option value="Female" selected>Female</option>
                                            </select>
                                        </div>
                                </div>
                                  <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Height:</label>
                                             <input type="text" class="form-control" name="height">
                                        </div>
                                </div>
                                  <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Weight:</label>
                                             <input type="text" class="form-control" name="weight">
                                        </div>
                                </div>  
                                  <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Nationality:</label>
                                             <input type="text" class="form-control" name="nationality">
                                        </div>
                                </div> 
                                   <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Religion:</label>
                                             <input type="text" class="form-control" name="religion">
                                        </div>
                                </div>      
                            </div> 
                    </form>                                  
                </div>
    
    </div>