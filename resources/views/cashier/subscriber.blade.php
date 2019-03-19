@extends('cashier.layouts.cashier')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span3">
        <div class="widget widget-table action-table">
        
            <div class="widget-content" style="padding:20px;">
            <div class="box-body box-profile text-center">
              <div align="center"><img class="profile-user-img img-responsive img-circle " src="{{ asset('img/user.png') }}" alt="User profile picture" align="center"></div>
              
              @foreach($dataCustomer as $Customer)
              <h3 class="profile-username text-center">          
                {{$Customer->fname}}
              </h3>
              <ul class="list-group list-group-unbordered">
                  
                  <li class="list-group-item">
                    <b>Box ID : </b> {{$Customer->boxId}}
                  </li>
                  <li class="list-group-item">
                    <b>Address : </b> {{$Customer->address}}
                  </li>
                  <li class="list-group-item">
                    <b>Contact Number : </b> {{$Customer->contactnum}}
                  </li>
                  <li class="list-group-item">
                    <b>Email : </b>{{$Customer->email}}
                  </li>
                  <li class="list-group-item">
                    <b>Status : </b> 
                    <?php 
                     if($Customer->status == 0){
                      echo "Not Activated";
                     }
                     elseif($Customer->status == 1){
                      echo "Activated";
                     }
                     else {
                      echo "Unknown";
                     }
                    ?>
                  
                  </li>
                 
                </ul>
              @endforeach
            </div>
            
            
            </div>

           
            </div>
        </div>

        <!-- /span4 -->
        <!-- <div class="span8">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-sitemap"></i>
              <h3>Purchase History</h3>
            </div>
  
            <div class="widget-content">
              <table class="table table-striped table-bordered" id="table">
                <thead>
                  <tr>
                    <th> Name</th>
                    <th> Email</th>
                    <th style="width:200px !important; "> Password</th>
                    <th> Usertype</th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
              </tbody>
              </table>
            </div>
          </div>            
        </div> -->
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