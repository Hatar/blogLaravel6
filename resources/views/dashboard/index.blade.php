@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <div class="card text-white bg-info">
                        <div class="card-body text-center">
                            <h4 class="card-title">Profile</h4>
                            <p class="card-text">{{ $profiles->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4  mb-2">
                    <div class="card text-white bg-success">
                        <div class="card-body text-center">
                            <h4 class="card-title">Categories</h4>
                            <p class="card-text">{{ $categories->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4  mb-2">
                    <div class="card text-white bg-danger">
                        <div class="card-body text-center">
                            <h4 class="card-title">Post</h4>
                            <p class="card-text">{{ $posts->count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4  mb-2">
                    <div class="card text-white bg-dark">
                        <div class="card-body text-center">
                            <h4 class="card-title">Tag</h4>
                            <p class="card-text">{{ $tags->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
