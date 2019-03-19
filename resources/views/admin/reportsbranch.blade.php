@extends('admin.layouts.admin')
@section('content')
<div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 hidden-print">
              <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-reorder"></i> Generate Report 
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form action="/admin/report/generate/branch" method="post">
                                {{ csrf_field() }}   
                                <div class="box-body">
                                        <div class="form-group">
                                        <label for="">From: </label>
                                            <input type="date" class="form-control" name="from" required/>
                                        </div>
                                        <div class="form-group">
                                        <label for="">To: </label>
                                            <input type="date" class="form-control" name="to" required/>
                                            <input type="hidden" class="form-control" name="branch" value="{{$branchid}}"/>
                                        </div>
                                </div>
                                <div class="" style="padding:20px;">
                                    <button type="submit" class="pull-right btn btn-default" id="sendEmail">Generate Report <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                       </form>
                  </div>
              </div>
              <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-reorder"></i> Report by Branch
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  @foreach($dataBranch as $Branch)
                  
                    <a href="/admin/report/branch/{{$Branch->id}}" class="btn btn-app"> <i class="fa fa-sitemap"></i><span class="shortcut-label">{{$Branch->branch_name}}</span> </a>
                      @endforeach
                  </div>
              </div>
          </div>

        <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
                    <h2><i class="fa fa-reorder"></i> Sales Report
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>OR Number </th>
                          <th>Processed by</th>
                          <th>Amount Paid</th>
                        
                          <th>Total Amount</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $totalamount= 0;?>
                        @foreach($reportPurchase as $Purchase)
                        
                        <tr>
                        <td align="center" style="text-align:center">{{$Purchase->date}}</td>
                          <td><a href="/admin/vieworder/{{$Purchase->orderNumber}}">{{$Purchase->ornumber}}</a></td>
                          <td>{{$Purchase->cashier->name}}</td>
                          <td>{{number_format($Purchase->amountpaid,2)}}</a></td>
                          
                          <td>{{number_format($Purchase->amount,2)}}</em>  </td>
                          <td>
                            <?php 
                            if($Purchase->status == 0){
                              $totalamount = $totalamount + $Purchase->amount; 
                              echo "Accepted";
                            }
                            elseif($Purchase->status == 1){
                            echo "Cancelled";
                            }
                            else {
                            echo "Unknown";
                            }
                            ?>
                          </td>
                          </tr>
                        @endforeach
                        <tr><td colspan="4" align="right">Total Sales</td><td><?php echo number_format($totalamount,2); ?></td></tr>
                        <tr>
                            <td colspan="6">
                            <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                            <script>
                            function myFunction() {
                            window.print();}
                            </script>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
        </div> <!-- end report -->

        
       
       
      <!-- /row --> 
        <!-- <div class="row hidden-print">
              <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-reorder"></i> Sales Summary Report
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 
              <div class="info-box">
                    <div class="row-fluid stats-box">
                      <div class="span3">
                        <div class="stats-box-title">Today's Sales</div>
                        <div class="stats-box-all-info"><i class="icon-money" style="color:#3366cc;"></i> {{number_format($DailySales,2)}}</div>
                      </div>
                      <div class="span3">
                        <div class="stats-box-title">Monthly Sales</div>
                        <div class="stats-box-all-info"><i class="icon-money" style="color:red;"></i> {{number_format($TotalMonthlySales,2)}}</div>
                      </div>
                      <div class="span3">
                        <div class="stats-box-title">Yearly Sales</div>
                        <div class="stats-box-all-info"><i class="icon-money" style="color:#3C3000"></i> {{number_format($TotalYearlySales,2)}}</div>  
                      </div>
                      <div class="span3">
                        <div class="stats-box-title">Total Sales</div>
                        <div class="stats-box-all-info"><i class="icon-money" style="color:#3C3"></i> {{number_format($TotalSales,2)}}</div>  
                      </div>
                    </div>
                </div>
        </div>
    </div> -->
    <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
@endsection