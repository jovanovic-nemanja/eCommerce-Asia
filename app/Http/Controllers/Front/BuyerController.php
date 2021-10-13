<?php

namespace App\Http\Controllers\Front;

use App\BdtdcSupplierQuery;
use App\Model\BdtdcInqueryMessage;
use App\Model\bdtdcInqueryDocs;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use URL;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Model\Role_user;
use App\Model\BdtdcProduct;
use App\Model\BdtdcProductUnit;
use App\Model\BdtdcSupplierInquery;
use App\Model\BdtdcJoinQuotation;
use App\Model\BdtdcCompany;
use Jenssegers\Agent\Agent;
use App\Model\BdtdcPageSeo;
use Mail;
use App\Model\User;
use Pusher\Pusher;
use App\Model\BdtdcNotification;


class BuyerController extends Controller
{
   
    
    public function get_contact_with_supplier($supplier_id,$product_id){
        if(!Sentinel::getUser()){
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login or register before accessing this page.');
        }
        // return $r->all();
        $user_id = Sentinel::getUser()->id;
        if($user_id == $supplier_id){
            return Redirect::back();
        }

        $products = BdtdcProduct::where('id',$product_id)->first();
        $BdtdcProductUnit = BdtdcProductUnit::get();
        $header=BdtdcPageSeo::where('page_id',101)->first();
        $data['title']=@$header->title;
        $data['keyword']=@$header->meta_keyword;
        $data['description']=@$header->meta_description;


        $agent = new Agent();
        
        $device = $agent->device();
        // return view('mobile-view.content-view-mobile.contact_supplier',compact(['products','supplier_id','BdtdcProductUnit']));
         
        if($agent->isPhone())
        {
            // return view('fontend.buyer.buyer_supplier_contact_form',compact(['products','supplier_id','BdtdcProductUnit']));

          return view('mobile-view.content-view-mobile.contact_supplier',compact(['products','supplier_id','BdtdcProductUnit']));
        }
        if($agent->isDestop())
        {
           return view('fontend.buyer.buyer_supplier_contact_form',$data,compact(['products','supplier_id','BdtdcProductUnit']));
        }

        if($agent->isTab())
        {
           return view('fontend.buyer.buyer_supplier_contact_form',compact(['products','supplier_id','BdtdcProductUnit']));
        }
        else{
          
          return view('fontend.buyer.buyer_supplier_contact_form',$data,compact(['products','supplier_id','BdtdcProductUnit']));
        }

        // dd($products->supplier_product->users->first_name);

        //return $products;
        

    }
    public function success(){
        
        $agent = new Agent();
        
        $device = $agent->device();
        // return View::make('mobile-view.page.success');
         
        if($agent->isPhone())
        {
            return View::make('mobile-view.page.success');
        }
        if($agent->isDestop())
        {
           return view('pages.success1');
        }
        if($agent->isTab())
        {
            return View::make('mobile-view.page.success');
        }
        else{          
            return view('pages.success1');
        }
    }

