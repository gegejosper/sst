<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Productquantity;
use App\Skuproductvariantsoption;
use App\Brand;
use App\Category;
use App\Branch;
use App\Supplier;
use App\Purchase;
use App\Purchaserecord;
use App\Purchaserequest;
use App\User;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class PurchaseController extends Controller
{
    //
    public function addPurchase(Request $request)
    {
        $rules = array(
                'branch_name' => 'required',
                'cashier' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new Branch();
            $data->branch_name = $request->branch_name;
            $data->cashier_id = $request->cashier;
            $data->save();

            return response()->json($data);
        }
    }
    public function addQuantity(Request $request)
    {
       
            $data = new Purchaserecord();
            $data->purchasenumber = $request->purchasenumber;
            $data->date = $request->date;
            $data->quantity = $request->quantity;
            $data->price = $request->price;
            $data->prodquantityid = $request->prodquantityid;
            $data->save();

            $dataProduct = Productquantity::find($request->prodquantityid);
            $dataProduct->quantity = $dataProduct->quantity + $request->quantity;
            $dataProduct->price = $request->price;
            
            $dataProduct->save();
            return response()->json($data);
    }
    public function recievequantity(Request $request)
    {
            //status = 1(generated purchase request)
            //status = 2(recived purchase request)
           
            Purchaserecord::where('id', '=', $request->requestid)
            ->update(['status' => 2, 'recievedate' => $request->recievedate, 'recievequantity' => $request->recievequantity]);
            $dataPurchaserecord = Purchaserecord::where('id', '=', $request->requestid)->take(1)->get();
            //dd($dataPurchaserecord);
            foreach($dataPurchaserecord as $PurchaseRecord){
                $dataProductQuantity = Skuproductvariantsoption::where('id', '=', $PurchaseRecord->skuid)->take(1)->get();
                foreach($dataProductQuantity as $ProductQuantity) {
                    $Quantity = $ProductQuantity->warehousequantity + $request->recievequantity;
                    $updateProductQuantity = Skuproductvariantsoption::where('id', '=', $PurchaseRecord->skuid)
                    ->update(['warehousequantity' => $Quantity]);
                }   
            }
            return response()->json();
    }
    public function addQuantityRequest(Request $request)
    {
            $data = new Purchaserecord();
            $data->purchasenumber = $request->purchasenumber;
            $data->date = $request->date;
            $data->quantity = $request->quantity;
            $data->price = $request->price;
            $data->prodquantityid = $request->prodquantityid;
            $data->skuid = $request->skuid;
            $data->save();
            return response()->json();
    }
    public function createpurchase(Request $request)
    {
       
            $data = new Purchaserequest();
            $data->purchasenumber = $request->purchasenumber;
            $data->date = $request->purchasedate;
            $data->status = 0;
            $data->save();
            return redirect('admin/createpurchase/'.$request->purchasenumber);
            //return response()->json($data);
    }

    public function createpurchaserequest($purnumber)
    {
        
            $purchasenumber = $purnumber;
            $dataPurchaseRecord = Purchaserecord::where('purchasenumber','=',$purchasenumber)
                                    ->with('productquantity.product', 'skuoption.varoption')
                                    ->get();
            $dataProduct = Product::with('productvariation.productvariations', 'productskus.varoption')->latest()->paginate(25);
            $dataProductofStock = Skuproductvariantsoption::where('warehousequantity','<', 10)->with('product')->get();
            return view('admin.createpurchase',compact('purchasenumber', 'dataProduct', 'dataPurchaseRecord', 'dataProductofStock')); 
    }
    public function purchasesearch(Request $req)
    {
            $q = $req->q;
            $purchasenumber = $req->purchasenumber;
            $dataPurchaseRecord = Purchaserecord::where('purchasenumber','=',$purchasenumber)
                                    ->with('productquantity.product', 'skuoption.varoption')
                                    ->get();
            $dataProduct = Product::where('product_name', 'LIKE', '%' . $q . '%')->with('productvariation.productvariations', 'productskus.varoption')->latest()->paginate(25);
            $dataProductofStock = Skuproductvariantsoption::where('warehousequantity','<', 10)->with('product')->get();
            return view('admin.createpurchase',compact('purchasenumber', 'dataProduct', 'dataPurchaseRecord', 'dataProductofStock')); 
    }
    public function readPurchase(Request $req)
    {
        $dataProductquantity = Product::with('quantity')
            ->get();
        $data = Branch::with('cashier')->get();
        $dataPurchase = Purchaserecord::groupBy('purchasenumber')->orderBy('date', 'DESC')->latest()->take(50)->get();
        $dataPurchaserequest = Purchaserequest::latest()->take(1)->get();
        $dataProductofStock = Skuproductvariantsoption::where('warehousequantity','<', 10)->with('product')->get();
        $dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('admin.purchase',compact('data','dataUser','dataProductquantity', 'dataPurchase', 'dataProductofStock', 'dataPurchaserequest'));    
    }
    public function readPurchaseAcc(Request $req)
    {
        $dataProductquantity = Product::with('quantity')
            ->get();
        $data = Branch::with('cashier')->get();
        $dataPurchase = Purchaserecord::groupBy('purchasenumber')->orderBy('date', 'DESC')->take(10)->get();
        $dataPurchaserequest = Purchaserequest::latest()->take(1)->get();
        $dataProduct = Productquantity::where('quantity','<', 10)->with('product', 'branch')->take(10)->get();
        $dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('accounting.purchase',compact('data','dataUser','dataProductquantity', 'dataPurchase', 'dataProduct', 'dataPurchaserequest'));    
    }
    public function readPurchaseAssistant(Request $req)
    {
        $dataProductquantity = Product::with('quantity')
            ->get();
        $data = Branch::with('cashier')->get();
        $dataPurchase = Purchaserecord::groupBy('purchasenumber')->orderBy('date', 'DESC')->take(10)->get();
        $dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('assistant.purchase',compact('data','dataUser','dataProductquantity', 'dataPurchase'));    
    }
    public function productSearch(Request $request){
        $q = $request->input('q');
            $dataProductquantity = Product::where('product_name', 'LIKE', '%' . $q . '%')
            ->with('quantity')
            ->get();
            $dataPurchase = Purchaserecord::groupBy('purchasenumber')->orderBy('date', 'DESC')->take(10)->get();
            $data = Branch::with('cashier')->get();
            $dataUser = User::where('usertype', '=', 'cashier')->get();
            return view('admin.purchase',compact('data','dataUser','dataProductquantity', 'dataPurchase'));
    }
    public function productSearchAssistant(Request $request){
        $q = $request->input('q');
            $dataProductquantity = Product::where('product_name', 'LIKE', '%' . $q . '%')
            ->with('quantity')
            ->get();
            $dataPurchase = Purchaserecord::groupBy('purchasenumber')->orderBy('date', 'DESC')->take(10)->get();
            $data = Branch::with('cashier')->get();
            $dataUser = User::where('usertype', '=', 'cashier')->get();
            return view('assistant.purchase',compact('data','dataUser','dataProductquantity', 'dataPurchase'));
    }
    public function viewPurchase($id)
    {
        $dataBranch = Branch::where('id','=',$id)->get();
        $dataProduct = Product::all();
        $dataBranchProduct = Productquantity::where('branch_id','=',$id)->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        
        $dataSupplier = Supplier::all();
        return view('admin.branch', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataBranchProduct'));
    }
    public function viewPurchaseAssistant($id)
    {
        $dataBranch = Branch::where('id','=',$id)->get();
        $dataProduct = Product::all();
        $dataBranchProduct = Productquantity::where('branch_id','=',$id)->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        
        $dataSupplier = Supplier::all();
        return view('assistant.branch', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataBranchProduct'));
    }
    public function purchaseHistory($purchasenumber)
    {
        $dataProductquantity = Product::with('quantity')
        ->get();
        //dd($dataProductquantity);
        $data = Branch::with('cashier')->get();
        $dataPurchase = Purchaserecord::groupby('purchasenumber')->orderby('date', 'DESC')->latest()->take(10)->get();

        $dataPurchaseRecord = Purchaserecord::where('purchasenumber','=',$purchasenumber)->with('productquantity', 'skuoption.varoption')->get();
        $dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('admin.purchasehistory',compact('data','dataUser','dataPurchaseRecord', 'dataPurchase','purchasenumber'));
      
    }
    public function purchaseHistoryAcc($purchasenumber)
    {
        $dataProductquantity = Product::with('quantity')
        ->get();
        $data = Branch::with('cashier')->get();
        $dataPurchase = Purchaserecord::groupby('purchasenumber')->orderby('date', 'DESC')->take(10)->get();
        $dataPurchaseRecord = Purchaserecord::where('purchasenumber','=',$purchasenumber)->with('productquantity')->get();
        $dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('accounting.purchasehistory',compact('data','dataUser','dataPurchaseRecord', 'dataPurchase','purchasenumber'));
      
    }
    public function purchaseHistoryAssistant($purchasenumber)
    {
        $dataProductquantity = Product::with('quantity')
        ->get();
        $data = Branch::with('cashier')->get();
        $dataPurchase = Purchaserecord::groupby('purchasenumber')->orderby('date', 'DESC')->take(10)->get();
        $dataPurchaseRecord = Purchaserecord::where('purchasenumber','=',$purchasenumber)->with('productquantity')->get();
        $dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('assistant.purchasehistory',compact('data','dataUser','dataPurchaseRecord', 'dataPurchase','purchasenumber'));
      
    }
    public function editPurchase(Request $req)
    {
        $data = Branch::find($req->id);
        $data->branch_name = $req->branch_name; 
        $data->cashier_id = $req->cashier_id; 
        $data->save();

        return response()->json($data);
    }
    public function deleteQuantityRequest(Request $req){
        Purchaserecord::find($req->id)->delete();
        return response()->json();
    }

    public function generatePurchaseOrder(Request $req){
        //status = 1(generated purchase request)
        //status = 2(recived purchase request)
        Purchaserecord::where('purchasenumber', '=', $req->purchasenumber)
        ->update(['status' => 1]);
        //dd($req->purchasenumber);
        //Purchaserecord::find($req->purchaseNumber)->delete();
        return response()->json();
    }
    public function purchaseRecieved($purchasenumber){
        Purchaserequest::where('purchasenumber', '=', $purchasenumber)
        ->update(['status' => 2]);
        return redirect('admin/purchase');
        //return response()->json();
    }
    
}
