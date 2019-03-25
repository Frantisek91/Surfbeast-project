@extends('layouts.app')

@section('content')
<div class="container">
    <div class="search-show">
        <div class="banner">
        
            <h1>{{ $destination->name }}</h1>
            
        </div>
        
        <p>{{ $destination->description }}</p>

        @if(!empty($camps))
            @foreach ($camps as $camp)     
                @if(!empty($camp->terms))
                    <div class="results">
                        <div class="agency">
                            <a href="{{ action('AgencyController@show', $camp->agency_id) }}" target="_blank"><h5>{{ $camp->agency->name }}</h5></a>
                        </div>
                        <div class="terms">
                            <ul>
                                @foreach ($camp->terms as $term)
                                    <li>Od: {{ $term->start }} Do: {{ $term->end }} Cena: {{ $term->price }}</li>
                                @endforeach
                            </ul>
                        </div>    
                        <a href="{{ action('CampController@show', $camp->id) }}" class="btn btn-primary mb-4">Zobrazit detaily</a>                
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</div>
@endsection