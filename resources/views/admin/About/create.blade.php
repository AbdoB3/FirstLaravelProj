

@extends('admin.master')

@section('content')



    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Add About</div>
                        <div class="card-body">
                        <form action="{{ route('about.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label">Short Description</label>
                                <textarea class="form-control" name="short_desc" rows='3'></textarea>
                            </div>
                            @error('short_desc')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label">Long Description</label>
                                <textarea class="form-control" name="long_desc" rows='3'></textarea>
                            </div>
                            @error('long_desc')
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
