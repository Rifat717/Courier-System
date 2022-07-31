<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class RiderController extends Controller
{

    public function AdminAuthCheck()
    {
    $admin_id=Session::get('id');
        if ($admin_id) {
            return;
        }else{
            return Redirect::to('/rider')->send();
        }
    }
    
    public function rider_Login()
    {
        
        return view ('rider.rider_login');
    }

    public function riderLogout()
    {
        Session::flush();
        return Redirect::to('/rider');
    }

    public function riderLoginProcess(Request $request)
    {

        $user_phone=$request->user_phone;
        $user_password=$request->user_password;
        $result=DB::table('user_infos')
                ->where('user_phone',$user_phone)
                ->where('user_password',$user_password)
                ->where('user_type_id','15')
                ->first();

              

            if ($result){
               Session::put('id',$result->id);
               Session::put('user_type_id',$result->user_type_id);
               Session::put('user_name',$result->user_name);
               
               return Redirect::to('/rider-dashboard');
            }else{
                return Redirect::to('/rider');
            }
    }



    public function riderDashboard()
    {
        $this->AdminAuthCheck();
        return view ('rider.rider_dashboard');
    }

    public function index()
    {
        $this->AdminAuthCheck();
        return view ('rider.rider_pending_parcel');
    }

    public function riderAssigned()
    {
        return view ('dashboard.rider_assigned');
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $parsell_info_id= $request['parsell_info_id'];
        $data=array();
        $data['received_by']=$request->id;
        $data['delivery_status']="Rider Assigned For PicUp";
        
        $result = DB::table('persell_infos')
            ->where('id', $parsell_info_id)
            ->update($data);

        if($result){
            return json_encode(array(
                    "statusCode" => 200
                ));
        }else{
            return json_encode(array(
                "statusCode" => 201
            ));
        }
    
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function getRiderPendingParcel()
    {
        $id = Session::get('id');
        $pendingparsellinfo=DB::select("SELECT * FROM persell_infos WHERE received_by ='$id';");


        return Datatables::of($pendingparsellinfo)
                /*->addColumn('action', function($pendingparsellinfo){
                    $buttton = '
                
                ';
                return $buttton;
                })
                ->rawColumns(['action'])*/
                ->toJson();
    }
}
