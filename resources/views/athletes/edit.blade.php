@extends('main')

@section('title', '| Edit Player')

@section('content')
    <h1>Edit {{ $athlete->lastName }} {{ $athlete->firstName }}'s Info:</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('athlete.index') }}">Back To Athletes</a>
            {!! Form::model(['route' => ['athlete.update'], 'method' => 'PUT']) !!}
                {{--ToDO: Create form inputs--}}
                {{ Form::submit('Update Athlete\'s Info', ['class' => 'vale bs class']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
