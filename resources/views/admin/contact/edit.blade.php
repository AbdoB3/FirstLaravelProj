

@extends('admin.master')

@section('content')


                   
                        
                   

    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-10">
                <div class="card">
                        <div class="card-header">Edit</div>
                        <div class="card-body">
                        <form action="{{url('/contact/update/'.$contacts->id)}}" method="POST" >
                            @csrf
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control" rows="5">{{$contacts->address}}</textarea>
                                </div>
                                @error('adress')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            <div class="mb-3">
                                <label class="form-label"> Email</label> 
                                <input type="email" class="form-control" name="email" value="{{$contacts->email}}">
                            </div>
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            
                            
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="phone" class="form-control" name="phone" value="{{$contacts->phone}}">
                            </div>
                            @error('phone')
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
