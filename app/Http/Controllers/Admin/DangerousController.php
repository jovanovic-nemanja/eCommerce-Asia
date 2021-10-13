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
use URL;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Model\BdtdcProductUnit;
use App\Model\BdtdcHomeInquires;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcCountry;
use App\Model\BdtdcCompany;
use App\Model\BdtdcCompanyDescription;
use App\Model\BdtdcSupplierQuery;
use App\Model\BdtdcSupplierInquery;
use App\Model\BdtdcInqueryMessage;
use App\Model\bdtdcInqueryDocs;
use App\Model\BdtdcQuoteDocs;
use App\Model\User;
use DB;
use View;
use Sentinel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Model\BdtdcHomeProduct;
use App\Model\BdtdcSupplier;
use App\Model\Role_user;
use App\Model\Role;
use App\Model\BdtdcProductImage;
use App\Model\BdtdcProductImageNew;
use App\Model\BdtdcProductDescription;


class DangerousController extends Controller
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
    
    public function index()
    {
        $products = BdtdcProduct::with(['product_name','category'])

                    ->get();
        //return $products;
       // return $products[0]->category->bdtdcCategory->name;
        return view('protected.admin.manage_anything',compact('products'));
    }

    public function make_me_login($id){
        $user = Sentinel::findById($id);
        Sentinel::logout();
        Sentinel::login($user);
        return back();
    }

    public function make_me_login_redirect(Request $request, $id){
        $user = Sentinel::findById($id);
        if($user){
            if($request->redirect){
                Sentinel::logout();
                Sentinel::login($user);
                return Redirect::to($request->redirect);
            }else{
                return 'request not found';
            }
        }else{
            return 'user not found';
        }
    }

    public function check_image_available(){
        foreach (glob("bdtdc-product-image/*") as $filename) {
            echo "$filename size " . filesize($filename) . "<br>";
            foreach (glob("$filename/*") as $filename2) {
                echo "$filename2 size " . filesize($filename2) . "<br>";
                foreach (glob("$filename2/*") as $filename3) {
                    echo "<a target='_blank' href='".URL::to('/')."/".$filename3."'>$filename3 size ". filesize($filename3)."</a><br>";
                }
                echo "<hr>";
            }
            echo "<hr>";
            echo "<hr>";
        }
    }

    public function change_image_location(){
        $img_count = 1;
        $product_image = BdtdcProductImage::get();
        if($product_image){
        if(count($product_image)>0){
        echo 'Total image need to manipulate = '.count($product_image).'<hr>';
        echo '<p style="color:green">Start working...</p>';
        foreach ($product_image as $s_img) {
            $file_location = 'uploads/'.$s_img->image;
            echo $img_count.'. <a href="'.$file_location.'" target="_blank">'.$file_location.'</a><br>';
            if($s_img->bdtdcProductToCategory){
                if(file_exists($file_location)){
                    echo '<p style="color:green">file exist on server. working...</p>';
                    $parent_category = null;
                    $sub_category = null;
                    if($s_img->bdtdcProductToCategory->BdtdcParentCategoryDescription){
                        if($s_img->bdtdcProductToCategory->BdtdcParentCategoryDescription->bdtdcCategory){
                            $parent_category = $s_img->bdtdcProductToCategory->BdtdcParentCategoryDescription->bdtdcCategory;
                        }
                    }
                    if($s_img->bdtdcProductToCategory->BdtdcCategoryDescription){
                        if($s_img->bdtdcProductToCategory->BdtdcCategoryDescription->bdtdcCategory){
                            $sub_category = $s_img->bdtdcProductToCategory->BdtdcCategoryDescription->bdtdcCategory;
                        }
                    }
                    if($parent_category && $sub_category){
                        $pname = '';
                        $product_description = BdtdcProductDescription::where('product_id',$s_img->product_id)->first();
                        if($product_description){
                                $pname = $product_description->name;
                                //The name of the directory that we need to create.
                                $directoryName = 'bdtdc-product-image/'.trim($parent_category->slug).'/'.trim($sub_category->slug);

                                //Check if the directory already exists.
                                if(!is_dir($directoryName)){
                                    //Directory does not exist, so lets create it.
                                    //true for nested directory (need 0777 permission for this)
                                    mkdir($directoryName, 0777, true);
                                }
                                if($pname == ''){
                                    $string   = 'Product-image_'.$parent_category->id."_".$sub_category->id."_".str_random(10);
                                }else{
                                    $string   = preg_replace('/[^A-Za-z0-9]/ ', '-',substr($pname,0,100)).'_'.$parent_category->id."_".$sub_category->id."_".str_random(10);
                                }
                                $ext = pathinfo($file_location, PATHINFO_EXTENSION);
                                $product_photo  = $string.'.'.$ext;
                                $dst = $directoryName.'/'.$product_photo;
                                echo '. <a href="'.$dst.'" target="_blank">'.$dst.'</a><br>';
                                if(rename($file_location, $dst)){
                                    echo '<p style="color:green">file moved to >> '.$dst.'</p>';
                                    //insert image name to database
                                    $img_arr = [
                                                    'image' => $dst,
                                                    'product_id' => $s_img->product_id
                                                ];
                                    $new_created = BdtdcProductImageNew::create($img_arr);
                                    if($new_created){
                                        echo '<p style="color:green">new image inserted on database as >> '.$new_created->image.'</p>';
                                    }
                                    //delete image form old database
                                    $is_deleted = BdtdcProductImage::where('id',$s_img->id)->delete();
                                    if($is_deleted){
                                        echo '<p style="color:green">removed from database</p>';
                                        if(file_exists($file_location)){
                                            @unlink($file_location);
                                            echo '<p style="color:green">removed from server after rename</p>';
                                        }else{
                                            echo '<p style="color:green">file not available on server after rename</p>';
                                        }
                                        echo '<p style="color:green"><b>Success!!!</b></p>';
                                    }
                                }else{
                                    echo '<p style="color:red">unable to move to >> '.$dst.'</p>';
                                    echo '<p style="color:red"><b>Failed!!!</b></p>';
                                }
                        }else{
                            $is_deleted = BdtdcProductImage::where('id',$s_img->id)->delete();
                            if($is_deleted){
                                echo '<p style="color:green">removed from database</p>';
                                if(file_exists($file_location)){
                                    @unlink($file_location);
                                    echo '<p style="color:green">removed from server</p>';
                                }else{
                                    echo '<p style="color:red">file not available on server</p>';
                                }
                            }else{
                                echo '<p style="color:red">Unable to delete. target >> '.$s_img->id.'</p>';
                            }
                            echo '<p style="color:red">product containing this is not available >> pid = '.$s_img->product_id.'</p>';
                        }
                    }else{
                        echo '<p style="color:red">category not available</p>';
                        $is_deleted = BdtdcProductImage::where('id',$s_img->id)->delete();
                        if($is_deleted){
                            echo '<p style="color:green">removed from database</p>';
                            if(file_exists($file_location)){
                                @unlink($file_location);
                                echo '<p style="color:green">removed from server</p>';
                            }else{
                                echo '<p style="color:red">file not available on server</p>';
                            }
                        }else{
                            echo '<p style="color:red">Unable to delete. target >> '.$s_img->id.'</p>';
                        }
                    }
                }else{
                    echo '<p style="color:red">file not available on server.</p>';
                    $is_deleted = BdtdcProductImage::where('id',$s_img->id)->delete();
                    if($is_deleted){
                        echo '<p style="color:green">removed from database</p>';
                    }else{
                        echo '<p style="color:red">Unable to delete. target >> '.$s_img->id.'</p>';
                    }
                }
            }else{
                echo '<p style="color:red">not found in bdtdcProductToCategory</p>';
                $is_deleted = BdtdcProductImage::where('id',$s_img->id)->delete();
                if($is_deleted){
                    echo '<p style="color:green">removed from database</p>';
                    if(file_exists($file_location)){
                        @unlink($file_location);
                        echo '<p style="color:green">removed from server</p>';
                    }else{
                        echo '<p style="color:red">file not available on server</p>';
                    }
                }else{
                    echo '<p style="color:red">Unable to delete. target >> '.$s_img->id.'</p>';
                }
            }
            echo '<hr>';
            $img_count++;
        }
        echo '<p style="color:green">End</p>';
        }
        }
    }

    public function update_image_location(){
        $img_count = 1;
        $product_image = BdtdcProductImageNew::get();
        if($product_image){
        if(count($product_image)>0){
        echo 'Total image need to manipulate = '.count($product_image).'<hr>';
        echo '<p style="color:green">Start working...</p>';
        foreach ($product_image as $s_img){
            echo $img_count.'. '.$s_img->image.'<br>';
            $no_need_to_change = explode('/', (string)($s_img->image));
            if($no_need_to_change[0] == 'bdtdc-product-image'){
                echo '<p style="color:green">Alerady manipulated.</p>';
                echo '<a href="'.$s_img->image.'" target="_blank">'.$s_img->image.'</a><br>';
            }else{
                if($s_img->bdtdcProductToCategory){
                    $parent_category = null;
                    $sub_category = null;
                    if($s_img->bdtdcProductToCategory->BdtdcParentCategoryDescription){
                        if($s_img->bdtdcProductToCategory->BdtdcParentCategoryDescription->bdtdcCategory){
                            $parent_category = $s_img->bdtdcProductToCategory->BdtdcParentCategoryDescription->bdtdcCategory;
                        }
                    }
                    if($s_img->bdtdcProductToCategory->BdtdcCategoryDescription){
                        if($s_img->bdtdcProductToCategory->BdtdcCategoryDescription->bdtdcCategory){
                            $sub_category = $s_img->bdtdcProductToCategory->BdtdcCategoryDescription->bdtdcCategory;
                        }
                    }
                    if($parent_category && $sub_category){
                        $file_location = 'bdtdc-product-image/'.trim($parent_category->name).'/'.trim($sub_category->name).'/'.$s_img->image;
                        echo 'prev file location : <a href="'.$file_location.'" target="_blank">'.$file_location.'</a><br>';
                        if(file_exists($file_location)){
                            echo '<p style="color:green">image exist on server.</p>';
                            $pname = '';
                            $product_description = BdtdcProductDescription::where('product_id',$s_img->product_id)->first();
                            if($product_description){
                                $pname = $product_description->name;
                                //The name of the directory that we need to create.
                                $directoryName = 'bdtdc-product-image/'.trim($parent_category->slug).'/'.trim($sub_category->slug);

                                //Check if the directory already exists.
                                if(!is_dir($directoryName)){
                                    //Directory does not exist, so lets create it.
                                    //true for nested directory (need 0777 permission for this)
                                    mkdir($directoryName, 0777, true);
                                }
                                if($pname == ''){
                                    $string   = 'Product-image_'.$parent_category->id."_".$sub_category->id."_".str_random(10);
                                }else{
                                    $string   = preg_replace('/[^A-Za-z0-9]/ ', '-',substr($pname,0,100)).'_'.$parent_category->id."_".$sub_category->id."_".str_random(10);
                                }
                                $ext = pathinfo($file_location, PATHINFO_EXTENSION);
                                $product_photo  = $string.'.'.$ext;
                                $dst = $directoryName.'/'.$product_photo;
                                echo '. <a href="'.$dst.'" target="_blank">'.$dst.'</a><br>';
                                if(rename($file_location, $dst)){
                                    echo '<p style="color:green">file moved to >> '.$dst.'</p>';
                                    //insert image name to database
                                    $img_arr = [
                                                    'image' => $dst
                                                ];
                                    //update image form the database
                                    $is_updated = BdtdcProductImageNew::where('id',$s_img->id)->update($img_arr);
                                    if($is_updated){
                                        echo '<p style="color:green">image field updated</p>';
                                        if(file_exists($file_location)){
                                            @unlink($file_location);
                                            echo '<p style="color:green">removed from server after rename</p>';
                                        }else{
                                            echo '<p style="color:green">file not available on server after rename</p>';
                                        }
                                        echo '<p style="color:green"><b>Success!!!</b></p>';
                                    }
                                }else{
                                    echo '<p style="color:red">unable to move to >> '.$dst.'</p>';
                                    echo '<p style="color:red"><b>Failed!!!</b></p>';
                                }
                            }else{
                                echo '<p style="color:red">image product not found.</p>';
                            }
                        }else{
                            echo '<p style="color:red">image not exist on server.</p>';
                        }
                    }else{
                        echo '<p style="color:red">image category & parent category not found.</p>';
                    }
                }else{
                    echo '<p style="color:red">image category not found.</p>';
                }
            }
            echo '<hr>';
            $img_count++;
        }
        echo '<p style="color:green"><b>End</b></p>';
        }
        }
    }

    public function delete_first_unwanted_img(){
        $img_count = 1;
        $product_image = BdtdcProductImageNew::get();
        if($product_image){
        if(count($product_image)>0){
        echo 'Total image need to manipulate = '.count($product_image).'<hr>';
        echo '<p style="color:green">Start working...</p>';
        foreach ($product_image as $s_img){
            echo $img_count.'. '.$s_img->image.'<br>';
            $no_need_to_change = explode('/', (string)($s_img->image));
            if($no_need_to_change[0] == 'bdtdc-product-image'){
                echo '<p style="color:green">Alerady manipulated.</p>';
                echo '<a href="'.$s_img->image.'" target="_blank">'.$s_img->image.'</a><br>';
            }else{
                echo '<p style="color:red">need to delete.</p>';
                $is_deleted = BdtdcProductImageNew::where('id',$s_img->id)->delete();
                if($is_deleted){
                    echo '<p style="color:greed">Deleted.</p>';
                }else{
                    echo '<p style="color:red">Unable to delete</p>';
                }
                echo '<a href="'.$s_img->image.'" target="_blank">'.$s_img->image.'</a><br>';
            }
        }
    }
    }
    }
}
