<?php

namespace App\Http\Controllers\Front;
use App\Model\BdtdcProductDescription;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidationController;
use App\Model\BdtdcBusinesType;
use App\Model\BdtdcCountry;
use App\Model\BdtdcCustomerGroup;
use Illuminate\Http\Request;
use DB;
use App\Model\BdtdcProduct;
use view;
use Sentinel;
use Redirect;
use App\Model\BdtdcProductPrice;
use App\Model\BdtdcLimitedTimeOffer;
use App\Model\BdtdcPageSeo;
use App\Model\BdtdcTradeQuestions;
use App\Model\BdtdcSupplierProductGroups;
use App\Model\BdtdcCompany;
use Jenssegers\Agent\Agent;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcMostViewCategory;
use App\Model\BdtdcCategory;
use App\Bdtdc_tradeshow;
use App\Tradeshow_description;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public $restful=true;

    public function get_response()
    {
        return view::make('get_response.get_response');
    }

    public function bdtdc_survey(){
      return view::make('fontend.buyer.bdtdc_survey');
    }
    
    public function getHome()
    {

        $data['categorys']=array();
        $data['slider']=true;
       


        $countries = BdtdcCountry::lists('name','id');

        $businessTypes = DB::select('select * from bdtdc_busines_types');
        foreach($businessTypes as $type){
            $business[$type->id]=$type->name;
        }
        $customer_group = BdtdcCustomerGroup::get(['id','name']);
        
        $homepage="home";
        $most_view=BdtdcMostViewCategory::with('bdtdcMostViewCategory','proimage','proimage_new','most_product','cat_name'
            ,'parent_cat')
                  ->take(70)
                  ->get();
        // dd($most_view);
        $parent_category = BdtdcCategory::with('parent_cat','parent_cat_pro')
                          ->where('parent_id',0)
                          ->orderByRaw("RAND()")
                          ->take(4)                          
                          ->get();
        // return $parent_category;

        // print_r($parent_category);

        $agent = new Agent();
        
        $device = $agent->device();
         // return view('mobile-view.bdtdc-home',compact(['countries','business','homepage','most_view','parent_category']),$data);

        if($agent->isPhone())
        {
      

           return view('mobile-view.bdtdc-home',compact(['countries','business','homepage','most_view','parent_category']),$data);
        }
        if($agent->isDestop())
        {
      
           return view('fontend.index',compact(['countries','business','homepage']),$data);
        }

        if($agent->isTab())
        {
      
           return view('fontend.index',compact(['countries','business','homepage']),$data);
        }
        else{
          
           return view('fontend.index',compact(['countries','business','homepage']),$data);
        }

    }
    public function bdtdc_home()
    {
        $category_products=BdtdcProductToCategory::with(['pro_parent_cat','selected_suppliers','parent_product'=>function ($q){
        $q->orderBy('product_id','DESC')->get();
        }])
        ->groupBy('parent_id')->get();
         //dd($category_products);

        return view('mobile-view.bdtdc-home',['category_products'=>$category_products]);

    }

    public function trade_answers($id)
    {
        $trade = BdtdcTradeQuestions::with('trade_answer','user')->where('id',$id)->first();
        //dd($trade);
        //$trade1 = BdtdcTradeAnswer::orderBy('id', 'DESC')->get();
        return View::make('fontend.trade.trade_answers',compact(['trade']));
    }

    public function trade_answers_insert(Request $request)
    {

      $input=$request->only('brif','descriptions','image','parent_category','sub_category1','sub_category2','sub_category3','sub_category4','sub_category5');
      //dd($input);


      $image = $request->file('image');
        if($image){
            $image_name = 'uploads'.uniqid().'_'.$file->getClientOriginalName();
            $image->move('quotetion',$image_name);
        }else{
            $image_name = '';
        }

        $insert_data=array();
        $insert_data = array
        (
            'brif'=>$input['brif'],
            'descriptions'=> $input['descriptions'],
            'image'=> $input['image'],
            'parent_category'=>$input['parent_category'], 
            'sub_category'=>$input['sub_category'.$input['parent_category']], 
        );
        //dd($insert_data);
        $t= DB::table('bdtdc_trade_questions')->insert($insert_data);
        //dd($t);
        $p= DB::table('bdtdc_trade_questions')->get();
        //dd($p);
      // $q_id = DB::table('bdtdc_trade_questions')->insertGetId($insert_data);
      // $input=$request->only('answer','q_id');
      // dd($input);

        
       
            // $insert_answer = array();
            // $insert_answer = array
            //     ( 
            //         'answer'=> $input['answer'],
            //         'question_id'=>$input['q_id'],
            //     ); 
            // //dd($insert_answer);
            // $trade_answer= DB::table('bdtdc_trade_answer')->insert($insert_answer);
            // //dd($trade_answer);
        $trade = BdtdcTradeQuestions::with('user')->first();
        $trade1 = DB::table('bdtdc_trade_answer')->get();
        //dd($trade1);
        $q=DB::table('bdtdc_trade_questions')->get();
        //dd($q);

        return view('fontend.trade.trade_answers',compact(['trade','trade1','t']));
    }

    public function trade_answers_store(Request $request)
    {
        $input=$request->only('answer','question_id');
        //dd($input);

        // $image = $request->file('image');
        //         if($image){
        //             $image_name = 'uploads'.uniqid().'_'.$file->getClientOriginalName();
        //             $image->move('quotetion',$image_name);
        //         }else{
        //             $image_name = '';
        //         }

        // $insert_data=array();
        // $insert_data = array
        // (
        //     'brif'=>$input['brif'],
        //     'descriptions'=> $input['descriptions'],
        //     'image'=> $input['image'],
        //     'parent_category'=>$input['parent_category'], 
        //     'sub_category'=>$input['sub_category'],  
        // );

        //dd($insert_data);
        // $question_id = DB::table('bdtdc_trade_questions')->insertGetId($insert_data);
        //dd($question_id);
         $trade = BdtdcTradeQuestions::all();
         //dd($trade);
       
            $insert_answer = array();
            $insert_answer = array
                ( 
                    'question_id'=>$input['question_id'],
                    'answer'=> $input['answer'],
                ); 
            //dd($insert_answer);
            $trade_answer= DB::table('bdtdc_trade_answer')->insert($insert_answer);
            //dd($trade_answer);
        
        $trade1 = DB::table('bdtdc_trade_answer')->get();
        //dd($trade1);

        return view('fontend.trade.trade_answers_success',compact(['trade','question_id']));
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
     public function about_bdtdc()
    {
      
              $header=BdtdcPageSeo::where('page_id',310)->first();
              if($header){
                 $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description; 
               return view::make('Aboutus.about-bdtdc',$data);
              }
              else{
                return view::make('Aboutus.about-bdtdc');
              }
              
              //return view::make('Aboutus.index');
            
    }
    public function about_bdtdc_demo()
    {
        return view::make('Aboutus.index-demo');
    }
     public function media_news()
    {
        return view::make('contents_view.media-news-bdtdc');
    }
     public function supplier_contest()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('contents_view.supplier-contest',$data);
    }
    public function buyer_contact_supplier()
    {
        $header=BdtdcPageSeo::where('page_id',159)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('contents_view.buyer-contact-supplier',$data);
    }
    public function bigbuyer()
    {
        $header=BdtdcPageSeo::where('page_id',170)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('contents_view.bigbuyer',$data);
    }
     public function bdsource_trustpass()
    {
        $header=BdtdcPageSeo::where('page_id',207)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('contents_view.bdsousource-trustpass',$data);
    }
    public function overseasstock_product()
    {
        return view::make('contents_view.stock-product');
    }
    public function test1(){
        return View::make('pages.success1');
    }
    public function test2(){
        return View::make('pages.success2');
    }
    public function test_shihab(){
      $user = Sentinel::getUser();
        return View::make('pages.test_email2',compact('user'));
    }
    public function businessmatching(){
        $header=BdtdcPageSeo::where('page_id',128)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('contents_view.product-businessmatching',$data);
    }
    public function bdtdcmediaroom(){
        $header=BdtdcPageSeo::where('page_id',140)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('contents_view.media-room',$data);
    }
    public function bangladeshbusiness(){
         $header=BdtdcPageSeo::where('page_id',158)->first();
         $data['title']=$header->title;
         $data['keyword']=$header->meta_keyword;
         $data['description']=$header->meta_description;
        return view::make('contents_view.bangladesh-business',$data);
    }
    public function smecenter(){
        $header=BdtdcPageSeo::where('page_id',135)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;

        $trade_show = DB::table('bdtdc_tradeshows as bt')
                    ->join('bdtdc_tradeshow_descriptions as btd','btd.tradeshow_id','=','bt.id')
                    ->get();

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

                }
            }

            $category_string = substr($category_string, 0, -1);
            $trade_show[$i]->category_id = $category_string;

            array_push($trade_show_array, $trade_show[$i]);
            $i++;
        }


        return view::make('contents_view.bdtdc-sme-center',$data,['tradeshows'=>$trade_show_array]);
    }
    public function support_portal_program(){
             $header=BdtdcPageSeo::where('page_id',134)->first();
              $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;

        return view::make('contents_view.portal-program',$data);
    }
    public function marketing_executive(){
        return view::make('contents_view.marketing-executive');
    }
     public function web_developer(){
        return view::make('contents_view.web-developer');
    }
     public function content_writer(){
        return view::make('contents_view.content-writer');
    }
     public function interns(){
        return view::make('contents_view.interns');
    }
    public function national_marketing(){
        return view::make('contents_view.national-marketing');
    }
     public function entrepreneur_day(){
         $header=BdtdcPageSeo::where('page_id',133)->first();
              $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;
        return view::make('contents_view.entrepreneur-day',$data);
    }
    public function global_leader(){
             $header=BdtdcPageSeo::where('page_id',144)->first();
              $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;
        return view::make('contents_view.GlobalLeader',$data);
    }
    public function sme_expo(){
            $header=BdtdcPageSeo::where('page_id',132)->first();
              $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;

        return view::make('contents_view.world-sme-expo',$data);
    }
    public function business_advisory(){
        $header=BdtdcPageSeo::where('page_id',136)->first();
              $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;
        return view::make('contents_view.business-advisory',$data);
    }
    public function start_programe(){
             $header=BdtdcPageSeo::where('page_id',131)->first();
              $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;

        return view::make('contents_view.start-programe',$data);
    }
    public function database_listing(){
             $header=BdtdcPageSeo::where('page_id',137)->first();
              $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;
        return view::make('contents_view.bdtdc-database-listing',$data);
    }
    public function promoting_bangladesh(){
             $header=BdtdcPageSeo::where('page_id',126)->first();
              $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;

        return view::make('contents_view.promoting-bangladesh',$data);
    }
    public function promoting_bangladesh_product(){
        $header=BdtdcPageSeo::where('page_id',127)->first();
              $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;
        return view::make('contents_view.promoting-bangladesh-product',$data);
    }
    public function marketing_bangladesh(){
              $header=BdtdcPageSeo::where('page_id',129)->first();
              $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;
        return view::make('contents_view.marketing-bangladesh',$data);
    }
    public function global_partnership(){
           $header=BdtdcPageSeo::where('page_id',130)->first();
              $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;

        return view::make('contents_view.global-partnership',$data);
    }
    public function sustainable_manufacturing(){
          $header=BdtdcPageSeo::where('page_id',138)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
             $page_content_title ='';
        return view::make('contents_view.business-case',$data);
    }
     public function how_to_business_bd(){
            $header=BdtdcPageSeo::where('page_id',103)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
             $page_content_title ='';
        return view::make('contents_view.how-to-business-bd',$data);
    }
    public function bangladesh_advantage(){
          $header=BdtdcPageSeo::where('page_id',154)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
             $page_content_title ='';
        return view::make('contents_view.bangladesh-advantage',$data);
    }
    public function success_stories(){
           $header=BdtdcPageSeo::where('page_id',175)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
             $page_content_title ='';
        return view::make('contents_view.success-stories',$data);
    }

    public function Entrepreneurs_globalleader()
    {
        return view::make('contents_view.GlobalLeader');
    }

    public function press_release()
    {
            $header=BdtdcPageSeo::where('page_id',142)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
        return view::make('contents_view.daily-star-release',$data);
    }
    public function bdtdcmedianews()
    {
            $header=BdtdcPageSeo::where('page_id',142)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
           return view::make('contents_view.bdtdc-daily-star',$data);
    }
    public function bdtdc_media_news_channel9()
    {
            $header=BdtdcPageSeo::where('page_id',142)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
           return view::make('contents_view.news_channel9',$data);
    }
    public function bdtdc_tv_news()
    {
            $header=BdtdcPageSeo::where('page_id',142)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
            return view::make('contents_view.tv-news',$data);
    }
     public function poverty_pollution()
    {
            $header=BdtdcPageSeo::where('page_id',200)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
        return view::make('contents_view.Pollution-&-Poverty',$data);
    }
    public function marchant_of_rainbows()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('contents_view.merchant-of-rainbows',$data);
    }
    public function patents_persistance()
    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        return view::make('contents_view.patents-and-persistence',$data);
    }
    public function Bdtdc_Bangladesh_group()
    {
        return view::make('contents_view.bangladesh-bdtdc-group');
    }
    public function company_overview(){
        $header=BdtdcPageSeo::where('page_id',139)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        $page_content_title ='';
        return view::make('contents_view.company-overview',$data);
    }
     public function culture_and_values(){
          $header=BdtdcPageSeo::where('page_id',145)->first();
          $data['title']=$header->title;
          $data['keyword']=$header->meta_keyword;
          $data['description']=$header->meta_description;
          $page_content_title ='';

           return view::make('contents_view.culture-values',$data);
    }
    public function all_business_info(){
            $header=BdtdcPageSeo::where('page_id',143)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
             $page_content_title ='';

        return view::make('contents_view.our-business',$data);
    }
 public function history_and_milestone(){
           $header=BdtdcPageSeo::where('page_id',157)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
             $page_content_title ='';
        return view::make('contents_view.history-and-milestone',$data);
    }
    public function bdtdc_leadership(){
        $header=BdtdcPageSeo::where('page_id',208)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
        return view::make('contents_view.leadership',$data);
    }
