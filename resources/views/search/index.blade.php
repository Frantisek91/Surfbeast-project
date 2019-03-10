@extends('layout')

@section('content')

<form action="{{ action('SurfController@show') }}" method="POST">
@csrf

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

</form>

@endsection