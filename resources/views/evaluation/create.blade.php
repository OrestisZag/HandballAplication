@extends('main')

@section('title', '| Create Evaluation')

@section('content')
    <div class="row">
        <div class="col-md-7 col-md-3">
            {!! Form::open(['route' => 'evaluation.store', 'class' => 'form']) !!}
                <table class="table">
                    <thead>
                        <tr>
                            <th>Skill Group</th>
                            <th>Skill</th>
                            <th>Evaluation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($skill as $sepSkill)
                            <tr>
                                <td>{{ $sepSkill->SkillGroup }}</td>
                                <td>{{ $sepSkill->title }} </td>
                                <td>
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
