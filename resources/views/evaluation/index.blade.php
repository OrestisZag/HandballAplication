@extends('main')

@section('title', '| Athlete Evaluations')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{ route('evaluation.info') }}" class="btn btn-primary center-block">Create New Athlete's Evaluation</a>
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center">Athlete</th>
                    <th class="text-center">Match</th>
                    <th class="text-center">Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($entities as $entity)
                            <tr>
                                <td class="text-center">{{ $entity['athleteLastName'] }} {{ $entity['athleteFirstName'] }}</td>
                                <td class="text-center">{{ $entity['home'] }} - {{ $entity['away'] }}</td>
                                <td class="text-center">{{ $entity['date'] }} </td>

                                <td>
                                    <a href="{{ route('evaluation.show', $entity['evalId']) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-info-sign"></span></a>
                                    <a href="{{ route('evaluation.edit', $entity['evalId']) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                                </td>
                            </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $entities->links() }}
            </div>
        </div>
    </div>
@endsection
