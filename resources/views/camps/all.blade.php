@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kempy</h1>
   
    @can("admin")
    <a href="{{ action("CampController@create") }}" class="btn btn-success my-3">Přidat nový kemp</a>
    @endcan
    <br>
    @include('alerts')

    @foreach ($camps as $camp)
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="heading{{$camp->id}}}">
                    <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$camp->id}}" aria-expanded="true" aria-controls="collapse{{$camp->id}}">
                        <p>{{$camp->agency->name}}: {{ $camp->name }} </p>   
                    </button>
                    </h2>
                </div>
            </div>

            <div id="collapse{{$camp->id}}" class="collapse hide" aria-labelledby="heading{{$camp->id}}}" data-parent="#accordionExample">
                <div class="card-body">
                    <p>{{ $camp->description }}</p>
                    <div class="container">
                    <div class="d-flex mt-1 mb-4">                        
                        <a href="{{action("CampController@edit", $camp->id)}}" class = "btn btn-success mx-1">Upravit</a>
                        <a href="{{ action("CampController@show", $camp->id) }}" class="btn btn-primary mx-1">Náhled</a>

                        <form method="POST" action="{{action("CampController@destroy", $camp->id)}}">
                            @method("DELETE")
                            @csrf
                            <div>
                                <button type="submit" class="btn btn-danger mx-1">Smazat</button>
                            </div>
                        </form>
                        <a href="{{ action("TermsController@create", $camp->id) }}" class="btn btn-warning mx-1">Přidat termín</a>                        
                    </div>
                    </div>              

                @if ($camp->terms->count())
                    <h5>Dostupné termíny:</h5>
                    <div class="terms">
                        <div class="container">
                            @foreach ($camp->terms as $term)
                                <p class="d-flex my-2">Od: {{ $term->start->format("j.n.Y") }} Do: {{ $term->end->format("j.n.Y") }} Cena: {{ $term->price }} </p>
                                    <div class="d-flex">
                                        <a href="{{action("TermsController@edit", $term->id)}}" class = "btn btn-success mx-1">Upravit</a>
                                        <form method="POST" action="{{action("TermsController@destroy", $term->id) }}">
                                        @method("DELETE")
                                        @csrf
                                        <button type="submit" class="btn btn-danger mx-1">Smazat</button>
                                        </form>
                                    </div>                                                  
                                
                            @endforeach
                        </div>
                    </div>  
                @else 
                    <h5>Žadné termíny</h5>
                @endif    
                    

                </div>            
            </div>    
        </div>  
    @endforeach
</div>
@endsection