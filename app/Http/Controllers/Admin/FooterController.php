<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use view;
use App\Model\BdtdcFooterModel;
use App\Http\Requests\ValidationController;
use App\Model\BdtdcCustomerGroup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Model\BdtdcCategory;
use DB;
use Input;
use App\Model\BdtdcSupplierProduct;
use App\Model\BdtdcSupplier;
use App\Model\BdtdcCustomer;
use Sentinel;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $footer_categories=BdtdcFooterModel::where('parent_id',0)
                                            ->get();
        return View::make('protected.admin.layouts.footer-add',['footer_categories'=>$footer_categories]);
        //return View::Footer('protected.admin.layouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $r)
    {
        //
       // return 123;

        $input = $r->only('name','footer_categories','status');

        $insert_data = array(
                'category_name' => $input['name'],
                'parent_id' => $input['footer_categories'],
                'status' => $input['status'],
                
            ); 
        //dd($insert_data);
        $bdtdc = DB::table('bdtdc_footers')->insert($insert_data);
        if($bdtdc)
        {
            return redirect::back();
        }
        //INSERT into bdtdc_footers(`id`,`category_name`,`parent_id`,`slug`,`status`)VALUES('1','footer2','0','slug','inserted successfully');

        dd($input);

        //return 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    
}
