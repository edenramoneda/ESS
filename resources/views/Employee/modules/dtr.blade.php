    @include('Employee.home')

    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="sel1">Month of</label>
                      <input type="date" class="form-control">
                    </div>
            </div>
              <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="form-group">
                        <label for="sel1">To</label>
                       <input type="date" class="form-control">
                    </div>
            </div>
        </div>
        <div class="row dtr">
            <div class="col-sm-12 col-md-12 col-lg-12">
               <table class="table">
                    <thead class="text-white">
                    <tr>
                        <th colspan="4">Date</th>
                        <th colspan="4">AM</th>
                        <th colspan="4">PM</th>
                        <th colspan="4">Totals</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr class="text-white">
                            <th colspan="4"></th>
                            <th colspan="2">In</th>
                            <th colspan="2">Out</th>
                            <th colspan="2">In</th>
                            <th colspan="2">Out</th>
                            <th colspan="2">Total</th>
                            <th colspan="2">Remarks</th>
                        </tr>
                         <tr>
                            <td colspan="4">2018-09-03</td>
                            <td colspan="2">08:00</td>
                            <td colspan="2">12:00</td>
                            <td colspan="2">01:00</td>
                            <td colspan="2">05:00</td>
                            <td colspan="2">8 hours</td>
                            <td colspan="2">On-Time</td>
                        </tr>
                          <tr>
                            <td colspan="4">2018-09-04</td>
                            <td colspan="2">08:00</td>
                            <td colspan="2">12:00</td>
                            <td colspan="2">01:00</td>
                            <td colspan="2">05:00</td>
                            <td colspan="2">8 hours</td>
                            <td colspan="2">On-Time</td>
                        </tr>
                          <tr>
                            <td colspan="4">2018-09-05</td>
                            <td colspan="2">08:00</td>
                            <td colspan="2">12:00</td>
                            <td colspan="2">01:00</td>
                            <td colspan="2">05:00</td>
                            <td colspan="2">8 hours</td>
                            <td colspan="2">On-Time</td>
                        </tr>
                          <tr>
                            <td colspan="4">2018-09-06</td>
                            <td colspan="2">08:00</td>
                            <td colspan="2">12:00</td>
                            <td colspan="2">01:00</td>
                            <td colspan="2">05:00</td>
                            <td colspan="2">8 hours</td>
                            <td colspan="2">On-Time</td>
                        </tr>
                          <tr>
                            <td colspan="4">2018-09-07</td>
                            <td colspan="2">08:00</td>
                            <td colspan="2">12:00</td>
                            <td colspan="2">01:00</td>
                            <td colspan="2">05:00</td>
                            <td colspan="2">8 hours</td>
                            <td colspan="2">On-Time</td>
                        </tr>
                    </tbody>
                </table>
            </div>
              
        </div>
    </div>