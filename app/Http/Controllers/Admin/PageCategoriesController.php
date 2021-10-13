<?php

namespace App\Http\Controllers\Admin;

use App\Model\BdtdcPage;
use Illuminate\Http\Request;
use App\Model\BdtdcPageContentCategory;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DB;
class PageCategoriesController extends Controller
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
        $categories = BdtdcPageContentCategory::orderBy('created_at', 'desc')->get();
        
        return view('protected.admin.page_content_categories.page_content_categories_lists')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = BdtdcPageContentCategory::where('parent_id', 0)->get();
        $pages = BdtdcPage::all();

        return view('protected.admin.page_content_categories.content-add', compact('categories', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required',
            'page_id' => 'required',
            'sort_name'=>'required',
            'parent_id' => 'required'];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails())
        {
            return redirect::back()
                        ->withInput(Input::all())
                        ->with($request->all())
                        ->withErrors($validator);
        }
        $insert_data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'sort_name' => $request->sort_name,
            'page_id' => ($request->parent_id != 0)? $request->page_id : '0',
        ];

        DB::table('bdtdc_page_content_categories')->insert($insert_data);
        if($request->save==1){
            return redirect()->route('admin.content-manage')->with('flash_message', 'Content Categories Added Successfully');
        }else{
            return redirect()->route('admin.content-add')->with('flash_message', 'Content Categories Added Successfully');
        }

        // return redirect::back()->with('flash_message', 'Content added successfully');
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
        $categories = BdtdcPageContentCategory::where('parent_id', 0)->get();
        $category = BdtdcPageContentCategory::where('id', $id)->get();
        $pages = BdtdcPage::all();
        //return $category->bdtdc_page->name;
        return view('protected.admin.page_content_categories.content-edit')->with('category', $category)
                        ->with('categories', $categories)->with('pages', $pages);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $categories = BdtdcPageContentCategory::all();
        $category = BdtdcPageContentCategory::find($id);
         $rules = ['name' => 'required',
            'page_id' => 'required',
            'sort_name'=>'required',
            'parent_id' => 'required'];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails())
        {
            return redirect::back()
                        ->withInput(Input::all())
                        ->with($request->all())
                        ->withErrors($validator);
        }
        $datetime = date('Y/m/d H:i:s');
        $update_data = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'sort_name' => $request->sort_name,
            'page_id' => ($request->parent_id != 0)? $request->page_id : '0',
            'created_at' => $datetime,
        ];
        DB::table('bdtdc_page_content_categories')->where('id', $id)->update($update_data);
        //return Redirect::route('page_content.create')->with('flash_message','Updated !!');
        if($request->save==1){
            return redirect()->route('admin.content-manage')->with('flash_message', 'Content Categories Updated Successfully');
        }else{
            return redirect()->back()->with('flash_message', 'Content Categories Updated Successfully');
        }
        // return Redirect::route('admin.content-manage')->with('global','Updated !!');

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
    public function delete($id)
    {
        //
        
        BdtdcPageContentCategory::find($id)->delete();
        
        return Redirect::back()->with('flash_message', 'Content Categories Deleted Successfully');;
    }
}
