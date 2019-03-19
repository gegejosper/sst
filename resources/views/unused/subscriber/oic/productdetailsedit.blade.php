@extends('admin.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
            
            <div class="widget widget-table action-table">
                    <div class="widget-header"> <i class="icon-pencil"></i>
                    <h3>Edit Product</h3>
                    </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    <form enctype="multipart/form-data" action="{{ route('updateProductQuantity') }}" method="post">
                    @foreach($dataProductquantity as $ProductQuantity)
                        <div class="widget-content" style="padding:20px;">
                        {{ csrf_field() }}                                       
                        <input type="hidden" class="form-control"  name="id" value="{{$ProductQuantity->id}}">
                                <div class="span3">
                                    <div class="widget"> 
                                   
                                        <label for="Product Name">Product Image</label> 
                                        
                                        <input data-preview="#preview" name="input_img" type="file" id="imageInput" required>
                                                <img class="col-sm-6" id="preview"  src="" ></img>
                                        <div class="control-group">											
											<label class="control-label" for="varname">Product Variation Name</label>
											<div class="controls">
                                            <input type="text" class="form-control" placeholder="Variation Name"  name="varname" value="{{$ProductQuantity->var_name}}">
											</div> <!-- /controls -->				
										</div>
                                        <label for="Product Name">Product Name</label> 
                                        <select name="prod_id" id="prod_id">
                                        @foreach($dataProduct as $Product)
                                                <option value="{{$Product->id}}">{{$Product->product_name}}</option>
                                        @endforeach
                                        </select>
                                        <label for="Brand Name">Brand</label>
                                        <select name="brand_id" id="brand_id">
                                            @foreach($dataBrand as $Brand)
                                                <option value="{{$Brand->id}}">{{$Brand->brand_name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="control-group">											
											<label class="control-label" for="Regular Price">Regular Price</label>
											<div class="controls">
                                            <input type="text" class="form-control" placeholder="Regular Price"  name="price" value="{{$ProductQuantity->price}}">
											</div> <!-- /controls -->				
										</div>
                                        <div class="control-group">											
											<label class="control-label" for="password1">Sale Price</label>
											<div class="controls">
                                            <input type="text" class="form-control" placeholder="Sale Price"  name="saleprice" value="{{$ProductQuantity->saleprice}}">
											</div> <!-- /controls -->				
										</div> 
                                        <div class="control-group">											
											<label class="control-label">Price Option</label>
                                            <div class="controls">
                                            <label class="radio inline">
                                              <input type="radio" name="priceoption" value="regular"> Regular
                                            </label>
                                            
                                            <label class="radio inline">
                                              <input type="radio" name="priceoption" value="sale"> Sale
                                            </label><br>
                                           
                                        </div>
                                       
                                        <label for="Category">Category</label>
                                        <select name="category_id" id="category_id">
                                            @foreach($dataCategory as $Category)
                                                <option value="{{$Category->id}}">{{$Category->cat_name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="Quantity">Quantity</label>
                                        <input type="text" class="form-control" placeholder="Quantity" name="quantity" value="{{$ProductQuantity->quantity}}">    
                                        <label for="Brand Name">Unit</label>
                                        <select name="unit" id="unit">
                                                <option value="piece">piece</option>
                                                <option value="roll">roll</option>
                                                <option value="can">can</option>
                                                <option value="bottle">bottle</option>
                                                <option value="pack">pack</option>
                                                <option value="unit">unit</option>
                                                <option value="pad">pad</option>
                                                <option value="box">box</option>
                                                <option value="container">container</option>
                                                <option value="set">set</option>
                                                <option value="bundle">bundle</option>
                                                <option value="case">case </option>
                                                <option value="ream">ream</option>
                                                <option value="pair">pair</option>
                                        </select>
                                       
                                       
                                        <!-- /controls -->			
										</div> 
                                    </div> <!-- /widget -->   
                                </div>
                                <div class="span4">
                                    <div class="widget">   
                                    <label for="Supplier">Supplier</label>
                                        <select name="supplier_id" id="supplier_id">
                                            @foreach($dataSupplier as $Supplier)
                                                <option value="{{$Supplier->id}}">{{$Supplier->supplier_name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="Branch Name">Branch Availability</label> 
                                        <select name="branch_id" id="branch_id">
                                        @foreach($dataBranch as $Branch)
                                                <option value="{{$Branch->id}}">{{$Branch->branch_name}}</option>
                                        @endforeach
                                        </select>
                                        <fieldset>
                                        <legend>Optional</legend>
                                            <label for="Length">Length</label> 
                                            <input type="text" class="form-control" placeholder="Length"  name="length" value="{{$ProductQuantity->lenght}}">
                                            <label for="Width">Width</label> 
                                            <input type="text" class="form-control" placeholder="Width"  name="width" value="{{$ProductQuantity->width}}">
                                            <label for="Height">Height</label> 
                                            <input type="text" class="form-control" placeholder="Height"  name="height" value="{{$ProductQuantity->height}}">
                                            <label for="Weight">Weight</label> 
                                            <input type="text" class="form-control" placeholder="Weight"  name="weight" value="{{$ProductQuantity->weight}}">
                                        </fieldset>
                                    </div> <!-- /widget -->   
                                </div>
                                <div class="span4">
                                
                                    <div class="widget">  
                                    <div class="control-group">											
                                            <label class="control-label" for="Description">Description</label>
                                            <div class="controls">
                                            <textarea name="description" id="" cols="50" rows="20" placeholder="Description" style="width:90%;">{{$ProductQuantity->description}}</textarea>			
                                            </div>
                                        </div> 
                                    </div> <!-- /widget -->   
                                </div>
                                <div class="span12"><button class="btn btn-lg btn-primary " type="submit" id="add">Save</button></div>    
                                        
                        </div>
                        @endforeach
                    </form>
            </div>
        </div>

      </div>
   
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/productscript.js') }}"></script>
<!-- /main -->
@endsection