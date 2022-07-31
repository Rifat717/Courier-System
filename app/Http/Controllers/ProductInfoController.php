<?php

namespace App\Http\Controllers;

use App\Product_info;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class ProductInfoController extends Controller
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
        return view ('dashboard.product_info');
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
            $data['product_category_id']=$request->product_category_id;
            $data['product_name']=$request->product_name;
            $data['product_short_desc']=$request->product_short_desc;
            $data['product_desc']=$request->product_desc;
            $data['status']=$request->status;

            DB::table('product_infos')->insert($data);
        
        return $data;
        }else{
        $data=array();
        $data['product_type_id']=$request->product_type_id;
        $data['product_category_id']=$request->product_category_id;
        $data['product_name']=$request->product_name;
        $data['product_short_desc']=$request->product_short_desc;
        $data['product_desc']=$request->product_desc;
        $data['status']=$request->status;

        DB::table('product_infos')
            ->where('id', $id)
            ->update($data);
        return $data;
        }
    }

    
    public function show($id)
    {
        $Product_info = Product_info::find($id);
        return $Product_info;
    }

    
    public function edit($id)
    {
        $Product_info = Product_info::find($id);
        return $Product_info;
    }

    
    public function update(Request $request, Product_info $product_info)
    {
        //
    }

    
    public function destroy($id)
    {
        DB::table('product_infos')
            ->where('id', $id)
            ->delete();
    }


     public function getAllProductInfo()
    {
        $productinfo=DB::select('SELECT PI.id, PT.product_type_name, PC.product_category_name, product_name, product_short_desc, product_desc, status, PI.created_at, PI.updated_at FROM product_infos PI, product_types PT, product_categories PC WHERE PI.product_type_id = PT.id AND PI.product_category_id = PC.id;');

        return Datatables::of($productinfo)
                ->addColumn('action', function($productinfo){
                    $buttton = '
                <div class="button-list">
                    <a onclick="showProductInfoData(' .$productinfo->id. ')" role="button" href="#" class="btn btn-success btn-sm">View</a>
                    <a onclick="editProductInfoData(' .$productinfo->id. ')" role="button" href="#" class="btn btn-info btn-sm">Edit</a>
                    <a onclick="deleteProductInfoData(' .$productinfo->id. ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
                })
                ->rawColumns(['action'])
                ->toJson();
    }
}
