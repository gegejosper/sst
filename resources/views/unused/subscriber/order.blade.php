@extends('customer.layouts.customer')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
   
      <div class="row">
      <div class="span6">
      <div align="center" style="padding:20px 0px;"><img src="{{ asset('img/logohorizontal.png') }}" align="center"></div>
            <div class="widget">	
                        <div class="widget-header">
                            <h3>Order Code : {{$orderCode}}</h3>
                        </div> <!-- /widget-header -->
                        <div class="widget-content">
                <table class="table table-striped table-bordered" id="table">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Amount</th>
                        <th>Quantity </th>
                    
                    </tr>
                    </thead>
                    <tbody>
                
                    <?php $amount =0; ?>
                    @forelse($dataReqorder as $order)
                    <tr class="item{{$order->item_id}}">
                        <td width="250px"> <a href="/product/{{$order->item_id}}" class="name">
                        
                        {{$order->product_name}}
                        </a> </td>
                        <td>{{$order->ramount}}</td>
                        <td>{{$order->rquantity}}</td>
                    
            
                    </td>
                    </tr>
                    <?php $amount = $amount + $order->ramount; ?>
                    @empty
                    <tr><td colspan="4">No Data</td></tr>
                    @endforelse
                    </tbody>
                </table>
                <h5>Status : <?php 
                                    if($order->status == 0) {
                                      echo "Waiting for Approval";
                                    }
                                    elseif($order->status == 1) {
                                        echo "Approved";
                                    }
                                    elseif($order->status == 2) {
                                        echo "Disapproved";
                                    }
                                    elseif($order->status == 3) {
                                      echo "Canceled";
                                  }
                                    else {
                                        echo "Unidentified";
                                    }
                                  ?>  </h5>
                <h5>Total Amount :Php {{ number_format($amount, 2) }}</h5> <br>
                <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                    <script>
                    function myFunction() {
                    window.print();}
                    </script>
               
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