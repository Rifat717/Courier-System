<?php

namespace App\Http\Controllers;

use App\Marchant;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class MarchantController extends Controller
{
    public function AdminAuthCheck()
    {
    $admin_id=Session::get('user_id');
        if ($admin_id) {
            return;
        }else{
            return Redirect::to('/')->send();
        }
    }

    public function dashboard()
    {
        $this->AdminAuthCheck();
        return view('marchant.marchant_dashboard');
    }

    public function marchantReg()
    {
        return view('marchant.marchant_reg');
    }

   /* public function parcelPage()
    {
        $this->AdminAuthCheck();
        return view('marchant.marchant_parcel');
    }*/

    public function marchantRegistration(Request $request)
    {
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

        $user_id=DB::table('user_infos')
                    ->insertGetId($data);

            /*echo "<pre>";
            print_r($user_id);
            exit();*/
            Session::put('user_id',$user_id);
            Session::put('user_type_id',$request->user_type_id);
            Session::put('user_phone',$request->user_phone);
            Session::put('user_email',$request->user_email);
            Session::put('user_name',$request->user_name);
            Session::put('user_company_info',$request->user_company_info);
            return Redirect('/marchant');
    }

    

    public function marchantLogin(Request $request)
    {
        $user_phone=$request->user_phone;
        $user_password=$request->user_password;
        //$marchant_type_id=$request->user_type_id;
        $result=DB::table('user_infos')
                ->where('user_phone',$user_phone)
                ->where('user_password',$user_password)
                ->where('user_type_id','3')
                ->first();

                /*echo "<pre>";
                print_r($result);
                exit();*/

            if ($result){
                Session::put('user_id',$result->id);
                Session::put('user_type_id',$result->user_type_id);
                Session::put('user_phone',$result->user_phone);
                Session::put('user_email',$result->user_email);
                Session::put('user_name',$result->user_name);
                Session::put('user_company_info',$result->user_company_info);
               
               return Redirect::to('/marchant');
            }else{
                return Redirect::to('/');
            }
    }

    public function marchantLogout()
    {
        Session::flush();
        return Redirect::to('/');
    }

    
    public function index()
    {
        $this->AdminAuthCheck();
        return view('marchant.marchant_parcel');
    }

   
    public function create()
    {
        //
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

            DB::table('persell_infos')->insert($data);

        return $data;
        }/*else{
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

        DB::table('persell_infos')
            ->where('id', $id)
            ->update($data);
        return $data;
        }*/
    }

    
    public function show(Marchant $marchant)
    {
        //
    }

    public function edit(Marchant $marchant)
    {
        //
    }

    
    public function update(Request $request, Marchant $marchant)
    {
        //
    }

   
    public function destroy(Marchant $marchant)
    {
        //
    }

    public function getMarchantAllParsellInfo()
    {
        $user_id = Session::get('user_id');
        $parsellinfoMarchant=DB::select("SELECT * FROM persell_infos WHERE create_by = '$user_id';");

        //print json_encode($parsellinfoMarchant);

        return Datatables::of($parsellinfoMarchant)
                ->addColumn('action', function($parsellinfoMarchant){
                    $buttton = '
                <div class="button-list">
                    
                    <a onclick="editMarchantParsellInfoData(' .$parsellinfoMarchant->id. ')" role="button" href="#" class="btn btn-info btn-sm">Edit</a>
                    
                </div>
                ';
                return $buttton;
                })
                ->rawColumns(['action'])
                ->toJson();
    }

   /*SELECT id, product_type_id, product_cate_id, user_info_id, create_by, coustomer_name, coustomer_phone, coustomer_email, customer_address, zone, area_id, cash_amount, product_price, delivery_type, weight, created_at, updated_at FROM persell_infos WHERE create_by;

   <div class="button-list">
                    <a onclick="showMarchantParsellInfoData(' .$parsellinfoMarchant->id. ')" role="button" href="#" class="btn btn-success btn-sm">View</a>
                    <a onclick="editMarchantParsellInfoData(' .$parsellinfoMarchant->id. ')" role="button" href="#" class="btn btn-info btn-sm">Edit</a>
                    <a onclick="deleteMarchantParsellInfoData(' .$parsellinfoMarchant->id. ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>*/
}