    public function post_contact_with_supplier(Request $r){    
        if(!Sentinel::getUser()){
            return 0;
        }
        // return $r->all();
        $user_id = Sentinel::getUser()->id;
        $role = Role_user::where('user_id',$user_id)->first();

        $total_inq_today = BdtdcSupplierInquery::where('sender',$user_id)->whereDate('created_at', '=', date('Y-m-d'))->get();

        if($total_inq_today->count() >= 50){
            return 'Maximum Buying Request(s) exceeded for today';
        }

        // $column = ($role->role_id == 3) ? "supplier_id" : "buyer_id";
        if($r->selected_product_id == 'none' && $r->product_id == ''){
            $validator = Validator::make($r->all(), [
                'supplier_id' => 'required|integer|max:1000000000',
                'inquiry_title' => 'required|max:100000',
                'message' => 'required|max:100000',
                // 'attachment_1' => 'required|mimes:jpeg,bmp,png,jpg|max:20000',
                // 'attachment_2' => 'mimes:jpeg,bmp,png,jpg|max:20000',
                // 'attachment_3' => 'mimes:jpeg,bmp,png,jpg|max:20000',
            ]);

            if($validator->fails()) {
                return $validator->errors()->all();
            }

            $input_arr = [
                // 'product_id'        => $r->get('product_id'),
                // 'product_owner_id'  => $r->get('supplier_id'),
                // 'unit_id'           => $r->get('unit_id'),
                // 'quantity'          => $r->get('quantity'),
                'inquery_title'     => $r->get('inquiry_title'),
                'message'           => $r->get('message'),
                'sender'            => $user_id,
                'is_RFQ'            => 1,
                'created_at'        => date("Y-m-d H:i:s"),
            /*'inquery_title' => $r->get('inquiry_title'),
            'unit_id' => $r->get('unit'),
            'quantity' => $r->get('quantity'),
            'message' => $r->get('details'),
            'payment_type' => $r->get('fob'),
            'pre_unit_price' => $r->get('unit_price'),
            'currency' => $r->get('currency'),
            'destination_port' => $r->get('port'),
            'payment_terms' => $r->get('payment_terms'),
            'sender' => $user_id,
            'is_RFQ' => 1,
            'created_at'=>date("Y-m-d H:i:s"),*/
            ];
            $inserted_inq_id = BdtdcSupplierInquery::insertGetId($input_arr);

            if($inserted_inq_id){
                //Notification
                sendNotification(1, 'You have been received new Notification', Sentinel::getUser()->id, $r->input('supplier_id'), $inserted_inq_id);
                // End Notification

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
                            'is_join_quote' => 0,
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
                //         'is_join_quote' => 0,
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
                //         'is_join_quote' => 0,
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
                //         'is_join_quote' => 0,
                //         'created_at'=>date("Y-m-d H:i:s"),
                //     ];
                //     bdtdcInqueryDocs::insert($input_arr);
                // }

        $rand_key = str_random(30);
        $user= User::where('id',$user_id)->first();

        // $ww=Mail::send('pages.test-email', ['inserted_inq_id'=>$inserted_inq_id,'user'=>$user], function($message) {
        //     // $message->to(Route::current()->parameters()['email'])
        //     $message->to('sumonsk2288@gmail.com')
        //         ->subject('Inquiry Alert');

        // });



                return 1;
            }
            else{
                return 2;
            }
        }else if($r->selected_product_id != 'none' && $r->product_id == ''){
            //return 'multiple';
            $validator = Validator::make($r->all(), [
                    //'selected_product_id' => 'required|integer|max:1000000000',
                    'supplier_id' => 'required|integer|max:1000000000',
                    'message' => 'required|max:100000',
                    'attachment_1' => 'mimes:jpeg,bmp,png,jpg|max:20000',
                    'attachment_2' => 'mimes:jpeg,bmp,png,jpg|max:20000',
                    'attachment_3' => 'mimes:jpeg,bmp,png,jpg|max:20000',
                ]);

                if ($validator->fails()) {
                    return $validator->errors()->all();
                }

                $selecte_product_id_array = explode(",", trim($r->selected_product_id));
                $messages = array(
                    'required' => 'The product id field is required.',
                    'integer' => 'The product id field should be an integer.',
                    'max' => 'The product id field should not more than 1000000000.',
                );
                $attr_val_loop = count($selecte_product_id_array);
                for ($i=0; $i < $attr_val_loop; $i++) {
                    $validator = Validator::make($selecte_product_id_array, [
                        $i => 'required|integer|max:1000000000',
                        ],$messages);
                    if ($validator->fails()) {
                        return $validator->errors()->all();
                    }
                }

                $input_arr = [
                    'product_id'        => $r->selected_product_id,
                    'inquery_title'     => $r->get('product_title_all'),
                    'product_owner_id'  => $r->get('supplier_id'),
                    'sender'            => $user_id,
                    'message'           => $r->get('message'),
                    'is_join_quotation' => 1,
                    'created_at'        => date("Y-m-d H:i:s"),
                ];
                $inserted_inq_id = BdtdcSupplierInquery::insertGetId($input_arr);

                if($inserted_inq_id){
                    //Notification
                    sendNotification(1, 'You have been received new Notification', Sentinel::getUser()->id, $r->input('supplier_id'), $inserted_inq_id);
                    // End Notification

                    $arrData = array();
                    if(isset($attachments)){
                        foreach ($attachments as $key => $value) {
                            $attachment_name = 'buying_request_docs_'.uniqid().'_'.uniqid().'.'.$attachments[$key]->getClientOriginalExtension();
                            $attachments[$key]->move('buying-request-docs',$attachment_name);

                            $arrData[] = array(
                                'inquery_id' => $inserted_inq_id,
                                'docs' => $attachment_name,
                                'is_join_quote' => 0,
                                'created_at'=>date("Y-m-d H:i:s"),
                            );
                        }
                        bdtdcInqueryDocs::insert($arrData);
                    }

                    // $attachment_1 = $r->file('attachment_1');
                    // $attachment_2 = $r->file('attachment_2');
                    // $attachment_3 = $r->file('attachment_3');
                    // if($attachment_1){
                    //     $attachment_1_name = 'buying_request_docs_'.uniqid().'_'.uniqid().'.'.$attachment_1->getClientOriginalExtension();
                    //     $attachment_1->move('buying-request-docs',$attachment_1_name);
                    //     $input_arr = [
                    //         'inquery_id' => $inserted_inq_id,
                    //         'docs' => $attachment_1_name,
                    //         'is_join_quote' => 1,
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
                    //         'is_join_quote' => 1,
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
                    //         'is_join_quote' => 1,
                    //         'created_at'=>date("Y-m-d H:i:s"),
                    //     ];
                    //     bdtdcInqueryDocs::insert($input_arr);
                    // }

                     $rand_key = str_random(30);
            $user= User::where('id',$user_id)->first();
            $receive_id=$r->get('supplier_id');
            $receive= User::where('id',$receive_id)->first();

            $ww=Mail::send('pages.test-email', ['inserted_inq_id'=>$inserted_inq_id,'user'=>$user,'receive'=>$receive], function($message) {
            // $message->to(Route::current()->parameters()['email'])
            $message->to('sumonsk2288@gmail.com')
                ->subject('Inquiry Alert');

        });

                    return 1;
                }
                else{
                    return 2;
                }
        }else if($r->selected_product_id = 'none' && $r->product_id != ''){
            //return "single";
            $validator = Validator::make($r->all(), [
                'product_id' => 'required|integer|max:1000000000',
                'supplier_id' => 'required|integer|max:1000000000',
                'message' => 'required|max:100000',
                'unit_id' => 'required|integer|max:100000',
                'quantity' => 'required|integer|max:100000',
                'attachment_1' => 'mimes:jpeg,bmp,png,jpg|max:20000',
                'attachment_2' => 'mimes:jpeg,bmp,png,jpg|max:20000',
                'attachment_3' => 'mimes:jpeg,bmp,png,jpg|max:20000',
            ]);

            if ($validator->fails()) {
                return $validator->errors()->all();
            }
            $input_arr = [
                'product_id'        => $r->get('product_id'),
                'product_owner_id'  => $r->get('supplier_id'),
                'unit_id'           => $r->get('unit_id'),
                'quantity'          => $r->get('quantity'),
                // 'inquery_title'     => $r->get('inquiry_title'),
                'message'           => $r->get('message'),
                'sender'            => $user_id,
                // 'is_RFQ'            => 1,
                'created_at'        => date("Y-m-d H:i:s"),
            /*'inquery_title' => $r->get('inquiry_title'),
            'unit_id' => $r->get('unit'),
            'quantity' => $r->get('quantity'),
            'message' => $r->get('details'),
            'payment_type' => $r->get('fob'),
            'pre_unit_price' => $r->get('unit_price'),
            'currency' => $r->get('currency'),
            'destination_port' => $r->get('port'),
            'payment_terms' => $r->get('payment_terms'),
            'sender' => $user_id,
            'is_RFQ' => 1,
            'created_at'=>date("Y-m-d H:i:s"),*/
            ];
            $inserted_inq_id = BdtdcSupplierInquery::insertGetId($input_arr);

            if($inserted_inq_id){
                //Notification
                sendNotification(1, 'You have been received new Notification', Sentinel::getUser()->id, $r->input('supplier_id'), $inserted_inq_id);
                // End Notification

                $arrData = array();
                if(isset($attachments)){
                    foreach ($attachments as $key => $value) {
                        $attachment_name = 'buying_request_docs_'.uniqid().'_'.uniqid().'.'.$attachments[$key]->getClientOriginalExtension();
                        $attachments[$key]->move('buying-request-docs',$attachment_name);

                        $arrData[] = array(
                            'inquery_id' => $inserted_inq_id,
                            'docs' => $attachment_name,
                            'is_join_quote' => 0,
                            'created_at'=>date("Y-m-d H:i:s"),
                        );
                    }
                    bdtdcInqueryDocs::insert($arrData);
                }

                
                // $attachment_1 = $r->file('attachment_1');
                // $attachment_2 = $r->file('attachment_2');
                // $attachment_3 = $r->file('attachment_3');
                // if($attachment_1){
                //     $attachment_1_name = 'buying_request_docs_'.uniqid().'_'.uniqid().'.'.$attachment_1->getClientOriginalExtension();
                //     $attachment_1->move('buying-request-docs',$attachment_1_name);
                //     $input_arr = [
                //         'inquery_id' => $inserted_inq_id,
                //         'docs' => $attachment_1_name,
                //         'is_join_quote' => 0,
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
                //         'is_join_quote' => 0,
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
                //         'is_join_quote' => 0,
                //         'created_at'=>date("Y-m-d H:i:s"),
                //     ];
                //     bdtdcInqueryDocs::insert($input_arr);
                // }
                 $rand_key = str_random(30);
      $user= User::where('id',$user_id)->first();
      $receive_id=$r->get('supplier_id');
            $receive= User::where('id',$receive_id)->first();
        $ww=Mail::send('pages.test-email', ['inserted_inq_id'=>$inserted_inq_id,'user'=>$user,'receive'=>$receive], function($message) {
            // $message->to(Route::current()->parameters()['email'])
            $message->to('info@buyerseller.asia')
                ->subject('Inquiry Alert');

        });

                return 1;
            }
            else{
                return 2;
            }
        }else{
            return "Unknown error occured!!!";
        }
    }

