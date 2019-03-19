@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-8 col-xs-12">
          <div class="x_panel">
                <div class="x_title">
                    <h2>Product List
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <div class="col-sm-12 col-md-6">
                    <div>{{ $dataProduct->links() }}</div> 
                </div>
                <div class="col-sm-12 col-md-6 noprint">
                    <form method="get" action="/admin/productsearch">         
                        <div class="input-group">
                            <input type="search" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                          </div>
                        {{ csrf_field() }}
                        </span>
                    </form>
                </div>
                
                
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Variation</th>
                            <!-- <th>Warehouse Quantity</th> -->
                            <th class="noprint"> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($dataProduct as $Product)
                        <tr class="item{{$Product->id}}">
                            <!-- <td style="width:100px;">{{$Product->id}}</td> -->
                            <td>{{$Product->updated_at}}</td>
                            <td> <a href="/admin/products/{{$Product->id}}" class="name">{{ ucwords($Product->product_name) }}</a> </td>
                            <td>{{$Product->category->cat_name}}</td>
                            <td>
                                @forelse($Product->productvariation as $variation)
                                    <strong>{{$variation->var_name}}</strong> <br>
                                        <ul>
                                        @foreach($variation->productvariations as $options)
                                        <li>{{ $options->option_name}}</li>
                                        @endforeach
                                        </ul>
                                @empty
                                <em>No Variation</em>    
                                @endforelse
                            </td>
                            <!-- <td>{{$Product->warehousequantity}}</td> -->
                            <td  class="td-actions noprint">
                                <a href="/admin/products/{{$Product->id}}" class="btn btn-mini btn-info" ><i class="fa fa-search"> </i> View </a>
                                <a href="/admin/products/addvariation/{{$Product->id}}" class="btn btn-mini btn-success" ><i class="fa fa-plus"> </i> Add Variation </a>
                                <?php if (count($Product->productvariation) != 0){?>
                                <a href="/admin/products/branchadd/{{$Product->id}}" class="btn btn-mini btn-info" ><i class="fa fa-plus"> </i> Add Branch Availability </a>
                                <?php }?>
                                <a href="javascript:;" class="edit-modal btn btn-mini btn-info" data-id="{{$Product->id}}" data-name="{{$Product->product_name}}" data-wquantity="{{$Product->warehousequantity}}" data-description="{{$Product->description}}"><i class="fa fa-edit"> </i> Edit </a>  </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" align="center"><em>No Products Found!</em></td></tr>
                        @endforelse
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
                    <div>{{ $dataProduct->links() }}</div> 
                </div>
    </div>

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
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="description" >Description:</label>
  							<div class="col-sm-10">
                                <textarea name="editdescription" id="editdescription" cols="30" rows="10"></textarea>
                              </div>
                        </div>
                        <!-- <div class="form-group">
                              <label class="control-label col-sm-2" for="supplier_name" >Warehouse Quantity:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="warehousequantityedit" name="warehousequantityedit">
  							</div>
                          </div>
             -->
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