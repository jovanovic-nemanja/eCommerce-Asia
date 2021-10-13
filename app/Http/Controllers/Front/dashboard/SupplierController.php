<?php

namespace App\Http\Controllers\Front\dashboard;

use App\BdtdcInqueryFlag;
use App\BdtdcInquerySpam;
use App\BdtdcInqueryTrush;
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
use URL;
use Input;
use View;
use Sentinel;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcSupplier;
use App\Model\Role_user;
use App\Model\BdtdcProductImage;
use App\Model\BdtdcProductImageNew;
use App\Model\BdtdcSupplierInquery;
use App\Model\BdtdcJoinQuotation;
use App\Model\BdtdcCountry;
use App\Model\BdtdcPage;


class SupplierController extends Controller
{
    public function index($section=false){
        if(Sentinel::check())
        {
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $company_id=$company->id;
        $role = Role_user::where('user_id',$user_id)->first();
        // dd($role);
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
            /*dd($supplier_product);*/
        
        
        $message = $this->get_all_inquiries();
        $template_setting_section = DB::table('bdtdc_template_sections')->get();
        $template_setting_data = DB::table('bdtdc_template_settings as bts')
                ->join('bdtdc_template_sections as btsec','btsec.id','=','bts.section_id')
                ->where('bts.company_id',$company_id)
                ->get(['bts.id','bts.section_id','bts.back_image','bts.title_logo','bts.back_color','bts.font_color','bts.is_show_image','bts.is_show_color','bts.height','bts.width','bts.company_id','btsec.section_name','btsec.slug']);

        //dd($template_setting_data);
        //return $message;
                //$users=User::where('id',$user_id)->first();
        $title = 'Largest Bangladesh B2B marketplace for Suppliers, Manufacturers & Exporters | BDTDC';
        $keyword = 'Bangladesh B2B Marketplace,Bangladesh B2B online marketplace, B2B online marketplace in Bangladesh, B2B platform in Bangladesh, Bangladesh B2B online platform, B2B Suppliers in Bangladesh, Global b2b marketplace, B2B online marketplace, B2B online platform, b2b ecommerce platform';
        $description = 'Find out the best Manufacturers, Suppliers, Exporters, Wholesalers & Products on BDTDC, the largest b2b marketplace in South Asia';

        return View::make('fontend.supplier.dashboard',compact(['supplier','supplier_product','message','template_setting_data','section','template_setting_section']));

         }
         else
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['SCRIPT_URL']))->withFlashMessage('You must first login or register before accessing this page.');

    }

   

    public function store(Request $r){

        $validator = Validator::make($r->all(), [
            'company_name' => 'nullable|min:3|max:500',
            'location_of_reg' => 'nullable|integer',
            'company_website' => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'street' => 'nullable|min:3|max:500',
            'city' => 'nullable|min:3|max:500',
            'zip_code' => 'nullable|integer|min:3|max:500',
            'postal_code' => 'nullable|min:3|max:500',
            'region' => 'nullable|min:3|max:500',
            'main_product1' => 'nullable|string|min:3|max:500',
            'main_product2' => 'nullable|string|min:3|max:500',
            'main_product3' => 'nullable|string|min:3|max:500',
            'year_of_reg' => 'nullable|integer|min:3|max:500',
            'total_employe' => 'nullable|integer|min:3|max:500',
            'office_size' => 'nullable|string|min:3|max:500',
            'company_advantage' => 'nullable|string|min:3|max:500',
            'legal_owner' => 'nullable|string|min:3|max:500',
            'contact_no' => 'nullable|min:3|max:500',
            'contact_email' => 'nullable|email|min:3|max:500',

            'anual_sales_volume' => 'nullable|integer|min:3|max:500',
            'export_percentage' => 'nullable|integer|min:3|max:500',
            'year_of_exporting' => 'nullable|digits:4|integer',
            'add_customer' => 'nullable|integer',
            'no_of_emp_trade_dept' => 'nullable|integer',
            'has_multiple_industries' => 'nullable|integer',
            'no_rd_staff' => 'nullable|integer',
            'no_qc_staff' => 'nullable|integer',
            'avarage_lead_time' => 'nullable|string',
            'has_overseas_ofice' => 'nullable|integer',

            'factory_location' => 'nullable|string',
            'factory_size' => 'nullable|integer',
            'contact_manufacturing.*' => 'nullable|integer|digits:1',
            'no_qc_staff' => 'nullable|integer',
            'no_rd_staff' => 'nullable|integer',
            'production_line' => 'nullable|integer',
            'anual_value' => 'nullable|integer',
            'has_more_anual_production_capacity' => 'nullable|integer|digits:1',

            'company_introduction' => 'nullable|string',
            'company_services' => 'nullable|string',
            'company_faq' => 'nullable|string',

            'type' => 'nullable|integer',
            'reference_no' => 'nullable|string',
            'name' => 'nullable|integer',
            'issued_by' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'scope' => 'nullable|string',

            'name' => 'nullable|string',
            'issued_by' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'scope' => 'nullable|string',

            'patent_no' => 'nullable|string',
            'patent_name' => 'nullable|string',
            'type_of_patent' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'scope' => 'nullable|string',
            
            'registration_no' => 'nullable|string',

        ]);
        if ($validator->fails()) {
            $error_message = '';
            foreach($validator->errors()->getMessages() as $value){
                $error_message .= $value[0].' ';
            }
            return redirect()->back()->with('profile_update_msg',$error_message);
        }


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
    public function post_personal_info(Request $r){
        $validator = Validator::make($r->all(), [
            'profile_picture' => 'mimes:jpeg,jpg,png,gif|image|max:10000',
            'company_logo' => 'mimes:jpeg,jpg,png,gif|image|max:10000', // max 10000kb
        ]);
        if ($validator->fails()) {
            $error_message = '';
            foreach($validator->errors()->getMessages() as $value){
                $error_message .= $value[0].' ';
            }
            return redirect()->back()->with('profile_update_msg',$error_message);
        }
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $company_id=$company->id;

        $company_logo_old = "no_image.jpg";
        $company_description = BdtdcCompanyDescription::where('company_id',$company_id)->first();
        if($company_description->company_logo){
            $company_logo_old = $company_description->company_logo;
        }
        $profile_pic_old = User::where('id',$user_id)->first(['profile_picture'])->profile_picture;

        if($r->file('profile_picture')){
            $file = $r->file('profile_picture');
            $string     = "profile_pic_".str_random(10);
            $ext        = $file->getClientOriginalExtension();
            $profile_pic    = $string.'.'.$ext;
            $file_name = time() . $file->getClientOriginalName(); 
            $file_path = public_path().'/uploads/';

            // if(move_uploaded_file($temp_file,'uploads/'.$profile_pic)){
            if($file->move($file_path, $profile_pic)){
                $data['img_msg'] = "Image uploaded";
                if($profile_pic_old && trim($profile_pic_old) != ''){
                    $file_location_old = 'uploads/'.$profile_pic_old;
                    if (file_exists($file_location_old)) {
                        unlink($file_location_old);
                    }
                }
                $update_personal_info = [
                    'first_name' => $r->get('first_name'),
                    'last_name' => $r->get('last_name'),
                    'department' => $r->get('department'),
                    'job_title' => $r->get('position'),
                    'profile_picture' => $profile_pic,
                ];
                User::where('id',$user_id)->update($update_personal_info);
            }
            else{
            }
        }

        if($r->file('company_logo')){
            $string     = "company_logo_".str_random(10);
            $temp_file  = $_FILES['company_logo']['tmp_name'];
            $ext        = pathinfo($_FILES['company_logo']['name'], PATHINFO_EXTENSION);
            $company_logo   = $string.'.'.$ext;
            if(move_uploaded_file($temp_file,'uploads/'.$company_logo)){
                $data['img_msg'] = "Image uploaded";
                $file_location_old = 'uploads/'.$company_logo_old;
                if (file_exists($file_location_old)) {
                    unlink($file_location_old);
                }
                $company_logo_arr = ['company_logo'=>$company_logo];
                BdtdcCompanyDescription::where('company_id',$company_id)->update($company_logo_arr);
            }
            else{
                $data['img_msg'] = "Image couldn't be uploaded";
            }
        }

        $update_personal_info = [
            'first_name' => $r->get('first_name'),
            'last_name' => $r->get('last_name'),
            'department' => $r->get('department'),
            'job_title' => $r->get('position'),
        ];

        User::where('id',$user_id)->update($update_personal_info);
        

        return Redirect::back()->with('profile_update_msg','Profile saved!');
    }

    public function password_reset(Request $request){
        // dd($request->all());
        $user_id = Sentinel::getUser()->id;
          // dd($user_id);
        $rules=array(
            'password'=>'required|min:6|max:12|confirmed|regex:/^(?=.*[!@#\$%\^&\*\/\()^`.])/',
            'password_confirmation'=>'required|min:6|max:12|regex:/^(?=.*[!@#\$%\^&\*\/\()^`.])/',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $validator->errors()->all();
        }
        else{

           /* $password=$request->input('password');
            $password_confirmation=$request->input('password_confirmation');
            if($password==$password_confirmation){

            }*/

            if($request->has("password")){
            $password = \Hash::make($request->get('password'));
         
            $update_password = [
            'password' => $password,
            ];
            $r=User::where('id',$user_id)->update($update_password);
            return redirect::back();
            }
            else{
                return "not changed";
            }
        }
      
         

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

//    public function post_section_create(Request $request){
    public function post_section_create(Request $request){
        echo 'sdfsdf';
        
        print_r($request->all());
//        exit;
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'section' => 'required',
            'back_image' => 'mimes:jpeg,jpg,png,gif|image|max:10000', // max 10000kb
            'first_slider_image' => 'mimes:jpeg,jpg,png,gif|image|max:10000', // max 10000kb
            'second_slider_image' => 'mimes:jpeg,jpg,png,gif|image|max:10000', // max 10000kb
            'third_slider_image' => 'mimes:jpeg,jpg,png,gif|image|max:10000', // max 10000kb
        ]);
        if ($validator->fails()) {
            //return response()->json(['error' => $validator->errors()->getMessages()], 200);
            $section_error_message = '';
            foreach($validator->errors()->getMessages() as $value){
                $section_error_message .= $value[0].' ';
            }
            $request->session()->flash('alert-danger', $section_error_message);
            return redirect()->back();
            /*return redirect()->back()->withErrors($validator)
                        ->withInput();*/
        }
        else{
            $user_id = Sentinel::getUser()->id;
            $company=BdtdcCompany::where('user_id',$user_id)->first();
            $company_id=$company->id;
            $back_image_file = $request->file('back_image');
            if($back_image_file){
                $back_image_name = 'section_img_'.uniqid().'_'.$back_image_file->getClientOriginalName();
                $back_image_file->move('uploads',$back_image_name);
            }else{
                $back_image_name = '';
            }
            if($request->file('first_slider_image')){
                $first_slider_image = 'slider_img_1_'.uniqid().'_'.uniqid().'.'.$request->file('first_slider_image')->getClientOriginalExtension();
                $request->file('first_slider_image')->move('banner-images',$first_slider_image);
            }else{
                $first_slider_image = '';
            }
            if($request->file('second_slider_image')){
                $second_slider_image = 'slider_img_2_'.uniqid().'_'.uniqid().'.'.$request->file('second_slider_image')->getClientOriginalExtension();
                $request->file('second_slider_image')->move('banner-images',$second_slider_image);
            }else{
                $second_slider_image = '';
            }
            if($request->file('third_slider_image')){
                $third_slider_image = 'slider_img_3_'.uniqid().'_'.uniqid().'.'.$request->file('third_slider_image')->getClientOriginalExtension();
                $request->file('third_slider_image')->move('banner-images',$third_slider_image);
            }else{
                $third_slider_image = '';
            }
            
            if($request->section == '4'){
                $section_data[] = array(
                    'section_id' => $request->input('section'),
                    'back_image' => $first_slider_image,
                    'back_color' => $second_slider_image,
                    'font_color' => $third_slider_image,
                    'company_id' => $company_id,
                );
            }else{
                $section_data[] = array(
                    'section_id' => $request->input('section'),
                    'back_image' => $back_image_name,
                    'title_logo' => $request->input('title_viewer'),
                    'back_color' => $request->input('back_color'),
                    'font_color' => $request->input('font_color'),
                    'is_show_image' => $request->input('back_image_viewer'),
                    'is_show_color' => $request->input('background_color_viewer'),
                    'height' => $request->input('height'),
                    'width' => $request->input('width'),
                    'company_id' => $company_id,
                );
            }
            
            // dd($section_data);
                    $section_data_result = DB::table('bdtdc_template_settings')->insert($section_data);
                    if($section_data_result){
                        $request->session()->flash('alert-success', 'New Section Created Successfully!');
                        return redirect()->back();
                        // echo "Inserted";
                    }
                    else{
                        $request->session()->flash('alert-danger', 'Error on Creating Section');
                        return redirect()->back();
                        // return redirect()->back()->with('section_message' 'Error on creating new section');
                    }
        }
        
    }

    public function post_section_update(Request $request, $id){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'section' => 'required',
            'back_image' => 'mimes:jpeg,jpg,png,gif|image|max:10000', // max 10000kb
            'first_slider_image' => 'mimes:jpeg,jpg,png,gif|image|max:10000', // max 10000kb
            'second_slider_image' => 'mimes:jpeg,jpg,png,gif|image|max:10000', // max 10000kb
            'third_slider_image' => 'mimes:jpeg,jpg,png,gif|image|max:10000', // max 10000kb
        ]);
        if ($validator->fails()) {
            $section_error_message = '';
            foreach($validator->errors()->getMessages() as $value){
                $section_error_message .= $value[0].' ';
            }
            $request->session()->flash('alert-danger', $section_error_message);
            return redirect()->back();
        }
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $company_id=$company->id;
        $template_setting_data = DB::table('bdtdc_template_settings')->where('id',$id)->first();
        $prev_back_image = $request->input('prev_back_image');
        $prev_back_image_name = basename($prev_back_image);
        $back_image_file = $request->file('back_image');
        if($request->input('section') == 4){
            if($request->file('first_slider_image')){
                $first_slider_image = 'slider_img_1_'.uniqid().'_'.uniqid().'.'.$request->file('first_slider_image')->getClientOriginalExtension();
                $request->file('first_slider_image')->move('banner-images',$first_slider_image);
                if (file_exists("banner-images/".urldecode(basename($request->input('prev_first_slider_image'))))) {
                        @unlink("banner-images/".urldecode(basename($request->input('prev_first_slider_image'))));
                    }
            }else{
                $first_slider_image = basename($request->input('prev_first_slider_image'));
            }
            if($request->file('second_slider_image')){
                $second_slider_image = 'slider_img_2_'.uniqid().'_'.uniqid().'.'.$request->file('second_slider_image')->getClientOriginalExtension();
                $request->file('second_slider_image')->move('banner-images',$second_slider_image);
                if (file_exists("banner-images/".urldecode(basename($request->input('prev_second_slider_image'))))) {
                        @unlink("banner-images/".urldecode(basename($request->input('prev_second_slider_image'))));
                    }
            }else{
                $second_slider_image = basename($request->input('prev_second_slider_image'));
            }
            if($request->file('third_slider_image')){
                $third_slider_image = 'slider_img_3_'.uniqid().'_'.uniqid().'.'.$request->file('third_slider_image')->getClientOriginalExtension();
                $request->file('third_slider_image')->move('banner-images',$third_slider_image);
                if (file_exists("banner-images/".urldecode(basename($request->input('prev_third_slider_image'))))) {
                        @unlink("banner-images/".urldecode(basename($request->input('prev_third_slider_image'))));
                    }
            }else{
                $third_slider_image = basename($request->input('prev_third_slider_image'));
            }
            $section_data[] = array(
                        'section_id' => $request->input('section'),
                        'back_image' => $first_slider_image,
                        'back_color' => $second_slider_image,
                        'font_color' => $third_slider_image,
                    );
        }else{
            if($back_image_file){
                $back_image_name = 'section_img_'.uniqid().'_'.$back_image_file->getClientOriginalName();
                $back_image_file->move('uploads',$back_image_name);
                if($prev_back_image_name != 'uploads'){
                    if(trim($prev_back_image_name)!=''){
                        if (file_exists("uploads/".urldecode($prev_back_image_name))) {
                            @unlink("uploads/".urldecode($prev_back_image_name));
                        }
                    }
                }
                // unlink($prev_back_image_path);
                $section_data[] = array(
                        'section_id' => $request->input('section'),
                        'back_image' => $back_image_name,
                        'title_logo' => $request->input('title_viewer'),
                        'back_color' => $request->input('back_color'),
                        'font_color' => $request->input('font_color'),
                        'is_show_image' => $request->input('back_image_viewer'),
                        'is_show_color' => $request->input('background_color_viewer'),
                        'height' => $request->input('height'),
                        'width' => $request->input('width'),
                    );
            }else{
                $section_data[] = array(
                        'section_id' => $request->input('section'),
                        'back_color' => $request->input('back_color'),
                        'title_logo' => $request->input('title_viewer'),
                        'font_color' => $request->input('font_color'),
                        'is_show_image' => $request->input('back_image_viewer'),
                        'is_show_color' => $request->input('background_color_viewer'),
                        'height' => $request->input('height'),
                        'width' => $request->input('width'),
                    );
            }
        }
        // dd($section_data);
        // print_r($section_data[0]);
        $section_data_result = DB::table('bdtdc_template_settings')->where('id', $id)->where('company_id',$company_id)->update($section_data[0]);
        if($section_data_result){
            $request->session()->flash('alert-success', 'Section Updated Successfully!');
            return redirect()->back();
            // echo "Inserted";
        }
        else{
            $request->session()->flash('alert-danger', 'Error on Updating Section');
            return redirect()->back();
            // return redirect()->back()->with('section_message' 'Error on creating new section');
        }
        
    }

    public function post_section_delete(ProductRequest $request, $id){
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $company_id=$company->id;
        $template_setting_data = DB::table('bdtdc_template_settings')->where('id',$id)->first();
        // dd($template_setting_data);
        // echo $template_setting_data[0]->back_image;
        $delete_result = DB::table('bdtdc_template_settings')->where('id', $id)->where('company_id',$company_id)->delete();
        if($delete_result){
            if($template_setting_data->section_id == 4){
                if($template_setting_data->back_image != ''){
                    unlink("banner-images/".urldecode($template_setting_data->back_image));
                }
                if($template_setting_data->back_color != ''){
                    unlink("banner-images/".urldecode($template_setting_data->back_color));
                }
                if($template_setting_data->font_color != ''){
                    unlink("banner-images/".urldecode($template_setting_data->font_color));
                }
            }else{
                if($template_setting_data->back_image != ''){
                    unlink("uploads/".urldecode($template_setting_data->back_image));
                }
            }
            $request->session()->flash('alert-success', 'Section Deleted Successfully!');
            return redirect()->back();
        }
        else{
            $request->session()->flash('alert-danger', 'Error on Deleting Section');
            return redirect()->back();
        }
    }

    public function wholesale_product_create(){
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
        return view('fontend.supplier.wholesale_product_create',$data, array('country'=>$country, 'units'=> $units));
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
            // 'product_att_name.*' => 'min:1|max:1000',
            // 'product_att_value.*' => 'min:2|max:2000',
            'product_att_name.*' => 'required',
            'product_att_value.*' => 'required',
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
                // 'product_att_name.'.$i => 'max:1000',
                // 'product_att_value.'.$i => 'max:2000',
                'product_att_name.*' => 'required',
                'product_att_value.*' => 'required',
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

    public function post_wholesale_product_create(ProductRequest $request){
        
        //return $request->all();
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $company_id=$company->id;
        $response_to_client = [];
        // dd($company_id);
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
            // return $input_price;

          
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
        // echo $product_details_id;
        // dd(DB::table('bdtdc_product_prices')->get());
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

        /*$attr_check = DB::table('bdtdc_product_attribute')->get();
        $prev_attr = [];
        foreach ($attr_check as $single_attr_value) {
            if(!in_array($single_attr_value->attribute_id, $prev_attr)){
                $prev_attr[] = $single_attr_value->attribute_id;
            }else{
                echo $single_attr_value->id. '<br>';
                DB::table('bdtdc_product_attribute')->where('id',$single_attr_value->id)->delete();
            }
        }
        dd($attr_check);*/
        /*DB::table('bdtdc_attributes')->where('id',$attr_id_delete)->get();
        DB::table('bdtdc_product_attribute')->where('attribute_id',$attr_id_delete)->get();*/



        if(Sentinel::getUser()){
        }else{
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['SCRIPT_URL']))->withFlashMessage('You must first login before accessing this page.');
        }
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        $company_id = $company->id;
        $product_description = BdtdcProductToCategory::where('product_id',$id)->first();

        if($product_description->company_id != $company_id){
            Sentinel::logout();
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['SCRIPT_URL']))->withFlashMessage('You must first login before accessing this page.');
        }
        
        
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


        return view('fontend.supplier.product_edit',$data, array('country'=>$country,'prices'=>$prices,'units'=> $units,'product'=>$product, 'products'=> $products, 'attributes'=>$attributes,'supplier_product'=> $supplier_product,'product_price'=>$product_price,'product_image'=>$product_image,'product_images'=>$product_images,'product_groups'=>$product_groups,'bdtdc_logistic_infos'=>$bdtdc_logistic_infos,'bdtdc_product_to_wholesale_category'=>$bdtdc_product_to_wholesale_category,'bdtdc_limited_lime_offers'=>$bdtdc_limited_lime_offers,'product_description'=>$product_description,'id'=>$id));
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
                    return Redirect::to('admin/product')->with('product_edit_success','Product updated successfully');

            }

        return Redirect::to('dashboard/product')->with('product_edit_success','Product updated successfully');

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
            ->first(['p.id as product_id','pd.description as pro_descript','p_image.image as image','origin.name as origins','p.model','pd.name','sp.supplier_id as supplier_id','p.quantity','p.brandname as brand',
                'u.first_name as fname','u.last_name as lname',
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
        if(Sentinel::getUser()){
        }else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }
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
        if(Sentinel::getUser()){
        }else{
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['SCRIPT_URL']))->withFlashMessage('You must first login or register before accessing this page.');
        }
        return $this->index($section);
    }
    
    public function polyester(){
         return View::make('fontend.supplier.polyester');
    }
    
    
   
    
    public function store_product_groups($group_name){
        $input=$r->only(['name', 'product_id','company_id']);  
        
        $data_groups=[
            ''
            ];
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
                WHERE (bdtdc_supllier_inqueries.product_owner_id='.$user_id.'  OR bdtdc_supllier_inqueries.sender='.$user_id.') AND bdtdc_supllier_inqueries.product_id != 0
                        
            ) as result_set
            LEFT JOIN bdtdc_product_description as pd ON pd.product_id=result_set.product_id
            JOIN users as u ON u.id=result_set.product_owner_id
            JOIN users as su ON su.id=result_set.sender
            ORDER BY result_set.created_at DESC
        '));
    }
    public function get_inquires_by_filter($group){
        if(Sentinel::getUser()){
        }else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }
        $user_id = Sentinel::getUser()->id;
        // dd(BdtdcSupplierInquery::take(1)->get());
        // dd(BdtdcJoinQuotation::take(1)->get());
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
                            ->where('si.product_id', '!=',0)
                            ->first(['si.product_id','si.product_owner_id','si.sender','si.id as id','si.is_join_quotation','si.created_at','si.message','si.flag','si.spam','si.trush','u.first_name','u.last_name','su.first_name as sender_first_name','su.last_name as sender_last_name']);
                    }else{
                        $message[$i] = DB::table('bdtdc_join_quotation as si')
                            ->join('users as u','u.id','=','si.product_owner_id')
                            ->join('users as su','su.id','=','si.sender')
                            ->where('si.id',$m->inquery_id)
                            ->where('si.product_id', '!=',0)
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
                            ->where('si.product_id', '!=',0)
                            ->first(['si.product_id','si.product_owner_id','si.sender','si.id as id','si.is_join_quotation','si.created_at','si.message','si.flag','si.spam','si.trush','u.first_name','u.last_name','su.first_name as sender_first_name','su.last_name as sender_last_name']);
                    }else{
                        $message[$i] = DB::table('bdtdc_join_quotation as si')
                            ->join('users as u','u.id','=','si.product_owner_id')
                            ->join('users as su','su.id','=','si.sender')
                            ->where('si.id',$m->inquery_id)
                            ->where('si.product_id', '!=',0)
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
                            ->where('si.product_id', '!=',0)
                            ->first(['si.product_id','si.product_owner_id','si.sender','si.id as id','si.is_join_quotation','si.created_at','si.message','si.flag','si.spam','si.trush','u.first_name','u.last_name','su.first_name as sender_first_name','su.last_name as sender_last_name']);
                    }else{
                        $message[$i] = DB::table('bdtdc_join_quotation as si')
                            ->join('users as u','u.id','=','si.product_owner_id')
                            ->join('users as su','su.id','=','si.sender')
                            ->where('si.id',$m->inquery_id)
                            ->where('si.product_id', '!=',0)
                            ->first(['si.product_id','si.product_owner_id','si.sender','si.id as id','si.is_join_quotation','si.created_at','si.message','si.flag','si.spam','si.trush','u.first_name','u.last_name','su.first_name as sender_first_name','su.last_name as sender_last_name']);
                    }
                    $i++;
                }
                break;
        }
        // echo "<pre>";
        // print_r($message);
        // echo "</pre>";
        return View::make('fontend.conversation_window.view_inquery_by_group',compact(['message','group']));
    }
    
    public function get_inquery_message_by_group($condition){
        if(Sentinel::getUser()){
        }else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }
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
                WHERE (bdtdc_supllier_inqueries.product_owner_id='.$user_id.' OR bdtdc_supllier_inqueries.sender='.$user_id.') AND bdtdc_supllier_inqueries.product_id != 0
                        
            ) as result_set
            LEFT JOIN bdtdc_product_description as pd ON pd.product_id=result_set.product_id
            JOIN users as u ON u.id=result_set.product_owner_id
            JOIN users as su ON su.id=result_set.sender
            '.$condition.'
            ORDER BY result_set.created_at DESC
        '));
        // dd($data);
        return $data;
        
    }
    
    public function inquery_action($action,$inquery_id){
        if(Sentinel::getUser()){
        }else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }
        // return $action.$inquery_id;
        $action_array = explode("::",$action);
        $inquery_id_array = explode("_",$inquery_id);
        $array_loop = count($inquery_id_array);
        for($i=0;$i<$array_loop;$i++){
                $input_arr = [
                'inquery_id' => $inquery_id_array[$i],
                'user_took_action' => Sentinel::getUser()->id,
            ];
            $is_join_quotation = (explode('_',$action_array[$i])[0] == "single") ? 0 : 1;
            switch(explode('_',$action_array[$i])[1]){
                case "flag":
                    $input_arr['is_join_quotation'] = $is_join_quotation;
                    BdtdcInqueryFlag::create($input_arr);
                    if($is_join_quotation == 0){
                        BdtdcSupplierInquery::where('id',$inquery_id_array[$i])->update(['flag' => 1]);
                    }else{
                        BdtdcSupplierInquery::where('id',$inquery_id_array[$i])->update(['flag' => 1]);
                    }
                    break;
                case "spam":
                    $input_arr['is_join_quotation'] = $is_join_quotation;
                    BdtdcInquerySpam::create($input_arr);
                    if($is_join_quotation == 0){
                        BdtdcSupplierInquery::where('id',$inquery_id_array[$i])->update(['spam' => 1]);
                    }else{
                        BdtdcSupplierInquery::where('id',$inquery_id_array[$i])->update(['spam' => 1]);
                    }
                    break;
                case "trush":
                    $input_arr['is_join_quotation'] = $is_join_quotation;
                    BdtdcInqueryTrush::create($input_arr);
                    if($is_join_quotation == 0){
                        BdtdcSupplierInquery::where('id',$inquery_id_array[$i])->update(['trush' => 1]);
                    }else{
                        BdtdcSupplierInquery::where('id',$inquery_id_array[$i])->update(['trush' => 1]);
                    }
                    break;
            }
        }

        /*$input_arr = [
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
        }*/

    }

    public function reverse_action_on_inquery($id){

        $inquery_id_array = explode("::",$id);
        $array_loop = count($inquery_id_array);
        $success = false;
        for($i=0;$i<$array_loop;$i++){
            $user_id = Sentinel::getUser()->id;
            $arr = explode('_',$inquery_id_array[$i]);
            $is_join_quotation = $arr[0];
            switch($arr[3]){
                case "spam":
                    $inquery = BdtdcInquerySpam::where('inquery_id',$arr[2])->where('user_took_action',$user_id);
                    if($is_join_quotation == 'single'){
                        BdtdcSupplierInquery::where('id',$arr[2])->update(['spam' => 0]);
                    }else{
                        BdtdcSupplierInquery::where('id',$arr[2])->update(['spam' => 0]);
                    }
                    break;
                case "flag":
                    $inquery = BdtdcInqueryFlag::where('inquery_id',$arr[2])->where('user_took_action',$user_id);
                    if($is_join_quotation == 'single'){
                        BdtdcSupplierInquery::where('id',$arr[2])->update(['flag' => 0]);
                    }else{
                        BdtdcSupplierInquery::where('id',$arr[2])->update(['flag' => 0]);
                    }
                    break;
                case "trush":
                    $inquery = BdtdcInqueryTrush::where('inquery_id',$arr[2])->where('user_took_action',$user_id);
                    if($is_join_quotation == 'single'){
                        BdtdcSupplierInquery::where('id',$arr[2])->update(['trush' => 0]);
                    }else{
                        BdtdcSupplierInquery::where('id',$arr[2])->update(['trush' => 0]);
                    }
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
            if($inquery->delete()){
                $success = true;
            }
            // return ($inquery->delete()) ? 1 : 0;
        }
        return ($success) ? 1 : 0;


        /*$user_id = Sentinel::getUser()->id;
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
        return ($inquery->delete()) ? 1 : 0;*/
    }
    
    
}
