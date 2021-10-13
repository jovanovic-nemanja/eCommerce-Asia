<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\RegistrationFormRequest;
use App\Model\BdtdcUserregistrationStep;
use App\Model\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Sentinel;
use Validator;
use Input;
use Redirect;
use Mail;
use Flash;
use View;
use Route;
use App\TempUser;
use App\Model\BdtdcSupplierMainProduct;
use App\Model\BdtdcCompany;
use App\Model\BdtdcCompanyDescription;
use App\Model\BdtdcCustomer;
use App\Model\BdtdcSupplier;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;


class RegistrationController extends Controller
{

    /**
     * @var $user
     */
    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('registration.create');
    }
    
    
    public function send_mail($email){

        $email = trim($email);
        $rules = ['email'=>'required|email|max:100'];
        $email_array = ['email'=>$email];
        $validator = Validator::make($email_array, $rules);
        if ($validator->fails())
        {
            return $validator->errors()->all();
        }
        $user_found = User::where('email',$email)->first();
        if($user_found){
            return "User already exists. Please login";
        }
        $rand_key = str_random(30).'-'.strtotime(Carbon::now()->addMinute(24*60)->toString());
        TempUser::create(['rand_key'=>$rand_key, 'email'=>$email]);
        $ww=Mail::send('emails.varified', ['rand_key'=>$rand_key], function($message) {
            $message->to(Route::current()->parameters()['email'])
                ->subject('Please verify your Email address to finish your account registration');
        });
        return 1;
    }
    
     public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->activeted = 1;
        $user->confirmation_code = null;
        $user->save();

        Flash::message('You have successfully verified your account.');

        return Redirect::route('login_path');
    }
    public function templete()
    {
      return View::make('emails.varified');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    // public function store(RegistrationFormRequest $request)
    public function store(Request $request)
    {
        $data = [];
        $rules=array(
            'first_name'=>'required|min:3|max:32',
            'last_name'=>'required|min:3|max:32',
            'email'=>'required|email',
            'password'=>'required|min:6|max:12|confirmed|regex:/^(?=.*[!@#\$%\^&\*\/\()^`.])/',
            'password_confirmation'=>'required|min:6|max:12|regex:/^(?=.*[!@#\$%\^&\*\/\()^`.])/',
        );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            $data[0] = 2;
            $data[1] = $validator->errors()->all();
            return $data;
        }
        
        $input = $request->only('email', 'password', 'first_name', 'last_name','front_end_registration');
        $df=\Hash::make($request->input('password'));
        $user = Sentinel::registerAndActivate($input);

        // dd($user, $df, $input);
        // Find the role using the role name
        // $usersRole = Sentinel::findRoleByName('Suppliers');

            // Assign the role to the users
            // $usersRole->users()->attach($user->id);
        // sendAdminNotification(4, 'New Account Created', $user->id, $user->id);   check this line of code
        // $device = User::find($user->id);
        //         $device->password=$df;
        //         $device->save();
        // dd($device);
        if(empty($request->front_end_registration)){

            $input_arr = ['user_id'=>$user->id,'step_id'=>'#company_information'];

            BdtdcUserregistrationStep::create($input_arr);

            return $user;
        }
        return  redirect('login')->withFlashMessage('User Successfully Created!');
    }


    public function save_company_info(Request $request){

        // return $request->p1;
        BdtdcCompany::where('location_of_reg','')->update(['location_of_reg'=>18]);
        BdtdcCompany::where('location_of_reg',0)->update(['location_of_reg'=>18]);
        $data = [];
        $rules=array(
            'user_id'=>'required|max:999999999',
            'country'=>'required|integer|not_in:0|max:999999',
            'customer_type'=>'required|max:100',
            'company_name'=>'required|max:200|min:5',
            'phone_country'=>'required|integer|max:99999',
            'phone_number'=>'required|max:99999999999',
            'btype'=>'required|integer|max:100|not_in:0',
            'p1'=>'required|max:100',
            'p2'=>'max:100',
            'p3'=>'max:100',
            );

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            $data[0] = 2;
            $data[1] = $validator->errors()->all();
            return $data;
        }
         //dd($request->all());
        $input = $request->only(['user_id','country','customer_type','company_name','phone_country','phone_number','btype','p1','p2','p3']);
        $user_id=$input['user_id'];
        if($user_id) {
            //dd($usersRole);
            $company_id = BdtdcCompany::insertGetId(['user_id'=>$user_id,'location_of_reg'=>$input['country']]);
            $company_info =[
                'company_id'    =>$company_id,
                'name'          => $input['company_name'],
            ];
            // dd($company_id);
            //remove default role
            /*$usersRoleOld = Sentinel::findRoleByName('Suppliers');
            $usersRoleOld->users()->detach($user_id);*/

            $usersRole = Sentinel::findRoleByName($input['customer_type']);
            // Assign the role to the users
            $usersRole->users()->attach($user_id);
            BdtdcCompanyDescription::create($company_info);

            BdtdcSupplierMainProduct::create(['supplier_id'=>$user_id,'product_name_1'=>$request->p1,'product_name_2'=>$request->p2,'product_name_3'=>$request->p3]);
            $insert_date= array(
                'user_id'       => $user_id,
                'telephone'     => $input['phone_country'].'-'.$input['phone_number'],
                'country_id'    => $input['country'],
                'company_id'    => $company_id,
            );

            if($input['customer_type'] == 'Buyers'){
                $insert_date['customer_group_id'] = 2;
                BdtdcCustomer::create($insert_date);
                //return $insert_date;
            }else{
                $insert_date['customer_group_id'] = 1;
                $insert_date_to_supplier['user_id'] = $user_id;
                $insert_date_to_supplier['busines_type_id'] = $input['btype'];
                BdtdcCustomer::create($insert_date);
                BdtdcSupplier::create($insert_date_to_supplier);
                //return $insert_date;
            }

            
            $input_arr = ['user_id'=>$user_id,'step_id'=>'#confirmation'];
            BdtdcUserregistrationStep::create($input_arr);

            $user_email = User::where('id',$user_id)->first();
            if($user_email){
                return $user_email->email;
            }else{
                return 1;
            }
        }
    }

    public function check_user_by_email($email){
        $user = User::where('email',$email)->first();
        if($user != ''){
        return "success";
        }else{
            return 1;
        }
    }
    
    public function veryfication_by_key(Request $request, $key){
        if(Sentinel::getUser()){
            if($request->old_key){
                Sentinel::logout();
                if( isset( $_GET["old_key"] ) && $_GET["old_key"] == "true" ) {
                    header( "Location: $key" );
                    exit;
                }
            // dd($request->all(), $temp_user,"1 ve", $key);

            }else{
                Sentinel::logout();
                return  redirect('login')->withFlashMessage('Please sign in.');
            }
        }
        else{
            $key_object = explode('-', $key);
            // $temp_user = TempUser::where('email', 'vladkaryaviy2@gmail.com')->first();
            // $user = User::where('email', 'vladkaryaviy2@gmail.com')->first();
            // dd($temp_user->delete(), $user->delete());
            if(count($key_object) == 2) {
                $expire_time = intval($key_object[1]);
                $current_time = strtotime(Carbon::now());
                $diff_time = $expire_time - $current_time;
                if($expire_time == 0 || $diff_time < 0) {
                    return redirect('join')->withFlashMessage('Verification link is expired!');
                }
            }else {
                return redirect('join')->withFlashMessage('Please check the verification link is correct!');
            }
            
            $temp_user = TempUser::where('rand_key',$key)->first();
            // $temp_user = TempUser::orderBy('id', 'desc')->first();
            // dd($temp_user, "plpl", $key_object[0]);
            
            if(empty($temp_user->id)){
                return redirect('join')->withFlashMessage('Please check the verification link is correct!');
            }
            // $temp_user = TempUser::orderBy('id', 'desc')->first();
            $user = User::where('email',$temp_user->email)->first();
            // dd($temp_user)
            // dd($temp_user->delete(), $user->delete());
            // dd($temp_user, $user,"plpl");

            $step_location = '';
            if($user){
                $step = BdtdcUserregistrationStep::where('user_id',$user->id)->orderBy('id','desc')->first();
                // dd($user->delete());
                if($step->step_id == '#company_information'){
                    $step_location = $step->step_id;
                }else{
                    return  redirect('login')->withFlashMessage('User already activated! Please sign in.');
                }
            }
            $varified_email = ($temp_user) ? $temp_user->email : "";
            
            $status = ($temp_user) ? "<span class='text-success' style='font-size:15px;font-weight:bold'>Email is verified!!!! Go to next</span>" : "Varification email will be sent to this email.";
            $page_content_title=" ";
            return view('pages.join_user',compact('varified_email','page_content_title','status','step_location','user'));
        }
    }

    public function mobile_store( Request $request)
    {
        // $input = $request->only('first_name', 'last_name', 'company_name', 'email', 'password');
            // dd($input);

        $rules = array(
            'first_name'              => 'required',                       
            'last_name'             => 'required',    
            'company_name'           => 'required',
            'email'           => 'required|email',
            'password'           => 'required'

        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect::back()
                        ->withErrors($validator);
                        
        }else{
            $input = $request->only('first_name', 'last_name', 'email', 'password', 'company_name','country');
            // dd($input);
             $user = Sentinel::registerAndActivate($input);
             // dd($user->id);
             $user_id=$user->id;
             // dd($user_id);
             $company_id = DB::table('bdtdc_companies')->insertGetId(['user_id'=>$user_id,'location_of_reg'=>$input['country']]);
          
            $usersRole = Sentinel::findRoleByName('suppliers');

            // Assign the role to the users
            $usersRole->users()->attach($user_id);

            $data = array
            (
                'name'=>$request['company_name'],
                'company_id'=>$company_id,
                
            ); 
         // dd($data);
            $company_name= DB::table('bdtdc_company_descriptions')->insert($data);
            // dd($company_name);
        $rand_key = str_random(30);
        TempUser::create(['rand_key'=>$rand_key,'email'=>$input['email'],'first_name'=>$input['first_name'],'last_name'=> $input['last_name'],'password'=> $input['password'] ]);
        $email=$input['email'];
        // dd($email);
        $ww=Mail::send('emails.mobile_verify', ['rand_key'=>$rand_key], function($message) use($email) {
            $message->to($email)
                ->subject('Please verify your e-mail address to finish your account registration');
        });

            // return 11;
              return  view('mobile-view.content-view-mobile.success',compact('email'));
            
        }    

         // $input = $request->only('first_name', 'last_name', 'company_name', 'email', 'password');
         // dd($input);
         // return  redirect('/');
    }

    public function veryfication_by_key_mobile($rand_key)
    {
        if(Sentinel::getUser()){
            Sentinel::logout();
            return  redirect('login')->withFlashMessage('Please sign in.');
        }
        else{
            $temp_user = TempUser::where('rand_key',$rand_key)->first();

            return view('emails.mobile_verify',compact('rand_key'));
        }
    }
    
    public function country_suggesion($term){
        $country = DB::table('bdtdc_country as c')
                    ->where('c.name','LIKE','%'.$term.'%')
                    ->get();
        $row_set = [];
        foreach($country as $c){
            $row['value']=$c->name;
            $row['id']=(int)$c->id;
            $row['iso_code_2']=$c->iso_code_2;
    		$row['country_code']=$c->country_code;
    		$row_set[] = $row;
        }
        return $row_set;
    }
}
