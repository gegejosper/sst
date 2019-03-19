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
              
              @foreach($dataCustomer as $User)
              <h3 class="profile-username text-center">          
                {{$User->fname}}  {{$User->lname}}
              </h3>
              <ul class="list-group list-group-unbordered">
                  @foreach($dataCustomer as $Customer)
                  <li class="list-group-item">
                    <b>Contact Number</b> <a class="pull-right">{{$Customer->contactnum}}</a>
                  </li>
                
                  <li class="list-group-item">
                    <b>Address</b> <a class="pull-right">{{$Customer->address}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="pull-right">{{$User->email}}</a>
                  </li>
                  @endforeach
                </ul>
              @endforeach
            </div>
            
            
            </div>

           
            </div>
        </div>

        <!-- /span4 -->
        <div class="span8">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-sitemap"></i>
              <h3>Box ID Dealer Record</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered" id="table">
                <thead>
                  <tr>
                    <th>BoxID</th>
                    <th>Status</th>
                    <th>Date of Activation</th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
            
                @foreach($dataDealerRecord as $Record)
                  <tr>
                    <td>{{$Record->boxid}}</td>
                    <td>
                    <?php
                    if($Record->status == 0){

                      echo "Not Activated";
                    }
                    elseif($Record->status == 1){
                      echo "Activated";
                     }
                     else {
                      echo "Unknown";
                     }
                    ?>
                    </td>
                    <td>{{$Record->dateactivation}}</td>
                    <td class="" style="width:150px;"><a href="javascript:;" class="activate-modal btn btn-small btn-success" data-id="{{$Record->id}}" data-name="{{$Record->boxid}}"><i class="btn-icon-only icon-pencil"> </i> Activate</a></td>
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
  					<div class="activateContent">
  						Are you Sure you want to Activate this Box ID: <span class="dname"></span> ? <span
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
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/activatescriptdealers.js') }}"></script>
<!-- /main -->
@endsection