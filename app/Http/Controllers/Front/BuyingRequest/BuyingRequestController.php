<?php

namespace App\Http\Controllers\Front\BuyingRequest;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\BdtdcCategory;
use DB;
use URL;
use Input;
use View;
use App\Model\BdtdcProductToCategory;
use Sentinel;
use Redirect;
use App\Model\User;
use App\Model\Role_user;
use App\Model\BdtdcInqueryMessage;
use App\Model\BdtdcSupplierQuery;
use App\Model\BdtdcProductUnit;
use App\Model\BdtdcCountry;
use App\Model\BdtdcProduct;
use App\Model\BdtdcSupplierInquery;
use App\Model\BdtdcProductDescription;
use App\Model\BdtdcCompanyDescription;
use App\Model\BdtdcSampleRequests;
use App\Model\BdtdcSampleProducts;
use App\Model\bdtdcInqueryDocs;
use App\Model\BdtdcCompany;
use App\Model\BdtdcSupplier;
use App\Model\BdtdcSupplierProductGroups;
use App\Model\BdtdcOrder;
use App\Model\BdtdcOrderDetails;
use App\Model\BdtdcNotification;
use App\Model\OrderShippingTerm;
use Jenssegers\Agent\Agent;

class BuyingRequestController extends Controller
{
    public function index()
    {
        
    }
    public function get_buying_request(Request $request){

        /*
        Status list
        ------------
            0 = all status
            1 = Pending
            2 = Approved
            3 = Rejected
            4 = Completed
            5 = Closed
        */
         // dd($request->status);   
        if(Sentinel::check())
        {
            //Notification Mark as read
            BdtdcNotification::where('notification_type', 2)->where('read_at', NULL)->where('receiver_id', Sentinel::getUser()->id)->update(['read_at' => date('Y-m-d H:i:s')]);
            //End Notification
        $user_id = Sentinel::getUser()->id;
        $role = Role_user::where('user_id',$user_id)->first();
        $current_status = 0;
        $unread = false;
        $search_str = '';
        $search_date = 0;
        if($request->status){
            $current_status = $request->status;
        }
        if($request->unread){
            $unread = $request->unread;
        }
        if($request->search){
            $search_str = $request->search;
        }
        if($request->d){
            $search_date = $request->d;
        }
       
        // $bdtdc_inquery_messages=BdtdcInqueryMessage::with(['bdtdcInqueryMessageProduct','bdtdcInqueryMessageProductImage'])->where('sender',$user_id)->orderBy('id', 'desc')->get();
        //dd($bdtdc_inquery_messages);
        // $product=BdtdcInqueryMessage::all();
        //dd($product);
        $bdtdc_supllier_inqueries_maker = BdtdcSupplierQuery::query();
        $bdtdc_supllier_inqueries_maker->with(['BdtdcSupplierQueryProduct','BdtdcSupplierQueryProductImage','BdtdcSupplierQueryProductUnit','BdtdcInqueryMessage'=>function($subQuery){
            $subQuery->where('quote_id',0);
        }]);
            if($unread == 'true'){
                $bdtdc_supllier_inqueries_maker->WhereHas('BdtdcInqueryMessage', function($offerQuery) use ($unread){
                    if($unread){
                        $offerQuery->where('is_view', 0);
                    }else{
                        $offerQuery->where('is_view', 1);
                    }
                });
            }
            if($current_status){
                $bdtdc_supllier_inqueries_maker->where('status', $current_status);
            }
            if($search_str != ''){
                $bdtdc_supllier_inqueries_maker->where('inquery_title', 'LIKE','%'.$search_str.'%');
            }
            if($search_date != 0){
                $to = date("Y/m/d");
                $from = date('Y/m/d',strtotime($to . "-$search_date days"));
                $bdtdc_supllier_inqueries_maker->whereBetween('created_at', [$from, $to]);
            }
            $bdtdc_supllier_inqueries_maker->where('sender',$user_id)
            ->where('is_RFQ',1)
            ->orderBy('id','desc');
        $bdtdc_supllier_inqueries = $bdtdc_supllier_inqueries_maker->paginate(15);

        // dd($bdtdc_supllier_inqueries);

        $bdtdc_supllier_inqueries_all=BdtdcSupplierQuery::with(['BdtdcSupplierQueryProduct','BdtdcSupplierQueryProductImage','BdtdcSupplierQueryProductUnit','BdtdcInqueryMessage'])->where('sender',$user_id)->where('is_RFQ',1)->orderBy('id','desc')->get();
        // dd($bdtdc_supllier_inqueries_all);

        // $quotations = BdtdcSupplierQuery::with(['BdtdcSupplierQueryProduct','BdtdcSupplierQueryProductImage','BdtdcSupplierQueryProductUnit'])->take(4)->get();
        /*$quotations=DB::table('bdtdc_supllier_inqueries as inq')
            ->join('bdtdc_product as p','p.id','=','inq.product_id')
            ->join('bdtdc_product_description as pd','pd.product_id','=','p.id')
            ->join('bdtdc_product_image as p_image','p_image.product_id','=','p.id')
            ->join('bdtdc_product_prices as p_price','p_price.product_id','=','p.id')
            ->join('bdtdc_product_unit as p_unit','p_unit.id','=','inq.unit_id')
            ->join('bdtdc_country as country','country.id','=','p.location')
            ->join('bdtdc_product_to_category as pc','pc.product_id','=','inq.product_id')
            ->join('bdtdc_category as c','c.id','=','pc.category_id')
            // ->where('c.id',$category_id)
            // ->where('inq.id',$id)
            ->groupBy('p_image.product_id')
            ->take(4)
            ->get(['inq.id','inq.quantity as pro_quantity','p.id as product_id','p_image.image','pd.name as product_name','p_unit.name as unit','country.name as country_name','p_price.product_MOQ as moq','p_price.product_FOB as fob'
                ]);*/
        // dd($quotations);
       
        // return View::make('fontend.BuyingRequest.get_buying_request',compact('bdtdc_inquery_messages','bdtdc_supllier_inqueries','quotations'));
        $agent = new Agent();        
        $device = $agent->device();
        // return view::make('mobile-view.admin-panel.buying-request',['bdtdc_supllier_inqueries'=>$bdtdc_supllier_inqueries->appends(Input::except('page'))],compact('bdtdc_supllier_inqueries_all','current_status','unread','search_str','search_date'));
            if($agent->isPhone())
            {
                return view::make('mobile-view.admin-panel.buying-request',['bdtdc_supllier_inqueries'=>$bdtdc_supllier_inqueries->appends(Input::except('page'))],compact('bdtdc_supllier_inqueries_all','current_status','unread','search_str','search_date'));

            }

            if($agent->isDestop())
            {
               return View::make('fontend.BuyingRequest.get_buying_request',['bdtdc_supllier_inqueries'=>$bdtdc_supllier_inqueries->appends(Input::except('page'))],compact('bdtdc_supllier_inqueries_all','current_status','unread','search_str','search_date'));
            }

            if($agent->isTab())
            {
               return View::make('fontend.BuyingRequest.get_buying_request',['bdtdc_supllier_inqueries'=>$bdtdc_supllier_inqueries->appends(Input::except('page'))],compact('bdtdc_supllier_inqueries_all','current_status','unread','search_str','search_date'));
            }
            else{
              
               return View::make('fontend.BuyingRequest.get_buying_request',['bdtdc_supllier_inqueries'=>$bdtdc_supllier_inqueries->appends(Input::except('page'))],compact('bdtdc_supllier_inqueries_all','current_status','unread','search_str','search_date'));
            }
    	// return View::make('fontend.BuyingRequest.get_buying_request',['bdtdc_supllier_inqueries'=>$bdtdc_supllier_inqueries->appends(Input::except('page'))],compact('bdtdc_supllier_inqueries_all','current_status','unread','search_str','search_date'));
       }
       else
       {
        // return Redirect::to('ServiceLogin')->withFlashMessage('You must first login or register before accessing this page.');
        return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login or register before accessing this page.');
       }
    }

