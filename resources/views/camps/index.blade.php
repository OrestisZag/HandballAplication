@extends('main')

@section('title', '| Camps')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-5">
            {!! Form::open(['route' => 'camp.index', 'method' => 'GET', 'role' => 'search', 'class' => 'navbar-form']) !!}
            <div class="input-group text-center">
                {{ Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search']) }}
                <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <a href="{{ route('camp.create') }}" class="btn btn-primary center-block">Create New Camp</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Place</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($camps as $camp)
                        <tr>
                            <td>{{$camp->title}}</td>
                            <td>{{$camp->place}}</td>
                            <td>{{ $camp->date }}</td>
                            <td>
                                <a href="{{ route('camp.show', $camp->id) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-info-sign"></span></a>
                                <a href="{{ route('camp.edit', $camp->id) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-edit"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $camps->links() }}
            </div>
        </div>
    </div>
@endsection
