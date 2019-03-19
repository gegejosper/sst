@extends('cashier.layouts.cashier')
@section('content')
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
     
        <div class="span8">
          <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Order #: {{$ordernumber}}</h3>
              </div>
            <!-- /widget-header -->
              <div class="widget-content">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Package Name</th>
                      <th>Box ID </th>
                      <th>Package Price</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $totalamount = 0; ?>
                    @foreach($reportDealerspackageorder as $Order)
                    <?php $totalamount = $totalamount + $Order->packageprice; ?>
                    <tr>
                    
                      <td>{{$Order->package->packagename}}</a></td>
                      <td>{{$Order->boxid}}</a></td>
                      
                      <td>{{number_format($Order->packageprice,2)}}</em>  </td>
                      </tr>
                    @endforeach
                    
                    <tr><td colspan="2" align="right">Total Amount</td><td><?php echo number_format($totalamount,2); ?></td></tr>
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