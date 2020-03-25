@extends('layouts.app')

@section('content')
@if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif

<div class="clearfix">
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3 float-right">Create Categories</a>
</div>
<div class="card-group">
    <div class="card">
        <h4 class="card-header">All Categories</h4>
        <table class="table">
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->name_categories }}</th>
                        <th>
                            <form class="float-right ml-3" action="{{ route('categories.destroy',$category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-success float-right">Edit</a>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
