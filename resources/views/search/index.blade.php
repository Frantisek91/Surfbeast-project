@extends('layouts.app')

@section('content')

<div class="homepage">

    <section class="banner img-fluid">
        <div class="form">
            <form action="{{ action('SurfController@show') }}" method="get">

                    <div class="formicka">
                        <select name="destination_id" class="form-control">
                            @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="formicka">
                        <input type="date" name="start" class="form-control" placeholder="Od kdy?"/>
                    </div>
                    <div class="formicka">
                        <input type="date" name="end" class="form-control" placeholder="Do kdy?"/>
                    </div>
                    <div class="formicka">
                        <input type="number" name="price_min" class="form-control" placeholder="Částka od"/>
                    </div>
                    <div class="formicka">
                        <input type="number" name="price_max" class="form-control" placeholder="do"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Najdi surf kemp</button>
            
                </form>
                <br>
        </div>
    </section>

    <div class="slogan">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A velit, obcaecati ipsam labore non aut.</p>
    </div>

    <div class="container pictures-text">

        <div class="floating row">
            <div class="picture-fluid picture col-md-4">
                <img src="{{ asset('/img/surf2.jpg') }}" alt="">
            </div>
            <div class="text col-md-8">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo harum voluptates voluptatum officia minima repellat numquam iste ut totam mollitia?
            </div>
        </div>

        <div class="floating row">
            <div class="picture-fluid picture col-md-4">
                <img src="{{ asset('/img/surf2.jpg') }}" alt="">
            </div>
            <div class="text col-md-8">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo harum voluptates voluptatum officia minima repellat numquam iste ut totam mollitia?
            </div>
        </div>

        <div class="floating row">
            <div class="picture-fluid picture col-md-4">
                <img src="{{ asset('/img/surf2.jpg') }}" alt="">
            </div>
            <div class="text col-md-8">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illo harum voluptates voluptatum officia minima repellat numquam iste ut totam mollitia?
            </div>
        </div>


    <h1>3 nejlepsi volby podle nasich recenzi</h1>

    <div class="row container cards">
        @foreach($camps as $camp)
        <div class="col-md-4">
            <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">{{$camp->name}}</h5>
                <p class="card-text">{{$camp->average_review}}</p>
                <a href="{{ action("CampController@show", $camp->id) }}" class="btn btn-primary">Zjistit více</a>
            </div>
            </div>
        </div>
            @endforeach
    </div>

</div>

@endsection