@extends('customer.layouts.customer')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span4">
        <div class="widget widget-table action-table">
        
            <div class="widget-content" style="padding:20px;">
            <div class="box-body box-profile text-center">
               
                @if (session('successpass'))
                    <div class="alert alert-info">
                        {{ session('successpass') }}
                    </div>
                @endif
                @if (session('passwordnotmatch'))
                    <div class="alert alert-warning">
                        <strong> {{ session('passwordnotmatch') }}</strong>
                    </div>
			    @endif
              @foreach($dataUser as $User)
              <!-- <p class="text-muted text-center">Software Engineer</p> -->
              <form action="{{ route('changepassproc') }}" method="post">	
              <input name="userid" type="hidden" id="userid" value="{{$User->id}}"> 
              {{ csrf_field() }}   
                
                <div class="field">
                    <label for="name">New Password</label>
					<input type="password" id="newpassword" name="newpassword"  placeholder="New Password" class="login username-field" required/>
                  
                </div> <!-- /field -->
                <div class="field">
                <label for="name">Confirm Password</label>
					<input type="password" id="confirmpassword" name="confirmpassword"  placeholder="Confirm Password" class="login username-field" required/>
                    
                </div> <!-- /field -->
              
              @endforeach
              <button type="submit" class="btn btn-mini btn-info" align="center" style="text-align:center;"><i class="icon-save"> </i> Change Pass</button>
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
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/usersscript.js') }}"></script>
<!-- /main -->
@endsection