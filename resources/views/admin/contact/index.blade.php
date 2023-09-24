

@extends('admin.master')

@section('content')



    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- if length == 0 afficher btn ADD -->
                      
                        <div class="d-flex justify-content-end">
                            <a href="{{route('contact.add')}}" type="button" class="btn btn-primary mt-3 mb-3" rel="noopener noreferrer">ADD</a>
                        </div>
                    
                    

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">Contact</div>
                    
            
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $con )
                                <tr>
                                <th>{{ $con->id}}</th>
                                <td>{{ $con->address}}</td>
                                <td>{{ $con->email}}</td>
                                <td>{{ $con->phone}}</td>
                                <td><a class='btn btn-info' href="{{url('contact/edit/'.$con->id)}}">Editer</a>&nbsp;
                                <a class='btn btn-danger' href="{{route('contact.delete',$con->id)}}" onclick="return confirm('are you sure to delete {{$con->brand_name}}')">Suprimer</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                    
            </div>


        </div>
    </div>
   
@endsection
