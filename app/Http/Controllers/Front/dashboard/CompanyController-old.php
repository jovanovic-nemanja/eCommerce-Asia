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
use App\Model\BdtdcWholesaleCategory;
use App\BdtdcFormValue;

use Input;
use View;
use Sentinel;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcSupplier;
use App\Model\Role_user;
use App\Model\BdtdcProductImage;
use App\Model\BdtdcPageSeo;
use App\Model\BdtdcCustomer;
use App\Model\BdtdcCustomerActivity;
use App\Model\BdtdcTemplateSection;
use App\Model\OrderShippingTerm;
use App\Model\Notice;

class CompanyController extends Controller
{
    
    public function index($section=false){
        if(Sentinel::check())
        {
//            print_r(Sentinel::getUser());
//            exit;
            $user_id = Sentinel::getUser()->id;
            $role = Role_user::where('user_id',$user_id)->first();
            $company=BdtdcCompany::where('user_id',$user_id)->first();
            if($company){
                $company_id=$company->id;
            }else{
                $company_id = BdtdcCompany::insertGetId(['user_id'=>$user_id]);
                BdtdcCompanyDescription::insert(['company_id'=>$company_id,'name'=>'Not Available']);
            }

            if(BdtdcCompanyDescription::where('company_id',$company_id)->first()){}else{
                BdtdcCompanyDescription::insert(['company_id'=>$company_id,'name'=>'not available']);
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
             if($role->role_id == 4){
                // dd(123);
                if($section == 'product' || 'template_setting'){
                    $data['error']='Permission deney';
                    return View::make('error.bdtdc-agencies',$data);
                }
            }

            if($role->role_id == 3){
                $supplier = DB::table('bdtdc_suppliers as bs')
                    ->join('users as u','u.id','=','bs.user_id')
                    ->join('bdtdc_companies as bc','bc.user_id','=','bs.user_id')
                    ->join('bdtdc_customer as bcu','bcu.user_id','=','bs.user_id')
                    ->join('bdtdc_company_descriptions as bcd','bcd.company_id','=','bc.id')
                    ->where('bs.user_id',$user_id)
                    ->first();
                $supplier_product = BdtdcProductToCategory::with(['pro_to_cat_name','bdtdcProduct','BdtdcCategoryDescription','BdtdcSupplierProduct'])->whereHas('supp_pro_company',function($subQuery)use($user_id){
                        $subQuery->where('user_id',$user_id);
                    })
                    ->paginate(10);  
                $template_setting_section = BdtdcTemplateSection::get();
                $template_setting_data = DB::table('bdtdc_template_settings as bts')
                    ->join('bdtdc_template_sections as btsec','btsec.id','=','bts.section_id')
                    ->where('bts.company_id',$company_id)
                    ->get(['bts.id','bts.section_id','bts.back_image','bts.title_logo','bts.back_color','bts.font_color','bts.is_show_image','bts.is_show_color','bts.height','bts.width','bts.company_id','btsec.section_name','btsec.slug']);
            }
            else if($role->role_id == 4){
                $supplier = DB::table('users as u')
                    ->join('bdtdc_customer as bcu','bcu.user_id','=','u.id')
                    ->join('bdtdc_companies as bc','bc.user_id','=','u.id')
                    ->join('bdtdc_company_descriptions as bcd','bcd.company_id','=','bc.id')
                    ->where('u.id',$user_id)
                    ->first();
            }
            
            $favorite_product=BdtdcCustomerActivity::with('bdtdc_product','bdtdc_product_category')
                            ->where('customer_id',$user_id)->get();
        
            $header=BdtdcPageSeo::where('page_id',101)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;

            $role_id = $role->role_id;
            $data['notices'] = Notice::where('notice_type', 1)
            ->orWhere(function ($query) use($role_id){
                $query->where('notice_type', 2)->whereHas('notice_details', function ($query2) use($role_id){
                    $query2->where('user_role_id', $role_id);
                });
            })->orWhere(function ($query) use($user_id){
                $query->where('notice_type', 3)->whereHas('notice_details', function ($query2) use($user_id){
                    $query2->where('user_id', $user_id);
                });
            })->orderBy('id', 'DESC')->paginate(20);


            return View::make('fontend.supplier.dashboard',$data,compact(['supplier','supplier_product','template_setting_data','section','template_setting_section','favorite_product','role_id']));

        }
        else{
            return Redirect::to('login')->withFlashMessage('Please sign in first.');
        }
            
    }
    
    public function noticeView($notice_id){
        
        if(Sentinel::check())
        {
            $data['notice'] = Notice::find($notice_id);

            if(is_null($data['notice'])){
                return back()->withErrors('Notice is not exist.');
            }

            return View::make('fontend.supplier.notice_view',$data);
        }
        else{
            return Redirect::to('login')->withFlashMessage('Please sign in first.');
        }
    }

    public function post_shipping_address(Request $request){
        $data=array();
        if(Sentinel::check()){
            $validator = Validator::make($request->all(), [
                'contact_name' => 'required|max:255',
                'address1' => 'required|max:255',
                'address2' => 'max:255',
                'country' => 'required|integer',
                'state' => 'max:255',
                'city' => 'max:255',
                'postal_code' => 'required|string|min:3|max:20',
                'phone' => 'nullable|min:6|max:15',
                'gross_weight' => 'nullable|string',
                'gross_volume' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                $data['status'] = 0;
                $data['error'] = $validator->errors()->all();
            }else{
                $user_id = Sentinel::getUser()->id;
                $insert_arr_data =[
                    'user_id'   => $user_id,
                    'contact_name'       => $request->input('contact_name'),
                    'address1'           => $request->input('address1'),
                    'address2'           => $request->input('address2'),
                    'country'          => $request->input('country'),
                    'state'       => $request->input('state'),
                    'city'     => $request->input('city'),
                    'postal_code'   => $request->input('postal_code'),
                    'phone'      => $request->input('phone'),
                    'gross_weight'      => $request->input('gross_weight'),
                    'gross_volume'      => $request->input('gross_volume'),
                ];

                $shipping_address = $request->input('address1').','.$request->input('address2').','.$request->input('city').','.$request->input('state').','.$request->input('country');

                $response = OrderShippingTerm::insertGetId($insert_arr_data);
                $data['status'] = 1;
                $data['message'] = 'Shipping address stored successfully';
                $data['shipping_address'] = $shipping_address;
                $data['shipping_address_id'] = $response;
            }
        }else{
            $data['status'] = 0;
            $data['error'] = 'Please Login First and try again';
        }

        echo json_encode($data);
    }

    public function get_verified(){
        return View::make('fontend.get-verified');
    }

    public function store(Request $r){

        $user_id = Sentinel::getUser()->id;
        $insert_arr_data =[
            'location_of_reg'   => $r->get('location_of_reg'),
            'year_of_reg'       => $r->get('year_of_reg'),
            'city'              => $r->get('city'),
            'region'            => $r->get('region'),
            'zip_code'          => $r->get('zip_code'),
            'postal_code'       => $r->get('postal_code'),
            'total_employe'     => $r->get('total_employe'),
            'company_website'   => $r->get('company_website'),
            'office_suite'      => $r->get('office_suite'),
        ];

        BdtdcCompany::where('user_id',$user_id)->update($insert_arr_data);

        for($i=0,$len=count($r->get('product_name'));$i<$len;$i++){
            $arr[$i]['supplier_id']     = $user_id;
            $arr[$i]['product_name']    = $r->get('product_name')[$i];
            BdtdcSupplierMainProduct::create($arr[$i]);
        }


        return Redirect::back()->with('update_msg','Information Saved!');


        return $insert_arr_data;

    }
    public function post_personal_info(ValidationController $r){

        $user_id = Sentinel::getUser()->id;
        $profile_pic = User::where('id',$user_id)->first(['profile_picture'])->profile_picture;
        $company_logo = User::find($user_id)->company->company_description->company_logo;
        //return $profile_pic;
        if($r->file('profile_picture')){
            $string 	= "profile_pic_".str_random(10);
            $temp_file 	= $_FILES['profile_picture']['tmp_name'];
            $ext 		= pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
            $profile_pic 	= ($profile_pic == null || $profile_pic == "no_images") ? $string.'.'.$ext : $profile_pic;
            if(move_uploaded_file($temp_file,'uploads/'.$profile_pic)){
                $data['img_msg'] = "Image uploaded";
            }
            else{
                $profile_pic = "no_image";
            }
         }
        if($r->file('company_logo')){
            $string 	= "company_logo_".str_random(10);
            $temp_file 	= $_FILES['company_logo']['tmp_name'];
            $ext 		= pathinfo($_FILES['company_logo']['name'], PATHINFO_EXTENSION);
            $company_logo 	= ($company_logo == null || $company_logo == "no_images") ? $string.'.'.$ext : $company_logo;
            if(move_uploaded_file($temp_file,'uploads/'.$company_logo)){
                $data['img_msg'] = "Image uploaded";
            }
            else{
                $data['img_msg'] = "Image couldn't be uploaded";
            }
        }

        $update_personal_info = [
            'first_name' => $r->get('first_name'),
            'last_name' => $r->get('last_name'),
            'profile_picture' => $profile_pic,
        ];
        User::find($user_id)->update($update_personal_info);

        $company_logo_arr = ['company_logo'=>$company_logo];
        //return $company_logo_arr;
        User::find($user_id)->company->company_description->update($company_logo_arr);


        return Redirect::back()->with('profile_update_msg','Profile saved!');

        //return $profile_pic . ', '. $company_logo;

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
        $modules=DB::table('modules')
            ->where('parent_id','0')
            ->get();
        foreach ($modules as $module) {

            $children_data = array();

            $childrens = DB::table('modules')
                ->where('parent_id',$module->id)
                ->get();
            foreach ($childrens as $children) {
                # code...
                $children_data[] = array(
                    'name'  => $children->name,
                    'icon1'  =>  $children->icon1,
                    'icon2'  =>  $children->icon2,
                    'slug'  =>  $children->slug,
                    'css_class'  =>  $children->css_class
                );

            }
            $data['modules'][] = array(
                'name'     => $module->name,
                'parent_icon1'=>$module->icon1,
                'parent_icon2'=>$module->icon2,
                'childrens' => $children_data,
                'parent_slug'  =>$module->slug
            );

        }

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
        $country = Country::lists('name','id');
        $language = Language::lists('name','language_id');
        //return $country;
        return view('fontend.supplier.product_create',$data, array('country'=>$country, 'units'=> $units));
    }

    public function post_product_create(ProductRequest $request){
        
        //return $request->all();
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $company_id=$company->id;
        $response_to_client = [];
        DB::beginTransaction();
        try {
           
            
            //dd($file_name);
            $insert_data = [
                'model'         => $request->product_model[0],
                'brandname'     => $request->brand_name[0],
                'location'      => $request->country[0],
                
                'payment_method'   => ($request->payment) ? implode(',',$request->payment) : null,
                'unit_type_id' => $request->unit_type[0],
                'product_groups' =>$request->product_groups[0],
            ];
            
            //return $insert_data;
            $product_details_id = DB::table('bdtdc_product')->insertGetId( $insert_data );
            $response_to_client['model'] = $request->product_model[0];
            $response_to_client['brandname'] = $request->brand_name[0];
            $response_to_client['product_id'] = $product_details_id;
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{

            $insert_data = [
                'product_id' => $product_details_id,
                'name'       => $request->product_name[0],
                'description' => $request->product_description[0],
                'meta_keyword' => $request->product_meta_keywords[0],
            ];
            //return $insert_data;
            $product_description = DB::table('bdtdc_product_description')->insertGetId($insert_data);
            $response_to_client['product_name'] = $request->product_name[0];
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{

            $insert_data = [
                'product_id' => $product_details_id,
                'category_id'   => $request->sub_category[0],
            ];
            //return $insert_data;
            
            $product_description = DB::table('bdtdc_product_to_category')->insert($insert_data);
            $response_to_client['category'] = BdtdcCategory::where('id',$request->sub_category[0])->first(['name'])->name;
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            $attributes_details =[];
            for($i=0,$len=count($request->get('product_att_name'));$i<$len;$i++){
                if($request->get('product_att_name')[$i] != ""){
                    $input_arr[$i]['name'] = $request->get('product_att_name')[$i];
                    $input_arr[$i]['value'] = $request->get('product_att_value')[$i];
                    $attributes_details[] = DB::table('bdtdc_attributes')->insertGetId($input_arr[$i]);
                }
                
            }
            //return $input_arr[0];
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            $product_attribute = array();
            if(count($attributes_details)> 0){
                foreach($attributes_details as $data){
                    $product_attribute[] = array(
                        'attribute_id' => $data,
                        'product_id' => $product_details_id,
                    );
                    $pro_attribute =DB::table('bdtdc_product_attribute')->insert($product_attribute);
                }   
            }
        }
        catch(ValidationException $e){
            DB::rollback();
        }
        try{
            $input_price = [];
            
            for($i=0,$len=count($request->product_MOQ);$i<$len;$i++){
                if($request->product_MOQ[$i] != ""){
                    $input_price[$i]['product_id']  = $product_details_id; 
                    $input_price[$i]['product_MOQ'] = $request->product_MOQ[$i];
                    $input_price[$i]['product_FOB'] = $request->product_FOB[$i];
                    DB::table('bdtdc_product_prices')->insert($input_price[$i]);   
                }
            }
            //return $input_price;

          
        }
        catch(ValidationException $e){
            DB::rollback();
        }
        
        
        try{
            if($request->p_image){
                $img_arr = [];
                for($i=0,$len=count($request->p_image);$i<$len;$i++){
                    $img_arr[$i]['image']       = $request->p_image[$i];
                    $img_arr[$i]['product_id']  = $product_details_id;
                    BdtdcProductImage::create($img_arr[$i]);
                }
                
            }
            
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
        $units = BdtdcProductUnit::all();

        $supplier_product_arr =[
            'product_id' => $product_details_id,
            'supplier_id' => Sentinel::getUser()->id,
            'number_sold' => 0,
            'product_status' => 0,
            'product_approved' => 0,
        ];
       
        BdtdcSupplierProduct::create($supplier_product_arr);
        return $response_to_client;
        //return Redirect::back()->with('supplier_product_mag','Product saved');

    }

    public function post_section_create(ProductRequest $request){
        
        return $request->all();
        
    }

    public function post_wholesale_product_create(ProductRequest $request){
        
        return $request->all();
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $company_id=$company->id;
        $response_to_client = [];
        //dd()
        DB::beginTransaction();
        try {
           
            
            //dd($file_name);
            $insert_data = [
                'model'         => $request->product_model[0],
                'brandname'     => $request->brand_name[0],
                'location'      => $request->country[0],
                
                'payment_method'   => ($request->payment) ? implode(',',$request->payment) : null,
                'unit_type_id' => $request->unit_type[0],
                'product_groups' =>$request->product_groups[0],
            ];
            
            //return $insert_data;
            $product_details_id = DB::table('bdtdc_product')->insertGetId( $insert_data );
            $response_to_client['model'] = $request->product_model[0];
            $response_to_client['brandname'] = $request->brand_name[0];
            $response_to_client['product_id'] = $product_details_id;
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{

            $insert_data = [
                'product_id' => $product_details_id,
                'name'       => $request->product_name[0],
                'description' => $request->product_description[0],
                'meta_keyword' => $request->product_meta_keywords[0],
            ];
            //return $insert_data;
            $product_description = DB::table('bdtdc_product_description')->insertGetId($insert_data);
            $response_to_client['product_name'] = $request->product_name[0];
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{

            $insert_data = [
                'product_id' => $product_details_id,
                'category_id'   => $request->sub_category[0],
            ];
            //return $insert_data;
            
            $product_wholesale = DB::table('bdtdc_product_to_wholesale_category')->insert($insert_data);
            //dd($product_wholesale);
            $response_to_client['category'] = BdtdcWholesaleCategory::where('id',$request->sub_category[0])->first(['name'])->name;
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            $attributes_details =[];
            for($i=0,$len=count($request->get('product_att_name'));$i<$len;$i++){
                if($request->get('product_att_name')[$i] != ""){
                    $input_arr[$i]['name'] = $request->get('product_att_name')[$i];
                    $input_arr[$i]['value'] = $request->get('product_att_value')[$i];
                    $attributes_details[] = DB::table('bdtdc_attributes')->insertGetId($input_arr[$i]);
                }
                
            }
            //return $input_arr[0];
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            $product_attribute = array();
            if(count($attributes_details)> 0){
                foreach($attributes_details as $data){
                    $product_attribute[] = array(
                        'attribute_id' => $data,
                        'product_id' => $product_details_id,
                    );
                    $pro_attribute =DB::table('bdtdc_product_attribute')->insert($product_attribute);
                }   
            }
        }
        catch(ValidationException $e){
            DB::rollback();
        }
        try{
            $input_price = [];
            
            for($i=0,$len=count($request->product_MOQ);$i<$len;$i++){
                if($request->product_MOQ[$i] != ""){
                    $input_price[$i]['product_id']  = $product_details_id; 
                    $input_price[$i]['product_MOQ'] = $request->product_MOQ[$i];
                    $input_price[$i]['product_FOB'] = $request->product_FOB[$i];
                    DB::table('bdtdc_product_prices')->insert($input_price[$i]);   
                }
            }
            //return $input_price;

          
        }
        catch(ValidationException $e){
            DB::rollback();
        }
        
        
        try{
            if($request->p_image){
                $img_arr = [];
                for($i=0,$len=count($request->p_image);$i<$len;$i++){
                    $img_arr[$i]['image']       = $request->p_image[$i];
                    $img_arr[$i]['product_id']  = $product_details_id;
                    BdtdcProductImage::create($img_arr[$i]);
                }
                
            }
            
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
        $units = BdtdcProductUnit::all();

        $supplier_product_arr =[
            'product_id' => $product_details_id,
            'supplier_id' => Sentinel::getUser()->id,
            'number_sold' => 0,
            'product_status' => 0,
            'product_approved' => 0,
        ];
       
        BdtdcSupplierProduct::create($supplier_product_arr);
        return $response_to_client;
        //return Redirect::back()->with('supplier_product_mag','Product saved');
    }


    public function product_edit($id){
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $company_id = $company->id;
        $countries = DB::select('select * from bdtdc_country');

        foreach($countries as $country){
            $country_data[$country->id]=$country->name;
        }
        $data['modules']=array();
        $modules=DB::table('modules')
            ->where('parent_id','0')
            ->get();
        foreach ($modules as $module) {

            $children_data = array();

            $childrens = DB::table('modules')
                ->where('parent_id',$module->id)
                ->get();
            foreach ($childrens as $children) {
                # code...
                $children_data[] = array(
                    'name'  => $children->name,
                    'icon1'  =>  $children->icon1,
                    'icon2'  =>  $children->icon2,
                    'slug'  =>  $children->slug,
                    'css_class'  =>  $children->css_class
                );

            }
            $data['modules'][] = array(
                'name'     => $module->name,
                'parent_icon1'=>$module->icon1,
                'parent_icon2'=>$module->icon2,
                'childrens' => $children_data,
                'parent_slug'  =>$module->slug
            );

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
        $country = Country::lists('name','id');
        $products = BdtdcProduct::with(['product_name','category',])
            ->where('id', $id)
            ->get();
        //return $products[0]['category']->category_id;
        $attributes = BdtdcProductAttribute::with(['bdtdcAttribute'])
            ->where('product_id', $id)
            ->get();
        $prices=BdtdcProductPrice::where('product_id',$id)->first();
        $supplier_product = DB::table('bdtdc_product as p')
            ->join('bdtdc_product_description as pd','pd.product_id','=','p.id')
            ->where('p.id',$id)
            ->first();
        $product_price = DB::table('bdtdc_product_prices')->where('product_id',$id)->get();
        $product_image = DB::table('bdtdc_product_image')->where('product_id',$id)->get();
        $product_groups=DB::table('bdtdc_supplier_product_groups')->where('company_id',$company_id)->get();
        //return $product_groups;
        return view('fontend.supplier.product_edit',$data, array('country'=>$country,'prices'=>$prices,'units'=> $units, 'products'=> $products, 'attributes'=>$attributes,'supplier_product'=> $supplier_product,'product_price'=>$product_price,'product_image'=>$product_image,'product_groups'=>$product_groups));
    }

    public function post_product_update(ValidationController $request, $id){
        //return $request->all();
        DB::beginTransaction();
        try {
            $file_name = BdtdcProduct::where('id',$id)->first(['image'])->image;
            //return $file_name;
            $insert_data = [
                'model'       => $request->product_model,
                'brandname' => $request->brand_name,
                'location' => $request->country,
                'payment_method'   => ($request->payment) ? implode(',',$request->payment) : null,
                'product_groups' =>$request->product_groups,
                'unit_type_id' => $request->unit_type,
            ];
            $product_details_id = DB::table('bdtdc_product')->where('id', $id)->update($insert_data);
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            $insert_data = [
                'name'       => $request->product_name,
                'description' => $request->product_description,
                'tag' => $request->product_tags,
                'meta_title' => $request->product_meta_title,
                'meta_description' => $request->product_meta_description,
                'meta_keyword' => $request->product_meta_keywords,
            ];
            $product_description = DB::table('bdtdc_product_description')->where('product_id', $id)->update($insert_data);
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            $insert_data = [
                'category_id'   => $request->categories,
            ];
            $product_description = DB::table('bdtdc_product_to_category')->where('product_id', $id)->update($insert_data);
        }
        catch(ValidationException $e){
            DB::rollback();
        }
        
        try{
            $input_price = [];
            for($i=0,$len=count($request->product_price_id);$i<$len;$i++){
                if($request->get('product_price_id')[$i] != 0){
                    $input_price[$i]['product_MOQ'] = $request->product_MOQ[$i];
                    $input_price[$i]['product_FOB'] = $request->product_FOB[$i];
                    BdtdcProductPrice::where('id',$request->product_price_id[$i])->update($input_price[$i]);
                }else{
                    $input_price_insert[$i]['product_id']  = $id;
                    $input_price_insert[$i]['product_MOQ'] = $request->product_MOQ[$i];
                    $input_price_insert[$i]['product_FOB'] = $request->product_FOB[$i];
                    BdtdcProductPrice::create($input_price_insert[$i]);
                }
            }
            //return $input_price[1];
           

          
        }
        catch(ValidationException $e){
            DB::rollback();
        }
        
        
        try{
            $attr_id = $request->get('attr_id');
            for($i=0,$len=count($request->get('product_att_name'));$i<$len;$i++){
                if($request->get('attr_id')[$i] == 0){
                    $attribute_insert_arr[$i]['name'] = $request->get('product_att_name')[$i];
                    $attribute_insert_arr[$i]['value'] = $request->get('product_att_value')[$i];
                    
                    $attributes_id = DB::table('bdtdc_attributes')->insertGetId($attribute_insert_arr[$i]);
                    $product_attribute = [
                        'attribute_id' => $attributes_id,
                        'product_id' => $id,
                    ];
                    DB::table('bdtdc_product_attribute')->insert($product_attribute);
                }else{
                    $attribute_arr[$i]['name'] = $request->get('product_att_name')[$i];
                    $attribute_arr[$i]['value'] = $request->get('product_att_value')[$i];
                    $attributes_details = BdtdcAttribute::find($request->get('attr_id')[$i])->update($attribute_arr[$i]);
                }
            }
           

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

         return Redirect::back()->with('supplier_product_mag','Product updated!');
    }

    public function section_create(){
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
        $modules=DB::table('modules')
            ->where('parent_id','0')
            ->get();
        foreach ($modules as $module) {

            $children_data = array();

            $childrens = DB::table('modules')
                ->where('parent_id',$module->id)
                ->get();
            foreach ($childrens as $children) {
                # code...
                $children_data[] = array(
                    'name'  => $children->name,
                    'icon1'  =>  $children->icon1,
                    'icon2'  =>  $children->icon2,
                    'slug'  =>  $children->slug,
                    'css_class'  =>  $children->css_class
                );

            }
            $data['modules'][] = array(
                'name'     => $module->name,
                'parent_icon1'=>$module->icon1,
                'parent_icon2'=>$module->icon2,
                'childrens' => $children_data,
                'parent_slug'  =>$module->slug
            );

        }

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
        $country = Country::lists('name','id');
        $language = Language::lists('name','language_id');
        //return $country;
        return view('fontend.supplier.section_create',$data, array('country'=>$country, 'units'=> $units));
    }


    public function company_profile($id){
        $supplier=BdtdcSupplier::with(['supplier_package','supplier_products','package_name','main_products','business_types'])
            ->where('id',$id)->first();
        //        $products=BdtdcSupplierProduct::with(['suppliers','products'])
        //            ->where('supplier_id',$id)
        //            ->get();
        $company = DB::table('bdtdc_companies as c select ')
            ->join('bdtdc_company_descriptions as cd','cd.company_id','=','c.id')
            ->join('bdtdc_country as country','country.id','=','c.location_of_reg')
            ->join('bdtdc_suppliers as s','s.user_id','=','c.user_id')
            ->join('bdtdc_busines_types as bt','bt.id','=','s.busines_type_id')
            ->where('c.user_id',$id)
            ->first([
                'c.id as company_id','cd.name as company_name','country.name as country_name',
                'c.year_of_reg','country.name as location_of_reg','c.zip_code','c.total_employe',
                'bt.name as business_type_name'
            ]);
        $products = DB::table('bdtdc_supplier_products as sp')
            ->join('bdtdc_product as p','p.id','=','sp.product_id')
            ->join('bdtdc_product_description as pd','pd.product_id','=','p.id')
            ->where('sp.supplier_id',$id)
            ->get(['p.id as product_id','pd.name as product_name','p.image','p.price']);
        $main_products = DB::table('bdtdc_supplier_main_products')->where('supplier_id',$id)->get(['product_name']);
        //return $products;
        return View::make('fontend.supplier.profile',compact(['products','company','main_products']));
    }

    public function get_product_show($id){
        //return "product_". $id;
        $products = DB::table('bdtdc_product as p')
            ->join('bdtdc_product_description as pd','pd.product_id','=','p.id')
            ->join('bdtdc_supplier_products as bsp','bsp.product_id','=','p.id')
            ->join('bdtdc_supplier_products as sp','sp.product_id','=','p.id')
            ->join('bdtdc_country as origin','origin.id','=','p.location','left')
            ->join('users as u','u.id','=','sp.supplier_id')
            ->join('bdtdc_companies as company','company.user_id','=','u.id')
            ->join('bdtdc_company_trade_info as trade','trade.company_id','=','company.id','left')
            ->join('bdtdc_company_factory_info as factory','factory.company_id','=','company.id','left')
            ->join('bdtdc_company_descriptions as company_description','company_description.company_id','=','company.id')
            ->join('bdtdc_country as country','country.id','=','company.location_of_reg','left')
            ->join('bdtdc_product_unit as unit','unit.id','=','p.unit_type_id')
            ->join('bdtdc_suppliers as s','s.user_id','=','u.id')
            ->join('bdtdc_busines_types as busines_type','busines_type.id','=','s.busines_type_id','left')
            ->join('bdtdc_form_values as key_word','key_word.id','=','trade.anual_sales_volume','left')
            ->join('bdtdc_form_values as key_year_expor','key_year_expor.id','=','trade.export_percentage','left')
            ->join('bdtdc_product_image as p_image','p_image.product_id','=','p.id','left')
            ->where('p.id',$id)
            ->first(['p.id as product_id','pd.description as pro_descript','p_image.image as image','origin.name as origins','p.model','pd.name','sp.supplier_id as supplier_id','p.quantity','p.brandname as brand','u.first_name as fname','u.last_name as lname',
            'bsp.supplier_id','company_description.name as company_name','company.id as company_id',
            'country.name as location_of_reg','company.year_of_reg as year_of_reg','unit.name as units','busines_type.name as busines_type_name'
            
            
            ]);
            $company_ids=$products->supplier_id;
            $prices=BdtdcProductPrice::where('product_id',$id)->first();
            $main_products=BdtdcSupplierMainProduct::where('supplier_id',$company_ids)->get();
            $images=BdtdcProductImage::where('product_id',$id)->get();
            $units=DB::table('bdtdc_product_unit')->get();
        //dd($main_products);
        return view('fontend.supplier.product_details_view',compact(['images','products','prices','main_products','units']));
    }

    public function message(Request $request)
    {
        /*$product= new product;*/
        $units = DB::table('bdtdc_product_unit')->get();
        //dd($units);

        if(Sentinel::check())
        {
        $input=  $request->only(['message','unit_id','quantity','product_id']);
        // dd($input);
        $product_id=$input['product_id'];
        //dd($product_id);
        $product_owner = DB::table('bdtdc_supplier_products as sp')
                        ->join('users as u','u.id','=','sp.supplier_id')
                        ->where('sp.product_id',$product_id)
                        ->first(['u.id as user_id']);
        
        $user_id=$product_owner->user_id;
        //return $user_id;
        //$product_owner_id=$product_owner->product_owner_id;
        //dd($product_owner_id); 
        $insert_data=array();
        $insert_data = array
        (
        'product_id'=>$input['product_id'], 
        'message'=>$input['message'],
        'unit_id'=> $input['unit_id'],
        'quantity'=> $input['quantity'],       
        ); 
        
        //dd($insert_data);
        $bdtdc = DB::table('bdtdc_supllier_inqueries')->insert($insert_data);
        dd($bdtdc);
        return Redirect::back();
        }
        else
        return redirect()->route('login');
    }
    
    
    public function productList($id){
        
        $products = DB::table('bdtdc_product_to_category as cat')
            ->join('bdtdc_product as p','p.id','=','cat.product_id')
            ->join('bdtdc_product_description as pd','pd.product_id','=','p.id')
            ->join('bdtdc_supplier_products as sp','sp.product_id','=','p.id')
            ->join('users as u','u.id','=','sp.supplier_id')
            ->join('bdtdc_category as cat_name','cat_name.id','=','cat.category_id')
            ->join('bdtdc_companies as company','company.user_id','=','u.id')
            ->join('bdtdc_company_descriptions as company_description','company_description.company_id','=','company.id')
            ->where('cat.category_id',$id)
            ->first();
            
    
        
         return view::make('fontend.supplier.product_details_view',compact(['products']));
    }
    

    public function rander_dashboard_section($section){
        return $this->index($section);
    }
    
    public function polyester(){
         return View::make('fontend.supplier.polyester');
    }
    
    public function show_list(){
        return View::make('fontend.supplier.supplier_list');
    }
    
    public function store_product_groups($group_name){
        $input=$r->only(['name', 'product_id','company_id']);  
        
        $data_groups=[
            ''
            ];
    }
    public function add_product_group($group_name){
        $user_id = Sentinel::getUser()->id;
        $company_id = BdtdcCompany::where('user_id',$user_id)->first(['id'])->id;
        $group = SupplierProductGroup::create(['name'=>$group_name,'company_id'=>$company_id]);
        return $group;
    }
    
    public function filter_by_main_market(Request $r){
        $market = DB::table('bdtdc_company_main_markets as m');
        for($i=0,$len=count($r->filter_by_main_market);$i<$len;$i++){
            $market->orwhere('m.main_market_zone',$r->filter_by_main_market[$i]);
        }
        $market->join('bdtdc_company_descriptions as cd','cd.company_id','=','m.company_id');
        $market->join('bdtdc_companies as c','cd.company_id','=','c.id');
        $market->join('users as u','c.user_id','=','u.id');
        $market->join('bdtdc_country as country','country.id','=','c.location_of_reg','left');
        $market->join('bdtdc_company_trade_info as ti','ti.company_id','=','c.id','left');
        $market->join('bdtdc_form_values as fv','fv.id','=','ti.anual_sales_volume','left');
        $market->orderBy('main_market_zone','ASC');
        $market->groupBy('c.id');
        $result = $market->get(['u.id as user_id','u.first_name as supplier_name','m.main_market_zone',
                    'cd.name as company_name','c.id as company_id',
                    'country.name as country','fv.value as anual_sales_volume',
                ]);
        $supplier_arr =[];
        $i=0;
        foreach($result as $r){
            $supplier_arr[$i]['id']             = $r->user_id;
            $supplier_arr[$i]['name']           = $r->supplier_name;
            $supplier_arr[$i]['company_id']     = $r->company_id;
            $supplier_arr[$i]['company_name']   = $r->company_name;
            $supplier_arr[$i]['country']        = $r->country;
            $supplier_arr[$i]['revanue']        = $r->anual_sales_volume;
            $product_arr = DB::table('bdtdc_supplier_products as sp')
                            ->join('bdtdc_product_description as pd','pd.product_id','=','sp.product_id','left')
                            ->join('bdtdc_product_image as pi','pi.product_id','=','pd.product_id','left')
                            ->where('sp.supplier_id',$r->user_id)
                            ->get(['pd.name as product_name','pi.image as product_image','pd.product_id']);
            $supplier_arr[$i]['product']        = $product_arr;
            $i++;
        }
        return View::make('fontend.supplier.supplier_list',compact('suppliers','main_market_status','revanue','total_employe'));
        return $supplier_arr;
        
        
        
    }
    public function get_all_inquiries(){
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
    public function get_inquires_by_filter($group){
        $user_id = Sentinel::getUser()->id;
        $condition = "";
        switch($group){
            case "all_inquery":
                $message    = $this->get_all_inquiries();
                break;
            case "sent":
                $condition  = "WHERE( result_set.sender=".$user_id.")" ;
                $message    = $this->get_inquery_message_by_group($condition);
                break;
            case "flag":
                $message = [];
                $i=0;
                foreach(BdtdcInqueryFlag::where('user_took_action',$user_id)->get() as $m){
                    if($m->is_join_quotation == 0){
                        $message[$i] = DB::table('bdtdc_supllier_inqueries as si')
                            ->join('users as u','u.id','=','si.product_owner_id')
                            ->join('users as su','su.id','=','si.sender')
                            ->where('si.id',$m->inquery_id)
                            ->first(['si.product_id','si.product_owner_id','si.sender','si.id as id','si.is_join_quotation','si.created_at','si.message','si.flag','si.spam','si.trush','u.first_name','u.last_name','su.first_name as sender_first_name','su.last_name as sender_last_name']);
                    }else{
                        $message[$i] = DB::table('bdtdc_join_quotation as si')
                            ->join('users as u','u.id','=','si.product_owner_id')
                            ->join('users as su','su.id','=','si.sender')
                            ->where('si.id',$m->inquery_id)
                            ->first(['si.product_id','si.product_owner_id','si.sender','si.id as id','si.is_join_quotation','si.created_at','si.message','si.flag','si.spam','si.trush','u.first_name','u.last_name','su.first_name as sender_first_name','su.last_name as sender_last_name']);
                    }
                    $i++;
                }
                break;
            case "spam":
                $message = [];
                $i=0;
                foreach(BdtdcInquerySpam::where('user_took_action',$user_id)->get() as $m){
                    if($m->is_join_quotation == 0){
                        $message[$i] = DB::table('bdtdc_supllier_inqueries as si')
                            ->join('users as u','u.id','=','si.product_owner_id')
                            ->join('users as su','su.id','=','si.sender')
                            ->where('si.id',$m->inquery_id)
                            ->first(['si.product_id','si.product_owner_id','si.sender','si.id as id','si.is_join_quotation','si.created_at','si.message','si.flag','si.spam','si.trush','u.first_name','u.last_name','su.first_name as sender_first_name','su.last_name as sender_last_name']);
                    }else{
                        $message[$i] = DB::table('bdtdc_join_quotation as si')
                            ->join('users as u','u.id','=','si.product_owner_id')
                            ->join('users as su','su.id','=','si.sender')
                            ->where('si.id',$m->inquery_id)
                            ->first(['si.product_id','si.product_owner_id','si.sender','si.id as id','si.is_join_quotation','si.created_at','si.message','si.flag','si.spam','si.trush','u.first_name','u.last_name','su.first_name as sender_first_name','su.last_name as sender_last_name']);
                    }
                    $i++;
                }
                break;
            case "trush":
                $message = [];
                $i=0;
                foreach(BdtdcInqueryTrush::where('user_took_action',$user_id)->get() as $m){
                    if($m->is_join_quotation == 0){
                        $message[$i] = DB::table('bdtdc_supllier_inqueries as si')
                            ->join('users as u','u.id','=','si.product_owner_id')
                            ->join('users as su','su.id','=','si.sender')
                            ->where('si.id',$m->inquery_id)
                            ->first(['si.product_id','si.product_owner_id','si.sender','si.id as id','si.is_join_quotation','si.created_at','si.message','si.flag','si.spam','si.trush','u.first_name','u.last_name','su.first_name as sender_first_name','su.last_name as sender_last_name']);
                    }else{
                        $message[$i] = DB::table('bdtdc_join_quotation as si')
                            ->join('users as u','u.id','=','si.product_owner_id')
                            ->join('users as su','su.id','=','si.sender')
                            ->where('si.id',$m->inquery_id)
                            ->first(['si.product_id','si.product_owner_id','si.sender','si.id as id','si.is_join_quotation','si.created_at','si.message','si.flag','si.spam','si.trush','u.first_name','u.last_name','su.first_name as sender_first_name','su.last_name as sender_last_name']);
                    }
                    $i++;
                }
                break;
        }
        return View::make('fontend.conversation_window.view_inquery_by_group',compact(['message','group']));
    }
    
    public function get_inquery_message_by_group($condition){
        $user_id = Sentinel::getUser()->id;
        $data = DB::select(DB::raw('
            SELECT result_set.*,pd.name as product_name,u.first_name,u.last_name,su.first_name as sender_first_name,su.last_name as sender_last_name
            FROM(
                SELECT bdtdc_join_quotation.product_id, bdtdc_join_quotation.product_owner_id,
                        bdtdc_join_quotation.sender,bdtdc_join_quotation.id as id,
                        bdtdc_join_quotation.is_join_quotation,
                        bdtdc_join_quotation.created_at,
                        bdtdc_join_quotation.message,
                        bdtdc_join_quotation.flag,
                        bdtdc_join_quotation.spam,
                        bdtdc_join_quotation.trush
                FROM bdtdc_join_quotation
                WHERE (bdtdc_join_quotation.product_owner_id='.$user_id.' OR bdtdc_join_quotation.sender='.$user_id.')     
                UNION
                SELECT bdtdc_supllier_inqueries.product_id,bdtdc_supllier_inqueries.product_owner_id,
                        bdtdc_supllier_inqueries.sender,bdtdc_supllier_inqueries.id as id,
                        bdtdc_supllier_inqueries.is_join_quotation,
                        bdtdc_supllier_inqueries.created_at,
                        bdtdc_supllier_inqueries.message,
                        bdtdc_supllier_inqueries.flag,
                        bdtdc_supllier_inqueries.spam,
                        bdtdc_supllier_inqueries.trush
                FROM bdtdc_supllier_inqueries
                WHERE (bdtdc_supllier_inqueries.product_owner_id='.$user_id.' OR bdtdc_supllier_inqueries.sender='.$user_id.')
                        
            ) as result_set
            LEFT JOIN bdtdc_product_description as pd ON pd.product_id=result_set.product_id
            JOIN users as u ON u.id=result_set.product_owner_id
            JOIN users as su ON su.id=result_set.sender
            '.$condition.'
            ORDER BY result_set.created_at DESC
        '));
        return $data;
        
    }
    
    public function inquery_action($action,$inquery_id){
        $input_arr = [
            'inquery_id' => $inquery_id,
            'user_took_action' => Sentinel::getUser()->id,
        ];
        $is_join_quotation = (explode('_',$action)[0] == "single") ? 0 : 1;
        switch(explode('_',$action)[1]){
            case "flag":
                $input_arr['is_join_quotation'] = $is_join_quotation;
                BdtdcInqueryFlag::create($input_arr);
                break;
            case "spam":
                $input_arr['is_join_quotation'] = $is_join_quotation;
                BdtdcInquerySpam::create($input_arr);
                break;
            case "trush":
                $input_arr['is_join_quotation'] = $is_join_quotation;
                BdtdcInqueryTrush::create($input_arr);
                break;
        }

    }

    public function reverse_action_on_inquery($id){
        $user_id = Sentinel::getUser()->id;
        $arr = explode('_',$id);
        switch($arr[3]){
            case "spam":
                $inquery = BdtdcInquerySpam::where('inquery_id',$arr[2])->where('user_took_action',$user_id);
                break;
            case "flag":
                $inquery = BdtdcInqueryFlag::where('inquery_id',$arr[2])->where('user_took_action',$user_id);
                break;
            case "trush":
                $inquery = BdtdcInqueryTrush::where('inquery_id',$arr[2])->where('user_took_action',$user_id);
                break;
        }
        switch ($arr[0]){
            case "single":
                $inquery =$inquery->where('is_join_quotation',0);
                break;
            case "join":
                $inquery =$inquery->where('is_join_quotation',1);
                break;
        }
        return ($inquery->delete()) ? 1 : 0;
    }
    
    
}
