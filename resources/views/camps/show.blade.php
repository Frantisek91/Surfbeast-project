@extends('layouts.app')

@section('content')
    
<div class="container">

    <h2>{{ $camp->agency->name }}</h2>

    <h3>{{ $camp->name }}</h3>
    <br>

    <h5>Popis</h5>

    <p>{{ $camp->description }}</p>

    <h5>Ubytování</h5>

    <p>{{ $camp->accommodation }}</p>

    <h5>Stravování</h5>

    <p>{{ $camp->catering }}</p>

    <h5>Doprava</h5>

    <p>{{ $camp->transport }}</p>

    <h5>Pojištění</h5>

    <p>{{ $camp->insurance }}</p>

    <h5>Transfer</h5>

    <p>{{ $camp->transfer }}</p>

    <h5>Program</h5>

    <p>{{ $camp->schedule }}</p>

    <h5>Lekce</h5>

    <p>{{ $camp->surf_lessons }}</p>

    <h5>Vybavení</h5>

    <p>{{ $camp->equipment }}</p>

    <h5>Úroveň</h5>

    <p>{{ $camp->skill_level }}</p>

    <h5>Instruktoři</h5>

    <p>{{ $camp->instructors }}</p>

    <a href="{{ action('InquiryController@create', $camp->id) }}" target="_blank" class="btn btn-primary">Zjistit obsazenost</a>
    <br>
    <br>

    @if ($camp->reviews->count())
        <h5>Komentáře</h5>

        @foreach ($camp->reviews as $review)
            <h5>Od: {{$review->user->name}}</h5>
            <h5>Celkové hodnocení:{{$review->rating}}</h5>
            <p>Komentář:{{$review->description}}</p>
            
        @endforeach  

    @endif

    <form method="POST" action="{{action("ReviewsController@store", $camp->id)}}">
        @csrf

        <div class="form-group">
          <label>Celkové hodnocení:</label>
          <select class="form-control" name="rating">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>

        <div class="form-group">
          <label>Komentář:</label>
          <textarea class="form-control" name="description" rows="3"></textarea>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Sdílet</button>
          </div>
        </div>
    </form>

</div>

@endsection
