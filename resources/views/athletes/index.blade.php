@extends('main')

@section('title', '| Athletes');

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('athlete.create') }}">Create Athlete Profile</a>
            @foreach($athletes as $athlete)
                <li>{{ $athlete->lastName }} {{ $athlete->firstName }}</li>
            @endforeach
            <div class="text-center">
                {{ $athletes->links() }}
            </div>
        </div>
    </div>
@endsection
