@foreach($dataProduct as $Product)
            <div class="col-lg-3 col-md-4 mb-3">
              <div class="card h-100">
                <img class="card-img-top" src="{{asset('productimg')}}/{{$Product->pic}}" alt="">
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="/product/{{$Product->id}}">{{$Product->product_name}}</a>
                  </h4>
                  <p class="card-text">{{$Product->description}}</p>
                </div>
               
              </div>
            </div>
@endforeach

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