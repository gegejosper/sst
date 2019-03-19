@extends('layouts.front')

@section('content')
<div class="container">

      <div class="row" style="padding-top:50px; padding-bottom:20px;">
        <!-- /.col-lg-3 -->

      <div class="col-lg-12">
        <h1>Cart </h1>
          <div class="row">
          <table class="table table-striped table-bordered" id="table">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Amount</th>
                    <th>Quantity </th>
                    <th>Action </th>
                  </tr>
                </thead>
                <tbody>
            
                <?php $amount =0; ?>
                  @forelse($dataReqorder as $order)
                  <tr class="item{{$order->item_id}}">
                    <td width="250px"> <a href="products/{{$order->item_id}}" class="name">
                    
                    {{$order->product_name}}
                    </a> </td>
                    <td>{{$order->ramount}}</td>
                    <td>{{$order->rquantity}}</td>
                    <td style="width:350px;" class="td-actions">
                    <a href="javascript:;" class="edit-modal btn btn-warning" data-amount="{{$order->price}}.00" data-name="{{$order->product_name}}" data-id="{{$order->item_id}}" data-quantity="{{$order->rquantity}}" data-reqid="{{$order->req_id}}" >
                    <i class="icon-minus"></i> <span style="color:#fff;">Update Quantity</span>
                    </a>
                    <a href="/cart/deleteproduct/{{$order->item_id}}" class="btn btn-danger" data-id="{{$order->item_id}}" data-reqid="{{$order->req_id}}" id="deleteproduct">
                    <i class="icon-remove"></i> <span style="color:#fff;">Remove</span>
                    </a>
                   
                   </td>
                   </tr>
                   <?php $amount = $amount + $order->ramount; ?>
                   @empty
                   <tr><td colspan="4">No Data</td></tr>
                   @endforelse
                </tbody>
          </table>
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-12 -->

      </div>
      <!-- /.row -->
    <div class="row" style="padding-bottom:100px;">
        
        
        <form action="/cart/reserve" method="post">
        {{ csrf_field() }}
        <div class="col-lg-12">
        <h3>Order Summary</h3>
        <strong>Subtotal:	<?php echo number_format($amount,2); ?> </strong>   <br><br> <br>
            <input type="hidden"  name="reqId" value="<?php if(session()->has('shoppingId')){
echo session()->get('shoppingId');

          }?>">
          <label for="reqdetails">Additional Info for the reservation</label> <br>
          <textarea name="reqdetails" id="" cols="50" rows="5" placeholder="Message Here"></textarea>
          <br>
          <div style="display:none"><label for="Branch Reserve">Which Branch you want to reserve the items?</label>
          <br>
          <select name="branch" id="branch">
            @foreach($dataBranch as $Branch)
            <option value="{{$Branch->id}}">{{$Branch->branch_name}}</option>
            @endforeach
          </select></div>
          
           <br>
           <br>
          <button type="submit"class="btn btn-info" >
         <span style="color:#fff;">Reserve</span> 
         </b>
         </div>
         </form>
        
    </div>
    </div>

<div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
          <h4 class="modal-title" align="left"></h4>
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					
  				</div>
  				<div class="modal-body">
  					<form class="form-horizontal" role="form">
                      {{ csrf_field() }}
  						<div class="form-group row">
  							<div class="col-sm-3">
                 
  				    <input type="hidden" class="form-control" id="fid" disabled>
                    <input type="hidden" class="form-control" id="reqid" disabled>
                    <input type="hidden" class="form-control" id="amount" disabled>
  				</div>
                <div class="col-sm-8">
                  <p><strong>Product Name: </strong><span id="productedit_name"></p>
                  <p ><strong>Amount: </strong> &#8369; <span id="productamount"></span></p>
                  <strong>Quantity:</strong>
  
  								<input type="number" class="form-control" id="quantity" name="quantity">
  						
  						
  							</div>
  						</div>
            
  					</form>
                      <div class="deleteContent">
  						Are you Sure you want to delete <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button" class='glyphicon'> </span>
  						</button>
  						
  					</div>
  				</div>
  			</div>
		  </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
    </div>
<div id="CartInfo" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
          <h4 class="modal-title" align="left"></h4>
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					
  				</div>
  				<div class="modal-body">
  					<p>Product Successfully Added to the Cart!</p>
  					<div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">
  							<span class='glyphicon glyphicon-remove'></span> Close
  						</button>
  					</div>
  				</div>
  			</div>
		  </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
    </div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/cartupdatescript.js') }}"></script>
@endsection
