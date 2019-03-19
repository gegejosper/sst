@extends('customer.layouts.customer')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <div class="span12">
      <table class="table table-striped table-bordered" id="table">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Amount</th>
                    <th>Quantity </th>
                    <th>Status </th>
                  </tr>
                </thead>
                <tbody>
            
              
                  @forelse($dataReqorder as $order)
                  <tr class="item{{$order->item_id}}">
                    <td width="250px"> <a href="/product/{{$order->item_id}}" class="name">
                    
                    {{$order->product_name}}
                    </a> </td>
                    <td>{{$order->ramount}}</td>
                    <td>{{$order->rquantity}}</td>
                    <td style="width:350px;" class="td-actions">
                   <?php 
                   if($order->status==3){
                    echo "DECLINED";
                   }
                   elseif($order->status==1){
                    echo "APPROVED";
                   }
                   else {
                     echo "WAITING";
                   }
                   
                   ?>
                   
                   </td>
                   </tr>
                   
                   @empty
                   <tr><td colspan="4">No Data</td></tr>
                   @endforelse
                </tbody>
    </table>
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