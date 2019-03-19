@extends('admin.layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>List of Return Products
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content"> 
                    <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          <th>Date</th>
                          <th>Return Number</th>
                          <th>Branch </th>
                        
                    
                        </tr>
                      </thead>
                      <tbody>
                    
                        @foreach($returnDetails as $Return)
                    
                        <tr>
                          <td>{{$Return->created_at}}</td>
                          <td><a href="/admin/return/{{$Return->returnbatchnum}}">{{$Return->returnbatchnum}}</a></td>
                          <td><a href="/admin/branchs/{{$Return->branchid}}">{{$Return->branch['branch_name']}}</a></td>
                        
                          
                          </tr>
                        @endforeach
                    
                      </tbody>
                    </table>  
                    <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                        <script>
                        function myFunction() {
                        window.print();}
                        </script>
                </div>
         </div>
      </div>
</div>
@endsection