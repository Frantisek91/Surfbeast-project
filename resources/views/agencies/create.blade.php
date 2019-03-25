@extends('layouts.app')

@section('content')
<div class="container">    
    <h1>Přidat novou agenturu</h1>
    <form method="post" action="{{ action("AgencyController@store") }}">
        
        @csrf
        @include('errors')
        @include('alerts')
        
        <div class="form-group">
            <label for="formGroupExampleInput">Jméno agentury</label>
            <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Sem vložte jméno agentury" value="{{old("name")}}" required>
        </div>
            
        <div class="form-group">
            <label for="inputAddress">Adresa</label>
            <input name="adress" type="text" class="form-control" id="inputAddress" placeholder="Horni 3, 111 11 Praha 111" value="{{old("adress")}}" required>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Krátký popis agentury</label>
            <textarea name ="about" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Popis sem" required>{{old("about")}}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Přidat agenturu</button>

    </form>
</div>
@endsection