@extends('main')

@section('title', '| Athlete Evaluations')

@section('style')
    {!! Html::style('css/select2.min.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            {!! Form::open(['route' => 'line.store', 'class' => 'form']) !!}
                {{ Form::label('adc1', 'Select First Athlete') }}
                <select name="adc1" title="adc1" multiple="multiple" class="select2-athlete input-sm form-control">
                    @foreach($entities as $entity)
                        <option value="{{$entity['Id']}}">{{$entity['FirstName']}} {{$entity['LastName']}}</option>
                    @endforeach
                </select>

                {{ Form::label('adc2', 'Select Second Athlete') }}
                <select name="adc2" title="adc2" multiple="multiple" class="select2-athlete input-sm form-control">
                    @foreach($entities as $entity)
                        <option value="{{$entity['Id']}}">{{$entity['FirstName']}} {{$entity['LastName']}}</option>
                    @endforeach
                </select>

                {{ Form::label('adc3', 'Select Third Athlete') }}
                <select name="adc3" title="adc3" multiple="multiple" class="select2-athlete input-sm form-control">
                    @foreach($entities as $entity)
                        <option value="{{$entity['Id']}}">{{$entity['FirstName']}} {{$entity['LastName']}}</option>
                    @endforeach
                </select>

                {{ Form::label('adc4', 'Select Fourth Athlete') }}
                <select name="adc4" title="adc4" multiple="multiple" class="select2-athlete input-sm form-control">
                    @foreach($entities as $entity)
                        <option value="{{$entity['Id']}}">{{$entity['FirstName']}} {{$entity['LastName']}}</option>
                    @endforeach
                </select>

                {{ Form::label('adc5', 'Select Fifth Athlete') }}
                <select name="adc5" title="adc5" multiple="multiple" class="select2-athlete input-sm form-control">
                    @foreach($entities as $entity)
                        <option value="{{$entity['Id']}}">{{$entity['FirstName']}} {{$entity['LastName']}}</option>
                    @endforeach
                </select>

                {{ Form::label('adc6', 'Select Sixth Athlete') }}
                    <select name="adc6" title="adc6" multiple="multiple" class="select2-athlete input-sm form-control">
                        @foreach($entities as $entity)
                            <option value="{{$entity['Id']}}">{{$entity['FirstName']}} {{$entity['LastName']}}</option>
                        @endforeach
                    </select>

                {{ Form::label('adc7', 'Select Seventh Athlete') }}
                    <select name="adc7" title="adc7" multiple="multiple" class="select2-athlete input-sm form-control">
                        @foreach($entities as $entity)
                            <option value="{{$entity['Id']}}">{{$entity['FirstName']}} {{$entity['LastName']}}</option>
                        @endforeach
                    </select>

                {{Form::submit('Create Line', ['class' => 'btn btn-primary btn-block space-top'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    {!! Html::script('js/select2.min.js') !!}
    <script>
        $('.select2-athlete').select2({
            maximumSelectionLength: 1
        });
    </script>
@endsection
