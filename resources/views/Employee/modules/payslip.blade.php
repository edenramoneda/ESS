
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card mt-5 payslip">
                    <div class="card-header text-white">
                        Payment
                    </div>
                     <div class="card-body" style="overflow-y:scroll">
                         <b>Basic:</b> <span>1001</span><br>
                    </div>
                </div>
            </div>
             <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card mt-5 payslip">
                    <div class="card-header text-white">
                        Benefits
                    </div>
                     <div class="card-body" style="overflow-y:scroll">
                        dsds
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="card mt-5 payslip">
                    <div class="card-header text-white">
                        Deduction
                    </div>
                     <div class="card-body" style="overflow-y:scroll">
                        <b>SSS:</b> <span>40</span><br>
                        <b>PAG-IBIG:</b> <span>5</span>
                    </div>
                </div>
            </div>            
        </div>
        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card mt-5 payslip">
                    <div class="card-header text-white">
                        Payslip Information 
                            <button type="button" class="btn">Download PDF</button>&ensp;
                            <button type="button" class="btn">Print</button>
                        
                    </div>
                     <div class="card-body" style="overflow-y:scroll">
                        <b>Employee No:</b><span>120</span><br>
                        <b>Name:</b> <span>Ariel Calio Lecias</span><br>
                        <b>Department:</b> <span>I.T.</span><br>
                        <b>Section:</b> <span>Maintenance</span><br>
                        <b>Position:</b> <span>I.T. Manager</span><br>
                        <b>Pay Date:</b> <span>2018-09-12</span><br>
                        <b>Total Earnings:</b> <span>15000</span><br>
                        <b>Total Benefits:</b> <span>50000</span><br>
                        <b>Total Deductions:</b> <span>54700</span><br>
                        <b>Net Amount:</b> <span>14000</span><br>
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