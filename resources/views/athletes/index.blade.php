@extends('main')

@section('title', '| Athletes')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-5">
            {!! Form::open(['route' => 'athlete.index', 'method' => 'GET', 'role' => 'search', 'class' => 'navbar-form']) !!}
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
            <a href="{{ route('athlete.create') }}" class="btn btn-primary center-block">Create New Athlete's Profile</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Position</th>
                        <th>Team</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($athletes as $athlete)
                        <tr>
                            <td>{{ $athlete->lastName }}</td>
                            <td>{{ $athlete->firstName }}</td>
                            <td></td>
                            <td>
                                @foreach($athlete->athleteDataTeams as $team)
                                    @if($team->currentTeam == 1)
                                        {{ $team->team->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('athlete.show', $athlete->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-info-sign"></span></a>
                                <a href="{{ route('athlete.edit', $athlete->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $athletes->links() }}
            </div>
        </div>
    </div>
@endsection
