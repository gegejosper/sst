<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Productquantity;
use App\Brand;
use App\Packagebranch;
use App\Skuproductvariantsoption;
use App\Package;
use App\Category;
use App\Branch;
use App\Branchuser;
use App\Supplier;
use App\User;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class BranchsController extends Controller
{
    //
    public function addBranch(Request $request)
    {
        $rules = array(
                'branch_name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new Branch();
            $data->branch_name = $request->branch_name;
            $data->save();

            return response()->json($data);
        }
    }

    public function addBranchUser(Request $request)
    {
            $data = new Branchuser();
            $data->branch_id = $request->branch_id;
            $data->userid = $request->userid;
            $data->save();

            return redirect()->back()->with('success', 'Login Credentials Incorrect!');
    }
    public function addBranchProduct($branchid, $productid)
    {
            // $data = new Productquantity();
            // $data->prod_id = $productid;
            // $data->branch_id = $branchid;
            // $data->quantity = 0;
            // $data->price = 0;
            // $data->save();
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
            return redirect()->back()->with('success', 'Product Successfully Added to the Branch!');
    }
    public function addBranchProductAcc($branchid, $productid)
    {
            $data = new Productquantity();
            $data->prod_id = $productid;
            $data->branch_id = $branchid;
            $data->quantity = 0;
            $data->price = 0;
            $data->save();
            return redirect()->back()->with('success', 'Product Successfully Added to the Branch!');
    }

    public function addBranchPackage($branchid, $packageid)
    {
            $data = new Packagebranch();
            $data->packageid = $packageid;
            $data->branchid = $branchid;
            $data->price = 0;
            $data->save();
            return redirect()->back()->with('success', 'Package Successfully Added to the Branch!');
    }
    public function addBranchPackageAcc($branchid, $packageid)
    {
            $data = new Packagebranch();
            $data->packageid = $packageid;
            $data->branchid = $branchid;
            $data->price = 0;
            $data->save();
            return redirect()->back()->with('success', 'Package Successfully Added to the Branch!');
    }

    public function readBranch(Request $req)
    {
        $data = Branch::with('cashier')->get();
        $dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('admin.branchs',compact('data','dataUser'));        
    }
    public function readBranchAcc(Request $req)
    {
        $data = Branch::with('cashier')->get();
        $dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('accounting.branchs',compact('data','dataUser'));        
    }
    public function viewBranch($id)
    {
        $dataBranch = Branch::where('id','=',$id)->get();
        $dataProduct = Product::all();
        $dataBranchProduct = Productquantity::where('branch_id','=',$id)->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataSupplier = Supplier::all();
        return view('admin.branch', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataBranchProduct'));
    }
    public function viewBranchAcc($id)
    {
        $dataBranch = Branch::where('id','=',$id)->get();
        $dataProduct = Product::all();
        $dataBranchProduct = Productquantity::where('branch_id','=',$id)->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataSupplier = Supplier::all();
        return view('accounting.branch', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataBranchProduct'));
    }

    public function viewBranchUser($id)
    {
        $data = User::where('usertype', '=','cashier')->get();
        $dataBranchUser = Branchuser::where('branch_id', '=',$id)->get();
        $dataBranch = Branch::where('id','=',$id)->get();
        $dataProduct = Product::all();
        $dataBranchProduct = Productquantity::where('branch_id','=',$id)->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        
        $dataSupplier = Supplier::all();
        return view('admin.branchuser', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataBranchProduct', 'data', 'dataBranchUser'));
    }
    public function viewBranchUserAcc($id)
    {
        $data = User::where('usertype', '=','cashier')->get();
        $dataBranchUser = Branchuser::where('branch_id', '=',$id)->get();
        $dataBranch = Branch::where('id','=',$id)->get();
        $dataProduct = Product::all();
        $dataBranchProduct = Productquantity::where('branch_id','=',$id)->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataSupplier = Supplier::all();
        return view('accounting.branchuser', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataBranchProduct', 'data', 'dataBranchUser'));
    }

    public function viewBranchStocks($id)
    {
        $data = User::where('usertype', '=','cashier')->get();
        $dataBranchUser = Branchuser::where('branch_id', '=',$id)->get();
        $dataBranch = Branch::where('id','=',$id)->get();
        $dataBranchId = $id;
        $dataProduct = Product::orderBy('product_name', 'asc')->get();
        $arrayProduct = array();
        foreach ($dataProduct as $Product) {
            $dataQuantity = Productquantity::where('branch_id','=',$id)
            ->where('prod_id', '=',$Product->id)
            ->get();
            if ($dataQuantity->count() == 0) {
                $arrayProduct[] = $Product;
            }
        }
        
        $dataBranchProduct = Productquantity::where('branch_id','=',$id)->with('product')->with('productvariants')->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataSupplier = Supplier::all();
        //dd($dataBranchProduct);
        return view('admin.branchstocks', compact('arrayProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataBranchProduct', 'data', 'dataBranchId'));
    }
    public function searchBranchStocks(Request $request)
    {
        $q = $request->input('q');
        $data = User::where('usertype', '=','cashier')->get();
        $dataBranchUser = Branchuser::where('branch_id', '=',$request->input('branchid'))->get();
        $dataBranch = Branch::where('id','=',$request->input('branchid'))->get();
        $dataBranchId = $request->input('branchid');
        $dataProduct = Product::orderBy('product_name', 'asc')->get();
        $arrayProduct = array();
        foreach ($dataProduct as $Product) {
            $dataQuantity = Productquantity::where('branch_id','=',$request->input('branchid'))
            ->where('prod_id', '=',$Product->id)
            ->get();
            if ($dataQuantity->count() == 0) {
                $arrayProduct[] = $Product;
            }
        }
        
        $dataBranchProduct = array();
        $dataProductsearch = Product::where('product_name', 'LIKE', '%' . $q . '%')->orderBy('product_name', 'asc')->get();
        foreach ($dataProductsearch as $ProductResult) {
            $dataBranchResult = Productquantity::where('branch_id','=',$request->input('branchid'))->where('prod_id','=',$ProductResult->id)->with('product')->with('productvariants')->get();
            $dataBranchProduct[] = $dataBranchResult;
        }

        
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataSupplier = Supplier::all();
        //dd($dataBranchProduct);
        return view('admin.branchstocksearch', compact('arrayProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataBranchProduct', 'data', 'dataBranchId'));
    }
    public function viewBranchStocksAcc($id)
    {
        $data = User::where('usertype', '=','cashier')->get();
        $dataBranchUser = Branchuser::where('branch_id', '=',$id)->get();
        $dataBranch = Branch::where('id','=',$id)->get();
        $dataBranchId = $id;
        $dataProduct = Product::all();
        $arrayProduct = array();
        foreach ($dataProduct as $Product) {
            $dataQuantity = Productquantity::where('branch_id','=',$id)
            ->where('prod_id', '=',$Product->id)
            ->get();
            if ($dataQuantity->count() == 0) {
                $arrayProduct[] = $Product;
            }
        }
        $dataBranchProduct = Productquantity::where('branch_id','=',$id)->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataSupplier = Supplier::all();
        return view('accounting.branchstocks', compact('arrayProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataBranchProduct', 'data', 'dataBranchId'));
    }

    public function viewBranchPackages($id)
    {
        $data = User::where('usertype', '=','cashier')->get();
        $dataBranchUser = Branchuser::where('branch_id', '=',$id)->get();
        $dataBranch = Branch::where('id','=',$id)->get();
        $dataBranchId = $id;
    //     $dataProduct = Product::whereHas( 'Quantity', function($sQuery){
    //         $sQuery->where('branchid', '=', 4);
    //  })->get();
        $dataPackage = Package::all();
        $arrayPackage = array();
        foreach ($dataPackage as $Package) {
            //echo $user->name;
            $dataPackagebranch = Packagebranch::where('branchid','=',$id)
            ->where('packageid', '=',$Package->id)
            ->get();
            if ($dataPackagebranch->count() == 0) {
                $arrayPackage[] = $Package;
            }
        }
        //dd($arrayProduct);
        //$dataProduct = Product::with('Productquantity')->where('branchid',$id)->get();
        $dataBranchPackage = Packagebranch::where('branchid','=',$id)->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataSupplier = Supplier::all();
        return view('admin.branchpackages', compact('arrayPackage','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataBranchPackage', 'data', 'dataBranchId'));
    }
    public function viewBranchPackagesAcc($id)
    {
        $data = User::where('usertype', '=','cashier')->get();
        $dataBranchUser = Branchuser::where('branch_id', '=',$id)->get();
        $dataBranch = Branch::where('id','=',$id)->get();
        $dataBranchId = $id;
        $dataPackage = Package::all();
        $arrayPackage = array();
        foreach ($dataPackage as $Package) {
            $dataPackagebranch = Packagebranch::where('branchid','=',$id)
            ->where('packageid', '=',$Package->id)
            ->get();
            if ($dataPackagebranch->count() == 0) {
                $arrayPackage[] = $Package;
            }
        }
        $dataBranchPackage = Packagebranch::where('branchid','=',$id)->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataSupplier = Supplier::all();
        return view('accounting.branchpackages', compact('arrayPackage','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataBranchPackage', 'data', 'dataBranchId'));
    }
    public function editBranch(Request $req)
    {
        $data = Branch::find($req->id);
        $data->branch_name = $req->branch_name; 
        $data->save();

        return response()->json($data);
    }
    public function deleteBranch(Request $req)
    {
        Branch::find($req->id)->delete();

        return response()->json();
    }
}
