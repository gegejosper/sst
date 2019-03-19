@extends('layouts.front')

@section('content')
<div class="container">

      <div class="row" style="padding-top:50px; padding-bottom:100px;">
        <!-- /.col-lg-3 -->

        <div class="col-lg-12">
        @foreach($dataProductquantity as $Productquantity)
        <div class="row">

            <div class="col-md-8">
            <img class="img-fluid" src="{{ asset('productimg') }}/{{$Productquantity->product->pic}}" alt="">
            </div>

            <div class="col-md-4">
            <h3 class="my-3">{{$Productquantity->product->product_name}} - {{$Productquantity->var_name}}</h3>
            
            <div class="product-item">
            <h4 class="my-3">Product Description</h4>
            <p>{{$Productquantity->description}}</p>
            </div>
            
            <h5 class="my-3">Product Details</h5>
            <ul>
                <li>Availability : {{$Productquantity->quantity}} {{$Productquantity->unit}}</li>
                <li>Category: <a href="/category/{{$Productquantity->category_id}}" class="name">{{$Productquantity->category->cat_name}}</a></li>
                <li>Price:  &#8369; {{$Productquantity->price}}</li>
               
            </ul>
            
            <br />
                <a href="javascript:;" class="edit-modal btn btn-warning" data-pic="{{$Productquantity->pic}}" data-amount="{{$Productquantity->price}}.00" data-name="{{$Productquantity->product->product_name}}" data-id="{{$Productquantity->id}}" ><i class="icon-shopping-cart"> </i><span style="color:#fff;">Add to Cart</span></a>
            
            </div>
            
        </div> 
        @endforeach
        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

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
  						<div class="form-group row">
  							<div class="col-sm-3">
                  <img src="" alt="product image" id="productimg" width="100">
  								<input type="hidden" class="form-control" id="fid" disabled>
                  <input type="hidden" class="form-control" id="amount" disabled>
  							</div>
                <div class="col-sm-8">
                  <p><strong>Product Name: </strong><span id="productedit_name"></p>
                  <p ><strong>Amount: </strong> &#8369; <span id="productamount"></span></p>
                  <strong>Quantity:</strong>
  
  								<input type="number" class="form-control" id="quantity" name="quantity">
  						
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
  					<p>Product Successfully Added to the Cart!</p>
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
<script src="{{ asset('js/cartscript.js') }}"></script>
@endsection
