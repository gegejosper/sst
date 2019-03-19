@extends('assistant.layouts.assistant')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
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
                            <td align="center" style="text-align:center" width="100px"> <a href="#" class="avatar"><img src="{{url('/public/productimg')}}/{{$Productquantity->pic}}" width="50px"/></a> </td>
                              <td style="width:100px;"> {{$Productquantity->product_name}}</td>
                              <td>{{$dataQuantity->quantity}}</td>
                              <td>{{$dataQuantity->price}}</td>
                              <td>{{$dataQuantity->branch->branch_name}}</td>
                              <td style="width:100px;" class="td-actions"> <a href="javascript:;" class="edit-modal btn btn-success btn-small" data-pic="{{$dataQuantity->pic}}" data-amount="{{$dataQuantity->price}}.00" data-quantity="{{$dataQuantity->quantity}}.00" data-name="{{$Productquantity->product_name}}" data-id="{{$dataQuantity->id}}" ><i class="btn-icon-only icon-shopping-cart"> </i><span style="color:#fff;">Add to Cart</span></a></td>
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
      <div class="row">
	      	
	      	<div class="span12">
              <div class="widget-header">
						<i class="icon-star"></i>
						<h3>Daily Sales Summary Report</h3>
					</div>
	      	<div class="info-box">
               <div class="row-fluid stats-box">
                   
                  <div class="span4">
                  	<div class="stats-box-title">Branch 1</div>
                    <div class="stats-box-all-info"><i class="icon-money" style="color:#3366cc;"></i> 555K</div>
                    
                  </div>
                  
                  <div class="span4">
                    <div class="stats-box-title">Branch 2</div>
                    <div class="stats-box-all-info"><i class="icon-money" style="color:#F30"></i> 66.66</div>
                   
                  </div>
                  
                  <div class="span4">
                    <div class="stats-box-title">Total Sales</div>
                    <div class="stats-box-all-info"><i class="icon-money" style="color:#3C3"></i> 15.55</div>
                    
                  </div>
               </div>
               
               
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
<script src="{{ asset('js/cashiercartscript.js') }}"></script>
<!-- /main -->
@endsection