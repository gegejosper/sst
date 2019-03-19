<?php

namespace App\Http\Controllers;

use App\Reqorder;
use Illuminate\Http\Request;
use App\Product;
use App\Productquantity;
use App\Brand;
use App\Category;
use App\Branch;
use App\Supplier;
use App\User;
use App\Reservation;
use App\Tagging_tag;
use Validator;
use Response;
Use DB;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function addProducts(Request $request)
    {
        if (session()->has('shoppingId')) {
            //return('session '. session()->get('shoppingId'));
        }
        else {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                $randomString .= ucwords($characters[rand(0, $charactersLength - 1)]);
            }
            session()->put('shoppingId', $randomString);
            //return('session '. session()->get('shoppingId'));
        }
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
            
            $data = new Reqorder();
            $data->item_id = $request->item_id;
            $data->rquantity = $request->quantity;
            $totalamount = $request->quantity * $request->amount;
            $data->ramount = $totalamount;
            $data->req_id = session()->get('shoppingId');
            $data->status = 0;
            $data->save();
            return response()->json($data);
        }

        
    }
    public function viewProduct($id)
    {
        //dd($id);
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        else {
            $userId = 'none';
        }
        $dataProduct = Product::where('id','=',$id)->get();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::where('id','=',$id)->get();
        //dd($dataProductquantity);
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        $dataTags = Tagging_tag::all();

        return view('product', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity','dataTags','userId'));
        //return view('admin.home')->withData($data);
        
    }
    public function viewCart()
    {
        //dd($id);
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        else {
            $userId = 'none';
        }
        $dataProduct = Product::all();
        $dataBrand = Brand::all();
        $dataProductquantity = Productquantity::all();
        //dd($dataProductquantity);
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();
        $dataTags = Tagging_tag::all();
        //session()->get('shoppingId')
        $shoppingId = session()->get('shoppingId');
       
        $dataReqorder = DB::table('reqorders')
        ->join('productquantities', 'reqorders.item_id', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('req_id', '=', $shoppingId)
        ->where('status', '=', 0)
        ->get();
        //dd($dataReqorder);
        return view('cart', compact('dataBrand','dataCategory','dataBranch','dataSupplier', 'dataReqorder','dataTags','dataProductquantity','dataProduct','userId'));
        //return view('admin.home')->withData($data);
        
    }
    public function updateQuantity(Request $request)
    {
        $productReq = Reqorder::where('req_id','=', $request->reqid)->where('item_id','=', $request->id)->first();
        $data = Reqorder::find($productReq->id);
        $data->rquantity = $request->quantity;
        $totalamount = $request->quantity * $request->amount;
        $data->ramount = $totalamount;
        $data->save();
        //dd($productReq);
        return response()->json($data);
    }

    public function reserveOrder(Request $request)
    {
        //echo "dsadas";
        if (Auth::check())
        {
            $id = Auth::user()->id;
            $data = new Reservation();
            $data->requestId = $request->reqId;
            $data->userId = $id;
            $data->message = $request->reqdetails;
            $data->reservestatus = 0;
            // $data->branchId = $request->branch;
            //$data->branchId = 4;
            $data->save();

            $updateRecOrder = Reqorder::where('req_id', '=', $request->reqId)
            ->update(['status' => 0]);

            return redirect('/customer/orders');
        }
        else {
            return redirect('/userregister');
        }

       
        // return response()->json($data);
        
        // $productReq = Reqorder::where('req_id','=', $request->reqid)->where('item_id','=', $request->id)->first();
        // $data = Reqorder::find($productReq->id);
        // $data->rquantity = $request->quantity;
        // $totalamount = $request->quantity * $request->amount;
        // $data->ramount = $totalamount;
        // $data->save();
        // //dd($productReq);
        // return response()->json($data);
    }
    public function deleteproduct($itemid)
    {
        $shoppingId = session()->get('shoppingId');
        $productReq = Reqorder::where('req_id','=', $shoppingId)->where('item_id','=', $itemid)->first();
        //dd($productReq);
        Reqorder::find($productReq->id)->delete();
        return redirect()->to('/cart'); 
    }
    public function deleteOrder($requestId)
    {
        if (Auth::check())
        {
            Reservation::where('requestId','=', $requestId)->delete();
            Reqorder::where('req_id','=', $requestId)->delete();
            return redirect()->to('/customer/orders'); 
        }
        // $shoppingId = session()->get('shoppingId');
        // $productReq = Reqorder::where('req_id','=', $requestId)->where('item_id','=', $itemid)->first();
        // //dd($productReq);
        // Reqorder::find($productReq->id)->delete();
        // return redirect()->to('/customer/orders'); 
    }
}
