@extends('cashier.layouts.cashier')
@section('content')
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                  <h3>Order #: {{$reportPurchase->ornumber}}</h3>
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
                    <?php $totalamount = $totalamount + $Order->ramount; ?>
                    <tr>
                    
                      <td>{{$Order->product_name}}</a></td>
                      <td>{{$Order->rquantity}}</a></td>
                      <td>{{$Order->price}}</a></td>
                      <td>{{$Order->rdiscount}}</a></td>
                      
                      <td>{{number_format($Order->ramount,2)}}</em>  </td>
                      </tr>
                    @endforeach
                    
                    <tr><td colspan="4" align="right">Total Amount</td><td><?php echo number_format($totalamount,2); ?></td></tr>
                    <tr>
                        <td colspan="5">
                        <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                        <script>
                        function myFunction() {
                        window.print();}
                        </script>
                        <a href="/cashier/transactions" class="btn btn-sm btn-success noprint" style="float:right; margin-top:5px;">Back</a>
                        </td>
                    </tr>
                  </tbody>
                </table>
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
</div><!--end row-->
@endsection