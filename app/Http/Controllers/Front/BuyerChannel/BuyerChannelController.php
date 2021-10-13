<?php

namespace App\Http\Controllers\Front\BuyerChannel;

use App\Model\BdtdcPageContentDescription;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Model\BdtdcCategory;
use App\Model\BdtdcPageTabs;
use DB;
use URL;
use Input;
use View;
use Sentinel;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcSupplier;
use App\Model\BdtdcPageContentCategory;
use App\Model\Role_user;
use App\BdtdcSupplierQuery;
use App\Model\BdtdcCompany;
use App\Model\BdtdcSupplierPackage;
use App\Model\BdtdcProduct;
use App\Model\BdtdcProductImage;
use App\Model\BdtdcSupplierInquery;
use App\Model\bdtdcInqueryDocs;
use App\Model\BdtdcCustomer;
use App\Model\BdtdcTradeQuestions;
use App\Model\BdtdcTradeAnswer;
use App\Model\User;
use App\Model\BdtdcProductDescription;
use App\Model\BdtdcCurrency;
use App\Model\BdtdcPageSeo;
use App\Model\BdtdcJoinQuotation;
use App\Model\BdtdcProductImageNew;
use App\Model\BdtdcCountry;
use App\Model\BdtdcInqueryMessage;
use App\Model\BdtdcProductUnit;
use App\Model\BdtdcQuoteDocs;
use App\Model\BdtdcSupplierProductGroups;
use App\Model\Ticket\Tickets;
use App\Model\Ticket\Ticket_Thread;
use App\Model\Ticket\TicketToken;
use Redirect;
use Jenssegers\Agent\Agent;
use Mail;


class BuyerChannelController extends Controller
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
        $data['page_content_categorys']=array();
        $page_content_categorys=DB::table('bdtdc_page_content_categories')
            ->where('parent_id','0')
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
        $page_content_title="Buyer Channel";
        return View::make('pages.BuyerChannel.home',$data,['page_content_title'=>$page_content_title]);
    }

    public function why_bdtdc($id){
        $header=BdtdcPageSeo::where('page_id',109)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
                $page_content_title="Buyer Channel";
        return View::make('contents_view.why_bdtdc',$data,['page_content_title'=>$page_content_title]);
    }
    
    public function logistic_service($id){
           $header=BdtdcPageSeo::where('page_id',106)->first();
           $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
       
        $page_content_title="Buyer Channel";
        // return View::make('contents_view.logistic_service',$data,['page_content_title'=>$page_content_title]);
        return view::make('contents_view.investor-relation-home',$data);
    }
    
    public function qutation($id=null)

    {
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=@$header->title;
        $data['keyword']=@$header->meta_keyword;
        $data['description']=@$header->meta_description;
        if($id)
        {
            $data['p_id']=$id;

        }
        // dd($id);
        $user_id = 0;
        if(Sentinel::getUser()){
            $user_id = Sentinel::getUser()->id;
        }else{
            session()->flash('quotation_limit_alert', 'you are not logged in, please <a href="ServiceLogin?continue=get-quotations">login</a> first');
        }

        if($user_id != 0){
            $total_inq_today = BdtdcSupplierInquery::where('sender',$user_id)->whereDate('created_at', '=', date('Y-m-d'))->get();
            if($total_inq_today->count() >= 5){
            session()->flash('quotation_limit_alert', 'Maximum Buying Request(s) exceeded for today');
            }
        }

        $units=DB::table('bdtdc_product_unit')->get();
        //dd($units);
        // dd(Tickets::get());
        // dd(Ticket_Thread::get());
        // dd(TicketToken::get());
        $agent = new Agent();
       //return View::make('mobile-view.content-view-mobile.get_quotation_m',$data,compact('units'));
        if($agent->isPhone())
         
        {
          return View::make('mobile-view.content-view-mobile.get_quotation_m',$data,compact('units'));
        }
        else{
         return View::make('fontend.BuyerChannel.get_qutations',$data,compact('units'));
        }  
   
    
    }

    public function get_qutations_search_product(Request $req){
        $requested_product = $req->only('product_name_search');
        $result = BdtdcProductDescription::where('name','LIKE','%'.$requested_product['product_name_search'].'%')
            ->whereHas('supplierrr',function($query){

            })
            ->get();
        /*$result= DB::table('bdtdc_product_description as pd')
                ->join('bdtdc_supplier_products as sp','sp.product_id','=','pd.product_id','left')
                ->where('pd.name','LIKE','%'.$requested_product['product_name_search'].'%')
                ->get([
                    'sp.supplier_id as supplier_id','pd.name as product_name'
                ]);*/
        return count($result);
        // print_r ($result);
    }
    
    public function store_qutation(Request $r)
    {
        ini_set('date.timezone', 'UTC');

        if(!Sentinel::getUser()){
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login before accessing this page.');
        }

        $user_id = Sentinel::getUser()->id;
        $role = Role_user::where('user_id',$user_id)->first();
        $column = ($role->role_id == 3) ? "product_owner_id" : "buyer_id";

        $total_inq_today = BdtdcSupplierInquery::where('sender',$user_id)->whereDate('created_at', '=', date('Y-m-d'))->get();

        if($total_inq_today->count() >= 50){
            session()->flash('quotation_limit_alert', 'Maximum Buying Request(s) exceeded for today');
            return back();
        }

        $details = $r->get('details');
        $string_test = ['website','www','http','https','link','url','e-mail','email','mail','phone','mobile','skype','facebook','imo','whatsapp','twitter','id','payment','LinkedIn','call','contact','viber','fb','pay'];
        $validated = true;
        /*if($validated == true){
            $found_str = '';
            foreach($string_test as $entry) {
                $res = preg_match('/'.$entry.'/',$details);
                if($res){
                    $found_str .= $entry.', ';
                    $validated = false;
                }
            }

            if($validated == true){
                $email_patt = '/\S+@\S+\.\S+/';
                $mail_check_result = preg_match($email_patt,$details,$matches);
                if($mail_check_result){
                    $matched_email = '';
                    foreach ($matches as $value) {
                        $matched_email .= $value.', ';
                    }
                    $returned_error_data = ('You should not share your email address '.$matched_email.'This is prohibited by authority.');
                    return redirect()->back()->withErrors($returned_error_data)->withInput();
                }else{
                    $website_patt = '/\S[^0-9]+\.\S[^0-9]/';
                    $test_text = 'df '.$details;
                    $website_result = preg_match($website_patt,$details,$website_matches);
                    if($website_result){
                        $matched_text = '';
                        foreach ($website_matches as $value) {
                            $matched_text .= $value.' ';
                        }
                        $returned_error_data = 'Your <q>'.$matched_text.'</q> is suspicious. Please use sapce after . (dot) sign.';
                        return redirect()->back()->withErrors($returned_error_data)->withInput();
                    }else{
                        if(preg_match('/@/',$details)){
                            $returned_error_data = ('Your @ is suspicious. Please remove this character. Sharing email, social link or account, url, website and phone number is prohibited by authority.');
                            return redirect()->back()->withErrors($returned_error_data)->withInput();
                        }else{
                            $details_ph = 'test '.$details;
                            $plus_res = preg_match('/\++\d+/',$details_ph,$plus_res_matches_data); //for +99999
                            $plus_res_s = preg_match('/\++\s+\d+/',$details_ph,$plus_res_s_matches_data); //for + 99999
                            $doublez_res = preg_match('/[^0-9.]00+\d+/',$details_ph,$doublez_res_matches_data); //for 0099999
                            $sz_res = preg_match('/[^0-9.]0+\d+/',$details_ph,$sz_res_matches_data); //for 099999
                            $doublez_res_s = preg_match('/[^0-9.]00+\s+\d+/',$details_ph,$doublez_res_s_matches_data); //for 00 99999
                            $sz_res_s = preg_match('/[^0-9.]0+\s+\d+/',$details_ph,$sz_res_s_matches_data); //for 0 99999
                            // $plus_res = $details.preg_match(/\b\+/);
                            // dd($plus_res_s_matches_data);
                            if($plus_res){
                                $matched_text = '';
                                foreach ($plus_res_matches_data as $value) {
                                    $matched_text .= $value.' ';
                                }
                                $returned_error_data = ('Your '.$matched_text.' is suspicious. Sharing phone number, social link or account, url, website and email is prohibited by authority.');
                                return redirect()->back()->withErrors($returned_error_data)->withInput();
                            }else if($plus_res_s){
                                $matched_text = '';
                                foreach ($plus_res_s_matches_data as $value) {
                                    $matched_text .= $value.' ';
                                }
                                $returned_error_data = ('Your '.$matched_text.' is suspicious. Sharing phone number, social link or account, url, website and email is prohibited by authority.');
                                return redirect()->back()->withErrors($returned_error_data)->withInput();
                            }else if($doublez_res){
                                $matched_text = '';
                                foreach ($doublez_res_matches_data as $value) {
                                    $matched_text .= $value.' ';
                                }
                                $returned_error_data = ('Your '.$matched_text.' is suspicious. Sharing phone number, social link or account, url, website and email is prohibited by authority.');
                                return redirect()->back()->withErrors($returned_error_data)->withInput();
                            }else if($doublez_res_s){
                                $matched_text = '';
                                foreach ($doublez_res_s_matches_data as $value) {
                                    $matched_text .= $value.' ';
                                }
                                $returned_error_data = ('Your '.$matched_text.' is suspicious. Sharing phone number, social link or account, url, website and email is prohibited by authority.');
                                return redirect()->back()->withErrors($returned_error_data)->withInput();
                            }else if($sz_res){
                                $matched_text = '';
                                foreach ($sz_res_matches_data as $value) {
                                    $matched_text .= $value.' ';
                                }
                                $returned_error_data = ('Your '.$matched_text.' is suspicious. Sharing phone number, social link or account, url, website and email is prohibited by authority.');
                                return redirect()->back()->withErrors($returned_error_data)->withInput();
                            }else if($sz_res_s){
                                $matched_text = '';
                                foreach ($sz_res_s_matches_data as $value) {
                                    $matched_text .= $value.' ';
                                }
                                $returned_error_data = ('Your '.$matched_text.' is suspicious. Sharing phone number, social link or account, url, website and email is prohibited by authority.');
                                return redirect()->back()->withErrors($returned_error_data)->withInput();
                            }else{
                                $min_six = preg_match('/\d{6,}/',$details,$min_six_data);
                                $min_six_s = preg_match('/\d+\S[^0-9.]+\d+/',$details,$min_six_data_s);
                                $min_two_ad = preg_match('/\.\d{3,}/',$details,$min_two_ad_data);
                                if($min_six){
                                    $matched_text = '';
                                    foreach ($min_six_data as $value) {
                                        $matched_text .= $value.' ';
                                    }
                                    $returned_error_data = ('Your '.$matched_text.' is suspicious. Sharing phone number, social link or account, url, website and email is prohibited by authority.');
                                    return redirect()->back()->withErrors($returned_error_data)->withInput();
                                }else if($min_six_s){
                                    $matched_text = '';
                                    foreach ($min_six_data_s as $value) {
                                        $matched_text .= $value.' ';
                                    }
                                    $returned_error_data = ('Your '.$matched_text.' is suspicious. Sharing phone number, social link or account, url, website and email is prohibited by authority.');
                                    return redirect()->back()->withErrors($returned_error_data)->withInput();
                                }else if($min_two_ad){
                                    $matched_text = '';
                                    foreach ($min_two_ad_data as $value) {
                                        $matched_text .= $value.' ';
                                    }
                                    $returned_error_data = ('Your '.$matched_text.' is suspicious. Sharing phone number, social link or account, url, website and email is prohibited by authority.');
                                    return redirect()->back()->withErrors($returned_error_data)->withInput();
                                }else{
                                    // $returned_error_data = 'success';
                                    // return redirect()->back()->withErrors($returned_error_data)->withInput();
                                }
                                
                            }
                        }
                    }
                }
            }else{
                $returned_error_data = ($found_str. 'has been found on your details. Sharing email, social link or account, url, website and phone number is prohibited by authority.');
                return redirect()->back()->withErrors($returned_error_data)->withInput();
            }
        }*/
        if($r->t){
            $validator = Validator::make($r->all(), [
                'product_name' => 'required|max:1000',
                'quantity' => 'required|integer|max:10000000000',
                'unit' => 'required|integer|max:10000000000|not_in:0',
                'details' => 'required|max:2000',
                'unit_price' => 'required|max:1000000000|numeric',
                'currency' => 'required|max:3|not_in:0',
            ]);
        }else{
            $validator = Validator::make($r->all(), [
                'product_name' => 'required|max:1000',
                'quantity' => 'required|integer|max:10000000000',
                'unit' => 'required|integer|max:10000000000|not_in:0',
                'details' => 'required|max:2000',
                // 'attachment_1' => 'required|mimes:jpeg,bmp,png,jpg|max:50000',
                'attachment_2' => 'mimes:jpeg,bmp,png,jpg|max:50000',
                'attachment_3' => 'mimes:jpeg,bmp,png,jpg|max:50000',
                'fob' => 'max:3',
                'expire_date' => 'date|date_format:Y/m/d|after:tomorrow',
                'unit_price' => 'required|max:1000000000|numeric',
                'currency' => 'required|max:3|not_in:0',
                'port' => 'max:1000',
                'payment_terms' => 'required|max:1000|not_in:0',
                /*'agreement' => 'required|Accepted',
                'rules' => 'required|Accepted',*/
            ]);
        }
            

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }else{

            if($r->t){
                $input_arr = [
                'inquery_title' => $r->get('product_name'),
                'unit_id' => $r->get('unit'),
                'product_owner_id' => 2,
                'quantity' => $r->get('quantity'),
                'message' => $r->get('details'),
                'pre_unit_price' => $r->get('unit_price'),
                'currency' => $r->get('currency'),
                'sender' => $user_id,
                'is_RFQ' => 2,
                'created_at'=>date("Y-m-d H:i:s"),
                ];
            }else{
                $input_arr = [
                'inquery_title' => $r->get('product_name'),
                'unit_id' => $r->get('unit'),
                'quantity' => $r->get('quantity'),
                'product_owner_id' => 2,
                /*'total_price' => $r->get('quantity')*$r->get('unit_price'),*/
                'message' => $r->get('details'),
                'payment_type' => $r->get('fob'),
                'expire_date' => $r->get('expire_date'),
                'pre_unit_price' => $r->get('unit_price'),
                'currency' => $r->get('currency'),
                'destination_port' => $r->get('port'),
                'payment_terms' => $r->get('payment_terms'),
                'sender' => $user_id,
                'is_RFQ' => 1,
                'created_at'=>date("Y-m-d H:i:s"),
                ];
            }
                

            $inserted_inq_id = BdtdcSupplierInquery::insertGetId($input_arr);
            // $inserted_inq_id = BdtdcSupplierInquery::where('id',109)->get();
            $attachments = $r->file('attachments');
            // $attachment_1 = $r->file('attachment_1');
            // $attachment_2 = $r->file('attachment_2');
            // $attachment_3 = $r->file('attachment_3');
            $arrData = array();
            if(isset($attachments)){
                foreach ($attachments as $key => $value) {
                    $attachment_name = 'buying_request_docs_'.uniqid().'_'.uniqid().'.'.$attachments[$key]->getClientOriginalExtension();
                    $attachments[$key]->move('buying-request-docs',$attachment_name);

                    $arrData[] = array(
                        'inquery_id' => $inserted_inq_id,
                        'docs' => $attachment_name,
                        'created_at'=>date("Y-m-d H:i:s"),
                    );
                }
                bdtdcInqueryDocs::insert($arrData);
            }

            // if($attachment_1){
            //     $attachment_1_name = 'buying_request_docs_'.uniqid().'_'.uniqid().'.'.$attachment_1->getClientOriginalExtension();
            //     $attachment_1->move('buying-request-docs',$attachment_1_name);
            //     $input_arr = [
            //         'inquery_id' => $inserted_inq_id,
            //         'docs' => $attachment_1_name,
            //         'created_at'=>date("Y-m-d H:i:s"),
            //     ];
            //     bdtdcInqueryDocs::insert($input_arr);
            // }
            // if($attachment_2){
            //     $attachment_2_name = 'buying_request_docs_'.uniqid().'_'.uniqid().'.'.$attachment_2->getClientOriginalExtension();
            //     $attachment_2->move('buying-request-docs',$attachment_2_name);
            //     $input_arr = [
            //         'inquery_id' => $inserted_inq_id,
            //         'docs' => $attachment_2_name,
            //         'created_at'=>date("Y-m-d H:i:s"),
            //     ];
            //     bdtdcInqueryDocs::insert($input_arr);
            // }
            // if($attachment_3){
            //     $attachment_3_name = 'buying_request_docs_'.uniqid().'_'.uniqid().'.'.$attachment_3->getClientOriginalExtension();
            //     $attachment_3->move('buying-request-docs',$attachment_3_name);
            //     $input_arr = [
            //         'inquery_id' => $inserted_inq_id,
            //         'docs' => $attachment_3_name,
            //         'created_at'=>date("Y-m-d H:i:s"),
            //     ];
            //     bdtdcInqueryDocs::insert($input_arr);
            // }

            $rand_key = str_random(30);
            $user= User::where('id',$user_id)->first();

            $ww=Mail::send('pages.test-email', ['inserted_inq_id'=>$inserted_inq_id,'user'=>$user], function($message) {
                // $message->to(Route::current()->parameters()['email'])
                $message->to('info@bdtdc.com')
                    ->subject('Inquiry Alert');

            });
            // echo "<pre>";
            // print_r(BdtdcSupplierInquery::where('id',$inserted_inq_id)->get());
            // print_r(bdtdcInqueryDocs::get());
            // echo "</pre>";
            return Redirect::to('success');
        }

        /*$input=$r->only('product_name','quantity','unit','details');
        $string=$input['product_name'];
        $result= DB::table('bdtdc_product_description as pd')
                ->join('bdtdc_product as p','p.id','=','pd.product_id')
                ->join('bdtdc_supplier_products as sp','sp.product_id','=','p.id')
                ->join('users as u','u.id','=','sp.supplier_id')
                ->join('bdtdc_product_to_category as cat','cat.product_id','=','p.id')
                ->join('bdtdc_category as cat_name','cat_name.id','=','cat.category_id')
                ->join('bdtdc_companies as company','company.user_id','=','u.id')
                ->join('bdtdc_company_descriptions as company_description','company_description.company_id','=','company.id')
                ->join('bdtdc_country as country','country.id','=','company.location_of_reg','left')
                ->join('bdtdc_product_unit as unit','unit.id','=','p.unit_type_id')
                ->where('pd.name','LIKE','%'.$string.'%')
                ->groupBy('sp.supplier_id')
                ->get([
                    'p.id as product_id','pd.name as product_name','p.image','sp.supplier_id as supplier_id','cat_name.name as category_name','u.first_name as f_name',
                    'company_description.name as company_name','company.id as company_id','company.year_of_reg as establish_date',
                    'country.name as country_name','unit.name as unit_name'
                ]);

        // dd($result);
                
         //return $result;
                
         $input_arr=array();
         foreach($result as $data)
         {
             //print_r($data->f_name);
             
             
        
        $user_id = Sentinel::getUser()->id;
        $role = Role_user::where('user_id',$user_id)->first();
        $column = ($role->role_id == 3) ? "product_owner_id" : "buyer_id";
        
        $input_arr[] = [
            'product_id' => $data->product_id,
            'product_owner_id' => $data->supplier_id,
            $column => $user_id,
            'unit_id' => $r->get('unit'),
            'quantity' => $r->get('quantity'),
            'message' => $r->get('details'),
            'sender' => $user_id,
        ];
       
         }
         dd($input_arr);
          if(BdtdcSupplierQuery::insert($input_arr)){
            return View::make('fontend.Quotation.success');
        }
        else{
            return 0;
        }*/
         
         
         
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
    public function sustainable_manufacturing($id)
    {
              $header=BdtdcPageSeo::where('page_id',125)->first();
               $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;
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
        return View::make('contents_view.sustainable_manufacturing',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus]);
        
    }
 public function honesty_reliability_trustability ($id)
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
 
 public function search_produtcs ($id)
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
 public function get_quotations($id)
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
 
  public function find_bangladesh_suppliers($id)
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
 
  public function find_products_by_country($id)
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
 
