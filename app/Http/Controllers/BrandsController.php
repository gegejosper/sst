<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class BrandsController extends Controller
{
    //
      //
      public function addBrand(Request $request)
      {
          $rules = array(
                  'brand_name' => 'required'
          );
          $validator = Validator::make(Input::all(), $rules);
          if ($validator->fails()) {
              return Response::json(array(
                      'errors' => $validator->getMessageBag()->toArray(),
              ));
          } else {
              $data = new Brand();
              $data->brand_name = $request->brand_name;
              $data->save();
  
              return response()->json($data);
          }
      }
      public function readBrand(Request $req)
      {
          $data = Brand::all();
  
          return view('admin.brands')->withData($data);
          //return view('admin.home')->withData($data);
          
      }
      public function readBrandAssistant(Request $req)
      {
          $data = Brand::all();
  
          return view('assistant.brands')->withData($data);
          //return view('admin.home')->withData($data);
          
      }
      public function editBrand(Request $req)
      {
          $data = Brand::find($req->id);
          $data->brand_name = $req->brand_name; 
          $data->save();
  
          return response()->json($data);
      }
      public function deleteBrand(Request $req)
      {
            Brand::find($req->id)->delete();
  
          return response()->json();
      }
}
