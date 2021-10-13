<?php

namespace App\Http\Controllers\Admin;

use App\Model\BdtdcAttribute;
use App\Model\BdtdcProduct;
use App\Model\BdtdcProductAttribute;
use Illuminate\Http\Request;
use App\Country;
use App\Language;
use Validator;
use Session;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Model\BdtdcProductUnit;
use App\Model\BdtdcHomeInquires;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcProductDescription;
use App\Model\BdtdcCountry;
use App\Model\BdtdcCategory;
use App\Model\BdtdcCompany;
use App\Model\BdtdcCompanyDescription;
use App\Model\BdtdcSupplierQuery;
use App\Model\BdtdcSupplierInquery;
use App\Model\BdtdcInqueryMessage;
use App\Model\bdtdcInqueryDocs;
use App\Model\BdtdcQuoteDocs;
use App\Model\User;
use App\Model\BdtdcProductPrice;
use App\Model\BdtdcProductImage;
use App\Model\BdtdcProductImageNew;
use DB;
use View;
use Sentinel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Model\BdtdcHomeProduct;
use App\Model\BdtdcSupplier;
use App\Model\Role_user;
use App\Model\Role;
use App\Model\BdtdcPage;
use App\Model\BdtdcNotification;
use App\Model\BdtdcPageSeo;
use App\Model\BdtdcCustomer;
use App\Model\BdtdcCustomerActivity;
use App\Model\BdtdcTemplateSection;
use App\Model\OrderShippingTerm;
use App\Model\Notice;
use App\Model\BdtdcSupplierProduct;
use URL;


class SellerProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct()
    {
        ini_set('memory_limit', '9999999M');
    }
    public function index($user_id){
        $supplier_product = BdtdcProductToCategory::with(['pro_to_cat_name','bdtdcProduct','BdtdcCategoryDescription','BdtdcSupplierProduct'])->whereHas('supp_pro_company',function($subQuery)use($user_id){
            $subQuery->where('user_id',$user_id);
        })
        ->paginate(10);
        return View::make('protected.admin.supplier.dashboard',compact(['supplier_product']));
            
    }
    public function product_create(){
        $countries = DB::select('select * from bdtdc_country');
        //dd($countries);
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $company_id=$company->id;
        $data['product_groups']=DB::table('bdtdc_supplier_product_groups')->where('company_id',$company_id)->get();
        //dd($product_groups);
        foreach($countries as $country){
            $country_data[$country->id]=$country->name;
        }
        $data['modules']=array();
      

        $data['categorys']=array();
        $categorys=DB::table('bdtdc_category')
            ->where('parent_id','0')
            ->get();
        foreach ($categorys as $category) {

            $category_children_data = array();


            $category_childrens = DB::table('bdtdc_category')
                ->where('parent_id',$category->id)
                ->get();
            
            foreach ($category_childrens as $category_children) {
                
                $category_children_data[] = array(
                    'category_id'  => $category_children->id,
                    'child_name'=>  $category_children->name

                );

            }
            $data['categorys'][] = array(
                
                'category_id'     => $category->id,
                'name'=>$category->name,
                'category_childrens' => $category_children_data

            );
            

        }
        $units = BdtdcProductUnit::all();
        $country = BdtdcCountry::where('region_id','!=',1)->get();
        $language = Language::get(['name','language_id']);
        // echo "<pre>";
        // print_r(DB::table('bdtdc_limited_lime_offers')->get());
        // echo "</pre>";
        //return $country;
        return view('fontend.supplier.product_create',$data, array('country'=>$country, 'units'=> $units));
    }

    public function post_product_create(Request $request){
        if(Sentinel::getUser()){}else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }

        $validator = Validator::make($request->all(), [
            'product_name' => 'required|max:10000',
            'parent_category' => 'required|integer|max:10000000|not_in:0',
            'sub_category' => 'required|integer|max:10000000|not_in:0',
            'product_meta_keywords' => 'required|max:10000',
            'product_model' => 'required|max:1000',
            'brand_name' => 'required|max:1000',
            'country' => 'required|integer|not_in:0|max:10000000',
            'product_att_name.*' => 'min:1|max:1000',
            'product_att_value.*' => 'min:2|max:2000',
            'processing_time' => 'required|integer|max:10000',
            'port' => 'required|max:10000',
            'supply_ability' => 'required|integer|max:10000000',
            'product_groups' => 'required|max:10000000|not_in:0',
            'payment.*' => 'min:1|max:100',
            'packages_delivery' => 'required|max:10000',
            'product_description' => 'required|max:10000000',
            'others_payment' => 'max:1000',
            'unit_type' => 'max:10000000|integer',
            'product_images' => 'required',
            'product_images.*' => 'max:2048|mimes:jpg,jpeg,png',
        ],['product_images'=>'At least one product image is required']);

        if ($validator->fails()) {
            // return $validator->errors()->all();
            return back()->withErrors($validator)->withInput();
        }

        if($request->is_limited_time_offer == true){
            $validator = Validator::make($request->all(), [
                'percentage' => 'required|numeric|max:100|min:0',
                'offer_from' => 'required|date',
                'offer_to' => 'required|date',
            ]);
            if ($validator->fails()) {
                // return $validator->errors()->all();
                return back()->withErrors($validator)->withInput();
            }
        }else{}

        $attr_val_loop = count($request->product_att_name);
        for ($i=0; $i < $attr_val_loop+1; $i++) {
            $validator = Validator::make($request->all(), [
                'product_att_name.'.$i => 'max:1000',
                'product_att_value.'.$i => 'max:2000',
                ]);
            if ($validator->fails()) {
                // return $validator->errors()->all();
                return back()->withErrors($validator)->withInput();
            }
        }

        if($request->base == 'based_quantity'){
            $based_quantity_loop = count($request->product_MOQ);
            for ($j=0; $j < $based_quantity_loop+1; $j++) {
                $validator = Validator::make($request->all(), [
                    'product_MOQ.'.$j => 'max:10000000',
                    'product_FOB_from.'.$j => 'numeric|max:10000000',
                    'product_FOB_to.'.$j => 'numeric|max:10000000',
                    ]);
                if ($validator->fails()) {
                    // return $validator->errors()->all();
                    return back()->withErrors($validator)->withInput();
                }
            }
        }else{
            $validator = Validator::make($request->all(), [
                'currencies' => 'required|max:10000000',
                'currency_from' => 'max:10000000|numeric',
                'currency_to' => 'max:10000000|numeric',
                'unit_type_FOB' => 'integer|max:10000000',
                'product_MOQ_FOB' => 'max:10000000',
                'discounted_price' => 'numeric|max:10000000',
                ]);
            if ($validator->fails()) {
                // return $validator->errors()->all();
                return back()->withErrors($validator)->withInput();
            }
        }

        $payment_loop = count($request->payment);
        for ($k=0; $k < $payment_loop+1; $k++) {
            $validator = Validator::make($request->all(), [
                'payment.'.$k => 'max:1000',
                ]);
            if ($validator->fails()) {
                // return $validator->errors()->all();
                return back()->withErrors($validator)->withInput();
            }
        }

        // dd($request->all());
            
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $company_id=$company->id;
        $response_to_client = [];
        $payment_array = $request->payment;
        if($payment_array){
            if (in_array("others", $payment_array)) {
                $key = array_search('others', $payment_array);
                $payment_array[$key] = $request->others_payment;
            }
        }
      
        //Insert Product Start
        $bdtdc_product_array_insert = [
            'model'         => $request->product_model,
            'brandname'     => $request->brand_name,
            'location'      => $request->country,
            'payment_method'   => ($payment_array) ? implode(',',$payment_array) : null,
            'unit_type_id' => $request->unit_type,
            'product_groups' =>$request->product_groups,
            'delivery' => $request->input('packages_delivery'),
        ];

        if($request->base == 'based_FOB'){
            $bdtdc_product_array_insert['unit_type_id'] = $request->unit_type_FOB;
        }

        $product_details_id = DB::table('bdtdc_product')->insertGetId($bdtdc_product_array_insert);
        $response_to_client['model'] = $request->product_model;
        $response_to_client['brandname'] = $request->brand_name;
        $response_to_client['product_id'] = $product_details_id;
        //Insert Product End

        //product_description start
        $bdtdc_product_description_array = [
            'product_id' => $product_details_id,
            'name'       => $request->product_name,
            'description' => $request->product_description,
            'meta_keyword' => $request->product_meta_keywords,
            'tag' => $request->product_meta_tag,
        ];
        $product_description = DB::table('bdtdc_product_description')->insertGetId($bdtdc_product_description_array);
        $response_to_client['product_name'] = $request->product_name;
        //product_description end


        //bdtdc_product_to_category start
        $bdtdc_product_to_category_data = [
            'product_id' => $product_details_id,
            'category_id'   => $request->sub_category,
            'parent_id'   => $request->parent_category,
            'company_id'   => $company_id,
            'country_id'   => $request->country,
        ];
        
        $product_description = DB::table('bdtdc_product_to_category')->insert($bdtdc_product_to_category_data);
        //bdtdc_product_to_category end

        //bdtdc_product_to_wholesale_category start
        if($request->is_wholesale_product == true){
            $bdtdc_product_to_wholesale_category_data = [
                'product_id' => $product_details_id,
                'category_id'   => $request->sub_category,
                'parent_id'   => $request->parent_category,
                'company_id'   => $company_id,
                'country_id'   => $request->country,
            ];
            $product_description = DB::table('bdtdc_product_to_wholesale_category')->insert($bdtdc_product_to_wholesale_category_data);
        }
        //bdtdc_product_to_wholesale_category end

        //bdtdc_limited_lime_offers start
        if($request->is_limited_time_offer == true){
            $bdtdc_limited_lime_offers_data = [
                'product_id' => $product_details_id,
                'sub_category'   => $request->sub_category,
                'parent_category'   => $request->parent_category,
                'country'   => $request->country,
                'company_id'   => $company_id,
                'profit_percentage'   => $request->percentage,
                'start_date'   => date("Y-m-d H:i:s",strtotime($request->offer_from)),
                'end_date'   => date("Y-m-d H:i:s",strtotime($request->offer_to)),
            ];
            $product_description = DB::table('bdtdc_limited_lime_offers')->insert($bdtdc_limited_lime_offers_data);
        }
        
        $response_to_client['category'] = BdtdcCategory::where('id',$request->sub_category)->first(['name'])->name;
        //bdtdc_limited_lime_offers end


        //bdtdc_logistic_infos start
        $bdtdc_logistic_infos_array = [
            'product_id' => $product_details_id,
            'processing_time'   => $request->processing_time,
            'port' => $request->port,
            'supply_ability' => $request->supply_ability,
        ];
        $product_description = DB::table('bdtdc_logistic_infos')->insertGetId($bdtdc_logistic_infos_array);
        //bdtdc_logistic_infos end

        //bdtdc_attributes start
        $attributes_details =[];
        $prev_attr_name_exists = [];
        for($i=0,$len=count($request->get('product_att_name'));$i<$len;$i++){
            if($request->get('product_att_name')[$i] != ""){
                if(in_array($request->get('product_att_name')[$i], $prev_attr_name_exists)){}else{
                    $input_arr[$i]['name'] = $request->get('product_att_name')[$i];
                    $input_arr[$i]['value'] = $request->get('product_att_value')[$i];
                    $attributes_details[] = DB::table('bdtdc_attributes')->insertGetId($input_arr[$i]);
                    array_push($prev_attr_name_exists, $request->get('product_att_name')[$i]);
                }
            }
        }
        //bdtdc_attributes end

        //bdtdc_product_attribute start
        $product_attribute = array();
        if(count($attributes_details)> 0){
            foreach($attributes_details as $data){
                $product_attribute = array(
                    'attribute_id' => $data,
                    'product_id' => $product_details_id,
                );
                $pro_attribute =DB::table('bdtdc_product_attribute')->insert($product_attribute);
            }
        }
        //bdtdc_product_attribute end

        //bdtdc_product_prices start
        $input_price = [];
        if($request->base == 'based_FOB'){
            if($request->product_MOQ_FOB != ""){
                $input_price['product_id']  = $product_details_id; 
                $input_price['currency'] = $request->currencies;
                $input_price['product_MOQ'] = $request->product_MOQ_FOB;
                $input_price['product_FOB'] = $request->currency_from.'-'.$request->currency_to;
                $input_price['discounted_price'] = $request->discounted_price;
                DB::table('bdtdc_product_prices')->insert($input_price);
            }
        }else{
            for($i=0,$len=count($request->product_MOQ);$i<$len;$i++){
                if($i==0){
                    $input_price[$i]['product_id']  = $product_details_id; 
                    $input_price[$i]['product_MOQ'] = $request->product_MOQ[$i];
                    $input_price[$i]['product_FOB'] = $request->product_FOB_from[$i].'-'.$request->product_FOB_to[$i];
                    // print_r($input_price[$i]);
                    DB::table('bdtdc_product_prices')->insert($input_price[$i]);
                }else{
                    if($request->product_MOQ[$i] != ""){
                        $input_price[$i]['product_id']  = $product_details_id; 
                        $input_price[$i]['product_MOQ'] = $request->product_MOQ[$i];
                        $input_price[$i]['product_FOB'] = $request->product_FOB_from[$i].'-'.$request->product_FOB_to[$i];
                        // print_r($input_price[$i]);
                        DB::table('bdtdc_product_prices')->insert($input_price[$i]);
                    }
                }
            }
        }
        //bdtdc_product_prices end

        //bdtdc_product_images start
        $allowed_img_no = 6;
        $current_img =1;
        if($request->file('product_images')){
            if(count($request->file('product_images'))>0){
                foreach ($request->file('product_images') as $product_images_single) {
                    if($product_images_single){
                        $new_parent_cat_name = BdtdcCategory::where('id',$request->parent_category)->first();
                        $new_sub_cat_name = BdtdcCategory::where('id',$request->sub_category)->first();
                        if($new_parent_cat_name && $new_sub_cat_name){
                            if($current_img > $allowed_img_no){}else{
                            $parent_cat_id = $request->input('parent_category');
                            $sub_cat_id = $request->input('sub_category');
                            $pname = trim($request->input('product_name'));
                            //The name of the directory that we need to create.
                            $directoryName = 'bdtdc-product-image/'.trim($new_parent_cat_name->slug).'/'.trim($new_sub_cat_name->slug);

                            //Check if the directory already exists.
                            if(!is_dir($directoryName)){
                                //Directory does not exist, so lets create it.
                                //true for nested directory (need 0777 permission for this)
                                mkdir($directoryName, 0777, true);
                            }
                            if($pname == ''){
                                $string   = 'Product-image_'.$parent_cat_id."_".$sub_cat_id."_".str_random(10);
                            }else{
                                $string   = preg_replace('/[^A-Za-z0-9]/ ', '-',substr($pname,0,100)).'_'.$parent_cat_id."_".$sub_cat_id."_".str_random(10);
                            }
                            $temp_file  = $product_images_single;
                            $ext        = $product_images_single->getClientOriginalExtension();
                            $product_photo  = $string.'.'.$ext;
                            $dst = $directoryName.'/'.$product_photo;
                            move_uploaded_file($temp_file,$dst);
                            //insert image name to database
                            $img_arr = [
                                            'image' => $dst,
                                            'product_id' => $product_details_id
                                        ];
                            BdtdcProductImageNew::create($img_arr);
                            $current_img++;
                            }
                        }
                    }
                }
            }
        }
        //bdtdc_product_images end

        //bdtdc_supplier_products start
        $supplier_product_arr =[
            'product_id' => $product_details_id,
            'supplier_id' => Sentinel::getUser()->id,
            'number_sold' => 0,
            'product_status' => 0,
            'product_approved' => 0,
        ];
        BdtdcSupplierProduct::create($supplier_product_arr);
        //bdtdc_supplier_products end

        $response_to_client['success'] = true;
        // return $response_to_client;
        return Redirect::to('dashboard/product')->with('product_edit_success','Product added successfully');
    }
    public function add_product_group($group_name){
        if(Sentinel::getUser()){
        }else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }
        $user_id = Sentinel::getUser()->id;
        $company_id = BdtdcCompany::where('user_id',$user_id)->first(['id'])->id;
        $group = SupplierProductGroup::create(['name'=>$group_name,'company_id'=>$company_id]);
        return $group;
    }
    public function product_edit($id){
        if(Sentinel::getUser()){
        }else{
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['SCRIPT_URL']))->withFlashMessage('You must first login before accessing this page.');
        }
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $company_id = $company->id;
        $product_description = BdtdcProductToCategory::where('product_id',$id)->first();

        // if($product_description->company_id != $company_id){
        //     Sentinel::logout();
        //     return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['SCRIPT_URL']))->withFlashMessage('You must first login before accessing this page.');
        // }
        
        
        $countries = DB::select('select * from bdtdc_country');
        foreach($countries as $country){
            $country_data[$country->id]=$country->name;
        }
        

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
        $units = BdtdcProductUnit::all();
        $country = Country::get(['name','id']);
        $product = BdtdcProduct::with(['product_name','category',])
            ->where('id', $id)
            ->first();
        $products = BdtdcProductToCategory::where('product_id', $id)->first();
        
        /*$parent_id = DB::table('bdtdc_category')
                ->where('id',$products[0]['category']->category_id)
                ->get();*/
        $parent_id = $products?$products->parent_id:0;

        $data['parent_id'] = $parent_id;
        //return $products[0]['category']->category_id;
        // dd($parent_id);
        $attributes = BdtdcProductAttribute::with(['bdtdcAttribute'])
            ->where('product_id', $id)
            ->orderBy('id','asc')
            ->get();
        $prices=BdtdcProductPrice::where('product_id',$id)->first();
        $supplier_product = DB::table('bdtdc_product as p')
            ->join('bdtdc_product_description as pd','pd.product_id','=','p.id')
            ->where('p.id',$id)
            ->first();
        $product_price = DB::table('bdtdc_product_prices')->where('product_id',$id)->get();
        $product_image = BdtdcProductImage::where('product_id',$id)->get();
        $product_images = BdtdcProductImageNew::where('product_id',$id)->get();
        // dd($product_images);
        /*foreach ($product_images as $img) {
            array_push($product_image, $img);
        }*/
        $product_groups=DB::table('bdtdc_supplier_product_groups')->where('company_id',$company_id)->get();
        $bdtdc_logistic_infos=DB::table('bdtdc_logistic_infos')->where('product_id',$id)->get();
        $bdtdc_product_to_wholesale_category=DB::table('bdtdc_product_to_wholesale_category')->where('product_id',$id)->get();
        $bdtdc_limited_lime_offers=DB::table('bdtdc_limited_lime_offers')->where('product_id',$id)->get();
        //return $product_groups;
        // echo "<pre>";
        // print_r($data['categorys']);
        // echo "</pre>";
        $data['pages']=BdtdcPage::where('active',1)->get();


        return view('protected.admin.supplier.product_edit',$data, array('country'=>$country,'prices'=>$prices,'units'=> $units,'product'=>$product, 'products'=> $products, 'attributes'=>$attributes,'supplier_product'=> $supplier_product,'product_price'=>$product_price,'product_image'=>$product_image,'product_images'=>$product_images,'product_groups'=>$product_groups,'bdtdc_logistic_infos'=>$bdtdc_logistic_infos,'bdtdc_product_to_wholesale_category'=>$bdtdc_product_to_wholesale_category,'bdtdc_limited_lime_offers'=>$bdtdc_limited_lime_offers,'product_description'=>$product_description,'id'=>$id));
    }
    public function post_product_update(Request $request, $id){
       
        // dd($request->input('deleted_trade_id'));
        if(Sentinel::getUser()){
        }else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }
        $user_id = Sentinel::getUser()->id;

        $company=BdtdcCompany::where('user_id',$user_id)->first();

        $product_description = BdtdcProductToCategory::where('product_id',$id)->first();
        $supplier_id = BdtdcSupplierProduct::select('supplier_id')->where('product_id', $product_description->product_id)->first();
        $supplierId =$supplier_id->supplier_id;
        $company_id = $product_description->company_id;
        if(!$product_description || ($product_description->company_id != $company_id)){
            Sentinel::logout();
            return  redirect('login')->withFlashMessage('Please sign in!');
        }

        /*$validator = Validator::make($request->all(), [
            'product_name' => 'required|max:10000',
            'parent_category' => 'required|integer|max:10000000',
            'sub_category' => 'required|integer|max:10000000',
            'product_meta_keywords' => 'required|max:10000',
            'product_meta_tag' => 'required|max:10000',
            'product_model' => 'required|max:1000',
            'brand_name' => 'required|max:1000',
            'country' => 'required|integer|not_in:0|max:10000000',
            'processing_time' => 'required|integer|max:10000',
            'port' => 'required|max:10000',
            'supply_ability' => 'required|integer|max:10000000',
            'product_groups' => 'required|max:10000000',
            'packages_delivery' => 'required|max:10000',
            'product_description' => 'required|max:10000000',
            'others_payment' => 'max:1000',
            'unit_type' => 'max:10000000|integer',
        ]);*/

        $validator = Validator::make($request->all(), [
            'product_name' => 'required|max:10000',
            'parent_category' => 'required|integer|max:10000000|not_in:0',
            'sub_category' => 'required|integer|max:10000000|not_in:0',
            'product_meta_keywords' => 'required|max:10000',
            'product_model' => 'required|max:1000',
            'brand_name' => 'required|max:1000',
            'country' => 'required|integer|not_in:0|max:10000000',
            'product_att_name.*' => 'min:1|max:1000',
            'product_att_value.*' => 'min:2|max:2000',
            'processing_time' => 'required|integer|max:10000',
            'port' => 'required|max:10000',
            'supply_ability' => 'required|integer|max:10000000',
            'product_groups' => 'required|max:10000000|not_in:0',
            'payment.*' => 'min:1|max:100',
            'packages_delivery' => 'required|max:10000',
            'product_description' => 'required|max:10000000',
            'others_payment' => 'max:1000',
            'unit_type' => 'max:10000000|integer',
            'product_images.*' => 'max:2048|mimes:jpg,jpeg,png',
        ],['product_images'=>'At least one product image is required']);

        if ($validator->fails()) {
            // return $validator->errors()->all();
            return back()->withErrors($validator)->withInput();
        }else{}
        if($request->is_limited_time_offer == true){
            $validator = Validator::make($request->all(), [
                'percentage' => 'required|numeric|max:1000',
                'offer_from' => 'required|date',
                'offer_to' => 'required|date',
            ]);
            if ($validator->fails()) {
                // return $validator->errors()->all();
                return back()->withErrors($validator)->withInput();
            }
        }else{}
        $attr_val_loop = count([$request->product_att_name]);
        for ($i=0; $i < $attr_val_loop+1; $i++) {
            $validator = Validator::make($request->all(), [
                'product_att_name.'.$i => 'max:1000',
                'product_att_value.'.$i => 'max:2000',
                ]);
            if ($validator->fails()) {
                // return $validator->errors()->all();
                return back()->withErrors($validator)->withInput();
            }
        }
        if($request->base == 'based_quantity'){
            $based_quantity_loop = count($request->product_MOQ);
            for ($j=0; $j < $based_quantity_loop+1; $j++) {
                $validator = Validator::make($request->all(), [
                    'product_MOQ.'.$j => 'max:10000000',
                    'product_FOB_from.'.$j => 'numeric|max:10000000',
                    'product_FOB_to.'.$j => 'numeric|max:10000000',
                    ]);
                if ($validator->fails()) {
                    // return $validator->errors()->all();
                    return back()->withErrors($validator)->withInput();
                }
            }
        }else{
            $validator = Validator::make($request->all(), [
                'currencies' => 'required|max:10000000',
                'currency_from' => 'max:10000000|numeric',
                'currency_to' => 'max:10000000|numeric',
                'unit_type_FOB' => 'integer|max:10000000',
                'product_MOQ_FOB' => 'max:10000000',
                'discounted_price' => 'numeric|max:10000000',
                ]);
            if ($validator->fails()) {
                // return $validator->errors()->all();
                return back()->withErrors($validator)->withInput();
            }
        }
        $payment_loop = count($request->payment);
        for ($k=0; $k < $payment_loop+1; $k++) {
            $validator = Validator::make($request->all(), [
                'payment.'.$k => 'max:1000',
                ]);
            if ($validator->fails()) {
                // return $validator->errors()->all();
                return back()->withErrors($validator)->withInput();
            }
        }

        $payment = [];
        if($request->input('payment')){
            $payment = $request->input('payment');
        }
        if($payment){
            if (in_array("others", $payment)) {
                $key = array_search('others', $payment);
                $payment[$key] = $request->others_payment;
            }
        }

        // dd($request->all());
        $response_to_client = [];
        
        // bdtdc_product update start
        $product_data = [
            'model'       => $request->input('product_model'),
            'brandname' => $request->input('brand_name'),
            'location' => $request->input('country'),
            'payment_method'   => ($payment) ? implode(',',$payment) : null,
            'product_groups' =>$request->input('product_groups'),
            'unit_type_id' => $request->input('unit_type'),
            'delivery' => $request->input('packages_delivery'),
        ];

        if($request->base == 'based_FOB'){
                $product_data['unit_type_id'] = $request->unit_type_FOB;
        }

        $product_details_id = DB::table('bdtdc_product')->where('id', $id)->update($product_data);
        // bdtdc_product update end

        //bdtdc_product_description update start
        $product_description_data = [
            'name'       => $request->input('product_name'),
            'description' => $request->input('product_description'),
            'meta_keyword' => $request->input('product_meta_keywords'),
            'tag' => $request->input('product_meta_tag'),
        ];
        $product_description = DB::table('bdtdc_product_description')->where('product_id', $id)->update($product_description_data);
        //bdtdc_product_description update end

        //bdtdc_product_to_category & wholesale_category update start
        $product_to_category_data = [
            'category_id'   => $request->input('sub_category'),
            'parent_id'   => $request->parent_category,
            'country_id'   => $request->country,
        ];
        $product_to_category = DB::table('bdtdc_product_to_category')->where('product_id', $id)->update($product_to_category_data);

        if($request->is_wholesale_product == true){
            if(DB::table('bdtdc_product_to_wholesale_category')->where('product_id', $id)->first()){
                $bdtdc_product_to_wholesale_category_data = [
                    'category_id'   => $request->input('sub_category'),
                    'parent_id'   => $request->parent_category,
                    'country_id'   => $request->country,
                ];
                $product_description = DB::table('bdtdc_product_to_wholesale_category')->where('product_id', $id)->update($bdtdc_product_to_wholesale_category_data);
            }else{
                $bdtdc_product_to_wholesale_category_data = [
                    'product_id' => $id,
                    'category_id'   => $request->sub_category,
                    'parent_id'   => $request->parent_category,
                    'company_id'   => $company_id,
                    'country_id'   => $request->country,
                ];
                $product_description = DB::table('bdtdc_product_to_wholesale_category')->insert($bdtdc_product_to_wholesale_category_data);
            }
        }else{
            DB::table('bdtdc_product_to_wholesale_category')->where('product_id', $id)->delete();
        }

        if($request->is_limited_time_offer == true){
            if(DB::table('bdtdc_limited_lime_offers')->where('product_id', $id)->first()){
                $bdtdc_limited_lime_offers_data = [
                    'profit_percentage'   => $request->percentage,
                    'start_date'   => date("Y-m-d H:i:s",strtotime($request->offer_from)),
                    'end_date'   => date("Y-m-d H:i:s",strtotime($request->offer_to)),
                ];
                $product_description = DB::table('bdtdc_limited_lime_offers')->where('product_id', $id)->update($bdtdc_limited_lime_offers_data);
            }else{
                $bdtdc_limited_lime_offers_data = [
                    'product_id' => $id,
                    'company_id'   => $company_id,
                    'profit_percentage'   => $request->percentage,
                    'start_date'   => date("Y-m-d H:i:s",strtotime($request->offer_from)),
                    'end_date'   => date("Y-m-d H:i:s",strtotime($request->offer_to)),
                ];
                $product_description = DB::table('bdtdc_limited_lime_offers')->insert($bdtdc_limited_lime_offers_data);
            }
            
        }else{
            DB::table('bdtdc_limited_lime_offers')->where('product_id', $id)->delete();
        }
        //bdtdc_product_to_category & wholesale_category update end

        //bdtdc_logistic_infos update start
        $bdtdc_logistic_infos_array = [
            'product_id' => $id,
            'processing_time'   => $request->processing_time,
            'port' => $request->port,
            'supply_ability' => $request->supply_ability,
        ];
        $product_description = DB::table('bdtdc_logistic_infos')->where('product_id', $id)->update($bdtdc_logistic_infos_array);
        if(!$product_description){
            DB::table('bdtdc_logistic_infos')->insert($bdtdc_logistic_infos_array);
        }
        //bdtdc_logistic_infos update end

        //bdtdc_attributes old delete start
        $attributes_to_delete = BdtdcProductAttribute::where('product_id',$id)->get();
        if($attributes_to_delete){
            if(count($attributes_to_delete)>0){
                foreach ($attributes_to_delete as $attributes_to_delete_single) {
                    BdtdcAttribute::where('id',$attributes_to_delete_single->attribute_id)->delete();
                    BdtdcProductAttribute::where('id',$attributes_to_delete_single->id)->delete();
                }
            }
        }
        
        //bdtdc_attributes old delete end

        //bdtdc_attributes new insert start
        $attributes_details =[];
        $prev_attr_name_exists = [];
        for($i=0,$len=count($request->get('product_attr_name'));$i<$len;$i++){
            if($request->get('product_attr_name')[$i] != ""){
                if(in_array($request->get('product_attr_name')[$i], $prev_attr_name_exists)){}else{
                    $input_arr[$i]['name'] = $request->get('product_attr_name')[$i];
                    $input_arr[$i]['value'] = $request->get('product_attr_value')[$i];
                    $attributes_details[] = DB::table('bdtdc_attributes')->insertGetId($input_arr[$i]);
                    array_push($prev_attr_name_exists, $request->get('product_attr_name')[$i]);
                }
            }
        }
        //bdtdc_attributes new insert end

        //bdtdc_product_attribute new insert start
        $product_attribute = array();
        if(count($attributes_details)> 0){
            foreach($attributes_details as $data){
                $product_attribute = array(
                    'attribute_id' => $data,
                    'product_id' => $id,
                );
                $pro_attribute =DB::table('bdtdc_product_attribute')->insert($product_attribute);
            }
        }
        //bdtdc_product_attribute new insert end

        //BdtdcProductPrice update start
        if($request->base == 'based_FOB'){
            if($request->product_price_id_FOB[0] == 0){
                $input_price_update['currency'] = $request->currencies;
                $input_price_update['product_MOQ'] = $request->product_MOQ_FOB;
                $input_price_update['product_FOB'] = $request->currency_from.'-'.$request->currency_to;
                $input_price_update['discounted_price'] = $request->discounted_price;
                BdtdcProductPrice::create($input_price_update);
            }else{
                $input_price_update['currency'] = $request->currencies;
                $input_price_update['product_MOQ'] = $request->product_MOQ_FOB;
                $input_price_update['product_FOB'] = $request->currency_from.'-'.$request->currency_to;
                $input_price_update['discounted_price'] = $request->discounted_price;
                BdtdcProductPrice::where('id',$request->product_price_id_FOB[0])->update($input_price_update);
            }
        }else{
            $price_id_loop = count($request->product_price_id);
            for ($pr=0; $pr < $price_id_loop; $pr++) {
                if($request->product_price_id[$pr] == 0){
                    $input_price_insert['product_id']  = $id;
                    $input_price_insert['product_MOQ'] = $request->product_MOQ[$pr];
                    $input_price_insert['product_FOB'] = $request->product_FOB_from[$pr].'-'.$request->product_FOB_to[$pr];
                    BdtdcProductPrice::create($input_price_insert);
                }else{
                    $input_price_update['currency'] = '';
                    $input_price_update['product_MOQ'] = $request->product_MOQ[$pr];
                    $input_price_update['product_FOB'] = $request->product_FOB_from[$pr].'-'.$request->product_FOB_to[$pr];
                    $input_price_update['discounted_price'] = '';
                    BdtdcProductPrice::where('id',$request->product_price_id[$pr])->update($input_price_update);
                }
            }
        }
        if($request->input('deleted_trade_id')){
            foreach ($request->input('deleted_trade_id') as $trade_id_delete) {
                BdtdcProductPrice::where('id',$trade_id_delete)->delete();
            }
        }
        //BdtdcProductPrice update end

        //BdtdcProductImageNew new products images insert start
        $allowed_img_no = 6;
        $current_img =1;
        if($request->file('product_images')){
            if(count($request->file('product_images'))>0){
                foreach ($request->file('product_images') as $product_images_single) {
                    if($product_images_single){
                        $new_parent_cat_name = BdtdcCategory::where('id',$request->parent_category)->first();
                        $new_sub_cat_name = BdtdcCategory::where('id',$request->sub_category)->first();
                        if($new_parent_cat_name && $new_sub_cat_name){
                            if($current_img > $allowed_img_no){}else{
                            $parent_cat_id = $request->input('parent_category');
                            $sub_cat_id = $request->input('sub_category');
                            $pname = trim($request->input('product_name'));
                            //The name of the directory that we need to create.
                            $directoryName = 'bdtdc-product-image/'.trim($new_parent_cat_name->slug).'/'.trim($new_sub_cat_name->slug);

                            //Check if the directory already exists.
                            if(!is_dir($directoryName)){
                                //Directory does not exist, so lets create it.
                                //true for nested directory (need 0777 permission for this)
                                mkdir($directoryName, 0777, true);
                            }
                            if($pname == ''){
                                $string   = 'Product-image_'.$parent_cat_id."_".$sub_cat_id."_".str_random(10);
                            }else{
                                $string   = preg_replace('/[^A-Za-z0-9]/ ', '-',substr($pname,0,100)).'_'.$parent_cat_id."_".$sub_cat_id."_".str_random(10);
                            }
                            $temp_file  = $product_images_single;
                            $ext        = $product_images_single->getClientOriginalExtension();
                            $product_photo  = $string.'.'.$ext;
                            $dst = $directoryName.'/'.$product_photo;
                            move_uploaded_file($temp_file,$dst);
                            //insert image name to database
                            $img_arr = [
                                            'image' => $dst,
                                            'product_id' => $id,
                                        ];
                            BdtdcProductImageNew::create($img_arr);
                            $current_img++;
                            }
                        }
                    }
                }
            }
        }
        //BdtdcProductImageNew new products images insert end

        //BdtdcProductImageNew old products images delete start
        if($request->input('deleted_p_image_id')){
            if(count($request->input('deleted_p_image_id'))>0){
                foreach ($request->input('deleted_p_image_id') as $deleted_images_single) {
                    $image_to_delete = BdtdcProductImageNew::where('id',$deleted_images_single)->first();
                    if($image_to_delete){
                        if(file_exists($image_to_delete->image)){
                            @unlink($image_to_delete->image);
                        }
                    }
                    BdtdcProductImageNew::where('id',$deleted_images_single)->delete();
                }
            }
        }
        //BdtdcProductImageNew old products images delete end

        $response_to_client['success'] = true;
     
              $role =Role_user::where('user_id',Sentinel::getUser()->id)->first();
               
        
            if($role->role_id ==2){
                    // return Redirect::to('admin/product')->with('product_edit_success','Product updated successfully');
                    return Redirect::to('/admin/profiles/sellerproduct/'.$supplierId)->with('product_edit_success','Product updated successfully');

            }

        return Redirect::to('/admin/profiles/sellerproduct/'.$supplierId)->with('product_edit_success','Product updated successfully');

    }

    public function product_delete(ProductRequest $request, $id){
        if(Sentinel::getUser()){}else{
            return 'login';
        }
        $user_id = Sentinel::getUser()->id;
        if(Sentinel::inRole('admins')){
        }else{
            $company=BdtdcCompany::where('user_id',$user_id)->first();
            $company_id = $company->id;
            $product_description = BdtdcProductToCategory::where('product_id',$id)->first();
            if(!$product_description || ($product_description->company_id != $company_id)){
                Sentinel::logout();
                return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['SCRIPT_URL']))->withFlashMessage('You must first login before accessing this page.');
            }
        }
        
        DB::beginTransaction();
        
        try{
            $p_images = DB::table('bdtdc_product_images')->where('product_id',$id)->get();
            if($p_images){
                foreach ($p_images as $img_name) {
                    if(file_exists($img_name->image)){
                        (@unlink($img_name->image)) ? 'deleted!!' : 'was not able to deleted';
                    }
                }
            }
            
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            $pro_attr = DB::table('bdtdc_product_attribute')->where('product_id',$id)->get();
            if($pro_attr){
                foreach ($pro_attr as $attr_value) {
                    DB::table('bdtdc_attributes')->where('id',$attr_value->attribute_id)->delete();
                }
            }
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            DB::table('bdtdc_product')->where('id',$id)->delete();
            DB::table('bdtdc_product_description')->where('product_id',$id)->delete();
            DB::table('bdtdc_product_to_category')->where('product_id',$id)->delete();
            DB::table('bdtdc_product_to_wholesale_category')->where('product_id',$id)->delete();
            DB::table('bdtdc_limited_lime_offers')->where('product_id',$id)->delete();
            DB::table('bdtdc_logistic_infos')->where('product_id',$id)->delete();
            DB::table('bdtdc_product_prices')->where('product_id',$id)->delete();
            DB::table('bdtdc_product_image')->where('product_id',$id)->delete();
            DB::table('bdtdc_product_images')->where('product_id',$id)->delete();
            DB::table('bdtdc_product_attribute')->where('product_id',$id)->delete();
            DB::table('bdtdc_supplier_products')->where('product_id',$id)->delete();
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        catch(\Exception $e)
        {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect::back()->with('success', 'Product Deleted Successfully');
    }
    
}
