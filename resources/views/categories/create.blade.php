@extends('layouts.app')

@section('content')

<div class="card-group">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{isset( $category) ? "Edit Category" :"Create New Categories"  }}</h5>
            <form action="{{ isset($category) ? route('categories.update',$category->id)  :route('categories.store') }}" method="post">
                @csrf
                @if(isset($category))
                  @method('PUT')
                @endif
                <div class="form-group">
                  <input
                  type="text"
                  name="name_categories"
                  class="@error('name_categories')
                    is-invalid
                  @enderror
                  form-control" value="{{ isset($category) ? $category->name_categories : ''  }}"  placeholder="Enter New Categories" >
                  @error('name_categories')
                    <div class="alert alert-danger mt-3">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <button class="btn btn-primary">{{ isset($category) ?  "Update Category"   :"Add Course" }}</button>
            </form>
        </div>
    </div>
</div>

@endsection
