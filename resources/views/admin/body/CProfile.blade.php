

@extends('admin.master')

@section('content')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>
    <div class="card-body">
        <form class="form-pill" action="{{route('profile.update')}}" method='POST'>
         @csrf
         @method('patch')
            <div class="form-group">
                <label for="name">Name </label>
                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                <x-input-error class="mt-2" :messages="$errors->get('name')" />

            </div>
            <div class="form-group">
                <label for="email">Email </label>
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


@endsection
