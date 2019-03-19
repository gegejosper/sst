@extends('admin.layouts.admin')

@section('content')
<div class="row">
<div class="col-md-9 col-sm-9 col-xs-12">
        <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps anchor">
                        <li>
                          <a class="selected" isdone="1" rel="1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br>
                                              <small>Add Product Details</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a  class="selected" isdone="1" rel="2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br>
                                              <small>Add Product Variation</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a  class="selected" isdone="1" rel="3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br>
                                              <small>Add Branch Availability</small>
                                          </span>
                          </a>
                        </li>
                        
                      </ul>
            </div>    
    </div>
</div>
<div class="row">
    
    <div class="col-md-3 col-sm-3 col-xs-12">
    
        <div class="x_panel">
				@foreach($dataProduct as $Product)  
				<div class="x_title">
                    <h3>Add Product Basic Info
                    </h3>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">     
					<h4 class="my-3">Product Name: {{$Product->product_name}}</h4>
									<div class="product-item">
									<h5 class="my-3">Product Description</h5>
									<p>{{$Product->description}}</p>
									</div>
									<h5 class="my-3">Product Details</h5>
									<ul>
											<li>Category: <a class="name">{{$Product->category->cat_name}}</a></li>
                                            <li>Unit: <a class="name">{{$Product->unit}}</a></li>
                                            <li>Bulk Quantity: <a class="name">{{$Product->bulkquantity}}</a></li
                                            <li>Bulk Unit: <a class="name">{{$Product->bulkunit}}</a></li>
									</ul>
                                    <h5 class="my-3">Product Variations</h5>
									<ul>
                                    @foreach($dataProductVariantOptions as $ProductVariantOptions)
                                        <li>
                                        {{$ProductVariantOptions->varoption->option_name}} - <em> {{$ProductVariantOptions->warehousequantity}}</em>
                                        </li>
                                    @endforeach
									</ul>	
				</div>
				@endforeach
		</div>
	</div>

    <div class="col-md-6 col-sm-6 col-xs-12">
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
            Session::forget('success');
            @endphp
        </div>
    @endif
    <div class="x_panel">
    <div class="x_title">
                    <h3>Product Branch Availability</h3>
                    
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">     
					@if(count($productArray) != 0)
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                        <tr>
                            <th>Branch Name</th>
                            <th>Branch Status</th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        //print_r($productArray);
                        ?>
                        @forelse($productArray as $Product)
                        <tr class="item{{$Product['branch_id']}}">
                            <td> <a href="/admin/branchs/{{$Product['branch_id']}}" class="name">{{$Product['branchname']}}</a> </td>
                            <td><em>Not Available</em></td>
                            <td style="width:100px;" class="td-actions"><a href="/admin/products/branch/add/{{$Product['branch_id']}}/{{$Product['prodid']}}" class="btn btn-mini btn-success" ><i class="fa fa-plus"> </i> Add To Branch </a></td>
                        </tr>
                        @empty
                        <tr><td colspan="3"><em>Product Variations available to all Branches</em> </td></tr>
                        @endforelse
                        </tbody>
                    </table>
                    @endif   
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                        <tr>
                            <th>Branch Name</th>
                            <th>Product Variation</th>
                            <th>Branch Stock Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        @forelse($productArrayFound as $branch => $Productbranch )
                        <!-- {{print_r($Productbranch)}} -->
                        <tr class="item{{$Productbranch['branch_id']}}">
                            <td> <a href="/admin/branchs/{{$Productbranch['branch_id']}}" class="name"> 
                               {{$Productbranch['branch']['branch_name']}} 
                            </a> </td>
                            <td>{{$Productbranch['variation']['option_name']}}</td>
                            <td>{{$Productbranch['quantity']}}</td>
                        </tr> 
                       
                        @empty
                        <tr><td colspan="3"><em>Product Variations available to all Branches</em> </td></tr>
                        @endforelse
                        </tbody>
                    </table>       
				</div>
		</div>
        <div class="actionBar"><a href="/admin/products/addvariation/{{$productid}}" class="buttonNext btn btn-success">Back</a><a href="/admin/products" class="buttonFinish btn btn-info">Finish</a></div>
	</div>

</div>

<!-- /main -->
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
  								<input type="hidden" class="form-control" id="fid">
                                <input type="hidden" class="form-control" id="optionid" >
  							</div>
  						</div>
  						<div class="form-group col-md-4">
                        <label class="control-label" for="Variation">Variation Type</label>  
                            <div class="">
                                   <input id="editvartype" name="editvartype" type="text" placeholder="" class="form-control input-md" required>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label" for="Price">Price</label>  
                            <div class="">
                                <input id="editvarprice" name="editvarprice" type="number" placeholder="" class="form-control input-md" required>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                        <label class="control-label" for="Stocks">Warehouse Stocks</label>
                            <div class="">
                                <input id="editvarstocks" name="editvarstocks" type="number" placeholder="" class="form-control input-md" required>
                            </div>
                        </div>
  					</form>
  					
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
<script src="{{ asset('js/variationscript.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.js"></script>
@endsection