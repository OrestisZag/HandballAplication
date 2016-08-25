@extends('main')

@section('title', '| Create')

@section('style')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    <h1>Create Athlete Profile</h1>
    <a href="{{ route('athlete.index') }}" class="text-right">Back To Athletes</a>
    <div class="row">
        <div class="col-md-4">
            {!! Form::open(['route' => 'athlete.store', 'files' => true]) !!}
                {{ Form::label('lastName', 'Last Name:') }}
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
        </div>
        <div class="col-md-4">
                {{ Form::label('teamFax', 'Team Fax:') }}
                {{ Form::tel('teamFax', null, ['class' => 'form-control input-sm']) }}

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
                {{ Form::text('passportExpDate', null, ['class' => 'form-control input-sm']) }}
        </div>
        <div class="col-md-4">
                {{ Form::label('passportLastName', 'Passport Last Name:') }}
                {{ Form::text('passportLastName', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('IDNumber', 'ID Number:') }}
                {{ Form::text('IDNumber', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('photo', 'Upload Athlete\'s photo:') }}
                {{ Form::file('photo') }}

                {{ Form::label('teams', 'Athlete\'s Current Team:') }}
                <select class="form-control input-sm select2-team" name="teams[]" title="team" multiple="multiple">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('from_date', 'From:') }}
                {{ Form::text('from_date', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('oldTeams', 'Athlete\'s Previous Teams:') }}
                <select class="form-control input-sm select2-old-team" name="teams[]" title="oldTeams" multiple="multiple">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('old_from_date', 'From:') }}
                {{ Form::text('old_from_date', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('to_date', 'To:') }}
                {{ Form::text('to_date', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('comments', 'Comments:') }}
                {{ Form::textarea('comments', null, ['class' => 'form-control']) }}

                {{ Form::submit('Create Player\'s Profile', ['class' => 'bnt btn-success btn-block btn-lg']) }}
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
        $( "#from_date" ).datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true,
            yearRange: "1920:2100"}).keydown(false);
        $( "#to_date" ).datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true,
            yearRange: "1920:2100"}).keydown(false);
    });
    $('.select2-team').select2({
        maximumSelectionLength: 1
    });
    $('.select2-old-team').select2();
    </script>
@endsection
