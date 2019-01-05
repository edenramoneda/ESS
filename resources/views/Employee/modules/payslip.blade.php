
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
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card mt-2 payslip">
                    <div class="card-header text-white">
                        Payment
                    </div>
                     <div class="card-body">
                         <strong>Basic:</strong> <span>1001</span><br>
                    </div>
                </div>
            </div>
             <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card mt-2 payslip">
                    <div class="card-header text-white">
                        Benefits
                    </div>
                     <div class="card-body">
                        dsds
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card mt-2 payslip">
                    <div class="card-header text-white">
                        Deduction
                    </div>
                     <div class="card-body">
                        <strong>SSS:</strong> <span>40</span><br>
                        <strong>PAG-IBIG:</strong> <span>5</span>
                    </div>
                </div>
            </div>            
        </div>
        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card mt-3 payslip">
                    <div class="card-header text-white">
                        <span class="hs">Payslip Information </span>
                            <button type="button" class="btn cb">Download PDF </button>
                            <button type="button" class="btn cb"> Print</button>
                        
                    </div>
                     <div class="card-body">
                        <strong>Employee No:</strong><span>120</span><br>
                        <strong>Name:</strong> <span>Ariel Calio Lecias</span><br>
                        <strong>Department:</strong> <span>I.T.</span><br>
                        <strong>Section:</strong> <span>Maintenance</span><br>
                        <strong>Position:</strong> <span>I.T. Manager</span><br>
                        <strong>Pay Date:</strong> <span>2018-09-12</span><br>
                        <strong>Total Earnings:</strong> <span>15000</span><br>
                        <strong>Total Benefits:</strong> <span>50000</span><br>
                        <strong>Total Deductions:</strong> <span>54700</span><br>
                        <strong>Net Amount:</strong> <span>14000</span><br>
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