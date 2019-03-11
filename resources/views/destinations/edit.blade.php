@extends('layout')

@section('content')

<div class="container">
    <h1>Upravit destinaci</h1>

    <form method="POST" action="{{ action("DestinationController@update", $destination->id)}}">
        @method("PATCH")
        @csrf
        <div>
            <input type="text" name="name" placeholder="Destinace" value="{{$destination->name}}">
        </div>
        <br>
        <div>
            <textarea name="description" cols="30" rows="10" placeholder="Popis">{{$destination->name}}</textarea>
        </div> 
        <br>
        <div>
            <button type="submit" class="btn btn-success"> Upravit Destinaci </button>
        </div>

    {{--  @include('errors') --}}

    </form>
</div>
    
@endsection