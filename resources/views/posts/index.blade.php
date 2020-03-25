@extends('layouts.app')

@section('content')

<div class="clearfix">
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3 float-right ">Create Post</a>
</div>
<div class="card-group">
    <div class="card">
        <div class="card">
            <h4 class="card-header">All Posts</h4>
            @if ($posts->count()>0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td><img src="{{ asset('storage/'. $post->image)}}" width="100px" height="100px"></td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>
                                <form class="float-right" action="{{ route('posts.destroy',$post->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger ml-3">{{ $post->trashed() ?  'DELETE'  : 'Trash' }}</button>
                                </form>
                            @if (!$post->trashed())
                                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-success float-right">Edit</a>
                            @else
                                <a href="{{ route('posts.restore',$post->id) }}" class="btn btn-success float-right">Restore</a>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center my-3">
                    <h3>No Post Yet !!!</h3>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection