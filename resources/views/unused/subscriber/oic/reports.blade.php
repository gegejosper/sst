@extends('admin.layouts.admin')
@section('content')
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span4 noprint">
            <div class="widget widget-table action-table noprint">
                  <div class="widget-header"> <i class="icon-th-list"></i>
                    <h3>Generate Report</h3>
                  </div>
                      <div class="widget-content">
                          <div class="box box-info">
                              <div class="box-header">
                                  <i class="fa fa-envelope"></i>
                                  <h3 class="box-title"></h3>
                              </div>
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
                          
                      </div>               
            </div>
            <div class="widget widget-table action-table noprint">
                  <div class="widget-header"> <i class="icon-th-list"></i>
                    <h3>Report by Branch</h3>
                  </div>
                <div class="widget-content">
                    <div class="shortcuts box-body"> 
                    @foreach($dataBranch as $Branch)
                    <a href="/admin/report/branch/{{$Branch->id}}" class="shortcut"><i class="shortcut-icon icon-sitemap"></i><span class="shortcut-label">{{$Branch->branch_name}}</span> </a>
                      @endforeach
                    </div><!-- /shortcuts --> 
                </div>
            </div>
        </div>
        <div class="span8">
          <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Sales Report</h3>
              </div>
            <!-- /widget-header -->
              <div class="widget-content">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Order Number </th>
                      <th>Amount Paid</th>
                      <th>Amount Change</th>
                      <th>Total Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $totalamount= 0;?>
                    @foreach($reportPurchase as $Purchase)
                    <?php $totalamount = $totalamount + $Purchase->amount; ?>
                    <tr>
                    <td align="center" style="text-align:center">{{$Purchase->date}}</td>
                      <td>{{$Purchase->orderNumber}}</a></td>
                      <td>{{number_format($Purchase->amountpaid,2)}}</a></td>
                      <td>{{number_format($Purchase->change,2)}}</em>  </td>
                      <td>{{number_format($Purchase->amount,2)}}</em>  </td>
                      </tr>
                    @endforeach
                    
                    <tr><td colspan="4" align="right">Total Sales</td><td><?php echo number_format($totalamount,2); ?></td></tr>
                    <tr>
                        <td colspan="5">
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
        <!-- /span4 --> 
      </div>
      <!-- /row --> 
        <div class="row noprint">
              <div class="span12">
                  <div class="widget-header">
                <i class="icon-star"></i>
                <h3>Daily Sales Summary Report</h3>
              </div>
              <div class="info-box">
                    <div class="row-fluid stats-box">
                      <div class="span4">
                        <div class="stats-box-title">Today's Sale</div>
                        <div class="stats-box-all-info"><i class="icon-money" style="color:#3366cc;"></i>{{number_format($DailySales,2)}}</div>
                      </div>
                      <div class="span4">
                        <div class="stats-box-title">Total Sales</div>
                        <div class="stats-box-all-info"><i class="icon-money" style="color:#3C3"></i>{{number_format($TotalSales,2)}}</div>  
                      </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
@endsection