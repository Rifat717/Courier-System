<?php

namespace App\Http\Controllers;

use App\Product_type;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class ProductTypeController extends Controller
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
       return view('dashboard.product_type');
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
            $data['product_type_name']=$request->product_type_name;

            DB::table('product_types')->insert($data);
        
        return $data;
        }else{
        $data=array();
        $data['product_type_name']=$request->product_type_name;

        DB::table('product_types')
            ->where('id', $id)
            ->update($data);
        return $data;
        }
    }

    
    public function show($id)
    {
        $Product_type = Product_type::find($id);
        return $Product_type;
    }

    
    public function edit($id)
    {
        $Product_type = Product_type::find($id);
        return $Product_type;
    }

    
    public function update(Request $request, Product_type $product_type)
    {
        //
    }

    
    public function destroy($id)
    {
        DB::table('product_types')
            ->where('id', $id)
            ->delete();
    }

     public function getAllProductType()
    {
        $producttype=DB::table('product_types')->get();

        return Datatables::of($producttype)
                ->addColumn('action', function($producttype){
                    $buttton = '
                <div class="button-list">
                    <a onclick="showProductTypeData(' .$producttype->id. ')" role="button" href="#" class="btn btn-success btn-sm">View</a>
                    <a onclick="editProductTypeData(' .$producttype->id. ')" role="button" href="#" class="btn btn-info btn-sm">Edit</a>
                    <a onclick="deleteProductTypeData(' .$producttype->id. ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
                })
                ->rawColumns(['action'])
                ->toJson();
    }
}
