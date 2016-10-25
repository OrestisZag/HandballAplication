@extends('main')

@section('title', '| Create Evaluation')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{ route('evaluation.info') }}" class="btn btn-block btn-primary">Back To Evaluation Info</a>
            {!! Form::open(['route' => 'evaluation.store', 'class' => 'form']) !!}
                <table class="table">
                    <thead>
                        <tr>
                            <th>Skill Group</th>
                            <th class="text-center">Skill</th>
                            <th class="text-center">Evaluation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skill as $sepSkill)
                            <tr>
                                <td>{{ $sepSkill->SkillGroup }}</td>
                                <td class="text-center">{{ $sepSkill->title }} </td>
                                <td class="text-center">
                                    <select name="skill[{{$sepSkill->id}}]" title="evaluation">
                                        @for($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <input type="hidden" name="athleteId" value="{{ $athleteID }}"/>
                <input type="hidden" name="matchId" value="{{ $matchID }}"/>

                {{ Form::submit('Evaluate Athlete', ['class' => 'btn btn-success btn-block']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
