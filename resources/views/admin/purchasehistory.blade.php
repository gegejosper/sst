@extends('admin.layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Purchase Record History
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <table class="table table-striped table-bordered">
                          <th>Purchase Number</th>
                          <th>Date</th>
                      
                        @foreach($dataPurchase as $puchase)
                        <tr>
                          <td><a href="/admin/purchase/history/{{$puchase->purchasenumber}}">{{$puchase->purchasenumber}}</a></td>
                          <td>{{$puchase->date}}</td>
                        </tr>
                        @endforeach 
                    </table>   
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Purchase Request # <strong>{{$purchasenumber}}</strong>
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>Product Name</th>
                                  <th>Product Variation</th>
                                  <th>Request Quantity</th>
                                  <th>Receive Quantity</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($dataPurchaseRecord as $Record)
                                    <tr>
                                        <td>{{ ucfirst($Record->product->product_name) }}</td>
                                        <td>{{$Record->skuoption->varoption->option_name}}</td>
                                        <td>{{$Record->quantity}}</td>
                                        <td>{{$Record->recievequantity}}</td>
                                        <td style="width:100px;" class="td-actions">
                                        <?php 
                                        if($Record->status == 1)
                                        {
                                        ?><a href="javascript:;" class="addquantity-modal btn btn-info btn-sm" data-id="{{$Record->id}}" data-skuid="{{$Record->skuid}}" data-productname="{{$Record->product->product_name}}" data-productoptionname="{{$Record->skuoption->varoption->option_name}}">
                                          <i class="icon-plus"> </i> Add Quantity
                                          </a> 
                                        <?php 
                                        }
                                        else {
                                        ?>
                                        <em>Recieved</em>
                                        <?php
                                        }
                                        
                                        ?>
                                        </td>
                                    </tr>
                                @endforeach 
                              </tbody>
                        </table> 
                        <button style="margin:20px 0px; float: right;"class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button> <a href="/admin/purchase/recieved/{{$purchasenumber}}" style="margin:20px 10px 20px 10px; float: right;"class="btn btn-success hidden-print noprint" align="right" >Recieved</a>
                        <script>
                        function myFunction() {
                        window.print();}
                        </script>   
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
</div><!--end row-->
 
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
  								<input type="hidden" class="form-control" id="fid">
                  <input type="hidden" class="form-control" id="skuid">
                  <input type="hidden" class="form-control" id="addrecievedate" name="addrecievedate" value="<?php echo date('m/d/Y'); ?>">
              <div class="row">
                <div class="text-right col-sm-4" for="Product Name" > <strong>Product:</strong></div>
                  <div class="col-sm-8">
                    <em class=""><strong><span class="productname"></span></strong></em>
                  </div> 
                </div>
                <div class="row" style="margin:10px;"><div class="text-right col-sm-4" for="Variation" ><strong>Variation:</strong> </div>
                  <div class="col-sm-8">
                    <em class="" ><strong><span class="variation"></span></strong></em>
                  </div>   
                </div>
              <div class="form-group">
                            <label class="control-label col-sm-4" for="recievequantity" >Recieve Quantity:</label>
  							<div class="col-sm-8">
  								<input type="number" class="form-control" id="recievequantity" name="recievequantity">
                            </div>
                        </div>
  					</form>
  					<div class="deleteContent">
  						Are you Sure you want to delete <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button"> </span>
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
   
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/recieverequestscript.js') }}"></script>
<!-- /main -->
@endsection