    public function mysource($id)
    {
        if(Sentinel::getUser()){}else{
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
        }

        $quotations = BdtdcSupplierInquery::where('id',$id)->with(['bdtdc_product','inq_products_description','inq_message','inq_products_image','inq_products_images','p_price','inq_products_category','inq_docs_one','inq_docs'])->first();
         
        // dd($quotations);
        if(count([$quotations]) == 0){
            return '<div style="margin:0 auto;width:40%;margin-top:10%;border:1px double rebeccapurple;"><h1 style="text-align:center;color:forestgreen;">Requested Inquiry not available!!!</h1><p style="text-align:center;"><a style="text-decoration:none;" href="/">Go to home page</a></p></div>';
        }

        // $bdtdc_logistic_infos = DB::table('bdtdc_logistic_infos')->where('product_id',$quotations[0]->product_id)->get();
        $bdtdc_logistic_infos = DB::table('bdtdc_logistic_infos')->where('product_id',$quotations->product_id)->first();
        $port = '';
        /*if(isset($bdtdc_logistic_infos[0]->port)){
            $port = $bdtdc_logistic_infos[0]->port;
        }*/
        if($bdtdc_logistic_infos){
            $port = $bdtdc_logistic_infos->port;
        }
        // $bdtdc_logistic_infos = DB::table('bdtdc_logistic_infos')->where('product_id',3136)->get();
        /*echo "<pre>";
        print_r($quotations);
        echo "</pre>";*/
        $units=DB::table('bdtdc_product_unit')->get();
        $agent = new Agent();        
        $device = $agent->device();
        // return view('details.mysource',compact('quotations','port'));
            if($agent->isPhone())
            {
                return view('mobile-view.content-view-mobile.mysource',compact('quotations','port','units'));
            }

            if($agent->isDestop())
            {
              return view('details.mysource',compact('quotations','port','units'));
            }

            if($agent->isTab())
            {
               return view('details.mysource',compact('quotations','port','units'));
            }
            else{      
               return view('details.mysource',compact('quotations','port','units'));
            }
        // return view('details.mysource',compact('quotations','port','units'));
    }

