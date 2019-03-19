<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Category;
use App\Brand;
use App\Booking;
use App\Productquantity;
use App\Product;
use App\Purchase;
use App\Transport;
use App\Tagging_tag;
use App\Branch;
use App\User;

class AccountingController extends Controller
{
    //
    public function index(){
        $TotalSales = Purchase::sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        $reportPurchase = Purchase::with('cashier')->take(10)->get();
        $dataProduct = Product::where('warehousequantity','<', 10)->with('productquantities')->take(10)->get();
        $dataBooking = Booking::where('status','!=', 1)->orderBy('id', 'desc')->take(5)->get();
        $dataTransport = Transport::orderBy('id', 'desc')->take(5)->get();
        return view('accounting.dashboard', compact('DailySales','TotalSales','dataProduct', 'reportPurchase', 'dataBooking', 'dataTransport'));
    }

    public function reportacc()
    {
        $dataBranch = Branch::get();
        $reportPurchase = Purchase::get();
        $reportTransport = Transport::where('status','=', '1')->get();
        //dd($reportPurchase);
        $TotalSales = Purchase::sum('amount');
        $TotalYearlySales = Purchase::whereYear('created_at', date('Y'))->sum('amount');
        $TotalMonthlySales = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        return view('accounting.reports',compact('dataBranch','reportPurchase', 'TotalSales', 'DailySales', 'reportTransport', 'TotalYearlySales', 'TotalMonthlySales'));
    }
    public function reportrangeacc(Request $request){
        $dataBranch = Branch::get();
        $reportPurchase = Purchase::where('date', '>=', $request->from)
        ->where('date', '<=', $request->to)
        ->get();
        $reportTransport = Transport::where('created_at', '>=', $request->from)
        ->where('created_at', '<=', $request->to)
        ->where('status','=', '1')
        ->get();
        $TotalSales = Purchase::sum('amount');
        $TotalYearlySales = Purchase::whereYear('created_at', date('Y'))->sum('amount');
        $TotalMonthlySales = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        return view('accounting.reports',compact('reportPurchase', 'dataBranch' ,'TotalSales', 'DailySales', 'reportTransport', 'TotalYearlySales', 'TotalMonthlySales'));
    }

    public function reportbranchacc($branchid){
        $getBranch = Branch::where('id', '=',$branchid)->first();
        $dataBranch = Branch::get();
        $reportPurchase = Purchase::where('cashier_id','=', $getBranch->cashier_id)
        ->get();
        $reportTransport = Transport::where('status','=', '1')
        ->get();
        $TotalYearlySales = Purchase::whereYear('created_at', date('Y'))->sum('amount');
        $TotalMonthlySales = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
        $TotalSales = Purchase::sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        return view('accounting.reports',compact('reportPurchase', 'dataBranch' ,'TotalSales', 'DailySales','reportTransport', 'TotalYearlySales', 'TotalMonthlySales'));
    }
}
