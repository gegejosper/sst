@extends('customer.layouts.customer')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span3">
        <div class="widget widget-table action-table">
        
            <div class="widget-content" style="padding:20px;">
            <div class="box-body box-profile text-center">
              <img class="profile-user-img img-responsive img-circle " src="{{ asset('img/user.png') }}" alt="User profile picture" align="center" width="">
              @foreach($dataUser as $User)
      
              <!-- <p class="text-muted text-center">Software Engineer</p> -->

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Name</b> <a class="pull-right"> {{$User->name}}</a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"> {{$User->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Password</b>  <span class="pull-right">****...  <a href="/customer/changepass/{{$User->id}}" class="pull-right"> Change</a></span>
                </li>
                <li class="list-group-item">
                  <b>Contact Number</b> <a class="pull-right"> {{$User->contactnum}}</a>
                </li>
                <li class="list-group-item">
                  <b>Company</b> <a class="pull-right">{{$User->company}}</a>
                </li>
              </ul>
              @endforeach
              <a href="/customer/profile/edit/{{$User->id}}" class="btn btn-mini btn-info"><i class="icon-pencil"> </i> Edit Profile</a>
            </div>
            
            
            </div>

           
            </div>
       
        <!-- /span4 -->
   
        <!-- /span4 --> 
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
                                    <option value="admin">Admin</option>
                                    <option value="cashier">Cashier</option>
                                    <option value="customer">Customer</option>
                                    </select>
  							</div>
               
                                   
              </div>
            
  					</form>
  					<div class="deleteContent">
  						Are you Sure you want to delete <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
            <div class="errorContent">
  						There is a problem in adding user account. Please check the details correctly..
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
<script src="{{ asset('js/usersscript.js') }}"></script>
<!-- /main -->
@endsection