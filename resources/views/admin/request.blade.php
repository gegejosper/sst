@extends('admin.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
            
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Request Order</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Product </th>
                    <th> Name</th>
                    <th class="td-actions"> Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td align="center" style="text-align:center"> <a href="#" class="avatar"><img src="{{ asset('img/message_avatar1.png') }}"/><br /> Product Name</a> </td>
                    <td> <a class="name">John Smith</a> </td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                  <td align="center" style="text-align:center"> <a href="#" class="avatar"><img src="{{ asset('img/message_avatar1.png') }}"/><br /> Product Name</a> </td>
                    <td> <a class="name">John Smith</a> </td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                  <td align="center" style="text-align:center"> <a href="#" class="avatar"><img src="{{ asset('img/message_avatar1.png') }}"/><br /> Product Name</a> </td>
                    <td><a class="name">John Smith</a> </td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                  <td align="center" style="text-align:center"><a href="#" class="avatar"><img src="{{ asset('img/message_avatar1.png') }}"/><br /> Product Name</a> </td>
                    <td><a class="name">John Smith</a></td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                  <td align="center" style="text-align:center"> <a href="#" class="avatar"><img src="{{ asset('img/message_avatar1.png') }}"/><br /> Product Name</a></td>
                    <td> <a class="name">John Smith</a> </td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 

        </div>
        <!-- /span12 -->

       
      </div>
      <!-- /row --> 

    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
@endsection