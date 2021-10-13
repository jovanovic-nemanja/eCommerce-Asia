<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Redirect;
use Input;
use View;
use App\Model\BdtdcHomeProduct;
use App\Model\BdtdcCategory;
use App\Model\BdtdcSupplier;
use Illuminate\Support\Facades\File;
use Sentinel;
use Session;


class HomepageController extends Controller
{
    /**
     * Display a listing of the home products.
     *
     * @return Response
     */
    
    public function __construct()
    {
        ini_set('memory_limit', '9999999M');
    }


    public function index()
    {
        if(Sentinel::getUser()){}else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }

    	$data['home_product'] = BdtdcHomeProduct::with('bdtdcProduct','bdtdcProduct.product_image_new','bdtdcProduct.product_name')->orderBy('id','desc')->paginate(10);
        // dd($data['home_product']);
    	$data['bdtdc_supplier'] = BdtdcSupplier::with('user')->get();
        // $data['bdtdc_supplier'] = BdtdcSupplier::get();
    	// dd($data['bdtdc_supplier'][0]->user);
        return View::make('protected.admin.homeproduct.manage_home_products',$data);
    }

    public function add_home_product(Request $r)
    {
        if(Sentinel::getUser()){}else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }
        $validator = Validator::make($r->all(), [
            'supplier_list' => 'required|max:99999999999999|not_in:0',
            'Search_Product_By_Name_or_ID' => 'required|integer|max:99999999999999|min:1',
            //'home_image' => 'required|image|mimes:jpeg,bmp,png|max:2000',
            'sortproduct_opt' => 'required|integer|max:1000000',
        ]);
        if ($validator->fails()) {
            /*$error_message = '';
            foreach($validator->errors()->getMessages() as $value){
                $error_message .= $value[0].' ';
            }
            return $error_message;*/
            return back()->withErrors($validator)->withInput();
        }
        $get_home_product = BdtdcHomeProduct::where('product_id',$r->Search_Product_By_Name_or_ID)->get();
        if(count($get_home_product) > 0){
                BdtdcHomeProduct::where('product_id',$r->Search_Product_By_Name_or_ID)->update(['hot_product'=>$r->make_hot?1:0,'bangladesh_products'=>$r->make_bangladeshi?1:0,'whole_sale'=>$r->make_wholesale?1:0,'sort'=>$r->sortproduct_opt]);
            Session::flash('success', "Home Product Successfully Updated.");
            return back();
        }else{
            $insert_array = [
                                'product_id'=>$r->Search_Product_By_Name_or_ID,
                                'hot_product'=>$r->make_hot?1:0,
                                'bangladesh_products'=>$r->make_bangladeshi?1:0,
                                'whole_sale'=>$r->make_wholesale?1:0,
                            ];
            $insert_id = BdtdcHomeProduct::insertGetId(['product_id'=>$r->Search_Product_By_Name_or_ID,'hot_product'=>$r->make_hot?1:0,'bangladesh_products'=>$r->make_bangladeshi?1:0,'whole_sale'=>$r->make_wholesale?1:0,'sort'=>$r->sortproduct_opt]);
            if($insert_id){
                // $old_profile_picture = $this->user->picture;
                if ($r->hasFile('home_image')) {

                    // UPLOAD FILE : Homepage Product Image
                    $destination_path = 'bdtdc-product-image/home-page/';
                    $prefix_filename = $insert_id;
                    $full_destination_path = $destination_path;

                    // Process file request
                    $file = $r->file('home_image');
                    if ($file->isValid()) {
                        // Create destination path if not exists
                        if (!File::exists($destination_path)) {
                            File::makeDirectory($destination_path, 0755, true);
                        }

                        // Get file extension
                        $extension = $file->getClientOriginalExtension();

                        // Build the new filename
                        $filename_gen = uniqid();
                        $new_filename = strtolower('homepage-product-image_'.$prefix_filename .'_'. $filename_gen . '.' . $extension);

                        // Delete old file if new file has uploaded
                        /*if ($old_profile_picture != '') {
                            if (is_file(public_path() . '/' . $destination_path . $old_profile_picture)) {
                                @unlink(public_path() . '/' . $destination_path . $old_profile_picture);
                            }
                        }*/

                        // Save Resume on the server
                        $file->move($destination_path, $new_filename);

                        // Ad company logo in database
                        BdtdcHomeProduct::where('id',$insert_id)->update(['images'=>$new_filename]);
                        // User::where('id', $this->user->id)->update(['picture'=>$new_filename]);
                        
                    }
                }
                Session::flash('success', "Home Product Successfully Created.");
                return back();
            }else{
                Session::flash('error', "Unable to add to Home Products.");
                return back();
            }
        }
    }

    public function delete_home_product(Request $r)
    {
        if(Sentinel::getUser()){}else{
            return 2;
        }
        $old_home_data = BdtdcHomeProduct::where('id',$r->delete_id)->first();
        if($old_home_data){
            if($old_home_data->images != '' && is_file('bdtdc-product-image/home-page/'.$old_home_data->images)){
                @unlink('bdtdc-product-image/home-page/'.$old_home_data->images);
            }
            $delete_data = BdtdcHomeProduct::where('id',$r->delete_id)->delete();
            if($delete_data){
                return 1;
            }else{
                return $delete_data;
            }
        }else{
            return $old_home_data;
        }
    }

    public function delete_home_product_image(Request $r)
    {
        if(Sentinel::getUser()){}else{
            return 2;
        }
        $old_home_data = BdtdcHomeProduct::where('id',$r->delete_id)->first();
        if($old_home_data){
            if($old_home_data->images != '' && is_file('bdtdc-product-image/home-page/'.$old_home_data->images)){
                if(@unlink('bdtdc-product-image/home-page/'.$old_home_data->images)){
                    return 1;
                }else{
                    return $old_home_data;
                }
            }
        }else{
            return $old_home_data;
        }
    }

    public function edit_home_product(Request $r)
    {
        if(Sentinel::getUser()){}else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }
        if($r->section == 'bangladesh_products_check'){
            $update_result = BdtdcHomeProduct::where('id',$r->update_id)->update(['bangladesh_products'=>$r->s_value]);
            if($update_result){
                return 1;
            }else{
                return $update_result;
            }
        }
        if($r->section == 'homeproduct_hot_check'){
            $update_result = BdtdcHomeProduct::where('id',$r->update_id)->update(['hot_product'=>$r->s_value]);
            if($update_result){
                return 1;
            }else{
                return $update_result;
            }
        }
        if($r->section == 'homeproduct_wholesale_check'){
            $update_result = BdtdcHomeProduct::where('id',$r->update_id)->update(['whole_sale'=>$r->s_value]);
            if($update_result){
                return 1;
            }else{
                return $update_result;
            }
        }
        if($r->section == 'sort_check'){
            $update_result = BdtdcHomeProduct::where('id',$r->update_id)->update(['sort'=>$r->s_value]);
            if($update_result){
                return 1;
            }else{
                return $update_result;
            }
        }
       
    }

}
