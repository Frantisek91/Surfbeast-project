@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Zpracované poptávky</h1>

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
                        <p>{{ $inquiry->comment }}</p>
                        <p>{{ $inquiry->message }}</p>
                        <p>{{ $inquiry->term->price }}</p>
                        <p>{{ $inquiry->term->camp->name }}</p>
                        <p><small>Zpracováno: {{$inquiry->updated_at}}</small></p>
                    </div>                             
                </div>            
            </div>    
        </div>  
    @endforeach
</div>
@endsection
