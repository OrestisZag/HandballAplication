@extends('main')

@section('title', '| Add New Team')

@section('style')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Add New Team</h1>
            {!! Form::open(['route' => 'team.store', 'data-parsley-validate' => '', 'class' => 'form']) !!}
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '2', 'maxlength' => '50']) }}

                {{ Form::label('level', 'Level:') }}
                {{ Form::text('level', null, ['class' => 'form-control input-sm', 'required' => '']) }}

                {{ Form::label('place', 'Place:') }}
                {{ Form::text('place', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '2', 'maxlength' => '100']) }}

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

                {{ Form::submit('Add Team', ['class' => 'btn btn-success btn-block space-top']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    {!! Html::script('js/parsley.min.js') !!}
@endsection
