@extends('admin.layouts.admin')

@section('content')
    <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel tile">
                <div class="x_title">
                  <h2>Recent Transactions</h2>
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>OR Number</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($reportPurchase as $Purchase)   
                      <tr>
                      <td align="center" style="text-align:center">{{$Purchase->date}}</td>
                        <td><a href="/admin/vieworder/{{$Purchase->orderNumber}}">{{$Purchase->ornumber}}</a></td>
                  
                        <td>{{number_format($Purchase->amount,2)}}</em>  </td>
                            <td>
                              <?php 
                              if($Purchase->status == 0){
                              echo "Accepted";
                              }
                              elseif($Purchase->status == 1){
                              echo "Cancelled";
                              }
                              else {
                              echo "Unknown";
                              }
                              ?>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="4">No Data</td></tr>
                      @endforelse
                    </tbody>
                  </table>
                  <div style="float:right; padding-right:10px;"><a href="/admin/report" type="button" class="btn btn-info btn-xs" >+ View More</a></div>
                  <div class="clearfix"></div>
                </div>
               
                
              </div>
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Distribution History
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <table class="table table-striped table-bordered distribution">
                        <th>Distribution Number</th>
                        <th>Branch</th>
                        <th>Status</th>
                        <th>Date</th>
                    
                      @foreach($dataDistributionList as $Distribution)
                      <tr>
                        <td><a href="/admin/distribution/history/{{$Distribution->distributionnumber}}">{{$Distribution->distributionnumber}}</a></td>
                        <td><a href="/admin/branchs/{{$Distribution->branchid}}">{{$Distribution->branch->branch_name}}</a></td>
                        <td><?php
                          if ($Distribution->status == 1){
                            echo "<em>Delivery</em>";
                          }
                          elseif($Distribution->status == 2){
                            echo "<em>Received</em>";
                          }
                          else {
                            echo "<a href='/admin/distribution/$Distribution->distributionnumber'><em>Not Confirmed</em>";
                          }
                        ?></td>
                        <td>{{$Distribution->date}}</td>
                      </tr>
                      @endforeach 
                    </table>   
                </div>
              </div>
              
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Purchase Order History
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped table-bordered">
                        <th>Purchase Number</th>
                        <th>Status</th>
                        <th>Date</th>
                    
                      @foreach($dataPurchase as $puchase)
                      <tr>
                        <td><a href="/admin/purchase/history/{{$puchase->purchasenumber}}">{{$puchase->purchasenumber}}</a></td>
                        <td><?php
                          if ($puchase->status == 1){
                            echo "<em>Requesting</em>";
                          }
                          elseif($puchase->status == 2){
                            echo "<em>Received</em>";
                          }
                          else {
                            echo "<em>Waiting</em>";
                          }
                        ?></td>
                        <td>{{$puchase->date}}</td>
                      </tr>
                      @endforeach 
                    </table>   
                </div>                            
              </div>
              <div class="x_panel tile ">
                <div class="x_title">
                  <h2>Warehouse Stocks Summary</h2>
                  <div class="nav navbar-right panel_toolbox">
                      <a href="/admin/stocks" class="btn btn-info btn-xs" style="margin-top:10px;"> <i class="fa fa-plus"></i> View More</a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">
                   
                  <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                    
                      <th>Product Name</th>
                      <th>Warehouse Quantity</th>
                      <th>On Delivery</th>
                      <th>On Branch</th>
                      <th>Total Quantity</th>
                      <th class="td-actions"> Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dataProduct as $Product)
                    <tr class="item{{$Product->id}}">
                    
                      <td><a href="/admin/products/{{$Product->id}}">{{ ucwords($Product->product_name) }}</a></td>
                      <td>
                      <?php  $warehousequantity = 0; ?>
                      @forelse ($Product->productskus as $wquantity)
                      <?php 
                      $warehousequantity = $warehousequantity + $wquantity->warehousequantity;
                      
                      ?>
                      {{$wquantity->varoption->option_name}} ({{$wquantity->warehousequantity}}) <br>
                      @empty
                      <?php $warehousequantity = 0; 
                      echo $warehousequantity;
                      ?>
                      @endforelse
                      </td>
                      <!-- <td>{{$Product->warehousequantity}}</td> -->
                      <td>
                      <?php  $quantity = 0; ?>
                      @forelse ($Product->distributionrecord as $warehousequantity)
                      <?php 
                      if($warehousequantity->status == 0) {
                        $quantity = $quantity + $warehousequantity->quantity;
                      }
                      ?>
                      @empty
                      <?php $quantity = 0; ?>
                      @endforelse
                      <?php 
                      echo $quantity;
                      ?>
                      </td>
                      <td>
                      <?php  $Branchquantity = 0; ?>
                      @forelse ($Product->productquantities as $bquantity)
                      <?php 
                      $Branchquantity = $Branchquantity + $bquantity->quantity;
                      
                      ?>
                      <a href="/admin/branch/stocks/{{$bquantity->branch['id']}}">{{$bquantity->branch['branch_name']}} - {{$bquantity->variation['option_name']}} ({{$bquantity->quantity}}) </a> <br>
                      @empty
                      <?php $Branchquantity = 0; 
                      echo $Branchquantity;
                      ?>
                      @endforelse
                      </td>
                      <td><?php
                      echo  $wquantity->warehousequantity + $quantity + $Branchquantity;
                      ?></td>
                      <td style="width:100px;" class="td-actions"><a href="/admin/products/{{$Product->id}}" class="btn btn-mini btn-info"  ><i class="icon-search"> </i>View</a> </td>
                      
                    </tr>
                    @endforeach
                  </tbody>
                </table>   
              
                  </div>
                </div>
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