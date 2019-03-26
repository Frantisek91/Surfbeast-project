@extends('layouts.app')

@section('content')
<div class="container">   
    <form method="post" action="{{ action("CampController@store") }}">

        @csrf
        @include('errors')
        @include('alerts')

        <div class="form-group">
            <label for="exampleFormControlSelect1">Agentura</label>
            <select name="agency_id" class="form-control" id="agency_id">
                @foreach ($agencies as $agency)
                    <option value="{{ $agency->id }}">{{ $agency->name }}</option>    
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Destinace</label>
            <select name="destination_id" class="form-control" id="destination_id">
                @foreach ($destinations as $destination)
                    <option value="{{ $destination->id }}">{{ $destination->name }}</option>    
                @endforeach
            </select>
        </div>  

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Jméno</label>
                <textarea name ="name" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("name")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Krátký popis kempu</label>
                <textarea name ="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Popis sem" required>{{old("description")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Ubytování</label>
                <textarea name ="accommodation" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("accommodation")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Stravovani</label>
                <textarea name ="catering" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("catering")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Transport</label>
                <textarea name ="transport" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("transport")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Pojištění</label>
                <textarea name ="insurance" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("insurance")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Transfer</label>
                <textarea name ="transfer" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("transfer")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Rozvrh</label>
                <textarea name ="schedule" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("schedule")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Lekce</label>
                <textarea name ="surf_lessons" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("surf_lessons")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Vybaveni</label>
                <textarea name ="equipment" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("equipment")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Úroveň</label>
                <textarea name ="skill_level" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("skill_level")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Instruktoři</label>
                <textarea name ="instructors" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("instructors")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Obr.1</label>
                <textarea name ="image_url_1" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("image_url_1")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Obr.2</label>
                <textarea name ="image_url_2" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("image_url_2")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Obr.3</label>
                <textarea name ="image_url_3" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("image_url_3")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Obr.4</label>
                <textarea name ="image_url_4" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("image_url_4")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Obr.5</label>
                <textarea name ="image_url_5" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("image_url_5")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">URL</label>
                <textarea name ="url" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("url")}}</textarea>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">URL MSW</label>
                <textarea name ="url_msw" class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Popis sem" required>{{old("url_msw")}}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Přidat kemp</button>

    </form>
</div>
@endsection