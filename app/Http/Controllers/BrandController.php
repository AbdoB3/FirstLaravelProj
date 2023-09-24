<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function allBrand(){
        $Brands=Brand::paginate(5);
       return view('admin.brand.index',compact('Brands'));
    }

    public function addBrand(Request $request){
        $validate=$request->validate([
            'brand_name'=>'required|max:255|unique:brands',
            'brand_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $brand_img= $request->file('brand_img');

        $img_ext=strtolower($brand_img->getClientOriginalExtension());
        $img_name=date('YmdHi').'.'.$img_ext;
        $location='image/brand/';
        $img_last=$location.$img_name;
        $brand_img->move($location,$img_name);

        Brand::create([
            'brand_name'=>$request->brand_name,
            'brand_img'=>$img_last
        ]);
        notify()->success('Brand inserted successful !');

        return redirect()->back();
    }

    public function editbrand($id){
        $brands=Brand::find($id);
       return view('admin.brand.edite',compact('brands'));
    }

    public function update(Request $request,$id){
        $brand_img= $request->file('brand_img');
        if($brand_img){
            $img_ext=strtolower($brand_img->getClientOriginalExtension());
        $img_name=date('YmdHi').'.'.$img_ext;
        $location='image/brand/';
        $img_last=$location.$img_name;
        $brand_img->move($location,$img_name);
        $brands=Brand::find($id);
            $brands->update([
             'brand_name'=>$request->brand_name,
             'brand_img'=>$img_last
            ]);
            notify()->success('Brand updated successful !');
            return redirect()->back()->with('success','Brand inserted successful');

        }else{
            $brands=Brand::find($id);
            $brands->update([
             'brand_name'=>$request->brand_name,
            ]);
            notify()->success('Brand updated successful !');

            return redirect()->back();
        }
        
    }

    public function restore($id){

        $Brand = Brand::find($id)->delete();

        notify()->success('Brand deleted successful !');
        return redirect()->back();
    
    }

}