public function meet_suppliers($id)
{
    $header=BdtdcPageSeo::where('page_id',107)->first();
    $data['title']=$header->title;
    $data['keyword']=$header->meta_keyword;
    $data['description']=$header->meta_description;
    
    //dd($users);
    $page_content_title="";

    $agent = new Agent();
        
    $device = $agent->device();
     //return View::make('mobile-view.bdtdc_service.meet_suppliers',$data,['page_content_title'=>$page_content_title,'users'=>$users]);
    if($agent->isPhone())
    {
        $users = DB::table('users as u')
        ->join('bdtdc_companies as c','c.user_id','=','u.id')
        ->paginate(15);
        return View::make('mobile-view.bdtdc_service.meet_suppliers',$data,['page_content_title'=>$page_content_title,'users'=>$users]);
    }
    if($agent->isDestop())
    {
       return View::make('fontend.BuyerChannel.supplier',$data,['page_content_title'=>$page_content_title]);
    }
    if($agent->isTab())
    {
        $users = DB::table('users as u')
        ->join('bdtdc_companies as c','c.user_id','=','u.id')
        ->paginate(15);
        return View::make('mobile-view.bdtdc_service.meet_suppliers',$data,['page_content_title'=>$page_content_title,'users'=>$users]);
    }
    else{          
        return View::make('fontend.BuyerChannel.supplier',$data,['page_content_title'=>$page_content_title]);
    }

    
     
}

 public function one_stop_service()
   {
              $header=BdtdcPageSeo::where('page_id',116)->first();
               $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;
        return view('fontend.BuyerChannel.one-stop-service',$data);
   }
    public function sourceing_event()
    {
        $header=BdtdcPageSeo::where('page_id',141)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;

        return view('fontend.BuyerChannel.bdtdc-sourceing-event',$data);
    }
    public function bdtdc_sourceing()
    {
        $header=BdtdcPageSeo::where('page_id',104)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        $page_content_title ='';
        
        return view('fontend.BuyerChannel.bdtdc-source',$data);
    }
