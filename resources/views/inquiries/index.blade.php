@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Poptávky</h1>

    @include('alerts')

    @foreach ($inquiries as $inquiry)
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="heading{{$inquiry->id}}}">
                    <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$inquiry->id}}" aria-expanded="true" aria-controls="collapse{{$inquiry->id}}">
                        Poptávka od: {{ $inquiry->f_name }} {{ $inquiry->l_name }} 
                    </button>
                    </h2>
                </div>
            </div>

            <div id="collapse{{$inquiry->id}}" class="collapse hide" aria-labelledby="heading{{$inquiry->id}}}" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="container">
                                                
                        <p>Destinace: {{ $inquiry->term->camp->destination->name }}</p>
                        <p>Agentura: {{$inquiry->term->camp->agency->name}}</p>
                        <p>Kemp: {{ $inquiry->term->camp->name }}</p>
                        <p>Od: {{ $inquiry->term->start->format("j.n.Y") }} Do:{{$inquiry->term->end->format("j.n.Y")}}</p>
                        <p>Cena: {{ $inquiry->term->price }}Kč</p>   

                    <div class="d-flex">
                            <a href="{{action("InquiryController@edit", $inquiry->id)}}" class="btn btn-success mx-1">Zpracovat</a>
                                                        
                            <form method="POST" action="{{action("InquiryController@destroy", $inquiry->id)}}">
                                @method("DELETE")
                                @csrf
                                <div>
                                    <button type="submit" class="btn btn-danger mx-1">Smazat</button>
                                </div>
                            </form>
                        
                        </div>          
                    </div>               
                    
                </div>            
            </div>    
        </div>  
    @endforeach
</div>
@endsection
