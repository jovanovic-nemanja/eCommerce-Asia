<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ModuleRequest;
use App\Model\Module;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use Redirect;
use Validator;
use App\Model\BdtdcPageSeo;

class ModuleController extends Controller
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
        //
    }

    public function create()
    {
        $modules = Module::where('parent_id', 0)->get();
        return view('protected.admin.modules.module-add', compact('modules'));
    }

    public function store(ModuleRequest $request)
    {


         $rules=array(
            'parent_id'=>'required',
            'module_name'=>'required',
            'short_name'=>'required',
            'icon_1'=>'required',
            'icon_2'=>'required',
            'css_class'=>'required',
            'slug'=>'required',
            'status'=>'required',
            );


        $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return redirect::back()
                            ->withErrors($validator);
             
            }
            else
            {
                $insert_data = [
            'parent_id' => $request->parent_id,
            'name'       => $request->module_name,
            'short_name' => $request->short_name,
            'icon1'         => $request->icon_1, 
            'icon2'       => $request->icon_2,
            'css_class'   => $request->css_class,
            'slug'       => $request->slug,
            'sort'    => $request->sort,
            'status'  => $request->status,
        ];
        if(DB::table('modules')->insert($insert_data)){
            $insert_msg = "Around world information Added";
        }
        else{
            $insert_msg = "Could not add";
        }
        return redirect::back()->with(compact('data'))->with('global', $insert_msg);

        }

        
    }

    public function allModules()
    {
        $all_modules = Module::all();
        return view('protected.admin.modules.module-lists', compact('all_modules'));
    }

    public function add_seo()
    {
        $page_seo = BdtdcPageSeo::all();
        $seo = DB::table('bdtdc_page_seo')->get();
        return view('protected.admin.seo.add-seo',compact('seo','page_seo'));
    }
    public function get_seo(Request $request)
    {
//        echo 'sdfsd'.$request->id;
//        exit;
//        $page_seo = BdtdcPageSeo::all();
        $seo = BdtdcPageSeo::where('id', $request->id)->get();
//        return view('protected.admin.seo.add-seo',compact('seo'));
        return response()->json(['data' => $seo]);
//        return $seo;
    }
    
    
    
    public function add_seo_store(Request $request)
    {
         $rules=array(
            'page_id'=>'required|integer|unique:bdtdc_page_seo,page_id',
            'page_route'=>'required',
            'title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            'meta_title'=>'required',
            );


        $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return redirect::back()
                            ->withErrors($validator);
             
            }
            else
            {
                $input=$request->only('page_id','page_route','title','meta_keyword','meta_description','meta_title');
                //dd($input);
                $insert_data=array();
                $insert_data = array
                (
                    'page_id'=>$input['page_id'],
                    'page_route'=> $input['page_route'],
                    'title'=> $input['title'],
                    'meta_keyword'=>$input['meta_keyword'], 
                    'meta_description'=>$input['meta_description'],
                    'meta_title'=>$input['meta_title'],  
                );

                //dd($insert_data);
                $SEO = DB::table('bdtdc_page_seo')->insert($insert_data);
                //dd($SEO);
                if($request->save==1){
                    return Redirect::to('admin/manage-seo')->with('flash_message', 'SEO Added Successfully');
                }else{
                    return Redirect::to('admin/add-seo')->with('flash_message', 'SEO Added Successfully');
                }
                
            }
    }
    public function manage_seo()
    {
        $seo = DB::table('bdtdc_page_seo')->orderBy('created_at', 'desc')->get();
        return view('protected.admin.seo.manage_seo',compact('seo'));

    }
    public function edit_seo($id)
    {
        $seo = BdtdcPageSeo::where('id', $id)->first();
        return view('protected.admin.seo.edit-seo',compact('seo'));
    }
    public function update_seo(Request $request,$id)
    {

         $rules=array(
            'page_id'=>'required|integer',
            'page_route'=>'required',
            'title'=>'required',
            'meta_keyword'=>'required',
            'meta_description'=>'required',
            'meta_title'=>'required',
            );


        $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return redirect::back()
                            ->withErrors($validator);
             
            }
            else
            {
                $page_seo = BdtdcPageSeo::all();
                $page_seo = BdtdcPageSeo::findOrFail($id);
                //$page_seo->update($request->all( ));
                //dd($page_seo);
                //return $page->id;
                $update_data = [
                    'page_id' => $request->page_id,
                    'page_route' => $request->page_route,
                    'title' => $request->title,
                    'meta_keyword'         => $request->meta_keyword,
                    'meta_description'       => $request->meta_description,
                    'meta_title'   => $request->meta_title,
                ];
                //dd($update_data);
                DB::table('bdtdc_page_seo')->where('id', $id)->update($update_data);
                if($request->save==1){
                    return Redirect::to('admin/manage-seo')->with('flash_message', 'SEO Updated Successfully');
                }else{
                    return redirect()->back()->with('flash_message', 'SEO Updated Successfully');
                }
                // return Redirect::to('admin/manage-seo');
            }

        
        
        // $insert_data = [
        //     'page_id' => $request->page_id,
        //     'page_route'       => $request->page_route,
        //     'title' => $request->title,
        //     'meta_keyword'         => $request->meta_keyword,
        //     'meta_description'       => $request->meta_description,
        //     'meta_title'   => $request->meta_title,
        // ];
        // $seo_update = DB::table('bdtdc_page_seo')->where('id', $id)->update($insert_data);
        

    }
    public function delete_seo($id)
    {
        // $seo=BdtdcPageSeo::whereid($id)->firstOrfail();
        // $seo->delete();
        //return $seo;
        
        $seo=BdtdcPageSeo::where('id',$id)->delete(); 
       
        return Redirect::to('admin/manage-seo')->with('flash_message', 'SEO Deleted Successfully');
       
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
        $modules = Module::where('parent_id', 0)->get();
        $module = Module::where('id', $id)->first();

       // dd($module);
        return view('protected.admin.modules.module-edit', compact('module', 'modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $insert_data = [
            'parent_id' => $request->parent_id,
            'name'       => $request->module_name,
            'short_name' => $request->short_name,
            'icon1'         => $request->icon_1,
            'icon2'       => $request->icon_2,
            'css_class'   => $request->css_class,
            'slug'       => $request->slug,
            'sort'    => $request->sort,
            'status'  => $request->status,
        ];
        $module_update = DB::table('modules')->where('id', $id)->update($insert_data);
        return Redirect::route('admin.module-manage')->with('global','Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        
        DB::table('modules')->where('id', $id)->delete();
        return redirect::route('admin.module-manage')->with('global', 'Deleted');
    }
    
    public function keyword_create(){
        return View::make('protected.admin.content_descriptions.form-keyword-add');
    }
    
    public function keyword_store(Request $request)
    {
        $input = $request->only(['keyword_name', 'form_id_name',]); 
        //dd($input);
       $insert_data = [
            'keyword' => $input['keyword_name'],
            'form_id_name'       => $input['form_id_name'],            
        ];
        
        $module_update = DB::table('bdtdc_form_keywords')->insert($insert_data);
        // return redirect(URL::to('admin/add-keyword',null));
        
        return Redirect::back()->with('flash_message','Created !!');
    }
    public function keyword_value_create()
    {
        $pages=DB::table('bdtdc_form_keywords')->get();
        return View::make('protected.admin.content_descriptions.keyword-value-add',compact(['pages']));
    }
    
    public function keyword_value_store(Request $request)
    {
        $input = $request->only(['keyword_id', 'keyword_value']); 
       // dd($input);
       $insert_data = [
            'keyword_id' => $input['keyword_id'],
            'value'       => $input['keyword_value'],
            
        ];
        $module_update = DB::table('bdtdc_form_values')->insert($insert_data);
        return Redirect::back()->with('flash_message','Created !!');
        
        
    }
}
