@extends('main')

@section('title', '| Login')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="auth-panel">
                        <div class="page-header">
                            <h1 class="logo text-center">Login</h1>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">Login</div>
                            <div class="panel-body">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>whoops</strong> Failed to login<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form class="form-horizontal" role="form" method="POST" action="{{ route('auth.login') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">email address</label>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">password</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"
                                                           name="remember"> remember me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-success btn-block">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection