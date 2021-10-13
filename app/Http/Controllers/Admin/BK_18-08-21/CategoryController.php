<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\BdtdcCategory;
use App\Model\BdtdcCategoryDescription;
use DB;
use Redirect;
use Input;
use View;
use App\Model\BdtdcCountry;


class CategoryController extends Controller
{    
    public function __construct()
    {
        ini_set('memory_limit', '9999999M');
    }

    public function index()
    {
        $categories=BdtdcCategory::with('category_name')->paginate(50);
        
        return View::make('protected.admin.myB2B.list_category',['categories'=>$categories]);
    }

    public function create()
    {
        $categories=BdtdcCategory::with('parent_cat')->where('parent_id','0')->get();
        
        return view('protected.admin.category.add_category', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
       
        $input = $request->only(['name','slug','tag','description','categories','seo','meta_title','meta_description','meta_keywords','top','status']); 
        if(Input::get('categories')){
        
         $messages='';             
              
             $validator = Validator::make(
                    array(
                        'name' => $input['name'],
                        'slug' => $input['slug'],
                        'tag' => $input['tag'],
                        'description' => $input['description'],
                        'categories'=>$input['categories'],
                        'seo' => $input['seo'],
                        'meta_title' => $input['meta_title'],
                        'meta_description' => $input['meta_description'],
                        'meta_keywords' => $input['meta_keywords']
                           
                    ),
                    array(
                        'name' => 'required|min:3|unique:bdtdc_category',
                        'slug' => 'required',
                        'tag' => 'required',
                        'description' => 'required|min:8',
                        'categories'=>'required',
                        'seo' => 'required|min:6',
                        'meta_title' => 'required|min:4',
                        'meta_description' => 'required|min:20',
                        'meta_keywords' => 'required|min:10'
                    )
                );
                // if ($validator->fails())
                // {
                    
                //     $messages = $validator->messages();
                //     echo json_encode(array('type'=>'error', 'text'=>$messages));
                //     return redirect::back()
                //     ->withErrors($validator);
                // }else{
                      $msg='';
                        $category = array(
                            'name'=>$input['name'],
                            'slug'=>$input['slug'],
                            'parent_id'=>$input['categories'][0],
                            'top'=>$input['top'],
                            'status'=>$input['status']

                            );
                        // dd($category);
                        //$id = DB::table('bdtdc_category')->insertGetId($category);
                        $bdtdc_category =new BdtdcCategory();
                        $bdtdc_category->name       = $input['name'];
                        $bdtdc_category->slug       = $input['slug'];
                        $bdtdc_category->parent_id  = $input['categories'][0];
                        $bdtdc_category->top        = $input['top'];
                        $bdtdc_category->status     = $input['status'];
                        $bdtdc_category->save();

                        $id =$bdtdc_category->id;
                         //dd($id);
                        if($id !=''){
                            $cat_desc = array(
                                'category_id'=>$id,
                                'language_id'=>1,
                                'name'=>$input['name'],
                                'tag'=>$input['tag'],
                                //'h1' => $input['h1'],
                                'description'=>$input['description'],
                                'meta_title' => $input['meta_title'],
                                'meta_description' => $input['meta_description'],
                                'meta_keyword' => $input['meta_keywords']
                                );
                            // dd($cat_desc);
                            DB::table('bdtdc_category_description')->insert($cat_desc);

                            $msg .= 'Category Created Successfully !';

                        }
                        //echo json_encode(array('type'=>'success', 'text'=>$msg));
                        return Redirect::back()->with(array('type'=>'success', 'text'=>$msg));
                        
                    // }    
                    }
                     
        else{
              $msg='Parent Category Must be 1 selected !';
              return Redirect::back()->with('flash_message',$msg);
        }     
           
           
    }

    public function business_type(){
        return view('protected.admin.category.add_business_type');
    }
    public function supplier_status(){
          $categories=BdtdcCategory::with('category_name')->get();
         return View::make('protected.admin.myB2B.product-list-category',['categories'=>$categories]);
    }
    public function store_business_type(Request $request){
        $input = $request->only(['name', 'description','sort']);     
        
        $messages='';             
              
        $validator = Validator::make(
                    array(
                        'name' => $input['name'],
                        'description' => $input['description'],
                        'sort'=>$input['sort']                     
                           
                    ),
                    array(
                        'name' => 'required|min:3|unique:bdtdc_busines_types',
                        'description' => 'required|min:8',
                        'sort'=>'required|numeric'
                        
                    )
                );
        if ($validator->fails())
        {
            $messages = $validator->messages();
            echo json_encode(array('type'=>'error', 'text'=>$messages));
        }else{
            $msg='';
            $type = array(
                'name'=>$input['name'],                                                       
                 'description'=>$input['description'],
                 'sort'=>$input['sort']
                );
           
            DB::table('bdtdc_busines_types')->insert($type);
            $msg .= 'Business Type Created Successfully !';
            echo json_encode(array('type'=>'success', 'text'=>$msg));
            
        }
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
        /*$category=BdtdcCategory::whereid($id)->get();
        dd($category);
        return view('protected.admin.myB2B.edit_category',compact('category'));*/
        
        //$categorys = BdtdcCategory::where('parent_id', 0)->get();
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
                            //dd($category_childrens);
                            foreach ($category_childrens as $category_children) {
                                # code...
                                $category_children_data[] = array(
                                    'category_id'  => $category_children->id,
                                    'child_name'=>  $category_children->name
                                    
                                );
                                
                            }
                            $data['categorys'][] = array(
                                //'name'=>$category->category_name,
                    'category_id'=> $category->id,
                    'name'=>$category->name,
                    'category_childrens' => $category_children_data
                    
                            );
                    //dd($category_children_data);
   
                }
        $categories = BdtdcCategory::with('category_name')->where('id', $id)->first();
        $parent_id=$categories->parent_id;
        $parent=BdtdcCategory::with('category_name')->where('id', $parent_id)->first();
        $cats=BdtdcCategory::with('category_name')->where('parent_id', 0)->get();
        // dd($cats);
        
        //return $parent;
        return view('protected.admin.myB2B.edit_category',['categorys'=> $categorys,'categories'=>$categories,'parent'=>$parent,'cats'=>$cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
       
        //$categorys = BdtdcCategory::find($id);
      /*  $categories = DB::table('bdtdc_category')
                    ->where('id', $id)
                    /*->with('category_name')*/
                   /* ->get(); */
        
        //$description = BdtdcCategoryDescription::all();
        /*$update_data = [
            'name' => $request->name,*/
            /*'parent_id' => $request->parent_id,*/
            /*'category_id' => ($request->parent_id != 0)? $request->category_id : '0',*/
        
        
         $categories=Input::get('name');
         $slug=Input::get('slug');
         $tag=Input::get('tag');
         $parent_id=Input::get('categories');
         $description=Input::get('description');
         $parent=Input::get('parent_id');
         $seo=Input::get('meta_keywords');
         $h1=Input::get('h1');
         $meta_title=Input::get('meta_title');
         $meta_description=Input::get('meta_description');

         //dd($parent_id);

         $inc=['name'=>$categories,
         'slug'=>$slug ,
                                'parent_id'=>$parent_id[0]];

//dd($inc);
         BdtdcCategory::find($id)
                            ->update($inc);
                            
     
         $ind=BdtdcCategoryDescription::where('category_id',$id)
                            ->update([
                                
                                'name'=>$categories ,
                                'tag'=>$tag ,
                                'h1' => $h1,
                                'description'=>$description,
                                'meta_keyword'=>$seo,
                                'meta_description'=>$meta_description,
                                'meta_title'=>$meta_title

                               
                                 ]);
        //return 1;
        /*$description = DB::table('bdtdc_category_description')->where('category_id', $id)->update($update_data);*/
        return Redirect::to('admin/category-list');
    }

    public function category_sort(Request $r){

        // dd($r->all());
        $update_result = BdtdcCategory::where('id',$r->update_id)->update(['sort_order'=>$r->s_value]);
        // return $update_result;
        if($update_result){
            return 1;
        }else{
            return $update_result;
        }
       
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
        
        BdtdcCategory::find($id)->delete();
        BdtdcCategoryDescription::where('category_id',$id)->delete();
        
        return Redirect::back();
    }


}
