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
            @foreach($dataUser as $User)
                <div class="form-group" style="text-align:center;">
                    @if (session('success'))
                    <div class="alert alert-info">
                        {{ session('success') }}
                    </div>
			        @endif
                    <?php if(!empty($User->profilepic)){
                        $pic = "profileimage/$User->profilepic";
                    }
                    else {
                        $pic = "img/user.png";
                    }
                    ?>
                        <img class="profile-user-img img-responsive img-circle " src="{{ asset($pic) }}" alt="User profile picture" align="center" width="200">
                    <form enctype="multipart/form-data" method="post" action="/customer/updatepic">
                        {{ csrf_field() }}                          
                        <label for="imageInput">Profile Picture</label>
                        <input name="userid" type="hidden" id="userid" value="{{$User->id}}"> 
                        <input data-preview="#preview" name="input_img" type="file" id="imageInput" required> <button type="submit" class="btn btn-mini btn-info" align="center" style="text-align:center; display:inline;"><i class="icon-save"> </i> Update Profile Picture</button>
               
                    </form>
                   
                </div>
              <!-- <p class="text-muted text-center">Software Engineer</p> -->
                    @if (session('profile'))
                    <div class="alert alert-info">
                        {{ session('profile') }}
                    </div>
			        @endif
              <form action="{{ route('editProfileproc') }}" method="post">	
              {{ csrf_field() }}     
              <input name="userid" type="hidden" id="userid" value="{{$User->id}}">
                <div class="field">
					<label for="name">Name</label>
					<input type="text" id="name" name="name"  placeholder="Full Name" class="login username-field" value="{{$User->name}}" required/>
                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                   @endif
                </div> <!-- /field -->
                <div class="field">
					<label for="companyname">Company Name</label>
					<input type="text" id="companyname" name="companyname"  placeholder="Company Name" class="login username-field " value="{{$User->company}}"required/>
                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companyname') }}</strong>
                                    </span>
                   @endif
                </div> <!-- /field -->
                <div class="field">
					<label for="contactnum">Contact Number</label>
					<input type="text" id="contactnum" name="contactnum"  placeholder="Contact Number" class="login username-field" value="{{$User->contactnum}}"required/>
                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contactnum') }}</strong>
                                    </span>
                   @endif
                </div> <!-- /field -->
              
              @endforeach
              <button type="submit" class="btn btn-mini btn-info" align="center" style="text-align:center;"><i class="icon-save"> </i> Save Profile</button>
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