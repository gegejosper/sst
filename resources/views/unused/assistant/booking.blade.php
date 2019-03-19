@extends('assistant.layouts.assistant')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <div class="span12">      		
      <div align="center" style="padding:20px 0px;"><img src="{{ asset('img/logohorizontal.png') }}" align="center"></div>
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Booking Details</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
                            <div class="row">
                            <div class="span11">
                            
                                <div class="widget">
                                    
                                    <div class="widget-content">
                                        
                                    @foreach($dataBooking as $Booking)
                                        <p class="lead">{{$Booking->origin}} to {{$Booking->destination}}</p>

                                     
                                            <table class="table">
                                            <tbody><tr>
                                                <th style="width:50%">Name:</th>
                                                <td style="text-transform:capitalize;">{{$Booking->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Contact Number </th>
                                                <td>{{$Booking->contactnum}}</td>
                                            </tr>
                                            <tr>
                                                <th>Origin</th>
                                                <td>{{$Booking->origin}}</td>
                                            </tr>
                                            <tr>
                                                <th>Destination</th>
                                                <td>{{$Booking->destination}}</td>
                                            </tr>
                                            <tr>
                                                <th>Weight</th>
                                                <td>{{$Booking->weight}} <em> Ton(s)</em></td>
                                            </tr>
                                            <tr>
                                                <th>Date of Pickup</th>
                                                <td>{{$Booking->dateofpickup}}</td>
                                            </tr>
                                            <?php if(!empty($Booking->transport->qouterate)){?>
                                            
                                            <tr>
                                                <th>Shipping Rate</th>
                                                <td>{{$Booking->transport->qouterate}}</td>
                                            </tr>
                                           <?php
                                           }?>
                                            
                                            <tr>
                                                <th>Status</th>
                                                <td>
                                                <?php 
                                                    if($Booking->status == 0) {
                                                        echo "Waiting for Approval";
                                                    }
                                                    elseif($Booking->status == 1) {
                                                        echo "Approved";
                                                    }
                                                    elseif($Booking->status == 2) {
                                                        echo "Disapproved";
                                                    }
                                                    else {
                                                        echo "Unidentified";
                                                    }
                                                ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Description</th>
                                                <td>{{$Booking->details}}</td>
                                            </tr>
                                            <tr>
                                            <td></td>
                                            <td class="td-actions text-right " style="text-align:right;">
                                                <div class="noprint">
                                                <a href="javascript:;" class="approve-modal btn btn-mini btn-info" data-id="{{$Booking->id}}" data-email="{{$Booking->email}}" ><i class="icon-check"> </i> Accept</a>
                                                <a href="javascript:;" class="disapprove-modal btn btn-mini btn-warning" data-id="{{$Booking->id}}" ><i class="icon-remove"> </i> Decline</a> 
                                                <a href="javascript:;" class="delete-modal btn btn-mini btn-danger" data-id="{{$Booking->id}}" ><i class="icon-trash"> </i> Delete</a> 
                                                <a class="btn btn-primary btn-mini hidden-print noprint" align="right" onclick="myFunction()"><i class="icon-print" aria-hidden="true"></i> Print</a>
                                                <script>
                                                function myFunction() {
                                                window.print();}
                                                </script>
                                                </div>
                                                
                                            </td>
                                            </tr>
                                            </tbody></table>
                                           
                                           
                                            
                                            @endforeach
                                            <p><strong>Recieved By:</strong>  ______________________________________</p>
                                            <p><strong>Date:</strong>  ______________________________________</p>
                                    </div> <!-- /widget-content -->
                                    
                                </div> <!-- /widget -->
                                
                            </div>
                            </div>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div>
      </div>
   
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>

<div id="approve" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Quotation Sent!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Request Approved and sent qoutation to the customer</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                <label class="control-label col-sm-2" for="description" >Description:</label>
  							<div class="col-sm-10">
                  <textarea name="editdescription" id="editdescription" cols="30" rows="10"></textarea>
  							</div>
                          </div>
            
  					</form>
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
  							<label class="control-label col-sm-2" for="qoutrate" >Qoutation Rate</label>
  							<div class="col-sm-12">
  								<input type="number" class="form-control" id="qoutrate" name="qoutrate">
  							</div>
                <label class="control-label col-sm-2" for="qoutdesc" >Additional Details:</label>
  							<div class="col-sm-12">
                  <textarea name="qoutdesc" id="qoutdesc" cols="30" rows="10"></textarea>
  							</div>
                
              </div>
            
  					</form>
  					<div class="deleteContent">
  						Are you Sure you want to delete <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
           
            <div class="disapproveContent">
  						Are you Sure you want to Disapprove this booking request <span class="dname"></span> ? <span
  							class="hidden disid"></span>
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
<script src="{{ asset('js/bookingsAssistant.js') }}"></script>
<!-- /main -->
@endsection