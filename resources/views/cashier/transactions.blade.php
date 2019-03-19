@extends('cashier.layouts.cashier')
@section('content')

<div class="row">
<div class="x_panel">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Recent Walkin Sales
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">  
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>OR Number </th>
                      <th>Total Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $totalamount= 0;?>
                    @foreach($reportPurchase as $Purchase)
                    <?php $totalamount = $totalamount + $Purchase->amount; ?>
                    <tr>
                    <td align="center" style="text-align:center">{{$Purchase->date}}</td>
                      <td><a href="/cashier/vieworder/{{$Purchase->orderNumber}}">{{$Purchase->ornumber}}</a></td>
                     
                      
                      <td>{{number_format($Purchase->amount,2)}}</em>  </td>
                      <td></td>
                      </tr>
                    @endforeach
                    
                    <tr><td colspan="2" align="right">Total Sales</td><td><?php echo number_format($totalamount,2); ?></td></tr>
                    
                  </tbody>
                </table> 
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Summary of Sales
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">  
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Type</th>
                      <th>Amount </th>
                     
                    </tr>
                  </thead>
                  <tbody>
                   <tr>
                      <td>Walkin Sales</td>
                      <td><?php echo number_format($totalamount,2); ?></td>
                   </tr>
                  
                   
                   <tr>
                      <td>Total Sales </td>
                      <td><?php 
                      $salessummary =$totalamount;
                      echo number_format($salessummary,2); 
                      
                      ?></td>
                   </tr>
                   
                  </tbody>
                </table> 
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
    <div style="clear:both;"></div>
    <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                        <script>
                        function myFunction() {
                        window.print();}
                        </script>
</div>   
</div><!--end row-->

         
@endsection