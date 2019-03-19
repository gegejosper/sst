@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
					<div class="widget widget-nopad">
						@foreach($dataProduct as $Product)
							<div class="row">

									<div class="span4">
									<img class="img-fluid" src="{{ asset('productimg') }}/{{$Product->pic}}" alt="" width="300px;">
									</div>

									<div class="span8">
									<h3 class="my-3">Product Name: {{$Product->product_name}}</h3>
									<br>
									<br>
									<div class="product-item">
									<h4 class="my-3">Product Description</h4>
									<p>{{$Product->description}}</p>
									</div>
									<h5 class="my-3">Product Details</h5>
									<ul>
											<li>Warehouse Quantity : {{$Product->warehousequantity}}</li>
											<li>Category: <a class="name">{{$Product->category->cat_name}}</a></li>
									</ul>
								</div>
							</div> 
						</div>
        		@endforeach
        	</div>
      	</div>
      <!-- /row --> 
			<div class="row">
			<div class="span8">
            <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Product Branch Availability</h3>
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
                                            <th>Branch Name</th>
                                            <th>Branch Quantity</th>
                                            <th>Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dataProductquantity as $Productquantity)
                                        <tr class="item{{$Productquantity->id}}">
                                            <!-- <td style="width:100px;">{{$Product->id}}</td> -->
                                            <td> <a href="/accounting/branchs/{{$Productquantity->branch_id}}" class="name">{{$Productquantity->branch->branch_name}}</a> </td>
                                            <td>{{$Productquantity->quantity}}</td>
                                            <td style="width:100px;" class="td-actions"><a href="/accounting/branchs/{{$Productquantity->branch_id}}" class="btn btn-mini btn-info" ><i class="icon-search"> </i></a></td>
                                        
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>          
                                </div>      
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
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