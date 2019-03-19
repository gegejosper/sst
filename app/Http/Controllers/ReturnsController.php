<?php

namespace App\Http\Controllers;

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
use App\Returnsproduct;
use App\Customer;
use App\Returnsproductlist;
use App\Dealer;
use App\Reqorder;
use App\Reservation;
use App\Dealerspackageorder;
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
class ReturnsController extends Controller
{
    //
    public function returns(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataProduct = Productquantity::where('branch_id','=',$dataBranch->branch_id)->with('product')->take(10)->get();
        //dd($dataProduct);
       
        $dataReturn = DB::table('returnsproducts')
        ->join('productquantities', 'returnsproducts.item_id', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('branchid', '=', $dataBranch->branch_id)
        ->where('status', '=', 0)
        ->get();
        $returnDetails = DB::table('returnsproductlists')
        ->where('branchid', '=', $dataBranch->branch_id)
        ->groupBy('returnbatchnum')
        ->get();
        //dd($dataBranch);
        return view('cashier.return', compact('dataProduct', 'dataReturn','returnDetails'));
    }
    public function returnsproducts(Request $request)
    {
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $rules = array(
                'item_id' => 'required',
                'quantity' => 'required',
               
                
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            
            $data = new Returnsproduct();
            $data->item_id = $request->item_id;
            $data->rquantity = $request->quantity;
            $data->branchid = $dataBranch->branch_id;
            $data->status = 0;
            $data->save();
            return response()->json($data);
        }  
    }
    public function updateQuantity(Request $request)
    {
        $productReq = Returnsproduct::where('branchid','=', $request->branchid)->where('item_id','=', $request->id)->first();
        $data = Returnsproduct::find($productReq->id);
        $data->rquantity = $request->quantity;
        $data->save();
        //dd($productReq);
        return response()->json($data);
    }
    public function deleteproduct($itemid)
    {
        
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $productReq = Returnsproduct::where('branchid','=', $dataBranch->branch_id)->where('item_id','=', $itemid)->first();
        //dd($productReq);
        Returnsproduct::find($productReq->id)->delete();
        return redirect()->to('/cashier/return'); 
    }
    public function processReturn(Request $request)
    {

            if (Auth::check())
            {
                $userId = Auth::user()->id;
            }
            $dataBranch = Branchuser::where('userid', '=', $userId)->first();
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $returnbatchnum = '';
            for ($i = 0; $i < 10; $i++) {
                $returnbatchnum .= ucwords($characters[rand(0, $charactersLength - 1)]);
            }
            $updateCashierOrder = Returnsproduct::where('branchid', '=', $dataBranch->branch_id)
            ->get();

            foreach($updateCashierOrder as $Order){
                $dataOrder = new Returnsproductlist();
                $dataOrder->branchid = $dataBranch->branch_id;
                $dataOrder->item_id = $Order->item_id;
                $dataOrder->note = $request->returnnote;
                $dataOrder->returnbatchnum = $returnbatchnum;
                $dataOrder->rquantity = $Order->rquantity;
                $dataOrder->status = 0;
                $dataOrder->save();
                //dd($Order);
                $Productquantity = Productquantity::where('id', '=', $Order->item_id)
            ->first();
            //dd($updateCashierOrder);
                if($Productquantity->quantity >= $Order->rquantity ){
                    $productquantity = $Productquantity->quantity - $Order->rquantity;
            
                    $updateRecOrder = Productquantity::where('id', '=', $Productquantity->id)
                    ->update(['quantity' => $productquantity]);
                    
                    Returnsproduct::find($Order->id)->delete();
                }
                else {
                    echo "No More stocks to change";
                }       
            }
            return redirect()->to('/cashier/return/'.$returnbatchnum); 
            //return view('cashier.reciept', compact('data','dataReqorder','dataProduct', 'updateCashierOrder', 'request'));
   
    }
    public function returnnum($returnbatchnum){
        //$reportPurchase = Purchase::where('orderNumber', '=',$ordernumber )->first();
        $returnDetails = DB::table('returnsproductlists')
        ->join('productquantities', 'returnsproductlists.item_id', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('returnbatchnum', '=', $returnbatchnum)
        ->get();
        //return response()->json();
        return view('cashier.viewreturn',compact('returnDetails', 'returnbatchnum'));
    }
    public function returnslist(){
        //$reportPurchase = Purchase::where('orderNumber', '=',$ordernumber )->first();
        if (Auth::check())
            {
                $userId = Auth::user()->id;
            }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $returnDetails = DB::table('returnsproductlists')
        ->where('branchid', '=', $dataBranch->branch_id)
        ->groupBy('returnbatchnum')
        ->get();
        //return response()->json();
        return view('cashier.returnslist',compact('returnDetails'));
    }
}
