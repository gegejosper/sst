@extends('customer.layouts.customer')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <div class="span6">
      <table class="table table-striped table-bordered" id="table">
                              <thead>
                                <tr>
                                <th>Date</th>
                                  <th>Order Code</th>
                                  <th>Status </th>
                                  <th>Action </th>
                                </tr>
                              </thead>
                              <tbody>
                          
                              <?php $amount =0; ?>
                                @forelse($dataReqorder as $order)
                                <tr class="item{{$order->item_id}}">
                                  <td width="250px">{{$order->created_at}}</td>
                                  <td width="150px"> <a href="/customer/order/{{$order->requestId}}" class="name">
                                  
                                  {{$order->requestId}}
                                  </a> </td>
                                  <td width="350px">
                                  <?php 
                                    if($order->reservestatus == 0) {
                                      echo "Waiting for Approval";
                                    }
                                    elseif($order->reservestatus == 1) {
                                        echo "Approved";
                                    }
                                    elseif($order->reservestatus == 2) {
                                        echo "Disapproved";
                                    }
                                    elseif($order->reservestatus == 3) {
                                      echo "Canceled";
                                  }
                                    else {
                                        echo "Unidentified";
                                    }
                                  ?>  
                                  </td>
                                  <td style="width:250px;" class="td-actions">
                                  <a href="/customer/order/{{$order->requestId}}" class="btn btn-mini btn-success" ><i class="icon-search"> </i> View</a>
                                  <?php 
                                  if($order->reservestatus == 0) {
                                    ?>
                                    <a href="/customer/deleteorder/{{$order->requestId}}" class="btn btn-mini btn-danger" data-id="{{$order->item_id}}" data-reqid="{{$order->req_id}}" id="deleteproduct">
                                    <i class="icon-remove"></i> <span style="color:#fff;">Cancel</span>
                                    </a>
                                    <?php
                                  }
                                  ?>
                                </td>
                                </tr>
                                <?php $amount = $amount + $order->ramount; ?>
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