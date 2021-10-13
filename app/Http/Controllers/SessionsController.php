<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Session;
use Sentinel;
use Redirect;
use URL;
use DB;
use Validator;
use view;
use Mail;
use Route;
use Input;
use App\TempUser;
use App\Model\User;
use App\Model\BdtdcSubscription;
use App\Model\BdtdcPageSeo;
use App\Model\BdtdcUserregistrationStep;
use App\Model\Role_user;
use GeoIP;
use Jenssegers\Agent\Agent;

class SessionsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    
    public function create($return_url=null)
    {
        if(Sentinel::check()){
            return redirect('/');
        }
     
        $header=BdtdcPageSeo::where('page_id',147)->first();
        $data['title']=$header->title;
        $data['keyword']=$header->meta_keyword;
        $data['description']=$header->meta_description;
        //dd($return_url);
        // return view('mobile-view.admin-panel.user-login',$data);
        if($return_url==null){
        $page_content_title='Login';

        $agent = new Agent();
        $device = $agent->device();

          //return View::make('mobile-view.admin-panel.login',$data,['page_content_title'=>$page_content_title]);
            if($agent->isPhone())
        {
            return View::make('mobile-view.admin-panel.login',$data,['page_content_title'=>$page_content_title]);
           
        }
        if($agent->isDestop())
        {
//            echo $page_content_title;
        return view('sessions.create',$data,['page_content_title'=>$page_content_title]);
        }

        if($agent->isTab())
        {
               return view('sessions.create',$data,['page_content_title'=>$page_content_title]);
        }
        else{
            return view('sessions.create',$data,['page_content_title'=>$page_content_title]);
        }

    }
         else{
                $page_content_title='Login';
                return view('sessions.create',$data,['page_content_title'=>$page_content_title,'return_url'=>$return_url]);
    }
       
}

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
       
        $input = $request->only('email', 'password');
         
        // dd(123);
        //dd($return_url);
        try {
            
            if (Sentinel::authenticate($input, $request->has('remember'))) {

                $user = Sentinel::getUser();
                $user_id = $user->id;
                User::where('id',$user_id)->update(['active'=>1]);
                User::where('id',$user_id)->update(['vacation_mode'=>1]);
                $role = Role_user::where('user_id',$user_id)->first();
                if(!$role){
                    $temp_user = TempUser::where('email',$user->email)->orderBy('id','desc')->first();
                    if($temp_user){
                        return Redirect::to(URL::to('email/verification_by_key/'.$temp_user->rand_key.'?old_key=true'));
                        return Redirect::to('email/verification_by_key/'.$temp_user->rand_key.'?old_key=true');
                        // return redirect('email/verification_by_key/'.$temp_user->rand_key.'?old_key=true');
                    }else{
                        return redirect('join');
                    }
                }
                //dd($input);
                $this->redirectWhenLoggedIn();
            }

            return redirect()->back()->withInput()->withErrorMessage('Invalid credentials provided');

        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
            return redirect()->back()->withInput()->withErrorMessage('User Not');
        } catch (\Cartalyst\Sentinel\Checkpoints\ThrottlingException $e) {
            return redirect()->back()->withInput()->withErrorMessage($e->getMessage());
        }


    }

    public function ServiceLogin(Request $r)
    {

        $page_content_title='Login';
        $return_url = $r->continue;
        $agent = new Agent();
        $device = $agent->device();
        if($agent->isPhone())
        {
           return view('mobile-view.admin-panel.user-login-redirect',['page_content_title'=>$page_content_title,'return_url'=>$return_url]);
        }
        if($agent->isDestop())
        {
           return view('sessions.ServiceLogin',['page_content_title'=>$page_content_title,'return_url'=>$return_url]);
        }

        if($agent->isTab())
        {
           return view('sessions.ServiceLogin',['page_content_title'=>$page_content_title,'return_url'=>$return_url]);
        }
        else{
          
           return view('sessions.ServiceLogin',['page_content_title'=>$page_content_title,'return_url'=>$return_url]);
        }
        // return view('sessions.ServiceLogin',['page_content_title'=>$page_content_title,'return_url'=>$return_url]);
    }

    public function ServiceStore(LoginFormRequest $request)
    {
        $input = $request->only('email', 'password','continue');
        // return redirect($request->continue);
        // dd($input);

        //dd($return_url);
        try {

            if (Sentinel::authenticate($input, $request->has('remember'))) {
                $user_id = Sentinel::getUser()->id;
                User::where('id',$user_id)->update(['active'=>1]);
                User::where('id',$user_id)->update(['vacation_mode'=>1]);
                return redirect($request->continue);
            }

            return redirect()->back()->withInput()->withErrorMessage('Invalid credentials provided');

        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
            return redirect()->back()->withInput()->withErrorMessage('User Not 9.');
        } catch (\Cartalyst\Sentinel\Checkpoints\ThrottlingException $e) {
            return redirect()->back()->withInput()->withErrorMessage($e->getMessage());
        }


    }

    protected function redirectWhenLoggedIn($return_url=null)
    {
        $rr=preg_replace('/[^A-Za-z0-9\. -]/', '/',$return_url);
        //dd($rr);
        // Logged in successfully - redirect based on type of user
        $user = Sentinel::getUser();
        $id=$user->id;
        $admin = Sentinel::findRoleByName('Admins');
        $users = Sentinel::findRoleByName('Users');
        $suppliers=Sentinel::findRoleByName('Suppliers');
        $buyers=Sentinel::findRoleByName('Buyers');
        // dd($user->inRole($buyers));
        if ($user->inRole($admin)) {
           redirect()->intended('admin');
        }
         elseif ($user->inRole($users)) {
           return  redirect()->route('home');
        }
        elseif ($user->inRole($suppliers)) {
            return  redirect()->route('home');

        }
        elseif ($user->inRole($buyers)) {
            return  redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id=null)
    {
        if(Sentinel::getUser()){
           User::where('id',Sentinel::getUser()->id)->update(['vacation_mode'=>0]);
        }
        Sentinel::logout();
        return redirect()->route('home');
    }

    public function userLogin()
    {
        return 123;
    }

     public function changeEmail()
    {
        $page_content_title='Login';
        // $user_id = Sentinel::getUser()->id;
        //dd($user_id);
        // $user=DB::table('users')->where('id',$user_id)->first();
        $sub=BdtdcSubscription::all();
        //dd($sub);
        return view('password.changeemail',compact('page_content_title'));
    }

    public function postchangeEmail(Request $request)
    {

        $rules = array(
        'email'=>'required', 
        );

         $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
            {
                return redirect::back()->withError($validator);
             
            }
            else
            {
                $email=$request->only('email');

                $data=array();
                $data = array
                (
                    'email'=> $email['email'],
                ); 
               
                $rand_key=str_random(10);
                
                $check = BdtdcSubscription::where('email', $email)->first();
                
                if(!empty($check)|| $check != null){
                    $in=BdtdcSubscription::where('email', $email['email'])->update(['token'=>$rand_key,'email'=>$email['email']]);
                }else{
                    $in=BdtdcSubscription::insert(['token'=>$rand_key,'email'=>$email['email']]);
                }

                $www=Mail::send('emails.change', ['rand_key'=>$rand_key], function($message) use ($data) {
                    $message->to($data['email'])
                        ->subject('Please verify your e-mail address to finish your process');
                });
                session()->forget('errormsg');
                session()->flash('successmsg', 'Verification Code sent.!');
                //return redirect::back();
            }
            
            return view('password.changeemail',compact('page_content_title','email'));


    }



    public function verification_by_key(Request $request){
        //return $key;

        // $input = $request->only(['email', 'token']);
        // dd($input);

       $key=Input::get('token');
       //dd($key);
       // $email=Input::get('email');
       //dd($email);
            $subscription = BdtdcSubscription::where('token',$key)->first();
            
           //dd($subscription);
            // if(DB::table('subscriptions')->where('token',$key)->update(['is_active'=>1]))
            //     {
            //         return 1;
            //     }else{
            //         return 0;
            //     }

           if($subscription)
           {
            DB::table('subscriptions')
            ->where('token', $key)
            ->update(['is_active'=>1]);
            //return redirect::back();
            return view('password.complete-change-mail');
            //return 'updated';
           }
           else
           {    session()->forget('successmsg');
                session()->flash('errormsg', 'Your verification code is Incorrect!  Please enter the correct code.');
            return view('password.changeemail');
           }
        }

    public function completechangeEmail()
    {
        return view('password.complete-change-mail');
    }



}
