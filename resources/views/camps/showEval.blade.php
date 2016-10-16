@extends('main')

@section('title', '| Camp Evaluation')

@section('content')
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <a href="{{ route('athlete.show', $adc->athlete_id) }}" class="btn btn-block btn-primary">Back to Athlete's Profile</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 space-top">
            <ul class="list-group">
                <li class="list-group-item text-center"><strong>Train Date: </strong>{{ $train->date }}</li>
                <li class="list-group-item text-center"><strong>Position: </strong>{{ $train->position->fullName }}</li>
                <li class="list-group-item text-center"><strong>Attack Evaluation: </strong>{{ $train->attackEval }}</li>
                <li class="list-group-item text-center"><strong>Defence Evaluation: </strong>{{ $train->defenceEval }}</li>
                <li class="list-group-item text-center"><strong>Attack + Defence Evaluation: </strong>{{ $train->atDefEval }}</li>
                <li class="list-group-item text-center"><strong>Comments: </strong><textarea id="text" rows="5" cols="25">
                    {{ $train->comments }}</textarea></li>
            </ul>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#text').keydown(false);
    </script>
@endsection
