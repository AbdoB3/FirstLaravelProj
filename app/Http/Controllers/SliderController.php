<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Image;

class SliderController extends Controller
{

    public function allSliders(){
        $Sliders=Slider::paginate(5);
        return view('admin.slider.index',compact('Sliders'));
    }
    public function addSlider(Request $request){
        $request->validate([
            'slider_title'=>'required|min:3',
            'slider_desc'=>'required|min:10',
            'slider_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider_img= $request->file('slider_img');

        /*
        $img_ext=strtolower($slider_img->getClientOriginalExtension());
        $img_name=date('YmdHi').'.'.$img_ext;
        $location='image/slider/';
        $img_last=$location.$img_name;
        $slider_img->move($location,$img_name);
        */
        $nameg_gen=$slider_img->getClientOriginalExtension();
        Image::make($slider_img)->resize(300,200)->save('image/slider/'.$nameg_gen);

        $last_img='image/slider/'.$nameg_gen;

        Slider::create([
            'slider_title'=>$request->slider_title,
            'slider_desc'=>$request->slider_desc,
            'slider_img'=>$last_img
        ]);
        notify()->success('Slider added successful!');
        //dd('Reached the redirect');
        return Redirect()->route('slider.list');
    }



    public function editslider($id){
        $sliders=Slider::find($id);
       return view('admin.slider.edite',compact('sliders'));
    }

    public function add(){
        return view('admin.slider.create');
    }
    public function update(Request $request,$id){

        $slider_img= $request->file('slider_img');
        if($slider_img){

        $img_ext=strtolower($slider_img->getClientOriginalExtension());
        $img_name=date('YmdHi').'.'.$img_ext;
        $location='image/slider/';
        $img_last=$location.$img_name;
        $slider_img->move($location,$img_name);


        Slider::find($id)->update([
            'slider_title'=>$request->slider_title,
            'slider_desc'=>$request->slider_desc,
            'slider_img'=>$img_last
        ]);
        notify()->success('Brand inserted successful !');
    
            return redirect()->back();

        }else{
            $brands=Slider::find($id);
            $brands->update([
                'slider_title'=>$request->slider_title,
                'slider_desc'=>$request->slider_desc,
            ]);
        notify()->success('Brand inserted successful !');
            return redirect()->back();
        }
        
    }

    public function restore($id){

        $Slider = Slider::find($id)->delete();
        notify()->success('Slider deleted succesful!');
    
        return redirect()->back();
    
    }
        
}
