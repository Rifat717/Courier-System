<?php

namespace App\Http\Controllers;

use App\Product_category;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class ProductCategoryController extends Controller
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
        return view ('dashboard.product_category');
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        $id = $request['id'];
        
        if ($request->id=="") {
            $data=array();
            $data['product_category_name']=$request->product_category_name;

            DB::table('product_categories')->insert($data);
        
        return $data;
        }/*else{
        $data=array();
        $data['user_type_name']=$request->user_type_name;
        $data['status']=$request->status;

        DB::table('user_types')
            ->where('id', $id)
            ->update($data);
        return $data;
        }*/
    }

    
    public function show($id)
    {
        $Product_cate = Product_category::find($id);
        return $Product_cate;
    }

    
    public function edit($id)
    {
        $Product_cate = Product_category::find($id);
        return $Product_cate;
    }

    
    public function update(Request $request, Product_category $product_category)
    {
        //
    }

    
    public function destroy($id)
    {
        DB::table('product_categories')
            ->where('id', $id)
            ->delete();
    }

    public function getAllProductCategory()
    {
        $productcate=DB::table('product_categories')->get();

        return Datatables::of($productcate)
                ->addColumn('action', function($productcate){
                    $buttton = '
                <div class="button-list">
                    <a onclick="showProductCateData(' .$productcate->id. ')" role="button" href="#" class="btn btn-success btn-sm">View</a>
                    <a onclick="editProductCateData(' .$productcate->id. ')" role="button" href="#" class="btn btn-info btn-sm">Edit</a>
                    <a onclick="deleteProductCateData(' .$productcate->id. ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
                })
                ->rawColumns(['action'])
                ->toJson();
    }
}
