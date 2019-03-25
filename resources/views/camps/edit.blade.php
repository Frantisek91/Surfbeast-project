@extends('layouts.app')

@section('content')
<div class="container">
    <form method="post" action="{{ action("CampController@update", $camp->id) }}">

        @csrf
        @include('errors')
        @include('alerts')
        {{ method_field('PUT') }}

        <div class="form-group">
            <label for="exampleFormControlSelect1">Agentura</label>
            <select name="agency_id" class="form-control" id="agency_id">
                <option value="{{ $camp->agency->id }}">{{ $camp->agency->name }}</option> 
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Destinace</label>
            <select name="destination_id" class="form-control" id="destination_id">
                <option value="{{ $camp->destination->id }}">{{ $camp->destination->name }}</option>
            </select>
        </div>  

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Jméno</label>
                <textarea name ="name" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->name}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Krátký popis kempu</label>
                <textarea name ="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Popis sem" required>{{$camp->description}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Ubytování</label>
                <textarea name ="accommodation" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->accommodation}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Stravovani</label>
                <textarea name ="catering" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->catering}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Transport</label>
                <textarea name ="transport" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->transport}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Pojištění</label>
                <textarea name ="insurance" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->insurance}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Transfer</label>
                <textarea name ="transfer" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->transfer}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Rozvrh</label>
                <textarea name ="schedule" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->schedule}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Lekce</label>
                <textarea name ="surf_lessons" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->surf_lessons}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Vybaveni</label>
                <textarea name ="equipment" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->equipment}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Úroveň</label>
                <textarea name ="skill_level" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->skill_level}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Instruktoři</label>
                <textarea name ="instructors" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->instructors}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Obr.1</label>
                <textarea name ="image_url_1" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->image_url_1}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Obr.2</label>
                <textarea name ="image_url_2" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->image_url_2}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Obr.3</label>
                <textarea name ="image_url_3" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->image_url_3}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Obr.4</label>
                <textarea name ="image_url_4" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->image_url_4}}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Obr.5</label>
                <textarea name ="image_url_5" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->image_url_5}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">URL</label>
                <textarea name ="url" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->url}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">URL MSW</label>
                <textarea name ="url_msw" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{$camp->url_msw}}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Upravit</button>

    </form>
</div>
@endsection