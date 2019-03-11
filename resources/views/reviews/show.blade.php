@extends('layouts.app')

@section('content')

<h2>Rating: {{ $review->rating }} </h2>
<h2>Description: {{ $review->description }} </h2>

<form method="POST" action="/reviews/{{ $review->id }}">
    @method('DELETE')
    @csrf
    <button type="submit">DELETE PROJECT</button>

</form>
@endsection