    public function edit_add($id){
        if(Sentinel::getUser()){
            $user=Sentinel::getUser();
        }
        else{
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
        }

        $quotations = BdtdcSupplierInquery::where('id',$id)->with(['bdtdc_product','inq_products_description','inq_message','inq_products_image','inq_products_images','p_price','inq_products_category','inq_docs_one','inq_docs'])->first();

        if($quotations)
        {

        }
            else{
            return Redirect::to('Mybuying-Request')->with('error','Buying Request not available');
        }
        if($quotations->sender == Sentinel::getUser()->id){}else{
            if($user->roles->first()->id==2)
            {

            }
        else {
            Sentinel::logout();
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
            }
        }
        // dd($quotations);
        if(count([$quotations]) == 0){
            return '<div style="margin:0 auto;width:40%;margin-top:10%;border:1px double rebeccapurple;"><h1 style="text-align:center;color:forestgreen;">Requested Inquiry not available!!!</h1><p style="text-align:center;"><a style="text-decoration:none;" href="/">Go to home page</a></p></div>';
        }
        //dd($quotations);
        $units=DB::table('bdtdc_product_unit')->get();
        return view('details.edit-add',compact('quotations','units','id'));
    }

    public function post_edit_add(Request $r, $id){

        ini_set('date.timezone', 'UTC');

        if(!Sentinel::getUser()){
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login before accessing this page.');
        }

        $user_id = Sentinel::getUser()->id;

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
        $validator = Validator::make($r->all(), [
            'product_name' => 'required|max:1000',
            'quantity' => 'required|integer|max:10000000000',
            'unit' => 'required|integer|max:10000000000|not_in:0',
            'details' => 'required|max:2000',
            'attachment_1' => 'mimes:jpeg,bmp,png,jpg|max:50000',
            'attachment_2' => 'mimes:jpeg,bmp,png,jpg|max:50000',
            'attachment_3' => 'mimes:jpeg,bmp,png,jpg|max:50000',
            'fob' => 'max:3',
            'expire_date' => 'date|date_format:Y/m/d',
            'unit_price' => 'max:1000000000|numeric',
            'deleted_img.*' => 'max:1000000000|integer',
            'currency' => 'max:3|not_in:0',
            'port' => 'max:1000',
            'payment_terms' => 'max:1000|not_in:0',
            /*'agreement' => 'required|Accepted',
            'rules' => 'required|Accepted',*/
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }else{
            $update_arr = [
            'inquery_title' => $r->get('product_name'),
            'unit_id' => $r->get('unit'),
            'quantity' => $r->get('quantity'),
            /*'total_price' => $r->get('quantity')*$r->get('unit_price'),*/
            'message' => $r->get('details'),
            'payment_type' => $r->get('fob'),
            'pre_unit_price' => $r->get('unit_price'),
            'expire_date' => $r->get('expire_date'),
            'currency' => $r->get('currency'),
            'destination_port' => $r->get('port'),
            'payment_terms' => $r->get('payment_terms'),
            
            'is_RFQ' => 1,
            'created_at'=>date("Y-m-d H:i:s"),
        ];

            $inserted_inq_id = BdtdcSupplierInquery::where('id',$id)->update($update_arr);
            if($inserted_inq_id){
                $inserted_inq_id = $id;
            }else{
                return back();
            }
            // $inserted_inq_id = BdtdcSupplierInquery::where('id',109)->get();
            $attachment_1 = $r->file('attachment_1');
            $attachment_2 = $r->file('attachment_2');
            $attachment_3 = $r->file('attachment_3');
            if($attachment_1){
                $attachment_1_name = 'buying_request_docs_'.uniqid().'_'.uniqid().'.'.$attachment_1->getClientOriginalExtension();
                $attachment_1->move('buying-request-docs',$attachment_1_name);
                $input_arr = [
                    'inquery_id' => $inserted_inq_id,
                    'docs' => $attachment_1_name,
                    'created_at'=>date("Y-m-d H:i:s"),
                ];
                bdtdcInqueryDocs::insert($input_arr);
            }
            if($attachment_2){
                $attachment_2_name = 'buying_request_docs_'.uniqid().'_'.uniqid().'.'.$attachment_2->getClientOriginalExtension();
                $attachment_2->move('buying-request-docs',$attachment_2_name);
                $input_arr = [
                    'inquery_id' => $inserted_inq_id,
                    'docs' => $attachment_2_name,
                    'created_at'=>date("Y-m-d H:i:s"),
                ];
                bdtdcInqueryDocs::insert($input_arr);
            }
            if($attachment_3){
                $attachment_3_name = 'buying_request_docs_'.uniqid().'_'.uniqid().'.'.$attachment_3->getClientOriginalExtension();
                $attachment_3->move('buying-request-docs',$attachment_3_name);
                $input_arr = [
                    'inquery_id' => $inserted_inq_id,
                    'docs' => $attachment_3_name,
                    'created_at'=>date("Y-m-d H:i:s"),
                ];
                bdtdcInqueryDocs::insert($input_arr);
            }
            if($r->get('deleted_img')){
                if(count($r->get('deleted_img'))>0){
                    foreach ($r->get('deleted_img') as $deleted_id) {
                        $doc_to_delete = bdtdcInqueryDocs::where('id',$deleted_id)->first();
                        if($doc_to_delete){
                            if(file_exists('buying-request-docs/'.$doc_to_delete->docs)){
                                @unlink('buying-request-docs/'.$doc_to_delete->docs);
                            }
                            bdtdcInqueryDocs::where('id',$deleted_id)->delete();
                        }
                    }
                }
            }
            return Redirect::to('mysource/inq/'.$id)->with('success','Buying Request updated successfully');
        }
    }

    public function add_details($id)
    {
        return $id;
    }

    public function update_details(Request $request)
    {
        return $request;
    }

    public function mysource_quotations(Request $request, $id)
    {
        if(!Sentinel::check()){
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
        }
        $selected = 'show_me1';
        if($request->s){
            $selected = $request->s;
        }
        $supplier_inquiry = BdtdcSupplierInquery::where('id',$id)->first();
        $quotations = BdtdcInqueryMessage::where(['inquery_id' => $id,'is_quote' => 1])->first();
        
        $bdtdc_inquery_messages_query=BdtdcInqueryMessage::query();
        $bdtdc_inquery_messages_query->where('inquery_id',$id);
        $bdtdc_inquery_messages_query->with(['all_quote_messages','bdtdcInqueryMessageProduct','bdtdcInqueryMessageProductImage','bdtdcInqueryMessageProductImageNew','bdtdcInqueryMessageDocsOne','bdtdcInqueryMessageLogisticInfo','messagePerProductOwner' => function ($query) use ($id){
            $query->where('inquery_id', $id);
        }]);
        $bdtdc_inquery_messages_query->where('is_quote',1);
        $bdtdc_inquery_messages_query->where('quote_id',0);
        $bdtdc_inquery_messages_query->where('is_msg',0);
        $bdtdc_inquery_messages_query->orderBy('id', 'desc');
        // $bdtdc_inquery_messages_query->groupBy('product_owner_id');
        $bdtdc_inquery_messages = $bdtdc_inquery_messages_query->get();
        // dd($bdtdc_inquery_messages);

        BdtdcInqueryMessage::where('inquery_id',$id)->where('is_quote',1)->update(['is_view'=>1]);
        $agent = new Agent();        
        $device = $agent->device();
        // return view('details.mysource_quotations',compact('selected','supplier_inquiry','quotations','bdtdc_inquery_messages'));
            if($agent->isPhone())
            {
                 return view('mobile-view.content-view-mobile.mysource_quotations',compact('selected','supplier_inquiry','quotations','bdtdc_inquery_messages'));
            }

            if($agent->isDestop())
            {
               return view('details.mysource_quotations',compact('selected','supplier_inquiry','quotations','bdtdc_inquery_messages'));
            }

            if($agent->isTab())
            {
                return view('details.mysource_quotations',compact('selected','supplier_inquiry','quotations','bdtdc_inquery_messages'));
            }
            else{      
                return view('details.mysource_quotations',compact('selected','supplier_inquiry','quotations','bdtdc_inquery_messages'));
            }
        
        // return view('details.mysource_quotations',compact('selected','supplier_inquiry','quotations','bdtdc_inquery_messages'));
    }

    public function view_request_sample($id)
    {
        $units = BdtdcProductUnit::all();

        $country = BdtdcSampleRequests::all();
        //dd($country);
        $inq_id = BdtdcInqueryMessage::where('id',$id)->first();
        if($inq_id){}else{
            return '<h1 style="text-align:center;">Not available</h1>';
        }
        $inquery=BdtdcSupplierInquery::with(['bdtdc_product','bdtdc_product_attribute'])
                     ->where('id',$inq_id->inquery_id)
                     ->first();
                    //dd($inquery);
        if($inquery){}else{
            return '<h1 style="text-align:center;">Not available</h1>';
        }

    
        return view('fontend.buyer.view_request_sample',compact('units','inquery','inq_id'));
    }

    public function view_request_sample_success(Request $request)
    {

        $rules=array(
            'quantity'=>'required|integer',
            'date'=>'required',
            'delivery_address'=>'required',
            'message'=>'required',
            );


        $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return redirect::back()
                            ->withErrors($validator);
             
            }
            else
            {
                $r=$request->only('product_name');
                //dd($r);


                $input=$request->only('quantity','date','delivery_address','message','product_name','product_owner_id','unit_id','sender','product_details','product_image');
                //dd($input);

                $image = $request->file('product_image');
                if($image){
                    $image_name = 'uploads'.uniqid().'_'.$file->getClientOriginalName();
                    $image->move('quotation',$image_name);
                }else{
                    $image_name = '';
                }


                $insert_data=array();
                $insert_data = array
                (
                    'product_owner_id'=>$input['product_owner_id'],
                    'Expected_date_of_arriva'=> $input['date'],
                    'delivery_adress'=> $input['delivery_address'],
                    'message'=>$input['message'], 
                    'sender'=>$input['sender'],  
                );

                $request_id = DB::table('bdtdc_sample_requests')->insertGetId($insert_data);
                //dd($request_id);
                if($request_id)
                {
                    for($i=0,$len=count([$request->get('product_name')]);$i<$len;$i++)
                    {
                        $insert_sample_products = array
                            ( 
                                'request_id'=>$request_id,
                                'quantity'=> $input['quantity'][$i],
                                'product_name'=>$input['product_name'][$i],
                                'unit_id'=>$input['unit_id'][$i],
                                'product_details'=>$input['product_details'][$i],
                                /*'product_image'=>$input['product_image'][$i],*/
                                

                            ); 
                            $bdtdc = DB::table('bdtdc_sample_products')->insert($insert_sample_products);
                    }
                            //dd($bdtdc);
                }
                $product = DB::table('bdtdc_sample_products')->get();
                //dd($product);
                return view('fontend.buyer.view_request_success');
            }
    }

