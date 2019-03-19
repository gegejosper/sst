@extends('cashier.layouts.cashier')
@section('content')
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>View History
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content"> 
                <form action="/cashier/history/generate" method="post">
                                {{ csrf_field() }}   
                                <div class="box-body">
                                        <div class="form-group">
                                        <label for="">Date: </label>
                                            <input type="date" class="form-control" name="from" style="width:95%;" required/>
                                        </div>
                                        <div class="" style="padding:20px;">
                                    <button type="submit" class="pull-right btn btn-success">Generate Report <i class="fa fa-arrow-circle-right"></i></button>
                                </div>
                                </div>
                                
                              </form>  
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Purchase History: {{$fromdate}}
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">   
                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        <th>Date</th>
                                        <th>OR Number </th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $totalamount= 0;?>
                                        @foreach($reportPurchase as $Purchase)
                                        <?php $totalamount = $totalamount + $Purchase->amount; ?>
                                        <tr>
                                        <td align="center" style="text-align:center">{{$Purchase->date}}</td>
                                        <td><a href="/cashier/vieworder/{{$Purchase->orderNumber}}">{{$Purchase->ornumber}}</a></td>
                                        
                                        
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
                                        <td>
                                            <?php 
                                            if($Purchase->status == 0){
                                            ?>
                                                <a class="edit-modal btn btn-warning btn-small"  data-ordernumber="{{$Purchase->orderNumber}}" data-id="{{$Purchase->id}}" data-ornumber="{{$Purchase->ornumber}}">Cancel</a></td>
                                            <?php
                                            }
                                            ?>
                                        
                                        </tr>
                                        @endforeach
                                        
                                       
                                        <tr>
                                            <td colspan="6">
                                            <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                                            <script>
                                            function myFunction() {
                                            window.print();}
                                            </script>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </table>
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
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="id">Purchase ID:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="fid" disabled>
  							</div>
  						</div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="Order Number">Order Number:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="ordernumber" disabled>
  							</div>
  						</div>
                        <div class="form-group">
  							<label class="control-label col-sm-2" for="OR Number">OR Number:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="ornumber" disabled>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="Reason" >Reason:</label>
  							<div class="col-sm-10">
  							<textarea name="reason" id="reason" cols="30" rows="10"></textarea>
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
<script src="{{ asset('js/historyscript.js') }}"></script>
@endsection