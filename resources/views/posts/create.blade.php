@extends('layouts.app')
@section('content')
<div class="card-group">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"> {{ isset($post) ? "Update Post"  : "Create Post"  }} </h4>
            <form action="{{ isset($post) ? route('posts.update',$post->id)  : route('posts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                <input type="text" name="title" value ="{{ isset($post) ? $post->title  :"" }}" class="form-control" placeholder="Enter Your Title">
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control"  cols="30" rows="10" placeholder="Enter your description here">{{ isset($post) ? $post->description  : "" }}</textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                <img src="{{ isset($post) ? asset('storage/'.$post->image)  :"" }}" class="img-responsive mt-3" width="100px" height="100px" alt="">
                </div>
                <div class="form-group">
                    <select name="categoryID" class="custom-select">
                        <option selected disabled>Please Select Your Category</option>
                        @foreach ($categories as $category)
                            <option  value="{{ $category->id }}">{{ $category->name_categories }}</option>
                        @endforeach
                    </select>
                </div>
                    @if (!$tags->count() <= 0)
                    <div class="form-group">
                        <select name="tags[]" class="form-control tags" multiple="multiple">
                            @foreach ($tags  as $tag)
                                <option value="{{ $tag->id }}"
                                      @if (isset($post) &&  $post->hastag($tag->id))
                                          selected
                                      @endif
                                      >{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
            <button class="btn btn-success">{{ isset($post) ?"Update Post" :"Create Post" }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
