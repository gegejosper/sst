<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Branch;
use App\Dealer;
use App\Dealerspackageorder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Branchuser;

class DealersController extends Controller
{
    //

    public function dealersAcc(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataCustomer = Dealer::where('branchid', '=', $dataBranch->branch_id)->get();
        return view('cashier.dealers',compact('dataCustomer'));
    }
    public function showalldealersAdmin(){
        $dataCustomer = Dealer::all();
        return view('admin.dealers',compact('dataCustomer'));
    }
    public function showdealers($id){
        //$dataUser = User::where('id','=', $id)->take(1)->get();
        $dataDealerRecord = Dealerspackageorder::where('dealerid','=', $id)->orderBy('status', 'asc')->get();
        $dataCustomer = Dealer::where('id','=', $id)->take(1)->get();
        //return view('admin.user')->withData($data);
        return view('cashier.dealer', compact('dataCustomer', 'dataDealerRecord'));
    }
    public function activateUser(Request $req)
    {
        $data = Dealerspackageorder::find($req->id);
        $data->dateactivation = date("m-d-Y");
        $data->status = 1;
        $data->save();
        return response()->json($data);
    }
    public function viewBranchDealers($branchid){
        $dataBranch = Branch::where('id','=',$branchid)->get();
        $dataDealer = Dealer::where('branchid', "=", $branchid)->get();
        return view('admin.branchdealers',compact('dataDealer', 'dataBranch'));
    }
    public function showdealersAdmin($id){
        //$dataUser = User::where('id','=', $id)->take(1)->get();
        $dataDealerRecord = Dealerspackageorder::where('dealerid','=', $id)->get();
        $dataCustomer = Dealer::where('id','=', $id)->take(1)->get();
        //return view('admin.user')->withData($data);
        return view('admin.branchdealer', compact('dataCustomer', 'dataDealerRecord'));
    }
}
