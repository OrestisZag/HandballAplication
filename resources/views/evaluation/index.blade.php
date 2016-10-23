@extends('main')

@section('title', '| Athletes Evaluations')

@section('content')
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <table class="table">
                <thead>
                <tr>
                    <th>Athlete</th>
                    <th>Match</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($entities as $entity)
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            {{--<a href="{{ route('athlete.show', $entity->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-info-sign"></span></a>--}}
                            {{--<a href="{{ route('athlete.edit', $entity->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit"></span></a>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{--{{ $entities->links() }}--}}
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection