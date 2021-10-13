<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;
use Validator;
use Mail;
use view;
use App\Model\PasswordReset;
use Jenssegers\Agent\Agent;
use App\Model\User;
class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectPath = "login";
    protected $subject = "Your Password Reset Link for buyerseller.asia";

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function getEmail()
    {
        $page_content_title='Login';
         $agent = new Agent();
        
        $device = $agent->device();
         // return view('mobile-view.bdtdc-home',compact(['countries','business','homepage','most_view','parent_category']),$data);

        if($agent->isPhone())
        {
      

           return view('mobile-view.password.email-m',['page_content_title'=>$page_content_title]);
        }
        if($agent->isDestop())
        {
      
           return view('password.email',['page_content_title'=>$page_content_title]);
        }

        if($agent->isTab())
        {
      
           return view('password.email',['page_content_title'=>$page_content_title]);
        }
        else{
          
            return view('password.email',['page_content_title'=>$page_content_title]);
        }
       
    }
    public function login_success()
    {
        $page_content_title='Login';
        return view('password.success-login',['page_content_title'=>$page_content_title]);
    }
    public function retrive_password()
    {
        $page_content_title='Login';
         $agent = new Agent();
        
        $device = $agent->device();
         // return view('mobile-view.bdtdc-home',compact(['countries','business','homepage','most_view','parent_category']),$data);

        if($agent->isPhone())
        {
      

           return view('mobile-view.password.retrive-password-m',['page_content_title'=>$page_content_title]);
        }
        if($agent->isDestop())
        {
      
            return view('password.retrive-password',['page_content_title'=>$page_content_title]);
        }

        if($agent->isTab())
        {
      
           return view('password.retrive-password',['page_content_title'=>$page_content_title]);
        }
        else{
          
             return view('password.retrive-password',['page_content_title'=>$page_content_title]);
        }
       
    }


    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function postEmails(Request $request)
    {
        echo "success";exit;
        $this->validate($request, ['email' => 'required|email']);
        $user_email=$request->only('email'); 
         

                $data = array
                (
                    'email'=> $user_email['email'],
                ); 
                $rand_key=str_random(10);
                $user_found = User::where('email',$user_email)->first();
        if($user_found){
            $in=PasswordReset::insert(['token'=>$rand_key,'email'=>$user_email['email'], "created_at"=> now()]);

                $response=Mail::send('emails.password-reset', ['rand_key'=>$rand_key], function($message) use ($data) {
                    $message->to($data['email'])
                        ->subject('Please verify your e-mail address to finish your process');
                });
                 $agent = new Agent();
        $device = $agent->device();
       
        if($agent->isPhone())
        {
 
                return view('mobile-view.password.reset-password')->with(['user_email'=>$user_email,'flash_message'=>trans($response)]);
 
        }
        if($agent->isDestop())
        {

                return view('password.retrive-password',['rand_key'=>$rand_key])->with(['user_email'=>$user_email,'flash_message'=>trans($response)]);

        }

        if($agent->isTab())
        {
    
                return view('password.retrive-password',['rand_key'=>$rand_key])->with(['user_email'=>$user_email,'flash_message'=>trans($response)]);

        }
        else{

        return view('password.retrive-password',['rand_key'=>$rand_key])->with(['user_email'=>$user_email,'flash_message'=>trans($response)]);
        
        }
        }
            else{
                return redirect()->back()->withErrors(['email' => trans('User does not exist!' )]);
            }    
        
    }
    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */



    public function postEmail(Request $request)
    {
        // dd($request);
        $this->validate($request, ['email' => 'required|email']);
        $user_email=$request->only('email'); 
         

                $data = array
                (
                    'email'=> $user_email['email'],
                ); 
                $rand_key=str_random(10);
                $user_found = User::where('email',$user_email)->first();
        if($user_found){
            $in=PasswordReset::insert(['token'=>$rand_key,'email'=>$user_email['email'], "created_at"=> now()]);

                $response=Mail::send('emails.password-reset', ['rand_key'=>$rand_key], function($message) use ($data) {
                    $message->to($data['email'])
                        ->subject('Please verify your e-mail address to finish your process');
                });
                 $agent = new Agent();
        $device = $agent->device();
       
        if($agent->isPhone())
        {
 
                return view('mobile-view.password.reset-password')->with(['user_email'=>$user_email,'flash_message'=>trans($response)]);
 
        }
        if($agent->isDestop())
        {

                return view('password.retrive-password',['rand_key'=>$rand_key])->with(['user_email'=>$user_email,'flash_message'=>trans($response)]);

        }

        if($agent->isTab())
        {
    
                return view('password.retrive-password',['rand_key'=>$rand_key])->with(['user_email'=>$user_email,'flash_message'=>trans($response)]);

        }
        else{

        return view('password.retrive-password',['rand_key'=>$rand_key])->with(['user_email'=>$user_email,'flash_message'=>trans($response)]);
        
        }
        }
            else{
                return redirect()->back()->withErrors(['email' => trans('User does not exist!' )]);
            }    
        
    }
    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function getReset(Request $request)
    {
        $token=$request->only('token'); 
        // dd($token);

        if (is_null($token)) {
            throw new NotFoundHttpException;
        }
        $reemail=PasswordReset::where('token',$token)->first(['email']);
        $onTime = PasswordReset::where('token',$token)->first(['created_at']);
        if(!empty($onTime)){
        $time = strtotime($onTime->created_at);
        $time = $time + (15 * 60);
        $additionDate = date("Y-m-d H:i:s", $time);
        // echo $additionDate;
        $currentTime = now();
        // echo "---------------";
        // echo $currentTime;
        }
        // echo $reemail;exit;
        if(empty($reemail)){
            return redirect()->back()->withErrors(['flash_message'=>trans('Incorrect verification code!')]);
        }
        else if(!empty($reemail) && $currentTime < $additionDate)
        {
        $email=$reemail->email;
         }
         else{
            return redirect()->back()->withErrors(['flash_message'=>trans('Password verification code expired!')]);
         } 
         $token=$token['token'];
        // dd($token);
        $page_content_title='Login';
        return view('password.reset',['page_content_title'=>$page_content_title])->with(['token'=> $token,'email'=>$email]);
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postReset(Request $request)
    {

        //dd(12);
        // $this->validate($request, [
        //     'token' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|confirmed',
        // ]);

        // $credentials = $request->only(
        //     'email', 'password', 'password_confirmation', 'token'
        // );
        // dd($credentials);
        $rules=array(
            'password'=>'required|min:6|max:12|confirmed|regex:/^(?=.*[!@#\$%\^&\*\/\()^`.])/',
            'password_confirmation'=>'required|min:6|max:12|regex:/^(?=.*[!@#\$%\^&\*\/\()^`.])/',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
             // $validator->errors()->all();
            return redirect()->back()->withErrors(['password' => trans('At least 6 Character and can not be more than 12 Character.one special Character as [!@#$%^&*/\()^`.]' ),'password_confirmation'=>'Mismatch']);
        }
        else{

           /* $password=$request->input('password');
            $password_confirmation=$request->input('password_confirmation');
            if($password==$password_confirmation){

            }*/

            if($request->has("password")){
            $password = \Hash::make($request->get('password'));
         
            $update_password = [
            'password' => $password,
            ];
            $user=User::where('email',$request->get('email'))->first();
            $user_id=$user->id;
            $r=User::where('id',$user_id)->update($update_password);
            return view('password.success-login')->with(['flash_message'=>trans('Password reset successfully')]);
            }
            else{
                return redirect()->back()->with(['flash_message'=>trans('Password reset unsuccessfully')]);
            }
    }
}

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        //$user->password = bcrypt($password);
        // Sentry hashes password for us
        $user->password = $password;

        $user->save();

        //Auth::login($user);
    }


}
