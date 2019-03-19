<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Branch;
use App\Branchuser;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    //

    public function addUser(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'usertype' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                     'errors' => $validator->getMessageBag()->toArray(),
            ));
            //return response()->json(['errors'=>$validator->errors()]);
            //return Redirect::back()->withErrors($validator);
            //$data->message = "Error! Please check";
            //return response()->json($data);
        } else {
            $data = new User();
            $data->name = $request->name;
            $data->usertype = $request->usertype;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->save();

            return response()->json($data);
        }
    }
    public function addbranchusers(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'usertype' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Response::json(array(
                     'errors' => $validator->getMessageBag()->toArray(),
            ));
            //return response()->json(['errors'=>$validator->errors()]);
            //return Redirect::back()->withErrors($validator);
            //$data->message = "Error! Please check";
            //return response()->json($data);
        } else {
            $data = new User();
            $data->name = $request->name;
            $data->usertype = $request->usertype;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->save();

            $dataBranch = new Branchuser();
            $dataBranch->branch_id = $request->branch;
            $dataBranch->userid = $data->id;
            $dataBranch->save();
            return response()->json($data);
        }
    }
    public function readUser(Request $req)
    {
        $data = User::all();
        $dataBranch = Branch::all();
        return view('admin.users', compact('data', 'dataBranch'));
        //return view('admin.home')->withData($data);
        
    }
    public function editUser(Request $req)
    {
        $data = User::find($req->id);
        $data->name = $req->name;
        $data->usertype = $req->usertype;
        $data->email = $req->email;
        $data->password = bcrypt($req->password);
        $data->save();

        return response()->json($data);
    }
    public function editbranchusers(Request $req)
    {
        $data = User::find($req->id);
        $data->name = $req->name;
        $data->usertype = $req->usertype;
        $data->email = $req->email;
        $data->password = bcrypt($req->password);
        $data->save();

        return response()->json($data);
    }
    public function deleteUser(Request $req)
    {
        User::find($req->id)->delete();
        $updateBranchuser = Branchuser::where('userid', '=', $req->id)
                    ->delete();
        return response()->json();
    }
    public function showUser($id){
        $dataUser = User::where('id','=', $id)->get();
        //return view('admin.user')->withData($data);
        return view('admin.user', compact('dataUser'));
    }
}
