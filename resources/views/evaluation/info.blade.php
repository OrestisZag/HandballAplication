@extends('main')

@section('title', '| Athlete Evaluation')

@section('style')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <h1>Evaluation Info</h1>
            {{ Form::open(['route' => 'evaluation.create', 'data-parsley-validate' => '', 'class' => 'form']) }}
                {{ Form::label('athlete', 'Choose Athlete:', ['class' => 'space-top']) }}
                <select name="athlete" title="athlete" class="select2-athlete form-control input-sm" multiple="multiple">
                    @foreach($athletes as $athlete)
                        <option value="{{ $athlete->id }}">{{ $athlete->lastName }} {{ $athlete->firstName }}</option>
                    @endforeach
                </select>

                {{ Form::label('position', 'Choose Athlete\'s Position') }}
                <select name="position" title="position" class="form-control input-sm">
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->fullName }}</option>
                    @endforeach
                </select>

                {{ Form::label('match', 'Choose the match that you want to evaluate him for:') }}
                <select name="match" title="match" class="select2-match form-control input-sm" multiple="multiple">
                    @foreach($matches as $match)
                        <option value="{{ $match->id }}">{{ $match->home }} - {{ $match->away }}, {{ date('Y', strtotime($match->date)) }}</option>
                    @endforeach
                </select>

                {{ Form::submit('Continue', ['class' => 'btn btn-primary btn-block space-top']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection

@section('script')
    {!! Html::script('js/select2.min.js') !!}
    <script>
        $('.select2-athlete').select2({
            maximumSelectionLength: 1
        });
        $('.select2-match').select2({
            maximumSelectionLength: 1
        });
    </script>
@endsection
