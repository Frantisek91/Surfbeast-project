@extends('layout')

@section('content')

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

@endsection