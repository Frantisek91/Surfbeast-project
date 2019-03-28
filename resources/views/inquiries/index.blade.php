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
                        
                        <p>{{ $inquiry->message }}</p>
                        <a href="{{ action("InquiryController@show", $inquiry->id) }}" class="btn btn-primary">Náhled</a>
                        
                    </div>
                   
                    
                   {{--  <div class="d-flex">
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
                    </div> --}}                
                </div>            
            </div>    
        </div>  
    @endforeach
</div>
@endsection
