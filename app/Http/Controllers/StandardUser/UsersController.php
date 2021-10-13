<?php

namespace App\Http\Controllers\StandardUser;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UsersEditFormRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Model\BdtdcCompany;
use App\Model\BdtdcTradeInfo;
use App\Model\BdtdcCompanyMainMarket;
use App\Model\BdtdcCompanyDeliveryTerm;
use App\Model\BdtdcCurrency;
use App\Model\BdtdcCompanyPaymentType;
use App\BdtdcCompanyLanguage;
use App\BdtdcTradeJoinInfo;
use App\Model\BdtdcFactoryInfo;
use App\Model\User;
use App\BdtdcCompanyImage;
use App\BdtdcFormValue;
use App\Model\BdtdcCompanyCertificate;
use App\Model\BdtdcCompanyDescription;
use App\Model\BdtdcCompanyAwardCertification;
use App\BdtdcCertificationImage;
use App\BdtdcCompanyTrademarkImage;
use App\BdtdcHonorImage;
use App\BdtdcPatentImage;
use App\Model\BdtdcCompanyPatent;
use App\Model\BdtdcCompanyTrademark;
use DB;
use Illuminate\Support\Facades\Validator;
//use Validator;
use App\Model\BdtdcPageSeo;
use Sentinel;
use Jenssegers\Agent\Agent;
use Response;
class UsersController extends Controller
{

    
    protected $user;
    private $user_id;
    private $company_id;

