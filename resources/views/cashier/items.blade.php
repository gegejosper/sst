@extends('cashier.layouts.cashier')
@section('content')
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Product List
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">  
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
                        
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($dataProduct as $Product)
                      <tr>
                      
                        <td> <a href="/cashier/products/{{$Product->prod_id}}">{{$Product->product->product_name}}</a></td>
                        <td><em class="productprice">{{$Product->price}}</em>  </td>
                        <td><em class="productprice">{{$Product->quantity}}</em>  </td>
                        </em>  </td>
                        <td class="td-actions" style="width:100px">
                        <a href="/cashier/products/{{$Product->prod_id}}" class="btn btn-success btn-small" > <i class="btn-icon-only icon-search"> </i>View</a>
                          <!-- <a href="javascript:;" class="editPrice btn btn-success btn-small" data-pic="{{$Product->product->pic}}" data-amount="{{$Product->price}}.00" data-quantity="{{$Product->quantity}}.00" data-name="{{$Product->product->product_name}}" data-id="{{$Product->id}}" ><i class="btn-icon-only icon-shopping-cart"> </i><span style="color:#fff;">Update Price</span></a> -->
                        </td>
                        
                        </tr>
                      @endforeach
                      
                      
                    
                    </tbody>
                  </table> 
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
</div><!--end row-->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/itemscript.js') }}"></script>
@endsection