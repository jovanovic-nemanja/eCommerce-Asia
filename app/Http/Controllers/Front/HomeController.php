<?php

namespace App\Http\Controllers\Front;
use App\Model\BdtdcProductDescription;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationController;
use App\Model\BdtdcBusinesType;
use App\Model\BdtdcCountry;
use App\Model\BdtdcCustomerGroup;
use Illuminate\Http\Request;
use DB;
use App\Model\BdtdcProduct;
use view;
use Sentinel;
use Redirect;
use App\Model\BdtdcProductPrice;
use App\Model\BdtdcLimitedTimeOffer;
use App\Model\BdtdcPageSeo;
use App\Model\BdtdcTradeQuestions;
use App\Model\BdtdcSupplierProductGroups;
use App\Model\BdtdcCompany;
use Jenssegers\Agent\Agent;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcMostViewCategory;
use App\Model\BdtdcCategory;
use App\Model\BdtdcHomeProduct;
use App\Model\BdtdcSupplierInquery; 
use App\Model\BdtdcPage;
use App\Model\BDtdcFooterModel;
use App\Model\BdtdcNotification;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public $restful=true;



    public function getHome()
    {
        $data['source'] = BdtdcSupplierInquery::with(['sender_company','sender_company.country','bdtdc_product','bdtdc_product.product_name','inq_docs_one','inq_products_category','inq_products_category.pro_parent_cat','inq_products_category.bdtdcCategory','inq_products_category.bdtdcCategory','bdtdc_product','inq_unit_id','inq_products_image','inq_products_images','home_inquiry'])
            ->where('is_RFQ',1)
            ->orderBy('id','DESC')
            ->where('active',1)
            ->take(15)->get();

           
        $data['products'] = BdtdcHomeProduct::with(['bdtdcProduct','bdtdcProduct.product_image_new','bdtdcProduct.product_name','bdtdcProduct.product_prices','bdtdcProduct.ProductUnit'])
            ->where('whole_sale',1)
            ->orderBy('sort','asc')->take(15)->get();

        $data['product_homes'] = BdtdcHomeProduct::with(['bdtdcProduct','bdtdcProduct.product_image_new','bdtdcProduct.product_name','bdtdcProduct.product_prices','bdtdcProduct.ProductUnit'])->where('hot_product',1)->orderBy('sort','asc')->take(15)->get();
            

        $data['product_bangladesh'] = BdtdcHomeProduct::with(['bdtdcProduct','bdtdcProduct.product_image_new','bdtdcProduct.product_name'])
                ->where('bangladesh_products',1)
                ->orderBy('sort','asc')->take(15)->get();


        $data['country']=BdtdcCountry::where('status',0)->take(6)->get();

        $data['toplink']=BdtdcCategory::where('top',0)->take(8)->get();           

        
        
        $homepage="home";      
         
        $header=BdtdcPageSeo::where('page_id',1)->first();

        if($header) {
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
            $data['pages_id']=101;
        }

        $agent = new Agent();        
        $device = $agent->device();
        if($agent->isPhone()) {
            $data['parent_categorys'] = BdtdcCategory::with('parent_cat_pro')
                                    ->whereHas('parent_cat',function($q){})                        
                                    ->where('parent_id',0)->orderByRaw("RAND()")->take(3)->get();

            $most_view=BdtdcMostViewCategory::with('bdtdcMostViewCategory','proimage','proimage_new','most_product','cat_name','parent_cat')
                ->take(70)->get();
            dd($most_view);  
            $businessTypes = DB::select('select * from bdtdc_busines_types');

            foreach($businessTypes as $type){
                $business[$type->id]=$type->name;
            }

            $customer_group = BdtdcCustomerGroup::get(['id','name']);
            $countries = BdtdcCountry::get(['name','id']);

            return view('mobile-view.bdtdc-home',compact(['countries','business','homepage','most_view']), $data);
        }

        if($agent->isDestop())
        {
            return view('fontend.index',compact(['countries','business','homepage']),$data);
        }

        if($agent->isTab())
        {
           return view('fontend.index',compact(['countries','business','homepage']),$data);
        }
        else{
           return view('fontend.index',compact(['homepage']),$data);
        }

    }

}