    
        
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
                                            <h5>    
                                                @foreach($Employee_Profiles as $key => $employee)
                                                    <?php echo $employee->firstname ?>
                                                    <?php echo $employee->middlename ?>
                                                    <?php echo $employee->lastname ?>
                                                @endforeach</h5>

                                            <h6>{{ $employee->title }}</h6>
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
                                        <input type="text" class="form-control" name="lastname" value="{{ $employee->lastname }}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>First Name:</label>
                                        <input type="text" class="form-control" name="firstname" value={{ $employee->firstname }} disabled="disabled">
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Middle Name:</label>
                                        <input type="text" class="form-control" name="middlename" value="{{ $employee->middlename }}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Date of Birth:</label>
                                        <input type="text" class="form-control" name="date_of_birth" value="{{ $employee->date_of_birth }}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Birthplace:</label>
                                        <input type="text" class="form-control" name="birthplace" value="{{ $employee->place_of_birth }}" disabled="disabled">
                                    </div>
                                </div>
                                   <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Gender:</label>
                                            <select name="gender" class="custom-select" value="{{ $employee->gender }}" disabled="disabled">
                                                <option value="Male">Male</option>
                                                <option value="Female" >Female</option>
                                            </select>
                                        </div>
                                </div>
                                  <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Height:</label>
                                             <input type="text" class="form-control" name="height" value="{{ $employee->height}}" disabled="disabled">
                                        </div>
                                </div>
                                  <div class="col-sm-4 col-md-4 col-lg-4">
                                        <div class="form-group">
                                            <label>Weight:</label>
                                             <input type="text" class="form-control" name="weight" value="{{ $employee->weight}}" disabled="disabled">
                                        </div>
                                </div>  

                                 <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="form-group">
                                             <button class="form-control btn-success"><a href="" class="text-white">Update Info</a></button>
                                        </div>
                                </div>
                            </div> 
                    </form>                                  
                </div>
    
    </div>