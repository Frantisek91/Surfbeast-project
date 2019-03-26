@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Upravit info</h1>

    <form method="POST" action="{{ action("DestinationController@update", $destination->id)}}">
        @csrf
        {{ method_field('PATCH') }}
        @include('errors')
        @include('alerts')

        <div class="form-group">
            <label for="formGroupExampleInput">Destinace</label>
            <input name="name" type="text" class="form-control" id="formGroupExampleInput" value="{{ $destination->name }}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Krátký popis destinace</label>
            <textarea name ="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{$destination->description}}<</textarea>
        </div>
 
        <div>
            <button type="submit" class="btn btn-success"> Upravit</button>
        </div>


    </form>
</div>
    
@endsection