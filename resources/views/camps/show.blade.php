@extends('layouts.app')

@section('content')
    
<div class="container">

    <h2>{{ $camp->agency->name }}</h2>

    <h3>{{ $camp->destination->name }}</h3>
    <br>

    <h5>Popis</h5>

    <p>{{ $camp->description }}</p>

    <h5>Stravování</h5>

    <p>{{ $camp->catering }}</p>

    <h5>Doprava</h5>

    <p>{{ $camp->transport }}</p>

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
        <label>Overall Experience</label>
        <select class="form-control" name="rating">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
        </div>

        <div class="form-group">
        <textarea class="form-control" name="description" rows="3"></textarea>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Share</button>
            </div>
        </div>
    </form>

    </div>
@endsection
