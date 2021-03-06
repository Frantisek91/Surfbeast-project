@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{$destination->name}}</h1>

    <p>{{$destination->description}}</p>

    @can("admin")

    <a href="{{action("DestinationController@edit", $destination->id)}}" class = "btn btn-success">Upravit</a>
        
    <form method="POST" action="{{action("DestinationController@update", $destination->id)}}">

        @method("DELETE")
        @csrf
        <div>
            <button type="submit" class="btn btn-danger">Smazat</button>
        </div>
    </form>

    @endcan

</div>

@endsection