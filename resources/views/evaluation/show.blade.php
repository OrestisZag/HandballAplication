@extends('main')

@section('title', '| Show Evaluation')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-3">
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
                            <td>{{ $entity['Evaluation'] }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td>{{ $avg }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
