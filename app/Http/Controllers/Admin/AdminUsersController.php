<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\AdminUsersEditFormRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Sentinel;
use App\Model\BdtdcCountry;
use DB;
use Input;
use App\Model\User;
use App\Model\Role_user;
use App\Model\BdtdcCompany;
use App\Model\BdtdcCompanyDescription;
use App\Model\BdtdcNotification;
use App\Model\BdtdcCategory;
use App\Model\BdtdcBusinesType;
use App\Model\BdtdcSupplier;
use App\Model\BdtdcCustomer;
class AdminUsersController extends Controller
{
    /**
     * @var $user
     */
    protected $user;


    public function __construct(UserRepositoryInterface $user)
    {
        ini_set('memory_limit', '9999999M');
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request, $sear=null)
    {
        //Notification Mark as read
        BdtdcNotification::where('notification_type', 4)->where('admin_read_at', NULL)->update(['admin_read_at' => date('Y-m-d H:i:s')]);
        //End Notification
        $c = $request->input('c');
        $t = $request->input('t');
        $bt = $request->input('bt');
        $cn = $request->input('cn');
        $co = $request->input('co');
        $e = $request->input('e');

        $user_query = User::query();

        if($c && $c != 0){
            $user_query->whereHas('companies',function($qq) use($c,$co){
                $qq->where('location_of_reg',$c);
            });
        }
        
        if($co && trim($co) != ''){
            $user_query->whereHas('companies',function($qq) use($c,$co){
                $qq->whereHas('name_string',function($qu) use($co){
                    $qu->where('name', 'like',  '%' . $co .'%');
                });
            });
        }

        if($t && $t != 0){
            $user_query->whereHas('Role_user',function($qq) use($t){
                $qq->where('role_id',$t);
            });
        }
        if($bt && $bt != 0){
            $user_query->whereHas('suppliers',function($qq) use($bt){
                $qq->where('busines_type_id',  $bt);
            });
        }

        if($cn && trim($cn) != ''){
            $user_query->whereHas('companies',function($qq) use($c,$cn){
                $qq->whereHas('company_product_to_category',function($qu) use($cn){
                    $qu->where('parent_id',  $cn );
                });
            });
        }

        if($e && trim($e) != ''){
            $user_query->where('email', 'like',  '%' . $e .'%');
        }
        
        $users = $user_query->with('companies','companies.name_string','customers','suppliers','suppliers.business_types')->whereNotIn('role',['admin'])->where('status_delete', '!=' , 1)->orderBy('created_at','desc')->paginate(15);

        $company=BdtdcCompanyDescription::with('bdtdcCompany')->take(10)->get();
        $admin = Sentinel::findRoleByName('Admins');
        $supplier = Sentinel::findRoleByName('Suppliers');
        $data['country']=BdtdcCountry::whereNotIn('region_id',[1])->get();

        $data['total_u']=count($users);
        $data['business_type']=BdtdcBusinesType::get();
        $data['category']=BdtdcCategory::where('parent_id',0)->get();

        return view('protected.admin.list_users',$data,['supplier'=>$supplier,'company'=>$company,'country_search'=>$c,'type'=>$t,'business_type_id'=>$bt,'category_name'=>$cn,'company_search'=>$co,'email_search'=>$e])->withUsers($users->appends(Input::except('page')))->withAdmin($admin);
    }
    public function getSearch(Request $request)
    {
        $input = $request->only('company', 'email');
        if($request->input('company'))
        {
            $coms=$request->input('company');
            $users_arry=User::query();
            $users_arry->whereHas('companies',function($qq) use($coms){
                $qq->whereHas('name_string',function($qu) use($coms){
                    $qu->where('name', 'like',  '%' . $coms .'%');
                });
            });

            $users=$users_arry->orderBy('created_at','desc')
                        ->paginate(15);
        }
        else if($request->input('email'))
        {
            $coms=$request->input('email');
            $users_arry=User::query();
            $users=$users_arry->where('email', 'like',  '%' . $coms .'%')->orderBy('created_at','desc')
            ->paginate(15);
        }
        else{
            $users=User::with('companies','customers')->orderBy('created_at','desc')
            ->paginate(15);
        }
         $company=BdtdcCompanyDescription::with('bdtdcCompany')->take(10)->get();
        //dd($users->companies);
        $admin = Sentinel::findRoleByName('Admins');
        $supplier = Sentinel::findRoleByName('Suppliers');
        $data['country']=BdtdcCountry::whereNotIn('region_id',[1])->get();

        return view('protected.admin.list_users',$data,['supplier'=>$supplier,'company'=>$company])->withUsers($users)->withAdmin($admin);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */

    public function show($id)
    {
        $user = $this->user->find($id);
        $user_details = User::with('customers','companies')->where('id',$user->id)->first();
        // dd($user->roles);
        if($user->roles){
            if($user->roles->first()){
                $user_role = $user->roles->first()->name;
            }else{
                $user_role = 'Not Avaliable';
            }
            // dd($user_role);
        }else{
            $user_role = 'Not Avaliable';
        }
        

        return view('protected.admin.show_user',compact('user_details','user_role'))->withUser($user)->withUserRole($user_role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
       
        $user = $this->user->find($id);

        $roles = Sentinel::getRoleRepository()->all();
        $roles_value = Sentinel::getRoleRepository()->all();
        $user_role = 'not available';
        if($user->roles){
            if($user->roles->first()){
                $user_role = $user->roles->first()->name;
            }else{
                $user_role = 'Not Avaliable';
            }
            // dd($user_role);
        }else{
            $user_role = 'Not Avaliable';
        }
        $array_roles = [];

        foreach ($roles as $role) {
            $array_roles = array_add($array_roles, $role->id, $role->name);
        }
        // dd($user);
        return view('protected.admin.edit_user', ['user' => $user, 'roles' => $array_roles, 'user_role' =>$user_role,'roles_value' => $roles_value]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $id=$request->id;

        $user = User::find($id);
        //  dd($request->input('account_type'));
        if (!$request->has("password")) {
            $input = $request->only('email', 'first_name', 'last_name');

            $user->fill($input)->save();

             $ur=Role_user::where('user_id', $id)
            ->update(['role_id' => $request->input('account_type')]);

            return redirect()->back()->withFlashMessage('User has been updated successfully!');

        } else {
            
            $input = $request->only('email', 'first_name', 'last_name', 'password');

            $user->fill($input);
            if($request->password!=''){
                 $user->password = bcrypt($request->password);
            }else{
                $user->password = bcrypt($user->password);

            }
            $user->save();

            $ur=Role_user::where('user_id', $id)
            ->update(['role_id' => $request->input('account_type')]);
            // ->update(['role_id' => $request->input('account_type')]);
            

            return redirect()->back()->withFlashMessage('User (and password) has been updated successfully!');
        }
    }
    public function deactive($id){
            $user = $this->user->find($id);
            $indc=BdtdcCompany::where('user_id',$id)
                            ->update([  
                                'is_active'=>0 
                                 ]);

            $ind=User::where('id',$id)
                            ->update([
                                
                                'activated'=>0 
                 
                                 ]);
            return redirect()->to('admin/profiles')->withFlashMessage('User Deactivation has been updated successfully!');
    }

     public function active($id){

            $user =$this->user->find($id);
            $indc=BdtdcCompany::where('user_id',$id)
                            ->update([
                                
                                'is_active'=>1 
                 
                                 ]);
            $ind=User::where('id',$id)
                            ->update([                              
                                'activated'=>1                
                                 ]);

            return redirect()->to('admin/profiles')->withFlashMessage('User Deactivation has been updated successfully!');

    }
    //Delete the user details
    //change the status only to remove from the list
    public function deletuser($id){
        User::where('id',$id)->update(['status_delete'=>1]);
        return redirect()->to('admin/profiles')->withFlashMessage('User has been deleted successfully!');      
    }
    //List the Archieve user
    public function listarchiveuser(Request $request){
       //Notification Mark as read
       BdtdcNotification::where('notification_type', 4)->where('admin_read_at', NULL)->update(['admin_read_at' => date('Y-m-d H:i:s')]);
       //End Notification
       $c = $request->input('c');
       $t = $request->input('t');
       $bt = $request->input('bt');
       $cn = $request->input('cn');
       $co = $request->input('co');
       $e = $request->input('e');

       $user_query = User::query();

       if($c && $c != 0){
           $user_query->whereHas('companies',function($qq) use($c,$co){
               $qq->where('location_of_reg',$c);
           });
       }
       
       if($co && trim($co) != ''){
           $user_query->whereHas('companies',function($qq) use($c,$co){
               $qq->whereHas('name_string',function($qu) use($co){
                   $qu->where('name', 'like',  '%' . $co .'%');
               });
           });
       }

       if($t && $t != 0){
           $user_query->whereHas('Role_user',function($qq) use($t){
               $qq->where('role_id',$t);
           });
       }
       if($bt && $bt != 0){
           $user_query->whereHas('suppliers',function($qq) use($bt){
               $qq->where('busines_type_id',  $bt);
           });
       }

       if($cn && trim($cn) != ''){
           $user_query->whereHas('companies',function($qq) use($c,$cn){
               $qq->whereHas('company_product_to_category',function($qu) use($cn){
                   $qu->where('parent_id',  $cn );
               });
           });
       }

       if($e && trim($e) != ''){
           $user_query->where('email', 'like',  '%' . $e .'%');
       }
       
       $users = $user_query->with('companies','companies.name_string','customers','suppliers','suppliers.business_types')->whereNotIn('role',['admin'])->where('status_delete',1)->orderBy('created_at','desc')->paginate(15);

       $company=BdtdcCompanyDescription::with('bdtdcCompany')->take(10)->get();
       $admin = Sentinel::findRoleByName('Admins');
       $supplier = Sentinel::findRoleByName('Suppliers');
       $data['country']=BdtdcCountry::whereNotIn('region_id',[1])->get();

       $data['total_u']=count($users);
       $data['business_type']=BdtdcBusinesType::get();
       $data['category']=BdtdcCategory::where('parent_id',0)->get();

       return view('protected.admin.list_archieveusers',$data,['supplier'=>$supplier,'company'=>$company,'country_search'=>$c,'type'=>$t,'business_type_id'=>$bt,'category_name'=>$cn,'company_search'=>$co,'email_search'=>$e])->withUsers($users->appends(Input::except('page')))->withAdmin($admin);
    }
    //Approve the user details
    //change the status only to remove from the list
    public function approveuser($id){
        User::where('id',$id)->update(['status_delete'=>0]);
        return redirect()->to('admin/profiles/listarchiveuser')->withFlashMessage('User has been deleted successfully!');      
    }
    //Approve the user details
    //change the status only to remove from the list
    public function permanentdeleteuser($id){
        User::where('id',$id)->delete();
        BdtdcCompany::where('user_id',$id)->delete();
        BdtdcCustomer::where('user_id',$id)->delete();
        BdtdcSupplier::where('user_id',$id)->delete();

        return redirect()->to('admin/profiles/listarchiveuser')->withFlashMessage('User has been deleted successfully!');      
    }

}