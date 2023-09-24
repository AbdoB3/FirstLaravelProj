

@extends('admin.master')

@section('content')



    <div class="py-12">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Add Contact Info</div>
                        <div class="card-body">
                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control"  name="address" rows='3'></textarea>
                                </div>
                                @error('address')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            <div class="mb-3">
                                <label class="form-label">Email </label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="number" class="form-control" name="phone">
                            </div>
                            @error('phone')
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
