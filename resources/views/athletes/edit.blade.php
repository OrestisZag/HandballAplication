@extends('main')

@section('title', '| Edit Player')

@section('style')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    <h1 class="text-center">Edit {{ $athlete->lastName }} {{ $athlete->firstName }}'s Info:</h1>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <a href="{{ route('athlete.index') }}" class="btn btn-primary btn-block">Back To Athletes</a>
            {!! Form::model($athlete, ['route' => ['athlete.update', $athlete->id], 'method' => 'PUT',
             'files' => true, 'class' => 'form']) !!}
                {{ Form::label('lastName', 'Last Name:', ['class' => 'space-top']) }}
                {{ Form::text('lastName', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('firstName', 'First Name:') }}
                {{ Form::text('firstName', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('birthday', 'Birthday:') }}
                {{ Form::text('birthday', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('height', 'Height:') }}
                {{ Form::number('height', null, ['class' => 'form-control input-sm', 'step' => '0.01']) }}

                {{ Form::label('weight', 'Weight:') }}
                {{ Form::number('weight', null, ['class' => 'form-control input-sm', 'step' => '0.1']) }}

                {{ Form::label('mobile', 'Mobile Phone:') }}
                {{ Form::tel('mobile', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('telephone1', 'Telephone1:') }}
                {{ Form::tel('telephone1', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('telephone2', 'Telephone2:') }}
                {{ Form::tel('telephone2', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('fax', 'Fax:') }}
                {{ Form::tel('fax', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('email1', 'Email1:') }}
                {{ Form::email('email1', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('email2', 'Email2:') }}
                {{ Form::email('email2', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('country', 'Country:') }}
                {{ Form::text('country', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('region', 'Region:') }}
                {{ Form::text('region', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('address', 'Address:') }}
                {{ Form::text('address', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('postalCode', 'Postal Code:') }}
                {{ Form::text('postalCode', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('passportNumber', 'Passport No:') }}
                {{ Form::text('passportNumber', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('passportExpDate', 'Passport Expiration Date:') }}
                {{ Form::text('passportExpDate', '', ['class' => 'form-control input-sm']) }}

                {{ Form::label('passportLastName', 'Passport Last Name:') }}
                {{ Form::text('passportLastName', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('IDNumber', 'ID Number:') }}
                {{ Form::text('IDNumber', null, ['class' => 'form-control input-sm']) }}

                @if($athlete->photo == null)
                    {{ Form::label('photo', 'Upload Athlete\'s photo:') }}
                    <p>{{ $athlete->lastName }} {{ $athlete->firstName }}'s photo is not set yet!</p>
                @else
                    {{ Form::label('photo', 'Upload New Athlete\'s photo:') }}
                    {{ Html::image("athletePhoto/$athlete->id.png", null, ['width' => '200', 'height' => '280'])}}
                @endif
                {{ Form::file('photo') }}

                {{ Form::label('teams', 'Athlete\'s Current Team:') }}
                @foreach($athlete->athleteDataTeams as $team)
                    @if($team->currentTeam == true)
                        {{ $team->team->name }}
                    @endif
                @endforeach
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

                {{ Form::label('oldTeams', 'Old Teams:') }}
                @foreach($athlete->athleteDataTeams as $team)
                    @if($team->currentTeam == false)
                        {{ $team->team->name }} <strong>|</strong>
                    @endif
                @endforeach
                <select class="form-control input-sm select2-team" name="oldTeams[]" title="team" multiple="multiple">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('comments', 'Comments:') }}
                {{ Form::textarea('comments', null, ['class' => 'form-control input-sm']) }}

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
    <script>
        $(function() {
            $( "#birthday" ).datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: "1920:2100"})
                    .keydown(false);
            $( "#passportExpDate" ).datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true,
                yearRange: "1920:2100"}).keydown(false);
        });
        $('.select2-team').select2({
            maximumSelectionLength: 1
        });
        {{--$('.select2-team').select2().val({!! json_encode($athlete->athleteDataTeams->team()->getRelatedIds()) !!}).trigger('change');--}}
//        $('.select2-old').select2();
        {{--$('.select2-old').select2().val({!! json_encode($athlete->athleteDataTeams()->getRelatedIds()) !!}).trigger('change');--}}
    </script>

@endsection
