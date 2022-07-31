<?php

namespace App\Http\Controllers;

use App\User_type;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class UserTypeController extends Controller
{

    public function AdminAuthCheck()
    {
    $admin_id=Session::get('id');
        if ($admin_id) {
            return;
        }else{
            return Redirect::to('/login')->send();
        }
    }
    
    public function index()
    {
        $this->AdminAuthCheck();
        return view('dashboard.user_type');
        /*$all_user_type=DB::table('user_types')->get();
        return view('dashboard.user_type', compact('all_user_type'));*/
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {

        $id = $request['id'];
        
        if ($request->id=="") {
            $data=array();
            $data['user_type_name']=$request->user_type_name;
            $data['status']=$request->status;

            DB::table('user_types')->insert($data);
        
        return $data;
        }else{
        $data=array();
        $data['user_type_name']=$request->user_type_name;
        $data['status']=$request->status;

        DB::table('user_types')
            ->where('id', $id)
            ->update($data);
        return $data;
        }
        
    }

      /*echo "<pre>";
        print_r($data);
        exit();*/

    public function show($id)
    {
       $User_type = User_type::find($id);
        return $User_type;
        
    }

   
    public function edit($id)
    {
        $User_type = User_type::find($id);
        return $User_type;
    }

    
    public function update(Request $request, $id)
    {
        /*$data=array();
        $data['user_type_name']=$request->user_type_name;
        $data['status']=$request->status;

        DB::table('user_types')
            ->where('id', $id)
            ->update($data);
        return $data;

        $data=User_type::find($id);
        $data->user_type_name=$request['user_type_name'];
        $data->status=$request['status'];
        $data->update();
        return $data;*/
    }

    
    public function destroy($id)
    {
       DB::table('user_types')
            ->where('id', $id)
            ->delete();
    }

     public function getAllUserType()
    {
        $usertype=DB::table('user_types')->get();

        return Datatables::of($usertype)
                ->addColumn('action', function($usertype){
                    $buttton = '
                <div class="button-list">
                    <a onclick="showUserTypeData(' .$usertype->id. ')" role="button" href="#" class="btn btn-success btn-sm">View</a>
                    <a onclick="editUserTypeData(' .$usertype->id. ')" role="button" href="#" class="btn btn-info btn-sm">Edit</a>
                    <a onclick="deleteUserTypeData(' .$usertype->id. ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
                })
                ->rawColumns(['action'])
                ->toJson();
    }
}
