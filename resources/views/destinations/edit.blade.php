@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Upravit destinaci</h1>

    <form method="POST" action="{{ action("DestinationController@update", $destination->id)}}">
        @include('errors')
        @method("PATCH")
        @csrf
        <div>
            <input type="text" name="name" placeholder="Destinace" value="{{$destination->name}}">
        </div>
        <br>
        <div>
            <textarea name="description" cols="30" rows="10" placeholder="Popis">{{$destination->description}}</textarea>
        </div> 
        <br>
        <div>
            <button type="submit" class="btn btn-success"> Upravit Destinaci </button>
        </div>


    </form>
</div>
    
@endsection