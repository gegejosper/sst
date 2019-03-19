@extends('customer.layouts.customer')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
                <div class="widget-header"> <i class="icon-th-list"></i>
                  <h3>Recent Orders</h3>
                  <div style="float:right; padding-right:10px;"><a href="/customer/orders" type="button" class="btn btn-info btn-small" >+ View More</a></div>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                    <table class="table table-striped table-bordered" id="table">
                              <thead>
                                <tr>
                                  <th>Order Code</th>
                                  <th>Status </th>
                                  <th>Action </th>
                                </tr>
                              </thead>
                              <tbody>
                          
                              <?php $amount =0; ?>
                                @forelse($dataReqorder as $order)
                                <tr class="item{{$order->item_id}}">
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
                                    <a href="/customer/deleteorder/{{$order->item_id}}/{{$order->requestId}}" class="btn btn-mini btn-danger" data-id="{{$order->item_id}}" data-reqid="{{$order->req_id}}" id="deleteproduct">
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
        <!-- End Recent Orders -->
        <div class="span6">
                <div class="widget-header"> <i class="icon-th-list"></i>
                  <h3>Recent Bookings</h3>
                  <div style="float:right; padding-right:10px;"><a href="/customer/bookings" type="button" class="btn btn-info btn-small" >+ View More</a></div>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="width:100px;">Date </th>
                    <th>Name</th>            
                    <th style="width:100px;">Origin</th>
                    <th style="width:100px;">Destination</th>
                    <th>Date Pickup</th>
                    <th class="td-actions" style="width:100px;">Status</th>
                    <th class="td-actions" style="width:300px;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dataBooking as $Booking)
                  <tr class="item{{$Booking->id}}">
                    <td>{{$Booking->created_at}}</td>
                    <td><a href="/customer/bookings/{{$Booking->id}}">{{$Booking->name}}</a></td>
                    <td>{{$Booking->origin}}</td>
                    <td>{{$Booking->destination}}</td>
                    <td>{{$Booking->dateofpickup}}</td>
                    <td class="status{{$Booking->id}}">
                    <?php 
                    if($Booking->status == 0) {
                        echo "Waiting for Approval";
                    }
                    elseif($Booking->status == 1) {
                        echo "Approved";
                    }
                    elseif($Booking->status == 2) {
                        echo "Disapproved";
                    }
                    else {
                        echo "Unidentified";
                    }
                    ?>
                    </td>
                    <td style="width:100px;" class="td-actions">
                        <a href="/customer/bookings/{{$Booking->id}}" class="btn btn-mini btn-success" data-id="{{$Booking->id}}" ><i class="icon-search"> </i> View</a>
                    </td>
                    
                   </tr>
                   @endforeach
                </tbody>
              </table>
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