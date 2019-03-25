@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agentury</h1>
   
    @can("admin")
    <a href="{{ action("AgencyController@create") }}" class="btn btn-success my-3">Přidat novou agenturu</a>
    @endcan
    <br>
    @include('alerts')
    @foreach ($agencies as $agency)

        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="heading{{$agency->id}}}">
                    <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$agency->id}}" aria-expanded="true" aria-controls="collapse{{$agency->id}}">
                        {{ $agency->name }}
                    </button>
                    </h2>
                </div>
            </div>

            <div id="collapse{{$agency->id}}" class="collapse hide" aria-labelledby="heading{{$agency->id}}}" data-parent="#accordionExample">
                <div class="card-body">
                    <h4>{{ $agency->adress }}</h4>
                    <p>{{ $agency->about }}</p>
                    
                    <div class="d-flex">
                        @can("admin")
                        <a href="{{action("AgencyController@edit", $agency->id)}}" class = "btn btn-success">Upravit</a>
                        <a href="{{ action("AgencyController@show", $agency->id) }}" class="btn btn-primary">Náhled</a>
                        <form method="POST" action="{{action("AgencyController@destroy", $agency->id)}}">
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
</div>
@endsection