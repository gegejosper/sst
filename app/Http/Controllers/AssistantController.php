<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Productquantity;
use App\Brand;
use App\Category;
use App\Order;
use App\Cashierorder;
use App\Branch;
use App\Supplier;
use App\Purchase;
use App\User;
use App\Reqorder;
use App\Reservation;
use App\Purchaserecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Session;
use Response;
Use DB;

class AssistantController extends Controller
{
    public function index(){
        
        $dataProduct = Productquantity::take(20)->get();
        //dd($dataProduct);
        $dataReqorder = DB::table('cashierorders')
        ->join('productquantities', 'cashierorders.item_id', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('status', '=', 0)
        ->get();
        return view('assistant.dashboard', compact('dataProduct', 'dataReqorder'));
    }
    public function items(){
        
        $dataProduct = Productquantity::take(20)->get();
        //dd($dataProduct);
        $dataReqorder = DB::table('cashierorders')
        ->join('productquantities', 'cashierorders.item_id', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('status', '=', 0)
        ->get();
        return view('assistant.items', compact('dataProduct', 'dataReqorder'));
    }
    public function orders(){
       
        $dataReservation = Reservation::where('reservestatus', '=', 0)
        ->with('customer')->get();
        //dd($dataReservation);
        return view('assistant.orders', compact('dataReservation'));
    }

    public function addProducts(Request $request)
    {
        $rules = array(
                'item_id' => 'required',
                'quantity' => 'required',
                'amount' => 'required'
                
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            
            $data = new Cashierorder();
            $data->item_id = $request->item_id;
            $data->rquantity = $request->quantity;
            $totalamount = $request->quantity * $request->amount;
            $data->ramount = $totalamount;
            $data->cashier_id = Auth::user()->id;
            $data->status = 0;
            $data->save();
            return response()->json($data);
        }
    }
    public function viewOrders($requestId){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branch::where('cashier_id', '=', $userId)->first();
        $dataReqorder = DB::table('reqorders')
        ->join('productquantities', 'reqorders.item_id', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('req_id', '=', $requestId)
        ->where('status', '=', 0)
        ->get();

        //$dataReqorder = Reqorder::where('req_id', '=', $requestId)->with('product')->get();
        return view('assistant.vieworder',compact('dataReqorder', 'dataBranch'));
    }
    public function processOrder(Request $request)
    {

        if($request->amount > $request->money){
            Session::flash('message', "Your money is not enough");
            return Redirect::back();
            //return Redirect::back()->withErrors('money', 'Your money is not enoug');
        }
        else {
            if (Auth::check())
            {
                $userId = Auth::user()->id;
            }
            $dataBranch = Branch::where('cashier_id', '=', $userId)->first();
            $dataProduct = Productquantity::take(20)->get();
            //dd($dataProduct);
            $dataReqorder = DB::table('cashierorders')
            ->join('productquantities', 'cashierorders.item_id', '=', 'productquantities.id')
            ->join('products', 'productquantities.prod_id', '=', 'products.id')
            ->where('cashier_id', '=', $userId)
            ->where('status', '=', 0)
            ->get();
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $orderNumber = '';
            for ($i = 0; $i < 10; $i++) {
                $orderNumber .= ucwords($characters[rand(0, $charactersLength - 1)]);
            }

            $id = Auth::user()->id;
            $data = new Purchase();
            $data->amount = $request->amounttopay;
            $data->amountpaid = $request->money;
            $change = $request->money - $request->amounttopay;
            $data->change = $change;
            $data->cashier_id = $id;
            $data->orderNumber = $orderNumber;
            $data->date = date('Y-m-d');
            $data->save();

            $updateCashierOrder = Cashierorder::where('cashier_id', '=', $id)
            ->get();

            foreach($updateCashierOrder as $Order){
                $dataOrder = new Order();
                $dataOrder->cashier_id = $id;
                $dataOrder->orderId =  $orderNumber;
                $dataOrder->itemId = $Order->item_id;
                $dataOrder->ramount = $Order->ramount;
                $dataOrder->rquantity = $Order->rquantity;
                $dataOrder->save();
                //dd($Order);
                $Productquantity = Productquantity::where('id', '=', $Order->item_id)
            ->first();
                if($Productquantity->quantity >= $Order->rquantity ){
                    $productquantity = $Productquantity->quantity - $Order->rquantity;
            
                    $updateRecOrder = Productquantity::where('id', '=', $Productquantity->id)
                    ->update(['quantity' => $productquantity]);
                    
                    Cashierorder::find($Order->id)->delete();
                }
                else {
                    echo "Quantity sold is Lesser than your Quantity on Stock";
                }       
            }
            return view('assistant.reciept', compact('data','dataReqorder','dataProduct', 'updateCashierOrder', 'request'));
        }
   
    }
    public function updateQuantity(Request $request)
    {
        $productReq = Cashierorder::where('item_id','=', $request->id)->first();
        $data = Cashierorder::find($productReq->id);
        $data->rquantity = $request->quantity;
        $totalamount = $request->quantity * $request->amount;
        $data->ramount = $totalamount;
        $data->save();
        //dd($productReq);
        return response()->json($data);
    }
    public function orderupdatequantity(Request $request)
    {
        $rules = array(
            'item_id' => 'required',
            'quantity' => 'required',
            'amount' => 'required'
            
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            
            $data = new Cashierorder();
            $data->item_id = $request->item_id;
            $data->rquantity = $request->quantity;
            $totalamount = $request->quantity * $request->amount;
            $data->ramount = $totalamount;
            $data->cashier_id = Auth::user()->id;;
            $data->status = 0;
            $data->save();

            $updateReservation = Reservation::where('requestId', '=', $request->reqid)
            ->update(['reservestatus' => 1]);
            $dataReqorder = Reqorder::where('req_id', '=', $request->reqid)
            ->where('item_id', '=', $request->item_id)
            ->update(['status' => 1]);
            
            //dd([$dataReqorder, $updateReservation]);
            return response()->json($data);
        }
    }
    public function deleteOrder($itemid, $requestId)
    {
       
        $productReq = Cashierorder::where('item_id','=', $itemid)->first();
        //dd($productReq);
        Cashierorder::find($productReq->id)->delete();
        return redirect()->to('/assistant/dashboard'); 
    }
    public function deleteproduct($itemid)
    {
        $userId = Auth::user()->id;
        $productReq = Cashierorder::where('cashier_id','=', $userId)->where('item_id','=', $itemid)->first();
        //dd($productReq);
        Cashierorder::find($productReq->id)->delete();
        return redirect()->to('/assistant/dashboard'); 
    }
    public function productSearch(Request $request){
            $q = $request->input('q');
            $userId = Auth::user()->id;
            $dataBranch = Branch::where('cashier_id', '=', $userId)->first();
           
                //dd($branchId = $dataBranch->id);
          
            $dataProductquantity = Product::where('product_name', 'LIKE', '%' . $q . '%')
            ->with(['quantity' => function($query){
                $userId = Auth::user()->id;
                $dataBranch = Branch::where('cashier_id', '=', $userId)->first();
                $query->where('branch_id', '=', $dataBranch->id); 
            
            }])
            ->get();

            $data = Branch::with('cashier')->get();
            $dataUser = User::where('usertype', '=', 'cashier')->get();
            return view('assistant.productsearch',compact('data','dataUser','dataProductquantity'));
    }
    public function report()
    {
        $userId = Auth::user()->id;
        $reportPurchase = Purchase::where('cashier_id','=', $userId)->get();
        //dd($reportPurchase);
        $TotalSales = Purchase::where('cashier_id', '=', $userId)->sum('amount');
        $DailySales = Purchase::where('cashier_id', '=', $userId)
        ->where('date', '=', date('Y-m-d'))
        ->sum('amount');
        return view('assistant.report',compact('reportPurchase', 'TotalSales', 'DailySales'));
    }
    public function reportrange(Request $request){
        $userId = Auth::user()->id;
        $reportPurchase = Purchase::where('cashier_id','=', $userId)
        ->where('date', '>=', $request->from)
        ->where('date', '<=', $request->to)
        ->get();
        $TotalSales = Purchase::where('cashier_id', '=', $userId)->sum('amount');
        $DailySales = Purchase::where('cashier_id', '=', $userId)
        ->where('date', '=', date('Y-m-d'))
        ->sum('amount');
        return view('assistant.report',compact('reportPurchase', 'TotalSales', 'DailySales'));
    }
    public function declineOrder($itemid, $requestId)
    {
        $shoppingId = session()->get('shoppingId');
        //$productReq = Reqorder::where('req_id','=', $requestId)->where('item_id','=', $itemid)->first();
        //dd($productReq);
        $dataReqorder = Reqorder::where('req_id', '=', $requestId)
            ->where('item_id', '=', $itemid)
            ->update(['status' => 2]);
        //Reqorder::find($productReq->id)->delete();
        return redirect()->to('/assistant/orders/'.$requestId); 
    }
    public function declineReservation($requestId)
    {
        $shoppingId = session()->get('shoppingId');

        $updateReservation = Reservation::where('requestId', '=', $requestId)
        ->update(['reservestatus' => 2]);
        $dataReqorder = Reqorder::where('req_id', '=', $requestId)
            ->update(['status' => 2]);

        return redirect()->to('/assistant/orders'); 
    }
}
