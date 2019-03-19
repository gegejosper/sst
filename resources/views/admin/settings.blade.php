@extends('admin.layouts.admin')

@section('content')
<div class="row">
        <div class="col-md-3 col-sm-3 col-xs-6">
            <div class="x_panel">
                  <div class="x_title">
                    <h2>Settings Shortcuts
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 
                              <a href="/admin/settings" class="btn btn-app">
                                <i class="fa fa-gear"></i> Settings
                              </a>
                              <a href="/admin/categories" class="btn btn-app">
                                <i class="fa fa-sitemap"></i> Categories
                              </a>
                              <a href="/admin/brands" class="btn btn-app">
                                <i class="fa fa-book"></i> Brands
                              </a>
                              <a href="/admin/users" class="btn btn-app"><i class="fa fa-group"></i> Users
                              </a>
                  </div>
            </div>
        </div>

        <!-- /span4 -->
        <div class="col-md-4 col-sm-4 col-xs-6">
            <div class="x_panel">
                  <div class="x_title">
                    <h2>Categories
                    </h2>
                    <div style="float:right; padding-right:10px;"><a type="button" class="btn btn-primary btn-small" href="categories">+ Add Category</a> <a type="button" class="btn btn-info btn-small" href="categories">+ View More</a></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th> Category Name</th>    
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
            </div> 
            <div class="x_panel">
                  <div class="x_title">
                    <h2>Branch
                    </h2>
                    <div style="float:right; padding-right:10px;"><a type="button" class="btn btn-primary btn-small" href="branchs">+ Add Branch</a> <a type="button" class="btn btn-info btn-small" href="branchs">+ View More</a></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th> Name</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($dataBranch as $details => $Branch)
                          <tr class="item{{$Branch->id}}">
                            <td> <a href="branchs/{{$Branch->id}}"class="name">{{$Branch->branch_name}}</a> </td>
                          </tr>
                          @empty
                          <tr><td><em>No Data</em></td></tr>
                          @endforelse
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>                    
        <div class="col-md-4 col-sm-4 col-xs-6">
            <!-- <div class="x_panel">
                      <div class="x_title">
                        <h2>Supplier
                        </h2>
                        <div style="float:right; padding-right:10px;"><a type="button" class="btn btn-primary btn-small" href="suppliers">+ Add Supplier</a> <a type="button" class="btn btn-info btn-small" href="suppliers">+ View More</a></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
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
                </div> -->
                <div class="x_panel">
                      <div class="x_title">
                        <h2>Brand
                        </h2>
                        <div style="float:right; padding-right:10px;"><a type="button" class="btn btn-primary btn-small" href="brands">+ Add Brand</a> <a type="button" class="btn btn-info btn-small" href="brands">+ View More</a></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
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