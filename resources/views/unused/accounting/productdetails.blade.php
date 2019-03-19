@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Product Details</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
                            <div class="row">
                            <div class="span11">
                                <div class="widget">
                                    
                                    <div class="widget-content">
                                        
                                    @foreach($dataProductquantity as $details => $Productquantity) 
                                    <div class="row">
                                        <div class="span4"><img src="{{ asset('productimg') }}/{{$Productquantity->product->pic}}" width="300px"/></div>
                                        <div class="span6">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <th>Product Name</th>
                                                <td>{{$Productquantity->product->product_name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Quantity</th>
                                                <td>{{$Productquantity->quantity}}</td>
                                            </tr>
                                            <tr>
                                                <th>Price</th>
                                                <td>{{$Productquantity->price}}</td>
                                            </tr>
                                            <tr>
                                                <th>Category</th>
                                                <td>{{$Productquantity->category->cat_name}}</td>
                                            </tr>
                                        
                                            <tr>
                                            <td></td>
                                            <td class="td-actions text-right" style="text-align:right;">
                                               
                                                <a href="/admin/product/edit/{{$Productquantity->id}}" class="edit-modal btn btn-mini btn-success" data-id="{{$Productquantity->id}}" ><i class="icon-pencil"> </i> edit</a>
                                                <a href="javascript:;" class="delete-modal btn btn-mini btn-danger" data-id="{{$Productquantity->id}}" ><i class="icon-trash"> </i> Delete</a> 
                                               
                                            </td>
                                            </tr>
                                            </tbody></table>
                                        </div>
                                    </div>                                    
                                    
                                            
                                            @endforeach
                                    </div> <!-- /widget-content -->
                                    
                                </div> <!-- /widget -->
                                
                            </div>
                            </div>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
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