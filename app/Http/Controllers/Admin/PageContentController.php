<?php

namespace App\Http\Controllers\Admin;

use App\Model\BdtdcPageTabs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Http\Requests;
use App\Model\BdtdcPage;
use App\Http\Controllers\Controller;
use DB;

class PageContentController extends Controller
{
    public function __construct()
    {
        ini_set('memory_limit', '9999999M');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = BdtdcPage::orderBy('created_at', 'desc')->get();
        return view('protected.admin.pages.page-manage')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('protected.admin.pages.page-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required',
            'prefix' => 'required',
            'sort_name'=>'required',
            'slug' => 'required'];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails())
        {
            return redirect::back()
                        ->withErrors($validator);
        }
        $insert_data = [
            'name' => $request->name,
            'sort_name' => $request->sort_name,
            'prefix' => $request->prefix,
            'slug' => $request->slug,
        ];
        //dd($insert_data);
       $data = DB::table('bdtdc_pages')->insertGetId($insert_data);
//        $data = DB::table('bdtdc_pages')->insert($insert_data);
    if($request->save==1){
        return redirect()->route('page_content.index')->with(compact('data'))->with('flash_message', 'Page Information added');
    }else{
        return redirect()->route('page_content.create')->with(compact('data'))->with('flash_message', 'Page Information added');
    }
        //return redirect::back()->with(compact('data'))->with('flash_message', 'Page Information added');
       // redirect::back()->with('flash_message', 'Page Information added');
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
        $page_tabs = BdtdcPageTabs::where('page_id', $id)->get();
        //dd($page_tabs);
        $page = BdtdcPage::find($id);
       // dd($page_tabs);
        return view('protected.admin.pages.page-edit')->with('page', $page)->with('page_tabs', $page_tabs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules = ['name' => 'required',
            'prefix' => 'required',
            'sort_name'=>'required',
            'slug' => 'required'];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails())
        {
            return redirect::back()
                        ->withErrors($validator);
        }
        $pages = BdtdcPage::all();
        $page = BdtdcPage::find($id);
        //return $page->id;
        $update_data = [
            'name' => $request->name,
            'sort_name' => $request->sort_name,
            'prefix' => $request->prefix,
            'slug' => $request->slug,
        ];
        //dd($update_data);
        DB::table('bdtdc_pages')->where('id', $id)->update($update_data);
        // $tab_value = $request->get('tabs');
        // //dd($tab_value);
        // for($i=0,$len=count([$tab_value]);$i<$len;$i++) {
        //     //dd($tab_value);
        //     if ($request->get('tab_value')[$i] == 0) {
        //         //dd($request->get('tabs'));
        //         $tab_insert_arr[$i]['page_id'] = $page->id;
        //         $tab_insert_arr[$i]['tab_name'] = $request->get('tabs')[$i];
        //         //dd($tab_insert_arr[$i]);
        //         DB::table('bdtdc_page_tabs')->insert($tab_insert_arr[$i]);
        //     } else {
        //         $tab_arr[$i]['tab_name'] = $request->get('tabs')[$i];
        //         BdtdcPageTabs::find($request->get('tab_value')[$i])->update($tab_arr[$i]);
        //         //DB::table('bdtdc_page_tabs')->where('tab_name', $request->get('tabs')[$i])->update($tab_arr[$i]);
        //     }
        // }
        if($request->save==1){
            return redirect()->route('page_content.index')->with('flash_message', 'Page Information Updated');
        }else{
            return redirect()->back()->with('flash_message', 'Page Information Updated');
        }

        // return redirect()->route('page_content.index')->with('flash_message','Updated !!');
        //return view('protected.admin.pages.page-manage')->with('pages', $pages)->with('flash_message','Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $pages =BdtdcPage::find($id)->delete();
        return redirect()->route('page_content.index')->with('flash_message', 'Page Information deleted');
        return view('protected.admin.pages.page-manage')->with('pages', $pages)->with('flash_message','Deleted !!');;
        //return view('protected.admin.page.page_manage')->with('pages', $pages)
    }
}
