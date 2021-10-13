<?php

namespace App\Http\Controllers\Front\Bdsource;

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
use App\Model\User;
use App\Model\BdtdcProductDescription;
use App\Model\BdtdcCurrency;
use App\Model\BdtdcPageSeo;
use App\Model\BdtdcJoinQuotation;
use App\Model\BdtdcProductImageNew;
use App\Model\BdtdcCountry;
use App\Model\BdtdcInqueryMessage;
use App\Model\BdtdcProductUnit;
use App\Model\BdtdcSupplierProductGroups;
use App\Model\Ticket\Tickets;
use App\Model\Ticket\Ticket_Thread;
use App\Model\Ticket\TicketToken;
use App\Model\BdtdcOrder;
use App\Model\BdtdcOrderDetails;
use App\Model\BdtdcNotification;
use Redirect;
use Jenssegers\Agent\Agent;
use App\Model\OrderPaymentHistory;
use App\Model\BdtdcSupplierInfo;
use App\Model\BdtdcSupplierInvoice;

class OrderController extends Controller
{
 public function showall(Request $request){
 	if(Sentinel::check())
 	{
 		$user=Sentinel::getUser();

 		//Notification Mark as read
 		BdtdcNotification::where('notification_type', 3)->where('read_at', NULL)->where('receiver_id', Sentinel::getUser()->id)->update(['read_at' => date('Y-m-d H:i:s')]);
 		//End Notification

 		/*$type = 'sender';
 		if($request->input('t')){
 			$type = $request->input('t');
 		}
 		$user=Sentinel::getUser();
 		$user_role = Role_user::where('user_id',$user->id)->first();
 		if($user_role){
 			if($user_role->role_id == 4){
	 			$type = 'sender';
	 		}
 		}
 		$orders=BdtdcOrder::with(['bdtdcInqueryMessageSender'])->where($type,$user->id)->get();*/
 		$orders=BdtdcOrder::with(['bdtdcInqueryMessageSender'])->where('product_owner_id',$user->id)->orderBy('id','desc')->get();
 		// dd($orders);
  		return view('details.order-list',compact('orders','user'));
		}
		else
		{
			return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
		}
	}
	public function sendshowall(){
		if(Sentinel::check())
 		{
 		$user=Sentinel::getUser();
 		/*$type = 'sender';
 		if($request->input('t')){
 			$type = $request->input('t');
 		}
 		$user=Sentinel::getUser();
 		$user_role = Role_user::where('user_id',$user->id)->first();
 		if($user_role){
 			if($user_role->role_id == 4){
	 			$type = 'sender';
	 		}
 		}
 		$orders=BdtdcOrder::with(['bdtdcInqueryMessageSender'])->where($type,$user->id)->get();*/
 		$orders=BdtdcOrder::with(['bdtdcInqueryMessageSender'])->where('sender',$user->id)->orderBy('id','desc')->get();
 		// dd($orders);
  		return view('details.order-list',compact('orders','user'));
		}
		else
		{
			return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
		}
	}

 	public function order_details($id)
 	{
 		if(!Sentinel::getUser()){
 			return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
 		}
 		 if (Sentinel::check())
           {
              $role =Role_user::where('user_id',Sentinel::getUser()->id)->first();
              $data['dashboard_route'] = ($role->role_id ==3) ? "company/dashboard" : 'buyer/dashbord';
            
        }
 		$order = BdtdcOrder::with('BdtdcOrderDetails','paymentHistory')->where('id',$id)->first();
 		if($order){
 			if($order->sender == Sentinel::getUser()->id || $order->product_owner_id == Sentinel::getUser()->id){
 				if($order->product_owner_id == Sentinel::getUser()->id){
 					BdtdcOrder::where('id',$id)->update(['is_view'=>1]);
 				}
 			}else{
 				$order = null;
 			}
 		}
 		return view('details.order_details',$data,compact('order'));
 	}

 	public function order_edit($id)
 	{
 		if(!Sentinel::getUser()){
 			return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
 		}
 		$units = BdtdcProductUnit::all();
 		$order = BdtdcOrder::with('BdtdcOrderDetails')->where('id',$id)->first();
 		// dd($order);
 		if($order){
 			if($order->sender == Sentinel::getUser()->id){
 				$company=BdtdcCompany::where('user_id',$order->product_owner_id)->first();
	            if($company){}else{
	                return '<h1 style="text-align:center;">Requested Company not available</h1>';
	            }
	            $quote_id = $order->quote_id;
	            $supplier_company_id=$company->id;
 				$supplier_inquiry = BdtdcSupplierInquery::where('id',$order->inquery_id)->first();
 				$quotations = BdtdcInqueryMessage::where('id', $order->quote_id)->first();
 				$supplier_products = BdtdcProduct::with('product_name')->whereHas('bdtdcProductToCategory',function($subQuery) use($supplier_company_id){
	                $subQuery->where('company_id',$supplier_company_id);
	            })->get();
	            $supplier_product_groups = BdtdcSupplierProductGroups::with(['BdtdcSupplierProductGroupsProducts'=>function($subq) use($supplier_company_id){
                        $subq->whereHas('bdtdcProductToCategory',function($subq2) use($supplier_company_id){
                            $subq2->where('company_id',$supplier_company_id);
                        });
                    }])->where('company_id',$supplier_company_id)->where('active',1)->orderBy('sort','desc')->get();
 			}else{
 				$order = null;
 				$supplier_inquiry = null;
 				$quotations = null;
 				$supplier_products = null;
 				$supplier_product_groups = null;
 				$company = null;
 				$quote_id = 0;
 			}
 		}
 		return view('details.order_edit',compact('order','supplier_inquiry','quotations','units','supplier_products','supplier_product_groups','company','quote_id'));
 	}

