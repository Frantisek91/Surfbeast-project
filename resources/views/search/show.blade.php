@extends('layout')

@section('content')

@if(!empty($camps))

    @foreach ($camps as $camp)
        <h2>{{ $camp->destination->name }}</h2>
        <h5>{{ $camp->agency->name }}</h5>
        <p>{{ $camp->description }}</p>
            <ul>
                @foreach ($camp->terms as $term)
                    <li>Od: {{ $term->start }} Do: {{ $term->end }} Cena: {{ $term->price }}</li>
                @endforeach
            </ul>
    @endforeach
@endif

@endsection