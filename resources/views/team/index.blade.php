@extends('main')

@section('title', '| Teams')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('team.create') }}">Add New Team</a>
            <ul>
                @foreach($teams as $team)
                    <li>
                        {{ $team->name }}
                        <a href="{{ route('team.show', $team->id) }}">View</a>
                    </li>
                @endforeach
            </ul>
            <div class="text-center">
                {{ $teams->links() }}
            </div>
        </div>
    </div>
@endsection
