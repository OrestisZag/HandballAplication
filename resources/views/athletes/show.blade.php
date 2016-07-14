@extends('main')

@section('title', "| $athlete->lastName $athlete->firstName")

@section('content')
    <h1>{{ $athlete->lastName }} {{ $athlete->firstName }}</h1>
    <a href="{{ route('athlete.index') }}">Back To Athletes</a>
    <div class="row">
        <div class="col-md-3">
            {{--photo will go here--}}
        </div>
        <div class="col-md-3 col-md-offset-1">
            <label>Birthday:</label>
            {{ $athlete->birthday }}<br>
            <label>Age:</label>
            {{ date_diff(date_create($athlete->birthday), date_create(date("Y-m-d")))->format("%y") }}<br>
            <label>Height:</label>
            {{ $athlete->height }}<strong>m</strong><br>
            <label>Weight:</label>
            {{ $athlete->weight }}<strong>kg</strong><br>
            <h3>Contact Info:</h3>
            <label>Mobile:</label>
            {{ $athlete->mobile }}<br>
            <label>Telephone 1:</label>
            {{ $athlete->telephone1 }}<br>
            <label>Telephone 2:</label>
            {{ $athlete->telephone2 }}<br>
            <label>Fax:</label>
            {{ $athlete->fax }}<br>
            <label>Team's Fax:</label>
            {{ $athlete->teamFax }}<br>
            <label>Email 1:</label>
            {{ $athlete->email1 }}<br>
            <label>Email 2:</label>
            {{ $athlete->email2 }}
        </div>
        <div class="col-md-3 col-md-offset-1">
            <h3>General Info:</h3>
            <label>Country:</label>
            {{ $athlete->country }}<br>
            <label>Region:</label>
            {{ $athlete->region }}<br>
            <label>Address:</label>
            {{ $athlete->address }}<br>
            <label>Postal Code:</label>
            {{ $athlete->postalCode }}<br>
            <label>Passport No:</label>
            {{ $athlete->passportNumber }}<br>
            <label>Passport Expiration Date:</label>
            {{ $athlete->passportExpDate }}<br>
            <label>Passport Days To Expire:</label>
            {{ date_diff(date_create($athlete->passportExpDate), date_create(date('Y-m-d')))->format("%R%a") < 0 ?
             date_diff(date_create($athlete->passportExpDate), date_create(date('Y-m-d')))->format("%a") : "Expired"}}<br>
            <label>Passport Last Name:</label>
            {{ $athlete->passportLastName }}<br>
            <label>ID Number:</label>
            {{ $athlete->IDNumber }}<br>
            <label>Comments:</label>
            {{ $athlete->comments }}
        </div>
    </div>
@endsection
