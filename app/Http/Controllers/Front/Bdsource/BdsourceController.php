<?php

namespace App\Http\Controllers\Front\Bdsource;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\BdtdcCategory;
use DB;
use Input;
use View;
use App\Model\BdtdcProductToCategory;
use Sentinel;
use Redirect;
use App\Model\Role_user;
use App\BdtdcSupplierQuery;
use App\Model\BdtdcSupplierInquery;
use App\Model\bdtdcInqueryDocs;
use App\Model\BdtdcPageSeo;
use Jenssegers\Agent\Agent;
use App\Model\BdtdcPage;
use App\Model\BdtdcFooterModel;


class BdsourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $header=BdtdcPageSeo::where('page_id',104)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;

        $categorys=BdtdcSupplierInquery::with(['inq_products_category'=>function($q){
                                        $q->groupBy('category_id')->get();
                                    },'inq_products_category.bdtdcCategory'])->get();
                                // dd($categorys);
        
        
        $quotations =BdtdcSupplierInquery::with(['inq_products_category'=>function($q){
                $q->groupBy('category_id')->get();
                },'bdtdc_product','inq_unit_id','p_price','inq_products_image','inq_products_images','inq_products_description'])
                  ->groupBy('product_id')
                  ->paginate(31);

        // dd($quotations);
        $agent = new Agent();
         // return view::make('mobile-view.content-view-mobile.bdsource-for-buyer',$data,['parent_category'=>$parent_category,'quotations'=>$quotations]);
        $device = $agent->device();
         //return view::make('mobile-view.content-view-mobile.bdsource-for-buyer',$data,['categorys'=>$categorys,'parent_category'=>$parent_category,'quotations'=>$quotations]);
         
        if($agent->isPhone())
        {
          $parent_category = BdtdcCategory::where('parent_id',0)->get();
            return view::make('mobile-view.content-view-mobile.bdsource-for-buyer',$data,['categorys'=>$categorys,
              'parent_category'=>$parent_category,'quotations'=>$quotations]);
        }
        if($agent->isDestop())
        {
            return View::make('Bdsource.home',$data,['categorys'=>$categorys,'quotations'=>$quotations]);
        }

        if($agent->isTab())
        {
            return View::make('Bdsource.home',$data,['categorys'=>$categorys,'quotations'=>$quotations]);
        }
        else{
          
           return View::make('Bdsource.home',$data,['categorys'=>$categorys,'quotations'=>$quotations]);
        }
        
    }

    public function bdtdc_sourcing($category_id = null)
    {
      $categorys=BdtdcSupplierInquery::with(['inq_products_category'=>function($q){
                                        $q->groupBy('category_id')->get();
                                    },'inq_products_category.bdtdcCategory'])->where('is_RFQ',1)->get();
       
        $source=BdtdcSupplierInquery::with(['inq_products_category'=>function($q){
                                        $q->groupBy('category_id')->get();
                                    },'bdtdc_product.product_name','sender_company.country','inq_unit_id','inq_products_image','inq_products_images','inq_docs_one'])
                                                                            ->where('is_RFQ',1)
                                                                            ->orderBy('id','desc')
                                                                             ->paginate(15);
                           // return $categorys;
                                                                            // dd($source);

          $header=BdtdcPageSeo::where('page_id',2)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;

      // dd(bdtdcInqueryDocs::take(2)->orderBy('id','desc')->get());

        return view('fontend.buyer.bdtdc_sourcing',$data,compact('categorys','source'));
    }
     public function bdtdc_product_gallery()
    {
       return view('fontend.buyer.product-gallery-bdtdc');
    }
   public function megaMarch_sourcing_consumer()
    {
       return view('fontend.buyer.sourcing-consumer');
    }
    public function bdtdc_sourcing_details($id)
    {
        $key = '';
        $categoryid = 0;
        $countryid = 0;
        $rfq = false;
        $posted = 0;
        $quantity_form = 0;
        $quantity_to = 0;

        if(preg_match('/^\d+$/',$id)) {
          $categoryid = $id;
        } else {
          $search_array = explode('+..+', $id);
          $key = explode('==',$search_array[0])[1];
          $categoryid = explode('==',$search_array[1])[1];
          $countryid = explode('==',$search_array[2])[1];
          $rfq = explode('==',$search_array[3])[1];
          $posted = explode('==',$search_array[4])[1];
          $quantity_form = explode('==',$search_array[5])[1];
          $quantity_to = explode('==',$search_array[6])[1];
        }

        $categorys=DB::table('bdtdc_supllier_inqueries as inq')
                                ->join('bdtdc_product_to_category as pc','pc.product_id','=','inq.product_id')
                                ->join('bdtdc_category as c','c.id','=','pc.category_id')
                                ->groupBy('c.id')
                                ->where('is_RFQ',1)
                                ->get(['c.name as cat_name','c.id as cat_id']);
        $source=BdtdcSupplierInquery::with(['inq_products_category','bdtdc_product','inq_unit_id','inq_products_image'])
                                        ->whereHas('inq_products_category',function($q) use($categoryid){
                                            $q->where('category_id',$categoryid);
                                        })
                                                ->where('is_RFQ',1)
                                                ->paginate();
                                                //dd($source);

         
         if($source){
        return view('fontend.buyer.bdtdc_sourcing_details',compact('categorys','source'));

        }
        else{
            return Redirect::back();
        }
    }
    
    
    
}
