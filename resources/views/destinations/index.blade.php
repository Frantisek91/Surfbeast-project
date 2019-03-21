@extends('layouts.app')

@section('content')
<div class="container">

<h1>Destinace</h1>

<br />
<br />
@can("admin")
<a href="{{ action("DestinationController@create") }}" class="btn btn-success">Přidat destinaci</a>
@endcan
<br />
<br />

@include('alerts')

@foreach ($destinations as $destination)

    <h2>{{$destination->name}}</h2>
    <p>{{$destination->description}}</p>

    <br />

    <a href="{{ action("DestinationController@show", $destination->id) }}" class="btn btn-primary">Náhled</a>
    <br />
    <br />
@endforeach
</div>

@endsection