<?php

namespace App\Http\Controllers\MobileView;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\BdtdcCategory;
use DB;
use Input;
use View;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcSupplierProduct;
use Sentinel;
use Redirect;
use App\Model\Role_user;
use App\Model\BdtdcCountry;
use App\BdtdcSupplierQuery;
use App\Model\BdtdcCustomerActivity;
use App\Model\BdtdcSupplierInquery;
use App\Model\bdtdcInqueryDocs;
use App\Model\BdtdcPageSeo;
use App\Model\BdtdcSupplierInfo;
use App\Model\BdtdcCompany;
use App\Model\BdtdcWholesaleCategory;
use App\Model\BdtdcProductToWholesaleCategory;

class MobileViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }
    public function inquire_response()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.content-view-mobile.inquire-reaply',$data);
    }

    public function live_country()
    {
         return view::make('mobile-view.content-view-mobile.live_country');
    }
    public function post_buying_request()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.content-view-mobile.post-buying-request',$data);
    }
     public function product_sourceing()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.category.bdsource-view',$data);
    }
     public function cool_technology()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.category.cool-technology',$data);
    }
    public function warehouse_product()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.category.warehouse-product',$data);
    }
    public function Feedback_center()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.admin-panel.help-center',$data);
    }
    public function buying_request()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.admin-panel.buying-request',$data);
    }
    public function inquiries_msg()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.admin-panel.inquiries-message',$data);
    }
    public function messanger_chat()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.admin-panel.messanger',$data);
    }
    public function buyer_preference()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.category.buyer-preference-product',$data);
    }
    public function quality_supplier()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        $quality_supplier=BdtdcSupplierInfo::with('name_string'
            ,'product_to_category','company','business_supplier','product_category')
                        ->paginate(10);
        //$selected_supplier=BdtdcCompany::with('company_description','location_of_reg_string','supplier')->take(5)->get();
        $selected_supplier=BdtdcProductToCategory::with('bdtdcCategory','cat_country','pro_parent_cat')
                        ->groupBy('parent_id')
                        ->get();
        //dd($selected_supplier);
        //$selected_supplier = BdtdcCompany::query();

        //if($country){
        //$selected_supplier->whereHas('name_string', function($offerQuery) use ($country){
        //             $offerQuery->where('location_of_reg', '=', $country);
                
        //     });
        // }
        //dd($selected_supplier);
        $company=DB::table('bdtdc_country')->get();
        // dd($company);
        return view::make('mobile-view.content-view-mobile.quality-supplier',$data,compact('quality_supplier','selected_supplier'));
    }
    public function indiv_country_product($category_id,$country_id)
    {
        // dd($category_id);
        // dd($country_id);
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        $category_supplier=BdtdcProductToCategory::
            with(['supplier_info'=>function($q){
                    // $q->where('payment',1)
                    // ->get();
            }])
          
            ->where('parent_id',$category_id)
            ->where('country_id',$country_id)
            ->groupBy('company_id')
            ->paginate(10);

            // ->take(10)
            // ->get();
            // dd($category_supplier);
       
        return view::make('mobile-view.country-product.country-city-product',$data,compact('category_supplier'));
    }
    public function product_category()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        $all_category=BdtdcCategory::with('parent_cat')->where('parent_id',0)->get();
        // dd($all_category);
        return view::make('mobile-view.category.category-view',$data,compact('all_category'));
    }
    public function product_by_region()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.country-product.product-of-country',$data);
    }
    public function bdsource_buyer()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.content-view-mobile.bdsource-for-buyer',$data);
    }
    public function bdsource_product()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.content-view-mobile.bdsource-product',$data);
    }
    public function wholesale_product()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.content-view-mobile.wholesale-product',$data);
    }
    public function selected_country_supplier()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.country-product.select-country',$data);
    }
     public function product_of_month()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.content-view-mobile.product-of-month',$data);
    }
     public function company_info()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.content-view-mobile.company_profile_m',$data);
    }
    public function contact_supp()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('mobile-view.content-view-mobile.contact_supplier',$data);
    }
    public function wholesale_subcategory($name,$id)
    {
        $sub_category=BdtdcWholesaleCategory::with('parent_cat')->where('id',$id)->first();
        // dd($sub_category);
        return view::make('mobile-view.content-view-mobile.wholesale_subcategory',compact('sub_category'));
    }
    public function sub_category($name, $id)
    {
        // return $id;
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;

        //$parent_category = BdtdcCategory::where('parent_id',$id)->orderByRaw("RAND()")->get();
        //dd($parent_category);
        $sub_category=BdtdcCategory::with('parent_cat')->where('id',$id)->first();
         // dd($sub_category);
        // return $sub_category->parent_cat;
        return view::make('mobile-view.category.product-category',$data,compact('sub_category'));
    }
    public function sub_category_pro_view($id)
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        $product=BdtdcProductToCategory::with('bdtdcProduct','bdtdcCategory','pro_to_cat_name','cat_pro_price')->where('category_id',$id)->paginate(10);
        // return $product->cat_pro_price;
        return view::make('mobile-view.category.product-category-view',$data,compact('product'));
    }
    public function wholesale_sub_category_pro_view($id)
    {
        $wholesale_product=BdtdcProductToWholesaleCategory::with('bdtdcProduct','bdtdcCategory','category_product_name','cat_pro_price')->where('category_id',$id)->paginate(10);
        // return $product->cat_pro_price;
        return view::make('mobile-view.content-view-mobile.wholesale-product-category-view',compact('wholesale_product'));
    }
    public function my_favorite()
    {
        if(Sentinel::check())
        {
            $user_id =Sentinel::getUser()->id;
            $favorite_product=BdtdcCustomerActivity::with('bdtdc_product','bdtdc_product_category')
                            ->where('customer_id',$user_id)->get();
        // dd($favorite_product);
        // $country=BdtdcCountry::take(10)->get();
        // dd($country);
       /* $sp=DB::table('bdtdc_suppliers_info')->take(10)->get();
        dd($sp);
    */
            return view::make('mobile-view.content-view-mobile.my_favorite',compact('favorite_product'));
        }
        else{
            return redirect()->route('login')->withFlashMessage('You must first login or register before accessing this page.');
        }

    }
 public function company_profile(){
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
      return view::make('mobile-view.country-product.company-home',$data);
 }
 public function company_profile_product(){
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
      return view::make('mobile-view.country-product.product-template',$data);
 }
 public function company_profile_info(){
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
      return view::make('mobile-view.country-product.company-profile',$data);
 }
 public function company_contact(){
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
       return view::make('mobile-view.country-product.company-contact-profile',$data);
 }
  
       
}
