<?php

namespace App\Http\Controllers\Admin;

use App\Bdtdc_tradeshow;
use App\Country;
use App\Model\BdtdcAroundWorld;
use App\Http\Requests\AroundWorldRequest;

use Validator;
use App\Http\Requests\TradeForm;
use App\Http\Requests\ValidationController;
use App\Language;
use App\Tradeshow_description;
use Hamcrest\Type\IsInteger;
use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Scalar\MagicConst\File;
use App\Model\BdtdcTradeshow;
use App\Model\TradeshowDescription;
use App\Model\BdtdcPageSeo;

class TradeshowController extends Controller
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
        return "index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

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

        $country = Country::where('status',1)->get(['name','id']);
        return view('protected.admin.trade.add_trade',$data,compact(['country']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ValidationController $request)
    {
        $file_name = "no_image.jpg";
        if($request->file('image')){

            $pp=Input::hasfile('image');

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

            // dd($file_name);
        }
        $insert_data_parent = [
            'category_id'   => ($request->categories) ? implode(',',$request->categories) : null,
            'country_id'    => $request->country_id,
            'location'      => $request->location,
            'duration'      => $request->start_time .','.$request->end_time,
            'venue'         => $request->vanue,
            'date'          => $request->date,
            'images'        => $file_name,
        ];
        //return $insert_data_parent;
        $id = DB::table('bdtdc_tradeshows')->insertGetId($insert_data_parent);
        $insert_data_chield = [
            'tradeshow_id'      => $id,
            'title'             => $request->title,
            'description'       => $request->description,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_keyword'      => $request->meta_keyword,
        ];

        //return $insert_data_chield;

        if(Tradeshow_description::create($insert_data_chield)){
            $insert_msg = "Trade Added";
        }
        else{
            $insert_msg = "Could not add";
        }

        return redirect::back()->with(compact('data'))->with('global', $insert_msg);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $pre_trade_data = Bdtdc_tradeshow::with(['tradeshow_description','country'])->get();
        
        $country = Country::get(['name','id']);

        return view('protected.admin.trade.trade_list',compact(['pre_trade_data','country']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data['modules']=array();
        $modules=DB::table('modules')
            ->where('parent_id','0')
            ->get();
        foreach ($modules as $module) 
        {

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
        $pre_trade_data = BdtdcTradeshow::with(['description','trade_country'])->where('id',$id)
            ->first();
        $country = Country::get(['name','id']);
        return view('protected.admin.trade.edit_trade',$data,compact(['country','pre_trade_data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //return $id;
        
        $input_arr = $request->all();
        $file_name = Bdtdc_tradeshow::find($id)->first(['images'])->images;

        // $pp=Input::hasfile('image');
        //     dd($pp);
        if($request->file('image')){

            $string     = str_random(10);
            $temp_file  = $_FILES['image']['tmp_name'];
            $ext        = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $file_name  = $string.'.'.$ext;
            if(move_uploaded_file($temp_file,'uploads/'.$file_name)){
                $data['img_msg'] = "Image uploaded";
            }
            else{
                $data['img_msg'] = "Image couldn't be uploaded";
            }

            
            // $temp_file 	= $_FILES['image']['tmp_name'];
            // $ext 		= pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            // $file_name 	= $file_name;
            // //return $file_name;
            // move_uploaded_file($temp_file,'uploads/'.$file_name);
        }

        // dd($file_name);

        $insert_data_parent = [
            'category_id'   => ($request->categories) ? implode(',',$request->categories) : null,
            'country_id'    => $request->country_id,
            'location'      => $request->location,
            'duration'      => $request->start_time .','.$request->end_time,
            'venue'         => $request->venue,
            'date'          => $request->date,
            'images'        => $file_name,
        ];
//        print_r($request->categories);
//        print_r($insert_data_parent);
//        exit;
        Bdtdc_tradeshow::find($id)->update($insert_data_parent);
        $insert_data_chield = [
            'title'             => $request->title,
            'description'       => $request->description,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'meta_keyword'      => $request->meta_keyword,
        ];
        Tradeshow_description::where('tradeshow_id',$id)->update($insert_data_chield);


        return Redirect::route('admin.tradeshow-show')->with('global','Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        Bdtdc_tradeshow::find($id)->delete();
        Tradeshow_description::where('tradeshow_id',$id)->delete();
        return Redirect::back();
    }

    public function search(Request $request)
    {
        $result = DB::table('bdtdc_tradeshows as bt')
                ->join('bdtdc_tradeshow_descriptions as btd','btd.tradeshow_id','=','bt.id')
                ->join('bdtdc_country as c','c.id','=','bt.country_id');
                ($request->title) ? $result->where('btd.title',$request->title) : null;
                ($request->venue) ? $result->where('bt.venue',$request->venue) : null;
                ($request->country_id) ? $result->where('bt.country_id',$request->country_id) : "";
                
        $result = $result->get(['btd.title','bt.id','bt.venue','c.name as country','btd.created_at']);
        return $result;

    }

     public function around_world_create()
    {
        return view('protected.admin.around_world.add_around');
    }

    public function around_world_store(AroundWorldRequest $request)
    {
        $file_name = "no_image.jpg";
        if($request->file('image')){
            $string     = str_random(10);
            $temp_file  = $_FILES['image']['tmp_name'];
            $ext        = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $file_name  = $string.'.'.$ext;
            if(move_uploaded_file($temp_file,'uploads/'.$file_name)){
                $data['img_msg'] = "Image uploaded";
            }
            else{
                $data['img_msg'] = "Image couldn't be uploaded";
            }
        }
        $insert_data = [
            'title'       => $request->title,
            'description' => $request->description,
            'url'         => $request->url,
            'image'       => $file_name,
        ];

        //dd($insert_data);

        if(DB::table('bdtdc_arround_wolds')->insert($insert_data)){
            $insert_msg = "Around world information Added";
        }
        else{
            $insert_msg = "Could not add";
        }

        return redirect::back()->with(compact('data'))->with('global', $insert_msg);
    }

    public function around_world_show()
    {
        $around_world = DB::table('bdtdc_arround_wolds')->get();
        //dd($around_world);
        return view('protected.admin.around_world.around_list',compact(['around_world']));
    }

        public function around_world_edit($id)
        {
            $around_world = DB::table('bdtdc_arround_wolds')
                    ->where('id', $id)
                    ->first();
            //dd($around_world);
            return view('protected.admin.around_world.edit_around',compact(['around_world']));
        }

    public function around_world_update(AroundWorldRequest $request, $id)
    {
        //return $id;

        $input_arr = $request->all();
        $file_name = BdtdcAroundWorld::find($id)->first(['image'])->image;
        if($request->file('image')){
            $temp_file  = $_FILES['image']['tmp_name'];
            $ext        = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $file_name  = $file_name;
            //return $file_name;
            move_uploaded_file($temp_file,'uploads/'.$file_name);
        }
        $insert_data = [
            'title'   => $request->title,
            'description'    => $request->description,
            'url'      => $request->url,
            'image'        => $file_name,
        ];

        DB::table('bdtdc_arround_wolds')->where('id', $id)->update($insert_data);

        return Redirect::route('admin.aroundworld-show')->with('global','Updated !!');
    }

    public function around_world_delete($id)
    {
        DB::table('bdtdc_arround_wolds')->where('id', $id)->delete();
        return redirect::route('admin.aroundworld-show')->with('global', 'Deleted');
    }
    
    public function showall()
    {
           $header=BdtdcPageSeo::where('page_id',108)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
        //$page_content_title =' ';
        $trade_show = DB::table('bdtdc_tradeshows as bt')
                    ->join('bdtdc_tradeshow_descriptions as btd','btd.tradeshow_id','=','bt.id')
                    //->join('bdtdc_tradeshow_descriptions as btd','btd.tradeshow_id','=','bt.id',left);
                    //->leftJoin('bdtdc_tradeshow_descriptions as btd', 'btd.tradeshow_id', '=', 'bt.id')
                    ->get();
                    // dd($trade_show);
                $i = 0;
                $trade_show_array = [];
                foreach($trade_show as $result){
                    $category_id_groups = explode(",", $result->category_id);
                    $category_string = '';
                    foreach($category_id_groups as $category_id_group){
                    if($category_id_group != ''){
                        $cattable = DB::table('bdtdc_category')
                                ->where('id',$category_id_group)
                                ->get();
                        if($cattable[0]->name != ''){
                            $category_string .= $cattable[0]->name. ',';
                        }
                        
                        // echo "<pre>";
                        // print_r($cattable[0]->name);
                        // echo "</pre>";
                        //array_push($category_result[$i],$cattable[0]);
                    }
                    }
                    // break;
                    
                    
                    $category_string = substr($category_string, 0, -1);
                    // echo $category_string;
                    $trade_show[$i]->category_id = $category_string;

                    array_push($trade_show_array, $trade_show[$i]);
                    $i++;
                    //$results = DB::table('bdtdc_tradeshows as bt')
                    //echo $result->category_id;
                }

               /* echo "<pre>";
                    print_r ($trade_show_array);
                    echo "</pre>";*/
        // $cattable = DB::table('bdtdc_category')
                    
        //             ->get();
        // echo "<pre>";
        // print_r($category_result);
        // echo "</pre>";
     /*   $trade_show =       DB::table('bdtdc_tradeshows as bt')
                            ->join('bdtdc_tradeshow_descriptions as btd','btd.tradeshow_id','=','bt.id')
                            ->join('bdtdc_country as c','c.id','=','bt.country_id')
                            ->orderBy('bt.id','DESC')
                            
                            ->get(['bt.id as trade_id','bt.*','btd.*','c.name as country']);
                            ->with('description')
                            //return $trade_show;*/
                            //$tradeshows=BdtdcTradeshow::with('description')->get();
                            //return $tradeshows->category;
                            //dd($trade_show_array);

        return View::make('pages.tradeshow',$data,['tradeshows'=>$trade_show_array]);
                            
    }
     public function trade_show_info($id)
      {     
            
            $trade_show = DB::table('bdtdc_tradeshows as bt')
            ->join('bdtdc_tradeshow_descriptions as btd','btd.tradeshow_id','=','bt.id')
                    ->where('bt.id',$id)
                    ->get();
                    //dd($trade_show);
            $trade_show_menu = DB::table('bdtdc_tradeshows as bts')
            ->join('bdtdc_tradeshow_descriptions as btds','btds.tradeshow_id','=','bts.id')
                    ->get();
          // $header=BdtdcPageSeo::where('page_id',101)->first();
            $data['title']="";
            $data['description']="";
            if(isset($trade_show[0]->title)){
           $data['title']='Visit '.$trade_show[0]->title.' | Bdtdc.com';
           $data['description']='Visit '.$trade_show[0]->title.' to meet hundreds of matching Suppliers, Manufacturers & Distributors. Get linked with the sourcing expo only at BDTDC';
            }
            return View::make('fontend.footerpage.tradeshow-info-details',$data,compact('trade_show','trade_show_menu'));
      }
     public function trade_validate(Request $request)
      {     
         $rules = ['country_id' => 'required',
            'location' => 'required',
            'date'=>'required',
            'vanue' => 'required'];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails())
        {
            return redirect::back()
                        ->withErrors($validator);
        } else {
            return true;
        }
      }
}
