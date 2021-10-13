<?php

namespace App\Http\Controllers\Front\SupplierChannel;

use App\Model\BdtdcPage;
use App\Model\BdtdcPageTabs;
use Illuminate\Http\Request;
use App\Model\BdtdcCountry;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\Model\BdtdcCategory;
use App\Model\BdtdcSupplierPackage;
use DB;
use Input;
use View;
use Sentinel;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcSupplier;
use App\Model\BdtdcPageSeo;
use App\Model\BdtdcSupplierInfo;

class SupplierChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       
        return View::make('fontend.supplier.dashboard',['supplier'=>$supplier]);
    }

    public function gethome()
    {
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
        return View::make('pages.SupplierChannel.home',$data);
    }

    public function test_sort($id)
    {
        $data['page_content_categorys']=array();
        $page_content_categorys=DB::table('bdtdc_page_content_categories')
            ->where('page_id', $id)
            ->get();
        //dd($page_content_categorys);
        foreach ($page_content_categorys as $page_content_category) {

            $content_children_data = array();


            $content_childrens = DB::table('bdtdc_page_content_categories')
                ->where('parent_id',$page_content_category->id)
                ->get();
            //dd($category_name);
            foreach ($content_childrens as $content_children) {
                # code...
                $content_children_data[] = array(
                    'child_id'  => $content_children->id,
                    'child_name'=>  $content_children->name

                );

            }
            $data['page_content_categorys'][] = array(
                //'name'=>$category->category_name,
                'content_id'     => $page_content_category->id,
                'name'=>$page_content_category->name,
                'content_childrens' => $content_children_data

            );
            //dd($content_children_data);

        }
        //dd($page_content_categorys);
        //$page_tabs = BdtdcPage::where('id', $id)->get();
        //$pages = BdtdcPageTabs::all();
        $tab_menus = BdtdcPageTabs::where('page_id', $id)->get();
//        return $tab_menus;

        //return $tab_menus->bdtdc_page_tabs['tab_name'];
        //return $tab_menus;
        //return $tab_menus;
        //return $tab_menus[0]->bdtdc_page_tabs[0]->tab_name;
        $page_content_title="Supplier Channel";
       // return array($data, $page_content_title);
        //return array($data, $page_content_title);
        return View::make('contents_view.home',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus]);
    }
    
     public function list_exhibit_sell($id)
 {
      $data['page_content_categorys']=array();
        $page_content_categorys=DB::table('bdtdc_page_content_categories')
            ->where('parent_id','0')->where('page_id', $id)
            ->get();
        //dd($page_content_categorys);
        foreach ($page_content_categorys as $page_content_category) {

            $content_children_data = array();


            $content_childrens = DB::table('bdtdc_page_content_categories')
                ->where('parent_id',$page_content_category->id)
                ->get();
            //dd($category_name);
            foreach ($content_childrens as $content_children) {
                # code...
                $content_children_data[] = array(
                    'child_id'  => $content_children->id,
                    'child_name'=>  $content_children->name

                );

            }
            $data['page_content_categorys'][] = array(
                //'name'=>$category->category_name,
                'content_id'     => $page_content_category->id,
                'name'=>$page_content_category->name,
                'content_childrens' => $content_children_data

            );
            //dd($content_children_data);

        }
        //dd($page_content_categorys);
        $tab_menus = BdtdcPageTabs::where('page_id', $id)->get();
        $header=BdtdcPageSeo::where('page_id',184)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        $page_content_title="Buyer Channel";
        return View::make('contents_view.list-exhib-sell',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus]);
     
 }
 
  public function marketing_website($id)
 {
        $data['page_content_categorys']=array();
        $page_content_categorys=DB::table('bdtdc_page_content_categories')
            ->where('parent_id','0')->where('page_id', $id)
            ->get();
        //dd($page_content_categorys);
        foreach ($page_content_categorys as $page_content_category) {

            $content_children_data = array();


            $content_childrens = DB::table('bdtdc_page_content_categories')
                ->where('parent_id',$page_content_category->id)
                ->get();
            //dd($category_name);
            foreach ($content_childrens as $content_children) {
                # code...
                $content_children_data[] = array(
                    'child_id'  => $content_children->id,
                    'child_name'=>  $content_children->name

                );

            }
            $data['page_content_categorys'][] = array(
                //'name'=>$category->category_name,
                'content_id'     => $page_content_category->id,
                'name'=>$page_content_category->name,
                'content_childrens' => $content_children_data

            );
            //dd($content_children_data);

        }
        //dd($page_content_categorys);

        $tab_menus = BdtdcPageTabs::where('page_id', $id)->get();
         $header=BdtdcPageSeo::where('page_id',167)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
      
        $page_content_title="Buyer Channel";
        return View::make('contents_view.marketing-site',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus]);
     
 }
 
  public function supplier_catalog($id)
 {
      $data['page_content_categorys']=array();
        $page_content_categorys=DB::table('bdtdc_page_content_categories')
            ->where('parent_id','0')->where('page_id', $id)
            ->get();
        //dd($page_content_categorys);
        foreach ($page_content_categorys as $page_content_category) {

            $content_children_data = array();


            $content_childrens = DB::table('bdtdc_page_content_categories')
                ->where('parent_id',$page_content_category->id)
                ->get();
            //dd($category_name);
            foreach ($content_childrens as $content_children) {
                # code...
                $content_children_data[] = array(
                    'child_id'  => $content_children->id,
                    'child_name'=>  $content_children->name

                );

            }
            $data['page_content_categorys'][] = array(
                //'name'=>$category->category_name,
                'content_id'     => $page_content_category->id,
                'name'=>$page_content_category->name,
                'content_childrens' => $content_children_data

            );
            //dd($content_children_data);

        }
        //dd($page_content_categorys);
        $tab_menus = BdtdcPageTabs::where('page_id', $id)->get();
        $page_content_title="Buyer Channel";
        return View::make('contents_view.home',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus]);
     
 }
 
  public function inquiry_management($id)
 {
      $data['page_content_categorys']=array();
        $page_content_categorys=DB::table('bdtdc_page_content_categories')
            ->where('parent_id','0')->where('page_id', $id)
            ->get();
        //dd($page_content_categorys);
        foreach ($page_content_categorys as $page_content_category) {

            $content_children_data = array();


            $content_childrens = DB::table('bdtdc_page_content_categories')
                ->where('parent_id',$page_content_category->id)
                ->get();
            //dd($category_name);
            foreach ($content_childrens as $content_children) {
                # code...
                $content_children_data[] = array(
                    'child_id'  => $content_children->id,
                    'child_name'=>  $content_children->name

                );

            }
            $data['page_content_categorys'][] = array(
                //'name'=>$category->category_name,
                'content_id'     => $page_content_category->id,
                'name'=>$page_content_category->name,
                'content_childrens' => $content_children_data

            );
            //dd($content_children_data);

        }
        //dd($page_content_categorys);
        $tab_menus = BdtdcPageTabs::where('page_id', $id)->get();
        $page_content_title="Buyer Channel";
        return View::make('contents_view.home',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus]);
     
 }
 
  public function search_sourcing_request($id)
 {
      $data['page_content_categorys']=array();
        $page_content_categorys=DB::table('bdtdc_page_content_categories')
            ->where('parent_id','0')->where('page_id', $id)
            ->get();
        //dd($page_content_categorys);
        foreach ($page_content_categorys as $page_content_category) {

            $content_children_data = array();


            $content_childrens = DB::table('bdtdc_page_content_categories')
                ->where('parent_id',$page_content_category->id)
                ->get();
            //dd($category_name);
            foreach ($content_childrens as $content_children) {
                # code...
                $content_children_data[] = array(
                    'child_id'  => $content_children->id,
                    'child_name'=>  $content_children->name

                );

            }
            $data['page_content_categorys'][] = array(
                //'name'=>$category->category_name,
                'content_id'     => $page_content_category->id,
                'name'=>$page_content_category->name,
                'content_childrens' => $content_children_data

            );
            //dd($content_children_data);

        }
        //dd($page_content_categorys);
        $tab_menus = BdtdcPageTabs::where('page_id', $id)->get();
        $page_content_title="Buyer Channel";
        return View::make('contents_view.home',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus]);
     
 }
 
  public function manage_products($id)
 {
      $data['page_content_categorys']=array();
        $page_content_categorys=DB::table('bdtdc_page_content_categories')
            ->where('parent_id','0')->where('page_id', $id)
            ->get();
        //dd($page_content_categorys);
        foreach ($page_content_categorys as $page_content_category) {

            $content_children_data = array();


            $content_childrens = DB::table('bdtdc_page_content_categories')
                ->where('parent_id',$page_content_category->id)
                ->get();
            //dd($category_name);
            foreach ($content_childrens as $content_children) {
                # code...
                $content_children_data[] = array(
                    'child_id'  => $content_children->id,
                    'child_name'=>  $content_children->name

                );

            }
            $data['page_content_categorys'][] = array(
                //'name'=>$category->category_name,
                'content_id'     => $page_content_category->id,
                'name'=>$page_content_category->name,
                'content_childrens' => $content_children_data

            );
            //dd($content_children_data);

        }
        //dd($page_content_categorys);
        $tab_menus = BdtdcPageTabs::where('page_id', $id)->get();
        $page_content_title="Buyer Channel";
        return View::make('contents_view.home',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus]);
     
 }
 
  public function manage_messages($id)
 {
      $data['page_content_categorys']=array();
        $page_content_categorys=DB::table('bdtdc_page_content_categories')
            ->where('parent_id','0')->where('page_id', $id)
            ->get();
        //dd($page_content_categorys);
        foreach ($page_content_categorys as $page_content_category) {

            $content_children_data = array();


            $content_childrens = DB::table('bdtdc_page_content_categories')
                ->where('parent_id',$page_content_category->id)
                ->get();
            //dd($category_name);
            foreach ($content_childrens as $content_children) {
                # code...
                $content_children_data[] = array(
                    'child_id'  => $content_children->id,
                    'child_name'=>  $content_children->name

                );

            }
            $data['page_content_categorys'][] = array(
                //'name'=>$category->category_name,
                'content_id'     => $page_content_category->id,
                'name'=>$page_content_category->name,
                'content_childrens' => $content_children_data

            );
            //dd($content_children_data);

        }
        //dd($page_content_categorys);
        $tab_menus = BdtdcPageTabs::where('page_id', $id)->get();
        $page_content_title="Buyer Channel";
        return View::make('contents_view.home',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus]);
     
 }
 
  public function suppliers_memebership($id)
 {
      if(!Sentinel::getUser()){
            $active_user = 0;
        }else{
            $active_user = 1;
        }
        // $data['page_content_categorys']=array();
        // $page_content_categorys=DB::table('bdtdc_page_content_categories')
        //     ->where('parent_id','0')->where('page_id', $id)
        //     ->get();
        // //dd($page_content_categorys);
        // foreach ($page_content_categorys as $page_content_category) {

        //     $content_children_data = array();


        //     $content_childrens = DB::table('bdtdc_page_content_categories')
        //         ->where('parent_id',$page_content_category->id)
        //         ->get();       
            
        //     foreach ($content_childrens as $content_children) {
        //         # code...
        //         $content_children_data[] = array(
        //             'child_id'  => $content_children->id,
        //             'child_name'=>  $content_children->name
        //         );
        //     }
        //     $data['page_content_categorys'][] = array(
        //         //'name'=>$category->category_name,
        //         'content_id'     => $page_content_category->id,
        //         'name'=>$page_content_category->name,
        //         'content_childrens' => $content_children_data

        //     );
        //     //dd($content_children_data);

        // }    
        $supplier_memberships=BdtdcSupplierPackage::with('descriptions')->get();
        //dd($supplier_membership);
       
        // $tab_menus = BdtdcPageTabs::where('page_id', $id)->get();
        $page_content_title="Buyer Channel";
        $header=BdtdcPageSeo::where('page_id',8)->first();
      $data['title']=@$header->title;
            $data['keyword']=@$header->meta_keyword;
            $data['description']=@$header->meta_description;
        return View::make('contents_view.membership',$data,['page_content_title'=>$page_content_title, 'supplier_memberships'=>$supplier_memberships,'active_user'=>$active_user]);
     
 }
 
  public function gold_supplier($id)
 {
      $data['page_content_categorys']=array();
        $page_content_categorys=DB::table('bdtdc_page_content_categories')
            ->where('parent_id','0')->where('page_id', $id)
            ->get();
        //dd($page_content_categorys);
        foreach ($page_content_categorys as $page_content_category) {

            $content_children_data = array();


            $content_childrens = DB::table('bdtdc_page_content_categories')
                ->where('parent_id',$page_content_category->id)
                ->get();
            //dd($category_name);
            foreach ($content_childrens as $content_children) {
                # code...
                $content_children_data[] = array(
                    'child_id'  => $content_children->id,
                    'child_name'=>  $content_children->name

                );

            }
            $data['page_content_categorys'][] = array(
                //'name'=>$category->category_name,
                'content_id'     => $page_content_category->id,
                'name'=>$page_content_category->name,
                'content_childrens' => $content_children_data

            );
            //dd($content_children_data);

        }
        //dd($page_content_categorys);
        $tab_menus = BdtdcPageTabs::where('page_id', $id)->get();
        $page_content_title="Buyer Channel";
        return View::make('contents_view.home',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus]);
     
 }
 
  public function verified_supplier($id)
 {
          $header=BdtdcPageSeo::where('page_id',179)->first();
           $data['title']=$header->title;
           $data['keyword']=$header->meta_keyword;
           $data['description']=$header->meta_description;
            $page_content_title='';
        return View::make('contents_view.verified', $data,['page_content_title'=>$page_content_title]);
   
     
 }
 public function supplier_msg()
 {
    
        return View::make('fontend.supplier.supplier-success-msg');
   
     
 }
 
  public function learning_center($id)
 {
            $header=BdtdcPageSeo::where('page_id',179)->first();
           $data['title']=$header->title;
           $data['keyword']=$header->meta_keyword;
           $data['description']=$header->meta_description;
            $page_content_title='';
            return View::make('fontend.footerpage.learning',$data,['page_content_title'=>$page_content_title]);
     
 }
 
  public function training_center($id)
 {
          $header=BdtdcPageSeo::where('page_id',178)->first();
           $data['title']=$header->title;
           $data['keyword']=$header->meta_keyword;
           $data['description']=$header->meta_description;
      $page_content_title='';
      $countries=DB::table('bdtdc_country')->get();
      return View::make('fontend.footerpage.training',$data,['page_content_title'=>$page_content_title,'countries'=>$countries]);
     
 }
 public function product_invoice($id)
    {
        $data['supplier_info']=BdtdcSupplierInfo::with('company','name_string','invoice')->where('id',$id)->first();
        return view::make('fontend.supplier.product-invoice',$data);
    }
    public function contact_buyer()
    {
        return view::make('fontend.supplier.contact-buyer');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $content = BdtdcPageContentDescription::with('bdtdc_category')
            ->where('content_category_id', $id)
            ->get();
        return $content;
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
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
    
    public function seller_channel()
    {
             $header=BdtdcPageSeo::where('page_id',117)->first();
               $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;
        return View::make('fontend.footerpage.seller_channel',$data);
    }
    public function bdtdc_goldsupplier()
    {
        return View::make('fontend.supplier.bdtdc-gold-supplier');
    }
}
