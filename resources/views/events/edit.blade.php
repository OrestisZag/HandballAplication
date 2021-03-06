@extends('main')

@section('title', '| Edit Event')

@section('style')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Edit Event</h1>
            <a href="{{ route('event.index') }}" class="btn btn-primary btn-block">Back To Events</a>
            {!! Form::model($event, ['route' => ['event.update', $event->id], 'data-parsley-validate' => '', 'class' => 'form', 'method' => 'PUT']) !!}
                {{ Form::label('name', 'Event:', ['class' => 'space-top']) }}
                {{ Form::text('name', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '2', 'maxlength' => '80']) }}

                {{ Form::label('category', 'Category:') }}
                <select name="category" title="category" class="form-control input-sm">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $event->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('date', 'Date:') }}
                {{ Form::text('date', null, ['class' => 'form-control input-sm', 'required' => '']) }}

                {{ Form::submit('Submit Event', ['class' => 'btn btn-block btn-success space-top']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    {!! Html::script('js/parsley.min.js') !!}
    <script>
        $(function() {
            $("#date").datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: "1920:2100"})
                    .keydown(false);
        });
    </script>
@endsection