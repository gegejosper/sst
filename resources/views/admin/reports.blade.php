@extends('admin.layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
                <div class="x_title">
                    <h2>Generate Report
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">  
                    <form action="/admin/report/generate" method="post">
                                {{ csrf_field() }}   
                                <div class="box-body">
                                        <div class="form-group">
                                        <label for="">From: </label>
                                            <input type="date" class="form-control" name="from" required/>
                                        </div>
                                        <div class="form-group">
                                        <label for="">To: </label>
                                            <input type="date" class="form-control" name="to" required/>
                                        </div>
                                </div>
                                <div class="" style="padding:20px;">
                                    <button type="submit" class="pull-right btn btn-default" id="sendEmail">Generate Report <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                    </form> 
                </div>
                <div class="x_title">
                    <h2>Report by Branch
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">  
                    @foreach($dataBranch as $Branch)
                    <a href="/admin/report/branch/{{$Branch->id}}" class="btn btn-app">
                        <i class="fa fa-sitemap"></i><span class="shortcut-label">{{$Branch->branch_name}}</span> 
                      </a>
                   
                      @endforeach 
                </div>
         </div>
      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Sales Report
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
</div>
<div class="row tile_count hidden-print">
            <div class="x_title">
                    <h2>Sales Summary Report</h2>
                    <div class="clearfix"></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Today's Sales</span>
              <div class="count">{{number_format($DailySales,2)}}</div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Monthly Sales</span>
              <div class="count">{{number_format($TotalMonthlySales,2)}}</div>
              
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Yearly Sales</span>
              <div class="count green">{{number_format($TotalYearlySales,2)}}</div>
             
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Total Sales</span>
              <div class="count">{{number_format($TotalSales,2)}}</div>
             
            </div>
</div>
@endsection