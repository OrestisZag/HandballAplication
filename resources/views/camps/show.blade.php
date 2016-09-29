@extends('main')

<?php $campShow = $camp->title?>
@section('title', "| $campShow")

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>{{ $camp->title }}</h1>
            <label>Place:</label>
            {{ $camp->place }}<br>
            <label>Date:</label>
            {{ $camp->date }}
            <a href="{{ route('camp.index') }}" class="btn btn-primary btn-block">Back To Camps</a>
        </div>
    </div>
@endsection
