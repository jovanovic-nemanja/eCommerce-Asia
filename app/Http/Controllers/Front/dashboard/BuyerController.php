<?php

namespace App\Http\Controllers\Front\dashboard;

use App\BdtdcInqueryFlag;
use App\BdtdcInquerySpam;
use App\BdtdcInqueryTrush;
use App\BdtdcJoinQuotation;
use App\BdtdcSupplierQuery;
use App\Country;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ValidationController;
use App\Language;
use App\Model\BdtdcAttribute;
use App\Model\BdtdcCompany;
use App\Model\BdtdcCompanyDescription;
use App\Model\BdtdcProduct;
use App\Model\BdtdcProductAttribute;
use App\Model\BdtdcProductUnit;
use App\Model\BdtdcSupplierMainProduct;
use App\Model\BdtdcSupplierProduct;
use App\SupplierProductGroup;
use App\Model\User;
use Illuminate\Http\Request;
use App\Model\BdtdcCompanyMainMarket;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Model\BdtdcCategory;
use App\Model\BdtdcProductPrice;
use App\Model\Notice;
use App\Model\BdtdcWholesaleCategory;

use Input;
use View;
use Sentinel;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcSupplier;
use App\Model\Role_user;
use App\Model\BdtdcProductImage;
use App\Model\BdtdcProductImageNew;
use App\Model\BdtdcCustomer;
use App\Model\BdtdcPageSeo;


class BuyerController extends Controller
{
    
   

   public function index($section=false){


        if(Sentinel::check())
        {
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $role = Role_user::where('user_id',$user_id)->first();
        // dd($company);
        // dd(BdtdcCompanyDescription::where('company_id',$company->id)->first());
        if($role->role_id == 4){
            // dd(123);
            if($section == 'product'){
                $data['error']='Permission deney';
                return View::make('error.bdtdc-agencies',$data);
            }
        }
        if($company){
            $company_id=$company->id;
        }else{
            $company_id = BdtdcCompany::insertGetId(['user_id'=>$user_id]);
            BdtdcCompanyDescription::insert(['company_id'=>$company_id,'name'=>'not available']);
        }

        if(BdtdcCompanyDescription::where('company_id',$company_id)->first()){}else{
            BdtdcCompanyDescription::insert(['company_id'=>$company_id,'name'=>'Not Available']);
        }

        if(BdtdcSupplier::where('company_id',$company_id)->first()){}else{
            if($role->role_id == 4){
                BdtdcSupplier::insert(['user_id'=>$user_id,'company_id'=>$company_id,'busines_type_id'=>5]);
            }else if($role->role_id == 3){
                BdtdcSupplier::insert(['user_id'=>$user_id,'company_id'=>$company_id,'busines_type_id'=>1]);
            }
        }
        if(BdtdcCustomer::where('company_id',$company_id)->first()){}else{
            if($role->role_id == 4){
                BdtdcCustomer::insert(['user_id'=>$user_id,'company_id'=>$company_id,'customer_group_id'=>2]);
            }else if($role->role_id == 3){
                BdtdcCustomer::insert(['user_id'=>$user_id,'company_id'=>$company_id,'customer_group_id'=>1]);
            }
        }
        
        //dd($user_id);
        if($role->role_id == 3){
            $supplier = DB::table('bdtdc_suppliers as bs')
                ->join('users as u','u.id','=','bs.user_id')
                ->join('bdtdc_companies as bc','bc.user_id','=','bs.user_id')
                ->join('bdtdc_customer as bcu','bcu.user_id','=','bs.user_id')
                ->join('bdtdc_company_descriptions as bcd','bcd.company_id','=','bc.id')
                ->where('bs.user_id',$user_id)
                ->first();   
        }
        else if($role->role_id == 4){
            $supplier = DB::table('users as u')
                ->join('bdtdc_customer as bcu','bcu.user_id','=','u.id')
                ->join('bdtdc_companies as bc','bc.user_id','=','u.id')
                ->join('bdtdc_company_descriptions as bcd','bcd.company_id','=','bc.id')
                ->where('u.id',$user_id)
                ->first();
        }
        /*$supplier_product = DB::table('users as u')
            ->join('bdtdc_supplier_products as sp','sp.supplier_id','=','u.id')
            ->join('bdtdc_product as p','p.id','=','sp.product_id')
            ->join('bdtdc_product_description as pd','pd.product_id','=','p.id')
            ->join('bdtdc_product_to_category as pc','pc.product_id','=','p.id')
            ->join('bdtdc_category as c','c.id','=','pc.category_id')
            ->where('u.id',$user_id)
            ->get(['p.id','pd.name','p.model','p.brandname','c.name as category','sp.product_status']);*/
        $supplier_product = BdtdcProductToCategory::whereHas('supp_pro_company',function($subQuery)use($user_id){
                    $subQuery->where('user_id',$user_id);
                })
                ->orderBy('product_id','asc')
                ->get();
        
        
        $message = $this->get_all_inquiries();
        $template_setting_section = DB::table('bdtdc_template_sections')->get();
        $template_setting_data = DB::table('bdtdc_template_settings as bts')
                ->join('bdtdc_template_sections as btsec','btsec.id','=','bts.section_id')
                ->where('bts.company_id',$company_id)
                ->get(['bts.id','bts.section_id','bts.back_image','bts.title_logo','bts.back_color','bts.font_color','bts.is_show_image','bts.is_show_color','bts.height','bts.width','bts.company_id','btsec.section_name','btsec.slug']);
        $header=BdtdcPageSeo::where('page_id',101)->first();
                $data['title']=$header->title;
                $data['keyword']=$header->meta_keyword;
                $data['description']=$header->meta_description;
        //For notice details
        $notices = Notice::paginate(10);
        //dd($template_setting_data);
        //return $message;
                //$users=User::where('id',$user_id)->first();
        return View::make('fontend.supplier.dashboard',$data,compact(['supplier','supplier_product','message','template_setting_data','section','template_setting_section','notices']));

         }
         else
            return Redirect::to('/');
    }
 

