@extends('customer.layouts.customer')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-sitemap"></i>
              <h3>Bookings</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="width:100px;">Date </th>
                    <th>Name</th>
                    <th style="width:100px;">Contact Number</th>
                    <th style="width:100px;">Origin</th>
                    <th style="width:100px;">Destination</th>
                   
                    <th>Weight</th>
                    <th>Date Pickup</th>
                    <th class="td-actions" style="width:100px;">Status</th>
                    <th class="td-actions" style="width:300px;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dataBooking as $Booking)
                  <tr class="item{{$Booking->id}}">
                    <td>{{$Booking->created_at}}</td>
                    <td><a href="/customer/bookings/{{$Booking->id}}" style="text-transform:capitalize;">{{$Booking->name}}</a></td>
                    <td>{{$Booking->contactnum}}</td>
                    <td>{{$Booking->origin}}</td>
                    <td>{{$Booking->destination}}</td>
                    
                    <td>{{$Booking->weight}} <em> Ton(s)</em></td>
                    <td>{{$Booking->dateofpickup}}</td>
                    <td class="status{{$Booking->id}}">
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
                    <td style="width:100px;" class="td-actions">
                        <a href="/customer/bookings/{{$Booking->id}}" class="btn btn-mini btn-success" data-id="{{$Booking->id}}" ><i class="icon-search"> </i> View</a>
                        <?php 
                            if($Booking->status == 0) {
                            ?>
                            <a href="javascript:;" class="delete-modal btn btn-mini btn-danger" data-id="{{$Booking->id}}" ><i class="icon-trash"> </i> Delete</a> 
                             <?php
                            }
                            ?>   
                    </td>
                    
                   </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>            

       

        </div>
        <!-- /span4 --> 
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
<script src="{{ asset('js/bookings.js') }}"></script>
<!-- /main -->
@endsection