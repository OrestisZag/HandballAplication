@extends('main')

@section('title', '| Add New Team')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Add New Team</h1>
            {!! Form::open(['route' => 'team.store']) !!}
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

                {{ Form::submit('Add Team', ['class' => 'vale bs class']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
