@extends('checker.layouts.checker')

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Distribution Record History
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content"> 
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-striped table-bordered">
                      <th>Distribution Number</th>
                      <th>Status</th>
                      <th>Date</th>
                   
                    @foreach($dataDistributionList as $Distribution)
                    <tr>
                      <td><a href="/checker/receiving/{{$Distribution->distributionnumber}}">{{$Distribution->distributionnumber}}</a></td>
                      <td><?php
                        if ($Distribution->status == 1){
                          echo "<em>To Recieved</em>";
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