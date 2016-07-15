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
            <h3>Personal Info:</h3>
            <label>Birthday:</label>
            {{ $athlete->birthday }}<br>
            <label>Age:</label>
            {{ date_diff(date_create($athlete->birthday), date_create(date("Y-m-d")))->format("%y") }}<br>
            <label>Height:</label>
            {{ $athlete->height }}<strong>m</strong><br>
            <label>Weight:</label>
            {{ $athlete->weight }}<strong>kg</strong>
            <h3>Contact Info:</h3>
            @if($athlete->mobile)
                <label>Mobile:</label>
                {{ $athlete->mobile }}<br>
            @endif
            @if($athlete->telephone1)
                <label>Telephone 1:</label>
                {{ $athlete->telephone1 }}<br>
            @endif
            @if($athlete->telephone2)
                <label>Telephone 2:</label>
                {{ $athlete->telephone2 }}<br>
            @endif
            @if($athlete->fax)
                <label>Fax:</label>
                {{ $athlete->fax }}<br>
            @endif
            @if($athlete->teamFax)
            <label>Team's Fax:</label>
            {{ $athlete->teamFax }}<br>
            @endif
            @if($athlete->email1)
            <label>Email 1:</label>
            {{ $athlete->email1 }}<br>
            @endif
            @if($athlete->email2)
                <label>Email 2:</label>
                {{ $athlete->email2 }}
            @endif
        </div>
        <div class="col-md-3 col-md-offset-1">
            <h3>General Info:</h3>
            <label>Country:</label>
            {{ $athlete->country }}<br>
            <label>Region:</label>
            {{ $athlete->region }}<br>
            <label>Address:</label>
            {{ $athlete->address }}<br>
            @if($athlete->postalCode)
                <label>Postal Code:</label>
                {{ $athlete->postalCode }}<br>
            @endif
            @if($athlete->passportNumber)
                <label>Passport No:</label>
                {{ $athlete->passportNumber }}<br>
                <label>Passport Expiration Date:</label>
                {{ $athlete->passportExpDate }}<br>
                <label>Passport Days To Expire:</label>
                {{ date_diff(date_create($athlete->passportExpDate), date_create(date('Y-m-d')))->format("%R%a") < 0 ?
                 date_diff(date_create($athlete->passportExpDate), date_create(date('Y-m-d')))->format("%a") : "Expired"}}<br>
                <label>Passport Last Name:</label>
                {{ $athlete->passportLastName }}<br>
            @endif
            <label>ID Number:</label>
            {{ $athlete->IDNumber }}<br>
            @if($athlete->comments)
                <label>Comments:</label>
                {{ $athlete->comments }}
            @endif
        </div>
    </div>
@endsection
