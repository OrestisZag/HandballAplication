@extends('main')

@section('title', "| $athlete->lastName $athlete->firstName")

@section('content')
    <h1>{{ $athlete->lastName }} {{ $athlete->firstName }}</h1>
    <a href="{{ route('athlete.index') }}">Back To Athletes</a>
    <div class="row">
        <div class="col-md-3">
            @if($athlete->photo == null)
                <p>{{ $athlete->lastName }} {{ $athlete->firstName }}'s not set yet!</p>
            @else
                {{ Html::image("athletePhoto/$athlete->id.png", null, ['width' => '300', 'height' => '400']) }}
            @endif
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
            <label>Mobile:</label>
            @if($athlete->mobile)
                {{ $athlete->mobile }}<br>
            @else
                -<br>
            @endif
            <label>Telephone 1:</label>
            @if($athlete->telephone1)
                {{ $athlete->telephone1 }}<br>
            @else
                -<br>
            @endif
            <label>Telephone 2:</label>
            @if($athlete->telephone2)
                {{ $athlete->telephone2 }}<br>
            @else
                -<br>
            @endif
            <label>Fax:</label>
            @if($athlete->fax)
                {{ $athlete->fax }}<br>
            @else
                -<br>
            @endif
            <label>Team's Fax:</label>
            @if($athlete->teamFax)
                {{ $athlete->teamFax }}<br>
            @else
                -<br>
            @endif
            <label>Email 1:</label>
            @if($athlete->email1)
                {{ $athlete->email1 }}<br>
            @else
                -<br>
            @endif
            <label>Email 2:</label>
            @if($athlete->email2)
                {{ $athlete->email2 }}
            @else
                -<br>
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
            <label>Postal Code:</label>
            @if($athlete->postalCode)
                {{ $athlete->postalCode }}<br>
            @else
                -<br>
            @endif
            <label>Passport No:</label>
            @if($athlete->passportNumber)
                {{ $athlete->passportNumber }}<br>
            @else
                -<br>
            @endif
            <label>Passport Expiration Date:</label>
            @if($athlete->passportExpDate == 0000-00-00)
                -<br>
            @elseif($athlete->passportExpDate)
                {{ $athlete->passportExpDate }}<br>
            @else
                -<br>
            @endif
            <label>Passport Days To Expire:</label>
            @if($athlete->passportExpDate == 0000-00-00)
                -<br>
            @elseif($athlete->passportExpDate)
                {{ date_diff(date_create($athlete->passportExpDate), date_create(date('Y-m-d')))->format("%R%a") < 0 ?
                 date_diff(date_create($athlete->passportExpDate), date_create(date('Y-m-d')))->format("%a") : "Expired"}}<br>
            @endif
            <label>Passport Last Name:</label>
            @if($athlete->passportLastName)
                {{ $athlete->passportLastName }}<br>
            @else
                -<br>
            @endif
            <label>ID Number:</label>
            @if($athlete->IDNumber)
                {{ $athlete->IDNumber }}<br>
            @else
                -<br>
            @endif
            <label>Comments:</label>
            @if($athlete->comments)
                {{ $athlete->comments }}
            @else
                -<br>
            @endif
        </div>
    </div>
@endsection
