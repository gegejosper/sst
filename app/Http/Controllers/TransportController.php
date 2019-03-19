<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Transport;
use Validator;
use Response;
use Mail;
use App\Mail\BookingEmail;
use Illuminate\Support\Facades\Input;

class TransportController extends Controller
{
    //
    public function readTransport(){
        $dataTransport = Transport::with('booking')->orderBy('id', 'desc')->get();
        //dd($dataTransport);
        //$dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('admin.transports',compact('dataTransport'));
    }
    public function readTransportAssistant(){
        $dataTransport = Transport::with('booking')->orderBy('id', 'desc')->get();
        //dd($dataTransport);
        //$dataUser = User::where('usertype', '=', 'cashier')->get();
        return view('assistant.transports',compact('dataTransport'));
    }
    public function approveTransport(Request $req){
        $data = Transport::find($req->id);
        $data->status = 1; 
        $data->save();
        //Mail::to($request->email)->send(new QoutationEmail());
        return response()->json($data);
    }
    public function disapproveTransport(Request $req){
        
        $data = Transport::find($req->id);
        $data->status = 2; 
        $data->save();
        return response()->json();
        //return $data;
    }
    public function cancelTransport(Request $req){
        
        $data = Transport::find($req->id);
        $data->status = 3; 
        $data->save();
        return response()->json();
        //return $data;
    }
    public function deleteTransport(Request $req){
        Transport::find($req->id)->delete();
        return response()->json();
        //return $req;
    }
}
