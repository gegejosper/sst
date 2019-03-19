<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Productquantity;
use App\Package;
use App\Packagebranch;
use App\Packageorder;
use App\Dealerspackageorder;
use App\Dailyquantitysale;
use App\Packageitem;
use App\Customer;
use App\Dealer;
use App\Brand;
use App\Branchuser;
use App\Category;
use App\Branch;
use App\Boxid;
use App\Supplier;
use App\User;
use Validator;
use Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class PackageController extends Controller
{
    //
    public function readpackages(){
        $dataPackage = Package::all();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::with(['tagged','product'])->get();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('admin.packages', compact('dataPackage','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));

    }
    public function readpackagesAcc(){
        $dataPackage = Package::all();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::with(['tagged','product'])->get();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        return view('accounting.packages', compact('dataPackage','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));

    }
    public function showpackages($packageid){
        //$dataPackage = Packagebranch::where('branchid', '=', $dataBranch->branch_id)->with('package')->get();
        $dataPackage = Package::where('id','=',$packageid)->get();
        $dataProduct = Product::all();
        $dataPackageItem = Packageitem::where('packageid','=',$packageid)->get();
        return view('admin.package', compact('dataPackage','dataProduct', 'dataPackageItem', 'packageid'));
        
    }
    public function branchreadpackages(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
       
        $dataPackage = Packagebranch::where('branchid', '=', $dataBranch->branch_id)->where('status', '=', 1)->with('package')->get();
        //dd($dataPackage);
        $dataBrand = Brand::all();
        return view('cashier.packages', compact('dataPackage','dataBrand','dataBranch'));

    }
    public function branchshowpackages($packageid){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataPackage = Packagebranch::where('packageid', '=', $packageid)->where('branchid', '=', $dataBranch->branch_id)->with('package')->get();
        $dataProduct = Product::all();
        $dataPackageItem = Packageitem::where('packageid','=',$packageid)->get();
        
        $dataArrayPackageItem = array();
            foreach($dataPackageItem as $ProductDetail) {
                    $dataProductQuantity = Productquantity::where('branch_id','=', $dataBranch->branch_id)->where('prod_id','=',$ProductDetail->productid)->with('product')->with('packageitem')->get();
                array_push($dataArrayPackageItem,$dataProductQuantity);
            }
            
            //dd($dataArrayPackageItem);

        return view('cashier.package', compact('dataPackage','dataProduct', 'dataPackageItem', 'packageid', 'dataArrayPackageItem', 'dataPackage'));
        
    }
    public function showpackagesAcc($packageid){
        $dataPackage = Package::where('id','=',$packageid)->get();
        $dataProduct = Product::all();
        $dataPackageItem = Packageitem::where('packageid','=',$packageid)->get();
        return view('accounting.package', compact('dataPackage','dataProduct', 'dataPackageItem', 'packageid'));
        
    }
    public function addpackages(Request $request){

        $rules = array(
            'packagename' => 'required',
            'description' => 'required',
            'packageprice' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $dataPackage = Package::all();
            $dataBrand = Brand::all();
            $dataProductquantity = Productquantity::with(['tagged','product'])->get();
            //dd($dataProductquantity);
            $dataCategory = Category::all();
            $dataBranch = Branch::all();
            $dataSupplier = Supplier::all();
            $data = new Package();
            $data->packagename = $request->packagename;
            $data->description = $request->description;
            $data->packageprice = $request->packageprice;
            $data->save();
            
            //return view('admin.products', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity'));
            //return response()->json($data);
            return redirect()->back()->with('success','Package Successfully Created!');
        }
        
    }
    public function addpackageitem(Request $request){
            $data = new Packageitem();
            $data->productid = $request->productid;
            $data->packageid = $request->packageid;
            $data->quantity = $request->productquantity;
            $data->save();
            return redirect()->back()->with('success','Item Successfully Added!');

    }
    public function editpackages(Request $req){
        $data = Package::find($req->id);
        $data->packagename = $req->packagename; 
        $data->packageprice = $req->packageprice; 
        $data->description = $req->description; 
        $data->save();
        return response()->json($data);
    }
    public function editBranchpackages(Request $req){
        $data = Packagebranch::find($req->id);
        $data->price = $req->packageprice; 
        $data->dealersprice = $req->dealerpackageprice; 
        $data->save();
        return response()->json($data);
    }
    public function editAdminBranchpackages(Request $req){
        $data = Packagebranch::find($req->id);
        $data->price = $req->packageprice; 
        $data->dealersprice = $req->dealersprice; 
        $data->save();
        return response()->json($data);
    }
    public function deletepackages(){
        
    }
    public function packageorder($packageid){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataBranchID = $dataBranch->branch_id;
        
        $dataPackageItem = Packageitem::where('packageid','=',$packageid)->get();
        $dataPackage = Packagebranch::where('packageid', '=', $packageid)->where('branchid', '=', $dataBranch->branch_id)->with('package')->get();
        //dd($dataBranchID);
        return view('cashier.packageorder', compact('dataPackage', 'dataPackageItem','packageid', 'dataBranchID', 'userId'));
    }
    public function newdealerpackageorder($packageid){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataBranchID = $dataBranch->branch_id;
        
        $dataPackageItem = Packageitem::where('packageid','=',$packageid)->get();
        $dataPackage = Packagebranch::where('packageid', '=', $packageid)->where('branchid', '=', $dataBranch->branch_id)->with('package')->get();
        //dd($dataBranchID);
        return view('cashier.newdealerpackageorder', compact('dataPackage', 'dataPackageItem','packageid', 'dataBranchID'));
    }
    public function dealerpackageorder($packageid){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataBranchID = $dataBranch->branch_id;
        
        $dataPackageItem = Packageitem::where('packageid','=',$packageid)->get();
        $dataPackage = Packagebranch::where('packageid', '=', $packageid)->where('branchid', '=', $dataBranch->branch_id)->with('package')->get();
        //dd($dataBranchID);
        $dataDealer = Dealer::where('branchid', '=', $dataBranchID)->get();
        return view('cashier.dealerpackageorder', compact('dataPackage', 'dataPackageItem','packageid', 'dataBranchID', 'dataDealer'));
    }

    public function processpackageorder(Request $req){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataBranchID = $dataBranch->branch_id;
            $dataCustomer= new Customer();
            $dataCustomer->boxId = $req->boxid;
            $dataCustomer->fname = $req->fname;
            $dataCustomer->lname = $req->lname;
            $dataCustomer->address = $req->address;
            $dataCustomer->email = $req->email;
            $dataCustomer->contactnum = $req->contactnum;
            $dataCustomer->branchid = $req->dataBranchID;
            $dataCustomer->status = 0;
            $dataCustomer->save();
            $insertedId = $dataCustomer->id;

            $dataPackage = new Packageorder();
            $dataPackage->packageid = $req->packageid;
            $dataPackage->customerid = $insertedId;
            $dataPackage->boxid = $req->boxid;
            $dataPackage->branchid = $req->dataBranchID;
            $dataPackage->cashier_id = $req->userId;
            $dataPackage->packageprice = $req->packapagePrice;
            $dataPackage->status = 0;
            $dataPackage->ordernumber = $req->ordernumber;
            $dataPackage->orderstatus = 0;
            $dataPackage->ornumber = $req->ornumber;
            $dataPackage->save();

            $dataPackageItem = Packageitem::where('packageid','=',$req->packageid)->get();
            foreach($dataPackageItem as $PackageItem){
                $dataProductquantity = Productquantity::where('prod_id','=',$PackageItem->productid)
                                        ->where('branch_id','=',$req->dataBranchID)
                                        ->first();
                $productQuantity = $dataProductquantity->quantity - $PackageItem->quantity;
                
                $updateRecQuantity = Productquantity::where('prod_id','=',$PackageItem->productid)
                                    ->where('branch_id','=',$req->dataBranchID)
                                    ->update(['quantity' => $productQuantity]);

                $Dailyquantitysale = Dailyquantitysale::where('productid', '=', $dataProductquantity->id)
                ->where('branchid', '=', $dataBranch->branch_id)
                ->where('saledate', '=', date("m-d-Y"))
                ->first();
                $currentquantitysale = 0;
                if($Dailyquantitysale)  {
                    $currentquantitysale = $Dailyquantitysale->salequantity + $PackageItem->quantity;
                    $updateDailyquantitysale = Dailyquantitysale::where('id', '=', $Dailyquantitysale->id)
                    ->update(['salequantity' => $currentquantitysale]);
                }
                else {
                    $dataDailyquantitysale = new Dailyquantitysale();
                    $dataDailyquantitysale->branchid = $dataBranch->branch_id;
                    $dataDailyquantitysale->productid =  $dataProductquantity->id;
                    $dataDailyquantitysale->salequantity = $PackageItem->quantity;
                    $dataDailyquantitysale->saledate = date("m-d-Y");
                    $dataDailyquantitysale->save();
                }    
            }
        return response()->json($req);
    }

    public function processnewdealerpackageorder(Request $req){
       
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataBranchID = $dataBranch->branch_id;
        $dataDealer= new Dealer();
        $dataDealer->fname = $req->fname;
        $dataDealer->lname = $req->lname;
        $dataDealer->address = $req->address;
        $dataDealer->email = $req->email;
        $dataDealer->contactnum = $req->contactnum;
        $dataDealer->branchid = $req->dataBranchID;
        $dataDealer->status = 0;
        $dataDealer->save();
        $insertedId = $dataDealer->id;

        foreach ($req->boxid as $dataBoxIdnum) {

            $dataBoxid = new Boxid();
            $dataBoxid->branchid = $req->dataBranchID;
            $dataBoxid->dealerid = $insertedId;
            $dataBoxid->boxid = $dataBoxIdnum;
            $dataBoxid->status = 0;
            $dataBoxid->save();
    
            $dataPackage = new Dealerspackageorder();
            $dataPackage->packageid = $req->packageid;
            $dataPackage->dealerid = $insertedId;
            $dataPackage->boxid = $dataBoxIdnum;
            $dataPackage->branchid = $req->dataBranchID;
            $dataPackage->cashier_id = $userId;
            $dataPackage->packageprice = $req->packapagePrice;
            $dataPackage->ordernumber = $req->ordernumber;
            $dataPackage->ornumber = $req->ornumber;
            $dataPackage->status = 0;
            $dataPackage->orderstatus = 0;
            $dataPackage->save();
    
            $dataPackageItem = Packageitem::where('packageid','=',$req->packageid)->get();
            foreach($dataPackageItem as $PackageItem){
                $dataProductquantity = Productquantity::where('prod_id','=',$PackageItem->productid)
                                        ->where('branch_id','=',$req->dataBranchID)
                                        ->first();
                $productQuantity = $dataProductquantity->quantity - $PackageItem->quantity;
                
                $updateRecQuantity = Productquantity::where('prod_id','=',$PackageItem->productid)
                                    ->where('branch_id','=',$req->dataBranchID)
                                    ->update(['quantity' => $productQuantity]);
            
                $Dailyquantitysale = Dailyquantitysale::where('productid', '=', $dataProductquantity->id)
                ->where('branchid', '=', $dataBranch->branch_id)
                ->where('saledate', '=', date("m-d-Y"))
                ->first();
                $currentquantitysale = 0;
                if($Dailyquantitysale)  {
                    $currentquantitysale = $Dailyquantitysale->salequantity + $PackageItem->quantity;
                    $updateDailyquantitysale = Dailyquantitysale::where('id', '=', $Dailyquantitysale->id)
                    ->update(['salequantity' => $currentquantitysale]);
                }
                else {
                    $dataDailyquantitysale = new Dailyquantitysale();
                    $dataDailyquantitysale->branchid = $dataBranch->branch_id;
                    $dataDailyquantitysale->productid =  $dataProductquantity->id;
                    $dataDailyquantitysale->salequantity = $PackageItem->quantity;
                    $dataDailyquantitysale->saledate = date("m-d-Y");
                    $dataDailyquantitysale->save();
                }    
            }
        }
     $orderData = array("dealerid"=> $insertedId, "ordernumber"=> $req->ordernumber);
    //return redirect('/cashier/packagedealerprocesssuccess/' + $insertedId);   
    return response()->json($orderData);
}
public function processdealerpackageorder(Request $req){
    if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataBranchID = $dataBranch->branch_id;
    foreach ($req->boxid as $dataBoxIdnum) {

        $dataBoxid = new Boxid();
        $dataBoxid->branchid = $req->dataBranchID;
        $dataBoxid->dealerid = $req->dealerid;
        $dataBoxid->boxid = $dataBoxIdnum;
        $dataBoxid->status = 0;
        $dataBoxid->save();

        $dataPackage = new Dealerspackageorder();
        $dataPackage->packageid = $req->packageid;
        $dataPackage->dealerid = $req->dealerid;
        $dataPackage->boxid = $dataBoxIdnum;
        $dataPackage->branchid = $req->dataBranchID;
        $dataPackage->cashier_id = $userId;
        $dataPackage->packageprice = $req->packapagePrice;
        $dataPackage->ordernumber = $req->ordernumber;
        $dataPackage->ornumber = $req->ornumber;
        $dataPackage->status = 0;
        $dataPackage->orderstatus = 0;
        $dataPackage->save();

        $dataPackageItem = Packageitem::where('packageid','=',$req->packageid)->get();
        foreach($dataPackageItem as $PackageItem){
            $dataProductquantity = Productquantity::where('prod_id','=',$PackageItem->productid)
                                    ->where('branch_id','=',$req->dataBranchID)
                                    ->first();
            $productQuantity = $dataProductquantity->quantity - $PackageItem->quantity;
            
            $updateRecQuantity = Productquantity::where('prod_id','=',$PackageItem->productid)
            ->where('branch_id','=',$req->dataBranchID)
            ->update(['quantity' => $productQuantity]);
            $Dailyquantitysale = Dailyquantitysale::where('productid', '=', $dataProductquantity->id)
            ->where('branchid', '=', $dataBranch->branch_id)
            ->where('saledate', '=', date("m-d-Y"))
            ->first();
            $currentquantitysale = 0;
            if($Dailyquantitysale)  {
                $currentquantitysale = $Dailyquantitysale->salequantity + $PackageItem->quantity;
                $updateDailyquantitysale = Dailyquantitysale::where('id', '=', $Dailyquantitysale->id)
                ->update(['salequantity' => $currentquantitysale]);
            }
            else {
                $dataDailyquantitysale = new Dailyquantitysale();
                $dataDailyquantitysale->branchid = $dataBranch->branch_id;
                $dataDailyquantitysale->productid =  $dataProductquantity->id;
                $dataDailyquantitysale->salequantity = $PackageItem->quantity;
                $dataDailyquantitysale->saledate = date("m-d-Y");
                $dataDailyquantitysale->save();
            }    
        }
    }
 $orderData = array("dealerid"=> $req->dealerid, "ordernumber"=> $req->ordernumber);
//return redirect('/cashier/packagedealerprocesssuccess/' + $insertedId);   
return response()->json($orderData);
}

    public function packageprocesssuccess($boxid){
        $dataPackageOrder = Packageorder::where('boxid','=',$boxid)
                                        ->with('user')->first();
        $dataCustomer = Customer::where('boxId','=',$boxid)
                                        ->first(); 
        $lname = $dataCustomer->lname;
        $fname = $dataCustomer->fname;

        $dataPackage = Package::where('id','=',$dataPackageOrder->packageid)
                                ->first();  
        $packageName = $dataPackage->packagename;
        $price = $dataPackageOrder->packageprice;
        return view('cashier.packageprocesssuccess', compact('dataPackageOrder','fname','lname','packageName','price'));
    }
    public function packagenewdealerprocesssuccess($dealerid, $ordernumber){
        $dataPackageOrder = Dealerspackageorder::where('dealerid','=',$dealerid)
                                        ->where('ordernumber','=',$ordernumber)
                                        ->first();
        $dataDealer = Dealer::where('id','=',$dealerid)
                                        ->first(); 
        //dd($dataDealer);
        $name = $dataDealer->lname.", ".$dataDealer->fname;
        $dataPackage = Package::where('id','=',$dataPackageOrder->packageid)
                                ->first();  
        $packageName = $dataPackage->packagename;
        $price = $dataPackageOrder->packageprice;

        $dataPackagePrice = Dealerspackageorder::where('dealerid','=',$dealerid)
                                        ->where('ordernumber','=',$ordernumber)
                                        ->sum('packageprice');
        $dataPackageQuantity = Dealerspackageorder::where('dealerid','=',$dealerid)
                                        ->where('ordernumber','=',$ordernumber)
                                        ->count();
        return view('cashier.packagenewdealerprocesssuccess', compact('dataPackageOrder','name','packageName','price', 'dataPackagePrice', 'dataPackageQuantity'));
    }
    public function disablebranchpackage($branchpackageid){
        $updateBranchPackageStatus = Packagebranch::where('id','=',$branchpackageid)
                                ->update(['status' => 0]);
        return redirect()->back()->with('successUpdate','Package Successfully Updated!');

    }
    public function enablebranchpackage($branchpackageid){
        $updateBranchPackageStatus = Packagebranch::where('id','=',$branchpackageid)
                                ->update(['status' => 1]);
        return redirect()->back()->with('successUpdate','Package Successfully Updated!');

    }
}
