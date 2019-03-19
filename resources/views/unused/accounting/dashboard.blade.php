@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
    <!-- Recent Bookings -->
    <div class="row">
    <div class="span6">
            
            
            
    <!-- Recent Transactions -->
      <div class="row">
        <div class="span6">
            
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Recent Transactions</h3>
              <div style="float:right; padding-right:10px;"><a href="/accounting/report" type="button" class="btn btn-info btn-small" >+ View More</a></div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
               <thead>
                 <tr>
                   <th>Date</th>
                   <th>Order Number</th>
                  
                   <th>Total Amount</th>
                 </tr>
               </thead>
               <tbody>
            
                 @forelse($reportPurchase as $Purchase)
               
                 <tr>
                 <td align="center" style="text-align:center">{{$Purchase->date}}</td>
                   <td>{{$Purchase->orderNumber}}</a></td>
            
                   <td>{{number_format($Purchase->amount,2)}}</em>  </td>
                  </tr>
                  @empty
                  <tr><td colspan="4">No Data</td></tr>
                 @endforelse
                 
                
               </tbody>
             </table>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 

        </div>
        <!-- /span4 -->
        <!-- /span4 --> 
        <div class="span6">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th"></i>
              <h3>Out of Stocks</h3>
              <div style="float:right; padding-right:10px;"></div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>  </th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($dataProduct as $Product)
                  <tr>
                  <td align="center" style="text-align:center"> <a href="#" class="avatar"><img src="{{ asset('productimg') }}/{{$Product->pic}}" width="100px"/> </a> </td>
                    <td> <a class="name">{{$Product->product_name}}</a></td>
                    <td><em class="productprice">{{$Product->	warehousequantity}}</em>  </td>
                 
                   </tr>
                   @empty
                   <tr><td colspan='4'><em>No Data</em></td></tr>
                  @endforelse
                  
                 
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
        </div> 
  

        </div>
        <!-- /span6 --> 
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
            <form class="form-approve" role="form">
                      {{ csrf_field() }}
  						<div class="form-group" style="display:none;">
  							<label class="control-label col-sm-2" for="id">ID:</label>
  							<div class="col-sm-12">
  								<input type="text" class="form-control" id="fid" disabled>
                  <input type="text" class="form-control" id="bookingemail" disabled>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="qoutrate" >Quantity</label>
  							<div class="col-sm-12">
  								<input type="number" class="form-control" id="qoutrate" name="qoutrate">
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
<script src="{{ asset('js/bookings.js') }}"></script>
<!-- /main -->
@endsection