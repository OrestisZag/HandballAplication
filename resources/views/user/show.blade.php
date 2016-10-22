@extends('main')

@section('title', '| User Info')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <a href="{{ route('user.index') }}" class="btn btn-primary pull-right">Back To Users</a>
            <h1>{{ $user->name }}'s Info</h1>
            <label>Email:</label>
            {{ $user->email }}<br>
            <label>Role:</label>
            {{ $user->role }}<br>
        </div>
    </div>
@endsection