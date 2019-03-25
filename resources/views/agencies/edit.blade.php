@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Upravit info</h1>

    <form method="post" action="{{ action("AgencyController@update", $agency->id) }}">
    
        @csrf
        {{ method_field('PUT') }}
        @include('errors')
        @include('alerts')
        
        <div class="form-group">
            <label for="formGroupExampleInput">Jméno agentury</label>
            <input name="name" type="text" class="form-control" id="formGroupExampleInput" value="{{ $agency->name }}">
        </div>
            
        <div class="form-group">
            <label for="inputAddress">Adresa</label>
            <input name="adress" type="text" class="form-control" id="inputAddress" value="{{ $agency->adress }}">
        </div>
    
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Krátký popis agentury</label>
            <textarea name ="about" class="form-control" id="exampleFormControlTextarea1" rows="3" required>{{ $agency->about }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Upravit</button>
    
    </form>
</div>
@endsection