@extends('main')

@section('title', '| Edit Player')

@section('content')
    <h1>Edit {{ $athlete->lastName }} {{ $athlete->firstName }}'s Info:</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('athlete.index') }}">Back To Athletes</a>
            {!! Form::model($athlete, ['route' => ['athlete.update', $athlete->id], 'method' => 'PUT',
             'files' => true]) !!}
                {{ Form::label('lastName', 'Last Name:') }}
                {{ Form::text('lastName', null, ['class' => 'vale bs class']) }}

                {{ Form::label('firstName', 'First Name:') }}
                {{ Form::text('firstName', null, ['class' => 'vale bs class']) }}

                {{ Form::label('birthday', 'Birthday:') }}
                {{ Form::text('birthday', null, ['class' => 'vale bs class']) }}

                {{ Form::label('height', 'Height:') }}
                {{ Form::number('height', null, ['class' => 'vale bs class', 'step' => '0.01']) }}

                {{ Form::label('weight', 'Weight:') }}
                {{ Form::number('weight', null, ['class' => 'vale bs class', 'step' => '0.1']) }}

                {{ Form::label('mobile', 'Mobile Phone:') }}
                {{ Form::tel('mobile', null, ['class' => 'vale bs class']) }}

                {{ Form::label('telephone1', 'Telephone1:') }}
                {{ Form::tel('telephone1', null, ['class' => 'vale bs class']) }}

                {{ Form::label('telephone2', 'Telephone2:') }}
                {{ Form::tel('telephone2', null, ['class' => 'vale bs class']) }}

                {{ Form::label('fax', 'Fax:') }}
                {{ Form::tel('fax', null, ['class' => 'vale bs class']) }}

                {{ Form::label('teamFax', 'Team Fax:') }}
                {{ Form::tel('teamFax', null, ['class' => 'vale bs class']) }}

                {{ Form::label('email1', 'Email1:') }}
                {{ Form::email('email1', null, ['class' => 'vale bs class']) }}

                {{ Form::label('email2', 'Email2:') }}
                {{ Form::email('email2', null, ['class' => 'vale bs class']) }}

                {{ Form::label('country', 'Country:') }}
                {{ Form::text('country', null, ['class' => 'vale bs class']) }}

                {{ Form::label('region', 'Region:') }}
                {{ Form::text('region', null, ['class' => 'vale bs class']) }}

                {{ Form::label('address', 'Address:') }}
                {{ Form::text('address', null, ['class' => 'vale bs class']) }}

                {{ Form::label('postalCode', 'Postal Code:') }}
                {{ Form::text('postalCode', null, ['class' => 'vale bs class']) }}

                {{ Form::label('passportNumber', 'Passport No:') }}
                {{ Form::text('passportNumber', null, ['class' => 'vale bs class']) }}

                {{ Form::label('passportExpDate', 'Passport Expiration Date:') }}
                {{ Form::text('passportExpDate', '', ['class' => 'vale bs class']) }}

                {{ Form::label('passportLastName', 'Passport Last Name:') }}
                {{ Form::text('passportLastName', null, ['class' => 'vale bs class']) }}

                {{ Form::label('IDNumber', 'ID Number:') }}
                {{ Form::text('IDNumber', null, ['class' => 'vale bs class']) }}

                {{ Form::label('photo', 'Upload Athlete\'s photo:') }}
                {{ Form::file('photo') }}

                {{ Form::label('comments', 'Comments:') }}
                {{ Form::textarea('comments', null, ['class' => 'vale bs class']) }}

                {{ Form::submit('Update Athlete\'s Info', ['class' => 'vale bs class']) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $( "#birthday" ).datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: "1920:2100"})
                    .keydown(false);
            $( "#passportExpDate" ).datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true,
                yearRange: "1920:2100"}).keydown(false);
        });
    </script>
@endsection