public function sourceing_season()
   {
            $header=BdtdcPageSeo::where('page_id',165)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
             $page_content_title ='';
        return view('fontend.BuyerChannel.bdtdc-sourceing-season',$data);
   }
public function default_message()
   {
         $data['title']='bdtdc-Largest Bangladeshi Suppliers, Manufacturers, Exporters &amp Director';
        $data['keyword']="Find the Latest Reliable Apparel, Textiles &amp; Accessories Manufacturers, Suppliers, Exporters, Importers, Buyers, Wholesalers, Products and Trade Leads from Bangladesh";
        $data['description']="Suggestion: Bangladesh Manufacturers, Exporters, Importers, Products, Trade Leads, Suppliers, Manufacturer, Exporter, Importer, suppliers directory, Bangladeshi Suppliers, Marketplace Bangladesh, business e-commerce, business listings, business website, business marketplace, companies business listings, directory of Bangladeshi companies, exporter importer directory, exporters business directory, online business directory, manufacturers directory";
        $singlePquery = BdtdcSupplierInquery::query();
        $singlePquery->with(['inq_products_description'])->select('id','product_id','product_owner_id','sender','message','is_join_quotation','flag','spam','trush','views','updated_at');
        $joinPquery = BdtdcJoinQuotation::query();
        $joinPquery->select('id','product_id','product_owner_id','sender','message','is_join_quotation','flag','spam','trush','views','updated_at');
        // $data['inquery'] = $singlePquery->unionall($joinPquery)->orderBy('updated_at', 'desc')->offset(5)->take(5)->get();
        $data['inquery'] = $singlePquery->unionall($joinPquery)->orderBy('updated_at', 'desc')->take(20)->get();
        /*foreach ($inquery as $value) {
            if($value->inq_products_description){
                echo $value->inq_products_description->name."<br>";
            }else{
                echo $value->product_id."<br>";
            }
        }
        $inquery = $singlePquery->get();
        dd($inquery);*/
        // dd($data['inquery']);
        return view('fontend.BuyerChannel.default-message',$data);
       
   }
   
 
 
  public function industry_analysis($id)
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
           $header=BdtdcPageSeo::where('page_id',183)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
        $page_content_title="Buyer Channel";
        return View::make('contents_view.industry',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus]);
     
 }
 
  public function wholesale_products($id)
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
 
  public function accredited_suppliers($id)
 {
    $header=BdtdcPageSeo::where('page_id',163)->first();
    $data['title']=$header->title;
    $data['keyword']=$header->meta_keyword;
    $data['description']=$header->meta_description;
    $page_content_title='';

    $agent = new Agent();
        
    $device = $agent->device();
     
    if($agent->isPhone())
    {
        return View::make('mobile-view.bdtdc_service.accredited_suppliers',$data);
    }
    if($agent->isDestop())
    {
        return View::make('contents_view.verified',$data);
    }
    if($agent->isTab())
    {
        return View::make('contents_view.verified',$data);
    }
    else{          
        return View::make('contents_view.verified',$data);
    }
     
 }
  public function buying_post_request()
 {
     $page_content_title='';
     return View::make('fontend.BuyerChannel.buying-post-request');
     
 }
 public function trade_alert($id)
 {
    $page_content_title='';
    $product=DB::table('bdtdc_product')->get();
    //dd($product);
    $pc=DB::table('bdtdc_product_to_category')->get();
    //dd($pc);
    $image=DB::table('bdtdc_product_image')->get();
    //dd($image);
    $i=DB::table('bdtdc_product_images')->get();
    //dd($i);
    // $p=BdtdcProductToCategory::with('pro_images')->first();
    // dd($p);

    // $products=BdtdcProductToCategory::with(['pro_images','pro_images_new'])->paginate(12);
  
    
    $header=BdtdcPageSeo::where('page_id',3)->first();

        $categoryid = 0;
        $countryid = 0;
        $buyer_protection = false;
        $gold_supplier = false;
        $assessed_supplier = false;
        if(preg_match('/^\d+$/',$id)) {
          $categoryid = $id;
        } else {
          $search_array = explode('+..+', $id);
          $categoryid = explode('==',$search_array[0])[1];
          $countryid = explode('==',$search_array[1])[1];
          $buyer_protection = explode('==',$search_array[2])[1];
          $gold_supplier = explode('==',$search_array[3])[1];
          $assessed_supplier = explode('==',$search_array[4])[1];
        }


        // $products=BdtdcProductToCategory::with(['pro_to_cat_name','bdtdcProduct','bdtdcCategory','pro_images','pro_images_new'])->where('category_id',$categoryid)->paginate();
        $products=BdtdcProductToCategory::with(['supplier_info','pro_to_cat_name','bdtdcProduct','bdtdcCategory','pro_images','pro_images_new'])
            ->WhereHas('supp_pro_company', function($offerQuery) use ($countryid){
                if($countryid != 0){
                    $offerQuery->where('location_of_reg', '=', $countryid);
                    $offerQuery->WhereHas('Role_user', function($offerQuery) {
                                $offerQuery->where('role_id', '=', 3);
                        });
                }
              })
            ->WhereHas('bdtdc_customer', function($offerQuery) use ($buyer_protection, $assessed_supplier, $gold_supplier){
                if($buyer_protection == 'true'){
                    $offerQuery->where('trade_assurance', 1);
                }
                if($assessed_supplier == 'true'){
                    $offerQuery->where('assessed', 1);
                }
                if($gold_supplier == 'true'){
                    $offerQuery->where('gold_member', 1);
                }
              })
            ->where('category_id',$categoryid)->paginate(12);

        if($header && $products){

            $category_id=BdtdcCategory::where('id',$categoryid)->first();
            


            $data['title']=$category_id->name.$header->title;
            $data['keyword']=$category_id->name.$header->meta_keyword;
            $data['description']=$category_id->name.$header->meta_description;


            $parent_cats=BdtdcCategory::with('parent_cat')->where('id',$category_id->parent_id)->first();
            /*$country=BdtdcCountry::with(['country_region','contry_products'=>function($q) use($id){
                          $q->where('category_id',$id);
            }])->where('region_id',1)->get();*/
            $country=BdtdcCountry::with('country_region')->where('region_id',1)->get();

            $bdtdc_country_list=DB::table('bdtdc_country')->where('region_id','!=',1)->get();

            $agent = new Agent();

            $device = $agent->device();

            if($agent->isPhone())
        {
            return View::make('mobile-view.content-view-mobile.trade-alert',$data,['header'=>$header,'category_id'=>$category_id,'parent_cats'=>$parent_cats,'products'=>$products,'bdtdc_country_list'=>$bdtdc_country_list,'country'=>$country,'categoryid'=>$categoryid,'countryid'=>$countryid,'buyer_protection'=>$buyer_protection,'gold_supplier'=>$gold_supplier,'assessed_supplier'=>$assessed_supplier]);
        }
        if($agent->isDestop())
        {
          return View::make('fontend.BuyerChannel.trade-alert',$data,['header'=>$header,'category_id'=>$category_id,'parent_cats'=>$parent_cats,'products'=>$products,'bdtdc_country_list'=>$bdtdc_country_list,'country'=>$country,'categoryid'=>$categoryid,'countryid'=>$countryid,'buyer_protection'=>$buyer_protection,'gold_supplier'=>$gold_supplier,'assessed_supplier'=>$assessed_supplier]);
        }
        if($agent->isTab())
        {
           return View::make('fontend.BuyerChannel.trade-alert',$data,['header'=>$header,'category_id'=>$category_id,'parent_cats'=>$parent_cats,'products'=>$products,'bdtdc_country_list'=>$bdtdc_country_list,'country'=>$country,'categoryid'=>$categoryid,'countryid'=>$countryid,'buyer_protection'=>$buyer_protection,'gold_supplier'=>$gold_supplier,'assessed_supplier'=>$assessed_supplier]);
        }
        else{
          
           return View::make('fontend.BuyerChannel.trade-alert',$data,['header'=>$header,'category_id'=>$category_id,'parent_cats'=>$parent_cats,'products'=>$products,'bdtdc_country_list'=>$bdtdc_country_list,'country'=>$country,'categoryid'=>$categoryid,'countryid'=>$countryid,'buyer_protection'=>$buyer_protection,'gold_supplier'=>$gold_supplier,'assessed_supplier'=>$assessed_supplier]);
        }
   
        // return View::make('fontend.BuyerChannel.quotations_form',$data,compact(['units','products','images','categorys','user_id','return_url','quote_products']));
    
      
      }else{
        return View::make('error.notfoundcategory');
      }
 }
    public function trade_protect()
    {
        $header=BdtdcPageSeo::where('page_id',162)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        $data['units'] = BdtdcProductUnit::all();
        $page_content_title='';

        $agent = new Agent();
        $device = $agent->device();
        // return View::make('mobile-view.content-view-mobile.trade-buyer-protection-m',$data);
         
        if($agent->isPhone())
        {
            return View::make('mobile-view.content-view-mobile.trade-buyer-protection-m',$data);
        }
        if($agent->isDestop())
        {
            return View::make('fontend.BuyerChannel.trade-buyer-protection',$data);
        }
        if($agent->isTab())
        {
            return View::make('mobile-view.content-view-mobile.trade-buyer-protection-m',$data);
        }
        else{
            return View::make('fontend.BuyerChannel.trade-buyer-protection',$data);
        }
    }

 public function get_supplier($email)
 {
    $return_data = [];
    if(!Sentinel::check()){
        $return_data['0']=0;
        $return_data['1']='Please Login First.';
        return $return_data;
    }
    $user=User::where('email',$email)
        ->whereHas('Role_user',function($subQ){
            $subQ->where('role_id',3);
        })
        ->first();
    if($user){
        $company =BdtdcCompany::where('user_id',$user->id)->first();
        if($company){
            $supplier_company_id=$company->id;
            $return_data['0']=1;
            //dd(132);
            return View::make('fontend.BuyerChannel.trade-buyer-protection-backend', compact('user','company'));
        }else{
            $return_data['0']=0;
            $return_data['1']='Supplier not found. Please try another suppliers email.';
            return $return_data;
        }
    }else{
        $return_data['0']=0;
        $return_data['1']='Supplier not found. Please try another suppliers email.';
    }
    return $return_data;

 }
 public function trade_protect_post()
 {
    return 11;
 }
 
  public function trade_assurance($id)
 {

    $header=BdtdcPageSeo::where('page_id',105)->first();
    $data['title']=$header->title;
    $data['keyword']=$header->meta_keyword;
    $data['description']=$header->meta_description;
    $page_content_title ='';
     $agent = new Agent();
     $device = $agent->device();
          //return view::make('mobile-view.content-view-mobile.buyer-protection',$data,['page_content_title'=>$page_content_title]);
         
        if($agent->isPhone())
        {

           return view::make('mobile-view.content-view-mobile.buyer-protection',$data,['page_content_title'=>$page_content_title]);
        }
        if($agent->isDestop())
        {
           return view::make('contents_view.globalmarket-buyer-protection',$data,['page_content_title'=>$page_content_title]);
        }

        if($agent->isTab())
        {
           return view::make('contents_view.globalmarket-buyer-protection',$data,['page_content_title'=>$page_content_title]);
        }
        else{
          
            return view::make('contents_view.globalmarket-buyer-protection',$data,['page_content_title'=>$page_content_title]);
        }
    
       // $page_content_title='';
       //      return View::make('fontend.footerpage.tradeassurance',['page_content_title'=>$page_content_title]);
     
 }
 
  public function secure_payment($id)
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
 public function business_identity($id)
 {
            $header=BdtdcPageSeo::where('page_id',102)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
            $page_content_title ='';
            // dd($parent_category_id);
            $data['parent_cat_name']=BdtdcPageContentCategory::where('parent_id',1)->take(4)->get();
            return View::make('fontend.footerpage.business_identity',$data,['page_content_title'=>$page_content_title]);
 }
  public function inspection_service($id)
 {
             $header=BdtdcPageSeo::where('page_id',111)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
            $page_content_title ='';
           $data['parent_cat_name']=BdtdcPageContentCategory::where('parent_id',14)->take(4)->get();
           // return 12;
             $agent = new Agent();
           $device = $agent->device();
             if($agent->isPhone())
        {

            return View::make('mobile-view.content-view-mobile.inspec-service-m',$data,['page_content_title'=>$page_content_title]);
        }
        if($agent->isDestop())
        {
              return View::make('fontend.footerpage.inspec',$data,['page_content_title'=>$page_content_title]);
        }

        if($agent->isTab())
        {
            return View::make('fontend.footerpage.inspec',$data,['page_content_title'=>$page_content_title]);
        }
        else{
          
         return View::make('fontend.footerpage.inspec',$data,['page_content_title'=>$page_content_title]);
        }
           
 }
 
  public function trade_intelligence($id)
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
              $header=BdtdcPageSeo::where('page_id',148)->first();
              $data['title']=$header->title;
               $data['keyword']=$header->meta_keyword;
              $data['description']=$header->meta_description;
        return View::make('contents_view.trade',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus]);
     
 }
 
  public function discussion_forums($id)
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
 
  public function trade_answers($id)
 {
    $data['page_content_categorys']=array();
        $page_content_categorys=DB::table('bdtdc_page_content_categories')
            ->where('parent_id','0')->where('page_id', $id)
            ->get();
        foreach ($page_content_categorys as $page_content_category) {

            $content_children_data = array();


            $content_childrens = DB::table('bdtdc_page_content_categories')
                ->where('parent_id',$page_content_category->id)
                ->get();
            foreach ($content_childrens as $content_children) {
                # code...
                $content_children_data[] = array(
                    'child_id'  => $content_children->id,
                    'child_name'=>  $content_children->name

                );

            }
            $data['page_content_categorys'][] = array(
                'content_id'     => $page_content_category->id,
                'name'=>$page_content_category->name,
                'content_childrens' => $content_children_data

            );
        }
        //dd($page_content_categorys);
        $tab_menus = BdtdcPageTabs::where('page_id', $id)->get();
        $page_content_title="Buyer Channel";
        if(Sentinel::check()){
        $user_id = Sentinel::getUser()->id;
        $user=User::where('id',$user_id)->get();
        $trade = BdtdcTradeQuestions::with(['user','trade_answer'])->orderBy('id','DESC')->paginate(15);
        // dd($trade);
        $q=DB::table('bdtdc_trade_questions')->get();
            $header=BdtdcPageSeo::where('page_id',149)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
            return View::make('contents_view.trade_answer',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus, 'trade'=>$trade, 'user'=>$user]);
        }
        else{
            $trade = BdtdcTradeQuestions::with(['user','trade_answer'])->orderBy('id','DESC')->paginate(15);
            $q=DB::table('bdtdc_trade_questions')->get();
            $header=BdtdcPageSeo::where('page_id',149)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
            return View::make('contents_view.trade_answer',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus, 'trade'=>$trade]);
        }
     
    }

    public function trade_answer_search(Request $request){
         $tab_menus = BdtdcPageTabs::where('page_id', 22)->get();
        $page_content_title="Buyer Channel";
        if(Sentinel::check()){
        $user_id = Sentinel::getUser()->id;
        $user=User::where('id',$user_id)->get();
        $answer_search=$request->input('answer_search');
            if($answer_search){
                $trade = BdtdcTradeQuestions::with(['user','trade_answer'])
                    ->where('brif', 'like','%'.$answer_search.'%')
                    ->orderBy('id','DESC')->paginate(15);
            //dd($trade);
            $q=DB::table('bdtdc_trade_questions')->get();
                $header=BdtdcPageSeo::where('page_id',149)->first();
                  $data['title']=$header->title;
                   $data['keyword']=$header->meta_keyword;
                  $data['description']=$header->meta_description;
            return View::make('contents_view.trade_answer',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus, 'trade'=>$trade, 'user'=>$user]);

            }else{

                $trade = BdtdcTradeQuestions::with(['user','trade_answer'])->orderBy('id','DESC')->paginate(15);
                $q=DB::table('bdtdc_trade_questions')->get();
                $header=BdtdcPageSeo::where('page_id',149)->first();
                $data['title']= "empty";
                $data['keyword']= "empty";
                $data['description']= "Result not found, Please try with a different word!";
                return View::make('contents_view.trade_answer',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus, 'trade'=>$trade]);
            }
        }
        else{
            $trade = BdtdcTradeQuestions::with(['user','trade_answer'])->orderBy('id','DESC')->paginate(15);
            $q=DB::table('bdtdc_trade_questions')->get();
            $header=BdtdcPageSeo::where('page_id',149)->first();
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
            return View::make('contents_view.trade_answer',$data,['page_content_title'=>$page_content_title, 'tab_menus'=>$tab_menus, 'trade'=>$trade]);
        }


        
    }

    public function trade_answer($id)
    {
        // dd($id);
        $trade = BdtdcTradeQuestions::with('trade_answer','user')->where('id',$id)->first();
        // dd($trade);
        $trade1 = BdtdcTradeAnswer::where('question_id', $id)->get();
        return View::make('fontend.trade.trade_answers',compact(['trade','trade1']));
    }

    public function trade_answers_insert(Request $request)
    {
       if(Sentinel::check())
        {}else{
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login before accessing this page.');
        }
        $input=$request->only('brif','descriptions','image','parent_category','sub_category1','sub_category2','sub_category3','sub_category4','sub_category5');
      //dd($input);
        $user_id = Sentinel::getUser()->id;

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
            'user_id'=>$user_id,
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
        return Redirect::back();
      //return view('fontend.trade.trade_answers',compact(['trade','trade1','t']));
    }

    public function trade_answers_store(Request $request)
    {
        if(!Sentinel::check())
        {
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login before accessing this page.');
        }
        $input=$request->only('answer','question_id');
         $rules = array(
            'answer'     => 'required',
            'question_id'     => 'required',

        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::back()
                        ->withErrors($validator);
                        
        }
        else
        {
         $trade = BdtdcTradeQuestions::with('trade_answer')->first();
         //dd($trade);
            $user_id = Sentinel::getUser()->id;
            $insert_answer = array();
            $insert_answer = array
                ( 
                    'user_id'=>$user_id,
                    'question_id'=>$input['question_id'],
                    'answer'=> $input['answer'],
                ); 
            // dd($insert_answer);
            $trade_answer= DB::table('bdtdc_trade_answer')->insert($insert_answer);
            // dd($trade_answer);
        
        $trade1 = DB::table('bdtdc_trade_answer')->first();

        //dd($trade);
         //return Redirect::back();
        session()->flash('msg_succ', 'Your answer submit successfully!!!');
        return Redirect::back();
        }
    }


    public function t_submit_answers(Request $r, $category_id)
    {
        $input=$r->get('category_id');
        
        //return trtgtr;
        $trade = BdtdcTradeQuestions::with(['user'])->where('sub_category',$input)->paginate(10);
        //dd($trade);
        return View::make('contents_view.t_answers',compact('trade'));
    }

    public function user_guide()
    {
        return View::make('contents_view.user_guide');
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
    public function aboutbdtdc()
    {
        return Redirect::to('http://buyerseller.asia/about-us');
    }
    public function findproductsupplier()
    {
            return Redirect::to('buyer-list');
    }
    public function contactus(){
        $page_content_title ='';
            return View::make('contents_view.contact',['page_content_title'=>$page_content_title]);
    }
     public function buyer_protection()
    {
            $page_content_title ='';

        $agent = new Agent();

        $device = $agent->device();
        // return View::make('mobile-view.content-view-mobile.globalmarket-buyer-protection-m',['page_content_title'=>$page_content_title]);
         
        if($agent->isPhone())
        {
            return View::make('mobile-view.content-view-mobile.globalmarket-buyer-protection-m',['page_content_title'=>$page_content_title]);
        }
        if($agent->isDestop())
        {
           return view::make('contents_view.globalmarket-buyer-protection',['page_content_title'=>$page_content_title]);
        }
        if($agent->isTab())
        {
            return View::make('mobile-view.content-view-mobile.globalmarket-buyer-protection-m',['page_content_title'=>$page_content_title]);
        }
        else{          
            return view::make('contents_view.globalmarket-buyer-protection',['page_content_title'=>$page_content_title]);
        }
    }
     public function bdtdc_buyer_home()
    {
            $page_content_title ='';
        return view::make('contents_view.bdtdc-buyer-home',['page_content_title'=>$page_content_title]);
       
    }

    public function application_sourceing_meet()
    {
        $header=BdtdcPageSeo::where('page_id',166)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        if(Sentinel::check())
        {
            $user_id = \Sentinel::getUser()->id;
            $company =BdtdcCompany::where('user_id',$user_id)->first();
            $id=$company->id;
            //dd($company);
                               
            $suppliers=BdtdcCompany::with(['country','users','customers'])->where('id', $id)->first();
            //return $suppliers->country;
            
            return view('fontend.BuyerChannel.apply-meeting',$data,compact('suppliers'));
        } 
        else
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
    }

   public function application_sourceing_meet_store(Request $request)
   { 
        if(Sentinel::check())
        {
             $input = $request->only('sourcing_meeting_type','sourcing_type','start_date','name','contact_person','email','address','country','telephone',
            'business_type','product_name','specifications','annual_purchase_volume','price','business_types');
            //dd($input);
     
        $rules = array(
            'sourcing_meeting_type'     => 'required',
            /*'sourcing_type'             => 'required',*/
            'start_date'                => 'after:tomorrow',
            /*'end_date'                  => 'date_format:d/m/Y|after:start_date',*/
            'name'                      => 'required',                       
            'contact_person'            => 'required',    
            'email'                     => 'required|email',
            'address'                   => 'required',
            'name'                   => 'required',
            'telephone'                 => 'required',
            /*'business_type'             => 'required',*/
            'product_name'              => 'required',    
            'specifications'            => 'required',
            'annual_purchase_volume'    => 'required',
            'price'                     => 'required',
            /*'business_types'             => 'required'*/

        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('apply-sourceing-meeting')
                        ->withErrors($validator);
                        
        }
        else
        {
            /*$input = $request->only('sourcing_meeting_type','sourcing_type','start_date','name','contact_person','email','address','country','telephone',
            'business_type','product_name','specifications','annual_purchase_volume','price','business_types');
            //dd($input);*/
            //return $input;
            $email=$input['email'];
            //dd($email);
            /*$sourcing_type=$input['sourcing_type'];
            dd($sourcing_type);*/
            $insert_data=array();
            $insert_data = array
            (
                'sourcing_meeting_type'=>$input['sourcing_meeting_type'],
                'sourcing_type'=> $input['sourcing_type'],
                'start_date'=> $input['start_date'],
                'name'=>$input['name'],
                'contact_person'=> $input['contact_person'],
                'email'=> $input['email'],
                'address'=>$input['address'],
                'country'=> $input['name'],
                'telephone'=> $input['telephone'],
                'business_type'=>$input['business_type'],
                'product_name'=> $input['product_name'],
                'specifications'=> $input['specifications'],
                'annual_purchase_volume'=>$input['annual_purchase_volume'],
                'price'=> $input['price'],
                'business_types'=> $input['business_types'],
                
            );
            //dd($insert_data);
            return view::make('fontend.supplier.supplier-success-msg'); 
        }  

        }else{
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login before accessing this page.');
        }

             
      
   }
   

  /* public function quotations_form()
   {
        return view::make('fontend.BuyerChannel.quotations_form');
   }*/


   public function quote_from($id)
    {

        $return_url='supplier,quote,'.$id;
       // dd($return_url);
        if(Sentinel::check()){
        $user_id = Sentinel::getUser()->id;
        // dd(BdtdcInqueryMessage::first());
        $company=BdtdcCompany::where('user_id',$user_id)->first();
        if($company){
            $company_id=$company->id;
        }else{
            $company_id=0;
        }
        $quote_products = BdtdcProductToCategory::with('pro_to_cat_name')->where('company_id',$company_id)->get();
      $products=BdtdcSupplierInquery::with('inq_products_image','inq_products_images','inq_products_description','inq_products_category')->where('id',$id)->first();

      $categorys=DB::table('bdtdc_supllier_inqueries as inq');


        $units=DB::table('bdtdc_product_unit')->get();
        //dd($units);


        $categorys=DB::table('bdtdc_supllier_inqueries as inq')
                                ->join('bdtdc_product_to_category as pc','pc.product_id','=','inq.product_id')
                                ->join('bdtdc_category as c','c.id','=','pc.category_id')
                                // ->where('inq.id',$id)
                                ->groupBy('c.id')
                                ->get(['inq.id as inquery_id','c.name as cat_name','c.id as cat_id']);
                                
        $data = [];
        // $header=BdtdcPageSeo::where('page_id',101)->get();        
        // if(count($header)) {
        //     $data['title']=$header->first()->title;
        //     $data['keyword']=$header->first()->meta_keyword;
        //     $data['description']=$header->first()->meta_description;
        // }    
        if(BdtdcPageSeo::where('page_id',101)->count() > 0) {
            $header=BdtdcPageSeo::where('page_id',101)->first();  
            $data['title']=$header->title;
            $data['keyword']=$header->meta_keyword;
            $data['description']=$header->meta_description;
        }
        $agent = new Agent(); 
        $device = $agent->device();
        //return View::make('mobile-view.content-view-mobile.send_quote',$data,compact(['units','products','images','categorys','user_id','return_url','quote_products']));
         if($agent->isPhone())
        {

           return View::make('mobile-view.content-view-mobile.send_quote',$data,compact(['units','products','images','categorys','user_id','return_url','quote_products']));
            // return View::make('fontend.BuyerChannel.quotations_form',$data,compact(['units','products','images','categorys','user_id','return_url','quote_products']));
        }
        if($agent->isDestop())
        {
          return View::make('fontend.BuyerChannel.quotations_form',$data,compact(['units','products','images','categorys','user_id','return_url','quote_products']));
        }

        if($agent->isTab())
        {
           return View::make('fontend.BuyerChannel.quotations_form',$data,compact(['units','products','images','categorys','user_id','return_url','quote_products']));

        }
        else{
          
           return View::make('fontend.BuyerChannel.quotations_form',$data,compact(['units','products','categorys','user_id','return_url','quote_products']));
        }
   
        // return View::make('fontend.BuyerChannel.quotations_form',$data,compact(['units','products','images','categorys','user_id','return_url','quote_products']));
    }
    else{
        return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
        }
    
    }

    public function quote_form_store(Request $r)

    {
        if(!Sentinel::check()){
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login before accessing this page.');
        }
        $user_id = Sentinel::getUser()->id;
        $rules=array(
            'product_name'=>'max:100000',
            'product_id'=>'required|integer|max:10000000000|not_in:0',
            'inquery_id'=>'required|integer|max:10000000000',
            'quantity'=>'required|integer|max:9999999999999',
            'unit_price'=>'required|numeric|max:9999999999999',
            'unit'=>'required|integer|max:9999999999999|not_in:0',
            'messages'=>'required|max:200000',
            'attachments.*' => 'mimes:jpeg,jpg,png,gif,pdf|max:50000', // max 50000kb
            );


        $validator = Validator::make($r->all(), $rules);
        if ($validator->fails()) {
            return redirect::back()
                    ->withErrors($validator);
                 
        }
        else
        {
            $input = $r->only('product_id','quantity','messages','unit_price','inquery_id','sender','unit','product_owner_id','status','is_quote');

            $insert_data = array
            (
                'product_id'=>$input['product_id'],
                'quantity'=> $input['quantity'],
                'messages'=> $input['messages'],
                'unit_price'=>$input['unit_price'],
                'inquery_id'=>$input['inquery_id'],
                'unit_type_id'=>$input['unit'],
                'sender'=>$user_id,
                'product_owner_id'=>$user_id,
                'is_quote'=>1,
                'quote_id'=>0,
                'is_msg'=>0,
                'status'=>1,
                'updated_at'=>date("Y-m-d H:i:s"),
                'created_at'=>date("Y-m-d H:i:s"),
            );

            $message_id = BdtdcInqueryMessage::insertGetId($insert_data);
            
            if($message_id){
                //Notification
                sendNotification(2, 'You have been received new Notification', Sentinel::getUser()->id, $r->input('sender'), $message_id);
                // End Notification

                $attachments = $r->file('attachments');
                $insert_data_to_docs = array();
                if($attachments){
                    foreach ($attachments as $key => $value) {
                        $file_name = 'quote_'.$message_id.'_'.uniqid().'.'.$attachments[$key]->getClientOriginalExtension();
                        $attachments[$key]->move('quotation',$file_name);
                        $insert_data_to_docs[] = array(
                            'message_id'=>$message_id,
                            'docs'=> $file_name,
                        );
                    }
                }
                $bdtdc_quote_docs = BdtdcQuoteDocs::insert($insert_data_to_docs);                
            }
            $agent = new Agent(); 
            $device = $agent->device();
            // return view::make('mobile-view.content-view-mobile.quotation_form_success',compact(['bdtdc_quote_docs','insert_data_to_docs']));
            if($agent->isPhone())
            {
                return view::make('mobile-view.content-view-mobile.quotation_form_success',compact(['bdtdc_quote_docs','insert_data_to_docs']));
            }
            if($agent->isDestop())
            {
                return view::make('fontend.BuyerChannel.quotations_form_success',compact(['bdtdc_quote_docs','insert_data_to_docs']));
            }
            if($agent->isTab())
            {
                return view::make('fontend.BuyerChannel.quotations_form_success',compact(['bdtdc_quote_docs','insert_data_to_docs']));
            }
            else{
                return view::make('fontend.BuyerChannel.quotations_form_success',compact(['bdtdc_quote_docs','insert_data_to_docs']));
            }
            // return view::make('fontend.BuyerChannel.quotations_form_success',compact(['bdtdc_quote_docs','insert_data_to_docs']));
        }
    }

    public function store_msg(Request $r, $quoteid){
        if(!Sentinel::check()){
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login before accessing this page.');
        }
        $rules=array(
            'product_owner_id'=>'required|integer|max:10000000000|not_in:0',
            'message'=>'required|max:200000',
            'file' => 'mimes:jpeg,jpg,png|max:5000', // max 2000kb
            );


        $validator = Validator::make($r->all(), $rules);
        if ($validator->fails()) {
            return redirect::back()
                    ->withErrors($validator)
                    ->withInput();
                 
        }
        $user_id = Sentinel::getUser()->id;
        $inq_data = BdtdcInqueryMessage::where('id',$quoteid)->first();
        if($inq_data){
            $insert_data = array
            (
                'messages'=> $r->input('message'),
                'inquery_id'=>$inq_data->inquery_id,
                'sender'=>$user_id,
                'product_owner_id'=>$r->input('product_owner_id'),
                'is_quote'=>'1',
                'quote_id'=>$quoteid,
                'is_msg'=>'1',
                'status'=>'1',
                'updated_at'=>date("Y-m-d H:i:s"),
                'created_at'=>date("Y-m-d H:i:s"),
            );
            // dd($insert_data);
            $message_id = DB::table('bdtdc_inquery_messages')->insertGetId($insert_data);
            if($message_id){
                $file = $r->file('file');
                if($file){
                    $file_name = 'quote_'.$message_id.'_'.uniqid().'.'.$file->getClientOriginalExtension();
                    $file->move('quotation',$file_name);
                }else{
                    $file_name = '';
                }
                 // dd($file_name);

                $insert_data_to_docs = array
                    (
                        'message_id'=>$message_id,
                        'docs'=> $file_name,
                    );
                $bdtdc_quote_docs = DB::table('bdtdc_quote_docs')->insert($insert_data_to_docs);
                return redirect::back()->with('success','Message Sent');
            }else{
                return redirect::back()->with('error','Message Sending failed!');
            }
        }else{
            return redirect::back()->with('error','Requested Quotation not found');
        }
        

            
    }

    public function supplier($supplier_id){
        $user = \App\User::where('id',$supplier_id)->first();
        return view('fontend.BuyerChannel.quotations_form_success',compact(['user','supplier_id']));
    }


    public function store_qutations_form(Request $r)
    {
        $input=$r->only('product_name','quantity','unit','details');
        $string=$input['product_name'];
        $result= DB::table('bdtdc_product_description as pd')
                ->join('bdtdc_product as p','p.id','=','pd.product_id')
                ->join('bdtdc_supplier_products as sp','sp.product_id','=','p.id')
                ->join('users as u','u.id','=','sp.supplier_id')
                ->join('bdtdc_product_to_category as cat','cat.product_id','=','p.id')
                ->join('bdtdc_category as cat_name','cat_name.id','=','cat.category_id')
                ->join('bdtdc_companies as company','company.user_id','=','u.id')
                ->join('bdtdc_company_descriptions as company_description','company_description.company_id','=','company.id')
                ->join('bdtdc_country as country','country.id','=','company.location_of_reg','left')
                ->join('bdtdc_product_unit as unit','unit.id','=','p.unit_type_id')
                ->where('pd.name','LIKE','%'.$string.'%')
                ->groupBy('sp.supplier_id')
                ->get([
                    'p.id as product_id','pd.name as product_name','p.image','sp.supplier_id as supplier_id','cat_name.name as category_name','u.first_name as f_name',
                    'company_description.name as company_name','company.id as company_id','company.year_of_reg as establish_date',
                    'country.name as country_name','unit.name as unit_name'
                ]);
                
         //return $result;
                
         $input_arr=array();
         foreach($result as $data)
         {
             //print_r($data->f_name);
             
             if(!Sentinel::getUser()){
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login before accessing this page.');
        }
        
        $user_id = Sentinel::getUser()->id;
        $role = Role_user::where('user_id',$user_id)->first();
        $column = ($role->role_id == 3) ? "product_owner_id" : "buyer_id";
        
        $input_arr[] = [
            'product_id' => $data->product_id,
            'product_owner_id' => $data->supplier_id,
            $column => $user_id,
            'unit_id' => $r->get('unit'),
            'quantity' => $r->get('quantity'),
            'message' => $r->get('details'),
            'sender' => $user_id,
        ];
       
         }
          if(BdtdcSupplierQuery::insert($input_arr)){
            return View::make('fontend.Quotation.success');
        }
        else{
            return 0;
        }
         
         
         
    }
}
