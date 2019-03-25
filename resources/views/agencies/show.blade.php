@extends('layouts.app')

@section('content')
<div class="container">  
    @can("admin")

        <h1>{{ $agency->name }}</h1>
        
        <h4>{{ $agency->adress }}</h4>

        <p>{{ $agency->about }}</p>



            <a href="{{action("AgencyController@edit", $agency->id)}}" class = "btn btn-success">Upravit</a>
                
            <form method="POST" action="{{action("AgencyController@update", $agency->id)}}">

                @method("DELETE")
                @csrf
                <div>
                    <button type="submit" class="btn btn-danger">Smazat</button>
                </div>
            </form>

    @endcan
</div>
@endsection