@extends('main')

@section('title', '| Athlete Evaluations')

@section('content')
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <a href="{{ route('evaluation.info') }}" class="btn btn-primary center-block">Create New Athlete's Evaluation</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Athlete</th>
                    <th>Match</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($entities as $entity)
                            <tr>
                            <td>{{ $entity['athleteLastName'] }} {{ $entity['athleteFirstName'] }}</td>
                            <td>{{ $entity['home'] }} - {{ $entity['home'] }}</td>
                            <td>{{ $entity['date'] }} </td>

                            <td>
                                <a href="#" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-info-sign"></span></a>
                                <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                            </tr>
{{--                        @foreach($entity-> as $athlete)--}}
                        {{--@endforeach--}}

                @endforeach
                </tbody>
            </table>
            <div class="text-center">
{{--                {!! $entities->render() !!}--}}
                {{ $entities->links() }}
                {{--{!! $entities->links() !!}--}}
            </div>
        </div>
    </div>
@endsection
