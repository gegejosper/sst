<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Category;
use App\Brand;
use App\Booking;
use App\Productquantity;
use App\Purchase;
use App\Transport;
use App\Tagging_tag;
use App\Branch;
use App\User;

class OicController extends Controller
{
    public function index(){
        $TotalSales = Purchase::sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        $reportPurchase = Purchase::with('cashier')->take(10)->get();
        $dataProduct = Productquantity::where('quantity','<', 10)->with('product', 'branch')->take(10)->get();
        $dataBooking = Booking::where('status','!=', 1)->orderBy('id', 'desc')->take(5)->get();
        $dataTransport = Transport::orderBy('id', 'desc')->take(5)->get();
        return view('oic.dashboard', compact('DailySales','TotalSales','dataProduct', 'reportPurchase', 'dataBooking', 'dataTransport'));
    }
}
