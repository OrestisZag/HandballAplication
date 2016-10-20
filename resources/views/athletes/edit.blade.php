@extends('main')

@section('title', '| Edit Player')

@section('style')
    {!! Html::style('css/select2.min.css') !!}
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <h1 class="text-center">Edit {{ $athlete->lastName }} {{ $athlete->firstName }}'s Info:</h1>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <a href="{{ route('athlete.index') }}" class="btn btn-primary btn-block">Back To Athletes</a>
            {!! Form::model($athlete, ['route' => ['athlete.update', $athlete->id], 'method' => 'PUT',
             'files' => true, 'class' => 'form', 'data-parsley-validate' => '']) !!}
                {{ Form::label('lastName', 'Last Name:*', ['class' => 'space-top']) }}
                {{ Form::text('lastName', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '2', 'maxlength' => '40']) }}

                {{ Form::label('firstName', 'First Name:*') }}
                {{ Form::text('firstName', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '2', 'maxlength' => '40']) }}

                {{ Form::label('birthday', 'Birthday:*') }}
                {{ Form::text('birthday', null, ['class' => 'form-control input-sm', 'required' => '']) }}

                {{ Form::label('height', 'Height:') }}
                {{ Form::number('height', null, ['class' => 'form-control input-sm', 'step' => '0.01', 'required' => '',
                   'min' => '0.5', 'max' => '2.5']) }}

                {{ Form::label('weight', 'Weight:') }}
                {{ Form::number('weight', null, ['class' => 'form-control input-sm', 'step' => '0.1', 'required' => '',
                   'min' => '30', 'max' => '150']) }}

                {{ Form::label('position', 'Position: *') }}
                @if(isset($ap[2]))
                    <select name="positions[]" title="positions[]" class="form-control input-sm">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" {{ $position->id == $ap[0]->position->id ? 'selected' : '' }}>{{ $position->fullName }}, {{$position->sortName}}</option>
                        @endforeach
                    </select><br>
                    <select name="positions[]" title="positions[]" class="form-control input-sm">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" {{ $position->id == $ap[1]->position->id ? 'selected' : '' }}>{{ $position->fullName }}, {{$position->sortName}}</option>
                        @endforeach
                    </select><br>
                    <select name="positions[]" title="positions[]" class="form-control input-sm">
                        @foreach($positions as $position)
                            @foreach($athlete->athletePosition as $athletePos)
                                <option value="{{ $position->id }}" {{ $position->id == $ap[2]->position->id ? 'selected' : '' }}>{{ $position->fullName }}, {{$position->sortName}}</option>
                            @endforeach
                        @endforeach
                    </select><br>
                    {{--<div id="inputPosition"></div>--}}
                    {{--<div onclick="addPositions(0)" class="btn btn-warning btn-block space-top">Add Positions</div>--}}
                @elseif(isset($ap[1]))
                    <select name="positions[]" title="positions[]" class="form-control input-sm">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" {{ $position->id == $ap[0]->position->id ? 'selected' : '' }}>{{ $position->fullName }}, {{$position->sortName}}</option>
                        @endforeach
                    </select><br>
                    <select name="positions[]" title="positions[]" class="form-control input-sm">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" {{ $position->id == $ap[1]->position->id ? 'selected' : '' }}>{{ $position->fullName }}, {{$position->sortName}}</option>
                        @endforeach
                    </select>
                    <div id="inputPosition"></div>
                    <div onclick="addPositions(1)" class="btn btn-warning btn-block space-top">Add Positions</div>
                @elseif(isset($ap[0]))
                    <select name="positions[]" title="positions[]" class="form-control input-sm">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" {{ $position->id == $ap[0]->position->id ? 'selected' : '' }}>{{ $position->fullName }}, {{$position->sortName}}</option>
                        @endforeach
                    </select>
                    <div id="inputPosition"></div>
                    <div onclick="addPositions(2)" class="btn btn-warning btn-block space-top">Add Positions</div>
                @else
                    <select name="positions[]" title="positions[]" class="form-control input-sm">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->fullName }}, {{$position->sortName}}</option>
                        @endforeach
                    </select>
                    <div id="inputPosition"></div>
                    <div onclick="addPositions(2)" class="btn btn-warning btn-block space-top">Add Positions</div>
                @endif

                {{ Form::label('mobile', 'Mobile Phone:') }}
                {{ Form::tel('mobile', null, ['class' => 'form-control input-sm', 'minlength' => '10',
                   'maxlength' => '15']) }}

                {{ Form::label('telephone1', 'Telephone1:') }}
                {{ Form::tel('telephone1', null, ['class' => 'form-control input-sm', 'minlength' => '10',
                   'maxlength' => '15']) }}

                {{ Form::label('telephone2', 'Telephone2:') }}
                {{ Form::tel('telephone2', null, ['class' => 'form-control input-sm', 'minlength' => '10',
                   'maxlength' => '15']) }}

                {{ Form::label('fax', 'Fax:') }}
                {{ Form::tel('fax', null, ['class' => 'form-control input-sm', 'minlength' => '10',
                   'maxlength' => '15']) }}

                {{ Form::label('email1', 'Email1:') }}
                {{ Form::email('email1', null, ['class' => 'form-control input-sm', 'email' => '']) }}

                {{ Form::label('email2', 'Email2:') }}
                {{ Form::email('email2', null, ['class' => 'form-control input-sm', 'email' => '']) }}

                {{ Form::label('country', 'Country:*') }}
                {{ Form::text('country', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '4', 'maxlength' => '40']) }}

                {{ Form::label('region', 'Region:*') }}
                {{ Form::text('region', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '4', 'maxlength' => '40']) }}

                {{ Form::label('address', 'Address:*') }}
                {{ Form::text('address', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '4', 'maxlength' => '255']) }}

                {{ Form::label('postalCode', 'Postal Code:') }}
                {{ Form::text('postalCode', null, ['class' => 'form-control input-sm', 'maxlength' => '10']) }}

                {{ Form::label('passportNumber', 'Passport No:') }}
                {{ Form::text('passportNumber', null, ['class' => 'form-control input-sm', 'maxlength' => '50']) }}

                {{ Form::label('passportExpDate', 'Passport Expiration Date:') }}
                {{ Form::text('passportExpDate', '', ['class' => 'form-control input-sm']) }}

                {{ Form::label('passportLastName', 'Passport Last Name:') }}
                {{ Form::text('passportLastName', null, ['class' => 'form-control input-sm', 'minlength' => '2',
                   'maxlength' => '40']) }}

                {{ Form::label('passportFirstName', 'Passport First Name:') }}
                {{ Form::text('passportFirstName', null, ['class' => 'form-control input-sm', 'minlength' => '2',
                   'maxlength' => '40']) }}

                {{ Form::label('IDNumber', 'ID Number:') }}
                {{ Form::text('IDNumber', null, ['class' => 'form-control input-sm', 'maxlength' => '10']) }}

                @if($athlete->photo == null)
                    {{ Form::label('photo', 'Upload Athlete\'s photo:') }}
                    <p>{{ $athlete->lastName }} {{ $athlete->firstName }}'s photo is not set yet!</p>
                @else
                    {{ Form::label('photo', 'Upload New Athlete\'s photo:') }}
                    {{ Html::image("athletePhoto/$athlete->id.png", null, ['width' => '200', 'height' => '280'])}}
                @endif
                {{ Form::file('photo', ['class' => 'btn btn-primary btn-block']) }}

                {{ Form::label('current', 'Athlete\'s Current Team:') }}
                @foreach($athlete->athleteDataTeams as $team)
                    @if($team->currentTeam == true)
                        {{ $team->team->name }} <strong>From: </strong>{{ $team->signed }}
                    @endif
                @endforeach
                <br>
                {{ Form::label('teams', 'New Athlete\'s Current Team:') }}
                <select class="form-control input-sm select2-team" name="teams" title="team" multiple="multiple">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('signed', 'Sign Year:') }}
                <select name="signed" title="signed">
                    @for($starting_year = date('Y', strtotime('-20 year')); $starting_year <= date('Y');
                        $starting_year++)
                        <option value="{{ $starting_year }}" selected="{{ date('Y') }}">{{ $starting_year }}</option>
                    @endfor
                </select><br>

                {{ Form::label('oldTeamsAll', 'Old Teams:') }}
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
                            @if($team->currentTeam == false)
                                <tr>
                                    <td>{{ $team->team->name }}</td>
                                    <td class="text-center">{{ $team->signed }}</td>
                                    <td class="text-center">{{ $team->left }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                {{ Form::label('oldTeams', 'Set More Old Teams:') }}
                <select class="form-control input-sm select2-team" name="oldTeams[]" title="team" multiple="multiple">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('signed_old', 'Sign Year:') }}
                <select name="signed_old[]" title="signed_old[]">
                    @for($starting_year = date('Y', strtotime('-20 year')); $starting_year <= date('Y');
                        $starting_year++)
                        <option value="{{ $starting_year }}" selected="{{ date('Y') }}">{{ $starting_year }}</option>
                    @endfor
                </select>

                {{ Form::label('left', 'Left Year:') }}
                <select name="left[]" title="left[]">
                    @for($starting_year = date('Y', strtotime('-20 year')); $starting_year <= date('Y');
                        $starting_year++)
                        <option value="{{ $starting_year }}" selected="{{ date('Y') }}">{{ $starting_year }}</option>
                    @endfor
                </select>

                <div id="select"></div>
                <input type="button" onclick="addInput();" name="add" value="Add Previous Teams" class="btn btn-warning btn-block"/><br>

                {{ Form::label('camps', 'Camps that athlete took part:') }}
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
                            <td>{{ $camp->camp->title }}</td>
                            <td>{{ $camp->camp->place }}</td>
                            <td>{{ $camp->camp->date }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ Form::label('camps', 'Add more camps that athlete took part:') }}
                {{ Form::select('camps[]', $camps, null, ['class' => 'form-control select2-multi', 'multiple'=>'multiple']) }}

                {{ Form::label('comments', 'Comments:', ['class' => 'space-top']) }}
                {{ Form::textarea('comments', null, ['class' => 'form-control input-sm', 'maxlength' => '500']) }}

                {{ Form::submit('Update Athlete\'s Info', ['class' => 'btn btn-success btn-block space-top']) }}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {!! Form::open(['route' => ['athlete.destroy', $athlete->id], 'method' => 'DELETE']) !!}
                {{ Form::submit('Delete Athlete', ['class' => 'btn btn-danger btn-block space-top']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    {!! Html::script('js/select2.min.js') !!}
    {!! Html::script('js/parsley.min.js') !!}
    <script>
        function addInput() {
            var str =
                    '<select class="form-control input-sm select2-team" name="oldTeams[]" title="oldTeams[]" multiple="multiple">' +
                    '@foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option> ' +
                    '@endforeach '+
                    '</select>'+
                    '<label id="signed_old">Sign Year &nbsp;</label>'+
                    '<select name="signed_old[]" title="signed_old[]">' +
                    '@for($starting_year = date('Y', strtotime('-20 year')); $starting_year <= date('Y'); $starting_year++)
                            <option value="{{ $starting_year }}" selected="{{ date('Y') }}">{{ $starting_year }}</option> ' +
                    '@endfor '+
                    '</select>'+
                    '<label id="left" style="margin-left: 10px;">Left Year &nbsp;</label>'+
                    '<select name="left[]" title="left[]">' +
                    '@for($starting_year = date('Y', strtotime('-20 year')); $starting_year <= date('Y'); $starting_year++)
                            <option value="{{ $starting_year }}" selected="{{ date('Y') }}">{{ $starting_year }}</option> ' +
                    '@endfor '+
                    '</select>';

            document.getElementById( 'select' ).insertAdjacentHTML( 'beforeend', str );
            $('.select2-team').select2({
                maximumSelectionLength: 1
            });
        }

        var counter = 0;
        function addPositions(max) {
            var pos =
                    '<br><select class="form-control input-sm" name="positions[]" title="positions[]">' +
                    '@foreach($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->fullName }}'+', '+'{{ $position->sortName }}</option> ' +
                    '@endforeach '+
                    '</select>';
            if(counter < max) {
                document.getElementById( 'inputPosition' ).insertAdjacentHTML( 'beforeend', pos );
            }
            counter++;
        }

        $(function() {
            $( "#birthday" ).datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: "1920:2100"})
                    .keydown(false);
            $( "#passportExpDate" ).datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true,
                yearRange: "1920:2100"}).keydown(false);
        });
        $('.select2-team').select2({
            maximumSelectionLength: 1
        });
        $('.select2-multi').select2();
    </script>
@endsection
