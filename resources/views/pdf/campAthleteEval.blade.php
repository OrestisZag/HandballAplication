@extends('main')

@section('title', '| Camp Evaluation to PDF')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3 space-top">
            <button id="cmd" class="btn btn-success btn-block">Download PDF</button>
        </div>
    </div>
    <div id="pdf-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 space-top">
                <ul class="list-group">
                    <li class="list-group-item text-center"><strong>Name: </strong>{{ $name }}</li>
                    <li class="list-group-item text-center"><strong>Train Date: </strong>{{ $train->date }}</li>
                    <li class="list-group-item text-center"><strong>Position: </strong>{{ $train->position->fullName }}
                    </li>
                    <li class="list-group-item text-center"><strong>Attack Evaluation: </strong>{{ $train->attackEval }}
                    </li>
                    <li class="list-group-item text-center"><strong>Defence
                            Evaluation: </strong>{{ $train->defenceEval }}</li>
                    <li class="list-group-item text-center"><strong>Attack + Defence
                            Evaluation: </strong>{{ $train->atDefEval }}</li>
                    <li class="list-group-item text-center"><strong>Comments: </strong>
                        <div class="panel-body">{{ $train->comments }}</div>
                    </li>
                </ul>
            </div>
        </div>
        {{--<div class="row">--}}
            {{--<div class="col-md-6 col-md-offset-3">--}}
                {{--<div id="chart-div">--}}
                    {{--{!! $lava !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection

@section('script')
    <script>
        $("#pdf-content").css("background-color", "white");
        var doc = new jsPDF('l', 'mm', [297, 210]);

        $('#cmd').click(function () {
            doc.addHTML($('#pdf-content'), function() {
                doc.save('{{$name}}' + ' camp evaluation {{$train->date}}.pdf');
            });
        });
    </script>
@endsection
