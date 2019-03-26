@extends('layouts.app')

@section('content')

    <h1>Kempy</h1>
   
    @can("admin")
    <a href="{{ action("CampController@create") }}" class="btn btn-success my-3">Přidat kemp</a>
    @endcan
    <br>
    @include('alerts')
    @foreach ($camps as $camp)

        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="heading{{$camp->id}}}">
                    <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$camp->id}}" aria-expanded="true" aria-controls="collapse{{$camp->id}}">
                        {{ $camp->name }}
                    </button>
                    </h2>
                </div>
            </div>

            <div id="collapse{{$camp->id}}" class="collapse hide" aria-labelledby="heading{{$camp->id}}}" data-parent="#accordionExample">
                <div class="card-body">
                    <h4>{{$camp->average_review}}</h4>  
                    <p>{{ $camp->description }}</p>
                    
                    <div class="d-flex">
                        @can("admin")
                        <a href="{{action("CampController@edit", $camp->id)}}" class = "btn btn-success">Upravit</a>
                        <a href="{{ action("CampController@show", $camp->id) }}" class="btn btn-primary">Náhled</a>
                        <form method="POST" action="{{action("CampController@destroy", $camp->id)}}">
                            @method("DELETE")
                            @csrf
                            <div>
                                <button type="submit" class="btn btn-danger">Smazat</button>
                            </div>
                        </form>
                        @endcan
                    </div>                
                </div>            
            </div>    
        </div>  

    @endforeach

@endsection