@extends('admin.layouts.admin')
@section('content')
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
     
        <div class="span8">
          <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Order #: {{$reportPurchase->ornumber}}</h3>
              </div>
            <!-- /widget-header -->
              <div class="widget-content">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      
                      <th>Product Name</th>
                      <th>Quantity </th>
                      <th>Amount Paid</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $totalamount = 0; ?>
                    @foreach($orderDetails as $Order)
                    <?php $totalamount = $totalamount + $Order->ramount; ?>
                    <tr>
                    
                      <td>{{$Order->product_name}}</a></td>
                      <td>{{$Order->rquantity}}</a></td>
                      
                      <td>{{number_format($Order->ramount,2)}}</em>  </td>
                      </tr>
                      <?php 
                      $cashierName = $Order->name;
                      ?>
                    @endforeach
                    
                    <tr><td colspan="2" align="right">Total Amount</td><td><?php echo number_format($totalamount,2); ?></td></tr>
                    <tr>
                    <td colspan="3">Processed by: {{ucwords($cashierName)}}</td>
                    </tr>
                    <tr>
                        <td colspan="5">
                        <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                        <script>
                        function myFunction() {
                        window.print();}
                        </script>
                        <a href="/admin/dashboard" class="btn btn-sm btn-success noprint" style="float:right; margin-top:5px;">Back</a>
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
 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
@endsection