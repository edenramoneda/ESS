
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')


    <div class="container">
        <h3 class="mt-2">Payroll</h3><hr>
        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card mt-2 payroll">
                        <div class="card-header">
                                <strong>PAYSLIP</strong>
                        </div>
                        <div class="card-body">
                        <table class="table">
                                <thead>
                                <tr>
                                    <th colspan="4">
                                        <form action="https://www.w3schools.com/action_page.php">
                                                Date
                                                <select name="cars" class="custom-select-md">
                                                    <option selected>Select Date</option>
                                                    <option value="volvo">2018-09-03</option>
                                                </select>

                                        </form>
                                    </th>
                                    <th colspan="4">View Payslip</th>
                                </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                        <td colspan="4">2018-09-03</td>
                                        <td colspan="4">
                                        <button type="button" class="btn btn-sm btn-ess text-white" style="float:left" data-toggle="modal" data-target="#viewPayroll">View</button>
                                        </td>
                                        </tr>
                                </tbody>
                                </table>
                        </div>
                </div>
            </div>
        </div>    

        <div class="modal fade" id="viewPayroll">
           <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Payslip</h4>&ensp;
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                     @foreach($Employee_Profiles as $key => $employee)
                     <div class="modal-body">
                        <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                <h6>Employee Code</h6>
                                <p>
                                {{$employee->employee_code }}
                                </p>
                                </div>       
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                <h6>Employee Name</h6>
                                <p>
                                {{$employee->firstname }}
                                {{$employee->middlename }}
                                {{$employee->lastname }}
                                </p>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                <h6>Period Covered</h6>
                                <p> 2019-01-04 - 2019-01-18</p>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                <h6>Days Worked</h6>
                                <p>15</p>
                                </div>              
                        </div>
                        <hr>
                     </div>
                     <div class="modal-header">
                                <h5>Earnings</h5>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-3 col-lg-3">  
                                <h6>Basic: </h6>
                                <p>3456.00</p>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <h6>Overtime: </h6>
                                <p>0.00</p>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3">
                                <h6>Allowance: </h6>
                                <p>311.00</p>
                            </div>
                        </div>
                     </div>
                     <div class="modal-header">
                                <h5>Deductions</h5>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-2 col-lg-2">  
                                <h6>Undertime: </h6>
                                <p>0.00</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <h6>Late: </h6>
                                <p>0.00</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <h6>SSS: </h6>
                                <p>90.83</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <h6>PagIBIG: </h6>
                                <p>50.00</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <h6>PhilHealth: </h6>
                                <p>31.25</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <h6>COOP: </h6>
                                <p>1,000.00</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <h6>W/hold Tax: </h6>
                                <p>0.00</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <h6>SSS Loan: </h6>
                                <p>115.36</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <h6>PagIBIG Loan: </h6>
                                <p>157.91</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <h6>COOP Loan: </h6>
                                <p>300.00</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <h6>Cash Advance: </h6>
                                <p>0.00</p>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg-2">
                                <h6>Other Loans: </h6>
                                <p>0.00</p>
                            </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                            <button type="button"  class="btn btn-ess text-white">Print</button>
                     </div>
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