public function interigrity_compliments(){
           $header=BdtdcPageSeo::where('page_id',152)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
             $page_content_title ='';
        return view::make('contents_view.interigrity',$data);
    }
    public function investor_relation(){
            $data['title']='bdtdc-Largest Bangladeshi Suppliers, Manufacturers, Exporters &amp Director';
        $data['keyword']="Find the Latest Reliable Apparel, Textiles &amp; Accessories Manufacturers, Suppliers, Exporters, Importers, Buyers, Wholesalers, Products and Trade Leads from Bangladesh";
        $data['description']="Suggestion: Bangladesh Manufacturers, Exporters, Importers, Products, Trade Leads, Suppliers, Manufacturer, Exporter, Importer, suppliers directory, Bangladeshi Suppliers, Marketplace Bangladesh, business e-commerce, business listings, business website, business marketplace, companies business listings, directory of Bangladeshi companies, exporter importer directory, exporters business directory, online business directory, manufacturers directory";
        return view::make('contents_view.investor-relation-home',$data);
    }
public function our_office(){
         $header=BdtdcPageSeo::where('page_id',155)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
             $page_content_title ='';
        return view::make('contents_view.our-office',$data);
    }
public function faq_answer(){
            $header=BdtdcPageSeo::where('page_id',153)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
             $page_content_title ='';
        $category=DB::table('bdtdc_page_content_categories')->get();
        // dd($category);
        $description=DB::table('bdtdc_page_content_descriptions')->get();
        // dd($description);
        return view::make('contents_view.bdtdc-faqs',$data);
    }
    public function email_template(){
        return view::make('emails.email-template');
    }
    public function bdtdc_promotion(){
        return view::make('emails.promotion-template');
    }
    public function branding_email_template(){
       //return view::make('emails.');
      //return view::make('emails.bdtdc-campaign-email');
       //return view::make('emails.pohela-boishakh');
       // return view::make('emails.varified-mail');
      return view::make('emails.promotion');
    }
    public function product_manage_roup()
    {
      if(Sentinel::check())
        {
            $user_id =Sentinel::getUser()->id;
            $product=DB::table('bdtdc_product')->get();
            $company=BdtdcCompany::where('user_id',$user_id)->first(['id']);
            $company_id=$company->id;
            // dd($company_id);
            $supplier=DB::table('bdtdc_supplier_product_groups')->get();
            // dd($supplier);
            $supplier_group=BdtdcSupplierProductGroups::with('BdtdcSupplierProductGroups','company_group')
                            ->where('company_id',$company_id)
                            ->get();
             $group=BdtdcSupplierProductGroups::where('company_id',$company_id)->get();
             // dd($group);
            // dd($supplier_group->company_group->name_string->name);
            // return $supplier_group->BdtdcSupplierProductGroups->product_groups;
            // dd($supplier_group);
            return view::make('contents_view.product-manage-roup',compact('supplier_group','group'));
            }
            else
            {
              return redirect()->route('login')->withFlashMessage('You must first login or register before accessing this page.');
        }
    }

    public function product_manage_roup_insert(Request $request)
    {
      /***insert query***/
      $input = $request->only(['name','image','company_id']);
        //dd($input);
      $image = $request->file('image');
              if($image){
                  $image_name = 'uploads'.uniqid().'_'.$file->getClientOriginalName();
                  $image->move('quotetion',$image_name);
              }else{
                  $image_name = '';
              }
        $insert_data=array();
        $insert_data = array
        (
            'name'=>$input['name'], 
            'image'=>$input['image'],
            'company_id'=>$input['company_id']
        );
        // dd($insert_data);
        $group= DB::table('bdtdc_supplier_product_groups')->insert($insert_data);
        // dd($group);
        /***insert query***/
        return Redirect::back();
       
        // return view::make('contents_view.product-manage-roup',compact('gr'));
    }

    public function bdtdc_registration(){
        return view::make('contents_view.bdtdc_suppiler_registration');
    }
}
