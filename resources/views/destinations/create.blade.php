@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Přidat novou destinaci</h1>
    <form method="POST" action="{{ action("DestinationController@store")}}">
        @csrf
        @include('errors')
        @include('alerts')
        
        <div class="form-group">
            <label for="formGroupExampleInput">Destinace</label>
            <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="" value="{{old("name")}}" required>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Krátký popis destinace</label>
            <textarea name ="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Popis sem" required>{{old("description")}}</textarea>
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-success"> Přidat Destinaci </button>
        </div>

    </form>
</div>

@endsection