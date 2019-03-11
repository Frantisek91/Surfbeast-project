@extends('layout')

@section('content')


    
<div class="container">
    <h1>Přidat novou destinaci</h1>
    <form method="POST" action="{{ action("DestinationController@store")}}">
        @csrf
        <div>
            <input type="text" name="name" placeholder="Destinace" {{-- value="{{old("title")}}" --}}>
        </div>
        <br>
        <div>
            <textarea name="description" cols="30" rows="10" placeholder="Popis">{{-- {{old("description")}} --}}</textarea>
        </div> 
        <br>
        <div>
            <button type="submit"> Přidat Destinaci </button>
        </div>

    {{--  @include('errors') --}}

    </form>
</div>

@endsection