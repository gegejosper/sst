@extends('admin.layouts.admin')

@section('content')


<div class="row">
@foreach($dataDistribution as $RecordBranch) 
  @if($RecordBranch->status != 1)
  <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Stocks
                    </h2>
                    <form action="{{ route('distributionsearch') }}" method="post">
                      {{ csrf_field() }}     
                      <div class="input-group col-md-6 col-sm-6" style="float:right;">
                        <input type="text" class="form-control" placeholder="Product Search" name="q">
                        <input type="hidden" class="form-control" name="distributionnumber" value="{{$distributionnumber}}">
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
                                  <td style="width:150px;"> <a href="javascript:;" style="margin-bottom:0px;" class="distri-modal btn btn-mini btn-info" data-id="{{$Product->id}}" data-skuid="{{$prosku->id}}" data-max="{{$prosku->warehousequantity}}" data-productname="{{$Product->product_name}}" data-productoptionname="{{$prosku->varoption['option_name']}}" ><i class="icon-plus"> </i> Distribute</a> </td>
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
                </div>
         </div>
      </div>
              
  @endif 

@endforeach
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
          @foreach($dataDistribution as $RecordBranch)
                  <div class="x_title">
                    <h2>Distribution Record for {{$RecordBranch->branch->branch_name}}
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">   
  
                    <h3 style="padding-bottom:20px;">DR #: {{$distributionnumber}}</h3>
                    <table class="table table-striped table-bordered" >
                        <thead>
                          <tr>
                            <th>Product Name</th>
                            <th>Product Variation</th>
                            <th>Quantity</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                          @forelse($dataDistributionRecord as $Record)
                          <tr>
                        
                            <td>{{$Record->product->product_name}}</td>
                            <td>{{$Record->skuoption->varoption->option_name}}</td>
                            <td><em class="productprice">{{$Record->quantity}}</em>  </td>
                            @if($RecordBranch->status != 1)
                            <td style="width:100px;" class="td-actions"><a href="javascript:;" class="delete-modalAdmin btn btn-mini btn-danger" data-id="{{$Record->id}}" data-quantity="{{$Record->quantity}}" data-productid="{{$Record->productid}}" data-skuid="{{$Record->skuid}}"><i class="icon-minus"> </i>Remove</a> </td>
                            @else
                            <td></td>
                            @endif 

                          </tr>
                          @empty
                          <tr><td colspan='4'><em>No Data</em></td></tr>
                          @endforelse
                          
                        
                        </tbody>
                    </table>
                    @if($RecordBranch->status != 1)
                    <div style="text-align:right; padding-top:20px;"><a href="javascript:;" class="generate-modalAdmin btn btn-mini btn-success" data-distributionnumber="{{$distributionnumber}}"><i class="icon-save"> </i>Process Delivery</a></div>
              
                    @endif 
                    
                </div>        
          @endforeach
        </div>
      </div>
</div>
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span4">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th"></i>
              <h3></h3>
              <div style="float:right; padding-right:10px;"></div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            
            </div>
            <!-- /widget-content --> 
        </div>        
        </div>

        <!-- Request -->
        <div class="span8">
       
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
                        
                <label class="control-label col-sm-4" for="quantity" >Distribution Quantity:</label>
  							<div class="col-sm-8">
                
  								<input type="number" class="form-control" id="quantity" name="quantity" value="0">    
                  <em class="" style="padding-left:10px;">Maximum to Quantity : <strong><span class="max"></span></strong></em>
                  <input type="hidden" class="form-control" id="fid">
                  <input type="hidden" class="form-control" id="skuid">
                  <input type="hidden" class="form-control" id="adddistributionnumber" name="adddistributionnumber" value="{{$distributionnumber}}">
                  <input type="hidden" class="form-control" id="addbranchid" name="addbranchid" value="@foreach($dataDistribution as $RecordBranch){{$RecordBranch->branchid}}@endforeach">
                  <input type="hidden" class="form-control" id="adddistributionnumberdate" name="adddistributionnumberdate" value="<?php echo date('m/d/Y'); ?>">
                </div>
               
              </div>
  					</form>
  					<div class="deleteContent">
  						Are you sure you want to remove this Distribution Record <span class="dname"></span> ? <span
  							class="hidden did"></span>
                <input type="hidden" class="form-control" id="productid" name="productid">
                <input type="hidden" class="form-control" id="skuid" name="skuid">
                <input type="hidden" class="form-control" id="removequantity" name="removequantity">
  					</div>
            <div class="generateContent">
  						Are you sure you want to generate Deliver Record<span class="dname"></span> ? <span
  							class="hidden distributionnumber"></span>
  					</div>
            
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn btn-mini" data-dismiss="modal">
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
    <div id="distributionerror" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Distribution Error</h4>
            </div>
  				<div class="modal-body">
  						<p style="font-size:16px;">Maximum quantity is low.  Please distribute lower or equal to the maximum quantiy or lower. </p> 
  					<div class="modal-footer">
              <button type="button" class="btn btn-warning" data-dismiss="modal">
  							<span class='glyphicon glyphicon-remove'></span> Close
  						</button>
  					</div>
  				</div>
  			</div>
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
<script src="{{ asset('js/distributionscript.js') }}"></script>
<!-- /main -->
@endsection