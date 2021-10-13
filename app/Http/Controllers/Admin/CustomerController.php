<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ValidationController;
use App\Model\BdtdcCustomerGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\BdtdcCategory;
use DB;
use Input;
use View;
use App\Model\BdtdcSupplierProduct;
use App\Model\BdtdcSupplier;
use App\Model\BdtdcCustomer;
use Sentinel;
use App\User;
use URL;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      //     if (!empty($_SERVER['HTTP_CLIENT_IP']))
    // {
    //     $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    // }
    
    // if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    //     if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',') !== false) {
    //         $iplist = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
    //         foreach ($iplist as $ip) {
    //                 $ip_address = $ip;
    //         }
    //     } else {
    //         $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    //     }
    // }
    
    // if (!empty($_SERVER['HTTP_X_FORWARDED'])) {
    //     $ip_address = $_SERVER['HTTP_X_FORWARDED'];
    // } elseif (!empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
    //     $ip_address = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
    // } elseif (!empty($_SERVER['HTTP_FORWARDED_FOR'])) {
    //     $ip_address = $_SERVER['HTTP_FORWARDED_FOR'];
    // } elseif (!empty($_SERVER['HTTP_FORWARDED'])) {
    //     $ip_address = $_SERVER['HTTP_FORWARDED'];
    // } else {
    //     $ip_address = $_SERVER['REMOTE_ADDR'];
    // }
    // //dd($ip_address);
    // $location = GeoIP::getLocation($ip_address);
    // dd($location);
      return URL::current();
      $u=User::with('company')->where('id',2)->first();

         dd($u);
         $users = DB::table('bdtdc_customer')->join('bdtdc_customer_group', 'bdtdc_customer.customer_group_id', '=', 'bdtdc_customer_group.id')->simplePaginate(10);
        $customers=BdtdcCustomer::with(array('bdtdcCustomerGroup','company'))
                                ->get();

        return view('protected.admin.myB2B.customers',['users'=>$users,'customers'=>$customers]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
       $countries = DB::select('select * from bdtdc_country');
      
       foreach($countries as $country){
       $data[$country->id]=$country->name;
        }
        
        $businessTypes = DB::select('select * from bdtdc_busines_types');
        foreach($businessTypes as $type){
       $business[$type->id]=$type->name;
        }
        $customer_group = BdtdcCustomerGroup::get(['id','name']);
        return view('protected.admin.myB2B.customers_create',array('countries'=>$data,'business'=>$business,'customer_group'=>$customer_group));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */


    

    public function store(ValidationController $request)
    {
        $input = $request->only(['fname', 'lname','email','password','repassword','country','customer_type','company_name','phone_country','phone_area','phone_number','btype','p1','p2','p3']);
          //dd($input);
        $msg='';
        $customer = array(
            'first_name'=>$input['fname'],
            'last_name'=>$input['lname'],
            'email'=>$input['email'],
            'password'=>$input['password'],
        );
        //$user_id    = DB::table('users')->insertGetId($customer);
        $user = Sentinel::registerAndActivate($customer);
        $usersRole = Sentinel::findRoleByName($request->input('customer_type'));

            // Assign the role to the users
        $usersRole->users()->attach($user);
        $user_id=$user->id;
        if($user_id)
        {
        //dd($usersRole);
        $company_id = DB::table('bdtdc_companies')->insertGetId(['user_id'=>$user_id]);
        $company_info =[
            'company_id'=>$company_id,
            'name' => $input['company_name'],
        ];
        DB::table('bdtdc_company_descriptions')->insert($company_info);


        $insert_date= array(
            'user_id'=>$user_id,
            'telephone'=>$input['phone_country'].'-'.$input['phone_area'].'-'.$input['phone_number'],
            'country_id'=>$input['country'],
            'company_id'=>$company_id,
        );
        if($input['customer_type'] == 'Buyers'){
            $insert_date['customer_group_id'] = 2;
            DB::table('bdtdc_customer')->insert($insert_date);
            //return $insert_date;
        }else{
            $insert_date['customer_group_id'] = 1;
            $insert_date_to_supplier['user_id'] = $user_id;
            $insert_date_to_supplier['busines_type_id'] = $input['btype'];
            DB::table('bdtdc_customer')->insert($insert_date);
            DB::table('bdtdc_suppliers')->insert($insert_date_to_supplier);
            //return $insert_date;
        }

        $msg = "Custome Added !!";
        return Redirect::back()->with('global', $msg);
        }
        else
        {
          $msg = "Customer Could not be add !!";
        
        return Redirect::back()->with('global', $msg);
        }
        
    }


    public function group_store(Request $request){
        $input = $request->only(['name', 'description']);     
        
         $messages='';             
              
             $validator = Validator::make(
                    array(
                        'name' => $input['name'],
                        'description' => $input['description']                       
                           
                    ),
                    array(
                        'name' => 'required|min:3|unique:bdtdc_customer_group',
                        'description' => 'required|min:8'
                        
                    )
                );
              if ($validator->fails())
                    {
                        $messages = $validator->messages();
                        echo json_encode(array('type'=>'error', 'text'=>$messages));
                    }else{
                      $msg='';
                        $group = array(
                            'name'=>$input['name'],
                              'language_id'=>1,                            
                                'description'=>$input['description']
                            );
                       
                         DB::table('bdtdc_customer_group')->insert($group);
                        $msg .= 'Customer Group Created Successfully !';
                         echo json_encode(array('type'=>'success', 'text'=>$msg));
                        
                    }



    }

    public function store_package(Request $request){
           $input = $request->only(['name', 'description','period','qty']);     
        
         $messages='';             
              
             $validator = Validator::make(
                    array(
                        'name' => $input['name'],
                        'description' => $input['description'],       
                        'listing_period'=>$input['period'],
                        'Product_quantity'=>$input['qty']               
                           
                    ),
                    array(
                        'name' => 'required|min:3|unique:bdtdc_supplier_packages',
                        'description' => 'required|min:8',
                        'listing_period'=>'required|numeric',
                        'Product_quantity'=>'required|numeric'
                        
                    )
                );
              if ($validator->fails())
                    {
                        $messages = $validator->messages();
                        echo json_encode(array('type'=>'error', 'text'=>$messages));
                    }else{
                      $msg='';
                        $pack = array(
                            'name'=>$input['name'],
                            'commission_id'=>0,
                            'product_period'=>$input['period'],
                            'product_quantity'=>$input['qty']

                            );
                       
                        $id = DB::table('bdtdc_supplier_packages')->insertGetId($pack);
                        if($id !=''){
                            $p_desc = array(
                                'supplier_package_id'=>$id,
                                 'name'=>$input['name'],
                                'description'=>$input['description'],
                                'language_id'=>1
                                );
                              DB::table('bdtdc_supplier_package_descriptions')->insert($p_desc);
                            $msg .= 'Package Created Successfully !';

                        }
                        echo json_encode(array('type'=>'success', 'text'=>$msg));
                    }

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

public function create_group(){
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
                return view('protected.admin.myB2B.customer_group_create',$data);

}


public function create_package(){
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
                return view('protected.admin.myB2B.customer_package_create',$data);

}
//public function company_profile($id){
//    $supplier=BdtdcSupplier::with(['supplier_package','supplier_products','package_name','main_products','business_types'])
//    ->where('id',$id)->first();
//    $products=BdtdcSupplierProduct::with(['suppliers','products'])
//    ->where('supplier_id',$id)
//    ->get();
//    //dd($products);
//    return View::make('fontend.supplier.profile',['products'=>$products,'supplier'=>$supplier]);
//}




/* end of class*/
}
