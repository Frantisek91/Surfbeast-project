@extends('layouts.app')

@section('content')
<div class="container">

    <p>{{$inquiry->message}}</p>

    {{-- @can("admin")

    <a href="{{action("DestinationController@edit", $destination->id)}}" class = "btn btn-success">Upravit</a>
        
    <form method="POST" action="{{action("DestinationController@update", $destination->id)}}">

        @method("DELETE")
        @csrf
        <div>
            <button type="submit" class="btn btn-danger">Smazat</button>
        </div>
    </form>

    @endcan --}}

</div>

@endsection