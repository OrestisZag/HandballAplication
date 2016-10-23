@extends('main')

@section('title', '| Add New Category')

@section('style')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Add New Category</h1>
            <a href="{{ route('category.index') }}" class="btn btn-primary btn-block">Back To Categories</a>
            {!! Form::open(['route' => 'category.store', 'data-parsley-validate' => '', 'class' => 'form']) !!}
                {{ Form::label('name', 'Category:', ['class' => 'space-top']) }}
                {{ Form::text('name', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '2', 'maxlength' => '40']) }}

                {{ Form::submit('Submit Category', ['class' => 'btn btn-block btn-success space-top']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    {!! Html::script('js/parsley.min.js') !!}
@endsection