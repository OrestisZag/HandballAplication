@extends('main')

@section('title', '| Lines')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <a href="{{ route('line.create') }}" class="btn btn-primary center-block">Create New Line</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Line</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($entities as $entity)
                    <tr>
                        <td>Line_#{{$entity->id}}</td>
                        <td>
                            <a href="{{ route('line.show', $entity->id) }}" class="btn btn-primary btn-sm btn-block">Show <span class="glyphicon glyphicon-info-sign"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $entities->links() !!}
            </div>
        </div>
    </div>
@endsection
