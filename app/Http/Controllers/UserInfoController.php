<?php

namespace App\Http\Controllers;

use App\User_info;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class UserInfoController extends Controller
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

    public function login()
    {       
        return view('dashboard.login');
    }

    public function admin()
    {
        $this->AdminAuthCheck();
        return view('dashboard.home');
    }

    public function userLoginProcess(Request $request)
    {

        $user_phone=$request->user_phone;
        $user_password=$request->user_password;
        $result=DB::table('user_infos')
                ->where('user_phone',$user_phone)
                ->where('user_password',$user_password)
                ->where('user_type_id','14')
                ->first();

                /*echo "<pre>";
                print_r($result);
                exit();*/

            if ($result){
               Session::put('id',$result->id);
               //Session::put('user_type_id',$result->user_type_id);
               Session::put('user_email',$result->user_email);
               Session::put('user_full_name',$result->user_full_name);
               Session::put('user_phone',$result->user_phone);
               
                //return view('dashboard.home');
               return Redirect::to('/admin');
            }else{
                return Redirect::to('/login');
                //return view('dashboard.login');
            }
    }

    public function logout()
    {
        Session::flush();
        return Redirect::to('/login');
    }
    
    public function index()
    {
        $this->AdminAuthCheck();
        return view('dashboard.user_info');
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $this->AdminAuthCheck();
        $id = $request['id'];
        
        if ($request->id=="") {
            $data=array();
            $data['user_type_id']=$request->user_type_id;
            $data['user_name']=$request->user_name;
            $data['user_password']=$request->user_password;
            $data['user_full_name']=$request->user_full_name;
            $data['user_phone']=$request->user_phone;
            $data['user_email']=$request->user_email;
            $data['user_address']=$request->user_address;
            $data['user_company_info']=$request->user_company_info;
            $data['user_company_address']=$request->user_company_address;
            $data['user_company_phone']=$request->user_company_phone;
            $data['user_company_email']=$request->user_company_email;
            $data['nid_no']=$request->nid_no;
            $data['trade_license']=$request->trade_license;
            $data['user_status']=$request->user_status;

            DB::table('user_infos')->insert($data);
        
        return $data;
        }else{
            $data=array();
            $data['user_type_id']=$request->user_type_id;
            $data['user_name']=$request->user_name;
            $data['user_password']=$request->user_password;
            $data['user_full_name']=$request->user_full_name;
            $data['user_phone']=$request->user_phone;
            $data['user_email']=$request->user_email;
            $data['user_address']=$request->user_address;
            $data['user_company_info']=$request->user_company_info;
            $data['user_company_address']=$request->user_company_address;
            $data['user_company_phone']=$request->user_company_phone;
            $data['user_company_email']=$request->user_company_email;
            $data['nid_no']=$request->nid_no;
            $data['trade_license']=$request->trade_license;
            $data['user_status']=$request->user_status;

            DB::table('user_infos')
                ->where('id', $id)
                ->update($data);
            return $data;
        }
    }

    
    public function show($id)
    {
        $this->AdminAuthCheck();
        $User_info = User_info::find($id);
        return $User_info;
    }

    
    public function edit($id)
    {
        $this->AdminAuthCheck();

        $User_info = User_info::find($id);
        return $User_info;
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        
        DB::table('user_infos')
            ->where('id', $id)
            ->delete();
    }

    public function getAllUserInfo()
    {

        $user_info=DB::select('SELECT UI.id, user_type_id, UT.user_type_name ,user_name, user_password, user_full_name, user_phone, user_email, user_address, user_company_info, user_company_address, user_company_phone, user_company_email, user_status, UI.created_at, UI.updated_at FROM user_infos UI, user_types UT
            WHERE UI.user_type_id = UT.id;');

        return Datatables::of($user_info)
                ->addColumn('action', function($user_info){
                    $buttton = '
                <div class="button-list">
                    <a onclick="showUserInfoData(' .$user_info->id. ')" role="button" href="#" class="btn btn-success btn-sm">View</a>
                    <a onclick="editUserInfoData(' .$user_info->id. ')" role="button" href="#" class="btn btn-info btn-sm">Edit</a>
                    <a onclick="deleteUserInfoData(' .$user_info->id. ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
                })
                ->rawColumns(['action'])
                ->toJson();
    }
}
