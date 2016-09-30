@extends('main')

@section('title', '| Create')

@section('style')
    {!! Html::style('css/select2.min.css') !!}
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1>Create Athlete Profile</h1>
            <a href="{{ route('athlete.index') }}" class="btn btn-primary btn-block">Back To Athletes</a>
            {!! Form::open(['route' => 'athlete.store', 'data-parsley-validate' => '', 'files' => true,
                'class' => 'form']) !!}

                {{ Form::label('lastName', 'Last Name: *', ['class' => 'space-top']) }}
                {{ Form::text('lastName', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '2', 'maxlength' => '40']) }}

                {{ Form::label('firstName', 'First Name: *') }}
                {{ Form::text('firstName', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '2', 'maxlength' => '40']) }}

                {{ Form::label('birthday', 'Birthday: *') }}
                {{ Form::date('birthday', null, ['class' => 'form-control input-sm', 'required' => '']) }}

                {{ Form::label('height', 'Height: *') }}
                {{ Form::number('height', null, ['class' => 'form-control input-sm', 'step' => '0.01', 'required' => '',
                   'min' => '0.5', 'max' => '2.5']) }}

                {{ Form::label('weight', 'Weight: *') }}
                {{ Form::number('weight', null, ['class' => 'form-control input-sm', 'step' => '0.1', 'required' => '',
                   'min' => '30', 'max' => '150']) }}

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
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
                {{ Form::label('email1', 'Email1:') }}
                {{ Form::email('email1', null, ['class' => 'form-control input-sm', 'email' => '']) }}

                {{ Form::label('email2', 'Email2:') }}
                {{ Form::email('email2', null, ['class' => 'form-control input-sm', 'email' => '']) }}

                {{ Form::label('country', 'Country: *') }}
                {{ Form::text('country', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '4', 'maxlength' => '40']) }}

                {{ Form::label('region', 'Region: *') }}
                {{ Form::text('region', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '4', 'maxlength' => '40']) }}

                {{ Form::label('address', 'Address: *') }}
                {{ Form::text('address', null, ['class' => 'form-control input-sm', 'required' => '',
                   'minlength' => '5', 'maxlength' => '255']) }}

                {{ Form::label('postalCode', 'Postal Code:') }}
                {{ Form::text('postalCode', null, ['class' => 'form-control input-sm', 'maxlength' => '10']) }}

                {{ Form::label('passportNumber', 'Passport No:') }}
                {{ Form::text('passportNumber', null, ['class' => 'form-control input-sm', 'maxlength' => '50']) }}

                {{ Form::label('passportExpDate', 'Passport Expiration Date:') }}
                {{ Form::date('passportExpDate', null, ['class' => 'form-control input-sm']) }}

                {{ Form::label('passportLastName', 'Passport Last Name:') }}
                {{ Form::text('passportLastName', null, ['class' => 'form-control input-sm', 'minlength' => '2',
                   'maxlength' => '40']) }}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
                {{ Form::label('IDNumber', 'ID Number:') }}
                {{ Form::text('IDNumber', null, ['class' => 'form-control input-sm', 'maxlength' => '10']) }}

                {{ Form::label('photo', 'Upload Athlete\'s photo:') }}
                {{ Form::file('photo') }}

                {{ Form::label('teams', 'Athlete\'s Current Team:') }}
                <select class="form-control input-sm select2-team" name="teams" title="teams" multiple="multiple">
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

                {{ Form::label('oldTeams', 'Athlete\'s Previous Teams:') }}
                <select class="form-control input-sm select2-team" name="oldTeams[]" title="oldTeams[]" multiple="multiple">
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
                <input type="button" onclick="addInput();" name="add" value="+ Add" class="btn btn-success pull-right"/><br>

                {{ Form::label('camps', 'Camps that athlete took part:') }}
                <select class="form-control select2-multi" name="camps[]" title="camps[]" multiple="multiple">
                    @foreach($camps as $camp)
                        <option value="{{ $camp->id }}">{{ $camp->title }}, {{ date('Y', strtotime($camp->date)) }}</option>
                    @endforeach
                </select>

                {{ Form::label('comments', 'Comments:') }}
                {{ Form::textarea('comments', null, ['class' => 'form-control', 'maxlength' => '500']) }}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{ Form::submit('Create Player\'s Profile', ['class' => 'bnt btn-success btn-block btn-lg space-top']) }}
            {{--</div>--}}
        </div>
            {!! Form::close() !!}
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

//        $(function() {
//            $( "#birthday" ).datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: "1920:2100"})
//                .keydown(false);
//            $( "#passportExpDate" ).datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true,
//                yearRange: "1920:2100"}).keydown(false);
//        });

        $('.select2-team').select2({
            maximumSelectionLength: 1
        });
        $('.select2-multi').select2();
    </script>
@endsection
