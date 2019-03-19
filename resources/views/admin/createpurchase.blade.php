@extends('admin.layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Out of Stocks
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          
                          <th>Product Name</th>
                          <th>Product Variation</th> 
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($dataProductofStock as $OutofStockProduct)
                        <tr>
                       
                          <td>{{$OutofStockProduct->product->product_name}}</td>
                          <td><em class="productprice">{{$OutofStockProduct->warehousequantity}}</em>  </td>
                          <td style="width:100px;" class="td-actions">
                            <a href="javascript:;" style="margin-bottom:0px;" class="request-modal btn btn-mini btn-info" data-id="{{$OutofStockProduct->product->id}}" data-skuid="{{$OutofStockProduct->id}}" data-productname="{{$OutofStockProduct->product->product_name}}" data-productoptionname="{{$OutofStockProduct->varoption['option_name']}}">
                              <i class="icon-plus"> </i> Add Request
                            </a> 
                          </td>
                        </tr>
                        @empty
                        <tr><td colspan='4'><em>No Data</em></td></tr>
                        @endforelse
                      </tbody>
                    </table>   
                </div>
        </div>
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Stocks
                    </h2>
                    
                    <form action="{{ route('purchasesearch') }}" method="post">
                      {{ csrf_field() }}     
                      <div class="input-group col-md-6 col-sm-6" style="float:right;">
                        <input type="text" class="form-control" placeholder="Product Search" name="q">
                        <input type="hidden" class="form-control" name="purchasenumber" value="{{$purchasenumber}}">
                        <span class="input-group-btn">
                          <button type="submit" class="btn btn-primary">Search</button>
                        </span>
                      </div>
                    </form>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                <div>{{ $dataProduct->links() }}</div> 
                    <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>Variation - Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($dataProduct as $Product)
                      <tr>
                        <td>{{$Product->product_name}}</td>
                        <td class="td-actions">
                          @forelse($Product->productskus as $prosku)
                          <table class="table table-bordered">                
                              <tbody>
                                <tr>
                                  <td style="width:150px;">{{$prosku->varoption['option_name']}}</td>
                                  <td>{{$prosku->warehousequantity}}</td>
                                  <td style="width:100px;" class="td-actions">
                                    <a href="javascript:;" style="margin-bottom:0px;" class="request-modal btn btn-mini btn-info" data-id="{{$Product->id}}" data-skuid="{{$prosku->id}}" data-productname="{{$Product->product_name}}" data-productoptionname="{{$prosku->varoption['option_name']}}" >
                                      <i class="icon-plus"> </i> Add Request
                                    </a> 
                                  </td>
                                  
                                </tr>
                              </tbody>
                          </table> 
                          @empty
                          <em>No Variation</em>    
                          @endforelse 
                        </td>
                      </tr>
                      @empty
                      <tr><td colspan='4'><em>No Data</em></td></tr>
                      @endforelse
                    </tbody>
                  </table>
                </div> <!--end x_content-->
         </div><!--end x_panel-->
      </div><!--end col-->
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Purchase Request
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">  
                <h3 style="padding-bottom:20px;">PR #: {{$purchasenumber}}</h3> 
                  <table class="table table-striped table-bordered" >
                    <thead>
                      <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Quantity</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($dataPurchaseRecord as $Request)
                      <tr>
                        <td>{{$Request->product->product_name}}</td>
                        <td>{{$Request->skuoption->varoption->option_name}}</td>
                        <td><em class="productprice">{{$Request->quantity}}</em>  </td>
                        <td style="width:100px;" class="td-actions"><a href="javascript:;" class="delete-modal btn btn-mini btn-danger" data-id="{{$Request->id}}" ><i class="icon-minus"> </i>Remove</a> </td>
                      </tr>
                      @empty
                      <tr><td colspan='4'><em>No Data</em></td></tr>
                      @endforelse 
                    </tbody>
                  </table>
                  <div style="text-align:right; padding-top:20px;"><a href="javascript:;" class="generate-modal btn btn-mini btn-success" data-purchasenumber="{{$purchasenumber}}"><i class="icon-save"> </i>Generate Purchase Request</a></div>
                </div> <!--end x_content-->
         </div><!--end x_panel-->
      </div><!--end col-->
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
  								<input type="hidden" class="form-control" id="fid" disabled>
                  <input type="hidden" class="form-control" id="skuid">
                  <input type="hidden" class="form-control" id="addpurchasenumber" name="addpurchasenumber" value="{{$purchasenumber}}">
                  <input type="hidden" class="form-control" id="addpurchasedate" name="addpurchasedate" value="<?php echo date('m/d/Y'); ?>">
              <div class="row">
                <div class="text-right col-sm-4" for="Product Name" > <strong>Product:</strong></div>
                  <div class="col-sm-8">
                    <em class=""><strong><span class="productname"></span></strong></em>
                  </div> 
                </div>
                <div class="row" style="margin:10px;"><div class="text-right col-sm-4" for="Variation" ><strong>Variation:</strong> </div>
                  <div class="col-sm-8">
                    <em class="" ><strong><span class="variation"></span></strong></em>
                  </div>   
                </div>
              
              <div class="form-group">
                  <label class="control-label col-sm-4" for="quantity" >Request Quantity:</label>
  							<div class="col-sm-8">
  								<input type="number" class="form-control" id="quantity" name="quantity">
                </div>
              </div>
  					</form>
  					<div class="deleteContent">
  						Are you sure you want to remove this stock request <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
                    <div class="generateContent">
  						Are you sure you want to generate this request order <span class="dname"></span> ? <span
  							class="hidden purchasenumber"></span>
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button"> </span>
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
  					<p>Stock Request Successfully Added!</p>
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
<script src="{{ asset('js/requestscript.js') }}"></script>
<!-- /main -->
@endsection