

@extends('admin.master')

@section('content')


    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-10">
                <div class="card">
                        <div class="card-header">Edit Slider</div>
                        <div class="card-body">
                        <form action="{{ route('slider.update',$sliders->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{$sliders->slider_title}}">
                            <div class="mb-3">
                                <label class="form-label">Slider Title</label>
                                <input type="text" class="form-control" name="slider_title" value="{{$sliders->slider_title}}">
                            </div>
                            @error('slider_title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label">Slider Description</label>
                                <input type="text" class="form-control" name="slider_desc" value="{{$sliders->slider_desc}}">
                            </div>
                            @error('slider_desc')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                            <img src="{{asset( $sliders->slider_img)}}" style='height:40px;width:70px;'>
                            
                            <div class="mb-3">
                                <label class="form-label">Brand image</label>
                                <input type="file" class="form-control" name="slider_img">
                            </div>
                            @error('slider_img')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
    </div>
   
@endsection
