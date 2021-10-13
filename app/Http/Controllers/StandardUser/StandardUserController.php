<?php

namespace App\Http\Controllers\StandardUser;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sentinel;
use App\Model\Role_user;
use App\Model\BdtdcCompany;
use DB;
use App\Model\BdtdcCompanyMainMarket;
use App\Model\BdtdcCompanyDeliveryTerm;
use App\Model\BdtdcTradeInfo;
use App\BdtdcTradeJoinInfo;
use App\Model\BdtdcFactoryInfo;
use App\BdtdcCompanyImage;
use App\Model\BdtdcCompanyCertificate;
use App\Model\BdtdcCompanyAwardCertification;
use App\Model\BdtdcCompanyPatent;
use App\Model\BdtdcCompanyTrademark;

class StandardUserController extends Controller
{
    public function getHome()
    {
        return view('protected.standardUser.user_dashboard');
    }

    public function getUserProtected()
    {
        return view('protected.standardUser.userPage');
    }
    
    public function get_tab_content($page){
        
        $user_id = Sentinel::getUser()->id;
        $role = Role_user::where('user_id',$user_id)->first();
        $company = BdtdcCompany::where('user_id',$user_id)->first(['id']);
        $company_id = $company->id;

        if($role->role_id == 3){
            $supplier = \DB::table('bdtdc_suppliers as bs')
                ->join('users as u','u.id','=','bs.user_id')
                ->join('bdtdc_companies as bc','bc.user_id','=','bs.user_id')
                ->join('bdtdc_customer as bcu','bcu.user_id','=','bs.user_id')
                ->join('bdtdc_company_descriptions as bcd','bcd.company_id','=','bc.id')
                ->where('bs.user_id',$user_id)
                ->first();   
        }
        else if($role->role_id == 4){
            $supplier = \DB::table('users as u')
                ->join('bdtdc_customer as bcu','bcu.user_id','=','u.id')
                ->join('bdtdc_companies as bc','bc.user_id','=','u.id')
                ->join('bdtdc_company_descriptions as bcd','bcd.company_id','=','bc.id')
                ->where('u.id',$user_id)
                ->first();
        }
        
//        return $supplier->company_logo;
        
        $market_distribution = BdtdcCompanyMainMarket::where('company_id',$company_id)->get(['id','company_id','main_market_zone','distribution_value']);
        $prev_trade_info = BdtdcTradeInfo::where('company_id',$company_id)->first();
        $prev_trade_join_info = BdtdcTradeJoinInfo::where('company_id',$company_id)->first();
        $pre_company_info = BdtdcCompany::where('id',$company_id)->first();
        $pre_factory_info = BdtdcFactoryInfo::where('company_id',$company_id)->first();
        $pre_company_photo = BdtdcCompanyImage::where('company_id',$company_id)->get();
        $pre_certification = BdtdcCompanyCertificate::where('company_id',$company_id)->first();
        $pre_aword          = BdtdcCompanyAwardCertification::where('company_id',$company_id)->first();
        $pre_patent          = BdtdcCompanyPatent::where('company_id',$company_id)->first();
        $pre_trademarks     = BdtdcCompanyTrademark::where('company_id',$company_id)->first();
        return view('fontend.buyer_supplier.'.$page,compact(['company','company_id','supplier','market_distribution','prev_trade_info','pre_company_info','prev_trade_join_info','pre_factory_info','pre_company_photo','pre_certification','pre_aword','pre_patent','pre_trademarks']));
        
    }
    
}