 	public function post_order_edit(Request $request, $id){
 		if(!Sentinel::getUser()){
 		    return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['HTTP_REFERER']))->withFlashMessage('You must first login or register before accessing this page.');
 		}
 		// $id=substr($quote_id, 9, -9);
 		$user_id = Sentinel::getUser()->id;
 		$quotations = BdtdcInqueryMessage::where('id', $id)->first();

 		$validator = Validator::make($request->all(), [
 		    'shipping_method' => 'required|max:10000|min:0',
 		    'payment_terms' => 'required|max:10000|min:0',
 		    'shipping_fee' => 'required|numeric|max:9999999999|min:0',
 		    'insurance_charge' => 'required|numeric|max:9999999999|min:0',
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
 		        // 'quote_id'=>$id,
 		        'messages'=>$request->remark,
 		        'shipping_method'=>$request->shipping_method,
 		        'payment_terms'=>$request->payment_terms,
 		        'sender'=>$user_id,
 		        // 'product_owner_id'=>$company->user_id,
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
 		// $order = BdtdcOrder::create($order_insert_data);
 		$order = BdtdcOrder::find($request->order_id)->update($order_insert_data);
 		BdtdcOrderDetails::where('order_id', $request->order_id)->delete();

	    $loop_count = 0;
	    foreach ($request->selected_products as $selected_product_single){
	        if($selected_product_single == 0){
	            $order_details_insert_data = array
	                    (
	                        'order_id'=>$request->order_id,
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
	                        'order_id'=>$request->order_id,
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
 	}

 	public function order_delete($id)
 	{
 		if(!Sentinel::getUser()){
 			return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
 		}
 		$order = BdtdcOrder::with('BdtdcOrderDetails')->where('id',$id)->first();
 		if($order){
 			if($order->sender == Sentinel::getUser()->id){
 				if($order->BdtdcOrderDetails){
 					if(count($order->BdtdcOrderDetails)>0){
 						foreach ($order->BdtdcOrderDetails as $details_value) {
 							if($details_value->product_id == 0){
 								if(@file_exists($details_value->product_image)){
 									@unlink($details_value->product_image);
 								}
 							}
 						}
 					}
 				}
 				BdtdcOrderDetails::where('order_id',$id)->delete();
 				BdtdcOrder::where('id',$id)->delete();
 				$order = null;
 				session()->flash('order_deleted', 'Order Deleted Successfully!!!');
 				return view('details.order_details',compact('order'));
 			}else{
 				$order = null;
 			}
 		}
 		return view('details.order_details',compact('order'));
 	}

 	public function order_confirm($id)
 	{
 		if(!Sentinel::getUser()){
 			return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
 		}
 		$order = BdtdcOrder::with('BdtdcOrderDetails.productDetails')->where('id',$id)->first();
 		if($order){
 			if($order->product_owner_id == Sentinel::getUser()->id){
 				BdtdcOrder::where('id',$id)->update(['status'=>1]);
 				
 			}else{
 				$order = null;
 			}
 		}
 		session()->flash('order_confirm', 'Order Confirm Successfully!!!');
 		return Redirect::back();
 	}

 	public function order_postpone($id)
 	{
 		if(!Sentinel::getUser()){
 			return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
 		}
 		$order = BdtdcOrder::with('BdtdcOrderDetails.productDetails')->where('id',$id)->first();
 		if($order){
 			if($order->product_owner_id == Sentinel::getUser()->id){
 				BdtdcOrder::where('id',$id)->update(['status'=>0]);
 				
 			}else{
 				$order = null;
 			}
 		}
 		session()->flash('order_postpone', 'Order postpone Successfully!!!');
 		return Redirect::back();
 	}
 	public function order_active($id)
 	{
 		if(!Sentinel::getUser()){
 			return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
 		}
 		$order = BdtdcOrder::with('BdtdcOrderDetails.productDetails')->where('id',$id)->first();
 		if($order){
 			if($order->product_owner_id == Sentinel::getUser()->id){
 				BdtdcOrder::where('id',$id)->update(['status'=>1]);
 				
 			}else{
 				$order = null;
 			}
 		}
 		session()->flash('order_active', 'Order Active Successfully!!!');
 		return Redirect::back();
 	}

 	public function order_drop_ship($id){
 		if(!Sentinel::getUser()){
 			return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
 		}
 		$order = BdtdcOrder::with('BdtdcOrderDetails.productDetails')->where('id',$id)->first();
 		if($order){
 			if($order->product_owner_id == Sentinel::getUser()->id){
 				BdtdcOrder::where('id',$id)->update(['shipping_status'=>1]);
 				
 			}else{
 				$order = null;
 			}
 		}
 		session()->flash('order_active', 'Order drop for shipping!!!');
 		return Redirect::back();
 	}
 	public function order_confirm_received($id){
 		if(!Sentinel::getUser()){
 			return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
 		}
 		$order = BdtdcOrder::with('BdtdcOrderDetails.productDetails')->where('id',$id)->first();
 		if($order){
 			if($order->sender == Sentinel::getUser()->id){
 				BdtdcOrder::where('id',$id)->update(['status'=>2]);
 				
 			}else{
 				$order = null;
 			}
 		}
 		session()->flash('order_active', 'Order Receivered!!!');
 		return Redirect::back();
 	}
 	public function order_invoice($id){
 		if(!Sentinel::getUser()){
 			return Redirect::to('ServiceLogin?continue='.URL::to($_SERVER['REQUEST_URI']))->withFlashMessage('You must first login before accessing this page.');
 		}
 		$data['supplier_info']=OrderPaymentHistory::with('orders','order_invoice')->where('id',$id)->first();
 		// dd($data['supplier_info']);
        return view::make('fontend.supplier.order-invoice',$data);
 	}
}