<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function list(){
        $abouts=About::paginate(5);
        return view('admin.About.index',compact('abouts'));
    }
    public function add(){
        return view('admin.About.create');
    }
    public function store(Request $request){
        About::create([
            'title'=>$request->title,
            'short_desc'=>$request->short_desc,
            'long_desc'=>$request->long_desc,
        ]);
        notify()->success('About info inserted successful !');
        redirect()->back();
    }

    public function edit($id){
        $abouts=About::find($id);
        return view('admin.About.edit',compact('abouts'));
    }

    public function update(Request $request,$id){
        About::find($id)->update([
            'title'=>$request->title,
            'short_desc'=>$request->short_desc,
            'long_desc'=>$request->long_desc,
        ]); 

        notify()->success('About info updated successful !');
       return redirect()->back();
    }

    public function restore($id){

        $Brand = About::find($id)->delete();
    
        notify()->success('About info deleted successful !');
        return redirect()->back();
    
    
    }
}

