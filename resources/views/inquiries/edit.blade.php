@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Zpracovat poptávku</h1>

    <form method="POST" action="{{ action("InquiryController@update", $inquiry->id)}}">
        @csrf
        {{ method_field('PUT') }}
        @include('errors')
        @include('alerts') 
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">Stav</label>
            <select name="resolved" class="form-control" >
                <option value="0">Makám na tom!</option> 
                <option value="1">Hotovo!</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Prostor pro komentář</label>
            <textarea name ="comment" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Prostor pro případný komentář">{{$inquiry->comment}}</textarea>
        </div>        
            <p>Zpráva: {{ $inquiry->message }}</p>
            <p>Kemp:{{ $inquiry->term->camp->name }}</p>
            <p>Od: {{ $inquiry->term->start }} Do: {{$inquiry->term->end}} </p>
            <p>Destinace:{{ $inquiry->term->camp->destination->name }}</p>
            <p>Agentura: {{$inquiry->term->camp->agency->name}}</p>
            <p>Cena: {{ $inquiry->term->price }}</p>

        <div>
            <button type="submit" class="btn btn-success">Vyřídit</button>
        </div>
    </form>
</div>
@endsection