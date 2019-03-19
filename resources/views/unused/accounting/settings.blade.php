@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span4">
        <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Important Shortcuts</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="shortcuts"> 
                    <a href="/admin/categories" class="shortcut"><i class="shortcut-icon icon-sitemap"></i><span class="shortcut-label">Category</span> </a>
                    <a href="/admin/users" class="shortcut"><i class="shortcut-icon  icon-group"></i><span class="shortcut-label">Users</span> </a>
                    <a href="/admin/suppliers" class="shortcut"><i class="shortcut-icon  icon-share"></i> <span class="shortcut-label">Suppliers</span> </a>
                    <a href="/admin/brands" class="shortcut"><i class="shortcut-icon icon-briefcase"></i><span class="shortcut-label">Brand</span> </a>
                    <a href="/admin/branchs" class="shortcut"><i class="shortcut-icon  icon-cogs"></i> <span class="shortcut-label">Branch</span> </a>
                </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div> 
          <!-- <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-group"></i>
              <h3>Users</h3>
              <div style="float:right; padding-right:10px;"><a type="button" class="btn btn-primary btn-small" href="users">+ Add User</a> <a type="button" class="btn btn-info btn-small" href="users">+ View More</a></div>
            </div>
          
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                   
                    <th> Full Name</th>
                    <th> User Type  </th>
                    <th> Email</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($dataUser as $User)
                  <tr class="item{{$User->id}}">
                    <td> <a class="name">{{$User->name}}</a> </td>
                    <td>{{$User->usertype}}</td>
                    <td>{{$User->email}}</td> 
                   </tr>
                @endforeach
                
                
                </tbody>
              </table>
            </div>
          </div>             -->

       

        </div>

        <!-- /span4 -->
        <div class="span4">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-sitemap"></i>
              <h3>Categories</h3>
              <div style="float:right; padding-right:10px;"><a type="button" class="btn btn-primary btn-small" href="categories">+ Add Category</a> <a type="button" class="btn btn-info btn-small" href="categories">+ View More</a></div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Name</th>
                  
                  </tr>
                </thead>

                
                <tbody>

                @foreach($dataCategory as $Category)
                  <tr class="item{{$Category->id}}">
                    <td> <a class="name">{{$Category->cat_name}}</a> </td>
                     
                   </tr>
                   @endforeach
                  
                
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>            
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-briefcase"></i>
              <h3>Branch</h3>
              <div style="float:right; padding-right:10px;"><a type="button" class="btn btn-primary btn-small" href="branchs">+ Add Branch</a> <a type="button" class="btn btn-info btn-small" href="branchs">+ View More</a></div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Name</th>
                    <th> Cashier </th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($dataBranch as $details => $Branch)
                    <tr class="item{{$Branch->id}}">
                      <td> <a class="name">{{$Branch->branch_name}}</a> </td>
                      <td> <a class="name">{{$Branch->cashier->name}}</a> </td>
                    </tr>
                    @empty
                    <tr><td><em>No Data</em></td></tr>
                    @endforelse
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
    
         

        </div> 
       

        </div>
        <!-- /span4 --> 
        <div class="span4">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-share"></i>
              <h3>Supplier</h3>
              <div style="float:right; padding-right:10px;"><a type="button" class="btn btn-primary btn-small" href="suppliers">+ Add Supplier</a> <a type="button" class="btn btn-info btn-small" href="suppliers">+ View More</a></div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Name</th>
                    <th> Address </th>
                  </tr>
                </thead>
                <tbody>
                @foreach($dataSupplier as $Supplier)
                  <tr class="item{{$Supplier->id}}">
                    <td> <a class="name">{{$Supplier->supplier_name}}</a> </td>
                    <td> <a class="name">{{$Supplier->supplier_address}}</a> </td>
                     
                   </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
    
         

        </div> 
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-briefcase"></i>
              <h3>Brand</h3>
              <div style="float:right; padding-right:10px;"><a type="button" class="btn btn-primary btn-small" href="brands">+ Add Brand</a> <a type="button" class="btn btn-info btn-small" href="brands">+ View More</a></div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Name</th>
                   
                  </tr>
                </thead>
                <tbody>
                @foreach($dataBrand as $Brand)
                  <tr class="item{{$Brand->id}}">
                    <td> <a class="name">{{$Brand->brand_name}}</a> </td>  
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
<!-- /main -->
@endsection