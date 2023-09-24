

@extends('admin.master')

@section('content')


    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-10">
                <div class="card">
                        <div class="card-header">Edit</div>
                        <div class="card-body">
                        <form action="{{ route('about.update',$abouts->id) }}" method="POST" >
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="{{$abouts->title}}">
                            </div>
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label">Short Description</label> 
                                <textarea name="short_desc" class="form-control" rows="5">{{$abouts->short_desc}}</textarea>
                            </div>
                            @error('short_desc')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                            
                            <div class="mb-3">
                                <label class="form-label">Long Description</label>
                                <textarea name="long_desc" class="form-control" rows="5">{{$abouts->long_desc}}</textarea>
                            </div>
                            @error('long_desc')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        </div>
                    </div>
                </div>                    
            </div>
        </div>
    </div>
   
@endsection
