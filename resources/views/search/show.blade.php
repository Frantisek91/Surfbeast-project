@extends('layouts.app')

@section('content')

<div class="container">
    <h2>{{ $destination->name }}</h2>
    <br>
    <p>{{ $destination->description }}</p>

        @if(!empty($camps))

            @foreach ($camps as $camp)
                
                @if(!empty($camp->terms)){{-- value of property terms is not empty, but it is an empty array?? --}}
                    <h3>{{ $camp->agency->name }}</h3>
                    <p>{{ $camp->description }}</p>
                    <div class="row">
                        @foreach ($camp->terms as $term)
                        <div class="col-sm-6">
                            <div class="card text-center mb-2"> 
                                <img class="card-img-top" src="img/surf.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-text"> Začátek: {{ $term->start}}</h5>
                                    <h5 class="card-text"> Konec: {{ $term->end}}</h5>
                                    <h5 class="card-text"> Cena: {{$term->price}}</h5>
                                    <a href="#" class="btn btn-primary">Náhled</a>
                                </div>
                            </div>
                        </div>
                    @endforeach        
                    </div>  
                @endif
            
            @endforeach

        @endif
</div>
@endsection