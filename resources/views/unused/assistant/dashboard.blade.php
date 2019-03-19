@extends('assistant.layouts.assistant')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span5">
       
        <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Product List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <div class="input-append" style="padding:20px;">
            <form method="post" class="navbar-search pull-right" action="/cashier/product/search">
              <div class="input-append">
                                                  <input class="span2 m-wrap" id="appendedInputButton" type="search" name="q" class="form-control" placeholder="Search...">
                                                  <button class="btn" type="submit" style="margin-top:-10px;">Search</button>
                                                </div>
                                {{ csrf_field() }}
              </form>
            </div>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>  </th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dataProduct as $Product)
                  <tr>
                  <td align="center" style="text-align:center"> <a href="#" class="avatar"><img src="{{asset('productimg')}}/{{$Product->pic}}" width="100px"/> </a> </td>
                    <td> <a class="name">{{$Product->product->product_name}}</a></td>
                    <td><em class="productprice">{{$Product->price}}</em>  </td>
                    <td><em class="productprice">{{$Product->quantity}}</em>  </td>
                    <td class="td-actions">

                      <a href="javascript:;" class="edit-modal btn btn-success btn-small" data-pic="{{$Product->pic}}" data-amount="{{$Product->price}}.00" data-quantity="{{$Product->quantity}}.00" data-name="{{$Product->product->product_name}}" data-id="{{$Product->id}}" ><i class="btn-icon-only icon-shopping-cart"> </i><span style="color:#fff;">Add to Purchase</span></a>
                    </td>
                    
                   </tr>
                  @endforeach
                  
                  
                
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>            

       

</div>
        <!-- /span4 --> 
        <div class="span7">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th"></i>
              <h3>Purchase List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
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
                   
                    <td style="width:100px;" class="td-actions">
                    <a href="javascript:;" class="update-modal btn btn-warning" data-camount="{{$order->price}}.00" data-cname="{{$order->product_name}}" data-cid="{{$order->item_id}}" data-cquantity="{{$order->rquantity}}" data-cashierid="{{$order->cashier_id}}" >
                    <i class="icon-minus"></i> <span style="color:#fff;"></span>
                    </a>
                    <a href="/cashier/cart/deleteproduct/{{$order->item_id}}" class="btn btn-danger" data-id="{{$order->item_id}}" data-cashierid="{{$order->cashier_id}}" id="deleteproduct">
                    <i class="icon-remove"></i> <span style="color:#fff;"></span>
                    </a>
                   
                   </td>
                   </tr>
                   <?php $amount = $amount + $order->ramount; ?>
                   @empty
                   <tr><td colspan="4">No Data</td></tr>
                   @endforelse
                </tbody>
          </table>
              <div class="widget-header" style="padding:0px 10px;" align="right">
              <strong>Subtotal:	<?php echo number_format($amount,2); ?> </strong>   <br>
              <form action="/assistant/cart/processOrder" method="post">
        {{ csrf_field() }}
         
         </div>
         <div class="col-lg-12" align="right" style="padding:20px 10px; margin-bottom:40px;">
           
         
          <label for="amount">Amount Paid</label> 
          <input type="hidden" value="<?php echo number_format($amount,2); ?>" name="amount">
          <input type="text"  name="money" value="" id="money">
          @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
          @endif
          <input type="hidden"  name="amounttopay" value="<?php echo $amount; ?>" id="amounttopay"> <br>
          <button type="submit" class="btn btn-sm btn-success" style="float:right; margin-top:5px;">Process Order</button>
          </div>

            
         </form>
          
              
            </div>
            <!-- /widget-content --> 
    
         

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
  						<div class="form-group">
  							<div class="col-sm-3">
                  <img src="" alt="product image" id="productimg" width="100">
  								<input type="hidden" class="form-control" id="fid" disabled>
                  <input type="hidden" class="form-control" id="amount" disabled>
  							</div>
                <div class="col-sm-8">
                  <p><strong>Product Name: </strong><span id="productedit_name"></p>
                  <p ><strong>Amount: </strong> &#8369; <span id="productamount"></span></p>
                  <p ><strong>Quantity Left: </strong> <span id="productquantity"></span></p>
                  <strong>Quantity:</strong>
  
  								<input type="number" class="form-control" id="quantity" name="quantity">
  						
  								<!-- <input type="text" class="form-control" id="productedit_name" name="productedit_name"> -->
  							</div>
  						</div>
            
  					</form>
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

<div id="updateCart" class="modal fade" role="dialog">
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
  						<div class="form-group">
  							<div class="col-sm-3">
                 
  				    <input type="hidden" class="form-control" id="cid" disabled>
                    <input type="hidden" class="form-control" id="cashierid" disabled>
                    <input type="hidden" class="form-control" id="camount" disabled>
  				</div>
                <div class="col-sm-8">
                  <p><strong>Product Name: </strong><span id="cproductedit_name"></p>
                  <p ><strong>Amount: </strong> &#8369; <span id="cproductamount"></span></p>
                 
                  <strong>Quantity:</strong>
  
  								<input type="number" class="form-control" id="cquantity" name="cquantity">
  						
  						
  							</div>
  						</div>
            
  					</form>
                      <div class="deleteContent">
  						Are you Sure you want to delete <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button" class='glyphicon'> Update Quantity</span>
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
<script src="{{ asset('js/assistantcartscript.js') }}"></script>
@endsection