@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
    <div class="row">
        <div class="span12">
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
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Warehouse Quantity</th>
                                            
                                            <th> Action </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dataProduct as $Product)
                                        <tr class="item{{$Product->id}}">
                                            <!-- <td style="width:100px;">{{$Product->id}}</td> -->
                                            <td> <a href="/accounting/products/{{$Product->id}}" class="name">{{$Product->product_name}}</a> </td>
                                            <td>{{$Product->category->cat_name}}</td>
                                            <td>{{$Product->warehousequantity}}</td>
                                            <td style="width:100px;" class="td-actions"><a href="/accounting/products/{{$Product->id}}" class="btn btn-mini btn-info" ><i class="icon-search"> </i></a></td>
                                        
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