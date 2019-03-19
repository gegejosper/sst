<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class SuppliersController extends Controller
{
    //

    public function addSupplier(Request $request)
    {
        $rules = array(
                'supplier_name' => 'required',
                'supplier_address' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                    'errors' => $validator->getMessageBag()->toArray(),
            ));
        } else {
            $data = new Supplier();
            $data->supplier_name = $request->supplier_name;
            $data->supplier_address = $request->supplier_address;
            $data->save();

            return response()->json($data);
        }
    }
    public function readSupplier(Request $req)
    {
        $data = Supplier::all();
        return view('admin.suppliers')->withData($data);    
    }
    public function readSupplierAssistant(Request $req)
    {
        $data = Supplier::all();
        return view('assistant.suppliers')->withData($data); 
    }
    public function editSupplier(Request $req)
    {
        $data = Supplier::find($req->id);
        $data->supplier_name = $req->supplier_name; 
        $data->supplier_address = $req->supplier_address; 
        $data->save();
        return response()->json($data);
    }
    public function deleteSupplier(Request $req)
    {
        Supplier::find($req->id)->delete();
        return response()->json();
    }
}
