@extends('cashier.layouts.cashier')
@section('content')

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                  <h3>OR Number: {{$reportPurchase->ornumber}}</h3>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">  
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Quantity </th>
                      <th>Price</th>
                      <th>Discount % </th>
                      <th>Amount Paid</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $totalamount = 0; ?>
                    @foreach($orderDetails as $Order)
                    <?php 
                    
                    $itemAmountDiscount = ($Order->ramount / 100) * $Order->rdiscount;
                    $itemAmount = $Order->ramount - $itemAmountDiscount;
 
                    $totalamount = $totalamount + $Order->ramount; ?>
                    <tr>
                    
                      <td>{{$Order->product_name}}</a></td>
                      <td>{{$Order->rquantity}}</a></td>
                      <td>{{$Order->price}}</a></td>
                      <td>{{$Order->rdiscount}}</a></td>
                     
                      
                      <td>{{number_format($Order->ramount,2)}}</em>  </td>
                      </tr>
                      <?php 
                      $cashierName = $Order->name;
                      ?>
                    @endforeach
                    
                    <tr><td colspan="4" align="right">Total Amount</td><td><?php echo number_format($totalamount,2); ?></td></tr>
                    <tr>
                        <td colspan="5">
                        
                        </td>
                    </tr>
                  </tbody>
                </table>
                <?php $change = $reportPurchase->amountpaid - $reportPurchase->amount; ?>
                <table class="table">
                <tbody><tr>
                    <th style="width:30%">From: Storm Signal Trading</th>
                   
                </tr>
                <tr>
                    <th>Amount: &#8369; <?php echo number_format($reportPurchase->amount,2); ?></th>

                </tr>
                <tr>
                    <th>Amount Paid: &#8369; <?php echo number_format($reportPurchase->amountpaid,2); ?></th>
                </tr>
                <tr>
                    <th>Change: &#8369; <?php echo number_format($change,2); ?></th>
                </tr>
                <tr>
                    <th>Processed by: {{$cashierName}}</th>
                </tr>
                </tbody></table>
                <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                        <script>
                        function myFunction() {
                        window.print();}
                        </script>
                        <a href="/cashier/transactions" class="btn btn-sm btn-success noprint" style="float:right; margin-top:5px;">Back</a>
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
</div><!--end row-->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
     
        <div class="span8">
          <div class="widget widget-table action-table">
            <div class="col-xs-6">
            
            <br>
            </div>
              <div class="widget-header"> <i class="icon-th-list"></i>
                
              </div>
            <!-- /widget-header -->
              <div class="widget-content">
                
              </div> 
              <br>
              
            <div class="table-responsive">
                
            </div>
                        
          </div>
               
        </div>
        <!-- /span4 --> 
       
      </div>
      <!-- /row --> 
 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
@endsection