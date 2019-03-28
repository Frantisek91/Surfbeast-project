@extends('layouts.app')

@section('content')
<div class="container">  

        <h1>{{ $agency->name }}</h1>
        
        <h4>{{ $agency->adress }}</h4>

        <p>{{ $agency->about }}</p>

        @can("admin")
        <div class="d-flex">
            <a href="{{action("AgencyController@edit", $agency->id)}}" class = "btn btn-success">Upravit</a>
                
            <form method="POST" action="{{action("AgencyController@update", $agency->id)}}">

                @method("DELETE")
                @csrf
                <div>
                    <button type="submit" class="btn btn-danger">Smazat</button>
                </div>
            
            </form>
        </div>
        @endcan
</div>
@endsection