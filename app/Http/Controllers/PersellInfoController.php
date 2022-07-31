<?php

namespace App\Http\Controllers;

use App\Persell_info;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class PersellInfoController extends Controller
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
        return view('dashboard.parsell_info');
    }

   
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        $id = $request['id'];
        
        if ($request->id=="") {
            $data=array();
            $data['product_type_id']=$request->product_type_id;
            $data['product_cate_id']=$request->product_cate_id;
            $data['user_info_id']=Session::get('user_id');
            $data['create_by']=Session::get('user_id');
            $data['coustomer_name']=$request->coustomer_name;
            $data['coustomer_phone']=$request->coustomer_phone;
            $data['coustomer_email']=$request->coustomer_email;
            $data['customer_address']=$request->customer_address;
            $data['zone']=$request->zone;
            $data['area_id']=$request->area_id;
            $data['cash_amount']=$request->cash_amount;
            $data['product_price']=$request->product_price;
            $data['delivery_type']=$request->delivery_type;
            $data['weight']=$request->weight;
            //$data['delivery_status']=$request->delivery_status;

            DB::table('persell_infos')->insert($data);

        return $data;
        }else{
        $data=array();
        $data['product_type_id']=$request->product_type_id;
        $data['product_cate_id']=$request->product_cate_id;
        //$data['user_info_id']=Session::get('user_id');
        //$data['create_by']=Session::get('user_id');
        $data['coustomer_name']=$request->coustomer_name;
        $data['coustomer_phone']=$request->coustomer_phone;
        $data['coustomer_email']=$request->coustomer_email;
        $data['customer_address']=$request->customer_address;
        $data['zone']=$request->zone;
        $data['area_id']=$request->area_id;
        $data['cash_amount']=$request->cash_amount;
        $data['product_price']=$request->product_price;
        $data['delivery_type']=$request->delivery_type;
        $data['weight']=$request->weight;
        $data['delivery_status']=$request->delivery_status;

        DB::table('persell_infos')
            ->where('id', $id)
            ->update($data);
        return $data;
        }
    }

    
    public function show($id)
    {
        $Persell_info = Persell_info::find($id);
        return $Persell_info;
    }

    
    public function edit($id)
    {
        $Persell_info = Persell_info::find($id);
        return $Persell_info;
    }

    
    public function update(Request $request, Persell_info $persell_info)
    {
        //
    }

    
    public function destroy($id)
    {
        DB::table('persell_infos')
            ->where('id', $id)
            ->delete();
    }


    public function getAllParsellInfo()
    {
        $parsellinfo=DB::select("SELECT * FROM persell_infos");

        return Datatables::of($parsellinfo)
                ->addColumn('action', function($parsellinfo){
                    $buttton = '
                <div class="button-list">
                    <a onclick="showParsellInfoData(' .$parsellinfo->id. ')" role="button" href="#" class="btn btn-success btn-sm">View</a>
                    <a onclick="editParsellInfoData(' .$parsellinfo->id. ')" role="button" href="#" class="btn btn-info btn-sm">Edit</a>
                    <a onclick="deleteParsellInfoData(' .$parsellinfo->id. ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
                })
                ->rawColumns(['action'])
                ->toJson();
    }
}
