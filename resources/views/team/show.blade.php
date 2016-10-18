@extends('main')
<?php $teamShow = $team->name ?>
@section('title', "| $teamShow")

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <a href="{{ route('team.index') }}" class="btn btn-primary pull-right">Back To Teams</a>
            <h1>{{ $team->name }}</h1>
            <label>Level:</label>
            {{ $team->level }}<br>
            <label>Place:</label>
            {{ $team->place }}<br>
            <label>Telephone:</label>
            {{ $team->telephone }}<br>
            <label>Fax:</label>
            {{ $team->fax }}<br>
            <label>Email:</label>
            {{ $team->email }}<br>
            <label>Website:</label>
            {{ $team->website }}<br>
        </div>
    </div>
@endsection
