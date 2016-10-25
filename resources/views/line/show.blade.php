@extends('main')

@section('title', '| Show Line')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <a href="{{ route('line.index') }}" class="btn btn-block btn-primary pull-right">Back To Lines</a>
            <table class="table">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Athlete First Name</th>
                    <th class="text-center">Athlete Last Name</th>
                    <th class="text-center">Athlete's Evaluation</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @for($i = 1 ; $i <8 ; $i++)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td class="text-center">{{ ($entity['adc' . $i])['firstName'] }}</td>
                            <td class="text-center">{{ ($entity['adc' . $i])['lastName'] }}</td>
                            <td class="text-center">{{ number_format(($entity['adc' . $i])['avg'],2,'.','') }}</td>
                        </tr>
                    @endfor
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-center"><strong>Total:</strong></td>
                    <td class="text-center"><strong>{{ number_format($entity['general'],2,'.','') }}</strong></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
