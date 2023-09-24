<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    public function list(){
        $images=Portfolio::all();
        return view('admin.Portfolio.index',compact('images'));
    }

    public function store(Request $request)
{

    $images = $request->file('image');
    $imagePaths = [];

    foreach ($images as $image) {
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = date('YmdHi') . '.' . $img_ext;
        $location = 'image/portfolio/';
        $img_path = $location . $img_name;
        $image->move(public_path($location), $img_name); // Use public_path to specify the destination

        $imagePaths[] = $img_path;
    }

    // Store the image paths in the Portfolio model
    foreach ($imagePaths as $img_path) {
        Portfolio::create([
            'image' => $img_path,
            'choose'=>$request->choose,

        ]);
    }
    notify()->success('Images uploaded successfully !');

    return redirect()->back();
}

public function listpage(){
    $images=Portfolio::all();
    return view('page.portfolio',compact('images'));
}



}