    public function get_conversation($id,$quotation_type){
        if(Sentinel::getUser()){
        }else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }
        $user_id = Sentinel::getUser()->id;
        $user_data = User::where('id',$user_id)->first();
        $check_max_inquiry = BdtdcSupplierInquery::where('product_owner_id', $user_id)->take(3)->get();
        $permitted_id = [];
        foreach ($check_max_inquiry as $check_max_inquiry_single) {
            $permitted_id[] = $check_max_inquiry_single->id;
        }
        // dd($check_max_inquiry);
        // BdtdcCompany::where('user_id',$user_id)->update(['is_gold'=>1]);
        $company_des = BdtdcCompany::where('user_id',$user_id)->first();
        if($user_data->Role_user){
            if($user_data->Role_user->role_id != 2){
                if($company_des){
                    if($company_des->is_gold == 1){}else{
                        $check_inquiry_sender = BdtdcSupplierInquery::where('id', $id)->first();
                        if($check_inquiry_sender){
                            if($check_inquiry_sender->sender == $user_id){}else{
                                if(in_array($id, $permitted_id)){}else{
                                    // return '<h2 class="text-center">Sorry! You are not allowed to view more than 3 Inquiry details.<br> Upgrade to <a target="_blank" href="../SupplierChannel/pages/suppliers_memebership/23">Gold Member NOW!</a></h2>';
                                }
                            }
                        }else{
                            return '<h2 class="text-center">Inquiry details not available</h2>';
                        }
                    }
                }else{
                    return '<h2 class="text-center">Company information not available.</h2>';
                }
            }
        }else{
            if($company_des){
                if($company_des->is_gold == 1){}else{
                    $check_inquiry_sender = BdtdcSupplierInquery::where('id', $id)->first();
                    if($check_inquiry_sender){
                        if($check_inquiry_sender->sender == $user_id){}else{
                            if(in_array($id, $permitted_id)){}else{
                                // return '<h2 class="text-center">Sorry! You are not allowed to view more than 3 Inquiry details.<br> Upgrade to <a target="_blank" href="../SupplierChannel/pages/suppliers_memebership/23">Gold Member NOW!</a></h2>';
                            }
                        }
                    }else{
                        return '<h2 class="text-center">Inquiry details not available</h2>';
                    }
                }
            }else{
                return '<h2 class="text-center">Company information not available.</h2>';
            }
        }
            
