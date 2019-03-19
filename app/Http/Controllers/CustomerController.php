<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Booking;
use App\Reservation;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
class CustomerController extends Controller
{
    //
    public function index(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
            $userEmail = Auth::user()->email;
        }
        // $dataReqorder = DB::table('reservations')
        // ->join('reqorders', 'reservations.requestId', '=', 'reqorders.req_id')
        // ->join('productquantities', 'reqorders.item_id', '=', 'productquantities.id')
        // ->join('products', 'productquantities.prod_id', '=', 'products.id')
        // ->where('userId', '=', $userId)
        // ->where('reservestatus', '=', 0)
        // ->take(5)->get();
        $dataReqorder = Reservation::where('userId', '=', $userId)
        ->take(5)->get();
        $dataBooking = Booking::where('email', '=', $userEmail)
        ->orderBy('id', 'desc')->take(5)->get();
        return view('subscriber.dashboard', compact('dataReqorder', 'dataBooking'));
    }
    public function history(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataReqorder = DB::table('reservations')
        ->join('reqorders', 'reservations.requestId', '=', 'reqorders.req_id')
        ->join('productquantities', 'reqorders.item_id', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('userId', '=', $userId)
        ->whereIn('reservestatus', [1, 3])
        ->get();
        return view('subscriber.history', compact('dataReqorder'));
    }
    public function orders(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataReqorder = Reservation::where('userId', '=', $userId)
        ->get();
        //dd($dataReqorder);
        return view('subscriber.orders',compact('dataReqorder'));
    }
    public function viewRequestOrder($requestId){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $orderCode = $requestId;
        $dataReqorder = DB::table('reservations')
        ->join('reqorders', 'reservations.requestId', '=', 'reqorders.req_id')
        ->join('productquantities', 'reqorders.item_id', '=', 'productquantities.id')
        ->join('products', 'productquantities.prod_id', '=', 'products.id')
        ->where('userId', '=', $userId)
        ->where('requestId', '=', $requestId)
        ->get();
        return view('subscriber.order',compact('dataReqorder', 'orderCode'));
    }
    public function account(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }

        $dataUser = User::where('id','=', $userId)->get();
        //return view('admin.user')->withData($data);
        return view('subscriber.account', compact('dataUser'));
    }
    public function editProfile(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataUser = User::where('id','=', $userId)->get();
        //return view('admin.user')->withData($data);
        return view('subscriber.profile-edit', compact('dataUser'));
    }
    public function editProfileproc(Request $req){
        $data = User::find($req->userid);
        $data->name = $req->name;
        $data->company = $req->companyname;
        $data->contactnum = $req->contactnum;
        $data->save();
        $dataUser = User::where('id','=', $req->userid)->get();
        return redirect()->back()->with('profile', 'Profile Updated!');
    }
    public function editProfilePic(Request $req){
       
        $data = User::find($req->userid);
        $image = $req->file('input_img');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/profileimage');
        $image->move($destinationPath, $name);
        $data->profilepic = $name;
        $data->save();

        $dataUser = User::where('id','=', $req->userid)->get();
        return redirect()->back()->with('success', 'Profile Picture Updated!');
    }
    public function changepass(){
        if (Auth::check())
        {
            $userId = Auth::user()->id;
        }
        $dataUser = User::where('id','=', $userId)->get();
        return view('subscriber.changepass', compact('dataUser'));
    }
    public function changepassproc(Request $req){
        $dataUser = User::where('id','=', $req->userid)->first();
        //return $dataUser->password;
            if($req->newpassword != $req->confirmpassword) {
                return redirect()->back()->with('passwordnotmatch', 'Password did not match!');
            }
            else {
                $data = User::find($req->userid);
                $data->password = bcrypt($req->newpassword);
                $data->save();          
                return redirect()->back()->with('successpass', 'Password Updated!');
            }
    }

    public function viewBooking($bookingid){
        $dataBooking = Booking::where('id','=',$bookingid)->with('transport')->get();
        //dd($dataBooking);
        return view('subscriber.booking',compact('dataBooking'));
    }
    public function activateUser(Request $req)
    {
        $data = Customer::find($req->id);
        $data->status = 1;
        $data->dateactivation = date("m-d-Y");
        $data->save();
        return response()->json($data);
    }

}
