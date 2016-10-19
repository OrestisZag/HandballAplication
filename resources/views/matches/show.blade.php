@extends('main')

<?php $matchName = $match->home.'-'.$match->away?>
@section('title', "| $matchName")

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <a href="{{ route('match.index') }}" class="btn btn-primary pull-right">Back To Matches</a>
            <h1>{{ $match->home }} <strong>-</strong> {{ $match->away }}</h1>
            <label>Home Team:</label>
            {{ $match->home }}<br>
            <label>Away Team:</label>
            {{ $match->away }}<br>
            <label>Match Date:</label>
            {{ $match->date }}<br>
            <label>Comments:</label>
            {{ $match->comments }}
        </div>
    </div>
@endsection