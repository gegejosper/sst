@extends('cashier.layouts.cashier')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">


        <div class="span6">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-group"></i>
              <h3>Subscribers (<a href="/cashier/subscribers/status/1">Activated</a>/<a href="/cashier/subscribers/status/0">Not Activated</a>)</h3>
              <form method="post" class="navbar-search pull-right" action="/cashier/subscriber/search">
              <div class="input-append">
                                                  <input class="span2 m-wrap" id="appendedInputButton" type="search" name="q" class="form-control" placeholder="Search...">
                                                  <button class="btn" type="submit" style="margin-top:-10px;">Search</button>
                                                </div>
                                {{ csrf_field() }}
              </form>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                   
                    <th>Full Name</th>
                    <th>Box ID</th>
                    <th>Status</th>
                    <th>Date of Activation</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($dataCustomer as $User)
                  <tr class="item{{$User->boxId}}">
                    <td> <a href="/cashier/subscribers/{{$User->boxId}}" class="name">{{$User->fname}} {{$User->lname}}</a> </td>
                    <td>{{$User->boxId}}</td> 
                    <td>
                    <?php 
                     if($User->status == 0){
                      echo "Not Activated";
                     }
                     elseif($User->status == 1){
                      echo "Activated";
                     }
                     else {
                      echo "Unknown";
                     }
                    ?>
                   </td> 
                   <td>{{$User->dateactivation}}</td>
                    <td class="" style="width:150px;"><a href="javascript:;" class="activate-modal btn btn-small btn-success" data-id="{{$User->id}}" data-name="{{$User->fname}} {{$User->lname}}"><i class="btn-icon-only icon-pencil"> </i> Activate</a><a href="/cashier/subscribers/{{$User->boxId}}" class="btn btn-info btn-small" data-id="{{$User->id}}"><i class="btn-icon-only icon-search"> </i> View</a></td>
                   </tr>
                @endforeach
                
                
                </tbody>
              </table>
            </div>
  

        </div>
        <!-- /span4 --> 
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
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="id">ID:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="fid" disabled>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="user_name" >Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="useredit_name" >
  							</div>
                <label class="control-label col-sm-2" for="user_email" >Email:</label>
  							<div class="col-sm-10">
  							
                  <input type="text" class="form-control" id="useredit_email">
  							</div>
                <label class="control-label col-sm-2" for="supplier_name" >Password:</label>
  							<div class="col-sm-10">
  							
                <input type="text" class="form-control" id="useredit_pass">
  							</div>
                <label class="control-label col-sm-2" for="supplier_name" >Usertype:</label>
                <div class="col-sm-10">
  							
                <select name="edit_usertype" id="useredit_usertype">
                                    <option value="customer">Customer</option>
                                    </select>
  							</div>
               
                                   
              </div>
            
  					</form>
  					<div class="activateContent">
  						Are you Sure you want to Activate this Account named <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
            <div class="successContent">
  						Account Successfully Activated
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
<!-- /main -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/activatescript.js') }}"></script>
@endsection