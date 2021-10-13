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


class ProductController extends Controller
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
        $products = BdtdcProduct::with(['product_name','category','category.bdtdcCategory'])
                    ->paginate(50);

        $country_list=BdtdcCountry::all();
        $category_list=BdtdcCategory::with('sub_cat')->get();

        return view('protected.admin.product.product_lists',compact('products', 'country_list', 'category_list'));
    }


    public function product_search(Request $request){
         // dd($request->all());
        $name=$request->input('product_name');
        $id=$request->input('product_id');
        $category=$request->input('product_category');
        $country=$request->input('product_country');

        $country_list=BdtdcCountry::all();
        $category_list=BdtdcCategory::with('sub_cat')->get();
        // dd($country);
      
            /*$products = BdtdcProductDescription::where('name', 'LIKE', '%'.$name.'%')->paginate(20);
            dd($products)*/;

        $search_query = BdtdcProduct::query();
        if($name){
            $search_query->whereHas('product_name', function ($pname)  use ($name){
            $pname->where('name', 'LIKE', '%'.$name.'%');
           
            });
        }
       
        if($id)
        {
            $search_query->where('id', 'LIKE', '%'.$id.'%');
        }

        if($category){
            $search_query->whereHas('category', function ($pname)  use ($category){
            $pname->whereHas('bdtdcCategory', function ($cname)  use ($category){
                $cname->where('name', 'LIKE', '%'.$category.'%');
           
                });
           
            });
        }
        if($country){
            $search_query->whereHas('product_country', function ($cname)  use ($country){
            $cname->where('name', 'LIKE', '%'.$country.'%');
           
            });
        }
        $products = $search_query->paginate(10);
        return view('protected.admin.product.product_lists',compact('products', 'country_list', 'category_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
        $country = Country::get(['name','id']);
        $language = Language::lists('name','language_id');
        return view('protected.admin.product.product_create',$data, array('country'=>$country, 'units'=> $units));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    {
//        for($i=0,$len=count($request->get('product_att_value'));$i<$len;$i++){
//            $input_arr[$i]['product_id'] = 10;
//            $input_arr[$i]['product_att_name'] = $request->get('product_att_name')[$i];
//            $input_arr[$i]['product_att_value'] = $request->get('product_att_value')[$i];
//            //BdtdcProductAttribute::create($input_arr[$i]);
//        }
//        return $input_arr;
        //$data = $request->payment;
        //dd($data);
        DB::beginTransaction();
        try {
            $file_name = "no_image.jpg";
            if($request->file('image')){
                $string 	= str_random(10);
                $temp_file 	= $_FILES['image']['tmp_name'];
                $ext 		= pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $file_name 	= $string.'.'.$ext;
                if(move_uploaded_file($temp_file,'uploads/'.$file_name)){
                    $data['img_msg'] = "Image uploaded";
                }
                else{
                    $data['img_msg'] = "Image couldn't be uploaded";
                }
            }
            $insert_data = [
                'model'       => $request->product_model,
                'brandname' => $request->brand_name,
                'location' => $request->country,
                'price'    => $request->product_price,
                'payment_method'   => ($request->payment) ? implode(',',$request->payment) : null,
                'unit_type_id' => $request->unit_type,
                'image' => $file_name,
            ];
            //dd($insert_data);
            $product_details_id = DB::table('bdtdc_product')->insertGetId( $insert_data );
            //dd($insert_data);
           // return redirect::back()->with(compact('data'))->with('global', $insert_msg);
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            //DB insert query\
            $insert_data = [
                'product_id' => $product_details_id,
                'name'       => $request->product_name,
                'description' => $request->product_description,
                'tag' => $request->product_tags,
                'meta_title' => $request->product_meta_title,
                'meta_description' => $request->product_meta_description,
                'meta_keyword' => $request->product_meta_keywords,
            ];
            //dd($insert_data);
            $product_description = DB::table('bdtdc_product_description')->insertGetId($insert_data);
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            //DB insert query\
            $insert_data = [
                'product_id' => $product_details_id,
                'category_id'   => ($request->categories) ? implode(',',$request->categories) : null,
            ];
            //dd($insert_data);
            //dd($insert_data);
            $product_description = DB::table('bdtdc_product_to_category')->insert($insert_data);
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            //DB insert query
            for($i=0,$len=count($request->get('product_att_name'));$i<$len;$i++){
               // $input_arr[$i]['product_id'] = 10;
                $input_arr[$i]['name'] = $request->get('product_att_name')[$i];
                $input_arr[$i]['value'] = $request->get('product_att_value')[$i];
               //$input_arr[$i]['product_att_val'] = $request->get('product_att_value')[$i];
                //BdtdcProductAttribute::create($input_arr[$i]);
                $attributes_details[] = DB::table('bdtdc_attributes')->insertGetId($input_arr[$i]);
            }
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            //DB insert query
            //'category_id'   => ($request->categories) ? implode(',',$request->categories) : null,
            //$product_id = $product_details_id;
            //dd($attributes_details);
            $product_attribute = array();
            foreach($attributes_details as $data)
            {
               $product_attribute[] = array(
                   'attribute_id' => $data,
                    'product_id' => $product_details_id,
               );

            }
            //dd($product_attribute);

            $pro_attribute = DB::table('bdtdc_product_attribute')->insert($product_attribute);
            dd($pro_attribute);

//                // $input_arr[$i]['product_id'] = 10;
//                $product_id = $product_details_id;
//                $attribute_id = $attributes_details;
//                $input_arr[$i]['value'] = $request->get('product_att_value')[$i];
//                //$input_arr[$i]['product_att_val'] = $request->get('product_att_value')[$i];
//                //BdtdcProductAttribute::create($input_arr[$i]);
//                $attributes_details = DB::table('bdtdc_product_attribute')->insertGetId($input_arr[$i]);
//            }

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
        return redirect::back()->with(compact('data','units'))->with('flash_message', 'Product Information inserted');
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
        $country = Country::get(['name','id']);
        $products = BdtdcProduct::with(['product_name','category',])
                        ->where('id', $id)
                        ->get();
        $attributes = BdtdcProductAttribute::with(['bdtdcAttribute'])
                        ->where('product_id', $id)
                        ->get();
        //return $products[0]->category->category_id;
        return view('protected.admin.product.product_edit',$data, array('country'=>$country, 'units'=> $units, 'products'=> $products, 'attributes'=>$attributes));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $file_name = BdtdcProduct::find($id)->first(['image'])->image;
            if($request->file('image')){
                $string 	= str_random(10);
                $temp_file 	= $_FILES['image']['tmp_name'];
                $ext 		= pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $file_name 	= $string.'.'.$ext;
                if(move_uploaded_file($temp_file,'uploads/'.$file_name)){
                    $data['img_msg'] = "Image uploaded";
                }
                else{
                    $data['img_msg'] = "Image couldn't be uploaded";
                }
            }
            $insert_data = [
                'model'       => $request->product_model,
                'brandname' => $request->brand_name,
                'location' => $request->country,
                'price'    => $request->product_price,
                'payment_method'   => ($request->payment) ? implode(',',$request->payment) : null,
                'unit_type_id' => $request->unit_type,
                'image' => $file_name,
            ];
            //dd($insert_data);
            $product_details_id = DB::table('bdtdc_product')->where('id', $id)->update($insert_data);
            //dd($insert_data);
            // return redirect::back()->with(compact('data'))->with('global', $insert_msg);
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            //DB insert query\
            $insert_data = [
                'name'       => $request->product_name,
                'description' => $request->product_description,
                'tag' => $request->product_tags,
                'meta_title' => $request->product_meta_title,
                'meta_description' => $request->product_meta_description,
                'meta_keyword' => $request->product_meta_keywords,
            ];
           //dd($insert_data);
            $product_description = DB::table('bdtdc_product_description')->where('product_id', $id)->update($insert_data);
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            //DB insert query\
            $insert_data = [
                'category_id'   => ($request->categories) ? implode(',',$request->categories) : null,
            ];
            //dd($insert_data);
            //dd($insert_data);
            $product_description = DB::table('bdtdc_product_to_category')->where('product_id', $id)->update($insert_data);
           // dd($product_description);
        }
        catch(ValidationException $e){
            DB::rollback();
        }

        try{
            //DB insert query

            $attr_id = $request->get('attr_id');
            //dd($attr_id);
            //$attr_arr = [];
            $i=0;
            foreach($attr_id as $arr ){

                $attr_arr=[
                    'name' => $request->get('product_att_name')[$i],
                    'value' => $request->get('product_att_value')[$i],
                ];
                $attributes_details = BdtdcAttribute::find($arr)->update($attr_arr);
                //print_r($attr_arr);
                $i++;
            }

            return Redirect::back()->with('product_update_msg','Product updated!');
            //return $attr_arr;


//            for($i=0,$len=count($request->get('product_att_name'));$i<$len;$i++){
//                // $input_arr[$i]['product_id'] = 10;
//                $input_arr[$i]['name'] = $request->get('product_att_name')[$i];
//                $input_arr[$i]['value'] = $request->get('product_att_value')[$i];
//                //$input_arr[$i]['product_att_val'] = $request->get('product_att_value')[$i];
//                //BdtdcProductAttribute::create($input_arr[$i]);
//                $attributes_details[] = DB::table('bdtdc_attributes')->update($input_arr[$i]);
//            }

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

        return "Updated";

    }
    public function productdelete($id){
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
            return Redirect::to('/admin/product')->withFlashMessage('Product Deleted Successfully.');
    }

    public function manage_product()
    {
        $list_product = BdtdcProductToCategory::with(['pro_to_cat_name','bdtdcCategory','cat_country','supp_pro_company_name'])->paginate(30);
        //dd($list_product);
        //return $list_product;
        $category=DB::table('bdtdc_category_description')->get();
       //dd($category);
        $pc=DB::table('bdtdc_product_to_category')->get();
        //dd($pc);
        $c=DB::table('bdtdc_category')->get();
        //dd($c);
        return view('protected.admin.manage-product.manage-product',compact('list_product'));
    }
    public function edit_product($id)
    {
        if(Sentinel::getUser()){
        }else{
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['SCRIPT_URL']))->withFlashMessage('You must first login before accessing this page.');
        }
        $user_id = Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        
        $product_description = BdtdcProductToCategory::where('product_id',$id)->first();
        $company_id = $product_description->company_id;

        if($product_description->company_id != $company_id){
            Sentinel::logout();
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['SCRIPT_URL']))->withFlashMessage('You must first login before accessing this page.');
        }
        
        
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
    public function delete_product($id){
        return view('protected.admin.manage-product.confirm-delete-product',compact('id'));
    }
   public function update_product(Request $request,$id)

   {
    return $id;
        $list_product = BdtdcProductToCategory::with(['pro_to_cat_name','bdtdcCategory','cat_country','supp_pro_company_name'])
                        ->where('product_id',$id)
                        ->get();
        $list_product->update($request->all());
    
                $update_country = BdtdcCountry::findOrFail($id);
                //$update_country->update($request->all( ));
                //dd($update_country);
                $update_country = [
                    'name' => $request->name,
                   
                ];
                //dd($update_country);
                DB::table('bdtdc_country')->where('id', $id)->update($update_country);
                 $update_companies = BdtdcCompany::with(['name_string'])->get();
                 
                //$update_companies->update($request->all( ));
                //dd($update_companies);
                $update_companies = [
                    'name' => $request->name,
                   
                ];
                //dd($update_companies);
                DB::table('bdtdc_companies')->where('id', $id)->update($update_companies);
                $update_category = bdtdc_category::all();
                $update_category = bdtdc_category::findOrFail($id);
                //$update_category->update($request->all( ));
                //dd($update_category);
                $update_category = [
                    'name' => $request->name,
                   
                ];
                //dd($update_category);
                DB::table('bdtdc_category')->where('parent_id', 0)->update($update_category);

                return Redirect::to('admin/manage-product',compact('list_product'));
            

   }



   public function manage_inquiry(Request $request)
   {
        if($request->password){
            $validator = Validator::make($request->all(),[
                'password' => 'required',
            ]);
            if($validator->fails()){
                 //return Redirect::to('admin/manage-inquiry')->withErrors($validator)->withInput();
                 return back()->withErrors($validator)->withInput();
            }
            

            $current_user = Sentinel::getUser();
            $credentials = [
                'email'    => $current_user->email,
                'password' => $request->password,
            ];
            $recheck_user = Sentinel::validateCredentials($current_user, $credentials);

            //$recheck_user = $request->password == 6672;
            //$recheck_user = $request->password;

            if($recheck_user){
                $request->session()->put('manage_inquiry_password_recheck', 'true');
                // $_SESSION['manage_inquiry_password_recheck'] == true;
            }else{   
                 return Redirect::to('admin/manage-inquiry')->with('error', 'Your Password is Wrong');
                //$validator->errors()->add('invalid', 'Invalid Credential Provided!');
                //return Redirect::to('admin/manage-inquiry')->withErrors($validator)->withInput();
            }
        }
        

        //Notification Mark as read
        BdtdcNotification::where('notification_type', 1)->where('admin_read_at', NULL)->update(['admin_read_at' => date('Y-m-d H:i:s')]);
        //End Notification

        $manage_inquiry_password_recheck = false;
        if($request->session()->has('manage_inquiry_password_recheck')){
            if(session('manage_inquiry_password_recheck') == true){
                $manage_inquiry_password_recheck = true;
            }else{
                $manage_inquiry_password_recheck = false;
            }
        }else{
            $manage_inquiry_password_recheck = false;
        }

        $p = DB::table('bdtdc_product_unit')->get();
        $search_str = '';
        $search_inq_type = 'all';
        $search_sender = 'all';
        $search_receiver = 'all';
        $search_status = 0;
        if($request->search){
            $search_str = $request->search;
        }
        if($request->type){
            $search_inq_type = $request->type;
        }
        if($request->sender){
            $search_sender = $request->sender;
        }
        if($request->receiver){
            $search_receiver = $request->receiver;
        }
        if($request->status){
            $search_status = $request->status;
        }
        // dd($search_status);
        $user_id =Sentinel::getUser()->id;
       // dd($user_id);
        /*$inquiry = BdtdcSupplierInquery::with(['productname','BdtdcSupplierQueryProductUnit','product_supplier','sender_name'])
                // ->where('sender',$user_id)
                // ->Orwhere('product_owner_id',$user_id)
                // ->where('product_owner_id',$user_id)
                ->orderBy('id','desc')
                ->take(5)
                ->get();
                // dd($inquiry);
                // dd($inquiry[0]->productname);
                // dd($inquiry->BdtdcSupplierQueryProductUnit);
                // dd($inquiry);
         // dd($inquiry->product_owner_supplier);
         // return $inquiry->product_owner_supplier;
                // return $inquiry->product_owner_supplier->first_name;*/
        $inquiry_query = BdtdcSupplierInquery::query();
        
        if($search_str != ''){
            $inquiry_query->where(function($subQuery) use ($search_str) {
                $subQuery->where('inquery_title','LIKE','%'.$search_str.'%');
                $subQuery->orWhereHas('inq_products_description',function($subQuery) use ($search_str) {
                    $subQuery->where('name','LIKE','%'.$search_str.'%');
                });
            });
        }
        if($search_inq_type != 'all'){
            if($search_inq_type == 'quotation'){
                $inquiry_query->where('is_RFQ', 1);
            }else if($search_inq_type == 'inquiry-single'){
                $inquiry_query->where('is_RFQ', 0);
                $inquiry_query->where('is_join_quotation', 0);
            }else if($search_inq_type == 'inquiry-multiple'){
                $inquiry_query->where('is_RFQ', 0);
                $inquiry_query->where('is_join_quotation', 1);
            }else if($search_inq_type == 'inquiry-both'){
                $inquiry_query->where('is_RFQ', 0);
            }
        }
        if($search_sender != 'all'){
            $inquiry_query->where('sender', $search_sender);
        }
        if($search_receiver != 'all'){
            $inquiry_query->where('product_owner_id', $search_receiver);
        }
        if($search_status != 0){
            $inquiry_query->where('status', $search_status);
        }

        $inquiry_query->orderBy('id','desc');
        $inquiry = $inquiry_query->paginate(20);

        $user=User::with('Role_user')->whereHas('Role_user',function($subQuery){
            $subQuery->where('role_id',2);
            $subQuery->orWhere('role_id',3);
        })->orderBy('first_name','asc')
        ->get();

        $product_name=DB::table('bdtdc_product_description')->get();
        // dd($inquiry);
        $unit=BdtdcProductUnit::all();
        /*if($request->status == 'pending'){
            $search_status = $request->status;
        }*/
        // dd(BdtdcHomeInquires::get());
        return view('protected.admin.inquiry.manage-inquiry',['inquiry' => $inquiry->appends(Input::except('page'))],compact('inquiry','user','unit','product_name','search_str','search_inq_type','search_sender','search_receiver','search_status','manage_inquiry_password_recheck'));
   }

   public function edit_inquiry($id)
   {
        $data['inquiry_id'] = $id;
        $data['inquiry'] = BdtdcSupplierInquery::where('id',$id)->first();
        $data['units']=DB::table('bdtdc_product_unit')->get();
        return view('protected.admin.inquiry.edit-inquiry',$data);
   }

   public function post_edit_inquiry(Request $request,$id)
   {
        $validator = Validator::make($request->all(),[
            'title' => 'max:200',
            'quantity' => 'required|integer|max:9999999',
            'price' => 'required|numeric',
            'currency' => 'required|max:3',
            'unit' => 'required|integer|max:999999',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        if(BdtdcSupplierInquery::where('id',$id)->update(
            ['inquery_title'=>$request->input('title'),
            'quantity'=>$request->input('quantity'),
            'pre_unit_price'=>$request->input('price'),
            'currency'=>$request->input('currency'),
            'unit_id'=>$request->input('unit')
            ])){
            return Redirect::to('admin/manage-inquiry')->with('success','Inquiry updated successfully');
        }else{
            return Redirect::to('admin/manage-inquiry')->with('error','Unknown error occured');
        }
   }

   public function edit_inquiry_active($inquiry_id,$value){
        if(Sentinel::getUser()){}else{
            return 2;
        }
        $update_result = BdtdcSupplierInquery::where('id',$inquiry_id)->update(['active'=>$value]);
        if($update_result){
            return 1;
        }else{
            return $update_result;
        }
   }

   public function store_home_inquiry(Request $r){
        if(Sentinel::getUser()){}else{
            Session::flash('error', "Please Login First.");
            return back();
        }
        
        $validator = Validator::make($r->all(), [
            'inquiry_id' => 'required|integer|max:99999999999999',
            'images' => 'image|mimes:jpeg,bmp,png|max:2000',
            'sort' => 'required|integer|max:1000',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $insert_array = [
                            'inquiry_id'=>$r->inquiry_id,
                            'show'=>$r->show_image?1:0,
                            'sort'=>$r->sort,
                        ];

        $old_home_inq = BdtdcHomeInquires::where('inquiry_id',$r->inquiry_id)->first();

        if($old_home_inq){
            BdtdcHomeInquires::where('id',$old_home_inq->id)->update($insert_array);
            $insert_id = $old_home_inq->id;
        }else{
            $insert_id = BdtdcHomeInquires::insertGetId($insert_array);
        }
        
        if($insert_id){
            if ($r->hasFile('images')) {
                // UPLOAD FILE : Homepage Product Image
                $destination_path = 'bdtdc-product-image/home-page/';
                $prefix_filename = $insert_id;
                $full_destination_path = $destination_path;

                // Process file request
                $file = $r->file('images');
                if ($file->isValid()) {
                    // Create destination path if not exists
                    if (!File::exists($destination_path)) {
                        File::makeDirectory($destination_path, 0755, true);
                    }

                    // Get file extension
                    $extension = $file->getClientOriginalExtension();

                    // Build the new filename
                    $filename_gen = uniqid();
                    $new_filename = strtolower('homepage-inquiry-product-image_'.$prefix_filename .'_'. $filename_gen . '.' . $extension);
                    // Delete old file if new file has uploaded
                    if($old_home_inq){
                        if ($old_home_inq->images != '') {
                            if (is_file($destination_path . $old_home_inq->images)) {
                                @unlink($destination_path . $old_home_inq->images);
                            }
                        }
                    } 

                    // Save Resume on the server
                    $file->move($destination_path, $new_filename);
                    // Ad company logo in database
                    $update_res = BdtdcHomeInquires::where('id',$insert_id)->update(['images'=>$new_filename]);

                    // User::where('id', $this->user->id)->update(['picture'=>$new_filename]);
                    
                }
            }
            Session::flash('success', "Action Successful.");
            return back();
        }else{
            Session::flash('error', "Unknown Error Occured.");
            return back();
        }
        
   }

   public function inquiry_details($id){
        if(!Sentinel::getUser()){
            return '<h3 class="text-center text-danger">Please Login First</h3>';
        }
        
        BdtdcSupplierInquery::where('product_owner_id',0)->update(['product_owner_id'=>2]);
        $inquiry = BdtdcSupplierInquery::where('id',$id)->first();

        if($inquiry){
            /*if($inquiry->is_RFQ == 1){
                return view('protected.admin.inquiry.inquiry_details_quotation',compact('inquiry'));
            }else*/
            if($inquiry->is_join_quotation == 0){
                $product = DB::table('bdtdc_supllier_inqueries as si')
                        ->join('bdtdc_product_description as pd','pd.product_id','=','si.product_id','left')
                        ->join('bdtdc_product_image as pi','pi.product_id','=','si.product_id','left')
                        ->join('bdtdc_product_images as pin','pin.product_id','=','si.product_id','left')
                        ->join('bdtdc_product_to_category as ptc','ptc.product_id','=','si.product_id','left')
                        ->join('bdtdc_category_description as cd','cd.category_id','=','ptc.category_id','left')
                        ->join('bdtdc_category_description as pcd','pcd.category_id','=','ptc.parent_id','left')
                        ->join('bdtdc_product_unit as pu','pu.id','=','si.unit_id','left')
                        ->join('users as u','u.id','=','si.product_owner_id','left')
                        ->join('users as u2','u2.id','=','si.sender','left')
                        ->where('si.id',$id)
                        ->groupby('pi.product_id')
                        ->first(['si.id','u.first_name as pw_first_name','u.last_name as pw_last_name','u2.first_name as s_first_name','u2.last_name as s_last_name','si.product_id','pu.name as unit','si.quantity','si.message','si.product_owner_id','si.sender','pd.name','pi.image as image','pin.image as images','si.views','si.created_at','cd.name as sub_cat','pcd.name as parent_cat']);
                $prev_quotation = BdtdcInqueryMessage::where('inquery_id',$id)->get();

                return view('protected.admin.inquiry.inquiry_details',compact('inquiry','product','prev_quotation'));
            }else{
                $join_quotation = DB::table('bdtdc_supllier_inqueries as jq')
                                ->join('users as u','u.id','=','jq.product_owner_id','left')
                                ->join('users as u2','u2.id','=','jq.sender','left')
                                ->where('jq.id',$id)
                                ->first(['jq.id','u.first_name as pw_first_name','u.last_name as pw_last_name','u2.first_name as s_first_name','u2.last_name as s_last_name','jq.product_id','jq.message','jq.product_owner_id','jq.sender','jq.views','jq.created_at','jq.quantity']);
                $arr_of_p_id =  explode(',',$join_quotation->product_id);
            $all_join_quotation = [];
            for($i=0,$len=sizeof($arr_of_p_id);$i<$len;$i++){
                $all_join_quotation[$i] = DB::table('bdtdc_product_description as pd')
                    ->join('bdtdc_product_image as pi','pi.product_id','=','pd.product_id','left')
                    ->join('bdtdc_product_images as pin','pin.product_id','=','pd.product_id','left')
                    ->join('bdtdc_product_to_category as ptc','ptc.product_id','=','pd.product_id','left')
                    ->join('bdtdc_category_description as cd','cd.category_id','=','ptc.category_id','left')
                    ->join('bdtdc_category_description as pcd','pcd.category_id','=','ptc.parent_id','left')
                    ->join('bdtdc_product as p','p.id','=','pd.product_id','left')
                    ->join('bdtdc_product_unit as pu','pu.id','=','p.unit_type_id','left')
                    ->where('pd.product_id',$arr_of_p_id[$i])
                    ->groupby('pi.product_id')
                    ->first(['pd.product_id','pd.name','pi.image as image','pin.image as images','pu.name as unit','cd.name as sub_cat','pcd.name as parent_cat']);
                    // dd($all_join_quotation[$i]);
                    $all_join_quotation[$i]->quantity = $join_quotation->quantity;
                }
                return view('protected.admin.inquiry.inquiry_details_multiple',compact('inquiry','join_quotation','all_join_quotation'));
            }
        }else{
            return '<h3 class="text-center text-danger">Sorry!!! Requested Inquiry Not Available</h3>';
        }
   }

   public function delete_inquiry($id){
        if(Sentinel::getUser()){}else{
            return 2;
        }
        $old_inq = BdtdcSupplierInquery::with('home_inquiry','inq_docs','inq_message.bdtdcInqueryMessageDocs')->where('id',$id)->first();
        if($old_inq){
            if($old_inq->home_inquiry){
                if(file_exists('bdtdc-product-image/home-page/'.$old_inq->home_inquiry->images)){
                    @unlink('bdtdc-product-image/home-page/'.$old_inq->home_inquiry->images);
                }
                BdtdcHomeInquires::where('inquiry_id',$id)->delete();
            }
            if($old_inq->inq_docs){
                foreach($old_inq->inq_docs as $inq_docs_single){
                    if(file_exists('buying-request-docs/'.$inq_docs_single->images)){
                        @unlink('buying-request-docs/'.$inq_docs_single->images);
                    }
                    bdtdcInqueryDocs::where('id',$inq_docs_single->id)->delete();
                }
            }
            if($old_inq->inq_message){
                foreach ($old_inq->inq_message as $inq_message_single) {
                    if($inq_message_single->bdtdcInqueryMessageDocs){
                        foreach ($inq_message_single->bdtdcInqueryMessageDocs as $inq_mess_single) {
                            if(file_exists('quotation/'.$inq_mess_single->docs)){
                                @unlink('quotation/'.$inq_mess_single->docs);
                            }
                            BdtdcQuoteDocs::where('id',$inq_mess_single->id)->delete();
                        }
                    }
                    BdtdcInqueryMessage::where('id',$inq_message_single->id)->delete();
                }
            }
            $delete_result = BdtdcSupplierInquery::where('id',$id)->delete();
            if($delete_result){
                return 1;
            }else{
                return $delete_result;
            }
        }else{
            return $old_inq;
        }
            
   }
   public function deleteAll(Request $request){
        $ids = $request->ids;
        $delete_result = BdtdcSupplierInquery::whereIn('id',explode(",",$ids))->delete();
        if($delete_result){
            return response()->json(['success'=>"Inquiry Deleted successfully."]);
        }else{
            return $delete_result;
        }
    }

   public function store_inquiry(Request $request)
   {
        // return $request->all();
        $id = $request->update_id;
        $product_id = $request->product_id;

         $update_inquiry = [

                    'product_owner_id'=>$request->product_owner_new,
                    'unit_id'=>$request->product_unit_new,
                    'quantity'=>$request->quantity_new,
                    'message'=>$request->message_new,
                    'currency'=>$request->currency_new,
                    'destination_port'=>$request->port_new,
                    /*'payment_terms'=>$request->payment_terms,*/
                    'sender'=>$request->sender_new,

                ];

        $product_name = [
                'name'=>$request->product_name_new,
        ];
                // print_r($update_inquiry);
                //dd($update_inquiry);
                // $update=DB::table('bdtdc_supllier_inqueries')->where('id',$id)->update($update_inquiry);
               
                if(DB::table('bdtdc_supllier_inqueries')->where('id',$id)->update($update_inquiry))
                    {
                        if(DB::table('bdtdc_product_description')->where('product_id',$product_id)->update($product_name))
                            {
                                return 1;
                            }
                        else
                            {
                                return "Query failed";
                            }
                    }
                else
                    {
                        return "Query failed";
                    }


                //return Redirect::to('admin/manage-inquiry');
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
    public function Manage_selected_supplier()

        { if(Sentinel::getUser()){}else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }

        $data['home_product'] = BdtdcHomeProduct::paginate(10);
        $data['bdtdc_supplier'] = BdtdcSupplier::whereHas('user',function($subQuery){
            $subQuery->orderBy('first_name','asc');
        })
        ->get();
        // $data['bdtdc_supplier'] = BdtdcSupplier::get();
        // dd($data['bdtdc_supplier'][0]->user);
        return View::make('protected.admin.homeproduct.manage_home_products',$data);
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
