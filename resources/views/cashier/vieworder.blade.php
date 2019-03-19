@extends('cashier.layouts.cashier')

@section('content')

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>View Reciept
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">   
                <table class="table table-striped table-bordered" id="table">
                <thead>
                  <tr>
                  <th>Date</th>
                    <th>Product Name</th>
                    <th>Amount</th>
                    <th>Reserve Quantity </th>
                    
                    <th>Available Quantity </th>
                    <th>Action </th>
                  </tr>
                </thead>
                <tbody>
            
                <?php $amount =0; ?>
                  @forelse($dataReqorder as $order)
                  <tr class="item{{$order->item_id}}">
                    <td>{{$order->created_at}}</td>
                    <td width="250px"> <a href="products/{{$order->item_id}}" class="name">
                    
                    {{$order->product_name}}
                    </a> </td>
                    <td>{{$order->ramount}}</td>
                    <td>{{$order->rquantity}}</td>
                    <td>{{$order->quantity}}</td>
                   
                    <td style="width:350px;" class="td-actions">
                    <?php 
                    if($order->branch_id != $dataBranch->id){
                        echo "Not Available";
                    }
                    else{    
                    ?>
                    <a href="javascript:;" data-pic="{{$order->pic}}" data-amount="{{$order->price}}.00"
                    data-quantity="{{$order->rquantity}}" data-name="{{$order->product_name}}" class="btn btn-info updatecart" data-id="{{$order->item_id}}" data-reqid="{{$order->req_id}}">
                    <i class="icon-plus"></i> <span style="color:#fff;">Add to Purchase</span>
                    </a>
                   
                    <?php 
                    }
                    ?>
                    <a href="/cashier/declineorder/{{$order->item_id}}/{{$order->req_id}}" class="btn btn-danger" data-id="{{$order->item_id}}" data-reqid="{{$order->req_id}}" id="deleteproduct">
                    <i class="icon-remove"></i> <span style="color:#fff;">Cancel</span>
                    </a>
                   
                   </td>
                   </tr>
                   <?php $amount = $amount + $order->ramount; ?>
                   @empty
                   <tr><td colspan="4">No Data</td></tr>
                   @endforelse
                </tbody>
    </table>
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
</div><!--end row-->
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
<script src="{{ asset('js/assistantcartupdatescript.js') }}"></script>
@endsection