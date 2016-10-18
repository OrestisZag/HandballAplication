@extends('main')

@section('title', '| Teams')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-5">
            {!! Form::open(['route' => 'team.index', 'method' => 'GET', 'role' => 'search', 'class' => 'navbar-form']) !!}
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
            <a href="{{ route('team.create') }}" class="btn btn-primary center-block">Add New Team</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Team</th>
                        <th>Level</th>
                        <th>Place</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->level }}</td>
                            <td>{{ $team->place }}</td>
                            <td>
                                <a href="{{ route('team.show', $team->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-info-sign"></span></a>
                                <a href="{{ route('team.edit', $team->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $teams->links() }}
            </div>
        </div>
    </div>
@endsection
