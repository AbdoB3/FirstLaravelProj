

@extends('admin.master')

@section('content')


    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                <div class="card">
                        <div class="card-header">Edit Brand</div>
                        <div class="card-body">
                        <form action="{{ route('brand.update',$brands->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{$brands->brand_name}}">
                            <div class="mb-3">
                                <label class="form-label">Brand Name</label>
                                <input type="text" class="form-control" name="brand_name" value="{{$brands->brand_name}}">
                            </div>
                            @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                            <img src="{{asset( $brands->brand_img)}}" style='height:40px;width:70px;'>
                            
                            <div class="mb-3">
                                <label class="form-label">Brand image</label>
                                <input type="file" class="form-control" name="brand_img">
                            </div>
                            @error('brand_img')
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
