@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
                  <div class="x_title">
                    <h2>Settings for Branch  
                        @foreach($dataBranch as $Branch)
                          {{$Branch->branch_name}}
                        @endforeach
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @foreach($dataBranch as $Branch)
                      <a href="/admin/branch/stocks/{{$Branch->id}}" class="btn btn-app" >
                        <i class="fa fa-database"></i><span class="shortcut-label">Stocks</span> 
                      </a>
                      <a href="/admin/branch/users/{{$Branch->id}}" class="btn btn-app">
                        <i class="fa fa-group"></i><span class="shortcut-label">Users</span> 
                      </a>
                      <a href="/admin/report/branch/{{$Branch->id}}" class="btn btn-app">
                          <i class="fa fa-bar-chart"></i> <span class="shortcut-label">Report</span> 
                      </a>
                    @endforeach
                  </div>
            </div>
        </div>            
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/productscript.js') }}"></script>
<!-- /main -->
@endsection