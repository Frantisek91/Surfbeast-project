@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Destinace</h1>

    @can("admin")
    <a href="{{ action("DestinationController@create") }}" class="btn btn-success my-3">Přidat novou destinaci</a>
    @endcan
    <br>
    @include('alerts')

    @foreach ($destinations as $destination)
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="heading{{$destination->id}}}">
                    <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$destination->id}}" aria-expanded="true" aria-controls="collapse{{$destination->id}}">
                        {{ $destination->name }}
                    </button>
                    </h2>
                </div>
            </div>

            <div id="collapse{{$destination->id}}" class="collapse hide" aria-labelledby="heading{{$destination->id}}}" data-parent="#accordionExample">
                <div class="card-body">
                    <p>{{ $destination->description }}</p>
                    
                    <div class="d-flex">
                        @can("admin")
                        <a href="{{action("DestinationController@edit", $destination->id)}}" class = "btn btn-success">Upravit</a>
                        <a href="{{ action("DestinationController@show", $destination->id) }}" class="btn btn-primary">Náhled</a>
                        <form method="POST" action="{{action("DestinationController@destroy", $destination->id)}}">
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