@extends('main')

@section('title', '| Show Evaluation')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{ route('evaluation.index') }}" class="btn btn-block btn-primary">Back To Evaluations</a>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">Skill Group</th>
                        <th class="text-center">Skill</th>
                        <th class="text-center">Evaluation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entities as $entity)
                        <tr>
                            <td>{{ $entity['SkillGroup'] }}</td>
                            <td class="text-center">{{ $entity['Skill'] }}</td>
                            <td class="text-center">{{ $entity['Evaluation'] }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td></td>
                            <td class="text-center"><strong>Total:</strong></td>
                            <td class="text-center"><strong>{{ number_format($avg,2,'.','') }}</strong></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
