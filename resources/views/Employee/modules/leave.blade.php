
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')

    <div class="container-fluid mt-2">
        <h3>Leave</h3>
        <hr>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card mt-2 request-leave">
                        <div class="card-header">
                                <strong>LEAVE DETAILS</strong>
                                <button type="button" class="btn btn-ess text-white" data-toggle="modal" data-target="#myModal">Request Leave</button>
                        </div>
                        <div class="card-body">
                        <table class="table">
                                <thead>
                                <tr>
                                    <th>Type of Leave</th>
                                    <th colspan="4">Reason</th>
                                    <th>Days of Leave</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Attachment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                     <td>Sick Leave</td>
                                     <td colspan="4">Magkakasakit ako sa katamaran</td>
                                     <td>3</td>
                                     <td>2019-01-01</td>
                                     <td>2019-01-03</td>
                                     <td>Medical.pdf</td>
                                     <td>Pending</td>
                                     <td>Button Here</td>
                                    </tr>
                                </tbody>
                                </table>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">  Leave Request Form</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      @foreach($Employee_Profiles as $key => $leaveRequest)
          <form action="" method="POST">
            <div class="form-group">
                <label for="usr">Name:</label>
                <input type="text" class="form-control" value="{{ $leaveRequest->firstname . ' ' . $leaveRequest->middlename . ' ' . $leaveRequest->lastname}}" disabled="disabled">
            </div>
            <div class="form-group">
                <label>Position</label>     
                <input type="text" class="form-control" value="{{ $leaveRequest->title }}" disabled="disabled">
            </div>
            <div class="form-group">
                <label>Department</label>     
                <input type="text" class="form-control" value="{{ $leaveRequest->dept_name}}" disabled="disabled">
            </div>
            <div class="form-group">
                <label>Employee Type</label>     
                <input type="text" class="form-control" value="{{ $leaveRequest->type_name }}" disabled="disabled">
            </div>
            <div class="form-group">
                <label>Type of Leave</label>
                <select name="cars" class="custom-select">
                    <option selected>Vacation Leave</option>
                    <option value="volvo">Sick Leave</option>
                    <option value="fiat">Paternity</option>
                    <option value="audi">Maternity</option>
                    <option value="audi">Others</option>
                </select>
            </div>
            <div class="form-group">
                <label>*(if others is selected)*</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Reason</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Days of Leave</label>
                <input type="number" class="form-control" >
            </div>
            <div class="form-group">
                <label>Start Date</label>
                <input type="date" class="form-control">
            </div>
            <div class="form-group">
                <label>End Date</label>
                <input type="date" class="form-control">
            </div>
            <div class="form-group">
                <label>Attachment</label>
                <input type="file" class="form-control">        
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-success">
            </div>
          </form>
      @endforeach
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