    public function requested_sample()
    {

        if(Sentinel::check())
        {
        $user_id = Sentinel::getUser()->id;

        // dd($user_id);
       
        $list=BdtdcSampleRequests::with(['request_product','buyer_company','supplier_company'])
            ->where('sender',$user_id)
            ->orWhere('product_owner_id',$user_id)
            ->get();


            return view('fontend.buyer.requested_sample',compact('list'));

        }
        else
        {
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['SCRIPT_URL']))->withFlashMessage('You must first login or register before accessing this page.');
        }
    }

    public function sample_buyer(Request $request)
    {

        /*
        Status list
        ------------
            0 = all status
            1 = Pending
            2 = Approved
            3 = Rejected
            4 = Completed
            5 = Closed
        */

        if(Sentinel::check())
        {
        $user_id = Sentinel::getUser()->id;
        $current_status = 0;
        $unread = false;
        $search_str = '';
        $search_date = 0;
        if($request->status){
            $current_status = $request->status;
        }
        if($request->unread){
            $unread = $request->unread;
        }
        if($request->search){
            $search_str = $request->search;
        }
        if($request->d){
            $search_date = $request->d;
        }
        
       
        $list=BdtdcSampleRequests::with(['request_product','buyer_company','supplier_company'])
            ->where('sender',$user_id)
            ->orWhere('product_owner_id',$user_id)
            ->paginate(15);

        // dd($list);

        $categorys=DB::table('bdtdc_supllier_inqueries as inq')
                                ->join('bdtdc_product_to_category as pc','pc.product_id','=','inq.product_id')
                                ->join('bdtdc_category as c','c.id','=','pc.category_id')
                                ->groupBy('c.id')
                                ->get(['c.name as cat_name','c.id as cat_id']);

        //dd($categorys);

            return view('fontend.buyer.requested_sample_buyer',compact('list','current_status','unread','search_str','search_date'));

        }
        else
        {
            return Redirect::to('login')->withFlashMessage('You must first login or register before accessing this page.');
        }

    }

    public function sample_buyer_details(Request $request, $id){
        if(!Sentinel::check()){
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
        }
        $selected = 'show_me1';
        if($request->s){
            $selected = $request->s;
        }
        $supplier_inquiry = BdtdcSupplierInquery::where('id',$id)->first();
        $quotations = BdtdcInqueryMessage::where(['inquery_id' => $id,'is_quote' => 1])->first();
        
        $bdtdc_inquery_messages_query=BdtdcInqueryMessage::query();
        $bdtdc_inquery_messages_query->where('inquery_id',$id);
        $bdtdc_inquery_messages_query->with(['all_quote_messages','bdtdcInqueryMessageProduct','bdtdcInqueryMessageProductImage','bdtdcInqueryMessageProductImageNew','bdtdcInqueryMessageDocsOne','bdtdcInqueryMessageLogisticInfo','messagePerProductOwner' => function ($query) use ($id){
            $query->where('inquery_id', $id);
        }]);
        $bdtdc_inquery_messages_query->where('is_quote',1);
        $bdtdc_inquery_messages_query->where('quote_id',0);
        $bdtdc_inquery_messages_query->where('is_msg',0);
        $bdtdc_inquery_messages_query->orderBy('id', 'desc');
        // $bdtdc_inquery_messages_query->groupBy('product_owner_id');
        $bdtdc_inquery_messages = $bdtdc_inquery_messages_query->get();
        // dd($bdtdc_inquery_messages);

        BdtdcInqueryMessage::where('inquery_id',$id)->where('is_quote',1)->update(['is_view'=>1]);
        $agent = new Agent();        
        $device = $agent->device();
        // return view('details.sample_buyer_details',compact('selected','supplier_inquiry','quotations','bdtdc_inquery_messages'));
            if($agent->isPhone())
            {
                 return view('mobile-view.content-view-mobile.sample_buyer_details',compact('selected','supplier_inquiry','quotations','bdtdc_inquery_messages'));
            }

            if($agent->isDestop())
            {
               return view('details.sample_buyer_details',compact('selected','supplier_inquiry','quotations','bdtdc_inquery_messages'));
            }

            if($agent->isTab())
            {
                return view('details.sample_buyer_details',compact('selected','supplier_inquiry','quotations','bdtdc_inquery_messages'));
            }
            else{      
                return view('details.sample_buyer_details',compact('selected','supplier_inquiry','quotations','bdtdc_inquery_messages'));
            }
    }

    public function my_supplier(){
        if(Sentinel::check())
        {}
        else
        {
            return Redirect::to('login')->withFlashMessage('You must first login or register before accessing this page.');
        }
        $user_id = Sentinel::getUser()->id;
        // echo $user_id;
        $bdtdc_inquery_messages = BdtdcInqueryMessage::where('product_owner_id',$user_id)->groupBy('sender')->orderBy('id','desc')->paginate(10);
        
        return view('fontend.buyer.my_supplier',compact('bdtdc_inquery_messages'));
    }

    public function online_order(Request $request, $ing, $id){
        // dd($request->product_id);
        // $bdtdc_order=DB::table('bdtdc_order')->get();
        // dd($bdtdc_order);
        // dd(BdtdcOrder::with('bdtdcOrderDetails')->orderBy('id','desc')->first());
        // dd(BdtdcOrderDetails::first());
        if(!Sentinel::getUser()){
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login or register before accessing this page.');
        }
        $quote_id = $id;
        $id=substr($id, 9, -9);
        $recursive = $request->r;
        $sid_data = $request->s;
        $sid = substr($sid_data, 9, -9);
        $user_id = Sentinel::getUser()->id;
        $units = BdtdcProductUnit::all();
        $quotations = BdtdcInqueryMessage::where('id', $id)->first();
        // dd($quotations);
        if($id == 0){
            $supplier_inquiry = null;
            $bdtdc_inquery_messages = null;
            $user=User::where('id',$sid)->first();
            if($user){
                $company =BdtdcCompany::where('user_id',$user->id)->first();
                if($company){
                    $supplier_company_id = $company->id;
                    $supplier_products = BdtdcProduct::with('product_name')->whereHas('bdtdcProductToCategory',function($subQuery) use($supplier_company_id){
                        $subQuery->where('company_id',$supplier_company_id);
                    })->get();
                    $supplier_product_groups = BdtdcSupplierProductGroups::with(['BdtdcSupplierProductGroupsProducts'=>function($subq) use($supplier_company_id){
                        $subq->whereHas('bdtdcProductToCategory',function($subq2) use($supplier_company_id){
                            $subq2->where('company_id',$supplier_company_id);
                        });
                    }])->where('company_id',$supplier_company_id)->where('active',1)->orderBy('sort','desc')->get();
                }else{
                    return '<h1 style="text-align:center;">Requested supplier not available</h1>';
                }
            }else{
                return '<h1 style="text-align:center;">Requested supplier not available</h1>';
            }
                    
        }else{
            if($quotations){}else{
                return '<h1 style="text-align:center;">Requested Quotation not available</h1>';
            }
                
            // dd($quotations);
            $supplier_inquiry = BdtdcSupplierInquery::where('id',$quotations->inquery_id)->first();
            // dd($supplier_inquiry);
            if($supplier_inquiry){}else{
                return '<h1 style="text-align:center;">Requested Inquiry not available</h1>';
            }
            if($supplier_inquiry->sender != $user_id){
                return '<h1 style="text-align:center;">Order not available</h1>';
            }

            $company=BdtdcCompany::where('user_id',$quotations->sender)->first();
            if($company){}else{
                return '<h1 style="text-align:center;">Requested Company not available</h1>';
            }
            $supplier_company_id=$company->id;
            // dd($units);
            $supplier_products = BdtdcProduct::with('product_name')->whereHas('bdtdcProductToCategory',function($subQuery) use($supplier_company_id){
                $subQuery->where('company_id',$supplier_company_id);
            })->get();
            $supplier_product_groups = BdtdcSupplierProductGroups::with(['BdtdcSupplierProductGroupsProducts'=>function($subq) use($supplier_company_id){
                    $subq->whereHas('bdtdcProductToCategory',function($subq2) use($supplier_company_id){
                        $subq2->where('company_id',$supplier_company_id);
                    });
                }])->where('company_id',$supplier_company_id)->where('active',1)->orderBy('sort','desc')->get();
            $bdtdc_inquery_messages=BdtdcInqueryMessage::with(['bdtdcInqueryMessageProduct','bdtdcInqueryMessageProductImage','bdtdcInqueryMessageProductImageNew','bdtdcInqueryMessageDocsOne','bdtdcInqueryMessageLogisticInfo'])->where('inquery_id',$id)->where('is_quote',1)->orderBy('id', 'desc')->groupBy('product_owner_id')->get();
            // dd($bdtdc_inquery_messages);
            $bdtdc_supllier_inqueries = DB::table('bdtdc_supllier_inqueries')->where('product_id',$quotations->product_id)->get();
            BdtdcInqueryMessage::where('inquery_id',$id)->where('is_quote',1)->update(['is_view'=>1]);
        }
        $agent = new Agent();
        $device = $agent->device();

        $countries = BdtdcCountry::get(['id', 'name']);
        $order_shipping_address = OrderShippingTerm::with(['country_info'])->where('user_id', $user_id)->get();

        $data['asdf']='';
        if(isset($request->product_id))
            $data['selected_product'] = BdtdcProduct::find($request->product_id);

        //return view('mobile-view.content-view-mobile.details-places-order-m',compact('supplier_inquiry','quotations','bdtdc_inquery_messages','units','supplier_products','supplier_product_groups','company','quote_id'));
        if($agent->isPhone())
        {

            return view('mobile-view.content-view-mobile.details-places-order-m',compact('supplier_inquiry','quotations','bdtdc_inquery_messages','units','supplier_products','supplier_product_groups','company','quote_id'));
        }
        if($agent->isDestop())
        {
              return view('details.place-oreder',compact('supplier_inquiry','quotations','bdtdc_inquery_messages','units','supplier_products','supplier_product_groups','company','quote_id'));
        }

        if($agent->isTab())
        {
            return view('mobile-view.content-view-mobile.details-places-order-m',compact('supplier_inquiry','quotations','bdtdc_inquery_messages','units','supplier_products','supplier_product_groups','company','quote_id'));
        }
        else{
            return view('details.place-oreder',$data,compact('supplier_inquiry','quotations','bdtdc_inquery_messages','units','supplier_products','supplier_product_groups','company','quote_id', 'countries','order_shipping_address'));
        }
    }

    public function post_online_order(Request $request,$quote_id){
        if(!Sentinel::getUser()){
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login or register before accessing this page.');
        }
        // dd($request->all());
        // return $request->all();
        $id=substr($quote_id, 9, -9);
        $user_id = Sentinel::getUser()->id;
        $quotations = BdtdcInqueryMessage::where('id', $id)->first();
        if($id == 0){
            $sid_data = $request->s;
            $sid = substr($sid_data, 9, -9);
            $user=User::where('id',$sid)->first();
            if($user){
                $company =BdtdcCompany::where('user_id',$user->id)->first();
                if($company){
                    $inquiry_id = 0;
                }else{
                    return '<h1 style="text-align:center;">This supplier is not available for placing order.</h1>';
                }
            }else{
                return '<h1 style="text-align:center;">This supplier is not available for placing order.</h1>';
            }
        }else{
            if($quotations){}else{
                return '<h1 style="text-align:center;">Requested Quotation not available</h1>';
            }
            $inquiry_id = $quotations->inquery_id;
            $company=BdtdcCompany::where('user_id',$quotations->sender)->first();
            $supplier_inquiry = BdtdcSupplierInquery::where('id',$quotations->inquery_id)->first();
            if($supplier_inquiry){}else{
                return '<h1 style="text-align:center;">Requested Inquiry not available</h1>';
            }
            if($supplier_inquiry->sender != $user_id){
                return '<h1 style="text-align:center;">Order not available</h1>';
            }
        }
        
        if($company){}else{
            return '<h1 style="text-align:center;">This supplier is not available for placing order.</h1>';
        }
        $supplier_company_id=$company->id;

        $validator = Validator::make($request->all(), [
            'shipping_method' => 'required|max:10000|min:0',
            'payment_terms' => 'required|max:10000|min:0',
            'shipping_fee' => 'required|numeric|max:9999999999|min:0',
            'insurance_charge' => 'required|numeric|max:9999999999|min:0',
            // 'shipment_date_type' => 'required|max:9999|min:0',
            // 'shipment_date' => 'date|date_format:"Y/m/d|after:today',
            // 'shipment_days_after' => 'integer|max:365|min:1',
            'initial_payment' => 'required|numeric|max:9999999999|min:0',
            'coverage_type' => 'required|max:9999|min:1',
            'remark' => 'max:9999999999|min:1',
            'agreement' => 'accepted',
            'selected_products' => 'required',
            'selected_products.*' => 'max:999999999999|min:0',
            'product_name' => 'required',
            'product_name.*' => 'max:999999|min:1',
            'product_quantity' => 'required',
            'product_quantity.*' => 'integer|max:9999999999|min:1',
            'product_unit' => 'required',
            'product_unit.*' => 'integer|max:9999999|not_in:0',
            'product_unit_price' => 'required',
            'product_unit_price.*' => 'numeric|max:9999999|min:0',
            'product_details.*' => 'max:999999999999|min:0',
            'product_image.*' => 'max:2048|mimes:jpg,jpeg,png',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $order_insert_data = array
            (
                'inquery_id'=>$inquiry_id,
                'quote_id'=>$id,
                'messages'=>$request->remark,
                'shipping_method'=>$request->shipping_method,
                'payment_terms'=>$request->payment_terms,
                'sender'=>$user_id,
                'product_owner_id'=>$company->user_id,
                'initial_payment'=>$request->initial_payment,
                'status'=>0,
                'coverage_type'=>$request->coverage_type,
                'shipping_fee'=>$request->shipping_fee,
                'insurance_charge'=>$request->insurance_charge,
                'shipment_date'=>$request->shipment_date,
                'shipment_date_type'=>$request->shipment_date_type,
                'shipment_days_after'=>$request->shipment_days_after,
                'shipping_address_id'=>$request->shipping_address_id,
            );
        $order = BdtdcOrder::create($order_insert_data);
        if($order){
            //Notification
            sendNotification(3, 'You have been received new Notification', Sentinel::getUser()->id, $company->user_id, $order->id);
            // End Notification
            $loop_count = 0;
            foreach ($request->selected_products as $selected_product_single){
                if($selected_product_single == 0){
                    $order_details_insert_data = array
                            (
                                'order_id'=>$order->id,
                                'product_name'=>$request->product_name[$loop_count],
                                'product_details'=>$request->product_details[$loop_count],
                                'product_id'=>$selected_product_single,
                                'quantity'=>$request->product_quantity[$loop_count],
                                'unit_id'=>$request->product_unit[$loop_count],
                                'unit_price'=>$request->product_unit_price[$loop_count],
                            );
                        if($request->file('product_image')[$loop_count]){
                            $product_images_single = $request->file('product_image')[$loop_count];
                            $pname = trim($request->product_name[$loop_count]);
                            //The name of the directory that we need to create.
                            $directoryName = 'bdtdc-order-image/'.$user_id;

                            //Check if the directory already exists.
                            if(!is_dir($directoryName)){
                                //Directory does not exist, so lets create it.
                                //true for nested directory (need 0777 permission for this)
                                mkdir($directoryName, 0777, true);
                            }
                            if($pname == ''){
                                $string   = 'Product-image-'.str_random(10);
                            }else{
                                $string   = str_slug(substr($pname,0,100),'-').'-'.str_random(10);
                            }
                            $temp_file  = $product_images_single;
                            $ext        = $product_images_single->getClientOriginalExtension();
                            $product_photo  = $string.'.'.$ext;
                            $dst = $directoryName.'/'.$product_photo;
                            move_uploaded_file($temp_file,$dst);
                            $order_details_insert_data['product_image'] = $dst;
                        }else{
                            $order_details_insert_data['product_image'] = 'uploads/no_image.jpg';
                        }
                        
                }else{
                    $product_details = BdtdcProductDescription::where('product_id',$selected_product_single)->first();
                    if($product_details){
                        $order_details_insert_data = array
                            (
                                'order_id'=>$order->id,
                                'product_name'=>$request->product_name[$loop_count],
                                'product_details'=>$request->product_details[$loop_count],
                                'product_id'=>$selected_product_single,
                                'quantity'=>$request->product_quantity[$loop_count],
                                'unit_id'=>$request->product_unit[$loop_count],
                                'unit_price'=>$request->product_unit_price[$loop_count],
                            );
                        if($product_details->product_image_new){
                            $order_details_insert_data['product_image'] = $product_details->product_image_new->image;
                        }else{
                            $order_details_insert_data['product_image'] = 'uploads/no_image.jpg';
                        }
                        
                    }
                }
                $loop_count++;
                BdtdcOrderDetails::create($order_details_insert_data);
            }
            return Redirect::to('success');
            // return view('fontend.buyer.view_request_success');
        }
    }
}
