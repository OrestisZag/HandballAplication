@extends('main')

<?php $campShow = $camp->title?>
@section('title', "| $campShow")

@section('style')
    {{ Html::style('css/chart-column.css') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <a href="{{ route('camp.index') }}" class="btn btn-primary pull-right">Back To Camps</a>
            <button id="cmd" class="btn btn-danger pull-right" style="margin-right: 10px;">Export To PDF</button>
        </div>
    </div>
<div id="pdf-content">
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <h1>{{ $camp->title }}</h1>
            <label>Place:</label>
            {{ $camp->place }}<br>
            <label>Date:</label>
            {{ $camp->date }}
        </div>
        <div class="col-md-6 col-md-offset-4">
            <h3>Participated Athletes</h3>
            <ol>
                @foreach($athletes as $athlete)
                    <li><a href="{{ route('athlete.show', $athlete->id) }}">{{ $athlete->lastName }} {{ $athlete->firstName }}</a></li>
                @endforeach
            </ol>
        </div>
    </div>
    <div class="row">
        <?php $gk = 0; $gkat = 0; $gkdef = 0; $gkAtDef = 0;?>
        @foreach($camps as $trains)
            @foreach($trains as $train)
                @if($train->position_id == 1)
                    <?php
                    $gk++;
                    $gkat = $gkat + $train->attackEval;
                    $gkdef = $gkdef + $train->defenceEval;
                    $gkAtDef = $gkAtDef + $train->atDefEval;
                    ?>
                @endif
            @endforeach
        @endforeach
        <?php $ex = 0; $exat = 0; $exdef = 0; $exAtDef = 0;?>
        @foreach($camps as $trains)
            @foreach($trains as $train)
                @if($train->position_id == 2 || $train->position_id == 3)
                    <?php
                    $ex++;
                    $exat = $exat + $train->attackEval;
                    $exdef = $exdef + $train->defenceEval;
                    $exAtDef = $exAtDef + $train->atDefEval;
                    ?>
                @endif
            @endforeach
        @endforeach
        <?php $md = 0; $mdat = 0; $mddef = 0; $mdAtDef = 0;?>
        @foreach($camps as $trains)
            @foreach($trains as $train)
                @if($train->position_id == 4 || $train->position_id == 5 || $train->position_id == 7)
                    <?php
                    $md++;
                    $mdat = $mdat + $train->attackEval;
                    $mddef = $mddef + $train->defenceEval;
                    $mdAtDef = $mdAtDef + $train->atDefEval;
                    ?>
                @endif
            @endforeach
        @endforeach

        @if($gk != 0)
            <div class="col-md-3">
                <h4 class="text-center">All Goalkeeper Evaluation</h4>
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
                            <li class="bar nr_1 red" style="height:  {{ 250/10*$gkat/$gk }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format($gkat/$gk,2,'.','') }}</span></li>
                            <li class="bar nr_2 orange" style="height: {{ 250/10*$gkdef/$gk }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format($gkdef/$gk,2,'.','') }}</span></li>
                            <li class="bar nr_3 blue" style="height: {{ 250/10*$gkAtDef/$gk }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format($gkAtDef/$gk,2,'.','') }}</span></li>
                        </ul>
                    </div>
                    <!-- graph label -->
                    <label class="label"><span>Graph: </span>Goalkeeper evaluation</label>
                </div>
            </div>
        @endif
        @if($ex != 0)
            <div class="col-md-3 col-md-offset-1">
                <h4 class="text-center">All Extrem Evaluation</h4>
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
                            <li class="bar nr_1 red" style="height:  {{ 250/10*$exat/$ex }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format($exat/$ex,2,'.','') }}</span></li>
                            <li class="bar nr_2 orange" style="height: {{ 250/10*$exdef/$ex }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format($exdef/$ex,2,'.','') }}</span></li>
                            <li class="bar nr_3 blue" style="height: {{ 250/10*$exAtDef/$ex }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format($exAtDef/$ex,2,'.','') }}</span></li>
                        </ul>
                    </div>
                    <!-- graph label -->
                    <label class="label"><span>Graph: </span>Extrem evaluation</label>
                </div>
            </div>
        @endif
        @if($md != 0)
            <div class="col-md-3 col-md-offset-1">
                <h4 class="text-center">All Midfielder Evaluation</h4>
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
                            <li class="bar nr_1 red" style="height:  {{ 250/10*$mdat/$md }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format($mdat/$md,2,'.','') }}</span></li>
                            <li class="bar nr_2 orange" style="height: {{ 250/10*$mddef/$md }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format($mddef/$md,2,'.','') }}</span></li>
                            <li class="bar nr_3 blue" style="height: {{ 250/10*$mdAtDef/$md }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format($mdAtDef/$md,2,'.','') }}</span></li>
                        </ul>
                    </div>
                    <!-- graph label -->
                    <label class="label"><span>Graph: </span>Midfielders evaluation</label>
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <?php $pv = 0; $pvat = 0; $pvdef = 0; $pvAtDef = 0;?>
        @foreach($camps as $trains)
            @foreach($trains as $train)
                @if($train->position_id == 6)
                    <?php
                    $pv++;
                    $pvat = $pvat + $train->attackEval;
                    $pvdef= $pvdef + $train->defenceEval;
                    $pvAtDef = $pvAtDef + $train->atDefEval;
                    ?>
                @endif
            @endforeach
        @endforeach
        @if($pv != 0)
            <div class="col-md-3 col-md-offset-2">
                <h4 class="text-center">All Pivot Evaluation</h4>
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
                            <li class="bar nr_1 red" style="height:  {{ 250/10*$pvat/$pv }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format($pvat/$pv,2,'.','') }}</span></li>
                            <li class="bar nr_2 orange" style="height: {{ 250/10*$pvdef/$pv }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format($pvdef/$pv,2,'.','') }}</span></li>
                            <li class="bar nr_3 blue" style="height: {{ 250/10*$pvAtDef/$pv }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format($pvAtDef/$pv,2,'.','') }}</span></li>
                        </ul>
                    </div>
                    <!-- graph label -->
                    <label class="label"><span>Graph: </span>Pivot Evaluation</label>
                </div>
            </div>
        @endif
        @if($gk != 0 || $ex != 0 || $md != 0 || $pv != 0)
            <div class="col-md-3 col-md-offset-1">
                <h4 class="text-center">All Athlete Evaluation</h4>
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
                            <li class="bar nr_1 red" style="height:  {{ 250/10*($gkat+$exat+$mdat+$pvat)/($gk+$ex+$md+$pv) }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format(($gkat+$exat+$mdat+$pvat)/($gk+$ex+$md+$pv),2,'.','') }}</span></li>
                            <li class="bar nr_2 orange" style="height: {{ 250/10*($gkdef+$exdef+$mddef+$pvdef)/($gk+$ex+$md+$pv) }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format(($gkdef+$exdef+$mddef+$pvdef)/($gk+$ex+$md+$pv),2,'.','') }}</span></li>
                            <li class="bar nr_3 blue" style="height: {{ 250/10*($gkAtDef+$exAtDef+$mdAtDef+$pvAtDef)/($gk+$ex+$md+$pv) }}px;"><div class="top"></div><div class="bottom"></div><span>{{ number_format(($gkAtDef+$exAtDef+$mdAtDef+$pvAtDef)/($gk+$ex+$md+$pv),2,'.','') }}</span></li>
                        </ul>
                    </div>
                    <!-- graph label -->
                    <label class="label"><span>Graph: </span>Pivot Evaluation</label>
                </div>
            </div>
        @endif
    </div>
<div>
@endsection

    @section('script')
        <script>
            $("#pdf-content").css("background-color", "white");
            var doc = new jsPDF('l', 'mm', [450, 390]);

            $('#cmd').click(function () {
                doc.addHTML($('#pdf-content'), function() {
                    doc.save('{{$camp->title}}_{{$camp->date}}.pdf');
                });
            });
        </script>
@endsection
