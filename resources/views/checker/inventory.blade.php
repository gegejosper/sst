@extends('checker.layouts.checker')
@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <div class="span12">
       
       <div class="widget widget-table action-table">
       <div class="widget-header"> <i class="icon-th-list"></i>
       <h3>Product Inventory</h3>
           </div>
           <!-- /widget-header -->
           <div class="widget-content">
           <div class="input-append" style="padding:20px;">
           </div>
             <table class="table table-striped table-bordered">
               <thead>
                 <tr>
                  
                   <th>Product Name</th>
                   <th>Daily Sale Quantity</th>
                   <th>Remaining Quantity</th>
                   
                 </tr>
               </thead>
               <tbody>
                 @foreach($dataDailyquantitysale as $Product)
                 <tr>
                   <td> <a href="/checker/products/{{$Product->productid}}">{{$Product->product_name}}</a></td>
                   <td>{{$Product->salequantity}}</td>
                
                   <td><em class="">{{$Product->quantity}} </em>  </td>
                   </em>  </td>
                  </tr>
                 @endforeach
               <tr><td colspan="4">
               <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                    <script>
                    function myFunction() {
                    window.print();}
                    </script>
               </td></tr>
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
<!-- /main -->
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
  						<div class="form-group">
  							<div class="col-sm-3">
                  <img src="" alt="product image" id="productimg" width="100">
  								<input type="hidden" class="form-control" id="fid" disabled>
                  <input type="hidden" class="form-control" id="amount" disabled>
  							</div>
                <div class="col-sm-8">
                  <p><strong>Product Name: </strong><span id="productedit_name"></p>
                  <p ><strong>Branch Price: </strong></p>
              
  								<input type="number" class="form-control" id="productamount" name="productamount">
  						
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
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/itemscript.js') }}"></script>
@endsection