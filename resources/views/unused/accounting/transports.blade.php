@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-sitemap"></i>
              <h3>Transports</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="width:100px;">Date </th>
                    
                    <th style="width:100px;">Name</th>
                    <th>Email</th>
                    <th style="width:100px;">Qoute Rate</th>
                    <th class="td-actions" style="width:100px;">Status</th>
                    <th class="td-actions" style="width:300px;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($dataTransport as $Transport)
                  <tr class="item{{$Transport->id}}">
                    <td>{{$Transport->created_at}}</td>
                    <td><a href="/admin/bookings/{{$Transport->bookingId}}" style="text-transform:capitalize;">{{$Transport->booking->name}}</a></td>
                    <td>{{$Transport->email}}</td>
                    <td>{{$Transport->qouterate}}</td>
                    <td class="status{{$Transport->id}}">
                    <?php 
                    if($Transport->status == 0) {
                        echo "Waiting for Approval";
                    }
                    elseif($Transport->status == 1) {
                        echo "Approved";
                    }
                    elseif($Transport->status == 2) {
                        echo "Disapproved";
                    }
                    elseif($Transport->status == 3) {
                      echo "Canceled";
                  }
                    else {
                        echo "Unidentified";
                    }
                    ?>
                    </td>
                    <td style="width:100px;" class="td-actions">
                        <a href="/admin/bookings/{{$Transport->bookingId}}" class="btn btn-mini btn-success" data-id="{{$Transport->bookingId}}" ><i class="icon-search"> </i> View</a>
                        <?php 
                        if($Transport->status == 1) {
                        ?>
                        <a href="javascript:;" class="cancel-modal btn btn-mini btn-warning" data-id="{{$Transport->id}}" ><i class="icon-remove"> </i> Cancel</a> 
                        <?php
                        }
                        else {
                        ?>
                        <a href="javascript:;" class="approve-modal btn btn-mini btn-info" data-id="{{$Transport->id}}" data-email="{{$Transport->email}}" ><i class="icon-check"> </i> Accept</a>
                        <a href="javascript:;" class="disapprove-modal btn btn-mini btn-warning" data-id="{{$Transport->id}}" ><i class="icon-remove"> </i> Decline</a> 
                        <a href="javascript:;" class="delete-modal btn btn-mini btn-danger" data-id="{{$Transport->id}}" ><i class="icon-trash"> </i> Delete</a> 
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
          <h5 class="modal-title">Success</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Transport Successfully Approved!</p>
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
                      <div class="form-approve">
  						Are you Sure you want to Approve this Transport <span class="dname"></span> ? <span
  							class="hidden"></span>
  					</div>
  					<div class="deleteContent">
  						Are you Sure you want to delete this Transport Record<span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
           
            <div class="disapproveContent">
  						Are you Sure you want to Disapprove this Transport Record <span class="dname"></span> ? <span
  							class="hidden disid"></span>
            </div>
            <div class="cancelContent">
  						Are you Sure you want to Cancel this Transport Record <span class="dname"></span> ? <span
  							class="hidden cancelid"></span>
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
<script src="{{ asset('js/transport.js') }}"></script>
<!-- /main -->
@endsection