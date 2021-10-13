<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use Validator;
use Sentinel;
use DB;
use Mail;
use App\Model\BdtdcSupplierPackage;
use App\Model\BdtdcCompany;
use App\Model\BdtdcOrder;
use App\Model\OrderPaymentHistory;
use App\Model\BdtdcSupplierInfo;
use App\Model\BdtdcSupplierInvoice;
use App\Model\BdtdcPageSeo;
use PDF;

   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        if(Sentinel::check())
        {
            $user_id =Sentinel::getUser()->id;
            $user_name =Sentinel::getUser()->first_name;
            // dd($user_name);
            $company =BdtdcCompany::where('user_id',$user_id)->first(['id']);
            $company_id=$company->id;
         // Amount received as request is validated here.
            $year = $request->input('membership_duration');
             // dd($year);
        $rules = array(
            'amount'          => 'required|numeric'           
        );
        // dd($rules);
        $validator = Validator::make($request->all(), $rules);
        // dd($validator);
        if ($validator->fails()) {
             return redirect::back()
                        ->withErrors($validator);
                        
        }
        $pay_amount = $request->amount;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge=Stripe\Charge::create ([
                "amount" => $pay_amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => " Test payment from buyerseller.asia." 
        ]);
        if($charge->paid == true){
        $year = $request->input('membership_duration');
        if($request->input('membership_duration')==32){
            $month=3;
            $edate= date('Y-m-d H:i:s', strtotime('+'.$month.' month'));
        }
        else if($request->input('membership_duration')==62){
            $month=6;
            $edate= date('Y-m-d H:i:s', strtotime('+'.$month.' month'));
        }
        else{
            $edate= date('Y-m-d H:i:s', strtotime('+'.$year.' year'));
        }
        
        $supplier_package=$request->input('supplier_package_name');
        $bdtdc_suppliers_info_insert = array(
            'company_id' => $company_id,
            'member_id' => $request->input('membership_id'),
            'membership_pakacge_id' => $supplier_package,
            'membership_year' => $request->input('membership_duration'),
            'payment'          =>1,
            'start_date' => date("Y-m-d H:i:s"),
            'end_date' => $edate,
            );
        
        $member_id=DB::table('bdtdc_suppliers_info')->insertGetId($bdtdc_suppliers_info_insert);
        if($member_id)
        {
            $rand_key = str_random(10);
            $supplier_invoice=array(
                'payment_type'=>'membership',
               'company_id' => $company_id,
               'membership_id' => $member_id,
               'invoice_number'=>$rand_key
            );
            DB::table('bdtdc_supplier_invoice')->insert($supplier_invoice);
            $package=BdtdcSupplierPackage::with('descriptions')->where('id',$supplier_package)->first();
            Session::flash('success', 'Payment successful!');
            return view('goldsupplier.payment-success',compact('package','user_name'));
        }else{

        }
        }
        Session::flash('success', 'Payment successful!');
          
        return back();
        }
    }

    public function orderpayment(Request $request)
    {
        if(Sentinel::check())
        {
            $user_id =Sentinel::getUser()->id;
            $user_name =Sentinel::getUser()->first_name;
            // dd($user_name);
            $company =BdtdcCompany::where('user_id',$user_id)->first(['id']);
            $company_id=$company->id;
         // Amount received as request is validated here.
            
            $rules = array(
                'amount'          => 'required|numeric',
                'order_id'        =>  'required|numeric',          
            );
            // dd($rules);
            $validator = Validator::make($request->all(), $rules);
            // dd($validator);
            if ($validator->fails()) {
                 return redirect::back()
                            ->withErrors($validator);
                            
            }
            $pay_amount = $request->amount;
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge=Stripe\Charge::create ([
                    "amount" => $pay_amount,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Test payment from buyerseller.asia." 
            ]);
            if($charge->paid == true){
                $order=BdtdcOrder::where('id',$request->input('order_id'))->first();
                $bdtdc_suppliers_info_insert = array(
                    'order_id' => $request->input('order_id'),
                    'pay_using' => 'card',
                    'pay_type' => $request->input('pay_type'),
                    'pay_amount'  =>$pay_amount,
                    'status'    =>1
                    );
                $supplier_invoice=array(
                    'payment_type'=>'order',
                    'order_id'    => $request->input('order_id'),
                   'company_id' => $company_id,
                   'invoice_number'=>$company_id.$request->input('order_id')
                );
                if($id = OrderPaymentHistory::with('orders')->insertGetId($bdtdc_suppliers_info_insert))
                {
                    BdtdcSupplierInvoice::insert($supplier_invoice);
                    if($order->initial_payment==$pay_amount){
                        BdtdcOrder::where('id',$request->input('order_id'))->update(['payment_status'=>1]);
                    }
                    if($request->input('pay_type')=='full'){
                        BdtdcOrder::where('id',$request->input('order_id'))->update(['payment_status'=>2]);
                    }
                    Session::flash('success', 'Payment successful!');

                    //email to buyer
                    
                    $this->orderHistory($id);

                    // dd('okk');

                    // Mail::send('emails.payment',['pdf' => $pdf], function($message) {
                    //     $message->to(Sentinel::getUser()->email)
                    //         ->subject('Payment Success')
                    //         ->attach($pdf);
                    // });
                    //email

                    //email to product owner
                    // Mail::send('emails.payment',['asdf' => 1], function($message) {
                    //     $message->to(Sentinel::findById($order->product_owner_id)->email)
                    //         ->subject('Payment Success');
                    // });
                    //email

                    return view('goldsupplier.order-payment-success',compact('order','user_name'));
                }else{
                    return back();
                }
            }
            Session::flash('success', 'Payment successful!');
              
            return back();
        }
    }
    public function orderHistory($id){
        $data['supplier_info']=OrderPaymentHistory::with('orders','order_invoice')->where('id',$id)->first();

        // $header=BdtdcPageSeo::where('page_id',124)->first();
        // $data['title']=$header->title;
        // $data['keyword']=$header->meta_keyword;
        // $data['description']=$header->meta_description;
        // $page_content_title ='';
        // return View::make('contents_view.contact',$data,['page_content_title'=>$page_content_title]);


        // $pdf = PDF::loadView('contents_view.contact', $data,['page_content_title'=>$page_content_title])->save('invoice/'.Sentinel::getUser()->id.'.pdf');
        $pdf = PDF::loadView('fontend.supplier.order-invoice', $data)->save('invoice/'.Sentinel::getUser()->id.'.pdf');

        Mail::send('emails.payment',['asdf' => 1], function($message) {
                $message->to(Sentinel::getUser()->email)
                    ->subject('Payment Success')
                    ->attach('invoice/'.Sentinel::getUser()->id.'.pdf');
            });
  
        // return $pdf->download('111asf1asdf1asdf11asdf1.pdf');
    }
}