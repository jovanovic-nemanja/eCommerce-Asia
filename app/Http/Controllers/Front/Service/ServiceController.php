<?php

namespace App\Http\Controllers\Front\Service;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\BdtdcCategory;
use App\Model\BdtdcCountry;
use DB;
use Input;
use View;
use Sentinel;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcSupplier;
use App\Model\BdtdcSupplierInquery;
use App\Model\BdtdcProduct;
use App\Model\BdtdcSampleRequests;
use App\Model\BdtdcSampleProducts;
use App\Model\BdtdcCompany;
use App\Model\BdtdcProductCategory;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */


    public function gethome()
    {
        $data['categorys']=array();
            $categorys=DB::table('bdtdc_category')
                ->where('parent_id','0')
                ->get();
               // dd($categorys);
                foreach ($categorys as $category) {
                
                        $category_children_data = array();

                        
                        $category_childrens = DB::table('bdtdc_category')
                            ->where('parent_id',$category->id)
                            ->get();
                            //dd($category_name);
                            foreach ($category_childrens as $category_children) {
                                # code...
                                $category_children_data[] = array(
                                    'category_id'  => $category_children->id,
                                    'child_name'=>  $category_children->name
                                    
                                );
                                
                            }
                            $data['categorys'][] = array(
                                //'name'=>$category->category_name,
                    'category_id'     => $category->id,
                    'name'=>$category->name,
                    'category_childrens' => $category_children_data
                    
                );
                            //dd($category_children_data);
   
                }
        return View::make('pages.Service.home',$data);
    }

    public function bdtdc_sourcing($category_id = null)
    {
      $categorys=DB::table('bdtdc_supllier_inqueries as inq')
                                ->join('bdtdc_product_to_category as pc','pc.product_id','=','inq.product_id')
                                ->join('bdtdc_category as c','c.id','=','pc.category_id')
                                ->groupBy('c.id')
                                ->where('is_RFQ',1)
                                ->get(['c.name as cat_name','c.id as cat_id']);
                                //dd($categorys);
        

        $source=BdtdcSupplierInquery::with(['inq_products_category'=>function($q){
                                        $q->groupBy('category_id')->get();
                                    },'bdtdc_product','inq_unit_id','inq_products_image'])
                                                                            ->where('is_RFQ',1)
                                                                             ->get();
                           // return $categorys;
                                                                            //dd($source);

          

        return view('fontend.buyer.bdtdc_sourcing',compact('categorys','source'));
    }

    public function bdtdc_sourcing_details($id)
    {
        $skey = '';
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
          $skey = explode('==',$search_array[0])[1];
          $categoryid = explode('==',$search_array[1])[1];
          $countryid = explode('==',$search_array[2])[1];
          $rfq = explode('==',$search_array[3])[1];
          $posted = explode('==',$search_array[4])[1];
          $quantity_form = explode('==',$search_array[5])[1];
          $quantity_to = explode('==',$search_array[6])[1];
        }
         // dd($categoryid);

        $categories=BdtdcSupplierInquery::with(['inq_products_category'=>function($q){
                                        $q->groupBy('category_id')->get();
                                    },'inq_products_category.bdtdcCategory'])->where('is_RFQ',1)->get();

                        $source_query = BdtdcSupplierInquery::query();
                        $source_query->with(['inq_products_category','bdtdc_product.product_name','sender_company.country','bdtdc_product','inq_unit_id','inq_products_image']);

                                 if($categoryid != 0){
                                    $source_query->whereHas('inq_products_category',function($q) use($categoryid){
                                   
                                        $q->where('category_id','=',$categoryid);
                                    
                                });
                                    }
                                    if($countryid != 0){
                                        $source_query->whereHas('sender_company',function($q) use($countryid){
                                    
                                        $q->where('location_of_reg','=',$countryid);
                                    
                                });
                                }
                                // if($skey != ''){
                                // $source_query->whereHas('inq_products_description',function($q) use($skey){
                                    
                                //         $q->where('name','LIKE', '%'.$skey.'%');
                                    
                                // });

                                // }
                                $source_query->where('is_RFQ',1);
                                 if($skey != ''){
                                        $source_query->where('inquery_title','LIKE', '%'.$skey.'%');
                                    }
                                if($quantity_to != 0){
                                    $source_query->whereBetween('quantity', [$quantity_form, $quantity_to]);
                                }
                                if($rfq == "true"){
                                    $source_query->where('updated_at', '>=', date('Y-m-d', strtotime("-30 days")));
                                }
                                if ($posted != 0) {
                                    $posted_array = explode('-', $posted);
                                    if($posted_array[1] == "h"){
                                        $source_query->whereBetween('updated_at', [date("Y-m-d H:i:s", strtotime('-'.$posted_array[0].' hours')), date("Y-m-d H:i:s")]);
                                        // $source_query->where('updated_at', '<=', date("Y-m-d H:i:s", strtotime('-'.$posted_array[0].' hours')));
                                    }
                                    if($posted_array[1] == "d"){
                                        // $source_query->whereBetween('updated_at', [date('Y-m-d', strtotime("-".$posted_array[0]." days")), date("Y-m-d")]);
                                        $source_query->where('updated_at', '>=', date('Y-m-d', strtotime("-".$posted_array[0]." days")));
                                    }
                                    if($posted_array[1] == "da"){
                                        $source_query->where('updated_at', '<=', date('Y-m-d', strtotime("-7 days")));
                                    }
                                }
                                
                                $source = $source_query->paginate(20);
                                
                                //dd($source);
        
        // $edition=array();

        $country=BdtdcCountry::with('country_region')->where('region_id',1)->get();
        $bdtdc_country_list=BdtdcCountry::where('region_id','!=',1)->get();
         $data['keyword']='buyerseller';
         $data['description']='buyerseller';
         $data['keyword']='buyerseller';
        if($source){
        return view('fontend.buyer.bdtdc_sourcing_details',$data,compact('categories','source','skey','categoryid','countryid','rfq','posted','quantity_form','quantity_to','country','bdtdc_country_list'));

        }
        else{
            return Redirect::back();
        }
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
