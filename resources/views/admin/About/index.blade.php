

@extends('admin.master')

@section('content')



    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- if length == 0 afficher btn ADD -->
                    @if ($abouts->count('id') == 0)
                        <div class="d-flex justify-content-end">
                            <a href="{{ url('/about/add') }}" type="button" class="btn btn-primary mt-3 mb-3" rel="noopener noreferrer">ADD</a>
                        </div>
                    @endif
                

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-header">About</div>
                    
            
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Long Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($abouts as $about )
                                <tr>
                                <th>{{ $about->id}}</th>
                                <td>{{ $about->title}}</td>
                                <td>{{ $about->short_desc}}</td>
                                <td>{{ $about->long_desc}}</td>
                                <td><a class='btn btn-info' href="{{url('about/edit/'.$about->id)}}">Editer</a>&nbsp;
                                <a class='btn btn-danger' href="{{url('about/restore/'.$about->id)}}" onclick="return confirm('are you sure to delete {{$about->brand_name}}')">Suprimer</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$abouts->links()}}
                    </div>
                </div>
                    
            </div>


        </div>
    </div>
   
@endsection
