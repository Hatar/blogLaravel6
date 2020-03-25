@extends('layouts.app')
@section('content')

<div class="card-group">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Profile</h4>
        <form action="{{ route('users.update',$user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name :</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Email :</label>
                <input type="text" name="email" value="{{ $user->email}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="about">About :</label>
                <textarea name="about" class="form-control" id="" cols="20" rows="6">{{ $profile->about }}</textarea>
            </div>
            <div class="form-group">
                <label for="name">Facebook :</label>
                <input type="text" name="faceboock" value="{{ $profile->facebook }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Twitter :</label>
                <input type="text" name="twitter" value="{{ $profile->twitter }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name"style="display:block">Picture :</label>
                <img src="{{ asset('storage/'.$user->getPictureProfile()) }}" class="mb-2"  width="50px" height="50px" style="border-radius:50px" alt="">
                <input type="file" name="picture" class="form-control">
            </div>
            <button class="btn btn-primary">Update Profile</button>
        </form>
        </div>
    </div>
</div>

@endsection