

@extends('admin.master')

@section('content')



    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">All Brand</div>
                    
            
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">User Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">image</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Brands as $brand )
                                <tr>
                                <th>{{ $brand->id}}</th>
                                <td>{{ $brand->brand_name}}</td>
                               <td><img src="{{ asset($brand->brand_img)}}" style='height:40px;width:70px;' alt=""></td>
                                <td><a class='btn btn-info' href="{{url('brand/edit/'.$brand->id)}}">Editer</a>&nbsp;
                                <a class='btn btn-danger' href="{{url('brand/restore/'.$brand->id)}}" onclick="return confirm('are you sure to delete {{$brand->brand_name}}')">Suprimer</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$Brands->links()}}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brand</div>
                        <div class="card-body">
                        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Brand Name</label>
                                <input type="text" class="form-control" name="brand_name">
                            </div>
                            @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

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
