@extends('main')

@section('title', '| Athletes')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('athlete.create') }}" class="btn btn-sm btn-primary">Create New Athlete's Profile</a>
            @foreach($athletes as $athlete)
                <li>{{ $athlete->lastName }} {{ $athlete->firstName }}
                    <a href="{{ route('athlete.show', $athlete->id) }}">View</a>
                    <a href="{{ route('athlete.edit', $athlete->id) }}">Edit</a>
                </li>
            @endforeach
            <div class="text-center">
                {{ $athletes->links() }}
            </div>
        </div>
    </div>
@endsection
