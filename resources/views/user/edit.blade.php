@extends('main')

@section('title', '| Edit User')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="auth-panel">
                    <div class="page-header">
                        <h1 class="logo text-center">Update {{ $user->name }}</h1>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Register</div>
                        <div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                                <div class="form-group">
                                    {{ Form::label('name', 'Username:', ['class' => 'col-md-4 control-label']) }}
                                    <div class="col-md-6">
                                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('email', 'Email:', ['class' => 'col-md-4 control-label']) }}
                                    <div class="col-md-6">
                                        {{ Form::text('email', null, ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('role', 'Role:', ['class' => 'col-md-4 control-label']) }}
                                    <div class="col-md-6">
                                        <select name="role" title="role">
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('password', 'Password:', ['class' => 'col-md-4 control-label']) }}
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password" placeholder="Set new Password or Retype Old">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Confirm Password:</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password_confirmation">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        {{ Form::submit('Update User', ['class' => 'btn btn-primary']) }}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
                                        {{ Form::submit('Delete User', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection