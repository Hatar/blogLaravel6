@extends('layouts.app')

@section('content')

<div class="clearfix">
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3 float-right ">Create Users</a>
</div>
<div class="card-group">
    <div class="card">
        <div class="card">
            <h4 class="card-header">All Users</h4>
            @if ($users->count()>0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                        <td><img src="{{ asset('storage/'.$user->getPictureProfile()) }}" class="img-responsive" width="50px" height="50px" style="border-radius:50px"></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <form class="float-right" action="" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger ml-3">Delete</button>
                                </form>
                                <a href="" class="btn btn-success float-right">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center my-3">
                    <h3>No User Yet !!!</h3>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection