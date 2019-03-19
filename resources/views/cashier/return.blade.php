@extends('cashier.layouts.cashier')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>View Return Product List
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">   
                <form method="post" class="navbar-search pull-right">
                      <div class="input-group">
                            <input id="search" type="text" type="search" name="search" class="form-control" placeholder="Search Product...">
                      </div>
                        {{ csrf_field() }}
                </form>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                   
                    <th>Product Name</th>
                    <th>Variation</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="productresult">
                  @foreach($dataProduct as $Product)
                  <tr>
                 
                    <td> <a class="name">{{$Product->product->product_name}}</a></td>
                    <td><em class="productprice">{{$Product->variation->option_name}} </em>  </td>
                    <td><em class="productprice">{{$Product->price}} </em>  </td>
                    <td><em class="productprice">{{$Product->quantity}}</em>  </td>
                    <td class="td-actions">
                    <?php
                    if($Product->quantity<=0){
                      echo "<em> Not Available</em>";
                    }
                    else {
                    ?>
                      <a href="javascript:;" class="edit-modal btn btn-danger btn-mini" data-pic="{{$Product->product->pic}}" data-amount="{{$Product->price}}.00" data-quantity="{{$Product->quantity}}.00" data-name="{{$Product->product->product_name}}" data-id="{{$Product->id}}" ><i class="btn-icon-only icon-repeat"> </i><span style="color:#fff;">Add to List</span></a>
                    <?php 
                    }
                    ?>
                    </td>
                    
                   </tr>
                  @endforeach
                </tbody>
              </table>
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Return List
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                <table class="table table-striped table-bordered" id="table">
                <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Quantity </th>
                    <th>Action </th>
                  </tr>
                </thead>
                <tbody>
            
                <?php $amount =0; ?>
                  @forelse($dataReturn as $return)
                  <tr class="item{{$return->item_id}}">
                    <td width="250px"> <a href="products/{{$return->item_id}}" class="name">
                    
                    {{$return->product_name}}
                    </a> </td>
                   
                    <td>{{$return->rquantity}}</td>
                   
                    <td style="width:200px;" class="td-actions">
                    <a href="javascript:;" class="update-modal btn btn-warning" data-camount="{{$return->price}}.00" data-cname="{{$return->product_name}}" data-cid="{{$return->item_id}}" data-cquantity="{{$return->rquantity}}" data-branchid="{{$return->branchid}}" >
                    <span style="color:#fff;">Update</span>
                    </a>
                    <a href="/cashier/return/deleteproduct/{{$return->item_id}}" class="btn btn-danger" data-id="{{$return->item_id}}" data-branchid="{{$return->branchid}}" id="deleteproduct">
                     <span style="color:#fff;">Remove</span>
                    </a>
                   
                   </td>
                   </tr>

                   @empty
                   <tr><td colspan="4">No Data</td></tr>
                   @endforelse
                </tbody>
          </table>
          <form action="/cashier/return/processReturn" method="post">
        {{ csrf_field() }}
         
         
         <div class="col-lg-12" align="right" style="padding:20px 10px; margin-bottom:40px;">

          <label for="amount">Note</label>
      
          <textarea name="returnnote" id="" cols="50" rows="3" id="returnnote"></textarea>
          <br>
          <button type="submit" class="btn btn-sm btn-danger" style="float:right; margin-top:5px;" id="returnorder" disabled>Process Return</button>
          </div>

            
         </form>
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
</div><!--end row-->
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Return Products
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">   
                <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                      <th>Date</th>
                      <th>Return Number</th>
                    </tr>
                  </thead>
                  <tbody>
                 
                    @foreach($returnDetails as $Return)
                    <tr>
                      <td>{{$Return->created_at}}</td>
                      <td><a href="/cashier/return/{{$Return->returnbatchnum}}">{{$Return->returnbatchnum}}</a></td>
                      </tr>
                    @endforeach
                
                  </tbody>
                </table>
                
              </div> 
              <br>
            
            <div class="table-responsive">
                
                <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                        <script>
                        function myFunction() {
                        window.print();}
                        </script>
            </div>
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
  						<div class="form-group">
  							
                  
  								<input type="hidden" class="form-control" id="fid" disabled>
                  <input type="hidden" class="form-control" id="amount" disabled>
  							
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
                    <input type="hidden" class="form-control" id="branchid" disabled>
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
    url : '{{URL::to('cashier/return/productsearchreturn')}}',
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
<script src="{{ asset('js/returnscript.js') }}"></script>
@endsection