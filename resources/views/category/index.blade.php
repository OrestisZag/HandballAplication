@extends('main')

@section('title', '| Categories')

@section('content')
    <div class="row">
        <div class="col-md-7 col-md-offset-4">
            {!! Form::open(['route' => 'category.index', 'method' => 'GET', 'role' => 'search', 'class' => 'navbar-form']) !!}
            <div class="input-group text-center">
                {{ Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search by Category']) }}
                <span class="input-group-btn">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
            <a href="{{ route('category.create') }}" class="btn btn-primary center-block">Add New Category</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Category</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-danger btn-xs">Edit <span class="glyphicon glyphicon-edit"></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
