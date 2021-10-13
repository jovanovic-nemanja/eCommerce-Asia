<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use view;
use Input;
use App\Model\BdtdcCountry;
use App\Model\BdtdcCompany;
use App\Model\BdtdcProduct;
use App\Model\BdtdcProductDescription;
use App\Model\BdtdcCategory;
use App\Model\BdtdcCategoryDescription;
use Jenssegers\Agent\Agent;

class filterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        ini_set('memory_limit', '9999999M');
    }
    
    public function index()
    {
        //
    }

    public function data_filter(Request $r, $name, $type){
        
        $search = $type;
        $key = $r->k;
        $str_ignore = $r->ig;
        $country = $r->c;
        $buyer_protection = $r->bp;
        $gold_supplier = $r->gs;
        $assessed_supplier = $r->as;
        $filter_by_main_market = $r->fm;
        $filter_by_total_revanue = $r->ftr;
        $filter_by_employe = $r->fe;
        $origin = $r->o;
        $category = $r->ca;
        $business_type = $r->bt;
        $search_str = $key;
        $name = trim($name).'-'.trim($type);

        if($search == "products" || $search == "products")
        {
            $searched_on = 'products';
            $products = $this->search_product($key,$country,$buyer_protection,$gold_supplier,$assessed_supplier,$filter_by_main_market,$filter_by_total_revanue,$filter_by_employe,$origin,$category,$str_ignore);
            $main_market_status = $this->main_market_status();
            $revanue = $this->revanue();
            $total_employe = $this->total_employe();
            $country_data=BdtdcCountry::with('country_region')->where('region_id',1)->get();
            $bdtdc_country_list=DB::table('bdtdc_country')->where('region_id','!=',1)->get();

            $country_name_bd=BdtdcCountry::with('country_region')->where('id',$country)->first();
            $cname = '';
            if($country_name_bd){
                $country_name_title = $country_name_bd->name;
                $cname = $country_name_bd->name;
            }else{
                $country_name_title = "All Countrie's";
            }

            $title=$country_name_title.' Suppliers, manufacturers & exporters at BuyerSeller Example: Bangladesh Suppliers, Manufacturers & Exporters at BuyerSeller';
            $keyword='';
            $description='Find verified '.$country_name_title.' suppliers, manufacturers & exporters for quality products at BuyerSeller, the largest and reliable online sourcing platform in Bangladesh.';

            $agent = new Agent();
        
            if($agent->isMobile())

            {
             return view::make('mobile-view.content-view-mobile.search_value_details',['products' => $products->appends(Input::except('page'))],compact('products','main_market_status','revanue','total_employe','searched_on','search_str','bdtdc_country_list','country_data','country','buyer_protection','gold_supplier','assessed_supplier','filter_by_main_market','filter_by_total_revanue','filter_by_employe','origin','category','name','keyword'));
            }
            else{
              return view::make('fontend.supplier.filter_product_list',['products' => $products->appends(Input::except('page'))],compact('products','main_market_status','revanue','total_employe','searched_on','search_str','bdtdc_country_list','country_data','country','buyer_protection','gold_supplier','assessed_supplier','filter_by_main_market','filter_by_total_revanue','filter_by_employe','origin','category','name','keyword'));
            }

        }
        else if($search == "suppliers" || $search == "exporters" || $search == "manufactuers")
        {
            $searched_on = 'suppliers';
            $suppliers = $this->search_supplier($key,$country,$buyer_protection,$gold_supplier,$assessed_supplier,$filter_by_main_market,$filter_by_total_revanue,$filter_by_employe,$business_type,$str_ignore);
            $country_id = $country;
            $main_market_status = $this->main_market_status();
            $revanue = $this->revanue();
            $total_employe = $this->total_employe();
            $country_data=BdtdcCountry::with('country_region')->where('region_id',1)->get();
            $bdtdc_country_list=DB::table('bdtdc_country')->where('region_id','!=',1)->get();
            $country_name_bd=BdtdcCountry::with('country_region')->where('id',$country_id)->first();
            if($country_name_bd){
                $country_name_title = $country_name_bd->name;
            }else{
                $country_name_title = "All Countrie's";
            }
            $title=$country_name_title.' Suppliers, manufacturers & exporters at BDTDC Example: Bangladesh Suppliers, Manufacturers & Exporters at BDTDC';
            $keyword='';
            $description='Find verified '.$country_name_title.' suppliers, manufacturers & exporters for quality products at BuyerSeller, the largest and reliable online sourcing platform in Bangladesh.';

            $agent = new Agent();
            
            if($agent->isMobile()){
             return View::make('mobile-view.content-view-mobile.supplier',['suppliers'=>$suppliers->appends(Input::except('page'))],compact('main_market_status','revanue','total_employe','searched_on','search_str','bdtdc_country_list','country_data','country_id','buyer_protection','gold_supplier','assessed_supplier','filter_by_main_market','filter_by_total_revanue','filter_by_employe','business_type','title','description','name','keyword'));
            }else{
             return View::make('fontend.supplier.filter_supplier_list',['suppliers'=>$suppliers->appends(Input::except('page'))],compact('main_market_status','revanue','total_employe','searched_on','search_str','bdtdc_country_list','country_data','country_id','buyer_protection','gold_supplier','assessed_supplier','filter_by_main_market','filter_by_total_revanue','filter_by_employe','business_type','title','description','name','keyword'));
            } 


            
        }
        else
        {
            $searched_on = 'suppliers';
            $suppliers = $this->search_supplier($key,$country,$buyer_protection,$gold_supplier,$assessed_supplier,$filter_by_main_market,$filter_by_total_revanue,$filter_by_employe,$business_type,$str_ignore);
            $country_id = $country;
            $main_market_status = $this->main_market_status();
            $revanue = $this->revanue();
            $total_employe = $this->total_employe();
            $country_data=BdtdcCountry::with('country_region')->where('region_id',1)->get();
            $bdtdc_country_list=DB::table('bdtdc_country')->where('region_id','!=',1)->get();
            $country_name_bd=BdtdcCountry::with('country_region')->where('id',$country_id)->first();
            if($country_name_bd){
                $country_name_title = $country_name_bd->name;
            }else{
                $country_name_title = "All Countrie's";
            }
            $title=$country_name_title.' Suppliers, manufacturers & exporters at BuyerSeller Example: Bangladesh Suppliers, Manufacturers & Exporters at BuyerSeller';
            $description='Find verified '.$country_name_title.' suppliers, manufacturers & exporters for quality products at BuyerSeller, the largest and reliable online sourcing platform in Bangladesh.';

            $agent = new Agent();
            
            if($agent->isMobile()){
             return View::make('mobile-view.content-view-mobile.supplier',['suppliers'=>$suppliers->appends(Input::except('page'))],compact('main_market_status','revanue','total_employe','searched_on','search_str','bdtdc_country_list','country_data','country_id','buyer_protection','gold_supplier','assessed_supplier','filter_by_main_market','filter_by_total_revanue','filter_by_employe','business_type','title','description','name'));
            }else{
             return View::make('fontend.supplier.filter_supplier_list',['suppliers'=>$suppliers->appends(Input::except('page'))],compact('main_market_status','revanue','total_employe','searched_on','search_str','bdtdc_country_list','country_data','country_id','buyer_protection','gold_supplier','assessed_supplier','filter_by_main_market','filter_by_total_revanue','filter_by_employe','business_type','title','description','name'));
            } 


            
        }
    }

    public function search_filter(Request $r,$query){
        
        $search_key_array = explode('-', $query);
        $search_key = '';
        $category_key = '';
        $cid_form_string = '';
        $country_from_string = '';
        $meta_title_string = '';
        $supplier_product_meta = '';
        foreach ($search_key_array as $search_key_array_value) {
            if(trim($search_key_array_value) != ''){
                $search_key .= $search_key_array_value.' ';
                $country_form_string = BdtdcCountry::where('name',$search_key_array_value)->first();
                if($country_form_string){
                    $cid_form_string = $country_form_string->id;
                    $country_from_string = $country_form_string->name;
                }else{
                    $meta_title_string .= $search_key_array_value.' ';
                    if($r->t){
                        if($r->t == 'suppliers'){
                            if($search_key_array_value == 'supplier' || $search_key_array_value == 'suppliers' || $search_key_array_value == 'exporter' || $search_key_array_value == 'exporters' || $search_key_array_value == 'manufacturer' || $search_key_array_value == 'manufacturers' || $search_key_array_value == 'wholesaler' || $search_key_array_value == 'wholesalers'){}else{
                                $supplier_product_meta .= $search_key_array_value.' ';
                            }
                        }
                    }else{
                        if($search_key_array_value == 'supplier' || $search_key_array_value == 'suppliers' || $search_key_array_value == 'exporter' || $search_key_array_value == 'exporters' || $search_key_array_value == 'manufacturer' || $search_key_array_value == 'manufacturers' || $search_key_array_value == 'wholesaler' || $search_key_array_value == 'wholesalers'){}else{
                            $supplier_product_meta .= $search_key_array_value.' ';
                        }
                    }
                    if($search_key_array_value == 'supplier' || $search_key_array_value == 'suppliers' || $search_key_array_value == 'product' || $search_key_array_value == 'products' || $search_key_array_value == 'exporter' || $search_key_array_value == 'exporters' || $search_key_array_value == 'manufacturer' || $search_key_array_value == 'manufacturers' || $search_key_array_value == 'wholesaler' || $search_key_array_value == 'wholesalers'){}else{
                        $category_key .= $search_key_array_value.' ';
                    }
                }
            }
        }

        $search_key = substr($search_key, 0,-1);
        $category_key = substr($category_key, 0,-1);
        $meta_title_string = substr($meta_title_string, 0,-1);
        $supplier_product_meta = substr($supplier_product_meta, 0,-1);
        // dd($supplier_product_meta);


        $search = $r->t;
        $key = $category_key;
        $str_ignore = $r->ig;
        $buyer_protection = $r->bp;
        $gold_supplier = $r->gs;
        $assessed_supplier = $r->as;
        $filter_by_main_market = $r->fm;
        $filter_by_total_revanue = $r->ftr;
        $filter_by_employe = $r->fe;
        $origin = $r->o;
        $category = $r->ca;
        $business_type = $r->bt;
        $search_str = $search_key;
        if($r->c){
            $country = $r->c;
        }else if($cid_form_string != ''){
            $country = $cid_form_string;
        }else{
            $country = $r->c;
        }
        //dd($filter_by_total_revanue);
        if($search == "products")
        {
            $searched_on = 'products';
            $products = $this->search_product($key,$country,$buyer_protection,$gold_supplier,$assessed_supplier,$filter_by_main_market,$filter_by_total_revanue,$filter_by_employe,$origin,$category,$str_ignore);
            $main_market_status = $this->main_market_status();
            $revanue = $this->revanue();
            $total_employe = $this->total_employe();
            $country_data=BdtdcCountry::with('country_region')->where('region_id',1)->get();
            $bdtdc_country_list=DB::table('bdtdc_country')->where('region_id','!=',1)->get();

            $country_name_bd=BdtdcCountry::with('country_region')->where('id',$country)->first();
            $cname = '';
            if($country_name_bd){
                $country_name_title = $country_name_bd->name;
                $cname = $country_name_bd->name;
            }else{
                $country_name_title = "All countries";
            }

            $data['products'] = $products->appends(Input::except('page'));

            $data['title'] = trim($search_key).' - Source '.trim($meta_title_string).' of '.trim($country_name_title).' at BDTDC';

            $data['description'] = 'Find high quality '.trim($country_name_title).' '.trim($meta_title_string).' from reliable '.trim($meta_title_string).' suppliers, manufacturers, exporters and wholesalers in '.trim($country_name_title).' at BuyerSeller';

            $data['keyword'] = trim($country_name_title).' '.trim($meta_title_string).', wholesale '.trim($country_name_title).' '.trim($meta_title_string).', Best '.trim($country_name_title).' '.trim($meta_title_string).', Buy '.trim($country_name_title).' '.trim($meta_title_string).', source '.trim($country_name_title).' '.trim($meta_title_string).', top '.trim($country_name_title).' '.trim($meta_title_string).', quality '.trim($country_name_title).' '.trim($meta_title_string).', '.trim($country_name_title).' '.trim($meta_title_string).' factory, '.trim($country_name_title).' '.trim($meta_title_string).' suppliers, '.trim($country_name_title).' '.trim($meta_title_string).' wholesalers';

            // $title=$country_name_title.' Suppliers, manufacturers & exporters at BDTDC Example: Bangladesh Suppliers, Manufacturers & Exporters at BDTDC';
            // $description='Find verified '.$country_name_title.' suppliers, manufacturers & exporters for quality products at BuyerSeller, the largest and reliable online sourcing platform in Bangladesh.';

            $agent = new Agent();
        
            if($agent->isMobile())

            {
             return view::make('mobile-view.content-view-mobile.search_value_details',$data,compact('products','main_market_status','revanue','total_employe','searched_on','search_str','bdtdc_country_list','country_data','country','buyer_protection','gold_supplier','assessed_supplier','filter_by_main_market','filter_by_total_revanue','filter_by_employe','origin','category','country_from_string'));
            }
            else{
              return view::make('fontend.supplier.search_product_list',$data,compact('products','main_market_status','revanue','total_employe','searched_on','search_str','bdtdc_country_list','country_data','country','buyer_protection','gold_supplier','assessed_supplier','filter_by_main_market','filter_by_total_revanue','filter_by_employe','origin','category','country_from_string'));
            }

        }else if($search == "suppliers"){
            $searched_on = 'suppliers';
            $suppliers = $this->search_supplier($key,$country,$buyer_protection,$gold_supplier,$assessed_supplier,$filter_by_main_market,$filter_by_total_revanue,$filter_by_employe,$business_type,$str_ignore);
            $country_id = $country;
            $main_market_status = $this->main_market_status();
            $revanue = $this->revanue();
            $total_employe = $this->total_employe();
            $country_data=BdtdcCountry::with('country_region')->where('region_id',1)->get();
            $bdtdc_country_list=DB::table('bdtdc_country')->where('region_id','!=',1)->get();
            $country_name_bd=BdtdcCountry::with('country_region')->where('id',$country_id)->first();
            if($country_name_bd){
                $country_name_title = $country_name_bd->name;
            }else{
                $country_name_title = "All countries";
            }
            $title=$country_name_title.' Suppliers, manufacturers & exporters at BuyerSeller Example: Bangladesh Suppliers, Manufacturers & Exporters at BuyerSeller';
            $description='Find verified '.$country_name_title.' suppliers, manufacturers & exporters for quality products at BuyerSeller, the largest and reliable online sourcing platform in Bangladesh.';

            $data['suppliers'] = $suppliers->appends(Input::except('page'));

            $data['title'] = trim($search_key).' - Top '.trim($supplier_product_meta).' companies at BuyerSeller';

            $data['description'] = 'Find reliable '.trim($country_name_title).' '.trim($supplier_product_meta).' suppliers, manufacturers, exporters and wholesalers providing high quality '.trim($supplier_product_meta).'s from '.trim($country_name_title).' at BuyerSeller';

            $data['keyword'] = trim($country_name_title).' '.trim($supplier_product_meta).' suppliers, '.trim($country_name_title).' '.trim($supplier_product_meta).'s, '.trim($country_name_title).' '.trim($supplier_product_meta).' supplier, '.trim($country_name_title).' '.trim($supplier_product_meta).' manufacturers, '.trim($country_name_title).' '.trim($supplier_product_meta).' exporters, '.trim($country_name_title).' '.trim($supplier_product_meta).' wholesalers, source '.trim($country_name_title).' '.trim($supplier_product_meta).' suppliers, '.trim($country_name_title).' '.trim($supplier_product_meta).'s supply, '.trim($country_name_title).' '.trim($supplier_product_meta).' companies, list of '.trim($country_name_title).' '.trim($supplier_product_meta).' suppliers, '.trim($country_name_title).' '.trim($supplier_product_meta).' suppliers directory, '.trim($country_name_title).' '.trim($supplier_product_meta).'s brand, '.trim($country_name_title).' '.trim($supplier_product_meta).'s factory, '.trim($country_name_title).' '.trim($supplier_product_meta).' importers';


            $agent = new Agent();
            
            if($agent->isMobile()){
             return View::make('mobile-view.content-view-mobile.supplier',$data,compact('main_market_status','revanue','total_employe','searched_on','search_str','bdtdc_country_list','country_data','country_id','buyer_protection','gold_supplier','assessed_supplier','filter_by_main_market','filter_by_total_revanue','filter_by_employe','business_type','title','description','country_from_string'));
            }else{
             return View::make('fontend.supplier.search_supplier_list',$data,compact('main_market_status','revanue','total_employe','searched_on','search_str','bdtdc_country_list','country_data','country_id','buyer_protection','gold_supplier','assessed_supplier','filter_by_main_market','filter_by_total_revanue','filter_by_employe','business_type','title','description','country_from_string'));
            }

        }else{
            return redirect('Sourcing/Requests/info/category==0+..+country==0+..+key=='.$search_str.'+..+order==0');
        }
    }

    /******ALL HELPER METHODE REGURDING SEARCH AND FILTER********/
    public function search_product($key,$country,$buyer_protection,$gold_supplier,$assessed_supplier,$filter_by_main_market,$filter_by_total_revanue,$filter_by_employe,$origin,$category,$str_ignore){

        $product_data = BdtdcProduct::query();
                    $product_data->with(['product_name','product_image_new','product_prices','bdtdcProductToCategory','bdtdcProductToCategory.bdtdcCategory','bdtdcProductToCategory.supp_pro_company','bdtdcProductToCategory.supp_pro_company','bdtdcProductToCategory.supp_pro_company.company_description','bdtdcProductToCategory.supp_pro_company.location_of_reg_string','bdtdcProductToCategory.bdtdc_suppliers','bdtdcProductToCategory.bdtdc_customer','product_country']);
            if($category && $str_ignore){}else
             {
                            if($key){
                                if (strlen($key)>4) {
                                    $seaKey = substr($key, 0, -1);
                                }else{
                                    $seaKey = $key;
                                }
                                $product_data->where(function($subQuery) use ($seaKey){
                                $subQuery->whereHas('product_name', function($offerQuery) use ($seaKey){
                                        $offerQuery->where('name', 'LIKE', $seaKey.'%');
                                        $offerQuery->orWhere('tag', 'LIKE', $seaKey.'%');
                                    });
                                $subQuery->orWhere('brandname', 'LIKE','%'. $seaKey.'%');
                                
                                      
                                                $subQuery->orWhereHas('bdtdcProductToCategory.supp_pro_company_name', function($offerQuery) use ($seaKey){
                                                    $offerQuery->where('name', 'LIKE', $seaKey.'%');
                                                });
                                                $subQuery->orWhereHas('bdtdcProductToCategory.BdtdcCategoryDescription', function($offerQuery) use ($seaKey){
                                                    $offerQuery->where('name', 'LIKE', $seaKey.'%');
                                                });
                                                $subQuery->orWhereHas('bdtdcProductToCategory.BdtdcParentCategoryDescription', function($offerQuery) use ($seaKey){
                                                    $offerQuery->where('name', 'LIKE', $seaKey.'%');
                                                });
                                 });          
                                            
                                  
                                
                            }
                        }
                
            if($country){
                $product_data->where(function($subQuery) use ($country){
                $subQuery->whereHas('bdtdcProductToCategory',function($offerQuery) use($country){
                        
                                $offerQuery->where('country_id', $country);
                          

                });
            });
            }
            // $product = $product_data->orderby('location','asc')->paginate(15);
            //  return $product;

             if($filter_by_employe){
                $product_data->whereHas('bdtdcProductToCategory.supp_pro_company',function($offerQuery) use($filter_by_employe){
                        
                                $offerQuery->where('total_employe', '=', $filter_by_employe);
                       

                });
            }

            $product_data->WhereHas('bdtdcProductToCategory.supp_pro_company.Role_user', function($offerQuery) {
                                    $offerQuery->where('role_id', '=', 3);
                            });
            $product_data->WhereHas('bdtdcProductToCategory.supp_pro_company.users', function($offerQuery) {
                                    $offerQuery->where('activated', 1);
                            });

            if($filter_by_total_revanue){
                //dd(123);
                            $product_data->WhereHas('bdtdcProductToCategory.tradeinfo', function($offerQuery) use ($filter_by_total_revanue){
                                    $offerQuery->where('anual_sales_volume', '=', $filter_by_total_revanue);
                            });
                        }
            if($filter_by_main_market){
                            $product_data->whereHas('bdtdcProductToCategory.companymainmarket', function($offerQuery) use ($filter_by_main_market){
                                $filter_by_main_market_arr = explode(',', $filter_by_main_market);
                                $i = 1;
                                foreach ($filter_by_main_market_arr as $value) {
                                    if($i == 1){
                                        $offerQuery->where('main_market_zone', '=', $value);
                                    }else{
                                        $offerQuery->orWhere('main_market_zone', '=', $value);
                                    }
                                    $i++;
                                }
                            });
                        }

            
            // $product_data->whereHas('bdtdcProductToCategory', function($offerQuery) use ($country,$filter_by_main_market,$filter_by_total_revanue, $filter_by_employe){
                        
            //             $offerQuery->whereHas('supp_pro_company', function($offerQuery) use ($country, $filter_by_employe){
            //                 if($country){
            //                     $offerQuery->where('location_of_reg', '=', $country);
            //                 }
            //                 if($filter_by_employe){
            //                     $offerQuery->where('total_employe', '=', $filter_by_employe);
            //                 }
            //                 $offerQuery->WhereHas('Role_user', function($offerQuery) {
            //                         $offerQuery->where('role_id', '=', 3);
            //                 });
            //                 $offerQuery->WhereHas('users', function($offerQuery) {
            //                         $offerQuery->where('activated', 1);
            //                 });
            //             });

            //             if($filter_by_total_revanue){
            //                 $offerQuery->WhereHas('tradeinfo', function($offerQuery) use ($filter_by_total_revanue){
            //                         $offerQuery->where('anual_sales_volume', '=', $filter_by_total_revanue);
            //                 });
            //             }
            //             if($filter_by_main_market){
            //                 $offerQuery->whereHas('companymainmarket', function($offerQuery) use ($filter_by_main_market){
            //                     $filter_by_main_market_arr = explode(',', $filter_by_main_market);
            //                     $i = 1;
            //                     foreach ($filter_by_main_market_arr as $value) {
            //                         if($i == 1){
            //                             $offerQuery->where('main_market_zone', '=', $value);
            //                         }else{
            //                             $offerQuery->orWhere('main_market_zone', '=', $value);
            //                         }
            //                         $i++;
            //                     }
            //                 });
            //             }
                        
            //         });
                    
                    if($origin){
                            $product_data->where('location', $origin);
                       //dd(123);
                  
                    }

                    if($buyer_protection){
                            $product_data->WhereHas('bdtdcProductToCategory.bdtdc_customer', function($offerQuery){
                                $offerQuery->where('trade_assurance', 1);
                            });
                        }
                    if($assessed_supplier){
                            $product_data->WhereHas('bdtdcProductToCategory.bdtdc_customer', function($offerQuery){
                                $offerQuery->where('assessed', 1);
                            });
                        }
                        if($gold_supplier){
                            $product_data->WhereHas('bdtdcProductToCategory.bdtdc_customer', function($offerQuery){
                                $offerQuery->where('gold_member', 1);
                            });
                        }

                        if($category){
                            // $offerQuery->where('category_id', $category);
                            $product_data->whereHas('bdtdcProductToCategory',function($subQuery)use($category){
                                $subQuery->where('category_id', $category);
                                $subQuery->orWhere('parent_id', $category);
                            });
                        }
                   
                    // $product_data->WhereHas('bdtdcProductToCategory', function($offerQuery) use ($buyer_protection, $assessed_supplier, $gold_supplier,$category){
                    //     if($buyer_protection){
                    //         $offerQuery->WhereHas('bdtdc_customer', function($offerQuery){
                    //             $offerQuery->where('trade_assurance', 1);
                    //         });
                    //     }
                    //     if($assessed_supplier){
                    //         $offerQuery->WhereHas('bdtdc_customer', function($offerQuery){
                    //             $offerQuery->where('assessed', 1);
                    //         });
                    //     }
                    //     if($gold_supplier){
                    //         $offerQuery->WhereHas('bdtdc_customer', function($offerQuery){
                    //             $offerQuery->where('gold_member', 1);
                    //         });
                    //     }

                    //     if($category){
                    //         // $offerQuery->where('category_id', $category);
                    //         $offerQuery->where(function($subQuery)use($category){
                    //             $subQuery->where('category_id', $category);
                    //             $subQuery->orWhere('parent_id', $category);
                    //         });
                    //     }
                    // })

                   
                        
                        
                    
                    if(!$country){
                        $product_data->where('location', '>', 17);
                    }
                    $product = $product_data->orderby('location','asc')->paginate(15);
                    //dd($product);
                    return $product;
                    
    }
    
    public function search_supplier($key,$country,$buyer_protection,$gold_supplier,$assessed_supplier,$filter_by_main_market,$filter_by_total_revanue,$filter_by_employe,$business_type,$str_ignore){

        $query = BdtdcCompany::query();
        $query->with(['name_string','users','company_description','company_description.company_product','company_description.company_product.pro_to_cat_name','company_description.company_product.pro_images_new','company_description.company_product.pro_images','location_of_reg_string','tradeinfo','tradeinfo.BdtdcFormValue','main_products']);
                 if($gold_supplier){
                        $query->whereHas('customers', function($offerQuery) {
                            $offerQuery->where('gold_member', 1);

                        });
                    }
                if($buyer_protection){
                        $query->whereHas('customers', function($offerQuery) {
                            $offerQuery->where('trade_assurance', 1);

                        });
                    }

                    if($assessed_supplier){
                        $query->whereHas('customers', function($offerQuery) {
                            $offerQuery->where('assessed', 1);

                        });
                    }


                    if ($filter_by_employe) {
                        $query->where('total_employe', '=', $filter_by_employe);
                    }

                    $query->whereHas('Role_user', function($offerQuery) {
                                $offerQuery->where('role_id', '=', 3);
                        });

                    $query->whereHas('users', function($offerQuery) {
                                $offerQuery->where('activated', 1);
                        });
                if($key){
                    if (strlen($key)>4) {
                        $seaKey = substr($key, 0, -1);
                    }else{
                        $seaKey = $key;
                    }
                    $query->whereHas('name_string', function($offerQuery) use ($seaKey){
                        $offerQuery->where('name', 'LIKE', '%'.$seaKey.'%');
                    });
                    $query->orWhereHas('users', function($offerQuery) use ($seaKey) {
                            $offerQuery->where('first_name', 'LIKE', '%'.$seaKey.'%');
                    });
                    $query->orWhereHas('users', function($offerQuery) use ($seaKey) {
                            $offerQuery->where('last_name', 'LIKE', '%'.$seaKey.'%');
                    });
                    $query->orWhereHas('main_products', function($offerQuery) use ($seaKey) {
                            $offerQuery->where('product_name_1', 'LIKE', '%'.$seaKey.'%');
                    });
                    $query->orWhereHas('main_products', function($offerQuery) use ($seaKey) {
                            $offerQuery->where('product_name_2', 'LIKE', '%'.$seaKey.'%');
                    });
                    $query->orWhereHas('main_products', function($offerQuery) use ($seaKey) {
                            $offerQuery->where('product_name_3', 'LIKE', '%'.$seaKey.'%');
                    });
                    // $category_found = BdtdcCategory::where('name', 'LIKE', '%'.$seaKey.'%')->get();
                    // // dd($category_found);

                    // if(count($category_found)>0){
                    //     foreach ($category_found as $category_found_value) {
                    //         $query->orWhereHas('company_product_to_category', function($offerQuery) use ($category_found_value) {
                    //             if($category_found_value->parent_id == 0){
                    //                 $offerQuery->where('parent_id',$category_found_value->id);
                    //             }else{
                    //                 $offerQuery->where('category_id',$category_found_value->id);
                    //             }
                    //         });
                    //     }
                    // }
                    // $product_found = BdtdcProductDescription::where('name', 'LIKE', '%'.$seaKey.'%')->get();
                    // if(count($product_found)>0){
                    //     foreach ($product_found as $product_found_value) {
                    //         $query->orWhereHas('company_product_to_category', function($offerQuery) use ($product_found_value,$seaKey) {
                    //             $offerQuery->where('product_id',$product_found_value->product_id);
                    //         });
                    //     }
                    // }  
                }


        if($country){
            // dd($country);
            $query->whereHas('company_product_to_category',function($qq) use($country){
                $qq->where('country_id',$country);
            });
            $query->where('location_of_reg', $country);
        }else{
            $query->where('location_of_reg','>',17);
        }

        if($business_type){
        $query->whereHas('supplier', function($offerQuery) use ($business_type){
                    $offerQuery->where('busines_type_id', '=', $business_type);
                
            });
        }

        if($filter_by_total_revanue){
            $query->whereHas('tradeinfo', function($offerQuery) use ($filter_by_total_revanue){
                    $offerQuery->where('anual_sales_volume', '=', $filter_by_total_revanue);
                });
        }

        if($filter_by_main_market){
            $query->whereHas('companymainmarket', function($offerQuery) use ($filter_by_main_market){
                    $filter_by_main_market_arr = explode(',', $filter_by_main_market);
                    $i = 1;
                    foreach ($filter_by_main_market_arr as $value) {
                        if($i == 1){
                            $offerQuery->where('main_market_zone', '=', $value);
                        }else{
                            $offerQuery->orWhere('main_market_zone', '=', $value);
                        }
                        $i++;
                    }
                });
        }


        // $query->where(function($subQuery) use ($key)
        //     {
        //         if($key){
        //             if (strlen($key)>4) {
        //                 $seaKey = substr($key, 0, -1);
        //             }else{
        //                 $seaKey = $key;
        //             }
        //             //each word search
        //             $word_array = explode(' ', $key);
        //             if(count($word_array)>1){
        //                 foreach ($word_array as $word_array_value) {
        //                     if(strlen($word_array_value)>2){
        //                         if (strlen($word_array_value)>4) {
        //                             $seKey = substr($word_array_value, 0, -1);
        //                         }else{
        //                             $seKey = $word_array_value;
        //                         }
        //                         $subQuery->orWhereHas('name_string', function($offerQuery) use ($seKey){
        //                             $offerQuery->where('name', 'LIKE', '%'.$seKey.'%');
        //                         })
        //                         ->orWhereHas('users', function($offerQuery) use ($seKey) {
        //                                 $offerQuery->where('first_name', 'LIKE', '%'.$seKey.'%');
        //                         })
        //                         ->orWhereHas('users', function($offerQuery) use ($seKey) {
        //                                 $offerQuery->where('last_name', 'LIKE', '%'.$seKey.'%');
        //                         })
        //                         ->orWhereHas('main_products', function($offerQuery) use ($seKey) {
        //                                 $offerQuery->where('product_name_1', 'LIKE', '%'.$seKey.'%');
        //                         })
        //                         ->orWhereHas('main_products', function($offerQuery) use ($seKey) {
        //                                 $offerQuery->where('product_name_2', 'LIKE', '%'.$seKey.'%');
        //                         })
        //                         ->orWhereHas('main_products', function($offerQuery) use ($seKey) {
        //                                 $offerQuery->where('product_name_3', 'LIKE', '%'.$seKey.'%');
        //                         });
        //                         $category_found = BdtdcCategory::where('name', 'LIKE', '%'.$seKey.'%')->get();
        //                         if(count($category_found)>0){
        //                             foreach ($category_found as $category_found_value) {
        //                                 $subQuery->orWhereHas('company_product_to_category', function($offerQuery) use ($category_found_value) {
        //                                     if($category_found_value->parent_id == 0){
        //                                         $offerQuery->orWhere('parent_id',$category_found_value->id);
        //                                     }else{
        //                                         $offerQuery->where('category_id',$category_found_value->id);
        //                                     }
        //                                 });
        //                             }
        //                         }
        //                         $product_found = BdtdcProductDescription::where('name', 'LIKE', '%'.$seKey.'%')->get();
        //                         if(count($product_found)>0){
        //                             foreach ($product_found as $product_found_value) {
        //                                 $subQuery->orWhereHas('company_product_to_category', function($offerQuery) use ($product_found_value,$seKey) {
        //                                     $offerQuery->where('product_id',$product_found_value->product_id);
        //                                 });
        //                             }
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     });
                    
        $suppliers = $query->orderBy('location_of_reg','asc')->orderBy('sort','asc')->where('is_active',1)->paginate(15);
        //dd($suppliers);
        return $suppliers;
    }

    public function main_market_status(){
        return  DB::select(DB::raw(
            "SELECT main_market.main_market_zone as main_market_zone_id,
                            count(main_market.main_market_zone) as number_of_used_by_company,
                            fv.value as market_name
                    FROM `bdtdc_company_main_markets` as main_market
                    JOIN `bdtdc_form_values` as fv on fv.id=main_market.main_market_zone
                    GROUP BY main_market.main_market_zone"
        ));
    }

    public function revanue(){
        return  DB::select(DB::raw(
            "SELECT ti.anual_sales_volume as revanue_id,
                        count(ti.anual_sales_volume) as number_of_used,
                        fv.value revanue_name
                    FROM `bdtdc_company_trade_info` as ti
                    JOIN `bdtdc_form_values` as fv ON fv.id = ti.anual_sales_volume
                    GROUP BY ti.anual_sales_volume"
        ));
    }
    public function total_employe(){
        return DB::select(DB::raw(
            "SELECT c.total_employe as total_employe_id,fv.value as total_employe,count(c.total_employe) as number_of_use
            FROM `bdtdc_companies` as c
            JOIN `bdtdc_form_values` as fv ON fv.id = c.total_employe
            WHERE c.total_employe >0
            GROUP BY c.total_employe"
        ));
    }

}
