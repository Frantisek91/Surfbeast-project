@extends('layouts.app')

@section('style')
<style>

</style>
    
@endsection
@section('content')


<<<<<<< HEAD
<select name="destination_id" class="form-control">
    @foreach($destinations as $destination)
        <option value="{{ $destination->id }}">{{ $destination->name }}</option>
    @endforeach
</select>

<input type="date" name="start" class="form-control" placeholder="Od kdy?"/>
<input type="date" name="end" class="form-control" placeholder="Do kdy?"/>

<input type="number" name="price_min" class="form-control" placeholder="Částka od"/>
<input type="number" name="price_max" class="form-control" placeholder="do"/>

<button type="submit" class="btn btn-primary">Najdi surf kemp</button>
=======
<div class="container">
    <form action="{{ action('SurfController@show') }}" method="POST">
    @csrf

    <select name="destination" class="form-control">
        @foreach($destinations as $destination)
            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
        @endforeach
    </select>

    <input type="date" name="start" class="form-control" placeholder="When do you want to go?"/>
    <input type="date" name="end" class="form-control" placeholder="When do you want to come back?"/>

    <input type="number" name="price_min" class="form-control" placeholder="Payment between this"/>
    <input type="number" name="price_max" class="form-control" placeholder="and this"/>

    <button type="submit" class="btn btn-primary">Search</button>

    </form>

    <h1> TOP 10 Destinations </h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div>
    </div>

>>>>>>> ba1f2fdd3485e42b6491e88f42d1e6cad7b8a857

</div>

@endsection