    public function __construct(UserRepositoryInterface $user)
    {
        
        $ids = (\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
        $this->company_id = (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;
        
        $this->user = $user;

        $this->middleware('notCurrentUser', ['only' => ['show', 'edit', 'update']]);
        
    }

    public function image_resize($src, $dst, $width, $height, $crop=0){

    if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";

      $type = strtolower(substr(strrchr($src,"."),1));
      if($type == 'jpeg') $type = 'jpg';
      switch($type){
        case 'bmp': $img = imagecreatefromwbmp($src); break;
        case 'gif': $img = imagecreatefromgif($src); break;
        case 'jpg': $img = imagecreatefromjpeg($src); break;
        case 'png': $img = imagecreatefrompng($src); break;
        default : return "Unsupported picture type!";
      }

      // resize
    if($crop){
        if($w < $width or $h < $height) return "Picture is too small!";
        $ratio = max($width/$w, $height/$h);
        $h = $height / $ratio;
        $x = ($w - $width / $ratio) / 2;
        $w = $width / $ratio;
    }
    else{
        if($w < $width and $h < $height) return "Picture is too small!";
        $ratio = min($width/$w, $height/$h);
        $width = $w * $ratio;
        $height = $h * $ratio;
        $x = 0;
    }

    $new = imagecreatetruecolor($width, $height);

    // preserve transparency
    if($type == "gif" or $type == "png"){
        imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
        imagealphablending($new, false);
        imagesavealpha($new, true);
    }

    imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);

    switch($type){
        case 'bmp': imagewbmp($new, $dst); break;
        case 'gif': imagegif($new, $dst); break;
        case 'jpg': imagejpeg($new, $dst); break;
        case 'png': imagepng($new, $dst); break;
      }
      return true;
    }

    public function get_name_by_type($id){
        return BdtdcFormValue::where('keyword_id',$id)->get();
    }
   
    public function show($id)
    {
        $user = $this->user->find($id);

        return view('protected.standardUser.show')->withUser($user);
    }

    
    public function edit($id)
    {
        $user = $this->user->find($id);

        return view('protected.standardUser.edit')->withUser($user);
    }

   
    public function update($id, UsersEditFormRequest $request){
        $user = $this->user->find($id);

        if (! $request->has("password")) {
            $input = $request->only('email', 'first_name', 'last_name');

            $user->fill($input)->save();

            return redirect()->route('profiles.edit', $user->id)
                             ->withFlashMessage('User has been updated successfully!');

        } else {
            $input = $request->only('email', 'first_name', 'last_name', 'password');

            $user->fill($input);
            $user->password = \Hash::make($request->input('password'));
            $user->save();

            return redirect()->route('profiles.edit', $user->id)
                             ->withFlashMessage('User (and password) has been updated successfully!');
        }
    }
    public function create(){
        $header=BdtdcPageSeo::where('page_id',146)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        $data['step_location'] = '';
        $page_content_title=" ";
        $agent = new Agent();
        
        $device = $agent->device();
        //return view('mobile-view.admin-panel.user-join',$data,['page_content_title'=>$page_content_title]);
        if($agent->isPhone())
        {

          return view('mobile-view.admin-panel.user-join',$data,['page_content_title'=>$page_content_title]);
        }
        if($agent->isDestop())
        {
           return view('pages.join_user',$data,['page_content_title'=>$page_content_title]);
        }

        if($agent->isTab())
        {
           return view('pages.join_user',$data,['page_content_title'=>$page_content_title]);
        }
        else{
          
           return view('pages.join_user',$data,['page_content_title'=>$page_content_title]);
        }

        // return view('mobile-view.admin-panel.user-join',$data,['page_content_title'=>$page_content_title]);
        // return view('pages.join_user',$data,['page_content_title'=>$page_content_title]);
    }

    public function repeat_email_check(Request $request){
        dd($request->all());
    }
    
    public function gratings(){
        $page_content_title=" ";
        return view('pages.gratings',['page_content_title'=>$page_content_title]);
    }
    public function post_company_info(Request $r){
        // dd(133);
        if(Sentinel::check())
        {
            if($r->submitted_form == "basic_info"){
                $data = $this->submit_basic_info($r);
                echo json_encode($data);
            }
            elseif($r->submitted_form == "trade_info"){
                $data = $this->submit_trade_info($r);
                echo json_encode($data);
            }
            elseif($r->submitted_form == "factory_info"){
                $data = $this->submit_factory_info($r);
                echo json_encode($data);
            }
            elseif($r->submitted_form == "company_introduction_info"){
                $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
                $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;

                $data = [];
                $rules=array(
                    'company_introduction' => 'nullable|string',
                    'company_services' => 'nullable|string',
                    'company_faq' => 'nullable|string',
                );

                $validator = Validator::make($r->all(), $rules);
                if ($validator->fails())
                {
                    $data['status'] = 0;
                    $data['error'] = $validator->errors()->all();
                }else{
                    BdtdcCompanyDescription::where('company_id',$company_ids->id)->update(['description'=>$r->company_introduction,'service'=>$r->company_services,'faq'=>$r->company_faq]);
                    $data['status'] = 1;
                    $data['message'] = 'Company Infomation Saved Successfully';
                }
                $data['info_type'] = 3;
                echo json_encode($data);
            }
        }
    }
    
    public function post_certification_info(Request $r){
        if(Sentinel::check())
        {
        if($r->submitted_form == "add_certification"){
           return $this->add_certification($r); 
        }
        if($r->submitted_form == "add_awards"){
           return $this->add_awards($r); 
        }
        if($r->submitted_form == "add_patents"){
           return $this->add_patents($r);
        }
        if($r->submitted_form == "add_trademarks"){
           return $this->add_trademarks($r);
        }
        }
    }
    
    public function post_company_logo(Request $r){
        $data = [];
        $ch=Sentinel::check();
        $ids=(Sentinel::getUser()) ? Sentinel::getUser()->id : null;
         $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;
         
        
        if(Sentinel::check())
        {}else{
            $data[0] = 0;//Please login first
            $data[1] = 'Please login first';
            return $data;
        }
        $user_data = User::where('id',$ids)->with('companies.company_description')->first();
        if($user_data){
            if($user_data->companies){
                // $profile_pic = User::where('id',$ids)->first(['profile_picture'])->profile_picture;
                $profile_pic = $user_data->profile_picture;
                // $company_logo = User::find($ids)->companies->company_description->company_logo;
                if($user_data->companies->company_description){
                    if($user_data->companies->company_description->company_logo){
                        $company_logo_old = $user_data->companies->company_description->company_logo;
                    }else{$company_logo_old = '';}
                }else{$company_logo_old = '';}
                
                if($r->file('image')){
                    $validator = Validator::make($r->all(), [
                        'image' => 'mimes:jpeg,jpg,png|max:200',
                    ]);

                    if ($validator->fails()) {
                        $err_text = '';
                        foreach ($validator->errors()->all() as $value) {
                            $err_text .= $value.' ';
                        }
                        $data[0] = 0;//invalid data
                        $data[1] = $err_text;
                        return $data;
                    }

                    $string     = "company_logo_".str_random(10);
                    $temp_file  = $_FILES['image']['tmp_name'];
                    $ext        = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $company_logo   = $string.'.'.$ext;

                    /*if(move_uploaded_file($temp_file,'uploads/'.$company_logo)){
                        $data['img_msg'] = "Image uploaded";
                        if($company_logo_old != ''){
                            $file_location_old = 'uploads/'.$company_logo_old;
                            if (file_exists($file_location_old)) {
                                unlink($file_location_old);
                            }
                        }
                    }*/

                    $picture = $_FILES['image'];
                    $pic_type = strtolower(strrchr($picture['name'],"."));
                    $pic_name = "uploads/original$pic_type";
                    move_uploaded_file($picture['tmp_name'], $pic_name);
                    if (true !== ($pic_error = $this->image_resize($pic_name, "uploads/$company_logo", 80, 55, 0))) {
                      unlink($pic_name);
                      $data[0] = 0;//invalid data
                      $data[1] = $pic_error;
                      return $data;
                    }
                    else{
                        if (file_exists($pic_name)) {
                            unlink($pic_name);
                        }
                        $data['img_msg'] = "Image uploaded";
                        if($company_logo_old != ''){
                            $file_location_old = 'uploads/'.$company_logo_old;
                            if (file_exists($file_location_old)) {
                                unlink($file_location_old);
                            }
                        }
                    }

                    /*else{
                        $company_logo = "no_image.jpg";
                    }*/
                    $company_logo_arr = ['company_logo'=>$company_logo];
                    User::find($ids)->companies->company_description->update($company_logo_arr);
                }
                $data[0] = 1;
                $data[1] = $company_logo;
                return $data;
            }else{
                $data[0] = 0;//Company not available, Please contact with Service Provider.
                $data[1] = 'Company not available, Please contact with Service Provider.';
                return $data;
            }
            
        }else{
            $data[0] = 0;//Please login first
            $data[1] = 'Please login first';
            return $data;
        }
        
    }
    public function delete_company_logo(Request $r){
        $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
         $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;
        $data = [];
        if(Sentinel::check())
        {}else{
            $data[0] = 0;//Please login first
            $data[1] = 'Please login first';
            return $data;
        }
        $user_data = User::where('id',$ids)->with('companies.company_description')->first();
        if($user_data){
            if($user_data->companies){
                if($user_data->companies->company_description){
                    $company_logo_old = $user_data->companies->company_description->company_logo;

                    $company_logo_arr = ['company_logo'=>''];
                    $delete_result = User::find($ids)->companies->company_description->update($company_logo_arr);
                    if($delete_result){
                        if($company_logo_old != ''){
                            $file_location_old = 'uploads/'.$company_logo_old;
                            if (file_exists($file_location_old)) {
                                @unlink($file_location_old);
                            }
                        }
                        $data[0] = 1; //Please login first
                        $data[1] = 'Company Logo deleted Successfully';
                        return $data;
                    }else{
                        $data[0] = 0; //Please login first
                        $data[1] = 'Unable to delete Company Logo';
                        return $data;
                    }
                }else{
                    $data[0] = 0; //Please login first
                    $data[1] = 'Unable to delete Company Logo';
                    return $data;
                }
            }else{
                $data[0] = 0; //Please login first
                $data[1] = 'Unable to delete Company Logo';
                return $data;
            }
        }else{
            $data[0] = 0; //Please login first
            $data[1] = 'Unable to delete Company Logo';
            return $data;
        }
    }

    public function post_company_photo(Request $r){
        $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
         $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;

        $data = [];
        if(Sentinel::check())
        {}else{
            $data[0] = 0;//Please login first
            $data[1] = 'Please login first';
            return $data;
        }
        if($r->file('image')){

            $validator = Validator::make($r->all(), [
                'image' => 'mimes:jpeg,jpg,png|max:300',
            ]);

            if ($validator->fails()) {
                $err_text = '';
                foreach ($validator->errors()->all() as $value) {
                    $err_text .= $value.' ';
                }
                $data[0] = 0;//invalid data
                $data[1] = $err_text;
                return $data;
            }

            $string 	= "company_photo_".str_random(10);
            $temp_file 	= $_FILES['image']['tmp_name'];
            $ext 		= pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $company_photo 	= $string.'.'.$ext;

            $picture = $_FILES['image'];
            $pic_type = strtolower(strrchr($picture['name'],"."));
            $pic_name = "uploads/original$pic_type";
            move_uploaded_file($picture['tmp_name'], $pic_name);
            if (true !== ($pic_error = $this->image_resize($pic_name, "uploads/$company_photo", 225.52, 244, 0))) {
              unlink($pic_name);
              $data[0] = 0;//invalid data
              $data[1] = $pic_error;
              return $data;
            }else{
                if (file_exists($pic_name)) {
                    unlink($pic_name);
                }
                $data['img_msg'] = "Image uploaded";
                if($r->id_to_update !=0){
                    $company_old_photo = BdtdcCompanyImage::where('id',$r->id_to_update)->where('company_id',$company_ids->id)->first();
                    $file_location_old = "uploads/".$company_old_photo->image;
                    if (file_exists($file_location_old)) {
                        unlink($file_location_old);
                    }
                    BdtdcCompanyImage::where('id',$r->id_to_update)->where('company_id',$company_ids->id)->update(['image'=>$company_photo]);
                    $data[0] = 1;//valid data
                    $data[1] = BdtdcCompanyImage::where('id',$r->id_to_update)->first();
                    return $data;
                }else{
                    $company_photo_arr = [
                        'image'=>$company_photo,
                        'company_id' => $company_ids->id,
                    ];
                    $new_img = BdtdcCompanyImage::create($company_photo_arr);
                    $data[0] = 1;//valid data
                    $data[1] = $new_img;
                    return $data;
                }
            }
        }
        
    }

    public function delete_company_photo(Request $r){
        $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
         $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;
        $data = [];
        if(Sentinel::check())
        {}else{
            $data[0] = 0;//Please login first
            $data[1] = 'Please login first';
            return $data;
        }

        if($r->id_to_delete !=0){
            $company_old_photo = BdtdcCompanyImage::where('id',$r->id_to_delete)->where('company_id',$company_ids->id)->first();
            if($company_old_photo){
                $file_location_old = "uploads/".$company_old_photo->image;
                $delete_result = BdtdcCompanyImage::where('id',$r->id_to_delete)->where('company_id',$company_ids->id)->delete();
                if($delete_result){
                    if (file_exists($file_location_old)) {
                        @unlink($file_location_old);
                    }
                    $data[0] = 1;//valid data
                    $data[1] = 'Company Logo deleted Successfully';
                    return $data;
                }else{
                    return $delete_result;
                }
            }else{
                $data[0] = 0;//invalid data
                $data[1] = 'Unable to delete this logo';
                return $data;
            }
        }else{
            $data[0] = 0;//invalid data
            $data[1] = 'Unable to delete empty value';
            return $data;
        }
        
    }

    public function all_certification_image(Request $r){
        $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
         $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;
        $model = $r->model;
        $data = [];
        if(Sentinel::check())
        {}else{
            $data[0] = 0;//Please login first
            $data[1] = 'Please login first';
            return $data;
        }
        if($r->file('image')){

            $validator = Validator::make($r->all(), [
                'image' => 'mimes:jpeg,png|max:300',
            ]);

            if ($validator->fails()) {
                $err_text = '';
                foreach ($validator->errors()->all() as $value) {
                    $err_text .= $value.' ';
                }
                $data[0] = 0;//invalid data
                $data[1] = $err_text;
                return $data;
            }

            $string 	= "certification_".str_random(10);
            $temp_file 	= $_FILES['image']['tmp_name'];
            $ext 		= pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $company_photo 	= $string.'.'.$ext;
            if(count($model::where('company_id',$company_ids->id)->get()) < 3){
                if(move_uploaded_file($temp_file,'uploads/'.$company_photo)){
                    $company_photo_arr = [
                        'image'=>$company_photo,
                        'company_id' => $company_ids->id,
                    ];
                    $new_img = $model::create($company_photo_arr);
                    $data[0] = 1;//valid data
                    $data[1] = $new_img;
                    return $data;
                }
            }else{
                $data[0] = 0;//valid data
                $data[1] = "Limit exceeded. Only 3 files are alowed";
                return $data;
            }
        }
    }

    public function delete_image($id,$model){
        $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
         $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;
        $model_name = 'App\\'.$model;
        $old_img_data = $model_name::where('company_id',$company_ids->id)->where('id',$id)->first();
        if($old_img_data){
            $file_location_old = "uploads/".$old_img_data->image;
            if (file_exists($file_location_old)) {
                unlink($file_location_old);
            }
        }
        return ($model_name::where('company_id',$company_ids->id)->where('id',$id)->delete()) ? 1: 0;
    }
    
    public function submit_basic_info($r){

        $data = [];
        $rules=array(
            'company_name' => 'nullable|string|min:3|max:500',
            'location_of_reg' => 'nullable|integer',
            'company_website' => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'street' => 'nullable|string|min:3|max:500',
            'city' => 'nullable|string|min:3|max:500',
            'zip_code' => 'nullable|integer',
            'postal_code' => 'nullable|integer|min:3',
            'region' => 'nullable|string|min:3|max:500',
            'main_product1' => 'nullable|string|min:3|max:500',
            'main_product2' => 'nullable|string|min:3|max:500',
            'main_product3' => 'nullable|string|min:3|max:500',
            'other_products.*' => 'nullable|string|min:3|max:500',
            'year_of_reg' => 'nullable|integer|digits:4',
            'total_employe' => 'nullable|integer',
            'office_size' => 'nullable|string|max:500',
            'company_advantage' => 'nullable|string',
            'legal_owner' => 'nullable|string|min:3|max:500',
            'contact_no' => 'nullable|string|min:3|max:500',
            'contact_email' => 'nullable|email|min:3|max:500',
        );

        $validator = Validator::make($r->all(), $rules);
        if ($validator->fails())
        {
            $data['status'] = 0;
            $data['error'] = $validator->errors()->all();
        }else{
            $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
            $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;
            if($company_ids)
                $company_ids = $company_ids->id;
            if(BdtdcCompanyDescription::where('company_id',$company_ids)->update(['name'=>$r->company_name]))
                $data['update_status'] = 1;
            else
                $data['update_status'] = 0;


            $update_data = [
                'location_of_reg'   => $r->location_of_reg,
                'year_of_reg'       => $r->year_of_reg,
                'street'            => $r->street,
                'city'              => $r->city,
                'region'            => $r->region,
                'zip_code'          => $r->zip_code,
                'postal_code'       => $r->postal_code,
                'total_employe'     => $r->total_employe,
                'company_website'   => $r->company_website,
                'office_suite'      => $r->office_suite,
                'legal_owner'       => $r->legal_owner,
                'owner_contact'     => $r->contact_no,
                'owner_email'       => $r->contact_email,
                'office_size'       => $r->office_size,
                'company_advantage' => $r->company_advantage,
            ];

            BdtdcCompany::where('user_id',$ids)->update($update_data);

            $other_products_data = '';
            if($r->other_products){
                foreach ($r->other_products as $product_single) {
                    $other_products_data .= $product_single.',';
                }
            }
            $bdtdc_supplier_main_products_data = [
                'supplier_id'       => $ids,
                'product_name_1'    => $r->main_product1,
                'product_name_2'    => $r->main_product2,
                'product_name_3'    => $r->main_product3,
                'other_products'    => $other_products_data,
            ];

            DB::table('bdtdc_supplier_main_products')->where('supplier_id',$ids)->delete();

            $main_product_data =  DB::table('bdtdc_supplier_main_products')->insert($bdtdc_supplier_main_products_data);

            $data['status'] = 1;
        }

        return $data;
    }
    public function submit_trade_info($r){
        $data = [];
        $rules=array(
            'anual_sales_volume' => 'nullable|integer',
            'export_percentage' => 'nullable|integer',
            'main_market_zone.*' => 'nullable|integer',
            'market_distribution_id.*' => 'nullable|integer',
            'distribution_value.*' => 'nullable|regex:/^\d*(\.\d{1,2})?$/',
            'year_of_exporting' =>'nullable|integer',
            'add_customer' => 'nullable|integer',
            'nearest_port.*' => 'nullable|string|min:3',
            'no_of_emp_trade_dept' => 'nullable|integer',
            'has_multiple_industries' => 'nullable|integer',
            'no_rd_staff' => 'nullable|integer',
            'no_qc_staff' => 'nullable|integer',
            'avarage_lead_time' => 'nullable|string',
            'has_overseas_ofice' => 'nullable|integer',
            'delivery_terms.*' => 'nullable|integer',
            'payment_currency.*' => 'nullable|integer',
            'payment_type.*' => 'nullable|integer',
            'language.*' => 'nullable|integer',
        );

        $validator = Validator::make($r->all(), $rules);
        if ($validator->fails())
        {
            $data['status'] = 0;
            $data['error'] = $validator->errors()->all();
        }else{
            $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
            $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;

            $update_trade_info = [
                'anual_sales_volume'                => $r->anual_sales_volume,
                'export_percentage'                 => $r->export_percentage,
                'year_of_exporting'                 => $r->year_of_exporting,
                'add_customer'                      => $r->add_customer,
                'no_of_emp_trade_dept'              => ($r->no_of_emp_trade_dept) ? $r->no_of_emp_trade_dept : null,
                'source_across_multiple_industries' =>$r->has_multiple_industries,
                'no_rd_staff'                       => $r->no_rd_staff,
                'no_qc_staff'                       => $r->no_qc_staff,
                'avarage_lead_time'                 => $r->avarage_lead_time,
                'has_overseas_ofice'                => $r->has_overseas_ofice,
                'company_id'                        => $company_ids->id,
            ];
            if(BdtdcTradeInfo::where('company_id',$company_ids->id)->first()){
                BdtdcTradeInfo::where('company_id',$company_ids->id)->update($update_trade_info);  
            }
            else{
                BdtdcTradeInfo::create($update_trade_info);
            }
//            print_r($r->distribution_value);
            $total = 0;
            for($i=0,$len=count($r->distribution_value);$i<$len;$i++){
                $total +=$r->distribution_value[$i]; 
            }
//            echo $total;
             if ($total >= 0) {
                 if ($total > 100) {
                     $data['status'] = 0;
                     $data['message'] = 'Main Markets and Distribution should not be more than 100%';
                 }else{
                     $distribution_arr_value = [];
            for($i=0,$len=count($r->distribution_value);$i<$len;$i++){
                if( $r->distribution_value[$i] != ""){
                    $distribution_arr_value[$i]['company_id']           = $company_ids->id;
                    $distribution_arr_value[$i]['main_market_zone']     = $r->main_market_zone[$i];
                    $distribution_arr_value[$i]['distribution_value']   = $r->distribution_value[$i];
                    if($r->market_distribution_id[$i] ==0){
                        BdtdcCompanyMainMarket::create($distribution_arr_value[$i]);   
                    }
                    else{
                        BdtdcCompanyMainMarket::where('id',$r->market_distribution_id[$i])->update($distribution_arr_value[$i]);
                    }
                }
            }
            
            $trade_join_arr_data = [
                'company_id' => $company_ids->id,
                'nearest_port' => (count($r->nearest_port)>0) ? implode(",",$r->nearest_port) : null,
                'accepted_delivery_terms' => (is_countable($r->delivery_terms) && count($r->delivery_terms)>0) ? implode(",",$r->delivery_terms) : null,
                'accepted_payment_currency' => (is_countable($r->payment_currency) && count($r->payment_currency)>0) ? implode(",",$r->payment_currency) : null,
                'accepted_payment_type' => (is_countable($r->payment_type) && count($r->payment_type)>0) ? implode(",",$r->payment_type) : null,
                'language_spoken' => (is_countable($r->language) && count($r->language)>0) ? implode(",",$r->language) : null,
            ];
            if(BdtdcTradeJoinInfo::where('company_id',$company_ids->id)->first()){
                BdtdcTradeJoinInfo::where('company_id',$company_ids->id)->update($trade_join_arr_data);  
            }
            else{
                BdtdcTradeJoinInfo::create($trade_join_arr_data);
            }

            $data['status'] = 1;
            $data['message'] = 'Trade Details Saved successfully';
                 }
             }else{
                 $data['status'] = 0;
             }
            
        }
        $data['info_type'] = 1;
        return $data;
    }
    public function submit_factory_info($r){
        $data = [];
        $rules=array(
            'factory_location' => 'nullable|string|min:5|max:500',
            'factory_size' => 'nullable|integer',
            'contact_manufacturing.*' => 'nullable|integer',
            'orm_experience' => 'nullable|string',
            'no_qc_staff' => 'nullable|integer',
            'no_rd_staff' => 'nullable|integer',
            'production_line' => 'nullable|integer',
            'anual_value' => 'nullable|integer',
            'has_more_anual_production_capacity' => 'nullable|integer',
        );

        $validator = Validator::make($r->all(), $rules);
        if ($validator->fails())
        {
            $data['status'] = 0;
            $data['error'] = $validator->errors()->all();
        }else{
            $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
            $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;
            $data = [
                'factory_location'                      =>$r->factory_location,
                'factory_size'                          =>$r->factory_size,
                'contact_manufacturing'                 =>(is_countable($r->contact_manufacturing) && count($r->contact_manufacturing)>1) ? implode(",",$r->contact_manufacturing) : null,
                'oem_experience'                        =>$r->orm_experience,
                'no_of_qc_staff'                        =>$r->no_qc_staff,
                'no_of_rd_staf'                         =>$r->no_rd_staff,
                'no_of_production_line'                 =>$r->production_line,
                'anual_value'                           =>$r->anual_value,
                'company_id'                            =>$company_ids->id,
                'has_more_anual_production_capacity'    =>$r->has_more_anual_production_capacity,
            ];
            (BdtdcFactoryInfo::where('company_id',$company_ids->id)->first()) ? BdtdcFactoryInfo::where('company_id',$company_ids->id)->update($data) : BdtdcFactoryInfo::create($data);
            $data['status'] = 1;
            $data['message'] = 'Factory Details Saved Successfully';
        }
        $data['info_type'] = 2;
        return $data;
    }
    
    public function add_certification($r){
        $data = [];
        $rules=array(
            'type' => 'nullable|integer',
            'reference_no' => 'nullable|string|min:2',
            'name' => 'nullable|integer',
            'issued_by' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'scope' => 'nullable|string|min:15|max:500',
        );

        $validator = Validator::make($r->all(), $rules);
        if ($validator->fails())
        {
            $data['status'] = 0;
            $data['error'] = $validator->errors()->all();
        }else{
            $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
            $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;
            $input_arr = [
                'company_id'        => $company_ids->id,
                'type'              => $r->type,
                'name'              => $r->name,
                'reference_no'      => $r->reference_no,
                'issued_by'         => $r->issued_by,
                'start_date'        => $r->start_date,
                'end_date'          => $r->end_date,
                'scope'             => $r->scope,
            ];
        
            if(BdtdcCompanyCertificate::where('company_id',$company_ids->id)->first()){
                if(BdtdcCompanyCertificate::where('company_id',$company_ids->id)->update($input_arr)){
                    $data['message'] = "Certification information Updated";
                }else{
                    $data['message'] = "Update Failed";
                }
            }
            else{
                if(BdtdcCompanyCertificate::create($input_arr)){
                    $data['message'] = "Certification information Saved";
                }else{
                    $data['message'] = "Failed to save Certification";
                }
            }
            $data['status'] = 1;
        }
        echo json_encode($data);
    }
    public function add_awards($r){
        $data = [];
        $rules=array(
            'name' => 'nullable|string|min:3|max:250',
            'issued_by' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'scope' => 'nullable|string|min:15|max:500',
        );

        $validator = Validator::make($r->all(), $rules);
        if ($validator->fails())
        {
            $data['status'] = 0;
            $data['error'] = $validator->errors()->all();
        }else{
            $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
            $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;

            $input_arr = [
                'company_id'        => $company_ids->id,
                'name'              => $r->name,
                'issued_by'         => $r->issued_by,
                'start_date'        => $r->start_date,
                'end_date'          => $r->end_date,
                'scope'             => $r->scope,
            ];
        
            if(BdtdcCompanyAwardCertification::where('company_id',$company_ids->id)->first()){
                if(BdtdcCompanyAwardCertification::where('company_id',$company_ids->id)->update($input_arr)){
                    $data['message'] = "Award Certification information Updated";
                }else{
                    $data['message'] = "Update Failed";
                }
            }
            else{
                if(BdtdcCompanyAwardCertification::create($input_arr)){
                    $data['message'] = "Award Certification information Saved";
                }else{
                    $data['message'] = "Failed to save Certification";
                }
            }
        $data['status'] = 1;
        }
        echo json_encode($data);
    }
    public function add_patents($r){
        $data = [];
        $rules=array(
            'patent_no' => 'nullable|string|min:4',
            'patent_name' => 'nullable|string|min:4|max:250',
            'type_of_patent' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'scope' => 'nullable|string|min:15|max:500',
        );

        $validator = Validator::make($r->all(), $rules);
        if ($validator->fails())
        {
            $data['status'] = 0;
            $data['error'] = $validator->errors()->all();
        }else{
            $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
            $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;
            $data = [
                'company_id' => $company_ids->id,
                'patent_no' => $r->patent_no,
                'patent_name' => $r->patent_name,
                'patent_type' => $r->type_of_patent,
                'start_date' => $r->start_date,
                'end_date' => $r->end_date,
                'scope' => $r->scope,
            ];
            // DB::statement('ALTER TABLE `bdtdc_patent` MODIFY COLUMN `start_date` DATE');
            if(BdtdcCompanyPatent::where('company_id',$company_ids->id)->first()){
                if(BdtdcCompanyPatent::where('company_id',$company_ids->id)->update($data)){
                    $data['message'] = "Company Patent information Updated";
                }else{
                    $data['message'] = "Update Failed";
                }
            }else{
                if(BdtdcCompanyPatent::create($data)){
                    $data['message'] = "Company Patent information Saved";
                }else{
                    $data['message'] = "Failed to save Company Patent Information";
                }
            }
        $data['status'] = 1;
        }
        echo json_encode($data);
    }
    public function add_trademarks($r){
        $data = [];
        $rules=array(
            'registration_no' => 'nullable|string|min:3|max:50',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'scope' => 'nullable|string|min:15|max:500',
        );

        $validator = Validator::make($r->all(), $rules);
        if ($validator->fails())
        {
            $data['status'] = 0;
            $data['error'] = $validator->errors()->all();
        }else{
            $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
            $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;
            $data = [
                'company_id' => $company_ids->id,
                'registration_no' => $r->registration_no,
                'start_date' => $r->start_date,
                'end_date' => $r->end_date,
                'scope' => $r->scope,
            ];
            if(BdtdcCompanyTrademark::where('company_id',$company_ids->id)->first()){
                if(BdtdcCompanyTrademark::where('company_id',$company_ids->id)->update($data)){
                    $data['message'] = "Company Trademark Information Updated";
                }else{
                    $data['message'] = "Update Failed";
                }
            }else{
                if(BdtdcCompanyTrademark::create($data)){
                    $data['message'] = "Company Trademark Information Saved";
                }else{
                    $data['message'] = "Failed to save Company Trademark";
                }
            }
        $data['status'] = 1;
        }
        echo json_encode($data);
    }

    public function banar_upload(Request $r){
        $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
         $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;

        //return $r->all();
        $banar_id   = DB::table('bdtdc_custom_templetes')->where('company_id','=',$company_ids->id)->get();
        $banar_img  = "add_banar.jpg";

        if($r->file('banar_img')){

            $validator = Validator::make($r->all(), [
                'banar_img' => 'mimes:jpeg,bmp,png|max:50000',
            ]);

            if ($validator->fails()) {
                return $validator->errors()->all();
            }

            $string         = "banar_img_".str_random(10);
            $temp_file      = $_FILES['banar_img']['tmp_name'];
            $ext            = pathinfo($_FILES['banar_img']['name'], PATHINFO_EXTENSION);
            $banar_img      = $string.'.'.$ext;
            if(move_uploaded_file($temp_file,'uploads/'.$banar_img)){
                $data['img_msg'] = "Image uploaded";
            }
            else{
                $data['img_msg'] = "Image couldn't be uploaded";
            }
        }
        if(sizeof($banar_id)<=2){
            $input_arr = [
                'banar_title' => $r->banar_title,
                'height'      =>$r->height,
                'banar_image' =>$banar_img,
                'company_id' => $company_ids->id,
            ];
            DB::table('bdtdc_custom_templetes')->insert($input_arr);
        }
        return \Redirect::back();
        

    }
    public function update_banar(Request $r){
        $ids=(\Sentinel::getUser()) ? \Sentinel::getUser()->id : null;
         $company_ids= (BdtdcCompany::where('user_id',$ids)) ? BdtdcCompany::where('user_id',$ids)->first(['id']) : null;
        
        //return $r->all();
        $banar_image   = DB::table('bdtdc_custom_templetes')->where('id','=',$r->banner_id)->first()->banar_image;
        //return $banar_image;
        if($r->file('banar_img')){

            $validator = Validator::make($r->all(), [
                'banar_img' => 'mimes:jpeg,bmp,png|max:50000',
            ]);

            if ($validator->fails()) {
                return $validator->errors()->all();
            }

            $temp_file      = $_FILES['banar_img']['tmp_name'];
            if(move_uploaded_file($temp_file,'uploads/'.$banar_image)){
                $data['img_msg'] = "Image uploaded";
            }
            else{
                $data['img_msg'] = "Image couldn't be uploaded";
            }
        }
        $input_arr = [
            'banar_title' => $r->banar_title,
            'height'    => $r->height,
            'banar_image' =>$banar_image,
        ];

        DB::table('bdtdc_custom_templetes')->where('id','=',$r->banner_id)->update($input_arr);
        return \Redirect::back();
    }

    function leftShift32($number, $steps) {
        $binary = decbin($number);
        $binary = str_pad($binary, 32, "0", STR_PAD_LEFT);
        $binary = $binary.str_repeat("0", $steps);
        $binary = substr($binary, strlen($binary) - 32);
        return ($binary[0] == "0" ? bindec($binary) :
            -(pow(2, 31) - bindec(substr($binary, 1)))); 
    }

    function rpHash($value) {
        $hash = 5381;
        $value = strtoupper($value);
        for($i = 0; $i < strlen($value); $i++) {
            $hash = ($this->leftShift32($hash, 5) + $hash) + ord(substr($value, $i));
        }
        return $hash;
    }


    public function check_captcha(Request $r){
        if($this->rpHash($r->defaultReal) == $r->defaultRealHash) {
            echo 1;
        }else{
            echo 0;
        }
    }



}
