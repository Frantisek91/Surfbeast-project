@extends('layouts.app')

@section('content')

<div class="container">
    <h2>{{ $destination->name }}</h2>
    <br>
    <p>{{ $destination->description }}</p>

@if(!empty($camps))
    @foreach ($camps as $camp)     
        @if(!empty($camp->terms))
            <a href="{{ action('AgencyController@show', $camp->agency_id) }}" target="_blank"><h5>{{ $camp->agency->name }}</h5></a>
                <ul>
                    @foreach ($camp->terms as $term)
                        <li>Od: {{ $term->start }} Do: {{ $term->end }} Cena: {{ $term->price }}</li>
                    @endforeach
                </ul>
            <a href="{{ action('CampController@show', $camp->id) }}" target="_blank" class="btn btn-primary">Zobrazit detaily</a>
            <br>
            <br>
        @endif
    @endforeach
@endif

</div>
@endsection