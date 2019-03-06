@extends('layout')

@section('content')
<div class="container">

<h1>Destinace</h1>

@foreach ($destinations as $destination)

    <h2>{{$destination->name}}</h2>
    <p>{{$destination->description}}</p>

    <a href="{{ action("DestinationController@show", $destination->id) }}" class="btn btn-primary">Náhled</a>
  
@endforeach
</div>
@endsection