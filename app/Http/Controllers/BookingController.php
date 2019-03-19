<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Transport;
use Validator;
use Response;
use Mail;
use App\Mail\BookingEmail;
use App\Mail\BookingConfirmationEmail;
use Illuminate\Support\Facades\Input;

class BookingController extends Controller
{
    //
    public function submitbooking(Request $request)
    {
        $rules = array(
                'name' => 'required',
                'email' => 'required',
                'origin' => 'required',
                'destination' => 'required',
                'weight' => 'required',
                'dateofpickup' => 'required',
                'cargotype' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', 'Please complete the information');
        } else {
            $data = new Booking();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->companyname = $request->companyname;
            $data->contactnum = $request->contactnum;
            $data->origin = $request->origin;
            $data->destination = $request->destination;
            $data->weight = $request->weight;
            $data->dateofpickup = $request->dateofpickup;
            $data->cargotype = $request->cargotype;
            $data->details = $request->details;
            $data->status = 0;
            $data->save();
            Mail::to($request->email)->send(new BookingEmail());
            Mail::to('info@chinchingenterprises.com')->send(new BookingConfirmationEmail());
            return redirect()->back()->with(['success' => 'Thank you for booking with us!', 'email' => $request->email]);
            //return response()->json($data);
        }
    }
    public function readBooking(){
        $dataBooking = Booking::where('status','!=', 1)->orderBy('id', 'desc')->get();
        //dd($data);
        //$dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('admin.bookings',compact('dataBooking'));
    }
    public function viewBooking($bookingid){
        $dataBooking = Booking::where('id','=',$bookingid)->with('transport')->get();
        //dd($dataBooking);
        return view('admin.booking',compact('dataBooking'));
    }
    public function readBookingAssistant(){
        $dataBooking = Booking::where('status','!=', 1)->orderBy('id', 'desc')->get();
        //dd($data);
        //$dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('assistant.bookings',compact('dataBooking'));
    }
    public function viewBookingAssistant($bookingid){
        $dataBooking = Booking::where('id','=',$bookingid)->with('transport')->get();
        //dd($dataBooking);
        return view('assistant.booking',compact('dataBooking'));
    }
    public function approveBooking(Request $req){
        $data = Booking::find($req->id);
        $data->status = 1; 
        $data->save();

        $dataTransport = new Transport();
        $dataTransport->email = $req->email;
        $dataTransport->bookingId = $req->id;
        $dataTransport->qouterate = $req->qoutrate;
        $dataTransport->qoutdesc = $req->qoutdesc;
        $dataTransport->status = 0;
        $dataTransport->save();
        //Mail::to($request->email)->send(new QoutationEmail());
        return response()->json($data);
    }
    public function disapproveBooking(Request $req){
        $data = Booking::find($req->id);
        $data->status = 2; 
        $data->save();
        return response()->json();
        //return $data;
    }
    public function deleteBooking(Request $req){
        Booking::find($req->id)->delete();
        return response()->json();
        //return $req;
    }
    
}
