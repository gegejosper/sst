@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span4">
        
        <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Purchase Order History</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="shortcuts"> 
                <table class="table table-striped table-bordered">
                      <th>Purchase Number</th>
                      <th>Status</th>
                      <th>Date</th>
                   
                    @foreach($dataPurchase as $puchase)
                    <tr>
                      <td><a href="/accounting/purchase/history/{{$puchase->purchasenumber}}">{{$puchase->purchasenumber}}</a></td>
                      <td><?php
                        if ($puchase->status == 1){
                          echo "<em>Requesting</em>";
                        }
                        elseif($puchase->status == 2){
                          echo "<em>Received</em>";
                        }
                        else {
                          echo "<em>Waiting</em>";
                        }
                      ?></td>
                      <td>{{$puchase->date}}</td>
                    </tr>
                    @endforeach 
                    </table>
                </div>
              <!-- /shortcuts --> 
             
            </div>
            
            <!-- /widget-content --> 
          </div> 
        </div>

        <!-- /span4 -->
        <div class="span8">
     

          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th"></i>
              <h3>Out of Stocks in the Warehouse</h3>
              <div style="float:right; padding-right:10px;"></div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>  </th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($dataProduct as $Product)
                  <tr>
                  <td align="center" style="text-align:center"> <a href="#" class="avatar"><img src="{{ asset('productimg') }}/{{$Product->product->pic}}" width="50px"/> </a> </td>
                    <td> <a href="/accounting/products/{{$Product->prod_id}}" class="name">{{$Product->product->product_name}}</a></td>
                    <td><em class="productprice">{{$Product->quantity}}</em>  </td>
                 
                   </tr>
                   @empty
                   <tr><td colspan='4'><em>No Data</em></td></tr>
                  @endforelse
                  
                 
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
        </div>        
        </div>
      </div>
      <!-- /row --> 
 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title"></h4>
  				</div>
  				<div class="modal-body">
  					<form class="form-horizontal" role="form">
                      {{ csrf_field() }}
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="id">ID:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="fid" disabled>
  							</div>
  						</div>
  						<div class="form-group">
                <label class="control-label col-sm-2" for="branch_name" >Purchase Number:</label>
  							<div class="col-sm-10">
  								<input type="number" class="form-control" id="addpurchasenumber" name="addpurchasenumber">
                </div>
                <label class="control-label col-sm-2" for="Date" >Date:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="addpurchasedate" name="addpurchasedate" value="<?php echo date('m/d/Y'); ?>">
                </div>
                <label class="control-label col-sm-2" for="price" >Price:</label>
  							<div class="col-sm-10">
  								<input type="number" class="form-control" id="price" name="price">
                </div>
                <label class="control-label col-sm-2" for="quantity" >Quantity:</label>
  							<div class="col-sm-10">
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
    <div id="CartInfo" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
          <h4 class="modal-title" align="left"></h4>
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					
  				</div>
  				<div class="modal-body">
  					<p>Stock Successfully Updated!</p>
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
<script src="{{ asset('js/purchasescript.js') }}"></script>
<!-- /main -->
@endsection