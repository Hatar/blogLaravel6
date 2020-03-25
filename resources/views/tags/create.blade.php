@extends('layouts.app')
@section('content')

<div class="card-group">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">{{ isset($tag) ? 'Edit Tag'  : 'Create Tag'   }}</h4>
        <form action="{{ isset($tag) ? route('tags.update',$tag->id)  : route('tags.store') }}" method="post">
            @if (isset($tag))
                @csrf
                @method('PUT')
            @else
                @csrf
            @endif
            <div class="form-group">
            <input type="text" name="name" value="{{ isset($tag) ? $tag->name  : ''   }}" class="form-control" placeholder="{{ isset($tag) ? ''  : 'Enter Your Tag'   }}">
            </div>
            <button class="btn btn-primary">{{ isset($tag) ? 'Update tag'  : 'Add Tag'   }}</button>
        </form>
        </div>
    </div>
</div>

@endsection