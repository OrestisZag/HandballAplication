@extends('main')

@section('title', '| Edit Match')

@section('style')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Edit Match</h1>
            <a href="{{ route('match.index') }}" class="btn btn-primary btn-block">Back To Matches</a>
            {!! Form::model($match, ['route' => ['match.update', $match->id], 'data-parsley-validate' => '', 'class' => 'form', 'method' => 'PUT']) !!}
                {{ Form::label('home', 'Home Team:', ['class' => 'space-top']) }}
                {{ Form::text('home', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '2', 'maxlength' => '80']) }}

                {{ Form::label('away', 'Away Team:') }}
                {{ Form::text('away', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '2', 'maxlength' => '80']) }}

                {{ Form::label('date', 'Match Date:') }}
                {{ Form::text('date', null, ['class' => 'form-control input-sm', 'required' => '']) }}

                {{ Form::label('comments', 'Comments:') }}
                {{ Form::textarea('comments', null, ['class' => 'form-control input-sm', 'maxlength' => '500']) }}

                {{ Form::submit('Submit Match', ['class' => 'btn btn-block btn-success space-top']) }}
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