        //return Sentinel::getUser();
        if($quotation_type == 'single'){
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
            // dd($prev_quotation);
            $inquery_view_update = [
                'views' => 1,
            ];

            if($product){
                if($product->views == '1'){}else{
                    if($product->product_owner_id == $user_id){
                        BdtdcSupplierInquery::where('id', $id)->update($inquery_view_update);
                    }
                }
            }
            
            return view('fontend.conversation_window.single_product_quotation',compact(['product','prev_quotation','user_id']));
        }else{
            //$join_quotation = BdtdcJoinQuotation::where('id',$id)->first(['product_id','message','product_owner_id','sender']);
            // $join_quotation = DB::table('bdtdc_join_quotation as jq')
            $join_quotation = DB::table('bdtdc_supllier_inqueries as jq')
                                ->join('users as u','u.id','=','jq.product_owner_id','left')
                                ->join('users as u2','u2.id','=','jq.sender','left')
                                ->where('jq.id',$id)
                                ->first(['jq.id','u.first_name as pw_first_name','u.last_name as pw_last_name','u2.first_name as s_first_name','u2.last_name as s_last_name','jq.product_id','jq.message','jq.product_owner_id','jq.sender','jq.views','jq.created_at','jq.quantity']);

            // dd($join_quotation);

            $inquery_view_update = [
                'views' => 1,
            ];

            if($join_quotation){
                if($join_quotation->views == '1'){}else{
                    if($join_quotation->product_owner_id == $user_id){
                        BdtdcSupplierInquery::where('id', $id)->update($inquery_view_update);
                    }
                }
            }


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
                $all_join_quotation[$i]->quantity = $join_quotation->quantity;
            }

