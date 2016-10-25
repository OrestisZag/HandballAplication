@extends('main')

@section('title', '| Edit Evaluation')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{ route('evaluation.index') }}" class="btn btn-block btn-primary">Back To Evaluations</a>
            {!! Form::model($entities,['route' => 'evaluation.update', 'class' => 'form', 'method' => 'PUT']) !!}
                <table class="table">
                    <thead>
                    <tr>
                        <th>Skill Group</th>
                        <th class="text-center">Skill</th>
                        <th class="text-center">Evaluation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($entities as $entity)
                        <tr>
                            <td>{{ $entity['SkillGroup'] }}</td>
                            <td class="text-center">{{ $entity['Skill'] }}</td>
                            <td class="text-center">
                                <select name="skill[{{$entity['raw']->id}}]" title="evaluation">
                                    @for($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}" {{ $entity['Evaluation'] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ Form::submit('Evaluate Athlete', ['class' => 'btn btn-success btn-block']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
