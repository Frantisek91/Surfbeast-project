@extends('layouts.app')

@section('content')

<h2>{{ $destination->name }}</h2>
<br>
<p>{{ $destination->description }}</p>

@if(!empty($camps))
    @foreach ($camps as $camp)     
        @if(!empty($camp->terms))
            <h5>{{ $camp->agency->name }}</h5>
            <p>{{ $camp->description }}</p>
                <ul>
                    @foreach ($camp->terms as $term)
                        <li>Od: {{ $term->start }} Do: {{ $term->end }} Cena: {{ $term->price }}</li>
                    @endforeach
                </ul>
            <form method="get" action="{{action('CampController@show', $camp->id)}}">
                <button>Zobrazit detaily</button>
            </form>
            <br>
            <br>
        @endif
    @endforeach
@endif

@endsection