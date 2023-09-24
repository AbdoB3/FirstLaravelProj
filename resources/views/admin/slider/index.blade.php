

@extends('admin.master')


@section('content')


    <div class="py-12">
            <div class="container">
            <div class="row">
            
                <div class="col-md-12" >

                <div class='d-flex justify-content-end'>
                    <a href="{{url('/slider/addd')}}" type='button' class='btn btn-primary mt-3 mb-3' rel="noopener noreferrer">ADD SLIDER</a>
                </div>
                

                    <div class="card">
                        <div class="card-header">All Sliders</div>
                    
            
                        <table class="table" >
                            <thead>
                                <tr>
                                <th scope="col"width='15%'>Title</th>
                                <th scope="col"width='35%'>Description</th>
                                <th scope="col"width='15%'>Image</th>
                                <th scope="col"width='15%'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Sliders as $slider )
                                <tr>
                                <th>{{ $slider->slider_title}}</th>
                                <td>{{ $slider->slider_desc }}</td>
                               <td><img src="{{ asset($slider->slider_img)}}" style='height:40px;width:70px;' alt=""></td>
                                <td><a class='btn btn-info' href="{{url('slider/edit/'.$slider->id)}}">Editer</a>&nbsp;
                                <a class='btn btn-danger' href="{{url('slider/restore/'.$slider->id)}}">Suprimer</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$Sliders->links()}}
                    </div>
                </div>
                    
            </div>


        </div>
    </div>
    
@endsection
