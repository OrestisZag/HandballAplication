@extends('main')
<?php $eventShow = $event->name ?>
@section('title', "| $eventShow")

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <a href="{{ route('event.index') }}" class="btn btn-primary pull-right">Back To Events</a>
            <h1>{{ $event->name }}</h1>
            <label>Category:</label>
            {{ $event->category->name }}<br>
            <label>Date:</label>
            {{ $event->date }}<br>
        </div>
    </div>
@endsection