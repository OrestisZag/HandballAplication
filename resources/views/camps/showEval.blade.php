@extends('main')

@section('title', '| Camp Evaluation')

@section('style')
    {{ Html::style('css/chart-column.css') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-3 col-md-offset-3">
            <a href="{{ route('camp.getEditAthleteCampEval', $train->id) }}" class="btn btn-block btn-warning">Edit <span class="glyphicon glyphicon-edit"></span></a>
        </div>
        <div class="col-sm-3">
            <a href="{{ route('athlete.show', $adc->athlete_id) }}" class="btn btn-block btn-primary">Back to Athlete's Profile</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-offset-3 space-top">
            <a href="{{ route('camp.exportToPdf', $athlete->id) }}" class="btn btn-block btn-danger">Export To PDF</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 space-top">
            <ul class="list-group">
                <li class="list-group-item text-center"><strong>Name: </strong>{{ $name }}</li>
                <li class="list-group-item text-center"><strong>Train Date: </strong>{{ $train->date }}</li>
                <li class="list-group-item text-center"><strong>Position: </strong>{{ $train->position->fullName }}</li>
                <li class="list-group-item text-center"><strong>Attack Evaluation: </strong>{{ $train->attackEval }}</li>
                <li class="list-group-item text-center"><strong>Defence Evaluation: </strong>{{ $train->defenceEval }}</li>
                <li class="list-group-item text-center"><strong>Attack + Defence Evaluation: </strong>{{ $train->atDefEval }}</li>
                <li class="list-group-item text-center"><strong>Comments: </strong><div class="panel-body">{{ $train->comments }}</div>
            </ul>
        </div>
    </div>
    <div class="css_bar_graph">

        <!-- y_axis labels -->
        <ul class="y_axis">
            <li>10</li><li>8</li><li>6</li><li>4</li><li>2</li><li>0</li>
        </ul>

        <!-- x_axis labels -->
        <ul class="x_axis">
            <li>Attack</li><li>Defense</li><li>Tottal</li>
        </ul>

        <!-- graph -->
        <div class="graph">
            <!-- grid -->
            <ul class="grid">
                <li><!-- 100 --></li>
                <li><!-- 80 --></li>
                <li><!-- 60 --></li>
                <li><!-- 40 --></li>
                <li><!-- 20 --></li>
                <li class="bottom"><!-- 0 --></li>
            </ul>

            <!-- bars -->
            <!-- 250px = 100% -->
            <ul>
                <li class="bar nr_1 red" style="height:  {{ 250/10*$train->attackEval }}px;"><div class="top"></div><div class="bottom"></div><span>{{ $train->attackEval }}</span></li>
                <li class="bar nr_2 orange" style="height: {{ 250/10*$train->defenceEval }}px;"><div class="top"></div><div class="bottom"></div><span>{{ $train->defenceEval }}</span></li>
                <li class="bar nr_3 blue" style="height: {{ 250/10*$train->atDefEval }}px;"><div class="top"></div><div class="bottom"></div><span>{{ $train->atDefEval }}</span></li>
            </ul>
        </div>

        <!-- graph label -->
        <div class="label"><span>Graph: </span>Athlete's evaluation</div>

    </div>
@endsection
