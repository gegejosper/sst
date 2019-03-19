<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Supplier;
use App\Category;
use App\Brand;
use App\Branch;
use App\Booking;
use App\Productquantity;
use App\Product;
use App\Purchase;

use App\Returnsproductlist;
use App\Distribution;

use App\Purchaserecord;
use App\Purchaserequest;
use App\Transport;
use App\Tagging_tag;
Use DB;


use App\User;

class AdminController extends Controller
{
    //
    public function index(){
        $TotalSales = Purchase::sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        $reportPurchase = Purchase::with('cashier')->take(5)->latest()->get();
        //$dataProduct = Productquantity::where('quantity','<', 10)->with('product', 'branch')->take(10)->get();
      
        $dataPurchase = Purchaserecord::groupBy('purchasenumber')->orderBy('date', 'DESC')->take(10)->get();
        // $reportPackageorder = Packageorder::take(10)->latest()->get();
        $dataProduct = Product::with('distributionrecord', 'productquantities.variation', 'productskus.varoption')->orderBy('product_name', 'asc')->take(10)->get();
        $dataBranch = Branch::with('products')->get();
        $dataDistributionList = Distribution::latest()->with('branch')->take(5)->get();
      
        return view('admin.dashboard', compact('dataPurchase','dataDistributionList','DailySales','TotalSales','dataProduct', 'reportPurchase','dataBranch'));
    }
    public function shop(){
        return view('admin.shop');
    }
    public function request(){
        return view('admin.request');
    }
    public function login()
    {
        return view('admin.login');
    }

    public function members(){
        $dataUser = User::where('usertype', '=', 'customer')->get();
        return view('admin.members',compact('dataUser'));
    }

    public function report()
    {
        $dataBranch = Branch::get();
        $reportPurchase = Purchase::where('date', '=', date('Y-m-d'))->with('cashier')->get();
        
       
        $TotalSalesWalkin = Purchase::sum('amount');
      
        $TotalSales = $TotalSalesWalkin;
        
        
        $TotalYearlyWalkin = Purchase::whereYear('created_at', date('Y'))->sum('amount');
       
        $TotalYearlySales =  $TotalYearlyWalkin ;

        $TotalMonthlyWalkin = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
        
        $TotalMonthlySales =  $TotalMonthlyWalkin ;

        $DailySalesWalkin = Purchase::where('date', '=', date('Y-m-d'))->sum('amount');
        
        $DailySales = $DailySalesWalkin ;
        return view('admin.reports',compact('dataBranch','reportPurchase', 'TotalSales', 'DailySales', 'TotalYearlySales','TotalMonthlySales'));
    }
    public function vieworder($ordernumber)
    {

        $reportPurchase = Purchase::where('orderNumber', '=',$ordernumber )->first();
        //$orderDetails = Order::where('orderId', '=', $ordernumber)->get();
       
        $orderDetails = DB::table('orders')
        ->join('productquantities', 'orders.itemId', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('orderId', '=', $ordernumber)
        ->get();
        //dd($orderDetails);
        return view('admin.vieworder',compact('reportPurchase', 'orderDetails'));
    }
    public function packagesreport()
    {
        $dataBranch = Branch::get();
       
       
       
        $TotalSalesWalkin = Purchase::sum('amount');
     

        $TotalSales = $TotalSalesWalkin;
        
        
        $TotalYearlyWalkin = Purchase::whereYear('created_at', date('Y'))->sum('amount');
       
        $TotalYearlySales =  $TotalYearlyWalkin;

        $TotalMonthlyWalkin = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
        
        $TotalMonthlySales =  $TotalMonthlyWalkin;

        $DailySalesWalkin = Purchase::where('date', '=', date('Y-m-d'))->sum('amount');
        
        $DailySales = $DailySalesWalkin;
        return view('admin.packagesreport',compact('dataBranch', 'TotalSales', 'DailySales','TotalYearlySales','TotalMonthlySales'));
    }

    public function salesreport()
    {
        $dataBranch = Branch::get();
        $reportPurchase = Purchase::where('date', '=', date('Y-m-d'))->get();
       
               
        $TotalSales = Purchase::sum('amount');
        
        $TotalYearlySales = Purchase::whereYear('created_at', date('Y'))->sum('amount');

        $TotalMonthlySales = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
        
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))->sum('amount');
      
