@extends('main')
<?php $athleteShow = $athlete->lastName.' '.$athlete->firstName?>
@section('title', "| $athleteShow")

@section('content')
    <h1>{{ $athlete->lastName }} {{ $athlete->firstName }}</h1>
    <h4>Position:</h4>
    <strong>1st Position: </strong> {{ $ap[0]->position->fullName }}
    @if(isset($ap[1]))
        <strong>2nd Position: </strong> {{ $ap[1]->position->fullName }}
    @endif
    @if(isset($ap[2]))
        <strong>3rd Position: </strong> {{ $ap[2]->position->fullName }}
    @endif
    <a href="{{ route('athlete.index') }}" class="btn btn-primary pull-right">Back To Athletes</a>
    <div class="row">
        <div class="col-md-3 space-top">
            @if($athlete->photo == null)
                <p>{{ $athlete->lastName }} {{ $athlete->firstName }}'s photo is not set yet!</p>
            @else
                {{ Html::image("athletePhoto/$athlete->id.png", null, ['width' => '300', 'height' => '380']) }}
            @endif
        </div>
        <div class="col-md-3 col-md-offset-1">
            <h3>Personal Info:</h3>
            <label>Birthday:</label>
            {{ $athlete->birthday }}<br>
            <label>Age:</label>
            {{ date_diff(date_create($athlete->birthday), date_create(date("Y-m-d")))->format("%y") }}<br>
            <label>Height:</label>
            @if($athlete->height > 0)
                {{ $athlete->height }}<strong>m</strong><br>
            @else
                -<br>
            @endif
            <label>Weight:</label>
            @if($athlete->weight > 0)
                {{ $athlete->weight }}<strong>kg</strong><br>
            @else
                -<br>
            @endif
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
            <label>Passport First Name:</label>
            @if($athlete->passportFirstName)
                {{ $athlete->passportFirstName }}<br>
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
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <h3>Teams</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <label>Current Team:</label>
            <table class="table">
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Sign Year</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($athlete->athleteDataTeams as $team)
                            @if($team->currentTeam == 1)
                                <td>
                                    <a href="{{ route('team.show', $team->team_id) }}">{{ $team->team->name }}</a>
                                </td>
                                <td>
                                    {{ $team->signed }}
                                </td>
                            @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <label>Old Team:</label>
            <table class="table">
                <thead>
                <tr>
                    <th>Team Name</th>
                    <th>Sign Year</th>
                    <th>Left Year</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($athlete->athleteDataTeams as $team)
                        @if($team->currentTeam == 0)
                            <tr>
                                <td>
                                    <a href="{{ route('team.show', $team->team_id) }}">{{ $team->team->name }}</a>
                                </td>
                                <td>
                                    {{ $team->signed }}
                                </td>
                                <td>
                                    {{ $team->left }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <h3>Camps</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Place</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($athlete->athleteDataCamps as $camp)
                    <tr>
                        <td>
                            <a href="{{ route('camp.getAthleteCampEval', [$athlete->id, $camp->camp->id]) }}">{{ $camp->camp->title }}</a>
                        </td>
                        <td>
                            {{ $camp->camp->place }}
                        </td>
                        <td>
                            {{ $camp->camp->date }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <label class="text-center"><strong>***Click On Camp's Name to Evaluate Athlete's Presence***</strong></label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            <table class="table">
                <thead>
                <tr>
                    <th>Event</th>
                    <th>Category</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($athlete->athleteEvent as $event)
                    <tr>
                        <td>
                            <a href="{{ route('event.show', $event->id) }}">{{ $event->event->name }}</a>
                        </td>
                        <td>
                            {{ $event->event->category->name }}
                        </td>
                        <td>
                            {{ $event->event->date }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
