@extends('main')

@section('title', '| Create Athlete\'s Evaluation')

@section('style')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {!! Form::open(['route' => 'camp.storeAthleteEval', 'class' => 'form', 'data-parsley-validate' => '']) !!}
                {{ Form::hidden('adc_id', "$adc->athlete_id") }}
                {{ Form::hidden('camp_id', "$adc->camp_id") }}

                {{ Form::label('date', 'Practice Date:') }}
                {{ Form::text('date', null, ['class' => 'form-control input-sm', 'required' => '']) }}

                {{ Form::label('position', 'Position:') }}
                <select name="position" title="position" class="form-control input-sm">
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->fullName }}, {{ $position->sortName }}</option>
                    @endforeach
                </select>

                {{ Form::label('attackEval', 'Attack Evaluation:') }}
                <select name="attackEval" title="attackEval" class="form-control input-sm">
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                {{ Form::label('defenceEval', 'Defence Evaluation:') }}
                <select name="defenceEval" title="defenceEval" class="form-control input-sm">
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                {{ Form::label('comments', 'Comments:') }}
                {{ Form::textarea('comments', null, ['class' => 'form-control input-sm']) }}

                {{ Form::submit('Submit', ['class' => 'btn btn-block btn-success space-top']) }}
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
