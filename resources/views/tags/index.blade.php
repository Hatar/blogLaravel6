@extends('layouts.app')
@section('content')
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="clearfix">
        <a href="{{ route('tags.create') }}" class="btn btn-primary mb-3  float-right">Create Tag</a>
    </div>
    <div class="card-group">
        <div class="card">
            <div class="card-header">All Tags</div>
            <table class="table">
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                        <th>{{ $tag->name }} <span class="badge badge-primary ml-2">{{ $tag->posts->count() }}</span></th>
                            <th>
                                <form class="float-right ml-3" action="{{ route('tags.destroy', $tag->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-success float-right">Edit</a>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection