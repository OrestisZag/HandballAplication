@extends('main')

@section('title', '| Create New Camp')

@section('style')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Add New Camp</h1>
            {!! Form::open(['route' =>'camp.store', 'data-parsley-validate' => '', 'class' => 'form']) !!}
                {{ Form::label('title', 'Camp Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control', 'required' => '']) }}

                {{ Form::label('place', 'Place:') }}
                {{ Form::text('place', null, ['class' => 'form-control', 'required' => '']) }}

                {{ Form::label('date', 'Date:') }}
                {{ Form::text('date', null, ['class' => 'form-control', 'required' => '']) }}

                {{ Form::submit('Add Camp', ['class' => 'btn btn-success btn-block space-top']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    {!! Html::script('js/parsley.min.js') !!}
    <script>
        $(function() {
            $( "#date" ).datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: "1920:2100"})
                    .keydown(false);
        });
    </script>
@endsection
