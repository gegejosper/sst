<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use App\Productvariant;
use App\Productquantity;
use App\Skuproductvariantsoption;
use App\Productvariantsoption;
use App\Brand;
use App\Category;
use App\Branch;
use App\Branchuser;
use App\Supplier;
use App\User;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function addProduct(Request $request)
    {
        
        $rules = array(
                'product_name' => 'required',
                'description' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $dataProduct = Product::all();
            $dataBrand = Brand::all();
            $dataProductquantity = Productquantity::with(['product'])->get();
            //dd($dataProductquantity);
            $dataCategory = Category::all();
            $dataBranch = Branch::all();
            $dataSupplier = Supplier::all();
            $data = new Product();
            $data->product_name = $request->product_name;
            $data->description = $request->description;
            $data->brand_id = $request->brand_id;
            $data->category_id = $request->category_id;
            $data->unit = $request->unit;
            $data->bulkquantity = $request->bulkquantity;
            $data->bulkunit = $request->bulkunit;
            // $data->warehousequantity = $request->warehousequantity;
            $data->save();
            
            return redirect('/admin/products/addvariation/'. $data->id);
            //return redirect()->back()->with('success','Product Successfully Added!');
        }
    }
    public function addProductVariation(Request $request)
    {
        
        $rules = array(
                'variationname' => 'required',
                'vartype' => 'required',
                'varprice' => 'required',
                'varstocks' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
           
            $data = new Productvariant();
            $data->var_name = $request->variationname;
            $data->prod_id = $request->productid;
            $data->save();
            $counttype = count($request->vartype);
           
            $var_id = $data->id;

            for ($i = 0; $i < $counttype; $i++) {
                $dataProductvar = new Productvariantsoption();
                $dataProductvar->var_id = $data->id;
                $dataProductvar->option_name = $request->vartype[$i];
                $dataProductvar->save();
                $opt_id = $dataProductvar->id;
                $dataSku = new Skuproductvariantsoption();
                $dataSku->var_id = $var_id;
                $dataSku->options_id = $opt_id;
                $dataSku->prod_id = $request->productid;
                $dataSku->varprice = $request->varprice[$i];
                $dataSku->warehousequantity = $request->varstocks[$i];
                $dataSku->save();
            }
            return redirect()->back()->with('success','Product Variation Successfully Added!');
        }
    }
    public function addAdditionalProductVariation(Request $request)
    {
        
        $rules = array(
                'vartype' => 'required',
                'varprice' => 'required',
                'varstocks' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $counttype = count($request->vartype);
            for ($i = 0; $i < $counttype; $i++) {
                $dataProductvar = new Productvariantsoption();
                $dataProductvar->var_id = $request->varid;
                $dataProductvar->option_name = $request->vartype[$i];
                $dataProductvar->save();
                $opt_id = $dataProductvar->id;
                $dataSku = new Skuproductvariantsoption();
                $dataSku->var_id = $request->varid;
                $dataSku->options_id = $opt_id;
                $dataSku->prod_id = $request->productid;
                $dataSku->varprice = $request->varprice[$i];
                $dataSku->warehousequantity = $request->varstocks[$i];
                $dataSku->save();
            }
            return redirect()->back()->with('success','Product Variation Successfully Added!');
        }
    }
    public function readProduct(Request $req)
    {
        $dataProduct = Product::with('productvariation.productvariations')->orderBy('product_name', 'asc')->paginate(25);
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::with(['product'])->get();
        //dd($dataProduct);
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('admin.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }
    public function readProductAcc(Request $req)
    {
        $dataProduct = Product::all();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::with(['product'])->get();
        //dd($dataProductquantity);
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('accounting.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }

    public function productSearch(Request $request){
        $q = $request->input('q');
        $dataProduct = Product::where('product_name', 'LIKE', '%' . $q . '%')->latest()->paginate(25);
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::with(['product'])->get();
        //dd($dataProductquantity);
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('admin.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
    }
    public function viewProduct($id)
    {
        $dataProduct = Product::where('id','=',$id)->with('category')->get();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::where('prod_id','=',$id)->with('branch')->get();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        $productArray=array();
         foreach($dataBranch as $branch){
            $dataProductquantity = Productquantity::where('prod_id','=',$id)
            ->where('branch_id','=',$branch->id)
            ->with('branch')->latest()->take(1)->get();
            if(count($dataProductquantity) <=0){
                $branchdata =array('branchid' => $branch->id, 'branchname' => $branch->branch_name, 'available' => 0, 'prodid' => $id);
                array_push($productArray,$branchdata);
            }
            // else {
            //     array_push($productArray,$dataProductquantity);
            // }
            
        }
        $dataProductVariant = Productvariant::where('prod_id','=', $id)->take(1)->latest()->get();
        $dataProductVariantOptions = Skuproductvariantsoption::where('prod_id','=', $id)->with(['varoption','variant'])->get();
        //dd ($dataProductVariantOptions);
        return view('admin.product', compact('productArray','dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity', 'dataProductVariant', 'dataProductVariantOptions'));
        //return view('admin.home')->withData($data);
        
    }
    public function addVariation($id)
    {
        $productid = $id;
        $dataProduct = Product::where('id','=',$id)->with('category')->get();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::where('prod_id','=',$id)->with('branch')->get();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $productArray=array();
         foreach($dataBranch as $branch){
            $dataProductquantity = Productquantity::where('prod_id','=',$id)
            ->where('branch_id','=',$branch->id)
            ->with('branch')->latest()->take(1)->get();
            if(count($dataProductquantity) <=0){
                $branchdata =array('branchid' => $branch->id, 'branchname' => $branch->branch_name, 'available' => 0, 'prodid' => $id);
                array_push($productArray,$branchdata);
            }
            // else {
            //     array_push($productArray,$dataProductquantity);
            // }
            
        }
        
        $dataSupplier = Supplier::all();
        $dataProductVariant = Productvariant::where('prod_id','=', $id)->take(1)->latest()->get();
        $dataProductVariantOptions = Skuproductvariantsoption::where('prod_id','=', $id)->with(['varoption','variant'])->get();
        //dd ($productArray);
        return view('admin.productvariation', compact('productid','productArray','dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity', 'dataProductVariant', 'dataProductVariantOptions'));
        
    }
    public function productBranchAdd($id)
    {
        $productid = $id;
        $dataProduct = Product::where('id','=',$id)->with('category')->get();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::where('prod_id','=',$id)->with('branch')->get();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();

        $productArray=array();
         foreach($dataBranch as $branch){
            $dataProductquantity = Productquantity::where('prod_id','=',$id)
            ->where('branch_id','=',$branch->id)
            ->with('branch')->latest()->take(1)->get();
            if(count($dataProductquantity) <=0){
                $branchdata =array('branch_id' => $branch->id, 'branchname' => $branch->branch_name, 'available' => 0, 'prodid' => $id);
                array_push($productArray,$branchdata);
            }   
        }
        $productArrayFound= array();
        
         foreach($dataBranch as $branch){
            $dataProductquantity = Productquantity::where('prod_id','=',$id)
            ->where('branch_id','=',$branch->id)
            ->with('branch', 'variation')->get();
            if(count($dataProductquantity) != 0){
                foreach($dataProductquantity as $variation){
                    array_push($productArrayFound,$variation);
                }    
            }   
        }
        //$finalarray = array_keys($productArrayFound);
        //$dataProductBranch = Product::where('id','=','productid')->with('productquantities.variation')->get();
        
        $dataSupplier = Supplier::all();
        //dd($productArrayFound);
        $dataProductVariant = Productvariant::where('prod_id','=', $id)->take(1)->latest()->get();
        $dataProductVariantOptions = Skuproductvariantsoption::where('prod_id','=', $id)->with(['varoption','variant'])->get();
        return view('admin.productavailability', compact('productid','productArrayFound','productArray','dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity', 'dataProductVariant', 'dataProductVariantOptions'));    
    }

    public function addBranchProduct($branchid, $productid)
    {
            
            $dataProductVariantOptions = Skuproductvariantsoption::with('varoption')->where('prod_id','=', $productid)->get();
            //dd($dataProductVariantOptions);
            foreach ($dataProductVariantOptions as $ProductVariantOptions){
                $data = new Productquantity();
                $data->prod_id = $productid;
                $data->branch_id = $branchid;
                $data->options_id = $ProductVariantOptions->options_id;
                $data->var_name = $ProductVariantOptions->varoption->option_name;
                $data->quantity = 0;
                $data->price = $ProductVariantOptions->varprice;
                $data->save();
            }
            return redirect('/admin/products/branchadd/'.$productid)->with('success', 'Product Successfully Added to the Branch!');
            //return redirect()->back()->with('success', 'Product Successfully Added to the Branch!');
    }

    public function viewBranchProduct($id)
    {
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataProduct = Product::where('id','=',$id)->with('category')->get();
        $dataProductquantity = Productquantity::where('prod_id','=',$id)->where('branch_id','=',$dataBranch->branch_id)->with(['product', 'variation'])->get();
        $dataProductVariant = Productvariant::where('prod_id','=', $id)->take(1)->latest()->get();
        $dataProductVariantOptions = Skuproductvariantsoption::where('prod_id','=', $id)->with(['varoption','variant'])->get();
        //$dataBranch = Branch::where('id', '=', $dataBranch->branch_id)->get();
        //dd($dataProductquantity);
       
        return view('cashier.product', compact('dataProduct','dataBranch','dataProductquantity', 'dataProductVariant', 'dataProductVariantOptions'));
        
    }
    public function productAdd()
    {
        $dataProduct = Product::latest()->get();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::with(['product'])->get();
        //dd($dataProductquantity);
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('admin.productadd', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
    }
    
    public function viewProductAcc($id)
    {
        $dataProduct = Product::where('id','=',$id)->with('category')->get();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::where('prod_id','=',$id)->with('branch')->get();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('accounting.product', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        
    }
    public function readProductAssistant(Request $req)
    {
        $dataProduct = Product::all();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::with(['tagged','product'])->get();
        //dd($dataProductquantity);
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('assistant.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }
    public function viewProductAssistant($id)
    {
        $dataProduct = Product::where('id','=',$id)->get();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::where('prod_id','=',$id)->get();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        //dd ($dataProductquantity);
        return view('assistant.product', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
        //return view('admin.home')->withData($data);
        
    }
    public function editProduct(Request $req)
    {
        $data = Product::find($req->id);
        $data->product_name = $req->product_name; 
        $data->description = $req->description; 
        $data->warehousequantity = $req->warehousequantity; 
        $data->save();

        return response()->json($data);
    }

    public function updateproductvariation(Request $req)
    {
        $data = Skuproductvariantsoption::find($req->id);
        $data->varprice = $req->varprice; 
        $data->warehousequantity = $req->varstocks; 
        $data->save();
        $dataOption = Productvariantsoption::find($req->optionid);
        $dataOption->option_name = $req->vartype; 
        $dataOption->save();
        return response()->json($data);
    }
    public function deleteProduct(Request $req)
    {
        Product::find($req->id)->delete();

        return response()->json();
    }
}
