
@extends('layouts.test')

@section('stylesheets')
            
<link rel="stylesheet" href="{{ url('fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
        <meta charset="utf-8">
@endsection

@section('content')


    <div class="container-fluid">
        <h3 class="mt-2">Payroll</h3><hr>
        <div class="row">
           <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card mt-2 payroll">
                    <div class="card-header">
                        <strong>PAYSLIP</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-lg-3 mt-3">
                                <strong class="p-2 m-3">Select Date</strong>
                                <button id="btnPayButton" class="btn btn-success btn-md p-2 m-3">View the payslips for the selected date</button>
                                <select multiple class="form-control m-1" id="sel2" name="sellist2" style="height:80vh">
                                    @foreach($Payslip as $key => $P)
                                    <option value="{{$P->date_released}}">{{$P->date_released}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-9 mt-9 mt-3">
                                <h5 class="text-center">Payslip Viewer</h5>
                                <div id="payslip-container" class="row mt-3"></div>
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
        <script type="text/javascript" src="{{ url('js/swal.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/synapse.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/style.js') }}"></script>
        <script type="text/javascript" src="{{ url('js/Chart.min.js') }}"></script>
@endsection