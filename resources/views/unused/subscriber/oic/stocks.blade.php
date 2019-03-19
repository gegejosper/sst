@extends('admin.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
        <!-- <div class="row">
            <div class="span12">
              <div class="widget widget-table action-table">
                  <div class="widget-header"> <i class="icon-plus"></i>
                      <h3>View Stocks</h3>
                  </div>
                  <div class="widget-content" style="padding:20px;">
                      @foreach($dataBranch as $Branch)
                      <a href="/admin/branchs/{{$Branch->id}}" class="btn btn-warning">{{$Branch->branch_name}}</a>
                      
                      @endforeach
                  </div>
              
              </div>
            </div>
        </div>
     -->
      <div class="row">
 
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
                  @foreach($dataProductquantity as $Productquantity)
                  <tr class="item{{$Productquantity->id}}">
                  <td align="center" style="text-align:center" width="100px"> <a href="#" class="avatar"><img src="{{ asset('productimg') }}/{{$Productquantity->product->pic}}" width="50px"/></a> </td>
                    <td style="width:100px;"><a href="/admin/product/{{$Productquantity->id}}">{{$Productquantity->product->product_name}}</a></td>
                    <td>{{$Productquantity->quantity}}</td>
                    <td>{{$Productquantity->price}}</td>
                    <td>{{$Productquantity->category->	cat_name}}</td>
                    
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