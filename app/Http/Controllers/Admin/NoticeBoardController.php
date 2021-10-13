<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Role;
use App\Model\Notice;
use App\Model\NoticeDetails;
use Validator;
use Sentinel;

class NoticeBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::orderBy('id', 'DESC')->paginate(20);

        return view('protected.admin.notice.index', compact("notices"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $users = User::where('first_name', '<>', '')->orderBy('first_name')->get();

        return view('protected.admin.notice.create', compact("users", "roles"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!isset($request->notice_type)){
            return back()->withErrors('You must select notice type.');
        }
        if($request->notice_type == 2){
            $validator = Validator::make($request->all(), [
                'notice_type' => 'required|integer',
                'user_role_id.*' => 'required|integer',
                'title' => 'required|string|min:3|max:255',
                'details' => 'required|max:10000',
                'attachment' => 'max:50000',
            ]);
        }elseif($request->notice_type == 3){
            $validator = Validator::make($request->all(), [
                'notice_type' => 'required|integer',
                'user_id.*' => 'required|integer',
                'title' => 'required|string|min:3|max:255',
                'details' => 'required|max:10000',
                'attachment' => 'max:50000',
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'notice_type' => 'required|integer',
                'title' => 'required|string|min:3|max:255',
                'details' => 'required|max:10000',
                'attachment' => 'max:50000',
            ]);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }

        $attachment_name = '';
        $attachment = $request->attachment;
        if(isset($attachment)){
            $attachment_name = 'notice_docs_'.uniqid().'_'.uniqid().'.'.$attachment->getClientOriginalExtension();
            $attachment->move('notice_docs',$attachment_name);
        }


        $arrData = array(
            "notice_type" => $request->notice_type,
            "title" => $request->title,
            "details" => $request->details,
            "user_id" => Sentinel::getUser()->id,
            "attachment" => $attachment_name,
        );

        $notice_id = Notice::insertGetId($arrData);

        $user_ids = $request->user_id;
        $user_role_ids = $request->user_role_id;

        $arrData = array();
        if($request->notice_type == 2){
            foreach ($user_role_ids as $key => $value) {
                $arrData[] = array(
                    "notice_id" => $notice_id,
                    "user_role_id" => $user_role_ids[$key],
                );
            }
            NoticeDetails::insert($arrData);
        }elseif($request->notice_type == 3){
            foreach ($user_ids as $key => $value) {
                $arrData[] = array(
                    "notice_id" => $notice_id,
                    "user_id" => $user_ids[$key],
                );
            }
            NoticeDetails::insert($arrData);
        }

        return redirect('admin/noticeView/'.$notice_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notice = Notice::with(['notice_details', 'notice_details.get_user_info', 'notice_details.get_user_role_info'])->find($id);
        if(is_null($notice)){
            return back()->withErrors('No data found');
        }

        return view('protected.admin.notice.view', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notice = Notice::with(['notice_details', 'notice_details.get_user_info', 'notice_details.get_user_role_info'])->find($id);
        if(is_null($notice)){
            return back()->withErrors('No data found');
        }

        $roles = Role::get();
        $users = User::where('first_name', '<>', '')->orderBy('first_name')->get();

        return view('protected.admin.notice.edit', compact('notice', "users", "roles"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $notice_id)
    {
        if(!isset($request->notice_type)){
            return back()->withErrors('You must select notice type.');
        }
        if($request->notice_type == 2){
            $validator = Validator::make($request->all(), [
                'notice_type' => 'required|integer',
                'user_role_id.*' => 'required|integer',
                'title' => 'required|string|min:3|max:255',
                'details' => 'required|max:10000',
                'attachment' => 'max:50000',
            ]);
        }elseif($request->notice_type == 3){
            $validator = Validator::make($request->all(), [
                'notice_type' => 'required|integer',
                'user_id.*' => 'required|integer',
                'title' => 'required|string|min:3|max:255',
                'details' => 'required|max:10000',
                'attachment' => 'max:50000',
            ]);
        }else{
            $validator = Validator::make($request->all(), [
                'notice_type' => 'required|integer',
                'title' => 'required|string|min:3|max:255',
                'details' => 'required|max:10000',
                'attachment' => 'max:50000',
            ]);
        }

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }

        $attachment_name = '';
        $attachment = $request->attachment;
        if(isset($attachment)){
            $attachment_name = 'notice_docs_'.uniqid().'_'.uniqid().'.'.$attachment->getClientOriginalExtension();
            $attachment->move('notice_docs',$attachment_name);
        }


        $arrData = array(
            "notice_type" => $request->notice_type,
            "title" => $request->title,
            "details" => $request->details,
            "user_id" => Sentinel::getUser()->id,
            // "attachment" => $attachment_name,
        );

        Notice::where('id',$notice_id)->update($arrData);

        if(isset($attachment))
            $notice_id = Notice::where('id', $notice_id)->update(['attachment' => $attachment_name]);

        NoticeDetails::where('notice_id', $notice_id)->delete();

        $user_ids = $request->user_id;
        $user_role_ids = $request->user_role_id;

        $arrData = array();
        if($request->notice_type == 2){
            foreach ($user_role_ids as $key => $value) {
                $arrData[] = array(
                    "notice_id" => $notice_id,
                    "user_role_id" => $user_role_ids[$key],
                );
            }
            NoticeDetails::insert($arrData);
        }elseif($request->notice_type == 3){
            foreach ($user_ids as $key => $value) {
                $arrData[] = array(
                    "notice_id" => $notice_id,
                    "user_id" => $user_ids[$key],
                );
            }
            NoticeDetails::insert($arrData);
        }

        return redirect('admin/noticeView/'.$notice_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notice::where('id', $id)->delete();
        NoticeDetails::where('notice_id', $id)->delete();

        return back()->withSuccess('Notice Deleted Successfully');
    }
}
