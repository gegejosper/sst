@extends('cashier.layouts.cashier')

@section('content')
<script>
    
</script>
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span4">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-plus"></i>
              <h3>Package Details</h3>
            </div>
            <div class="widget-content" style="padding:20px;">
            <div class="input-group mb-3">
                                      <img src="{{ asset('img/skycable.jpg')}}" alt="" width="300px;" style="padding-bottom:20px;">
                                      
                                       @foreach($dataPackage as $Package)
                                      <p>Package Name: <strong> {{$Package->package->packagename}} </strong></p>
                                      <p>Description: <strong> {{$Package->package->description}} </strong></p>
                                      <p>Package Price: <strong> {{$Package->price}} </strong></p>
                                      <?php $packapagePrice = $Package->price ?>
                                      @endforeach
                                    </div>
            </div>
        </div>
        </div>
        <div class="span8">
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-plus"></i>
              <h3>Package Order</h3>
            </div>
            <div class="widget-content" style="padding:20px;">
           
            {{ csrf_field() }}
            <div id="formerrors"></div>
									<div style="width:40%; display:inline; float:left;">	                                        
                                   
                                    
                                    <table class="table table-striped table-bordered">
                                    <thead>
                                      <th colspan="2"><strong>Package Inclusions</strong></th>
                                      <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($dataPackageItem as $ProductDetail)
                                      <tr class="item{{$ProductDetail->productidd}}">
                                        <td > <a href="/cashier/products/{{$ProductDetail->productid}}"> <img src="{{ asset('productimg') }}/{{$ProductDetail->product->pic}}" width="50px"/> {{$ProductDetail->product->product_name}}</a></td>
                                        <td>{{$ProductDetail->quantity}}</td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                                    
									</div>
                  <fieldset style="width:40%; display:inline; float:right;">	                                        
                                    <div class="input-group mb-3">
                                    <label for="box">Box ID</label>
                                    <input id="boxid" type="text" class="form-control" placeholder="Box ID"  aria-describedby="basic-addon2" name="boxid" required>
                                    <label for="fName">First Name</label>
                                    <input id="fname" type="text" class="form-control" placeholder="First Name"  aria-describedby="basic-addon2" name="fname" required>
                                    <label for="lName">Last Name</label>
                                    <input id="lname" type="text" class="form-control" placeholder="Last Name"  aria-describedby="basic-addon2" name="lname" required>
                                    <label for="Email">Email</label>
                                    <input id ="email" type="email" class="form-control" placeholder="Email"  aria-describedby="basic-addon2" name="email" required>
                                    <label for="contact">Contact Number</label>
                                    <input id="contactnum" type="text" class="form-control" name="contactnum" aria-describedby="basic-addon2" required>                                  
                                    <label for="Address">Address</label>
                                    <input id="address" type="text" class="form-control" name="address" aria-describedby="basic-addon2" required>  
                                    <?php 
                                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $charactersLength = strlen($characters);
                                    $ordernumber = '';
                                    for ($i = 0; $i < 10; $i++) {
                                        $ordernumber .= ucwords($characters[rand(0, $charactersLength - 1)]);
                                    }
                                    
                                    ?>
                                    <input id="ordernumber" type="hidden" class="form-control"  aria-describedby="basic-addon2" name="ordernumber" value="{{$ordernumber}}">
                                    <label for="orNumber">OR Number</label>
                                    <input id="ornumber" type="text" class="form-control"  aria-describedby="basic-addon2" name="ornumber">                                
                                    <input id="packageid" type="hidden" class="form-control"  aria-describedby="basic-addon2" name="packageid" value="{{$packageid}}">
                                    <input id="dataBranchID" type="hidden" class="form-control"  aria-describedby="basic-addon2" name="dataBranchID" value="{{$dataBranchID}}">
                                    <input id="dataBranchID" type="hidden" class="form-control"  aria-describedby="basic-addon2" name="userId" value="{{$userId}}">
                                    <input id="packapagePrice" type="hidden" class="form-control"  aria-describedby="basic-addon2" name="packapagePrice" value="{{$packapagePrice}}">
                                    <input class="submit-modal btn btn-primary" type="submit" id="add" value="Process" disabled>
                                    </div>
										
											
										
									</fieldset>
							
            </div>
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
  							<label class="control-label col-sm-2" for="user_name" >Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="useredit_name" >
  							</div>
                <label class="control-label col-sm-2" for="user_email" >Email:</label>
  							<div class="col-sm-10">
  							
                  <input type="text" class="form-control" id="useredit_email">
  							</div>
                <label class="control-label col-sm-2" for="supplier_name" >Password:</label>
  							<div class="col-sm-10">
  							
                <input type="text" class="form-control" id="useredit_pass">
  							</div>
                <label class="control-label col-sm-2" for="supplier_name" >Usertype:</label>
                <div class="col-sm-10">
  							
                <select name="edit_usertype" id="useredit_usertype">
                    <option value="admin">Admin</option>
                    <option value="oic">OIC</option>
                    <option value="accounting">Accounting</option>
                    <option value="cashier">Cashier</option>
                    <option value="customer">Customer</option>
                </select>
  							</div>
               
                                   
              </div>
            
  					</form>
  					<div class="deleteContent">
  						Are you Sure you want to Process this Package Order? <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
            <div class="errorContent">
  						There is a problem in adding user account. Please check the details correctly..
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
<script src="{{ asset('js/packageorderscript.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.js"></script>

<!-- /main -->
@endsection