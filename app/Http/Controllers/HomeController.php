<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Productquantity;
use App\Brand;
use App\Category;
use App\Branch;
use App\Supplier;
use DB;
use Cookie;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        else {
            $userId = 'none';
        }
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
        $dataProduct = Product::limit(4)->get();
        $dataProductquantity = Productquantity::with('product')->limit(4)->get();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();

        return view('home', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity','userId'));
        //return view('home');

    }

    public function slug($slug)
    {
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        else {
            $userId = 'none';
        }
        $dataTagged = DB::table('tagging_tagged')
            ->where('tag_slug', '=',$slug)
            ->get();
        foreach($dataTagged as $tagged){
            $dataProductquantity[] = Productquantity::where('id','=',$tagged->taggable_id)->first();    
        }
        //dd($dataProductquantity);
        $dataProduct = Product::all();
        //$dataProductquantity = Productquantity::all();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();

        return view('tag', compact('dataCategory', 'dataProductquantity', 'dataBrand','userId'));
        //return view('home');

    }
    public function category($id)
    {
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        else {
            $userId = 'none';
        }
        $dataProductquantity = Productquantity::where('category_id', '=',$id)
        ->get();;
        $dataBrand = Brand::all();
        $dataCategory = Category::all();

        return view('category', compact('dataCategory', 'dataProductquantity', 'dataBrand', 'userId'));
    }
    public function brand($id)
    {
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        else {
            $userId = 'none';
        }
        $dataProductquantity = Productquantity::where('brand_id', '=',$id)
        ->get();;
        $dataBrand = Brand::all();
        $dataCategory = Category::all();

        return view('brand', compact('dataCategory', 'dataProductquantity', 'dataBrand','userId'));
    }
    public function shop()
    {
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        else {
            $userId = 'none';
        }
        $dataProduct = Product::all();
        $dataProductquantity = Productquantity::all();
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataBranch = Branch::all();
        $dataSupplier = Supplier::all();

        return view('shop', compact('dataProduct','dataBrand','dataCategory','dataBranch','dataSupplier', 'dataProductquantity','userId'));
    }
    public function about()
    {
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        else {
            $userId = 'none';
        }
        return view('about', compact('userId'));
    }
    public function services()
    {
        return view('services');
    }
    public function contact()
    {
        return view('contact');
    }
    public function booking()
    {
        if (Auth::check())
        {
            $useremail = Auth::user()->email;
            $contactnum = Auth::user()->contactnum;
            $username = Auth::user()->name;
            $company = Auth::user()->company;
        }
        return view('booking', compact('username','useremail', 'company', 'contactnum'));
    }
    public function register()
    {
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        else {
            $userId = 'none';
        }
        return view('register', compact('userId'));
    }
    public function errortoken()
    {
        return view('errors.token');
    }
    
    // public function session()
    // {
    //     //  if (cookie('shoppingId')  == ''){
    //     //        //dd(session()->get('shoppingId'));
    //     //        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //     //     $charactersLength = strlen($characters);
    //     //     $randomString = '';
    //     //     for ($i = 0; $i < 10; $i++) {
    //     //         $randomString .= ucwords($characters[rand(0, $charactersLength - 1)]);
    //     //     }
    //     //     $cookie = cookie('shoppingId', $randomString, 160);
    //     //     $cookie = cookie('shoppingId', $randomString, 160);
    //     //     return $cookie;
    //     // }
    //     // else {
    //     //     //$cookie = cookie('shoppingId', $randomString, 160);
    //     //     return cookie('shoppingId');
    //     // }
    //     //     //return $randomString;
    //     //     session()->put('shoppingId',  $randomString);
    //     //     dd(session()->get('shoppingId'));
    //     // }
    //     //Cookie::queue(Cookie::make('shoppingId', $randomString, 160));
    //     //Cookie::queue('shoppingId', $randomString, 160);
    //     // $cookie = cookie('shoppingId', $randomString, 160);
    //     // return $cookie;
    //     //$val = Cookie::get('shoppingId');
    //     //return response('Cookie set!')->withCookie(cookie('shoppingId', $randomString, 160));
    //     //dd($val);
    //     //return response('Hello World')->cookie($cookie);
    //     // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //     // $charactersLength = strlen($characters);
    //     // $randomString = '';
    //     // for ($i = 0; $i < $length; $i++) {
    //     //     $randomString .= ucwords($characters[rand(0, $charactersLength - 1)]);
    //     // }
    //     // return $randomString;
        
    //     // session()->put('user', 'gegejosper');
    //     // dd(session()->get('user'));
    //     //return $request->session()->regenerate();
        
    // }
   
    
}
