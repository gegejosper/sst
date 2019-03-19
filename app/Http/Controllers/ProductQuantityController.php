<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Productquantity;
use App\Brand;
use App\Category;
use App\Branch;
use App\Supplier;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class ProductQuantityController extends Controller
{
    //
    public function addProductQuantity(Request $request)
    {
        $rules = array(
                'prod_id' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $dataProduct = Product::all();
            $dataProductquantity = Productquantity::all();
            $dataBrand = Brand::all();
            $dataCategory = Category::all();
            $dataBranch = Branch::all();
            $dataSupplier = Supplier::all();

            $data = new Productquantity();
            $data->prod_id = $request->prod_id;
            $data->brand_id = $request->brand_id;
            $data->supplier_id = $request->supplier_id;
            $data->branch_id = $request->branch_id;
            $data->price = $request->price;
            $data->category_id = $request->category_id;
            $data->quantity = $request->quantity;
            $data->save();
            //return response()->json($data);
            //$successmessage = 'Product Successfully Added';
            //$request->session()->flash('success', $successmessage);
            //Session::flash('alert-info', 'info');
            //return redirect()->back()->with('message', 'IT WORKS!');
            return redirect()->back()->with('success','Product Quantity Added Successfully');

            //return view('admin.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        }
    }
    public function updateprice(Request $request)
    {
        $data = Productquantity::find($request->item_id);
        $data->price = $request->amount;
        $data->quantity = $request->quantity; 
        $data->save();
        return response()->json($data);
    }
    public function updateProductQuantity(Request $request)
    {
        $rules = array(
                'prod_id' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $dataProduct = Product::all();
            $dataProductquantity = Productquantity::all();
            $dataBrand = Brand::all();
            $dataCategory = Category::all();
            $dataBranch = Branch::all();
            $dataSupplier = Supplier::all();

            $data = Productquantity::find($request->id);
            $data->prod_id = $request->prod_id;
            $data->var_name = $request->varname;
            $data->description = $request->description;
            $data->brand_id = $request->brand_id;
            $data->supplier_id = $request->supplier_id;
            $data->branch_id = $request->branch_id;
            $data->price = $request->price;
            $data->saleprice = $request->saleprice;
            $data->priceoption = $request->priceoption;
            $data->category_id = $request->category_id;
            $data->quantity = $request->quantity;
            $data->lenght = $request->length;
            $data->width = $request->width;
            $data->height = $request->height;
            $data->weight = $request->weight;
            $data->unit = $request->unit;
            $image = $request->file('input_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/productimg');
            $image->move($destinationPath, $name);
            $data->pic =  $name;
            $data->save();
            return redirect()->back()->with('success','Product Quantity Updated Successfully');
        }
    }
    public function readProducQuantity(Request $req)
    {
        $dataProduct = Product::all();
        $dataProductquantity = Productquantity::all();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('admin.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }
    public function readProducQuantityAssistant(Request $req)
    {
        $dataProduct = Product::all();
        $dataProductquantity = Productquantity::all();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('assistant.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }
    public function editProductQuantity(Request $req)
    {
        $data = Productquantity::find($req->id);
        $data->product_name = $req->product_name; 
        $data->description = $req->description; 
        $data->save();

        return response()->json($data);
    }
    public function deleteProductQuantity(Request $req)
    {
        Productquantity::find($req->id)->delete();

        return response()->json();
    }
    public function viewerProduct(Request $req)
    {
        $dataProduct = Product::all();
        $dataProductquantity = Productquantity::all();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('home', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }
    public function viewProductDetails($productquantityid)
    {
        $dataProductquantity = Productquantity::where('id','=',$productquantityid)->get();
       //dd($dataProductquantity);
        return view('admin.productdetails', compact( 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }
    public function editProductDetails($productquantityid)
    {
        $dataProduct = Product::all();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        $dataProductquantity = Productquantity::where('id','=',$productquantityid)->get();
       //dd($dataProductquantity);
        return view('admin.productdetailsedit', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier','dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }
    
}
