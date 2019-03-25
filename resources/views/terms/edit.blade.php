@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{ action("TermsController@update", $term->id) }}">
        @csrf
        @include('errors')
        @include('alerts')
        {{ method_field('PUT') }}
        <h1>Upravit termín</h1>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Název kempu</label>
            <select name="camp_id" class="form-control" id="camp_id">
                @foreach ($camps as $camp)
                    <option value="{{ $camp->id }}">{{ $camp->name }}</option>    
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Od:</label>
            <input name="start" type="date" class="form-control" id="formGroupExampleInput" placeholder="" value="{{ $term->start }}" required>
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Od:</label>
            <input name="end" type="date" class="form-control" id="formGroupExampleInput" placeholder="" value="{{ $term->end }}" required>
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Cena:</label>
            <input name="price" type="number" class="form-control" id="formGroupExampleInput" placeholder="" value="{{ $term->price }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Upravit info</button>

    </form>
</div>   
@endsection