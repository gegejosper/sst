@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span4">
        <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-plus"></i>
              <h3>Add Purchase Record</h3>
            </div>
            <div class="widget-content" style="padding:20px;">
           
            {{ csrf_field() }}
									<fieldset>	                                        
                                    <div class="input-group mb-3">
                                    <label class="control-label col-sm-2" for="Purchase #" >Purchase #:</label>
                                    <input type="text" class="form-control" placeholder="Purchase #"  aria-describedby="basic-addon2" name="purchasenumber" id="purchasenumber">
                                    <label class="control-label col-sm-2" for="date" >Date:</label>
                                   <input class="control-label col-sm-2" type="text" name="purchasedate" id="purchasedate" value="<?php echo date('m/d/Y'); ?>">
                                    </div>
										
											
										
									</fieldset>
							
            </div>
            </div>
        <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Purchase Record History</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="shortcuts"> 
                <table class="table table-striped table-bordered">
                      <th>Purchase Number</th>
                      <th>Date</th>
                   
                    @foreach($dataPurchase as $puchase)
                    <tr>
                      <td><a href="/admin/purchase/history/{{$puchase->purchasenumber}}">{{$puchase->purchasenumber}}</a></td>
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
        <div class="widget widget-table action-table" >
            <div class="widget-header" style="padding-bottom:10px;"> <i class="icon-sitemap"></i>
              <h3>Products</h3>   
              <form method="post" class="navbar-search pull-right" action="/admin/purchase/search">
              <div class="input-append">
                                                  <input class="span2 m-wrap" id="appendedInputButton" type="search" name="q" class="form-control" placeholder="Search...">
                                                  <button class="btn" type="submit" style="margin-top:-10px;">Search</button>
                                                </div>
                                {{ csrf_field() }}
              </form>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            @foreach($dataProductquantity as $Productquantity)
                      <div class="col-lg-3">      
                          <div class="panel-body">                
                              <div class="panel panel-default">
                                  <div class="panel-heading" style="padding:20px;">
                                  <h5 align="center"> {{$Productquantity->product_name}} Variations</h5>   
                                  </div>
                                  <!-- /.panel-heading -->
                                  <div class="panel-body">
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Product Picture </th>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th>Price</th> 
                              <th>Branch</th>
                             
                            
                              <th class="td-actions"> Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($Productquantity->quantity as $dataQuantity)
                            <tr class="item{{$dataQuantity->id}}">
                            <td align="center" style="text-align:center" width="100px"> <a href="#" class="avatar"><img src="{{ asset('productimg') }}/{{$dataQuantity->pic}}" width="50px"/></a> </td>
                              <td style="width:100px;"> <a href="/admin/product/{{$dataQuantity->id}}">{{$Productquantity->product_name}} - {{$dataQuantity->var_name}}</a></td>
                              <td>{{$dataQuantity->quantity}}</td>
                              <td>{{$dataQuantity->price}}</td>
                              <td>{{$dataQuantity->branch->branch_name}}</td>
                              <td style="width:100px;" class="td-actions"><a href="javascript:;" class="edit-modal btn btn-mini btn-info" data-id="{{$dataQuantity->id}}" ><i class="icon-plus"> </i> Add Stocks</a> </td>
                            </tr>  
                            
                            @empty
                            <tr>
                              <td colspan="5"> <em>No Data</em></td>
                            </tr>
                               
                            @endforelse  
                            </tbody>
                        </table>           
                        </div>
                       
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>  
            @endforeach 
            
          
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