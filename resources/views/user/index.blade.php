@extends('main')

@section('title', '| All users')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-5">
            {!! Form::open(['route' => 'user.index', 'method' => 'GET', 'role' => 'search', 'class' => 'navbar-form']) !!}
            <div class="input-group text-center">
                {{ Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search']) }}
                <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <a href="{{ route('user.create') }}" class="btn btn-primary center-block">Create New User</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-info-sign"></span></a>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
