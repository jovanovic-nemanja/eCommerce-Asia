<?php
namespace App\Http\Controllers\SupplierUser;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Model\BdtdcCategory;
use App\Model\BdtdcProduct;
use DB;
use Input;
use View;
use Sentinel;
use Redirect;
use App\Model\BdtdcProductToCategory;
use App\Model\BdtdcSupplier;
use App\Model\BdtdcCompany;
use App\Model\BdtdcSupplierProductGroups;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function product_manage_roup()
    {
      if(Sentinel::check())
        {
            $user_id =Sentinel::getUser()->id;
            $product=DB::table('bdtdc_product')->get();
            $company=BdtdcCompany::where('user_id',$user_id)->first(['id']);
            $company_id=$company->id;
            // dd($company_id);
            $supplier=DB::table('bdtdc_supplier_product_groups')->get();
            // dd($supplier);
            $supplier_group=BdtdcSupplierProductGroups::with('BdtdcSupplierProductGroups','company_group')
                            ->where('company_id',$company_id)
                            ->get();
             $group=BdtdcSupplierProductGroups::where('company_id',$company_id)->get();
             // dd($group);
            // dd($supplier_group->company_group->name_string->name);
            // return $supplier_group->BdtdcSupplierProductGroups->product_groups;
            // dd($supplier_group);
            $count = BdtdcSupplierProductGroups::where('company_id', $company_id)->count();
            //dd($count);

            return view::make('manage_group.product-manage-roup',compact('supplier_group','group','count'));
            }
            else
            {
              return redirect()->route('login')->withFlashMessage('You must first login or register before accessing this page.');
        }
    }

    public function product_manage_roup_insert(Request $request)
    {
      /***insert query***/
        if(Sentinel::getUser()){
      }else{
        return redirect()->route('login')->withFlashMessage('You must first login or register before accessing this page.');
      }
     
      $rules = array(
            'name'              => 'required',                       
            'image'             => 'required'         
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('product/manage_product_group')
                        ->withErrors($validator);
                        
        }else{
         


      // return $request->all();
      $input = $request->only(['name','image','company_id']);
      $user_id =Sentinel::getUser()->id;
      $company=BdtdcCompany::where('user_id',$user_id)->first(['id']);
      $company_id=$company->id;
        // dd($company_id);

      $image = $request->file('image');
              if($image){
              $destinationPath = 'banner-images';
                  $image_name = 'banner-images_'.uniqid().'_'.$image->getClientOriginalName();
                  $image->move($destinationPath,$image_name);
              }else{
                  $image_name = '';
              }
              // dd($image);
        $insert_data=array();
        $insert_data = array
        (
            'name'=>$input['name'], 
            'image'=>$image_name,
            'company_id'=>$company_id,
        );
        // dd($insert_data);
        $group= DB::table('bdtdc_supplier_product_groups')->insert($insert_data);
        // dd($group);
        /***insert query***/
        // counting

        return Redirect::back();
      }
       
        // return view::make('contents_view.product-manage-roup',compact('gr'));
    }

    public function edit_group($id)
    {
        $user_id =Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first(['id']);
        $company_id=$company->id;
        $group=BdtdcSupplierProductGroups::where('company_id',$company_id)->get();

        $edit_group = BdtdcSupplierProductGroups::where('id', $id)->first();
        $count = BdtdcSupplierProductGroups::where('company_id', $company_id)->count();
        return view('manage_group.edit-group',compact('edit_group','group','count'));
    }

    public function update_group(Request $request,$id)
    {
        /*$rules = array(
            'name'              => 'required',                       
            'image'             => 'required'         
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('product/manage_product_group')
                        ->withErrors($validator);
                        
        }else{*/

        $user_id =Sentinel::getUser()->id;
      $company=BdtdcCompany::where('user_id',$user_id)->first(['id']);
      $company_id=$company->id;
        $old_group = BdtdcSupplierProductGroups::where('id',$id)->where('company_id',$company_id)->first();
        // dd($request->all());
        if($old_group){
            // $update = BdtdcSupplierProductGroups::all();
          // $update = BdtdcSupplierProductGroups::findOrFail($id);

          $image = $request->file('image');
          if($image){
          $destinationPath = 'banner-images';
              $image_name = 'banner-images_'.uniqid().'_'.$image->getClientOriginalName();
              $image->move($destinationPath,$image_name);
            // $image = $request->file('image');
          }



        if($image){

          if($old_group->image != ''){
            if(file_exists('banner-images/'.$old_group->image)){
                @unlink('banner-images/'.$old_group->image);
            }}
            $update_data = array
            (
                'name' => $request->name,
                'image' => $image_name,
                'show_banner' => $request->show_image?1:0,
                'sort' => $request->sort,
                'active' => $request->active_group?1:0,
            );
          }
          else{
            $update_data = array
            (
                'name' => $request->name,
                'show_banner' => $request->show_image?1:0,
                'sort' => $request->sort,
                'active' => $request->active_group?1:0,
            );
          }
            // dd($update_data);
            DB::table('bdtdc_supplier_product_groups')->where('id', $old_group->id)->update($update_data);
            
            return Redirect::to('product/manage_product_group');
        }else{
            return Redirect::to('product/manage_product_group')->with("Permision Denied.");
        }
      /*}*/
    }

    public function delete_group($id)
    {
        $user_id =Sentinel::getUser()->id;
        $company=BdtdcCompany::where('user_id',$user_id)->first(['id']);
        $company_id=$company->id;
        $old_group = BdtdcSupplierProductGroups::where('id',$id)->where('company_id',$company_id)->first();
        if($old_group){
            $make_inactive=BdtdcSupplierProductGroups::where('company_id',$company_id)->where('id',$id)->update(['active'=>0]);
            if($make_inactive){
                return Redirect::to('product/manage_product_group');
            }else{
                return Redirect::to('product/manage_product_group')->with("Unkonwn Error Occured.");
            }
            return Redirect::to('product/manage_product_group');
        }else{
            return Redirect::to('product/manage_product_group')->with("Permision Denied.");
        }
    }


    public function getHome()
    {
        $user = Sentinel::getUser();
        $id=$user->id;
        dd($id);
    }
    public function index($id)
    {
        //
        $supplier=BdtdcSupplier::with(['supplier_package','supplier_products','package_name','main_products','business_types'])
                          ->where('id',$id)->first();
        return View::make('fontend.supplier.dashboard',['supplier'=>$supplier]);
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
    
}
