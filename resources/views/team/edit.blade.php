@extends('main')

@section('title', "| Edit Team")

@section('style')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Editing {{ $team->name }} Team</h1>
            <a href="{{ route('team.index') }}" class="btn btn-primary btn-block">Back To Teams</a>
            {!! Form::model($team, ['route' => ['team.update', $team->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
                {{ Form::label('name', 'Name:', ['class' => 'space-top']) }}
                {{ Form::text('name', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '2', 'maxlength' => '80']) }}

                {{ Form::label('level', 'Level:') }}
                {{ Form::text('level', null, ['class' => 'form-control input-sm', 'required' => '']) }}

                {{ Form::label('place', 'Place:') }}
                {{ Form::text('place', null, ['class' => 'form-control input-sm', 'required' => '']) }}

                {{ Form::label('telephone', 'Telephone:') }}
                {{ Form::tel('telephone', null, ['class' => 'form-control input-sm', 'minlength' => '10',
                   'maxlength' => '15']) }}

                {{ Form::label('fax', 'Fax:') }}
                {{ Form::tel('fax', null, ['class' => 'form-control input-sm', 'minlength' => '10',
                   'maxlength' => '15']) }}

                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control input-sm', 'email' => '']) }}

                {{ Form::label('website', 'Website') }}
                {{ Form::text('website', null, ['class' => 'form-control input-sm', 'url' => '']) }}

                {{ Form::submit('Update Team\'s info', ['class' => 'btn btn-success btn-block space-top']) }}
            {!! Form::close() !!}
        </div>
    </div>
    {{--<div class="row">--}}
        {{--<div class="col-md-4 col-md-offset-4">--}}
            {{--{!! Form::open(['route' => ['team.destroy', $team->id], 'method' => 'DELETE']) !!}--}}
                {{--{{ Form::submit('Delete Team', ['class' => 'btn btn-danger btn-block space-top']) }}--}}
            {{--{!! Form::close() !!}--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

@section('script')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
