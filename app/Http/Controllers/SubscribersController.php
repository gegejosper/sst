<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Branch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Branchuser;

class SubscribersController extends Controller
{
    //
    // public function subscribers(){
    //     $dataUser = User::where('usertype', '=', 'customer')->get();
    //     return view('admin.members',compact('dataUser'));
    // }

    public function viewSubscribers(){
        $dataCustomer = Customer::all();
        return view('admin.subscribers',compact('dataCustomer'));
    }
    public function viewSubscribersStatus($status){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataCustomer = Customer::where('status', '=', $status)->where('branchid', '=', $dataBranch->branch_id)->get();
        return view('cashier.subscribers',compact('dataCustomer'));
    }
    public function viewBranchSubscribers($branchid){
        $dataBranch = Branch::where('id','=',$branchid)->get();
        $dataCustomer = Customer::where('branchid', "=", $branchid)->get();
        return view('admin.branchsubscribers',compact('dataCustomer', 'dataBranch'));
    }
    public function subscribersAcc(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $dataCustomer = Customer::where('branchid', '=', $dataBranch->branch_id)->get();
        return view('cashier.subscribers',compact('dataCustomer'));
    }
    public function showSubscriber($boxid){
        $dataUser = User::where('id','=', $boxid)->take(1)->get();
        $dataCustomer = Customer::where('boxId','=', $boxid)->take(1)->get();
        //dd($dataCustomer);
        //return view('admin.user')->withData($data);
        return view('cashier.subscriber', compact('dataUser', 'dataCustomer'));
    }

    public function showSubscriberAdmin($boxid){
        $dataUser = User::where('id','=', $boxid)->take(1)->get();
        $dataCustomer = Customer::where('boxId','=', $boxid)->take(1)->get();
        //dd($dataCustomer);
        //return view('admin.user')->withData($data);
        return view('admin.subscriber', compact('dataUser', 'dataCustomer'));
    }
}
