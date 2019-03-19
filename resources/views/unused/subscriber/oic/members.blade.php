@extends('admin.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">


        <div class="span12">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-group"></i>
              <h3>Users</h3>
              <div style="float:right; padding-right:10px;"><a type="button" class="btn btn-primary btn-small" href="users">+ Add User</a></div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                   
                    <th> Full Name</th>
                    <th> User Type  </th>
                    <th> Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($dataUser as $User)
                  <tr class="item{{$User->id}}">
                    <td> <a href="users/{{$User->id}}" class="name">{{$User->name}}</a> </td>
                    <td>{{$User->usertype}}</td>
                    <td>{{$User->email}}</td> 
                    <td class="td-actions"><a href="javascript:;" class=" edit-modal btn btn-small btn-success" data-id="{{$User->id}}" data-name="{{$User->name}}"><i class="btn-icon-only icon-pencil"> </i></a><a href="javascript:;" class="delete-modal btn btn-danger btn-small" data-id="{{$User->id}}"><i class="btn-icon-only icon-remove"> </i></a></td>
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
<!-- /main -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/usersscript.js') }}"></script>
@endsection