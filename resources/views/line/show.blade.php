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
                    @for($i = 1 ; $i <8 ; $i++)
                        <tr>
                            <td>{{ ($entity['adc' . $i])['firstName'] }}</td>
                            <td>{{ ($entity['adc' . $i])['lastName'] }}</td>
                            <td>{{ ($entity['adc' . $i])['avg'] }}</td>
                        </tr>
                    @endfor
                <tr>
                    <td>{{ $entity['general'] }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
