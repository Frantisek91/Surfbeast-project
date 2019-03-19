@extends('layouts.app')

@section('content')

    
<div class="container">
    <h1>Přidat novou destinaci</h1>
    <form method="POST" action="{{ action("DestinationController@store")}}">
        @include('errors')
        @csrf
        <div>
            <input type="text" name="name" placeholder="Destinace" value="{{old("name")}}" required>
        </div>
        <br>
        <div>
            <textarea name="description" cols="30" rows="10" placeholder="Popis" required>{{old("description")}}</textarea>
        </div> 
        <br>
        <div>
            <button type="submit" class="btn btn-success"> Přidat Destinaci </button>
        </div>

    </form>
</div>

@endsection