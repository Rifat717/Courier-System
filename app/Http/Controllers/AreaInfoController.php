<?php

namespace App\Http\Controllers;

use App\Area_info;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use Session;
session_start();
use Illuminate\Support\Facades\Redirect;

class AreaInfoController extends Controller
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
        return view('dashboard.area_info');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request['id'];
        
        if ($request->id=="") {
            $data=array();
            $data['area_name']=$request->area_name;
            $data['status']=$request->status;

            DB::table('area_infos')->insert($data);
        
        return $data;
        }else{
        $data=array();
        $data['area_name']=$request->area_name;
        $data['status']=$request->status;

        DB::table('area_infos')
            ->where('id', $id)
            ->update($data);
        return $data;
        }
    }

    
    public function show($id)
    {
        $Area_info = Area_info::find($id);
        return $Area_info;
    }

   
    public function edit($id)
    {
        $Area_info = Area_info::find($id);
        return $Area_info;
    }

    
    public function update(Request $request, Area_info $area_info)
    {
        //
    }

    
    public function destroy($id)
    {
        DB::table('area_infos')
            ->where('id', $id)
            ->delete();
    }

    public function getAllAreaInfo()
    {
        $areainfo=DB::table('area_infos')->get();

        return Datatables::of($areainfo)
                ->addColumn('action', function($areainfo){
                    $buttton = '
                <div class="button-list">
                    <a onclick="showAreaInfoData(' .$areainfo->id. ')" role="button" href="#" class="btn btn-success btn-sm">View</a>
                    <a onclick="editAreaInfoData(' .$areainfo->id. ')" role="button" href="#" class="btn btn-info btn-sm">Edit</a>
                    <a onclick="deleteAreaInfoData(' .$areainfo->id. ')" role="button" href="#" class="btn btn-danger btn-sm">Delete</a>
                </div>
                ';
                return $buttton;
                })
                ->rawColumns(['action'])
                ->toJson();
    }
}
