@extends('main')

@section('title', '| Camps')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('camp.create') }}" class="btn btn-sm btn-primary">Create New Camp</a>
            <ul class="space-top">
                @foreach($camps as $camp)
                    <li>
                        {{$camp->title}}, {{$camp->place}}
                        <a href="{{ route('camp.show', $camp->id) }}"><span class="glyphicon glyphicon-info-sign"></span></a>
                        <a href="{{ route('camp.edit', $camp->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
                    </li>
                @endforeach
            </ul>
            <div class="text-center">
                {{ $camps->links() }}
            </div>
        </div>
    </div>
@endsection
