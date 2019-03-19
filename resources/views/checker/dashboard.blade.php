@extends('checker.layouts.checker')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>To Purchase
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <form method="post" class="navbar-search pull-right" action="/cashier/product/search">
                      <div class="input-group">
                            <input id="search" type="text" type="search" name="search" class="form-control" placeholder="Search Product...">
                      </div>
                        {{ csrf_field() }}
                    </form>
                    </div>
                    <div>{{ $dataProduct->links() }}</div> 
                    <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>Variation</th>
                        <th>Price</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="productresult">
                      @forelse($dataProduct as $Product)
                      <!-- <tr>
                        <td>{{$Product->product_name}}</td>
                        <td class="td-actions">
                          @forelse($Product->productskus as $prosku)
                          <table class="table table-bordered">                
                              <tbody>
                                <tr>
                                  <td style="width:150px;">{{$prosku->varoption['option_name']}}</td>
                                  <td>{{$prosku->warehousequantity}}</td>
                                  <td style="width:150px;"> 
                                    <a href="javascript:;" 
                                      class="edit-modal btn btn-success btn-small" 
                                      data-amount="{{$Product->price}}.00" 
                                      data-quantity="{{$prosku->warehousequantity}}" 
                                      data-name="{{$Product->product_name}}" 
                                      data-id="{{$Product->id}}" ><i class="btn-icon-only icon-shopping-cart"> </i><span style="color:#fff;">Add to Purchase</span></a>
                                     </td>
                                </tr>
                              </tbody>
                          </table> 
                          @empty
                          <em>No Variation</em>    
                          @endforelse 
                        </td>
                      </tr> -->
                      @foreach($Product->quantity as $branchProduct)  
                      <tr>
                          <td>{{$Product->product_name}}</td>
                          <td>{{$branchProduct->var_name}}</td>
                          <td>{{$branchProduct->price}}</td>
            
                          <td>{{$branchProduct->quantity}}</td>
                          
                          <td class="td-actions">
                            <?php if($branchProduct->quantity > 0 ){?>
                              <a href="javascript:;" 
                                class="edit-modal btn btn-sm btn-success" 
                                data-amount="{{$branchProduct->price}}"
                                data-variation="{{$branchProduct->var_name}}" 
                                data-quantity="{{$branchProduct->quantity}}" 
                                data-name="{{$Product->product_name}}" 
                                data-id="{{$branchProduct->id}}" >
                                  <i class="btn-icon-only icon-shopping-cart"> 
                              </i><span style="color:#fff;">Add to Purchase</span></a>
                            <?php }
                              else {
                                echo "<em> Not Available</em>";
                              }
                            ?>
                          </td>
                        </tr>
                        @endforeach
                      @empty
                      <tr><td colspan='4'><em>No Data</em></td></tr>
                      @endforelse
                    </tbody>
                  </table>
              
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Purchase List
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                  <table class="table table-striped table-bordered" id="table">
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Discount %</th>
                        <th>Quantity </th>
                        <th>Amount </th>
                        <th>Action </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $amount =0; ?>
                      @forelse($dataReqorder as $order)
                        <?php 
                          $itemAmountDiscount = ($order->ramount / 100) * $order->rdiscount;
                          $itemAmount = $order->ramount - $itemAmountDiscount;
                          $amount = $amount + $itemAmount; 
                        ?>
                      <tr class="item{{$order->item_id}}">
                        <td width="200px"> <a href="products/{{$order->item_id}}" class="name">
                        {{$order->product_name}}
                        </a> </td>
                        <td>{{ number_format($order->ramount,2) }}</td>
                        <td>{{$order->rdiscount}}</td>
                      
                        <td>{{$order->rquantity}}</td>
                        <td>{{ number_format($itemAmount,2) }}</td>
                        <td style="width:100px;" class="td-actions">
                        <a href="/cashier/cart/deleteproduct/{{$order->item_id}}" class="btn btn-danger" data-id="{{$order->item_id}}" data-cashierid="{{$order->cashier_id}}" id="deleteproduct">
                        <i class="fa fa-remove"></i> <span style="color:#fff;"></span>
                        </a>
                      </td>
                      </tr> 
                      @empty
                      <tr><td colspan="6">No Data</td></tr>
                      @endforelse
                    </tbody>
                  </table>  
                 
                  <strong>Subtotal:	<?php echo number_format($amount,2); ?> </strong>   <br>
                  <form action="/cashier/cart/processOrder" method="post">
                    {{ csrf_field() }}
                    <label for="amount">Amount Paid</label> 
                    <input type="hidden" value="<?php echo number_format($amount,2); ?>" name="amount" >
                    <input type="text"  name="money" value="" id="money" style="text-align: right;">
                    <input id="dataBranchID" type="hidden" class="form-control"  aria-describedby="basic-addon2" name="dataBranchID" value="{{$dataBranchID}}">
                    <label for="amount">OR Number</label> 
                    <input type="text"  name="ornumber" value="" id="ornumber" style="text-align: right;">
                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <input type="hidden"  name="amounttopay" value="<?php echo $amount; ?>" id="amounttopay" > <br>
                    <button type="submit" class="btn btn-sm btn-success" id="processorder" style="float:right; margin-top:5px;" disabled>Process Order</button>
                   
                  </form>
                </div> <!--end x_content-->
        </div><!--end x_panel-->
    </div><!--end col-->
</div><!--end row-->
<div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel"></h4>
                        </div>
  				<div class="modal-body">
  					<form class="form-horizontal" role="form">
                      {{ csrf_field() }}
  						<div class="form-group">
  						
                <div class="col-sm-8">
                  <p><strong>Product Name: </strong><span id="productedit_name"></p>
                  <p><strong>Variation: </strong> <span id="variation"></span></p>
                  <p><strong>Amount: </strong> &#8369; <span id="productamount"></span></p>
                  <p><strong>Quantity Left: </strong> <span id="productquantity"></span></p>
                  <strong>Quantity:</strong>
  								<input type="number" class="form-control" id="quantity" name="quantity">
                  <p><strong>Discount %:</strong>
  								<input type="hidden" class="form-control" id="fid" disabled>
                  <input type="hidden" class="form-control" id="amount" disabled>
                  <input type="number" class="form-control" id="discount" name="discount" value="0"></p>
  								<!-- <input type="text" class="form-control" id="productedit_name" name="productedit_name"> -->
  							</div>
  						</div>
            
  					</form>
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button" > </span>
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
  							 Close
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
<script type="text/javascript">
$('#search').on('keyup',function(){
  $value=$(this).val();
  $.ajax({
    type : 'get',
    url : '{{URL::to('cashier/productsearch')}}',
    data:{'search':$value},
    success:function(data){
      $('.productresult').html(data);
    } 
  });
})
</script> 
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/cashiercartscript.js') }}"></script>
@endsection