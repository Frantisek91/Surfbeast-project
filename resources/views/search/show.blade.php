@extends('layouts.app')

@section('content')

@if($destination->id == 1)
  <div class="destination spain">
    <h2>{{ $destination->name }}</h2>
    <p>{{ $destination->description }}</p>
  </div>
@elseif($destination->id == 2)
  <div class="destination bali">
    <h2>{{ $destination->name }}</h2>
    <p>{{ $destination->description }}</p>
  </div>
@elseif($destination->id == 3)
  <div class="destination france">
    <h2>{{ $destination->name }}</h2>
    <p>{{ $destination->description }}</p>
  </div>
@endif

  <form action="{{ action('SurfController@show') }}" method="get">

    <select name="destination_id" class="form-control">
        @foreach($destinations as $d)
            <option value="{{ $d->id }}" {{ $d->id == $destination->id ? "selected" : "" }}>{{ $d->name }}</option>
        @endforeach
    </select>

    <input type="date" name="start" class="form-control" placeholder="Od kdy?" value="{{ $start }}"/>
    <input type="date" name="end" class="form-control" placeholder="Do kdy?" value="{{ $end }}"/>

    <input type="number" name="price_min" class="form-control" placeholder="Částka od" value="{{ $price_min }}"/>
    <input type="number" name="price_max" class="form-control" placeholder="do" value="{{ $price_max }}"/>

    <select name="sort" id="">
        <option value="start-asc" {{ $sort == "start-asc" ? "selected" : "" }}>Od nejbližšího</option>
        <option value="start-desc" {{ $sort == "start-desc" ? "selected" : "" }}>Od nejpozdějšího</option>
    </select>

    <button type="submit" class="btn btn-primary">Uprav vyhledávání</button>

  </form>

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

@endsection