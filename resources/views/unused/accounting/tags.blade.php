@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span4">
       
        <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Setting Shortcuts</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="shortcuts"> 
                <a href="/admin/categories" class="shortcut"><i class="shortcut-icon icon-sitemap"></i><span class="shortcut-label">Category</span> </a>
                <a href="/admin/tags" class="shortcut"><i class="shortcut-icon  icon-tags"></i> <span class="shortcut-label">Tags</span> </a>
                <a href="/admin/users" class="shortcut"><i class="shortcut-icon  icon-group"></i><span class="shortcut-label">Users</span> </a>
                <a href="/admin/suppliers" class="shortcut"><i class="shortcut-icon  icon-share"></i> <span class="shortcut-label">Suppliers</span> </a>
                <a href="/admin/brands" class="shortcut"><i class="shortcut-icon icon-briefcase"></i><span class="shortcut-label">Brand</span> </a>
                <a href="/admin/branchs" class="shortcut"><i class="shortcut-icon  icon-cogs"></i> <span class="shortcut-label">Branch</span> </a>
                </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div> 
        </div>

        <!-- /span4 -->
        <div class="span6">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-sitemap"></i>
              <h3>Tags</h3>
             
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Tag Names</th>
                    <th> Product Count </th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($dataTags as $tag)
                <tr>
                    <td> <a class="" href="/tags/{{$tag->slug}}">{{ $tag->name }}</a> </td>
                    <td class="td-actions">{{ $tag->count}}</td>
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