@extends('main')

@section('title', '| Edit Evaluation')

@section('content')
    <div class="row">
        <div class="col-md-7 col-md-3">
            {!! Form::model($entities,['route' => 'evaluation.update', 'class' => 'form', 'method' => 'PUT']) !!}
                <table class="table">
                    <thead>
                    <tr>
                        <th>Skill Group</th>
                        <th>Skill</th>
                        <th>Evaluation</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($entities as $entity)
                        <tr>
                            <td>{{ $entity['SkillGroup'] }}</td>
                            <td>{{ $entity['Skill'] }}</td>
                            <td>
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
