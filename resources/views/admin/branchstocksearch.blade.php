@extends('admin.layouts.admin')

@section('content')
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-6 noprint">
            <div class="x_panel">
                  <div class="x_title">
                    <h2>Settings for Branch  
                        @foreach($dataBranch as $Branch)
                          {{$Branch->branch_name}}
                        @endforeach
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @foreach($dataBranch as $Branch)
                      <a href="/admin/branch/stocks/{{$Branch->id}}" class="shortcut reportshortcut btn btn-app" >
                        <i class="fa fa-database"></i><span class="shortcut-label">Stocks</span> 
                      </a>
                      <a href="/admin/branch/users/{{$Branch->id}}" class="btn btn-app">
                        <i class="fa fa-group"></i><span class="shortcut-label">Users</span> 
                      </a>
                      <a href="/admin/report/branch/{{$Branch->id}}" class="btn btn-app shortcut reportshortcut">
                          <i class="fa fa-bar-chart"></i> <span class="shortcut-label">Report</span> 
                      </a>
                    @endforeach
                  </div>
                </div>
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="icon-sitemap"></i> Products 
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @if(Session::has('success'))
                      <div class="alert alert-success">
                          {{ Session::get('success') }}
                          @php
                          Session::forget('success');
                          @endphp
                      </div>
                      @endif
                      
                      <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Product Name</th>
                              <th>Status</th>
                              <th class="td-actions">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($arrayProduct as $Product)
                            <tr class="item{{$Product->id}}">
              
                              <td style="width:100px;"><a href="/admin/products/{{$Product->id}}">{{ucwords($Product->product_name)}}</a></td>
                              <td><em>Not Available on Branch</em></td>
                              
                              <td style="width:100px;" class="td-actions"><a href="/admin/branch/stocks/add/{{$dataBranchId}}/{{$Product->id}}" class="btn btn-mini btn-info">Add Product</a> </td>
                              
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>
        </div>
        <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
        <div class="x_title">
                    <h2><i class="icon-sitemap"></i> Stocks 
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="col-sm-12 col-md-6 noprint">
                          <form method="get" action="/admin/branch/stockssearch">         
                              <div class="input-group">
                                  <input type="search" name="q" class="form-control" placeholder="Search...">
                                  <input type="hidden" name="branchid" value="{{$dataBranchId}}">
                                  <span class="input-group-btn">
                                      <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                  </span>
                                </div>
                              {{ csrf_field() }}
                              </span>
                          </form>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                           
                            <th>Product Name</th>
                            <th>Variation</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th class="td-actions noprint"> Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($dataBranchProduct as $ProductquantityResult)
                            @foreach($ProductquantityResult as $Productquantity)
                          <tr class="item{{$Productquantity->prod_id}}">
                      
                            <td style="width:100px;"><a href="/admin/products/{{$Productquantity->prod_id}}">{{ ucwords($Productquantity->product->product_name) }}</a></td>
                            <td style="width:100px;">{{$Productquantity->productvariants->option_name}}</td>
                            <td style="width:100px;">{{$Productquantity->quantity}}</td>
                            <td style="width:100px;">{{$Productquantity->price}}</td>
                            
                            
                            <td style="width:200px;" class="td-actions noprint">
                              <a href="/admin/products/{{$Productquantity->prod_id}}" class="edit-modal btn btn-mini btn-info"  ><i class="icon-search"> </i>View</a> 
                              <a href="javascript:;" class="editPriceAdmin btn btn-success btn-mini" data-pic="{{$Productquantity->product->pic}}" data-amount="{{$Productquantity->price}}.00" data-quantity="{{$Productquantity->quantity}}.00" data-name="{{$Productquantity->product->product_name}}" data-id="{{$Productquantity->id}}" ><i class="btn-icon-only icon-shopping-cart"> </i><span style="color:#fff;">Update Product</span></a>
                              </td>
                            
                          </tr>
                          @endforeach
                          @endforeach
                          <tr>
                            <td colspan="5">
                            <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                            <script>
                            function myFunction() {
                            window.print();}
                            </script>
                            </td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
              </div>            

       
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
  						
                <div class="col-sm-8">
                  <p><strong>Product Name: </strong><span id="productedit_name"></p>
                  <p ><strong>Branch Price: </strong></p>
              
  								<input type="number" class="form-control" id="productamount" name="productamount">
                  <p ><strong>Branch Quantity: </strong></p>
              
  								<input type="number" class="form-control" id="branchquantity" name="branchquantity">
  						
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
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
    </div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/productscript.js') }}"></script>
<script src="{{ asset('js/itemscript.js') }}"></script>
<!-- /main -->
@endsection