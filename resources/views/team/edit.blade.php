@extends('main')

@section('title', "| Editing $team->name")

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Editing {{ $team->name }} Team</h1>
            <a href="{{ route('team.index') }}">Back To Teams</a>
            {!! Form::model($team, ['route' => ['team.update', $team->id], 'method' => 'PUT']) !!}
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, ['class' => 'vale bs class']) }}

            {{ Form::label('level', 'Level:') }}
            {{ Form::text('level', null, ['class' => 'vale bs class']) }}

            {{ Form::label('place', 'Place:') }}
            {{ Form::text('place', null, ['class' => 'vale bs class']) }}

            {{ Form::label('telephone', 'Telephone:') }}
            {{ Form::tel('telephone', null, ['class' => 'vale bs class']) }}

            {{ Form::label('fax', 'Fax:') }}
            {{ Form::tel('fax', null, ['class' => 'vale bs class']) }}

            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null, ['class' => 'vale bs class']) }}

            {{ Form::label('website', 'Website') }}
            {{ Form::text('website', null, ['class' => 'vale bs class']) }}

            {{ Form::submit('Update Team\'s info', ['class' => 'btn btn-success btn-block']) }}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['route' => ['team.destroy', $team->id], 'method' => 'DELETE']) !!}
                {{ Form::submit('Delete Team', ['class' => 'btn btn-danger btn-block space-top']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
