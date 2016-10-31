@extends('main')

@section('title', '| Events')

@section('content')
    <div class="row">
        <div class="col-md-7 col-md-offset-4">
            {!! Form::open(['route' => 'event.index', 'method' => 'GET', 'role' => 'search', 'class' => 'navbar-form']) !!}
            <div class="input-group text-center">
                {{ Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search by Event']) }}
                <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <a href="{{ route('event.create') }}" class="btn btn-primary center-block">Add New Event</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Event</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>
                            {{ $event->category->name }}
                        </td>
                        <td>{{ $event->date }}</td>
                        <td>
                            <a href="{{ route('event.show', $event->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-info-sign"></span></a>
                            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $events->links() }}
            </div>
        </div>
    </div>
@endsection