        return view('admin.salesreport',compact('dataBranch','reportPurchase', 'TotalSales', 'DailySales','TotalYearlySales','TotalMonthlySales'));
    
    }
    public function reportsalesrange(Request $request){
        $dataBranch = Branch::get();
       
        $reportPurchase = Purchase::where('date', '>=', $request->from)
        ->where('date', '<=', $request->to)
        ->get();


        $TotalSalesWalkin = Purchase::sum('amount');
        
       
        $TotalSales = $TotalSalesWalkin;
        
        
        $TotalYearlyWalkin = Purchase::whereYear('created_at', date('Y'))->sum('amount');
       
        $TotalYearlySales =  $TotalYearlyWalkin;

        $TotalMonthlyWalkin = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
        
        $TotalMonthlySales =  $TotalMonthlyWalkin;

        $DailySalesWalkin = Purchase::where('date', '=', date('Y-m-d'))->sum('amount');
        
        $DailySales = $DailySalesWalkin;
        return view('admin.salesreport',compact('dataBranch','reportPurchase', 'TotalSales', 'DailySales', 'TotalYearlySales','TotalMonthlySales'));
    }
    
    public function reportrange(Request $request){
        
        $fromdate = Carbon::parse($request->from.' 00:00:00');
        $todate = Carbon::parse($request->to .' 23:59:59'); 
        $dataBranch = Branch::get();

        
        $reportPurchase = Purchase::where('date', '>=', $request->from)
        ->where('date', '<=', $todate)
        ->get();


        //dd($request);
        $TotalSalesWalkin = Purchase::sum('amount');
       
        
        $TotalSales = $TotalSalesWalkin;
        
        
        $TotalYearlyWalkin = Purchase::whereYear('created_at', date('Y'))->sum('amount');
        
        $TotalYearlySales =  $TotalYearlyWalkin;

        $TotalMonthlyWalkin = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
       
        $TotalMonthlySales =  $TotalMonthlyWalkin;

        $DailySalesWalkin = Purchase::where('date', '=', date('Y-m-d'))->sum('amount');
        
        $DailySales = $DailySalesWalkin;
        return view('admin.reports',compact('dataBranch','reportPurchase', 'TotalSales', 'DailySales','TotalYearlySales','TotalMonthlySales'));
    }


    public function reportrangebranch(Request $request){
        
        $fromdate = Carbon::parse($request->from.' 00:00:00');
        $todate = Carbon::parse($request->to .' 23:59:59'); 
        $branchid = $request->branch;
        $dataBranch = Branch::get();
        
        $reportPurchase = Purchase::where('date', '>=', $request->from)
                        ->where('date', '<=', $todate)
                        ->where('branchid', '<=', $request->branch)
                        ->get();
      

        //dd($request);
        $TotalSalesWalkin = Purchase::where('branchid', '<=', $request->branch)->sum('amount');
       
        $TotalSales = $TotalSalesWalkin;
        
        
        $TotalYearlyWalkin = Purchase::where('branchid', '<=', $request->branch)->whereYear('created_at', date('Y'))->sum('amount');
       
        $TotalYearlySales =  $TotalYearlyWalkin;

        $TotalMonthlyWalkin = Purchase::where('branchid', '<=', $request->branch)->whereMonth('created_at', '=', date('m'))->sum('amount');
        
        $TotalMonthlySales =  $TotalMonthlyWalkin;

        $DailySalesWalkin = Purchase::where('branchid', '<=', $request->branch)->where('date', '=', date('Y-m-d'))->sum('amount');
        
        $DailySales = $DailySalesWalkin;
        return view('admin.reportsbranch',compact('dataBranch','reportPurchase', 'TotalSales', 'DailySales','TotalYearlySales','TotalMonthlySales', 'branchid'));
    }

    public function reportbranch($branchid){

        $getBranch = Branch::where('id', '=',$branchid)->first();
        $dataBranch = Branch::get();
       
        $reportPurchase = Purchase::where('branchid','=', $branchid)
                                    ->where('created_at', '>=', date('Y-m-d'))
                                    ->get();
        $TotalSales = Purchase::sum('amount');
        $TotalYearlySales = Purchase::whereYear('created_at', date('Y'))->sum('amount');
        $TotalMonthlySales = Purchase::whereMonth('created_at', '=', date('m'))->sum('amount');
        $DailySales = Purchase::where('date', '=', date('Y-m-d'))
        ->sum('amount');
        return view('admin.reportsbranch',compact('reportPurchase', 'dataBranch' ,'TotalSales', 'DailySales','TotalYearlySales','TotalMonthlySales', 'branchid'));
    }
    public function settings(){
        
        $dataCategory = Category::take(10)->get();
        $dataSupplier = Supplier::take(10)->get();
        $dataBrand = Brand::take(10)->get();
        
        $dataBranch = Branch::with('cashier')->take(10)->get();
        //dd($dataBranch);
        $dataUser = User::take(10)->get();

        return view('admin.settings',compact('dataCategory', 'dataSupplier', 'dataBrand', 'dataUser', 'dataBranch'));
    }
    public function categories(){
        return view('admin.categories');
    }
    public function users(){
        return view('admin.users');
    }
    public function suppliers(){
        return view('admin.suppliers');
    }
    public function brands(){
        return view('admin.brands');
    }

    public function tags(){
        $dataTags = Tagging_tag::all();
        return view('admin.tags', compact('dataTags'));
    }
    public function adminvieworder($ordernumber)
    {

        $reportPurchase = Purchase::where('orderNumber', '=',$ordernumber )->first();
        //$orderDetails = Order::where('orderId', '=', $ordernumber)->get();
        // $userId = Auth::user()->id;
        // $dataBranch = Branchuser::where('userid', '=', $userId)->first();
        $orderDetails = DB::table('orders')
        ->join('productquantities', 'orders.itemId', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->join('users', 'orders.cashier_id', '=', 'users.id')
        ->where('orderId', '=', $ordernumber)
        ->get();
        //dd($orderDetails);
        return view('admin.viewadminorder',compact('reportPurchase', 'orderDetails'));
    }
    
    public function viewpackageorder($ordernumber)
    {

        $reportPackageorder = Packageorder::where('ordernumber', '=',$ordernumber )->with('package')->with('customer')->with('user')->get();
        //$orderDetails = Order::where('orderId', '=', $ordernumber)->get();
       
        //dd($reportPackageorder);
        return view('admin.viewpackageorder',compact('reportPackageorder','ordernumber'));
    }
    public function returnslist(){
        //$reportPurchase = Purchase::where('orderNumber', '=',$ordernumber )->first();
        
        $returnDetails = Returnsproductlist::with('branch')
        ->groupBy('returnbatchnum')
        ->get();
        //dd($returnDetails);
        //return response()->json();
        return view('admin.returnslist',compact('returnDetails'));
    }
    public function returnnum($returnbatchnum){
        //$reportPurchase = Purchase::where('orderNumber', '=',$ordernumber )->first();
        $returnDetails = DB::table('returnsproductlists')
        ->join('productquantities', 'returnsproductlists.item_id', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('returnbatchnum', '=', $returnbatchnum)
        
        ->get();
        
        //return response()->json();
        return view('admin.viewreturn',compact('returnDetails', 'returnbatchnum'));
    }
}
