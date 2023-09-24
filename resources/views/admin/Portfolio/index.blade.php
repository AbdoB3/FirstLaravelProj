

@extends('admin.master')

@section('content')



    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-group">

                    
                        @foreach ($images as $image )
                        <div class="col-md-4 mt-5">
                            <div class="card">
                                <img src="{{asset($image->image)}}" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Images</div>
                        <div class="card-body">
                        <form action="{{route('portfolio.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="mb-3">
                                <label class="form-label">Select Filter</label>
                                <select name="choose" >
                                    <option value="app">App</option>
                                    <option value="card">Card</option>
                                    <option value="web">Web</option>
                                </select>
                                
                            </div>
                            @error('choose')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label">Portfolio image</label>
                                <input type="file" class="form-control" name="image[]" multiple>
                            </div>
                            @error('image')
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