            //return $all_join_quotation;
            // dd($all_join_quotation);

            return view('fontend.conversation_window.multy_product_quotation',compact(['join_quotation','all_join_quotation','user_id']));
        }

    }

    public function post_conversation(Request $r){
        if(Sentinel::getUser()){
        }else{
            return redirect('login')->withFlashMessage('Please sign in first.');
        }
        
        $user_id = Sentinel::getUser()->id;
        //return $r->all();
        $previous_qp_data = BdtdcInqueryMessage::where('inquery_id',$r->inquery_id)
                                ->where('product_id',$r->product_id)
                                ->where('product_owner_id',$r->product_owner_id)
                                ->orderBy('id','desc')
                                ->first();
        $quantity = trim($r->quantity);
        $unit_price = trim($r->unit_price);
        if(trim($r->quantity) == ''){
            if($previous_qp_data){
                $quantity = $previous_qp_data->quantity;
            }
        }
        if(trim($r->unit_price) == ''){
            if($previous_qp_data){
                $unit_price = $previous_qp_data->unit_price;
            }
        }
        $input_arr = [
            'inquery_id'        => $r->inquery_id,
            'product_id'        => $r->product_id,
            'messages'          => $r->messages,
            'quantity'          => $quantity,
            'unit_price'        => $unit_price,
            'sender'            => $user_id,
            'product_owner_id'  => $r->product_owner_id,
            'total'             => $r->total
        ];
        if(BdtdcInqueryMessage::create($input_arr)){
            return 1;
        }else{
            return 0;
        }
    }
    
    public function contact_supplier($supplier_id){
        // dd(BdtdcSupplierInquery::with(['inq_docs'])->orderBy('id','desc')->take(3)->get());
        // dd(BdtdcInqueryMessage::orderBy('id','desc')->take(1)->get());
        // dd(bdtdcInqueryDocs::orderBy('id','desc')->take(1)->get());
        // bdtdcInqueryDocs::where('id',29)->delete();
        // bdtdcInqueryDocs::where('id',30)->delete();
        if(!Sentinel::getUser()){
            return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login or register before accessing this page.');
        }
         // return $supplier_id;
        $user_id = Sentinel::getUser()->id;
        if($user_id == $supplier_id){
            return Redirect::back();
        }
        $user = \App\User::where('id',$supplier_id)->first();
        $agent = new Agent();
        
        $device = $agent->device();
         //return view('mobile-view.content-view-mobile.contact_supplier',compact(['supplier_id','user']));
        if($agent->isDestop())
        {
           return view('fontend.buyer.buyer_supplier_contact_form',compact(['user','supplier_id']));
        }
        else if($agent->isPhone())
        {
          return view('mobile-view.content-view-mobile.contact_supplier',compact(['supplier_id','user']));
        }else{
            return view('fontend.buyer.buyer_supplier_contact_form',compact(['user','supplier_id']));
        }
        


        // return view('fontend.buyer.buyer_supplier_contact_form',compact(['user','supplier_id']));
    }

    public function change_inq_view(Request $r){
        return BdtdcInqueryMessage::where('id',$r->messID)->update(['is_view'=>1]);
    }

    // public function readNotification($notification_id){
    //     $notification = BdtdcNotification::find($notification_id);
    //     $notification->read_at = date('Y-m-d H:i:s');
    //     $notification->save();

    //     $supplier_inquiry = BdtdcSupplierInquery::find($notification->reference_tbl_id);

    //     print_r($supplier_inquiry);
    // }
}
