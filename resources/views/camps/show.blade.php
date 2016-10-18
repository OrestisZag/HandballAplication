@extends('main')

<?php $campShow = $camp->title?>
@section('title', "| $campShow")

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <a href="{{ route('camp.index') }}" class="btn btn-primary pull-right">Back To Camps</a>
            <h1>{{ $camp->title }}</h1>
            <label>Place:</label>
            {{ $camp->place }}<br>
            <label>Date:</label>
            {{ $camp->date }}

        </div>
    </div>
@endsection
