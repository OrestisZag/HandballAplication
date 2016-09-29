@extends('main')

@section('title', '| Edit Camp')

@section('style')
{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <a href="{{ route('camp.index') }}" class="btn btn-block btn-primary">Back To Camps</a>
            {!! Form::model($camp, ['route' => ['camp.update', $camp->id], 'method' => 'PUT',
            'data-parsley-validate' => '', 'class' => 'form']) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control', 'required' => '']) }}

                {{ Form::label('place', 'Place:') }}
                {{ Form::text('place', null, ['class' => 'form-control', 'required' => '']) }}

                {{ Form::label('date', 'Date:') }}
                {{ Form::date('date', null, ['class' => 'form-control', 'required' => '']) }}
            {!! Form::close() !!}
        </div>
    </div>
    {{--<div class="row">--}}
        {{--<div class="col-md-4 col-md-offset-4">--}}
            {{--{!! Form::open(['route' => ['camp.destroy', $camp->id], 'method' => 'DELETE']) !!}--}}
                {{--{{ Form::submit('Delete Camp', ['class' => 'btn btn-danger btn-block space-top']) }}--}}
            {{--{!! Form::close() !!}--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

@section('script')
    {!! Html::script('js/parsley.min.js') !!}
    {{--<script>--}}
        {{--$(function() {--}}
            {{--$( "#date" ).datepicker({dateFormat: 'yy-mm-dd', changeMonth: true, changeYear: true, yearRange: "1920:2100"})--}}
                    {{--.keydown(false);--}}
        {{--});--}}
    {{--</script>--}}
@endsection
