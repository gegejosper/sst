<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Product;
use App\Productquantity;
use App\Brand;
use App\Category;
use App\Order;
use App\Distribution;
use App\Distributionrecord;
use App\Cashierorder;
use App\Branch;
use App\Branchuser;
use App\Packagebranch;
use App\Supplier;
use App\Purchase;
use App\User;
use App\Customer;
use App\Dealer;
use App\Cancelorder;
use App\Reqorder;
use App\Reservation;
use App\Dealerspackageorder;
use App\Dailyquantitysale;
use App\Packageorder;
use App\Purchaserecord;
use App\Transport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Session;
use Response;
Use DB;

class CheckerController extends Controller
{
    //

    public function dashboard()
    {
        $userId = Auth::user()->id;
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataProductquantity = Product::with('quantity')
        ->get();
        $data = Branch::with('cashier')->get();
        $dataDistributionList = Distribution::where('branchid','=',$dataBranch->branch_id)->latest()->with('branch')->take(25)->get();
        $dataDistributionrecord = Distributionrecord::where('branchid','=',$dataBranch->branch_id)->with('product')->get();
        $dataDistributionCount = Distribution::where('branchid','=',$dataBranch->branch_id)->where('status', '=', 1)->count();
        //dd($dataDistributionCount);
        return view('checker.receiving',compact('dataDistributionCount','data','dataDistributionrecord', 'dataDistributionList'));
      
    }

    public function deliveryRecieved($drnumber){
        Distribution::where('distributionnumber', '=', $drnumber)
        ->update(['status' => 2]);
        return redirect('checker/dashboard')->with('status', 'Delivery Successfully Updated!');
        //return response()->json();
    }
    public function receivingdetails($drnumber)
    {
        $userId = Auth::user()->id;
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataProductquantity = Product::with('quantity')
        ->get();
        $data = Branch::with('cashier')->get();
        $dataDistributionList = Distribution::where('branchid','=',$dataBranch->branch_id)->latest()->with('branch')->take(25)->get();
        $dataDistributionrecord = Distributionrecord::where('branchid','=',$dataBranch->branch_id)->where('distributionnumber','=',$drnumber)->with('product')->get();
        $dataDistributionCount = Distribution::where('branchid','=',$dataBranch->branch_id)->where('status', '=', 1)->count();
        return view('checker.receivingdetails',compact('dataDistributionCount','data','dataDistributionrecord', 'dataDistributionList','drnumber'));
      
    }
    public function receivingstocks(Request $request)
    {
        Distributionrecord::where('id', '=', $request->distributionrecordid)
            ->update(['status' => 2, 'recievequantity' => $request->recievequantity]);
        $dataDistribution = Distributionrecord::where('id', '=', $request->distributionrecordid)
                            ->first();
        
        $dataProduct = Productquantity::where('branch_id', '=', $dataDistribution->branchid)
            ->where('prod_id', '=', $dataDistribution->productid)
            ->first();
        $updateQuantity = $dataProduct->quantity + $request->recievequantity;
        $dataProductUpdate = Productquantity::where('id', '=', $dataProduct->id)
            ->update(['quantity' => $updateQuantity]);
            return response()->json();
    }
    public function account(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataUser = User::where('id','=', $userId)->take(1)->get();
        $dataDistributionCount = Distribution::where('branchid','=',$dataBranch->branch_id)->where('status', '=', 1)->count();
        //dd($dataCustomer);
        //return view('admin.user')->withData($data);
        return view('checker.account', compact('dataUser','dataDistributionCount'));
    }
    public function updatepass(Request $request){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataUser = User::where('id', '=', $userId)
            ->update(['password' => bcrypt($request['password'])]);
        return response()->json($dataUser);
    }
}
