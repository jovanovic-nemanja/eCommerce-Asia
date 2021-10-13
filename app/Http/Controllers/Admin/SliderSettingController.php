<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slider;
use Validator;
use Sentinel;

class SliderSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'DESC')->paginate(20);

        return view('protected.admin.slider.index', compact("sliders"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('protected.admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required|string|min:3|max:255',
            'paragraph' => 'required|max:10000',
            'url' => 'required|string|min:3|max:1000',
            'slider_image' => 'dimensions:width=1920,height=333|max:50000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }

        $attachment_name = '';
        $attachment = $request->slider_image;
        if(isset($attachment)){
            $attachment_name = 'slider_image_'.uniqid().'_'.uniqid().'.'.$attachment->getClientOriginalExtension();
            $attachment->move('slider_image',$attachment_name);
        }


        $arrData = array(
            "status" => 1,
            "heading" => $request->heading,
            "paragraph" => $request->paragraph,
            "url" => $request->url,
            "user_id" => Sentinel::getUser()->id,
            "slider_image" => $attachment_name,
        );

        $slider_id = Slider::insertGetId($arrData);

        return redirect('admin/sliderView/'.$slider_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::find($id);
        if(is_null($slider)){
            return back()->withErrors('No data found');
        }

        return view('protected.admin.slider.view', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        if(is_null($slider)){
            return back()->withErrors('No data found');
        }

        return view('protected.admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slider_id)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required|string|min:3|max:255',
            'paragraph' => 'required|max:10000',
            'url' => 'required|string|min:3|max:1000',
            'slider_image' => 'dimensions:width=1920,height=333|max:50000',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)
                        ->withInput();
        }

        $attachment_name = '';
        $attachment = $request->slider_image;
        if(isset($attachment)){
            $attachment_name = 'slider_image_'.uniqid().'_'.uniqid().'.'.$attachment->getClientOriginalExtension();
            $attachment->move('slider_image',$attachment_name);
        }


        $arrData = array(
            "status" => 1,
            "heading" => $request->heading,
            "paragraph" => $request->paragraph,
            "url" => $request->url,
            "user_id" => Sentinel::getUser()->id,
        );

        Slider::where('id',$slider_id)->update($arrData);

        if(isset($attachment))
            Slider::where('id', $slider_id)->update(['slider_image' => $attachment_name]);

        return redirect('admin/sliderView/'.$slider_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::where('id', $id)->delete();

        return back()->withSuccess('Slider Deleted Successfully');
    }
}
