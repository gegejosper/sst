@extends('admin.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
    <div class="row">
        <div class="span6">
            <div class="widget widget-nopad">
            
                <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Add Product Basic Info</h3>
                </div>
                
                <!-- /widget-header -->
                <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    <div id="big_stats" class="cf">
                        <div class="control-group padding-20">	
                        <form enctype="multipart/form-data" action="{{ route('addproducts') }}" method="post">
                        {{ csrf_field() }}    
                        <label for="Product Name">Product Image</label> 
                        <input data-preview="#preview" name="input_img" type="file" id="imageInput" required>
                                                <img class="col-sm-6" id="preview"  src="" ></img>
                            <label for="Product Name">Product Name</label>
                            <input type="text" class="form-control" placeholder="Product Name"  name="product_name">
                            <label class="control-label" for="Description">Description</label>
                                                <div class="controls">
                                                <textarea name="description" id="description" cols="50" rows="10" placeholder="Description" style="width:90%;"></textarea>			
                                                </div>   
                            <label for="Brand Name">Brand</label>
                                <select name="brand_id" id="brand_id">
                                    @foreach($dataBrand as $Brand)
                                        <option value="{{$Brand->id}}">{{$Brand->brand_name}}</option>
                                    @endforeach
                                </select>
                                <div class="control-group">											
                                            <label for="Category">Category</label>
                                            <select name="category_id" id="category_id">
                                                @foreach($dataCategory as $Category)
                                                    <option value="{{$Category->id}}">{{$Category->cat_name}}</option>
                                                @endforeach
                                            </select>
                                        
								</div> 
                                <div class="control-group">											
                                    <label for="Warehouse Quantity">Warehouse Quantity</label>
                                    <input type="number" class="form-control" placeholder="Warehouse Quantity"  name="warehousequantity">      
								</div> 
                                
                                <button class="btn btn-large btn-primary " type="submit" id="add" >Save</button>      
                        </form>
                        </div>  <!-- .stat --> 
                    </div>
                    </div>
                    <!-- /widget-content --> 
                </div>
                </div>
            </div>
        </div>
        <div class="span6">
            <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Product List</h3>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                    
                    <div id="big_stats" class="cf">
                        <div class="control-group padding-20">	
                        <table class="table table-striped table-bordered" id="table">
                <thead>
                  <tr>
                    <!-- <th>Product ID</th> -->
                    <th>Name</th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
            
  				
                  @foreach($dataProduct as $Product)
                  <tr class="item{{$Product->id}}">
                    <!-- <td style="width:100px;">{{$Product->id}}</td> -->
                    <td> <a href="products/{{$Product->id}}" class="name">{{$Product->product_name}}</a> </td>
                    <td style="width:100px;" class="td-actions"><a href="products/{{$Product->id}}" class="btn btn-mini btn-info" ><i class="icon-search"> </i></a><a href="javascript:;" class="edit-modal btn btn-mini btn-info" data-id="{{$Product->id}}" data-name="{{$Product->product_name}}" data-description="{{$Product->description}}"><i class="icon-pencil"> </i></a>  </td>
                    
                   </tr>
                   @endforeach
                </tbody>
              </table>          
                        </div>  <!-- .stat --> 
                    </div>
                    </div>
                    <!-- /widget-content --> 
                </div>
                </div>
            </div>
        </div>
    </div>
      <div class="row">
        <div class="span12">
            
            <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-plus"></i>
                    <h3>Add Product Quantity</h3>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    <form enctype="multipart/form-data" action="{{ route('addproductquantity') }}" method="post">
                        
                        <div class="widget-content" style="padding:20px;">
                        {{ csrf_field() }}                                       
                          
                                <div class="span3">
                                    <div class="widget"> 
                                        <label for="Product Name">Product Name</label> 
                                        <select name="prod_id" id="prod_id">
                                        @foreach($dataProduct as $Product)
                                                <option value="{{$Product->id}}">{{$Product->product_name}}</option>
                                        @endforeach
                                        </select>
                                       
                                       
                                        <div class="control-group">											
											<label class="control-label" for="Regular Price">Branch Regular Price</label>
											<div class="controls">
                                            <input type="text" class="form-control" placeholder="Regular Price"  name="price">
											</div> <!-- /controls -->				
										</div>
                                        <div class="control-group">											
                                            
                                            <label for="Quantity">Quantity</label>
                                            <input type="text" class="form-control" placeholder="Quantity" name="quantity">    		
										</div> 
                                        
                                    </div> <!-- /widget -->   
                                </div>
                                <!-- <div class="span4">
                                    <div class="widget">   
                                    <label for="Supplier">Supplier</label>
                                        <select name="supplier_id" id="supplier_id">
                                            @foreach($dataSupplier as $Supplier)
                                                <option value="{{$Supplier->id}}">{{$Supplier->supplier_name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="Branch Name">Branch Availability</label> 
                                        <select name="branch_id" id="branch_id">
                                        @foreach($dataBranch as $Branch)
                                                <option value="{{$Branch->id}}">{{$Branch->branch_name}}</option>
                                        @endforeach
                                        </select>
                                    </div> /widget   
                                </div> -->
                                <div class="span12"><button class="btn btn-lg btn-primary " type="submit" id="add">Save</button></div>    
                                        
                        </div>
                       
                    </form>
            </div>
        </div>

        <!-- /span4 -->
        <div class="span12">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-sitemap"></i>
              <h3>Products</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Product Picture </th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Category</th>
                    
                    <th class="td-actions"> Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dataProductquantity as $details => $Productquantity)
                  <tr class="item{{$Productquantity->id}}">
                  <td align="center" style="text-align:center" width="100px"> <a href="#" class="avatar"><img src="{{ asset('productimg') }}/{{$Productquantity->product->pic}}" width="50px"/></a> </td>
                    <td style="width:100px;"><a href="/admin/product/{{$Productquantity->id}}">{{$Productquantity->product->product_name}}</td>
                    <td>{{$Productquantity->quantity}}</td>
                    <td>{{$Productquantity->price}}</td>
                    <td>{{$Productquantity->category->cat_name}}</td>
                    
                    <td style="width:100px;" class="td-actions"><a href="/admin/product/{{$Productquantity->id}}" class="edit-modal btn btn-mini btn-info"  ><i class="icon-search"> </i>View</a> </td>
                    
                   </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>            

       

        </div>
        <!-- /span4 --> 
      </div>
   
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
  							<label class="control-label col-sm-2" for="supplier_name" >Product Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="productedit_name" name="productedit_name">
  							</div>
                <label class="control-label col-sm-2" for="description" >Description:</label>
  							<div class="col-sm-10">
  							
                 
                  <textarea name="editdescription" id="editdescription" cols="30" rows="10"></textarea>
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
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/productscript.js') }}"></script>
<!-- /main -->
@endsection