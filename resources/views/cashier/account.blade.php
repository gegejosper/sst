@extends('cashier.layouts.cashier')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span4">
        <div class="widget widget-table action-table">
        
            <div class="widget-content" style="padding:20px;">
            <div class="box-body box-profile text-center">
              <div align="center"><img class="profile-user-img img-responsive img-circle " src="{{ asset('img/user.png') }}" alt="User profile picture" align="center"></div>
              
              @foreach($dataUser as $User)
              <h3 class="profile-username text-center">          
                {{$User->name}}
              </h3>
              <ul class="list-group list-group-unbordered">
                  

                  <li class="list-group-item">
                    <b>Email : </b>{{$User->email}}
                  </li>
                  <li class="list-group-item">
                    <b>Usertype : </b>{{$User->usertype}}
                  </li>
                  <li class="list-group-item" style="word-wrap: break-word;">
                    <b>Password : </b>{{$User->password}}
                  </li> 
                  <li class="list-group-item">
                  <a href="javascript:;" class="updatepass btn btn-small btn-success" data-id="{{$User->id}}"><i class="btn-icon-only icon-pencil"> </i>Update Password</a>
                  </li> 
                </ul>
              @endforeach
            </div>
            </div>
            </div>
        </div>

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
                            <label class="control-label col-sm-2" for="supplier_name" >Password:</label>
  							<div class="col-sm-10">
                                <input type="password" class="form-control" id="useredit_pass">
  							</div>          
                    </div>
  					</form>
                      <div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button" class='glyphicon'> Update Quantity</span>
  						</button>
  						
  					</div>

  			</div>
		  </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
    </div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/accountscript.js') }}"></script>
<!-- /main -->
@endsection