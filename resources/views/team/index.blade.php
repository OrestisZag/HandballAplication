@extends('main')

@section('title', '| Teams')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('team.create') }}" class="btn btn-primary">Add New Team</a>
            <ul class="space-top">
                @foreach($teams as $team)
                    <li>
                        {{ $team->name }}
                        <a href="{{ route('team.show', $team->id) }}">View</a>
                        <a href="{{ route('team.edit', $team->id) }}">Edit</a>
                    </li>
                @endforeach
            </ul>
            <div class="text-center">
                {{ $teams->links() }}
            </div>
        </div>
    </div>
@endsection
