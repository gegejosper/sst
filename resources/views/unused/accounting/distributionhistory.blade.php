@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span4 noprint">

        <div class="widget noprint">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Distribution Record History</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="shortcuts"> 
                <table class="table table-striped table-bordered">
                      <th>Distribution Number</th>
                      <th>Branch</th>
                      <th>Status</th>
                      <th>Date</th>
                   
                    @foreach($dataDistributionList as $Distribution)
                    <tr>
                      <td><a href="/accounting/distribution/history/{{$Distribution->distributionnumber}}">{{$Distribution->distributionnumber}}</a></td>
                      <td><a href="/accounting/branchs/{{$Distribution->branchid}}">{{$Distribution->branch->branch_name}}</a></td>
                      <td><?php
                        if ($Distribution->status == 1){
                          echo "<em>Delivery</em>";
                        }
                        elseif($Distribution->status == 2){
                          echo "<em>Received</em>";
                        }
                        else {
                          echo "<em>Not Confirmed</em>";
                        }
                      ?></td>
                      <td>{{$Distribution->date}}</td>
                    </tr>
                    @endforeach 
                    </table>
                </div>
              <!-- /shortcuts --> 
             
            </div>
            
            <!-- /widget-content --> 
          </div> 
        </div>

        <!-- /span4 -->
        <div class="span8">
        <div class="widget widget-table action-table" >
            <div class="widget-header" style="padding-bottom:10px;"> <i class="icon-sitemap"></i>
              <h3>Distribution # <strong>{{$distributionnumber}}</strong></h3>   
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th>Recieve Quantity</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                        @foreach($dataDistributionrecord as $Record)
                            <tr>
                                <td>{{$Record->product->product_name}}</td>
                                <td>{{$Record->quantity}}</td>
                                <td>{{$Record->recievequantity}}</td>
                                <td style="width:100px;" class="td-actions">
                                <?php 
                                if($Record->status == 0)
                                {
                                ?><em>Delivery</em>
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
                        
                    </div>
                    <button style="margin:20px 0px; float: right;"class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                    <script>
                    function myFunction() {
                    window.print();}
                    </script>
            <!-- /widget-content --> 
          </div>            
        </div>
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
  								<input type="hidden" class="form-control" id="fid" disabled>
                                <input type="hidden" class="form-control" id="addrecievedate" name="addrecievedate" value="<?php echo date('m/d/Y'); ?>">
  						<div class="form-group">
                            <label class="control-label col-sm-2" for="recievequantity" >Recieve Quantity:</label>
  							<div class="col-sm-10">
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
    <div id="CartInfo" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
          <h4 class="modal-title" align="left"></h4>
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					
  				</div>
  				<div class="modal-body">
  					<p>Stock Successfully Updated!</p>
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
<script src="{{ asset('js/recieverequestscript.js') }}"></script>
<!-- /main -->
@endsection