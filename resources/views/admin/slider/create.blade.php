

@extends('admin.master')

@section('content')



    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Add Slider</div>
                        <div class="card-body">
                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Slider Title</label>
                                <input type="text" class="form-control" name="slider_title">
                            </div>
                            @error('slider_title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label">Slider Description</label>
                                <textarea class="form-control" name="slider_desc" rows='3'></textarea>
                            </div>
                            @error('slider_desc')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="mb-3 custom-file" >
                                <label class="custom-file-label">Slider image</label>
                                <input type="file" class="custom-file-input" name="slider_img" >
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
