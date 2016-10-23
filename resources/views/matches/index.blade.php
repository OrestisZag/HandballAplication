@extends('main')

@section('title', '| Matches')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-5">
            {!! Form::open(['route' => 'match.index', 'method' => 'GET', 'role' => 'search', 'class' => 'navbar-form']) !!}
                <div class="input-group text-center">
                    {{ Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search by Team or Date']) }}
                    <span class="input-group-btn">
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <a href="{{ route('match.create') }}" class="btn btn-primary center-block">Add New Match</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Home</th>
                    <th>Away</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($matches as $match)
                    <tr>
                        <td>{{ $match->home }}</td>
                        <td>{{ $match->away }}</td>
                        <td>{{ $match->date }}</td>
                        <td>
                            <a href="{{ route('match.show', $match->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-info-sign"></span></a>
                            <a href="{{ route('match.edit', $match->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $matches->links() }}
            </div>
        </div>
    </div>
@endsection
