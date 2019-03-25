@extends('layouts.app')

@section('content')
<div class="container">  
    <form method="POST" action="{{ action("TermsController@store", $camp->id) }}">
        @csrf
        @include('errors')
        @include('alerts')
        <h1>Přidat termín</h1>
        
        <div class="form-group">
            <label for="formGroupExampleInput">Od:</label>
            <input name="start" type="date" class="form-control" id="formGroupExampleInput" placeholder="" value="{{old("start")}}" required>
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Od:</label>
            <input name="end" type="date" class="form-control" id="formGroupExampleInput" placeholder="" value="{{old("end")}}" required>
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Cena:</label>
            <input name="price" type="number" class="form-control" id="formGroupExampleInput" placeholder="" value="{{old("price")}}" required>
        </div>

        <button type="submit" class="btn btn-primary">Přidat termín</button>

    </form>
@endsection