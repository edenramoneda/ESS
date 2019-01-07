
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
                                                    <option selected>Custom Select Menu</option>
                                                    <option value="volvo">Volvo</option>
                                                    <option value="fiat">Fiat</option>
                                                    <option value="audi">Audi</option>
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
                                            <button type="button" class="btn btn-sm btn-ess text-white">View</button>
                                        </td>
                                        </tr>
                                </tbody>
                                </table>
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