    public function get_all_inquiries(){
        if(Sentinel::getUser()){
        }else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }
        $user_id = Sentinel::getUser()->id;
        return DB::select(DB::raw('
            SELECT result_set.*,pd.name as product_name,u.first_name,u.last_name,su.first_name as sender_first_name,su.last_name as sender_last_name
            FROM(
                SELECT bdtdc_join_quotation.product_id, bdtdc_join_quotation.product_owner_id,
                        bdtdc_join_quotation.sender,bdtdc_join_quotation.id as id,
                        bdtdc_join_quotation.is_join_quotation,
                        bdtdc_join_quotation.created_at,
                        bdtdc_join_quotation.message,
                        bdtdc_join_quotation.spam, bdtdc_join_quotation.flag, bdtdc_join_quotation.trush

                FROM bdtdc_join_quotation
                WHERE (bdtdc_join_quotation.product_owner_id='.$user_id.' OR bdtdc_join_quotation.sender='.$user_id.')
                        
                UNION
                SELECT bdtdc_supllier_inqueries.product_id,bdtdc_supllier_inqueries.product_owner_id,
                        bdtdc_supllier_inqueries.sender,bdtdc_supllier_inqueries.id as id,
                        bdtdc_supllier_inqueries.is_join_quotation,
                        bdtdc_supllier_inqueries.created_at,
                        bdtdc_supllier_inqueries.message,
                        bdtdc_supllier_inqueries.spam, bdtdc_supllier_inqueries.flag, bdtdc_supllier_inqueries.trush
                FROM bdtdc_supllier_inqueries
                WHERE (bdtdc_supllier_inqueries.product_owner_id='.$user_id.'  OR bdtdc_supllier_inqueries.sender='.$user_id.')
                        
            ) as result_set
            LEFT JOIN bdtdc_product_description as pd ON pd.product_id=result_set.product_id
            JOIN users as u ON u.id=result_set.product_owner_id
            JOIN users as su ON su.id=result_set.sender
            ORDER BY result_set.created_at DESC
        '));
    }

     public function rander_dashboard_section($section){
        return $this->index($section);
    }
    
}
