@extends('assistant.layouts.assistant')
@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
      <div class="span12">
       
       <div class="widget widget-table action-table">
       <div class="widget-header"> <i class="icon-th-list"></i>
       <h3>Product List</h3>
           </div>
           <!-- /widget-header -->
           <div class="widget-content">
           <div class="input-append" style="padding:20px;">
           <form method="post" class="navbar-search pull-right" action="/cashier/product/search">
             <div class="input-append">
                                                 <input class="span2 m-wrap" id="appendedInputButton" type="search" name="q" class="form-control" placeholder="Search...">
                                                 <button class="btn" type="submit" style="margin-top:-10px;">Search</button>
                                               </div>
                               {{ csrf_field() }}
             </form>
           </div>
             <table class="table table-striped table-bordered">
               <thead>
                 <tr>
                   <th>  </th>
                   <th>Product Name</th>
                   <th>Price</th>
                   <th>Quantity</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                 @foreach($dataProduct as $Product)
                 <tr>
                 <td align="center" style="text-align:center"> <a href="#" class="avatar"><img src="{{ asset('productimg') }}/{{$Product->pic}}" width="100px"/> </a> </td>
                   <td> <a href="/product/{{$Product->id}}" class="name" target="_blank">{{$Product->product->product_name}}</a></td>
                   <td><em class="productprice">{{$Product->price}}</em>  </td>
                   <td><em class="productprice">{{$Product->quantity}}</em>  </td>
                   <td class="td-actions">

                     <a href="javascript:;" class="edit-modal btn btn-success btn-small" data-pic="{{$Product->pic}}" data-amount="{{$Product->price}}.00" data-quantity="{{$Product->quantity}}.00" data-name="{{$Product->product->product_name}}" data-id="{{$Product->id}}" ><i class="btn-icon-only icon-shopping-cart"> </i><span style="color:#fff;">Add to Purchase</span></a>
                   </td>
                   
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