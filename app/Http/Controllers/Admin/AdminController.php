<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Model\BdtdcSupplierQuery;
use App\Model\Module;

class AdminController extends Controller
{
	public function __construct()
    {
        ini_set('memory_limit', '9999999M');
    }

    public function getHome()
    {
        $content = 'User Management';
        $contentdetail = Module::where('name','User Management')->get();
        return view('protected.admin.admin_dashboard',compact('content','contentdetail'));
    }
    public function getcontent($content)
    {
        $contentdetail = Module::where('name',$content)->get();
        session()->put('content', $content);
        return view('protected.admin.admin_dashboard',compact('content','contentdetail'));
    }
    public function ManageBuyingRequest(){
    	$data['bdtdc_supllier_inqueries_all']=BdtdcSupplierQuery::with(['BdtdcSupplierQueryProduct','BdtdcSupplierQueryProductImage','BdtdcSupplierQueryProductUnit','BdtdcInqueryMessage'])->where('is_RFQ',1)->orderBy('id','desc')->get();

    	return view('protected.admin.myB2B.buying-request',$data);
    }
}
